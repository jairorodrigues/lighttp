<?php

include 'lib/lighttp.php';

get('/lighttp/test', function() {
	
	echo "test ok";
	
});

run();