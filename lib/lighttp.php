<?php

$get_routes = array();

function get ($url, $callback)
{
	global $get_routes;
	
	$get_routes[$url] = $callback;
}

function run ()
{
	$http_method = getHttpRequestMethod();
	
	if ($http_method == HttpMethod::GET) {
		global $get_routes;
		
		$callback = $get_routes[$_SERVER['REQUEST_URI']];
		
		$callback();
	}
	
}

/**
 * M�todos(ou verbos) do protocolo HTTP
 */
class HttpMethod {
	const GET = 'GET';
	const POST = 'POST';
	const HEAD = 'HEAD';
	const PUT = 'PUT';
	const DELETE = 'DELETE';
	const OPTIONS = 'OPTIONS';
	const TRACE = 'TRACE';
	const CONNECT = 'CONNECT';
}

/**
 * Constantes dos MIME-Types mais comuns
 */
class HttpContentType {
	
	const TEXT_PLAIN = 'text/plain';
	const TEXT_HTML = 'text/text';
	const TEXT_CSS = 'text/css';

	const APPLICATION_JSON = 'application/json';
	const APPLICATION_XML = 'application/xml';
	const APPLICATION_PDF = 'application/pdf';
	const APPLICATION_JAVASCRIPT = 'application/x-javascript';

	const IMAGE_JPEG = 'image/jpeg';
	const IMAGE_PNG = 'image/png';
	const IMAGE_GIF = 'image/gif';
	const IMAGE_BMP = 'image/bmp';
}

/**
 * Vers�es do HTTP at� o momento
 */
class HttpVersion {
	const HTTP_1_0 = '1.0';
	const HTTP_1_1 = '1.1';
	const DEFAULT_VERSION = HttpVersion::HTTP_1_1;

	public static $PROTOCOLS = array (
		HttpVersion::HTTP_1_0, HttpVersion::HTTP_1_1
	);
}

/**
 * Relaciona todos os c�digos de status definidos pelo protocolo
 */
class HttpStatus {

	// 1XX INFORMATIONAL CODES
	const CONTINUE_STATUS_CODE = 100;
	const SWITCHING_PROTOCOLS = 101;
	const PROCESSING = 102;

	// 2XX SUCCESS CODES
	const OK = 200;
	const CREATED = 201;
	const ACCEPTED = 202;
	const NON_AUTHORITATIVE_INFORMATION = 203;
	const NO_CONTENT = 204;
	const RESET_CONTENT = 205;
	const PARTIAL_CONTENT = 206;
	const MULTISTATUS = 207;
	const ALREADY_REPORTED = 208;

	// 3XX REDIRECTION CODES
	const MULTIPLE_CHOICES = 300;
	const MOVED_PERMANENTLY = 301;
	const FOUND = 302;
	const SEE_OTHER = 303;
	const NOT_MODIFIED = 304;
	const USE_PROXY = 305;
	const SWITCH_PROXY = 306; # Deprecated
	const TEMPORARY_REDIRECT = 307;

	// 4XX CLIENT ERROR
	const BAD_REQUEST = 400;
	const UNAUTHORIZED = 401;
	const PAYMENT_REQUIRED = 402;
	const FORBIDDEN = 403;
	const NOT_FOUND = 404;
	const METHOD_NOT_ALLOWED = 405;
	const NOT_ACCEPTABLE = 406;
	const PROXY_AUTHENTICATION_REQUIRED = 407;
	const REQUEST_TIME_OUT = 408;
	const CONFLICT = 409;
	const GONE = 410;
	const LENGTH_REQUIRED = 411;
	const PRECONDITION_FAILED = 412;
	const REQUEST_ENTITY_TOO_LARGE = 413;
	const REQUEST_URI_TOO_LARGE = 414;
	const UNSUPPORTED_MEDIA_TYPE = 415;
	const REQUESTED_RANGE_NOT_SATISFIABLE = 416;
	const EXPECTATION_FAILED = 417;
	const I_AM_A_TEAPOT = 418;
	const UNPROCESSABLE_ENTITY = 422;
	const LOCKED = 423;
	const FAILED_DEPENDENCY = 424;
	const UNORDERED_COLLECTION = 425;
	const UPGRADE_REQUIRED = 426;
	const PRECONDITION_REQUIRED = 428;
	const TOO_MANY_REQUESTS = 429;
	const REQUEST_HEADER_FIELDS_TOO_LARGE = 431;

	// 5XX SERVER ERROR
	const INTERNAL_SERVER_ERROR = 500;
	const NOT_IMPLEMENTED = 501;
	const BAD_GATEWAY = 502;
	const SERVICE_UNAVAILABLE = 503;
	const GATEWAY_TIME_OUT = 504;
	const HTTP_VERSION_NOT_SUPPORTED = 505;
	const VARIANT_ALSO_NEGOTIATES = 506;
	const INSUFFICIENT_STORAGE = 507;
	const LOOP_DETECTED = 508;
	const NETWORK_AUTHENTICATION_REQUIRED = 511;
		
