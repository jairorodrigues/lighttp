<?php

include 'lib/lighttp.php';

get('/products/food/:id', function($id) {
	
	echo "test ok $id";
	
});

run();
