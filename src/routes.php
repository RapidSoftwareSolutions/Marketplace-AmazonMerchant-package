<?php
$routes = [
    'getEligibleShippingServices',
    'createShipment',
    'getShipment',
    'cancelShipment',
    'metadata'
];
foreach($routes as $file) {
    require __DIR__ . '/../src/routes/'.$file.'.php';
}

