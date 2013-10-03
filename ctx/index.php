<?php

// dentro da pasta ctx

date_default_timezone_set("America/Campo_Grande");

include '../lib/lighttp.php';

get('/bois', function () {
	echo "bois";
});

get('/fazenda/:fazendaId/bois', function () {
	$fazendaId = param('fazendaId');
	echo "todos os bois da fazenda {$fazendaId}!";
});

get('/fazenda/:fazendaId/bois/:boiId', function () {

	$fazendaId = param('fazendaId');
	$boiId = param('boiId');

	setHttpResponseContentType(HttpContentType::APPLICATION_JSON);

	echo json_encode(array(
		'id' => $boiId,
		'raca' => 'Caracu',
		'idade' => '3',
		'fazenda' => array(
			'id' => $fazendaId,
			'nome' => 'Rancho Alegre'
		)
	));
});

get('/index', function() {
	echo 'get index';
});

post('/index', function() {
	echo 'post index';
});

get('/with-params', function() {
	echo 'get with-params ';
	echo 'param1: ' . param('param1') . ' / ';
	echo 'param2: ' . param('param2') . ' / ';
});

post('/with-params', function() {
	echo 'post with-params ';
	echo 'param1: ' . param('param1') . ' / ';
	echo 'param2: ' . param('param2') . ' / ';
});

get('/with-url-params/farm/:farm_id/cows/:cow_id', function() {
	echo 'get with-url-params ';
	echo 'farm_id: ' . param('farm_id') . ' / ';
	echo 'cow_id: ' . param('cow_id') . ' / ';
	echo 'param1: ' . param('param1') . ' / ';
});

post('/with-url-params/farm/:farm_id/cows/:cow_id', function() {
	setHttpResponseStatus(HttpStatus::CREATED);

	echo 'post with-url-params ';
	echo 'farm_id: ' . param('farm_id') . ' / ';
	echo 'cow_id: ' . param('cow_id') . ' / ';
	echo 'param1: ' . param('param1') . ' / ';
});

put('/with-url-params/farm/:farm_id/cows/:cow_id', function() {
	echo 'put with-url-params ';
	echo 'farm_id: ' . param('farm_id') . ' / ';
	echo 'cow_id: ' . param('cow_id') . ' / ';
	echo 'param1: ' . param('param1') . ' / ';
});

delete('/with-url-params/farm/:farm_id/cows/:cow_id', function() {
	echo 'delete with-url-params ';
	echo 'farm_id: ' . param('farm_id') . ' / ';
	echo 'cow_id: ' . param('cow_id') . ' / ';
});

run();