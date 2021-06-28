/**
 * Colega Shortcodes Gutenberg Blocks
 *
 */
( function( blocks, blockEditor, i18n, element, components ) {
	var el = element.createElement;
	var __ = i18n.__;
	var RichText = blockEditor.RichText;
	var PlainText = blockEditor.PlainText;
	var MediaPlaceHolder = blockEditor.MediaPlaceHolder;
	var TextControl = components.TextControl;
	var TextareaControl = components.TextareaControl;
	var RangeControl = components.RangeControl;
	var ColorPaletteControl = components.ColorPalette;
	var SelectControl = components.SelectControl;
	var InspectorControls = blockEditor.InspectorControls;
	var MediaUpload = blockEditor.MediaUpload;
	var InnerBlocks = blockEditor.InnerBlocks;
	var AlignmentToolbar = blockEditor.AlignmentToolbar;
	var BlockControls = blockEditor.BlockControls;
 	
	/** Utils **/
	function normalizeUndef( x ){
		
		if (typeof x === 'undefined'){
			
			 return '';
		}
		else{
			
			return x;
		}
	}
	
	/** Container **/
	blocks.registerBlockType( 'colega-gutenberg/container', {
		title: __( 'Colega: Container', 'colega-gutenberg' ),
		icon: 'analytics',
		category: 'colega-block-category',
		attributes: {
			background_color: {
				type: 'string',
				default: '#f2f2f2'
			},
			padding_top: {
				type: 'number',
				default: 0
			},
			padding_bottom: {
				type: 'number',
				default: 0
			},
			padding_left: {
				type: 'number',
				default: 0
			},
			padding_right: {
				type: 'number',
				default: 0
			},
			alignment: {
				type: 'string',
				default: 'left'
			},
		}, 
		
		keywords: [ __( 'colega', 'colega-gutenberg'), __( 'shortcode', 'colega-gutenberg' ), __( 'container', 'colega-gutenberg' ) ],
		
		edit: function( props ) {
			
			const colors = [ 
				{ name: 'Default', color: '#f2f2f2' }, 
				{ name: 'White', color: '#ffffff' }, 
				{ name: 'Light Grey', color: '#bbbbbb' }, 
				{ name: 'Dark Grey', color: '#555555' }, 
				{ name: 'Black', color: '#000' },
			];
			
			function onChangeAlignment( newAlignment ) {
				props.setAttributes( { alignment: newAlignment === undefined ? 'none' : newAlignment } );
			}
			
			return	[ el( BlockControls,
							{ key: 'controls' },
							el(
								AlignmentToolbar,
								{
									value: props.attributes.alignment,
									onChange: onChangeAlignment,
								}
							)
						),
						el( 'div', { className: 'clapat-editor-block-wrapper clapat-editor-container'},
							el( 'h4', { className: 'clapat-editor-block-title' }, __('Colega Container', 'colega-gutenberg' )),
							el( InnerBlocks, {} ),
							/*
							 * InspectorControls lets you add controls to the Block sidebar.
							 */
							el( InspectorControls, {},
								el( 'div', { className: 'components-panel__body is-opened' }, 
									el( 'strong', {}, __('Select Background Color:',  'colega-gutenberg') ),
									el( 'div', { className : 'clapat-color-palette' },
										el( ColorPaletteControl, {
											colors: colors,
											value: props.attributes.background_color,
											onChange: ( value ) => { 
												props.setAttributes( { background_color: value === undefined ? 'transparent' : value } ); 
											},
										} )
									),
									el( 'div', { className : 'clapat-range-control' }, 
										el( RangeControl, {
											label: __('Padding Top (in pixels)',  'colega-gutenberg'),
											value: props.attributes.padding_top,
											onChange: ( value ) => { 
												if (typeof value === "undefined") return;
												props.setAttributes( { padding_top: value } ); 
											},
											type: 'number',
											step: 10,
											min: 0,
											max: 100
										} ) ),
									el( 'div', { className : 'clapat-range-control' }, 
										el( RangeControl, {
											label: __('Padding Bottom (in pixels)',  'colega-gutenberg'),
											value: props.attributes.padding_bottom,
											onChange: ( value ) => {
												if (typeof value === "undefined") return;
												props.setAttributes( { padding_bottom: value } ); 
											},
											type: 'number',
											step: 10,
											min: 0,
											max: 100
										} ) ),
									el( 'div', { className : 'clapat-range-control' }, 
										el( RangeControl, {
											label: __('Padding Left (in pixels)',  'colega-gutenberg'),
											value: props.attributes.padding_left,
											onChange: ( value ) => {
												if (typeof value === "undefined") return;
												props.setAttributes( { padding_left: value } );
											},
											type: 'number',
											step: 10,
											min: 0,
											max: 100
										} ) ),
									el( 'div', { className : 'clapat-range-control' }, 
										el( RangeControl, {
											label: __('Padding Right (in pixels)',  'colega-gutenberg'),
											value: props.attributes.padding_right,
											onChange: ( value ) => {
												if (typeof value === "undefined") return;
												props.setAttributes( { padding_right: value } );
											},
											type: 'number',
											step: 10,
											min: 0,
											max: 100
										} ) )
									)
								)
							) ];
		},

		save: function( props ) {
			
			return el( 'div', 
							{ 
								className: props.className,
								style : {
									'background-color': props.attributes.background_color,
									'padding-top': (props.attributes.padding_top !== 0) ? props.attributes.padding_top + 'px' : null,
									'padding-bottom': (props.attributes.padding_bottom !== 0) ? props.attributes.padding_bottom + 'px' : null,
									'padding-left': (props.attributes.padding_left !== 0) ? props.attributes.padding_left + 'px' : null,
									'padding-right': (props.attributes.padding_right !== 0) ? props.attributes.padding_right + 'px' : null,
									'text-align': props.attributes.alignment
								}
							}, InnerBlocks.Content() );
	
		},
	} );
	
	/** Half Background Container **/
	blocks.registerBlockType( 'colega-gutenberg/half-background-container', {
		title: __( 'Colega: Half Background Container', 'colega-gutenberg' ),
		icon: 'analytics',
		category: 'colega-block-category',
		attributes: {
			background_color: {
				type: 'string',
				default: '#141414'
			},
			background_type: {
				type: 'string',
				default: 'half-dark-section'
			},
		},
		
		keywords: [ __( 'colega', 'colega-gutenberg'), __( 'shortcode', 'colega-gutenberg' ), __( 'container', 'colega-gutenberg' ) ],
		
		edit: function( props ) {
			
			const colors = [ 
				{ name: 'Default', color: '#f2f2f2' }, 
				{ name: 'White', color: '#ffffff' }, 
		
			];
			return	[ el( 'div', { className: 'clapat-editor-block-wrapper clapat-editor-container'},
							el( 'h4', { className: 'clapat-editor-block-title' }, __('Half Background Container', 'colega-gutenberg' )),
							el( InnerBlocks, {} ),
							/*
							 * InspectorControls lets you add controls to the Block sidebar.
							 */
							el( InspectorControls, {},
								el( 'div', { className: 'components-panel__body is-opened' }, 
									el( 'strong', {}, __('Select Background Color:',  'colega-gutenberg') ),
									el( 'div', { className : 'clapat-color-palette' },
										el( ColorPaletteControl, {
											colors: colors,
											value: props.attributes.background_color,
											onChange: ( value ) => { 
												props.setAttributes( { background_color: value === undefined ? 'transparent' : value } ); 
											},
										} )
									),
									el( SelectControl, {
										label: __('Background Type', 'colega-gutenberg'),
										value: props.attributes.background_type,
										options : [
											{ label: __('Dark', 'colega-gutenberg'), value: 'half-dark-section' },
											{ label: __('White',  'colega-gutenberg'), value: 'half-white-section' },
										],
										onChange: ( value ) => { props.setAttributes( { background_type: value } ); },
									} ),
								)
							)
						) ];
		},
		save: function( props ) {
		
			return el( 'div', 
							{ 
								className: 'row-half-color ' + props.attributes.background_type + ' ' + props.className,
								'data-bgcolor' : props.attributes.background_color
							}, InnerBlocks.Content() );
		},
	} );
	
	/** Button **/
	blocks.registerBlockType( 'colega-gutenberg/button', {
		title: __( 'Colega: Button', 'colega-gutenberg' ),
		icon: 'editor-removeformatting',
		category: 'colega-block-category',
		attributes: {
			caption: {
				type: 'string',
				default: __( 'Caption', 'colega-gutenberg' )
			},
			hover_caption: {
				type: 'string',
				default: __( 'Hover Caption', 'colega-gutenberg' )
			},
			link: {
				type: 'string',
				default: 'http://'
			},
			target: {
				type: 'string',
				default: '_blank'
			},
			type: {
				type: 'string',
				default: 'normal'
			},
			rounded: {
				type: 'string',
				default: 'yes'
			},
		},
		
		keywords: [ __( 'colega', 'colega-gutenberg'), __( 'shortcode', 'colega-gutenberg' ), __( 'button', 'colega-gutenberg' ) ],
		
		edit: function( props ) {
			
			return [
				
				 el( 'div', { className: 'clapat-editor-block-wrapper'},  
					
						el( 'h4', { className: 'clapat-editor-block-title' }, __('Colega Button', 'colega-gutenberg' )),
						
						el( PlainText,
						{
							className: 'clapat-inline-caption',
							value: props.attributes.caption,
							onChange: ( value ) => { props.setAttributes( { caption: value } ); },
						}),
						el( PlainText,
						{
							className: 'clapat-inline-caption',
							value: props.attributes.hover_caption,
							onChange: ( value ) => { props.setAttributes( { hover_caption: value } ); },
						}),
						el( PlainText,
						{
							className: 'clapat-inline-content',
							value: props.attributes.link,
							onChange: ( value ) => { props.setAttributes( { link: value } ); },
						}),
						
						/*
						 * InspectorControls lets you add controls to the Block sidebar.
						 */
						el( InspectorControls, {},
							el( 'div', { className: 'components-panel__body is-opened' }, 
								el( SelectControl, {
									label: __('Type', 'colega-gutenberg'),
									value: props.attributes.type,
									options : [
										{ label: __('Normal', 'colega-gutenberg'), value: 'normal' },
										{ label: __('Outline',  'colega-gutenberg'), value: 'outline' },
									],
									onChange: ( value ) => { props.setAttributes( { type: value } ); },
								} ),
								el( SelectControl, {
									label: __('Rounded', 'colega-gutenberg'),
									value: props.attributes.rounded,
									options : [
										{ label: __('Yes', 'colega-gutenberg'), value: 'yes' },
										{ label: __('No',  'colega-gutenberg'), value: 'no' },
									],
									onChange: ( value ) => { props.setAttributes( { rounded: value } ); },
								} ),
								el( SelectControl, {
									label: __('Link Target', 'colega-gutenberg'),
									value: props.attributes.target,
									options: [
										{ label: 'Blank', value: '_blank' },
										{ label: 'Self', value: '_self' },
									],
									onChange: ( value ) => { props.setAttributes( { target: value } ); },
								} ),
							),
						),
					)
			]
		},
		save: function( props ) {
		
			return '[button link="' + props.attributes.link + '" target="' + props.attributes.target + '" hover_caption="' + props.attributes.hover_caption + '" type="' + props.attributes.type + '" rounded="' + props.attributes.rounded + '" extra_class_name=""]' + props.attributes.caption + '[/button]'; 
		},
	} );
	
	/** Text Link **/
	blocks.registerBlockType( 'colega-gutenberg/text-link', {
		title: __( 'Colega: Text Link', 'colega-gutenberg' ),
		icon: 'admin-links',
		category: 'colega-block-category',
		attributes: {
			caption: {
				type: 'string',
				default: __( 'Read More', 'colega-gutenberg' )
			},
			link: {
				type: 'string',
				default: 'http://'
			},
			target: {
				type: 'string',
				default: '_blank'
			}
		},
		
		keywords: [ __( 'colega', 'colega-gutenberg'), __( 'shortcode', 'colega-gutenberg' ), __( 'text', 'colega-gutenberg' ), __( 'link', 'colega-gutenberg' ) ],
		
		edit: function( props ) {
			
			return [
				
				 el( 'div', { className: 'clapat-editor-block-wrapper'},  
					
						el( 'h4', { className: 'clapat-editor-block-title' }, __('Colega Text Link', 'colega-gutenberg' )),
						
						el( PlainText,
						{
							className: 'clapat-inline-caption',
							value: props.attributes.caption,
							onChange: ( value ) => { props.setAttributes( { caption: value } ); },
						}),
						el( PlainText,
						{
							className: 'clapat-inline-content',
							value: props.attributes.link,
							onChange: ( value ) => { props.setAttributes( { link: value } ); },
						}),
						
						/*
						 * InspectorControls lets you add controls to the Block sidebar.
						 */
						el( InspectorControls, {},
							el( 'div', { className: 'components-panel__body is-opened' }, 
								el( SelectControl, {
									label: __('Link Target', 'colega-gutenberg'),
									value: props.attributes.target,
									options: [
										{ label: 'Blank', value: '_blank' },
										{ label: 'Self', value: '_self' },
									],
									onChange: ( value ) => { props.setAttributes( { target: value } ); },
								} ),
							),
						),
					)
			]
		},
		save: function( props ) {
		
			return '[text_link link="' + props.attributes.link + '" target="' + props.attributes.target + '" caption="' + props.attributes.caption + '" extra_class_name=""][/text_link]'; 
		},
	} );
	
	/** Title **/
	blocks.registerBlockType( 'colega-gutenberg/title', {
		title: __( 'Colega: Title', 'colega-gutenberg' ),
		icon: 'editor-textcolor',
		category: 'colega-block-category',
		attributes: {
			caption: {
				type: 'string',
				default: 'Title'
			},
			size: {
				type: 'string',
				default: 'h1'
			},
			underline: {
				type: 'string',
				default: 'no'
			},
			big: {
				type: 'string',
				default: 'no'
			}
		},
		
		keywords: [ __( 'colega', 'colega-gutenberg'), __( 'shortcode', 'colega-gutenberg' ), __( 'title', 'colega-gutenberg' ) ],
		
		edit: function( props ) {
			
			if( props.attributes.underline == 'yes'){
				
				props.className = 'title-has-line';
			}
			if( props.attributes.big == 'yes'){
				
				props.className += ' big-title';
			}
			
			return [
				
				 el(  props.attributes.size, { className: props.className }, props.attributes.caption ),
				 
				/*
				 * InspectorControls lets you add controls to the Block sidebar.
				 */
				el( InspectorControls, {},
					el( 'div', { className: 'components-panel__body is-opened' }, 
						el( TextControl, {
							label: __('Caption', 'colega-gutenberg'),
							value: props.attributes.caption,
							onChange: ( value ) => { props.setAttributes( { caption: value } ); },
						} ),
						el( SelectControl, {
							label: __('Size', 'colega-gutenberg'),
							value: props.attributes.size,
							options: [
								{ label: 'H1', value: 'h1' },
								{ label: 'H2', value: 'h2' },
								{ label: 'H3', value: 'h3' },
								{ label: 'H4', value: 'h4' },
								{ label: 'H5', value: 'h5' },
								{ label: 'H6', value: 'h6' },
							],
							onChange: ( value ) => { props.setAttributes( { size: value } ); },
						} ),
						el( SelectControl, {
							label: __('Underline',  'colega-gutenberg'),
							value: props.attributes.underline,
							options : [
								{ label: __('Yes',  'colega-gutenberg'), value: 'yes' },
								{ label: __('No',  'colega-gutenberg'), value: 'no' },
							],
							onChange: ( value ) => { props.setAttributes( { underline: value } ); },
						} ),
						el( SelectControl, {
							label: __('Big', 'colega-gutenberg'),
							value: props.attributes.big,
							options: [
								{ label: __('Yes',  'colega-gutenberg'), value: 'yes' },
								{ label: __('No',  'colega-gutenberg'), value: 'no' },
							],
							onChange: ( value ) => { props.setAttributes( { big: value } ); },
						} ),
					),
				),
			]
		},
		save: function( props ) {
			
			if( props.attributes.underline == 'yes'){
				
				props.className = 'title-has-line';
			}
			if( props.attributes.big == 'yes'){
				
				props.className += ' big-title';
			}
			
			return el(  props.attributes.size, { className: props.className }, props.attributes.caption );
		},
	} );
	
	/** Marquee Content **/
	blocks.registerBlockType( 'colega-gutenberg/marquee-content', {
		title: __( 'Colega: Marquee Content', 'colega-gutenberg' ),
		icon: 'editor-textcolor',
		category: 'colega-block-category',
		attributes: {
			caption: {
				type: 'string',
				default: 'Content'
			},
		},
		
		keywords: [ __( 'colega', 'colega-gutenberg'), __( 'shortcode', 'colega-gutenberg' ), __( 'marquee content', 'colega-gutenberg' ) ],
		
		edit: function( props ) {
			
			return [
			
					el( 'div', { className: 'clapat-editor-block-wrapper'},  
					
						el( 'h4', { className: 'clapat-editor-block-title' }, __('Colega Marquee Content', 'colega-gutenberg' )),
						
						el( PlainText,
						{
							className: 'clapat-inline-caption',
							value: props.attributes.content,
							onChange: ( value ) => { props.setAttributes( { content: value } ); },
						}),
					
					)
			]
		},
		save: function( props ) {
		
			return '[marquee_content extra_class_name=""]' + props.attributes.content + '[/marquee_content]'; 
		},			
			
	} );

	/** Accordion **/
	const template_clapat_accordion = [
	  [ 'colega-gutenberg/accordion-item', {} ], // [ blockName, attributes ]
	];
	
	blocks.registerBlockType( 'colega-gutenberg/accordion', {
		title: __( 'Colega: Accordion', 'colega-gutenberg' ),
		icon: 'editor-justify',
		category: 'colega-block-category',
		allowedBlocks: ['colega-gutenberg/accordion-item'],

		keywords: [ __( 'clapat', 'colega-gutenberg'), __( 'shortcode', 'colega-gutenberg' ), __( 'accordion', 'colega-gutenberg' ) ],
		
		edit: function( props ) {
			
			return	el( 'div', { className: 'clapat-editor-block-wrapper'},
							el( 'h4', { className: 'clapat-editor-block-title' }, __('Colega Accordion', 'clapat-blog-gutenberg' )),
							el( InnerBlocks, {allowedBlocks: ['colega-gutenberg/accordion-item'], template: template_clapat_accordion} )
						);

		},

		save: function( props ) {
			
			return el( 'dl', { className: 'accordion ' + props.className }, InnerBlocks.Content() );
	
		},
	} );
	
	blocks.registerBlockType( 'colega-gutenberg/accordion-item', {
		title: __( 'Colega: Accordion Item', 'colega-gutenberg' ),
		icon: 'editor-justify',
		category: 'colega-block-category',
		parent: [ 'colega-gutenberg/accordion' ],

		attributes: {
			title: {
				type: 'string',
				default: __( 'Accordion Title. Click to edit it.', 'colega-gutenberg')
			},
			content: {
				type: 'string',
				default: __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non est nec orci ultricies fringilla. Nam ultrices sem in odio scelerisque, sed mollis magna tincidunt.', 'colega-gutenberg')
			}
		},

		edit: function( props ) {
			
			return [
			
				el( 'div', { className: 'clapat-editor-block-wrapper'},  
					
					el( PlainText,
					{
						className: 'clapat-inline-caption',
						value: props.attributes.title,
						onChange: ( value ) => { props.setAttributes( { title: value } ); },
					}),
					
					el( PlainText, {
						className: 'clapat-inline-content',
						value: props.attributes.content,
						onChange: ( value ) => { props.setAttributes( { content: value } ); },
					} ),
				),
				
			];
		},

		save: function( props ) {
			
			return '[accordion_item title="' + props.attributes.title + '"]' + props.attributes.content + '[/accordion_item]'; 

		},
	} );
	
	/** Icon Service **/
	blocks.registerBlockType( 'colega-gutenberg/icon-service', {
		title: __( 'Colega: Icon Service', 'colega-gutenberg' ),
		icon: 'editor-justify',
		category: 'colega-block-category',
		attributes: {
			icon: {
				type: 'string',
				default: __( 'fa fa-cogs', 'colega-gutenberg')
			},
			title: {
				type: 'string',
				default: __( 'Icon Service Title. Click to edit it.', 'colega-gutenberg')
			},
			content: {
				type: 'string',
				default: __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non est nec orci ultricies fringilla. Nam ultrices sem in odio scelerisque, sed mollis magna tincidunt.', 'colega-gutenberg')
			},
			
		},
		
		keywords: [ __( 'colega', 'colega-gutenberg'), __( 'shortcode', 'colega-gutenberg' ),  __( 'icon', 'colega-gutenberg' ) ],
		
		edit: function( props ) {
			
			return [
				
				el( 'div', { className: 'clapat-editor-block-wrapper'},  
					
					el( 'h4', { className: 'clapat-editor-block-title' }, __( 'Colega Icon Box', 'colega-gutenberg' ) ),
					
					el( PlainText,
					{
						className: 'clapat-inline-caption',
						value: props.attributes.icon,
						onChange: ( value ) => { props.setAttributes( { icon: value } ); },
					}),
					
					el( PlainText,
					{
						className: 'clapat-inline-caption',
						value: props.attributes.title,
						onChange: ( value ) => { props.setAttributes( { title: value } ); },
					}),
					
					el( PlainText, {
						className: 'clapat-inline-content',
						value: props.attributes.content,
						onChange: ( value ) => { props.setAttributes( { content: value } ); },
					} ),
					
				),
				 
			]
		},
		save: function( props ) {
			
			return '[service icon="' + props.attributes.icon + '" title="' + props.attributes.title + '" extra_class_name=""]' + props.attributes.content + '[/service]'; 
		},
	} );
	
	/** Contact Box **/
	blocks.registerBlockType( 'colega-gutenberg/contact-box', {
		title: __( 'Colega: Contact Box', 'colega-gutenberg' ),
		icon: 'phone',
		category: 'colega-block-category',
		attributes: {
			icon: {
				type: 'string',
				default: __( 'fa fa-envelope', 'colega-gutenberg')
			},
			title: {
				type: 'string',
				default: __( 'Contact Box Title. Click to edit it.', 'colega-gutenberg')
			},
			content: {
				type: 'string',
				default: __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non est nec orci ultricies fringilla. Nam ultrices sem in odio scelerisque, sed mollis magna tincidunt.', 'colega-gutenberg')
			},
			
		},
		
		keywords: [ __( 'colega', 'colega-gutenberg'), __( 'shortcode', 'colega-gutenberg' ),  __( 'contact', 'colega-gutenberg' ) ],
		
		edit: function( props ) {
			
			return [
				
				el( 'div', { className: 'clapat-editor-block-wrapper'},  
					
					el( 'h4', { className: 'clapat-editor-block-title' }, __( 'Colega Icon Box', 'colega-gutenberg' ) ),
					
					el( PlainText,
					{
						className: 'clapat-inline-caption',
						value: props.attributes.icon,
						onChange: ( value ) => { props.setAttributes( { icon: value } ); },
					}),
					
					el( PlainText,
					{
						className: 'clapat-inline-caption',
						value: props.attributes.title,
						onChange: ( value ) => { props.setAttributes( { title: value } ); },
					}),
					
					el( PlainText, {
						className: 'clapat-inline-content',
						value: props.attributes.content,
						onChange: ( value ) => { props.setAttributes( { content: value } ); },
					} ),
					
				),
				 
			]
		},
		save: function( props ) {
			
			return '[contact_box icon="' + props.attributes.icon + '" title="' + props.attributes.title + '" extra_class_name=""]' + props.attributes.content + '[/contact_box]'; 
		},
	} );
	
	/** Image Collage **/
	const template_clapat_collage = [
	  [ 'colega-gutenberg/collage-image', {} ], // [ blockName, attributes ]
	];
	
	blocks.registerBlockType( 'colega-gutenberg/collage', {
		title: __( 'Colega: Collage', 'colega-gutenberg' ),
		icon: 'layout',
		category: 'colega-block-category',
		allowedBlocks: ['colega-gutenberg/collage-image'],
		
		keywords: [ __( 'colega', 'colega-gutenberg'), __( 'shortcode', 'colega-gutenberg' ), __( 'collage', 'colega-gutenberg' ) ],
		
		edit: function( props ) {
			
			return	el( 'div', { className: 'clapat-editor-block-wrapper clapat-editor-collage'},
							el( 'h4', { className: 'clapat-editor-block-title' }, __('Colega Collage', 'colega-gutenberg' )),
							el( InnerBlocks, {allowedBlocks: ['colega-gutenberg/collage-image'], template: template_clapat_collage} )
						);

		},

		save: function( props ) {
			
			return el( 'div', {id: 'justified-grid', className: props.className }, InnerBlocks.Content() );
	
		},
	} );
	
	blocks.registerBlockType( 'colega-gutenberg/collage-image', {
		title: __( 'Colega: Collage Image', 'colega-gutenberg' ),
		icon: 'format-image',
		category: 'colega-block-category',
		parent: [ 'colega-gutenberg/collage' ],

		attributes: {
			thumb_image: {
				type: 'string',
				default: ''
			},
			thumb_image_id: {
				type: 'number',
			},
			full_image: {
				type: 'string',
				default: ''
			},
			full_image_id: {
				type: 'number',
			},
			alt: {
				type: 'string',
				default: ''
			},
			info: {
				type: 'string',
				default: __( 'Caption Text', 'colega-gutenberg' )
			},
		},

		edit: function( props ) {
			
			var onSelectThumbnailImage = function( media ) {
				return props.setAttributes( {
					thumb_image: media.url,
					thumb_image_id: media.id,
				} );
			};
			var onSelectImage = function( media ) {
				return props.setAttributes( {
					full_image: media.url,
					full_image_id: media.id,
				} );
			};
			return [
			
				el( 'div', { className: 'clapat-editor-block-wrapper'},  
					
					el( 'div', { className: 'clapat-editor-image' },
						el( MediaUpload, {
							onSelect: onSelectThumbnailImage,
							type: 'image',
							value: props.attributes.thumb_image_id,
							render: function( obj ) {
								return el( components.Button, {
										className: props.attributes.thumb_image_id ? 'clapat-image-added' : 'button button-large',
										onClick: obj.open
									},
									! props.attributes.thumb_image_id ? i18n.__( 'Upload Collage Thumbnail Image', 'colega-gutenberg' ) : el( 'img', { src: props.attributes.thumb_image } ),
									el ('p', {}, __( 'Thumb Image', 'colega-gutenberg' ) )
								);
							}
						} )
					),
					
					el( 'div', { className: 'clapat-editor-image' },
						el( MediaUpload, {
							onSelect: onSelectImage,
							type: 'image',
							value: props.attributes.full_image_id,
							render: function( obj ) {
								return el( components.Button, {
										className: props.attributes.full_image_id ? 'clapat-image-added' : 'button button-large',
										onClick: obj.open
									},
									! props.attributes.full_image_id ? i18n.__( 'Upload Collage Full Image', 'colega-gutenberg' ) : el( 'img', { src: props.attributes.full_image } ),
									el ('p', {}, __( 'Full Image', 'colega-gutenberg' ) )
								);
							}
						} )
					),

				),
				/*
				 * InspectorControls lets you add controls to the Block sidebar.
				 */
				el( InspectorControls, {},
					el( 'div', { className: 'components-panel__body is-opened' }, 
						el( TextControl, {
							label: __( 'ALT attribute', 'colega-gutenberg' ),
							value: props.attributes.alt,
							onChange: ( value ) => { props.setAttributes( { alt: value } ); },
						} ),
						
						el( TextControl, {
							label: __( 'Collage Image Info', 'colega-gutenberg' ),
							value: props.attributes.info,
							onChange: ( value ) => { props.setAttributes( { info: value } ); },
						} ),
					),
				),
			];
		},

		save: function( props ) {
			
			return '[clapat_collage_image thumb_img_url="' + props.attributes.thumb_image + '" img_url="' + props.attributes.full_image + '" alt="' + props.attributes.alt + '" info="' + props.attributes.info + '"][/clapat_collage_image]'; 

		},
	} );
	
	/** Image Carousel **/
	const template_clapat_image_carousel = [
	  [ 'colega-gutenberg/carousel-image', {} ], // [ blockName, attributes ]
	];
	
	blocks.registerBlockType( 'colega-gutenberg/carousel', {
		title: __( 'Colega: Image Carousel', 'colega-gutenberg' ),
		icon: 'slides',
		category: 'colega-block-category',
		allowedBlocks: ['colega-gutenberg/carousel-image'],
		attributes: {
			loop: {
				type: 'string',
				default: 'no'
			}
		},
		keywords: [ __( 'colega', 'colega-gutenberg'), __( 'shortcode', 'colega-gutenberg' ), __( 'carousel', 'colega-gutenberg' ) ],
		
		edit: function( props ) {
			
			return	[
							el( 'div', { className: 'clapat-editor-block-wrapper clapat-editor-carousel'},
								el( 'h4', { className: 'clapat-editor-block-title' }, __('Colega Carousel', 'colega-gutenberg' )),
								el( InnerBlocks, {allowedBlocks: ['colega-gutenberg/carousel-image'], template: template_clapat_image_carousel} )
							),
							/*
							 * InspectorControls lets you add controls to the Block sidebar.
							 */
							el( InspectorControls, {},
								el( 'div', { className: 'components-panel__body is-opened' }, 
									el( SelectControl, {
										label: __('Loop', 'colega-gutenberg'),
										value: props.attributes.loop,
										options : [
											{ label: __('Yes', 'colega-gutenberg'), value: 'yes' },
											{ label: __('No',  'colega-gutenberg'), value: 'no' },
										],
										onChange: ( value ) => { props.setAttributes( { loop: value } ); },
									} )
								),
							),
						];
		},

		save: function( props ) {
			
			let inner_el = el( 'div', { className: 'swiper-wrapper' }, InnerBlocks.Content() );
			let carousel_class = 'content-carousel';
			if( props.attributes.loop == 'yes' ){
				
				carousel_class = 'content-looped-carousel';
			}
			return el( 'div', { className: 'swiper-container ' + carousel_class + ' disable-drag' }, inner_el  );
	
		},
	} );
	
	blocks.registerBlockType( 'colega-gutenberg/carousel-image', {
		title: __( 'Colega: Carousel Image', 'colega-gutenberg' ),
		icon: 'format-image',
		category: 'colega-block-category',
		parent: [ 'colega-gutenberg/carousel' ],

		attributes: {
			img_url: {
				type: 'string',
				default: ''
			},
			img_id: {
				type: 'number',
			},
			alt: {
				type: 'string',
				default: ''
			},
		},

		edit: function( props ) {
			
			var onSelectImage = function( media ) {
				return props.setAttributes( {
					img_url: media.url,
					img_id: media.id,
				} );
			};
			return [
			
				el( 'div', { className: 'clapat-editor-block-wrapper'},  
					
					el( 'div', { className: 'clapat-editor-image' },
						el( MediaUpload, {
							onSelect: onSelectImage,
							type: 'image',
							value: props.attributes.img_id,
							render: function( obj ) {
								return el( components.Button, {
										className: props.attributes.img_id ? 'clapat-image-added' : 'button button-large',
										onClick: obj.open
									},
									! props.attributes.img_id ? i18n.__( 'Upload Carousel Image', 'colega-gutenberg' ) : el( 'img', { src: props.attributes.img_url } ),
									el ('p', {}, __( 'Carousel Image', 'colega-gutenberg' ) )
								);
							}
						} )
					),

				),
				/*
				 * InspectorControls lets you add controls to the Block sidebar.
				 */
				el( InspectorControls, {},
					el( 'div', { className: 'components-panel__body is-opened' }, 
						el( TextControl, {
							label: __( 'ALT attribute', 'colega-gutenberg' ),
							value: props.attributes.alt,
							onChange: ( value ) => { props.setAttributes( { alt: value } ); },
						} ),
					),
				),
			];
		},

		save: function( props ) {
			
			return '[carousel_slide img_url="' + props.attributes.img_url + '" alt="' + props.attributes.alt + '"][/carousel_slide]'; 

		},
	} );
	
	/** Image Slider **/
	const template_clapat_image_slider = [
	  [ 'colega-gutenberg/slider-image', {} ], // [ blockName, attributes ]
	];
	
	blocks.registerBlockType( 'colega-gutenberg/slider', {
		title: __( 'Colega: Image Slider', 'colega-gutenberg' ),
		icon: 'images-alt2',
		category: 'colega-block-category',
		allowedBlocks: ['colega-gutenberg/slider-image'],
		
		keywords: [ __( 'colega', 'colega-gutenberg'), __( 'shortcode', 'colega-gutenberg' ), __( 'slider', 'colega-gutenberg' ) ],
		
		edit: function( props ) {
			
			return	el( 'div', { className: 'clapat-editor-block-wrapper clapat-editor-slider'},
							el( 'h4', { className: 'clapat-editor-block-title' }, __('Colega Slider', 'colega-gutenberg' )),
							el( InnerBlocks, {allowedBlocks: ['colega-gutenberg/slider-image'], template: template_clapat_image_slider} )
						);

		},

		save: function( props ) {
			
			let inner_el = el( 'div', { className: 'swiper-wrapper' }, InnerBlocks.Content() );
			let button_next_el =  el( 'div', { className: 'slider-button-next' } );
			let button_prev_el =  el( 'div', { className: 'slider-button-prev' } );
			return el( 'div', { className: 'swiper-container content-slider disable-drag' }, inner_el, button_next_el, button_prev_el  );
	
		},
	} );
	
	blocks.registerBlockType( 'colega-gutenberg/slider-image', {
		title: __( 'Colega: Slider Image', 'colega-gutenberg' ),
		icon: 'format-image',
		category: 'colega-block-category',
		parent: [ 'colega-gutenberg/slider' ],

		attributes: {
			img_url: {
				type: 'string',
				default: ''
			},
			img_id: {
				type: 'number',
			},
			alt: {
				type: 'string',
				default: ''
			},
		},

		edit: function( props ) {
			
			var onSelectImage = function( media ) {
				return props.setAttributes( {
					img_url: media.url,
					img_id: media.id,
				} );
			};
			return [
			
				el( 'div', { className: 'clapat-editor-block-wrapper'},  
					
					el( 'div', { className: 'clapat-editor-image' },
						el( MediaUpload, {
							onSelect: onSelectImage,
							type: 'image',
							value: props.attributes.img_id,
							render: function( obj ) {
								return el( components.Button, {
										className: props.attributes.img_id ? 'clapat-image-added' : 'button button-large',
										onClick: obj.open
									},
									! props.attributes.img_id ? i18n.__( 'Upload Slider Image', 'colega-gutenberg' ) : el( 'img', { src: props.attributes.img_url } ),
									el ('p', {}, __( 'Slider Image', 'colega-gutenberg' ) )
								);
							}
						} )
					),

				),
				/*
				 * InspectorControls lets you add controls to the Block sidebar.
				 */
				el( InspectorControls, {},
					el( 'div', { className: 'components-panel__body is-opened' }, 
						el( TextControl, {
							label: __( 'ALT attribute', 'colega-gutenberg' ),
							value: props.attributes.alt,
							onChange: ( value ) => { props.setAttributes( { alt: value } ); },
						} ),
					),
				),
			];
		},

		save: function( props ) {
			
			return '[general_slide img_url="' + props.attributes.img_url + '" alt="' + props.attributes.alt + '"][/general_slide]'; 

		},
	} );
		
	/** Popup Image **/
	blocks.registerBlockType( 'colega-gutenberg/popup-image', {
		title: __( 'Colega: Popup Image', 'colega-gutenberg' ),
		icon: 'format-image',
		category: 'colega-block-category',
		
		attributes: {
			thumb_image: {
				type: 'string',
				default: ''
			},
			thumb_image_id: {
				type: 'number',
			},
			full_image: {
				type: 'string',
				default: ''
			},
			full_image_id: {
				type: 'number',
			},
			
		},

		keywords: [ __( 'colega', 'colega-gutenberg'), __( 'shortcode', 'colega-gutenberg' ), __( 'popup', 'colega-gutenberg' ) ],
		
		edit: function( props ) {
			
			var onSelectThumbnailImage = function( media ) {
				return props.setAttributes( {
					thumb_image: media.url,
					thumb_image_id: media.id,
				} );
			};
			var onSelectImage = function( media ) {
				return props.setAttributes( {
					full_image: media.url,
					full_image_id: media.id,
				} );
			};
				
			return [
			
				el( 'div', { className: 'clapat-editor-block-wrapper'},  
					
					el( 'h4', { className: 'clapat-editor-block-title' }, __( 'Clapat Popup Image', 'colega-gutenberg' )),
					
					el( 'div', { className: 'clapat-editor-image' },
						el( MediaUpload, {
							onSelect: onSelectThumbnailImage,
							type: 'image',
							value: props.attributes.thumb_image_id,
							render: function( obj ) {
								return el( components.Button, {
										className: props.attributes.thumb_image_id ? 'clapat-image-added' : 'button button-large',
										onClick: obj.open
									},
									! props.attributes.thumb_image_id ? i18n.__( 'Upload Popup Thumbnail Image', 'colega-gutenberg' ) : el( 'img', { src: props.attributes.thumb_image } ),
									el ('p', {}, __( 'Thumb Image', 'colega-gutenberg' ) )
								);
							}
						} )
					),
					
					el( 'div', { className: 'clapat-editor-image' },
						el( MediaUpload, {
							onSelect: onSelectImage,
							type: 'image',
							value: props.attributes.full_image_id,
							render: function( obj ) {
								return el( components.Button, {
										className: props.attributes.full_image_id ? 'clapat-image-added' : 'button button-large',
										onClick: obj.open
									},
									! props.attributes.full_image_id ? i18n.__( 'Upload Popup Full Image', 'colega-gutenberg' ) : el( 'img', { src: props.attributes.full_image } ),
									el ('p', {}, __( 'Full Image', 'colega-gutenberg' ) )
								);
							}
						} )
					),

				),
				
			];
		},

		save: function( props ) {
			
			return '[clapat_popup_image img_url="' + props.attributes.full_image + '" thumb_url="' + props.attributes.thumb_image + '" extra_class_name=""][/clapat_popup_image]'; 

		},
	} );
	
	/** Testimonials **/
	const template_clapat_testimonials = [
	  [ 'colega-gutenberg/testimonial', {} ], // [ blockName, attributes ]
	];

	blocks.registerBlockType( 'colega-gutenberg/testimonials', {
		title: __( 'Colega: Testimonials', 'colega-gutenberg' ),
		icon: 'editor-quote',
		category: 'colega-block-category',
		allowedBlocks: ['colega-gutenberg/testimonial'],
	
		keywords: [ __( 'colega', 'colega-gutenberg'), __( 'shortcode', 'colega-gutenberg' ), __( 'testimonial', 'colega-gutenberg' ) ],
		
		edit: function( props ) {
			
			return	el( 'div', { className: 'clapat-editor-block-wrapper'},
							el( 'h3', { className: 'clapat-editor-block-title' }, __( 'Colega Testimonials', 'colega-gutenberg' )),
							el( InnerBlocks, {allowedBlocks: ['colega-gutenberg/testimonial'], template: template_clapat_testimonials } )
						);

		},

		save: function( props ) {
			
			return el( 'div', { className: 'text-carousel' }, InnerBlocks.Content() );
	
		},
	} );
	
	blocks.registerBlockType( 'colega-gutenberg/testimonial', {
		title: __( 'Colega: Testimonial', 'colega-gutenberg' ),
		icon: 'editor-quote',
		category: 'colega-block-category',
		parent: [ 'colega-gutenberg/testimonials' ],

		attributes: {
			name: {
				type: 'string',
				default: __( 'Reviewer Name. Click to edit it.', 'colega-gutenberg' )
			},
			content: {
				type: 'string',
				default: __( 'This is a review placeholder. Click to edit it.', 'colega-gutenberg' )
			},
		},

		edit: function( props ) {
			
			var content = props.attributes.content;
			function onChangeContent( newContent ) {
				props.setAttributes( { content: newContent } );
			}
			
			return [
			
				el( 'div', { className: 'clapat-editor-block-wrapper'},  
					
					el( 'h3', { className: 'clapat-editor-block-title' }, __( 'Colega - Testimonial', 'colega-gutenberg' )),
					
					el( PlainText,
					{
						value: props.attributes.content,
						onChange: ( value ) => { props.setAttributes( { content: value } ); },
					}),
					
					el( PlainText, {
						value: props.attributes.name,
						onChange: ( value ) => { props.setAttributes( { name: value } ); },
					} ),
					
				),
				
			];
		},

		save: function( props ) {
			
			return '[testimonial name="' + props.attributes.name + '"]' + props.attributes.content + '[/testimonial]'; 

		},
	} );
	
	/** Clients **/
	const template_clapat_clients = [
	  [ 'colega-gutenberg/client', {} ], // [ blockName, attributes ]
	];

	blocks.registerBlockType( 'colega-gutenberg/clients', {
		title: __( 'Colega: Clients', 'colega-gutenberg' ),
		icon: 'businessman',
		category: 'colega-block-category',
		allowedBlocks: ['colega-gutenberg/client'],
	
		keywords: [ __( 'colega', 'colega-gutenberg'), __( 'shortcode', 'colega-gutenberg' ), __( 'client', 'colega-gutenberg' ) ],
		
		edit: function( props ) {
			
			return	el( 'div', { className: 'clapat-editor-block-wrapper'},
							el( 'h3', { className: 'clapat-editor-block-title' }, __( 'Colega Clients', 'colega-gutenberg' )),
							el( InnerBlocks, {allowedBlocks: ['colega-gutenberg/client'], template: template_clapat_clients } )
						);

		},

		save: function( props ) {
			
			return el( 'ul', { className: 'clients-table' }, InnerBlocks.Content() );
	
		},
	} );
	
	blocks.registerBlockType( 'colega-gutenberg/client', {
		title: __( 'Colega: Client', 'colega-gutenberg' ),
		icon: 'editor-quote',
		category: 'colega-block-category',
		parent: [ 'colega-gutenberg/clients' ],

		attributes: {
			img_url: {
				type: 'string',
				default: ''
			},
			img_id: {
				type: 'number',
			},
		},

		edit: function( props ) {
			
			var onSelectImage = function( media ) {
				return props.setAttributes( {
					img_url: media.url,
					img_id: media.id,
				} );
			};
			
			return [
			
				el( 'div', { className: 'clapat-editor-block-wrapper'},  
					
					el( 'div', { className: 'clapat-editor-image' },
						el( MediaUpload, {
							onSelect: onSelectImage,
							type: 'image',
							value: props.attributes.img_id,
							render: function( obj ) {
								return el( components.Button, {
										className: props.attributes.img_id ? 'clapat-image-added' : 'button button-large',
										onClick: obj.open
									},
									! props.attributes.img_id ? i18n.__( 'Upload Client Image', 'colega-gutenberg' ) : el( 'img', { src: props.attributes.img_url } ),
									el ('p', {}, __( 'Client Image', 'colega-gutenberg' ) )
								);
							}
						} )
					),
					
				),
				
			];
		},

		save: function( props ) {
			
			return '[client_item img_url="' + props.attributes.img_url + '"][/client_item]'; 

		},
	} );
	
	/** Hosted Video **/
	blocks.registerBlockType( 'colega-gutenberg/video-hosted', {
		title: __( 'Colega: Hosted Video', 'colega-gutenberg' ),
		icon: 'video-alt',
		category: 'colega-block-category',
		attributes: {
			cover_image: {
				type: 'string',
				default: ''
			},
			cover_image_id: {
				type: 'number',
			},
			webm_url: {
				type: 'string',
				default: 'http://'
			},
			mp4_url: {
				type: 'string',
				default: 'http://'
			},
			
		},
		
		keywords: [ __( 'colega', 'colega-gutenberg'), __( 'shortcode', 'colega-gutenberg' ), __( 'video', 'colega-gutenberg' ) ],
		
		edit: function( props ) {
			
			var onSelectImage = function( media ) {
				return props.setAttributes( {
					cover_image: media.url,
					cover_image_id: media.id,
				} );
			};
			
			return [
				
				 el( 'div', { className: 'clapat-editor-block-wrapper'},  
					
						el( 'h4', { className: 'clapat-editor-block-title' }, __('Colega Hosted Video', 'colega-gutenberg' )),
						
						el( 'div', { className: 'clapat-editor-image' },
							el( MediaUpload, {
								onSelect: onSelectImage,
								type: 'image',
								value: props.attributes.cover_image_id,
								render: function( obj ) {
									return el( components.Button, {
											className: props.attributes.cover_image_id ? 'clapat-image-added' : 'button button-large',
											onClick: obj.open
										},
										! props.attributes.cover_image_id ? i18n.__( 'Upload Video Cover Image', 'colega-gutenberg' ) : el( 'img', { src: props.attributes.cover_image } ),
										el ('p', {}, __( 'Cover Image', 'colega-gutenberg' ) )
									);
								}
							} ),
						),
						
						el ('p', { className: 'clapat-editor-label' }, __( 'MP4 video url:', 'colega-gutenberg' ) ),
						
						el( PlainText,
						{
							value: props.attributes.mp4_url,
							className: 'clapat-inline-content',
							onChange: ( value ) => { props.setAttributes( { mp4_url: value } ); },
						}),
						
						el ('p', { className: 'clapat-editor-label' }, __( 'Webm video url:', 'colega-gutenberg' ) ),
						
						el( PlainText,
						{
							value: props.attributes.webm_url,
							className: 'clapat-inline-content',
							onChange: ( value ) => { props.setAttributes( { webm_url: value } ); },
						}),
					)
			]
		},
		save: function( props ) {
			
			return '[colega_video cover_img_url="' + props.attributes.cover_image + '" mp4_url="' + props.attributes.mp4_url + '" webm_url="' + props.attributes.webm_url + '" extra_class_name=""][/colega_video]'; 
		},
	} );
	

	/** Google Map **/
	blocks.registerBlockType( 'colega-gutenberg/google-map', {
		title: __( 'Colega: Google Map', 'colega-gutenberg' ),
		icon: 'admin-site',
		category: 'colega-block-category',
		attributes: {	},
		
		keywords: [ __( 'colega', 'colega-gutenberg'), __( 'shortcode', 'colega-gutenberg' ),  __( 'map', 'colega-gutenberg' ) ],
		
		edit: function( props ) {
			
			return [
				
				el( 'div', { className: 'clapat-editor-block-wrapper'},  
					
					el( 'h4', { className: 'clapat-editor-block-title' }, __( 'Colega Google Map', 'colega-gutenberg' ) ),
					
					el( 'span', { className: 'clapat-inline-caption' },  __( 'Set google map properties in theme options - map.', 'colega-gutenberg' ) ),
				),
			]
		},
		save: function( props ) {
			
			return '[colega_map][/colega_map]'; 
		},
	} );
	
}(
	window.wp.blocks,
	window.wp.blockEditor,
	window.wp.i18n,
	window.wp.element,
	window.wp.components
) );
