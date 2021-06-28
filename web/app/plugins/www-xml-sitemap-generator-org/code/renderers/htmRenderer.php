<?php

namespace xmlSitemapGenerator;


	
	class htmRenderer extends rendererCore implements iSitemapRenderer
	{
		
		
		private function renderItem( $url)
		{
			
			 echo '<li>'  ;
				echo '<a href="' . htmlspecialchars($url->location) . '">';
				echo $url->title;
				echo '</a>';
			 echo "</li>\n" ;
		}
		
		public function renderIndex($urls)
		{
			 $this->doRender("Wordpress HTML Sitemap Index", $urls);
		}
		public function renderPages($urls)
		{
			$this->doRender("Wordpress HTML Sitemap", $urls);
		}
		public function doRender($title, $urls){
			
		  	ob_get_clean();
			header('Content-Type: text/html; charset=utf-8');
		 	ob_start();
			
			$this->renderComment();
			
			$this->renderHeader($title);
			
			echo  "<ul>\n";
			foreach( $urls as $url ) 
			{
				
				$this->renderItem($url);
			}	
			echo  "</ul>\n";
	
	
			$this->renderFooter();
			
			$this->renderComment();
			
			echo  "\n";

			ob_end_flush();
			
		}
		
		function renderHeader($title)
		{
			?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!--Created using XmlSitemapGenerator.org WordPress Plugin - Free HTML, RSS and XML sitemap generator -->
<head>
    <title>WordPress Sitemap Generator</title>
    <meta id="MetaDescription" name="description" content="WordPress Sitemap created using XmlSitemapGenerator.org - the free online Google XML sitemap generator" />
    <meta id="MetaKeywords" name="keywords" content="XML, HTML, Sitemap Generator, Wordpress" />
    <meta content="Xml Sitemap Generator .org" name="Author" />
    <style>
	  body {font-family:Tahoma, Verdana, Arial, sans-serif;font-size:1.0em; line-height:2em;}
	  #header { padding:0px; margin-top:10px; margin-bottom:20px;}
	  a {text-decoration:none; color:blue;}

    </style>
</head>
<body>

    <h1><?php echo $title ?></h1>

		<div id="header">
		<p>
			This is an HTML Sitemap which helps search engines find all your pages.<br />
			This is useful for search engines and spiders that do not support the XML Sitemap format.<br />
			For more information and support go to <a href="https://xmlsitemapgenerator.org/wordpress-sitemap-generator-plugin.aspx"
			title="WordPress XML Sitemap Generator Plugin" target="_blank" >Wordpress Sitemap Generator Plugin</a> homepage. <br />
		  </p>
		</div>
			
			
		<?php 
		}	
		static function renderFooter()
		{
			?>
			
			
		<div id="xsgFooter">Generated by XmlSitemapGenerator.org -
							<a href="https://xmlsitemapgenerator.org/wordpress-sitemap-generator-plugin.aspx" 
								 target="_blank"	title="WordPress XML Sitemap Generator Plugin">
									WordPress XML Sitemap Generator Plugin</a>
		</div>	
	
 

</body>
</html>

		<?php
	}
		
}
		

	
?>