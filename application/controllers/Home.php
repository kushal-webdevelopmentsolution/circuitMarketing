<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Home Controller which contains a login bussiness logic
	 */
	public function _construct()
	{
		parent::__construct();
		$this->load->helper('form','query','url');
    	
		
	}
	public function index()
	{
		$this->load->model('Register_model');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'required');
    	$this->form_validation->set_rules('pwd', 'Password', 'required');
		$data['title'] = 'Home|Chicago Circuit';
		$username =  $this->input->post('username');
		$pwd = $this->input->post('pwd');
		if(!empty($username) && !empty($pwd))
		{
			$user = $this->Register_model->login();
		}
		if ($this->form_validation->run() === FALSE)
    	{
			
			$this->load->view('header',$data);
			$this->load->view('home',$data);
			$this->load->view('footer');
			
		}
		else
		{
			if(count($user) === 0)
			{
				$this->session->set_flashdata('message', 'Invalid Username or Password');
				$this->load->view('header',$data);
				$this->load->view('home',$data);
				$this->load->view('footer');
			}
			else
			{
				$session_arr = array();
				foreach($user as $loggeduser)
				{
					$session_arr = array(
								'id'=>$loggeduser['id'],
								'username'=>$loggeduser['username'],
								'email'=>$loggeduser['email'],
								'contactno'=>$loggeduser['contactno'],
								'role'=>$loggeduser['role']);
				}
				$this->session->set_userdata('logged_in', $session_arr);	
				redirect('home/dashboard',$data);
			}
		}
		
	}
	function logout()
	{
			$user_data = $this->session->all_userdata();
				foreach ($user_data as $key => $value) {
					if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
						$this->session->unset_userdata($key);
					}
				}
			$this->session->sess_destroy();
			redirect('home/index');
		}
	
	public function dashboard()
	{
		$this->load->model('Register_model');
		$this->load->model('Client_model');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'required');
    	$this->form_validation->set_rules('pwd', 'Password', 'required');
		$data['title'] = 'Dashboard|Chicago Circuit';
		$data['reminders'] = $this->Client_model->getClientByReminderDate(date('m/d/Y'));
		$this->load->view('header',$data);
		$this->load->view('topmenu',$data);
		$this->load->view('dashboard',$data);
		$this->load->view('footer');
	}
	
}
