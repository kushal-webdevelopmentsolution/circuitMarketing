<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function _construct()
	{
		parent::__construct();
		$this->load->helper('form','query','url');
	}
	public function signup()
	{
		$this->load->library('form_validation');
		$this->load->model('Register_model');
		$this->form_validation->set_rules('username', 'Username', 'required');
    	$this->form_validation->set_rules('pwd', 'Password', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
    	$this->form_validation->set_rules('contactno', 'Contact No', 'required');
		
		$data['title'] = 'Register user|Chicago Circuit';
		$data['roles'] = $this->Register_model->get_roles();
		
		
		if ($this->form_validation->run() === FALSE)
    	{
			
			$this->load->view('header',$data);
			$this->load->view('topmenu');
			$this->load->view('signup',$data);
			$this->load->view('footer');
	
	    }
    	else
    	{
        	$this->Register_model->create_user();
			$this->session->set_flashdata('message', 'User SuccessFully Registered');
			
        	$this->load->view('header',$data);
			$this->load->view('topmenu');
			$this->load->view('signup',$data);
			$this->load->view('footer');
    	}
		
		
	}
	
}
