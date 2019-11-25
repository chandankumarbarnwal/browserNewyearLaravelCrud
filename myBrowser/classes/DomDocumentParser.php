<?php

class DomDocumentParser
{
	private $doc;
	function __construct($url)
	{
		$options =  array(
			'http' => array('method' => "GET", 'header' => "User-Agent: doodleBot/0.1\n" )
			 );

		$context = stream_context_create($options);
        $this->doc = new DomDocument();
        $this->doc->loadHtml(file_get_contents($url, false, $context));


	}

	public function getlinks() {
		return $this->doc->getElementsByTagName("a");
	}
}

?>