	/**
	 * 'Reason Phrases' recomendadas, acesse os valores usando as constantes.
	 * 	Ex:
	 * 	 HttpStatus::$STATUSES[HttpStatus::OK] para a reason phrase do c�digo de sucesso 200 OK
	 */
	public static $STATUSES = array(
		// INFORMATIONAL CODES
		100 => 'Continue',
		101 => 'Switching Protocols',
		102 => 'Processing',

		// SUCCESS CODES
		200 => 'OK',
		201 => 'Created',
		202 => 'Accepted',
		203 => 'Non-Authoritative Information',
		204 => 'No Content',
		205 => 'Reset Content',
		206 => 'Partial Content',
		207 => 'Multi-status',
		208 => 'Already Reported',

		// REDIRECTION CODES
		300 => 'Multiple Choices',
		301 => 'Moved Permanently',
		302 => 'Found',
		303 => 'See Other',
		304 => 'Not Modified',
		305 => 'Use Proxy',
		306 => 'Switch Proxy', // Deprecated
		307 => 'Temporary Redirect',

		// CLIENT ERROR
		400 => 'Bad Request',
		401 => 'Unauthorized',
		402 => 'Payment Required',
		403 => 'Forbidden',
		404 => 'Not Found',
		405 => 'Method Not Allowed',
		406 => 'Not Acceptable',
		407 => 'Proxy Authentication Required',
		408 => 'Request Time-out',
		409 => 'Conflict',
		410 => 'Gone',
		411 => 'Length Required',
		412 => 'Precondition Failed',
		413 => 'Request Entity Too Large',
		414 => 'Request-URI Too Large',
		415 => 'Unsupported Media Type',
		416 => 'Requested range not satisfiable',
		417 => 'Expectation Failed',
		418 => 'I\'m a teapot',
		422 => 'Unprocessable Entity',
		423 => 'Locked',
		424 => 'Failed Dependency',
		425 => 'Unordered Collection',
		426 => 'Upgrade Required',
		428 => 'Precondition Required',
		429 => 'Too Many Requests',
		431 => 'Request Header Fields Too Large',

		// SERVER ERROR
		500 => 'Internal Server Error',
		501 => 'Not Implemented',
		502 => 'Bad Gateway',
		503 => 'Service Unavailable',
		504 => 'Gateway Time-out',
		505 => 'HTTP Version not supported',
		506 => 'Variant Also Negotiates',
		507 => 'Insufficient Storage',
		508 => 'Loop Detected',
		511 => 'Network Authentication Required'
	);
}

/**
 * Dado um Status Code, seta no cabecalho da resposta o status e a reason phrase
 * de acordo com o protocolo
 */
function setHttpResponseStatus ($givenStatusCode) {
	header(sprintf('HTTP/%s %s %s',
		HttpVersion::DEFAULT_VERSION,
		$givenStatusCode,
		HttpStatus::$STATUSES[$givenStatusCode]
	));
}

/**
 * Seta o cabecalho de Content-Type com o mimeType informado
 */
function setHttpResponseContentType ($mimeType) {
	header('Content-Type: ' . $mimeType);
}

/**
 * Escreve na sa�da do php "ECHO" o json_encode do conte�do.
 * Converte o objeto para UTF-8 primeiramente.
 */
function writeJsonResponse($object) {
	utf8_encode_deep($object);
	echo json_encode($object);
	die();
}

/**
 * @return O valor do par�metro GET ou NULL
 */
function getHttpGetParam ($name) {
	return getParamFromArray($name, $_GET);
}

/**
 * @return O valor do par�metro POST ou NULL
 */
function getHttpPostParam ($name) {
	return getParamFromArray($name, $_POST);
}

/**
 * Retorna o m�todo da requisi��o que est� sendo tratada pelo PHP.
 * Se a requisi��o est� vindo por GET/POST/DELETE etc...
 */
function getHttpRequestMethod () {
	return $_SERVER['REQUEST_METHOD'];
}

/**
 * Pega o par�metro que est� vindo na requisi��o, n�o importa se a
 * requisi��o � um POST ou um GET, se o par�metro existir em algum dos arrays
 * o valor ser� retornado. Se n�o retorna NULL
 */
function getHttpParam ($name) {
	return getHttpPostParam($name) != NULL ?
			getHttpPostParam($name) : getHttpGetParam($name);
}

/**
 * Obtem o valor do par�metro que est� no cabecalho da requisi��o
 */
function getHttpHeader($name) {
	$headers = apache_request_headers();
	return getParamFromArray($name, $headers);
}

/**
 * Obtem o valor do par�metro da requisi��o convertido para double
 */
function getHttpDoubleParam ($name) {
	return doubleval(trim(getHttpParam($name)));
}

/**
 * Obtem o valor do par�metro da requisi��o convertido para inteiro
 */
function getHttpIntegerParam ($name) {
	return intval(trim(getHttpParam($name)));
}
