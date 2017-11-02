<?php
/**
 * Base Controller for Admin module
 */
class Main_Controller extends MY_Controller {

	// Constructor
	public function __construct()
	{
		parent::__construct();
		// only logged in users can access Admin Panel
    	$this->is_logged_in();
	}

	// Render template (override parent)
	protected function render($view_file)
	{
		parent::render($view_file);
	}

}
?>
