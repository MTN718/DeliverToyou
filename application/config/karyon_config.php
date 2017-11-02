<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Karyon Framework Configuration File
| -------------------------------------------------------------------------
| This file lets you define default values to be passed into views
| when calling MY_Controller's render() function.
|
*/

$config['karyon_config'] = array(

	// Site name
	'site_name' => 'Karyon Framework',

	// Default page title prefix
	'page_title_prefix' => '',

	// Default page title
	'page_title' => 'Karyon Framework',

	// Default meta data
	'meta_data'	=> array(
		'author'		=> 'Karyon Solutions',
		'description'	=> 'Karyon Solutions Framework',
		'keywords'		=> ''
		),

	// Default scripts to embed at page head or end
	'scripts' => array(
		'head'	=> array(
			'assets/js/jquery/jqueryb8ff.js?ver=1.12.4',
			'assets/js/jquery/jquery-migrate.min330a.js?ver=1.4.1',
			'assets/js/apply-fb-stylea288.js?ver=4.8.1',
			'assets/js/jquery-te-1.4.0.mina288.js?ver=4.8.1',
			'assets/js/modernizr.mina288.js?ver=4.8.1',
			'assets/js/browser-detecta288.js?ver=4.8.1',
			'assets/js/jquery/jquery.themepunch.tools.min78d9.js?ver=5.4.3.1',
			'assets/js/jquery/jquery.themepunch.revolution.min78d9.js?ver=5.4.3.1',
			),
		'foot'	=> array(
			'assets/js/job/jobhunt-indeed-jobs-function2fe1.js',
			'assets/js/job/bootstrap.mina288.js?ver=4.8.1',
			'assets/js/job/modernizr.mina288.js?ver=4.8.1',
			'assets/js/job/browser-detecta288.js?ver=4.8.1',
			'assets/js/job/slicka288.js?ver=4.8.1',
			'assets/js/job/jquery.stickya288.js?ver=4.8.1',
			// 'assets/js/job/cs_map_stylesa288.js?ver=4.8.1',
			'assets/js/job/functionsa288.js?ver=4.8.1',
			'assets/js/job/menua288.js?ver=4.8.1',
			'assets/js/job/jquery.prettyPhotoa288.js?ver=4.8.1',
			'assets/js/job/lightboxa288.js?ver=4.8.1',

			'assets/js/job2/waypoints.mina288.js?ver=4.8.1',
			'assets/js/job2/bootstrap-slidera288.js?ver=4.8.1',
			// 'assets/js/job2/map_infoboxa288.js?ver=4.8.1',
			'assets/js/job2/chosen.jquerya288.js?ver=4.8.1',
			'assets/js/job2/scriptsa288.js?ver=4.8.1',
			'assets/js/job2/isotope.mina288.js?ver=4.8.1',
			'assets/js/job2/jquery.stickya288.js?ver=4.8.1',
			'assets/js/jobhunt_functionsa288.js?ver=4.8.1',
			'assets/js/extra_functionsa288.js?ver=4.8.1',
			'assets/js/cs_inline_scripts_functionsa288.js?ver=4.8.1'
			),
		),

	// Default stylesheets to embed at page head
	'stylesheets' => array(
		'screen' => array(
			'assets/css/dealine-stylea288.css?ver=4.8.1',
			'assets/css/jobhunt-indeed-jobs-stylea288.css?ver=4.8.1',
			'http://fonts.googleapis.com/css?family=Montserrat%3Aregular%2C700&amp;subset=latin&amp;ver=4.8.1',
			'http://fonts.googleapis.com/css?family=Raleway%3A100%2C200%2C300%2Cregular%2C500%2C600%2C700%2C800%2C900&amp;subset=latin&amp;ver=4.8.1',
			'assets/css/bootstrapa288.css?ver=4.8.1',
			'assets/css/stylea288.css?ver=4.8.1',
			'assets/css/top-menua288.css',
			'assets/css/slicknava288.css?ver=4.8.1',
			'assets/css/widgeta288.css?ver=4.8.1',
			'assets/css/prettyPhotoa288.css?ver=4.8.1',
			'assets/css/cs-woocommercea288.css?ver=4c91b5f06bd4f3cbf7f7516ec5467a9a',
			'assets/css/custom-style4677.css?ver=4c91b5f06bd4f3cbf7f7516ec5467a9a',
			'assets/css/iconmoona288.css?ver=4.8.1',
			'assets/css/cs-jobhunt-plugina288.css?ver=4.8.1',
			'assets/css/jquery-te-1.4.0a288.css?ver=4.8.1',
			'assets/css/jquery_datetimepickera288.css?ver=4.8.1',
			'assets/css/bootstrap-slidera288.css?ver=4.8.1',
			'assets/css/chosena288.css?ver=4.8.1',
			'assets/css/custom_scripta288.css',
			'assets/css/responsivea288.css',
			'assets/css/stylesef15.css',
			'assets/js/revslider/public/assets/css/settings78d9.css',
			'assets/css/jobhunt-notifications-frontenda288.css',
			'assets/flaticons/flaticon.css',
			'assets/css/css-dashboard-home.css'
			)
		),

	

	// Default CSS class for <body> tag
	'body_class' => '',

	// Menu items
	'menu' => array(
		'admin' => array(
			'name'		=> 'admin',
			'url'		=> '',
			),
		),

	// Login page
	'login_url' => 'home',

	// Restricted pages
	'page_auth' => array(
		),

	// Debug tools
	'debug' => array(
		'view_data'	=> FALSE,
		'profiler'	=> FALSE
		),
	);
