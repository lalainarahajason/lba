<?php 

add_action('acf/init', 'lebostudio_blocks_init');

function lebostudio_blocks_init() {

    

    // Check function exists.
    if( function_exists('acf_register_block_type') ) {
        $block_category  = 'LEBOSTUDIO';
        $include = '/include/';
        $block_path      = get_template_directory() . $include . 'features/acf/blocks/';
        $css_path        = get_template_directory_uri() . $include . 'features/acf/blocks/';

        // Bloc intro
        $blocks = array(
            array(
                'name'              => 'Bloc intro',
                'title'             => __('LEBOSTUDIO INTRO'),
                'description'       => __('Bloc intro, texte avec un fond et sous titre.'),
                'render_template'   => $block_path . 'intro.php',
                'enqueue_style'     => $css_path. 'intro.css',
                'category'          => 'lebostudio',
            ),
            array(
                'name'              => 'Bloc services',
                'title'             => __('LEBOSTUDIO SERVICES'),
                'description'       => __('Bloc services'),
                'render_template'   => $block_path . 'services.php',
                'enqueue_style'     => $css_path. 'services.css',
                'category'          => 'lebostudio',
            ),
            /* array(
                'name'              => 'Bloc Carousel',
                'title'             => __('LEBOSTUDIO CAROUSEL'),
                'description'       => __('Bloc services'),
                'render_template'   => $block_path . 'carousel.php',
                'enqueue_style'     => $css_path. 'carousel.css',
                'enqueue_script'    => $css_path. 'carousel.js',
                'category'          => 'lebostudio',
            ),*/
            array(
                'name'              => 'Bloc 2 colonnes',
                'title'             => __('LEBOSTUDIO BLOC 2 COLONNES'),
                'description'       => __('Bloc 2 colonnes'),
                'render_template'   => $block_path . 'colonnes.php',
                'enqueue_style'     => $css_path. 'colonnes.css',
                //'enqueue_script'    => $css_path. 'colonnes.js',
                'category'          => 'lebostudio',
            ),
            array(
                'name'              => 'Editeur classique',
                'title'             => __('LEBOSTUDIO EDITEUR CLASSIQUE'),
                'description'       => __('Editeur classique'),
                'render_template'   => $block_path . 'editeur.php',
                'category'          => 'lebostudio',
            ),
            array(
                'name'              => 'Bouton',
                'title'             => __('LEBOSTUDIO BOUTON'),
                'description'       => __('Bouton lebostudio'),
                'render_template'   => $block_path . 'boutons.php',
                'enqueue_style'     => $css_path. 'boutons.css',
                'category'          => 'lebostudio',
            )
        );
        

        // Register a testimonial block.
        foreach($blocks as $block){
            acf_register_block_type($block);
        }
        
    }
}

/**
 * Convert array to css rules
 */
function convert_array_css($array){             
    return implode(';', array_map(
        function ($v, $k) { return sprintf("%s:%s", $k, $v); },
        $array,
        array_keys($array)
    ));
}

/**
 * Custom editor styles
 */

create_custom_style_select('my_custom_styles', 'My Custom Styles', [

    // Repeat this for a tree menu:
    [
        'title' => 'Headers',
        'items' => [
            // Repeat this for sub items:
            [
                'title' => 'Header 1',
                'block' => 'h1',
            ],
            // ...
        ]
    ],

    // Repeat this for a top level style:
    [
        'title' => 'Paragraph',
        'block' => 'p'
    ],
    // ...

    // An object with all available properties:
    [
        'title' => 'Title',
        'block' => 'h1',
        'inline' => 'b',
        'classes' => 'the-class',
        'styles' => [ 'font-weight' => 'bold' ],
        'selector' => ''
    ]
]);


$custom_style_select_styles = array();

function create_custom_style_select($id, $title, $styles)
{
    global $custom_style_select_styles;
    $custom_style_select_styles[] = array(
        'id' => $id,
        'title' => $title,
        'styles' => $styles
    );
}


// 2. Create available wysiwyg toolbars:
global $custom_style_select_js_output;
$custom_style_select_js_output = false;
add_filter('acf/fields/wysiwyg/toolbars', function($toolbars) {
    // Uncomment to view current format of $toolbars:
    // echo "<pre>";
    // print_r($toolbars); 
    // echo "</pre>";

    return [
        'Full' => [
            // Full list, in original order: 
            1 => [
                'fontsizeselect',
                'styleselect',
                'formatselect',
                'bold',
                'italic',
                'strikethrough',
                'bullist',
                'numlist',
                'blockquote',
                'alignleft',
                'aligncenter',
                'alignright',
                'link',
                'unlink',
                'wp_more',
                'spellchecker',
                'forecolor',
                'separator',
                
            ]
        ]
        // Create others here
    ];
});


add_action('acf/input/admin_head', function()
{
    global $custom_style_select_styles, $custom_style_select_js_output;

    // Prevent duplicate output
    if ($custom_style_select_js_output)
        return;
    $custom_style_select_js_output = true;

    ?>
    <script type="text/javascript">

        var styles = <?=json_encode($custom_style_select_styles)?>;

        acf.add_filter('wysiwyg_tinymce_settings', function (settings) {
            var newFormats = [];
            var count = 0;

            function createMenu(items) {
                if (!items) {
                    return;
                }

                var menu = [];

                for (var i = 0, len = items.length; i < len; i++) {
                    var item = items[i];

                    var menuItem = {
                        text: item.title,
                        icon: item.icon
                    };

                    if (item.items) {
                        menuItem.menu = createMenu(item.items);
                    }
                    else {
                        var formatName = item.format || 'custom' + count++;

                        if (!item.format) {
                            item.name = formatName;
                            newFormats.push(item);
                        }

                        menuItem.format = formatName;
                        menuItem.cmd = item.cmd;
                    }

                    menu.push(menuItem);
                }

                return menu;
            }

            settings._oldSetup = settings.setup;
            settings.setup = function (editor) {
                if (settings._oldSetup && settings._oldSetup !== settings.setup)
                    settings._oldSetup(editor);

                editor.on('init', function () {
                    for (var i = 0, len = newFormats.length; i < len; i++) {
                        var format = newFormats[i];
                        editor.formatter.register(format.name, format);
                    }
                });

                for (var i = 0, len = styles.length; i < len; i++) {
                    var style = styles[i];

                    editor.addButton(style.id, {
                        type: 'menubutton',
                        text: style.title,
                        menu: {
                            type: 'menu',
                            items: createMenu(style.styles),
                            onPostRender: function (e) {
                                editor.fire('renderFormatsMenu', {control: e.control});
                            },
                            itemDefaults: {
                                preview: true,

                                textStyle: function () {
                                    if (this.settings.format) {
                                        return editor.formatter.getCssText(this.settings.format);
                                    }
                                },

                                onPostRender: function () {
                                    var self = this;

                                    self.parent().on('show', function () {
                                        var formatName, command;

                                        formatName = self.settings.format;
                                        if (formatName) {
                                            self.disabled(!editor.formatter.canApply(formatName));
                                            self.active(editor.formatter.match(formatName));
                                        }

                                        command = self.settings.cmd;
                                        if (command) {
                                            self.active(editor.queryCommandState(command));
                                        }
                                    });
                                },

                                onclick: function () {
                                    if (this.settings.format) {
                                        editor.execCommand('mceToggleFormat', false, this.settings.format);
                                    }

                                    if (this.settings.cmd) {
                                        editor.execCommand(this.settings.cmd);
                                    }
                                }
                            }
                        }
                    });
                }
            };

            return settings;
        });
    </script>
    <?php
});