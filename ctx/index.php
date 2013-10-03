<?php

date_default_timezone_set("America/Campo_Grande");

include '../lib/lighttp.php';

get('/bois', function () {
	echo "bois";
});

run();