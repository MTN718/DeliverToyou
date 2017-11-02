<?php

/**
 * Base controllers for different purposes
 * 	- MY_Controller: for Frontend Website
 * 	- Admin_Controller: for Admin Panel (require login), extends from MY_Controller
 * 	- API_Controller: for API Site, extends from REST_Controller
 */
class MY_Controller extends CI_Controller {

	// Config values from config/ci_bootstrap.php
	protected $mConfig = array();
	protected $mBaseUrl = array();
	protected $mSiteName = '';
	protected $mMetaData = array();
	protected $mScripts = array();
	protected $mStylesheets = array();

	// Values and objects to be overrided or accessible from child controllers
	protected $mPageTitlePrefix = '';
	protected $mPageTitle = '';
	protected $mBodyClass = '';
	protected $mMenu = array();
	protected $mBreadcrumb = array();

	// Data to pass into views
	protected $mViewData = array();

	// Login user
	protected $mPageAuth = array();
	protected $mUser = NULL;
	protected $mUserGroups = array();
	protected $mUserMainGroup;

	// Constructor
	public function __construct()
	{
		parent::__construct();
	// initial setup
		$this->_setup();
	}

	// Setup values from file: config/ci_bootstrap.php
	private function _setup()
	{
		$config = $this->config->item('karyon_config');

		// load default values
		$this->mBaseUrl = empty($this->mModule) ? base_url() : base_url($this->mModule).'/';
		$this->mSiteName = empty($config['site_name']) ? '' : $config['site_name'];
		$this->mPageTitlePrefix = empty($config['page_title_prefix']) ? '' : $config['page_title_prefix'];
		$this->mPageTitle = empty($config['page_title']) ? '' : $config['page_title'];
		$this->mBodyClass = empty($config['body_class']) ? '' : $config['body_class'];
		$this->mMenu = empty($config['menu']) ? array() : $config['menu'];
		$this->mMetaData = empty($config['meta_data']) ? array() : $config['meta_data'];
		$this->mScripts = empty($config['scripts']) ? array() : $config['scripts'];
		$this->mStylesheets = empty($config['stylesheets']) ? array() : $config['stylesheets'];
		$this->mPageAuth = empty($config['page_auth']) ? array() : $config['page_auth'];

		$this->mConfig = $config;
	}
	// Add script files, either append or prepend to $this->mScripts array
	// ($files can be string or string array)
	protected function add_script($files, $append = TRUE, $position = 'foot')
	{
		$files = is_string($files) ? array($files) : $files;
		$position = ($position==='head' || $position==='foot') ? $position : 'foot';

		if ($append)
			$this->mScripts[$position] = array_merge($this->mScripts[$position], $files);
		else
			$this->mScripts[$position] = array_merge($files, $this->mScripts[$position]);
	}

	// Add stylesheet files, either append or prepend to $this->mStylesheets array
	// ($files can be string or string array)
	protected function add_stylesheet($files, $append = TRUE, $media = 'screen')
	{
		$files = is_string($files) ? array($files) : $files;

		if ($append)
			$this->mStylesheets[$media] = array_merge($this->mStylesheets[$media], $files);
		else
			$this->mStylesheets[$media] = array_merge($files, $this->mStylesheets[$media]);
	}

	// Render template
	protected function render($view_file)
	{
		$this->mViewData['site_name'] = $this->mSiteName;
		$this->mViewData['page_title'] = $this->mPageTitlePrefix.$this->mPageTitle;
		$this->mViewData['current_uri'] = empty($this->mModule) ? uri_string(): str_replace($this->mModule.'/', '', uri_string());
		$this->mViewData['meta_data'] = $this->mMetaData;
		$this->mViewData['scripts'] = $this->mScripts;
		$this->mViewData['stylesheets'] = $this->mStylesheets;
		$this->mViewData['page_auth'] = $this->mPageAuth;
		$this->mViewData['base_url'] = $this->mBaseUrl;
		$this->mViewData['menu'] = $this->mMenu;
		$this->mViewData['user'] = $this->mUser;
		$this->mViewData['ga_id'] = empty($this->mConfig['ga_id']) ? '' : $this->mConfig['ga_id'];
		$this->mViewData['body_class'] = $this->mBodyClass;
		$this->mViewData['inner_view'] = $view_file;
		$this->load->view('common/header', $this->mViewData);
		// sidebar will not shown when login page renders
		if($view_file != 'common/login') {
			$this->load->view('common/navbar', $this->mViewData);
		}
		$this->load->view($view_file);
		$this->load->view('common/footer', $this->mViewData);
	}

	// function for checking login
	public function is_logged_in($redirect_url = NULL) {
		if(!$this->session->userdata('login_data')) {
			if ( $redirect_url==NULL ) {
				$redirect_url = $this->mConfig['login_url'];
				redirect($redirect_url);
			}
		}
	}

}
// include base controllers
require APPPATH."core/controllers/Main_Controller.php";
