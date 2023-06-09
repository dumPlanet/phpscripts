function generateXmlFile() {
    
    if (!isset($_POST['generateXmlFile']) && !isset($_POST['xmlgen'])) {
        return;
    }
    
    if ($_POST['xmlgen'] == 'Yes') {
            
        //create new xml file
        $dom = new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?><!DOCTYPE quotes [<!ELEMENT quotes (quote)*><!ELEMENT quote (id|quotetext|author|job|advertising|date)*><!ELEMENT id (#PCDATA)><!ELEMENT quotetext (#PCDATA)><!ELEMENT author (#PCDATA)><!ELEMENT job (#PCDATA)><!ELEMENT advertising (#PCDATA)><!ELEMENT date (#PCDATA)>]><quotes></quotes>');

        //database sql
        $database = dbConnect(DBHOST, DBUSER, DBPASSWORD, DBNAME);
        $sqlstring = "SELECT * FROM quotes";
        $result = $database->query($sqlstring);
        
        //write into xml from sql
        foreach($result as $key) {
            $parentNode = $dom->addChild('quote');
            $parentNode->addChild('id', $key['id']);
            $parentNode->addChild('quotetext', $key['quotetext']);
            $parentNode->addChild('author', $key['author']);
            $parentNode->addChild('job', $key['job']);
            $parentNode->addChild('advertising', $key['advertising']);
            $parentNode->addChild('date', $key['date']);        
        }
        
        //save to file
        $dom->saveXML(CONTENTDB);
    } else {
        return;
    }
}
