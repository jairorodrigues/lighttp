<?php

include 'lib/lighttp.php';

date_default_timezone_set('America/Campo_Grande');

get('/lighttp/products/food/:id/:data', function($id, $data) {

	echo "test ok $id - $data - ";

	echo $_GET['test'] . " - " . $_GET['test2'];

});

post('/lighttp/products/food/:id/:data', function($id, $data) {

	echo "test ok $id - $data - ";

	echo $_POST['test'] . " - " . $_POST['test2'];

});


post('/lighttp/products/:id/:data', function($id, $data) {
	
	global $HTTP_RAW_POST_DATA;
	
	echo "test id $id - $data - ";
	
	echo $HTTP_RAW_POST_DATA;
	
});

run();
