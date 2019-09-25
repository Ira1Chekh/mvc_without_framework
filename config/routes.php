<?php 

return array (
	'news/([0-9]+)' => 'news/view/$1',
	'news/([a-zA-Z]+)' => 'news/author/$1',
	'news' => 'news/index', //actionIndex в NewsController
);

