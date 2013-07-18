<?php

include 'lib/lighttp.php';

date_default_timezone_set('America/Campo_Grande');

get('/lighttp/products/food/:id/:data', function() {

	echo param('id') . ' - ' . param('data') . ' - ';

	echo param('test') . " - " . param('test2');
	
});

post('/lighttp/products/food/:id/:data', function() {

	echo param('id') . ' - ' . param('data') . ' - ';

	echo $_POST['test'] . " - " . $_POST['test2'];

});

post('/lighttp/products/:id/:data', function($id, $data) {
	
	global $HTTP_RAW_POST_DATA;
	
	echo "test id $id - $data - ";
	
	echo $HTTP_RAW_POST_DATA;
});

run();
