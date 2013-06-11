<?php

include 'lib/lighttp.php';

date_default_timezone_set('America/Campo_Grande');

// echo preg_match("/^\/products\/food\/[A-Za-z0-9_]+$/", "/products/food/abssg");

get('/lighttp/products/food/:id/:data', function($id, $data) {
	
	echo "test ok $id - $data";
	
	echo $_GET['test'];
	
});

run();
