<?php

/**
 * XML Sitemap PHP Script
 * For more info, see: https://concamilo.com/google-sitemap-con-php-y-xls-como-crear-un-mapa-de-tu-sitio-web/
 */

require './config.php';

// Encabezado para que los navegadores se muestren correctamente, con o sin XSL.
header( 'Content-Type: application/xml' );

echo '<?xml version="1.0" encoding="utf-8"?>' . "\n";

if ( isset( $xsl ) && !empty( $xsl ) )
	echo '<?xml-stylesheet type="text/xsl" href="' . SITEMAP_DIR_URL . $xsl . '"?>' . "\n";


echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

$data = array( 
       array('url' => '#', 'fecha' => '23-05-20 00:00'),
       array('url' => '#', 'fecha' => '23-05-20 00:00'),
       array('url' => '#', 'fecha' => '23-05-20 00:00'),
       array('url' => '#', 'fecha' => '23-05-20 00:00')
    );
    
foreach($data as $item):

		$date = new DateTime($item['fecha']);

	        echo '<url>';
		echo "<loc>{$item['url']}</loc>";
		echo "<lastmod>{$date->format('Y-m-d')}</lastmod>";
	        echo "<changefreq>{$freq}</changefreq>";
		echo "<priority>{$prio}</priority>";
		echo '</url>';

endforeach;

echo '</urlset>';
