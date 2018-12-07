<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * EXAMPLE FOR FACEBOOK AND ACCOUNT KIT LOGIN
	 * THIS CODE WORK ONLY WITH CORRECTLY SETTINGS IN FACEBOOK LOGIN AND ACCOUNT KIT (please watch directory readme)
	 * Powered by Marcello Fiore
	 * 2018
	 * 
	 * - Configure Your Codeigniter settings in config/config.php (base_url, index_page)
	 * 
	 * 1 • setting your facebook app (please watch directory readme)
	 * 2 • enable facebook login
	 * 3 • enable account kit
	 * 4 • setting data on fbApp.js => /resource/js
	 * 5 • Try your Facebook Login / Account kit
	 * 6 • SHOW YOUR CONSOLE JAVASCRIPT IN BROWSER FOR DEBUGGING !!!!
	 * 
	 */

	public function index() {
		//$this->load->view('welcome_message');
		$this->load->helper('url');
		$this->load->view('fb_accountkit_login');
	}

	public function fb_login() {
		// print debug data POST return from facebook login
		print_r($this->input->post());
	}

	public function account_kit_login() {
		// print debug data POST return from facebook Account Kit
		print_r($this->input->post());
	}
}
