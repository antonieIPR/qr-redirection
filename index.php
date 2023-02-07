<?php

// Deze functie zoekt een matchend object voor een key-value paar:
function find($array, $key, $value, $default_url) {
    // Initialiseer een resultaten-array. Er zou slechts één resultaat moeten zijn, maar desondanks gebruiken we een array voor het geval dat er meerdere resultaten zouden zijn.
    $results = array();

    // Loop door elk object in dit resultaten-array:
    foreach ($array as $object){
        // Controleer of er een match is voor het opgegeven key-value paar:
        if ( $object[$key] == $value ){
            // Elke gevonden match wordt toegevoegd aan het resultaten-array:
            array_push($results, $object);
        }
    }
    
    // Controleer of er resultaten gevonden zijn en zo niet, verwijs de gebruiker dan door naar een standaard URL:
    if ( $results ){
        return $results[0]; // We tonen enkel het eerste object in het resultaten-array, hypothetische andere resultaten worden weggelaten.
    } else {
        header('Location:'.$default_url);
        die();
    }
    
};

// Haal het JSON-bestand met alle objecten op:
$codes = file_get_contents('codes.json');

// Zet het JSON-bestand om naar een PHP array:
$locations = json_decode($codes, true);

// Sla de queryvariabele op, dit is het zescijferig ID-nummer van het object, bijvoorbeeld 180002 voor MP-BE1800.2:
if(isset($_GET['q'])){ // We controleren of de variabele is ingesteld
    $q = $_GET['q'];
} else {
    $q = 0; // Wanneer er geen waarde voor q is gegeven, stellen we hem in op '0'. Dit zal betekenen dat we naar de standaard URL verwezen zullen worden.
}

// Stel een standaard URL in waar de gebruiker naar verwezen wordt wanneer een ongeldig object wordt opgevraagd:
$urlFile = fopen("standaard-url.txt", "r") or die("Fout: kon geen standaard URL vinden!");
$fallback = fread($urlFile,filesize("standaard-url.txt"));

// Voer de find() functie die we hierboven gemaakt hebben uit om het doel-object op te halen:
$object = find($locations, 'id', $q, $fallback);

fclose($urlFile);

// En als laatst sturen we de gebruiker door naar de juiste pagina:
header('Location:'.$object['target']);
die();


?>