<?php

// Function to find an object in an array that matches a key-value criterium.
function find($array, $key, $value, $default_url) {
    // Initialize result array. There should be only one result, but we're still using an array in case multiple results show up
    $results = array();

    // Loop through each object in the given array
    foreach ($array as $object){
        // Check if there is a match for the given key-value pair
        if ( $object[$key] == $value ){
            // Every found match will be pushed to the results array
            array_push($results, $object);
        }
    }
    
    // Check if there are any results, otherwise, redirect the user to a default URL.
    if ( $results ){
        return $results[0]; // We will only return the first object found, hypothetical other results will be omitted.
    } else {
        header('Location:'.$default_url);
        die();
    }
    
};

// Fetch JSON file with all objects
$codes = file_get_contents('codes.json');

// Convert JSON to PHP Array
$locations = json_decode($codes, true);

// Save query variable, this will be the ID number of an object, eg. 180002 for MP-BE1800.2
$q = $_GET['q'];

// Set the default URL for redirection when an invalid value is entered as query variable
$fallback = 'https://www.hoppin.be/';

// Execute find() function to fetch the target object
$object = find($locations, 'id', $q, $fallback);

// And finally, redirect the user to the correct page
header('Location:'.$object['target']);
die();


?>