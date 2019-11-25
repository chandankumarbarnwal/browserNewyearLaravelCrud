<?php

include "classes/DomDocumentParser.php";

function createLink($src, $url){
	echo "SRC: $src<br>";
	echo "URL: $url<br>";

}


function followLinks($url){
	$parser = new DomDocumentParser($url);
	$linkList = $parser->getlinks();
	
	foreach ($linkList as $link) {
	  $href  = $link->getAttribute("href");

	  if (strpos($href, '#') !== false) {
	  	continue;
	  }
	  elseif (substr($href, 0, 11) == "javascript:") {
	  	continue;
	  }

	createLink($href, $url);

	}

}

$startUrl = "https://www.bbc.com";

followLinks($startUrl);

?>