function xmlOpen($file) {
	$xml_file = $file;

	if (file_exists($xml_file)) {
		$xmlFile = simplexml_load_file($xml_file);
		return $xmlFile;
	} else {
        echo '<p class="error_message">Keine <strong>Datenbankdatei</strong> gefunden!</p>';	
		return false;
	}

}
