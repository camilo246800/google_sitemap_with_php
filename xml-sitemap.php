<?php

/**
 * XML Sitemap PHP Script
 * For more info, see: https
 */

require './config.php';
require_once '/var/www/html/app/Autoload.php';
$sitemap = new ControllerSitemap();

// Encabezado para que los navegadores se muestren correctamente, con o sin XSL.
header( 'Content-Type: application/xml' );

echo '<?xml version="1.0" encoding="utf-8"?>' . "\n";

if ( isset( $xsl ) && !empty( $xsl ) )
	echo '<?xml-stylesheet type="text/xsl" href="' . SITEMAP_DIR_URL . $xsl . '"?>' . "\n";

//codificar urls
/*rawurlencode( $file ); ?></loc>*/

echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

	foreach($sitemap->programsData() as $profile):

		$date = new DateTime($profile['lastdate']);
	  
	        echo '<url>';
				echo "<loc>{$profile['profile']}</loc>";
			    echo "<lastmod>{$date->format('Y-m-d')}</lastmod>";
			    echo "<changefreq>{$freq}</changefreq>";
			    echo "<priority>{$prio}</priority>";
			echo '</url>';

	endforeach;

echo '</urlset>';
