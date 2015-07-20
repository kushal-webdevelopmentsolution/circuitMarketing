<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clients extends CI_Controller {

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
	public function client_form()
	{
		$this->load->library('form_validation','session');
		$this->load->model('Client_model');
		
		
		$this->form_validation->set_rules('company', 'Company', 'required');
    	$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('city', 'City', 'required');
    	$this->form_validation->set_rules('state', 'State', 'required');
		$this->form_validation->set_rules('country', 'Country', 'required');
		$this->form_validation->set_rules('products', 'Products', 'required');
		$this->form_validation->set_rules('phone', 'Phone', 'required');
		$this->form_validation->set_rules('contact', 'Contact Person', 'required');
	//	$this->form_validation->set_rules('comment', 'Comment', 'required');
		$this->form_validation->set_rules('reminder', 'Reminder', 'required');
		$this->form_validation->set_rules('mailer', 'Mailer', 'required');
		$data['title'] = 'Potential Client|Chicago Circuit';
		$data['cities'] = $this->Client_model->get_cities();
		$data['states'] = $this->Client_model->get_states();
		$data['lists'] = $this->Client_model->getAllClients();
		
		if(isset($this->input->post))
		{
			$data['inserted_clients'] = $this->input->post();
		}
		else
		{
			$data['inserted_clients'] = '';
		}
		if ($this->form_validation->run() === FALSE)
    	{
			
			$this->load->view('header',$data);
			$this->load->view('topmenu',$data);
			$this->load->view('add_client',$data);
			$this->load->view('footer');
	
	    }
    	else
    	{
        	
			$this->Client_model->add_client();
			
			$this->session->set_flashdata('message', 'Client SuccessFully Inserted');
			
			$this->load->view('header',$data);
			$this->load->view('topmenu',$data);
			$this->load->view('add_client',$data);
			$this->load->view('footer');
			
			redirect('clients/client_form','refresh');
    	}
	}
	
	public function edit($id)
	{
		$this->load->library('form_validation','session');
		$this->load->model('Client_model');
		
		$this->form_validation->set_rules('company', 'Company', 'required');
    	$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('city', 'City', 'required');
    	$this->form_validation->set_rules('state', 'State', 'required');
		$this->form_validation->set_rules('country', 'Country', 'required');
		$this->form_validation->set_rules('products', 'Products', 'required');
		$this->form_validation->set_rules('phone', 'Phone', 'required');
		$this->form_validation->set_rules('contact', 'Contact Person', 'required');
	//	$this->form_validation->set_rules('comment', 'Comment', 'required');
		$this->form_validation->set_rules('reminder', 'Reminder', 'required');
		$this->form_validation->set_rules('mailer', 'Mailer', 'required');
		$data['title'] = 'Potential Client|Chicago Circuit';
		$data['cities'] = $this->Client_model->get_cities();
		$data['states'] = $this->Client_model->get_states();
		$data['lists'] = $this->Client_model->getAllClients();
		$data['inserted_clients'] = $this->Client_model->getClientByID($id);
		//$data['inserted_clients'] = $data['inserted_clients'];
		
		if ($this->form_validation->run() === FALSE)
    	{
			
			$this->load->view('header',$data);
			$this->load->view('topmenu',$data);
			$this->load->view('edit_client',$data);
			$this->load->view('footer');
	
	    }
    	else
    	{
        	
			$this->Client_model->update_client($id);
			
			$this->session->set_flashdata('message', 'Client SuccessFully Updated');
			
			$this->load->view('header',$data);
			$this->load->view('topmenu',$data);
			$this->load->view('edit_client',$data);
			$this->load->view('footer');
			
			redirect('clients/lists','refresh');
    	}
	}
	
	public function find_state($state_code)
	{
		$this->load->model('Client_model');
		$stateCode = explode('-',$state_code); 
		$state = $this->Client_model->searchstateByCode($stateCode[1]);
		echo $state;
		exit;
	}
	public function lists()
	{
		$this->load->model('Client_model');
		$this->load->library("pagination");
		$config = array();
        $config["base_url"] = '/'.SITE_FOLDER. "/clients/lists";
        $config["total_rows"] = $this->Client_model->record_count();
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;
 
        $this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['title'] = 'Lists | Chicago circuit';
		$data['lists'] = $this->Client_model->fetch_clients($config["per_page"], $page);
		$data["links"] = $this->pagination->create_links();
		
		$this->load->view('header',$data);
		$this->load->view('topmenu',$data);
		$this->load->view('clients_list',$data);
		$this->load->view('footer');
		
	}
	
	public function delete($id)
	{
		$this->load->model('Client_model');
		
		$this->Client_model->deleteClientByID($id);
		$this->session->set_flashdata('message', 'Client SuccessFully Deleted');
		redirect('clients/lists');
		
	}
	public function search()
	{
		$this->load->model('Client_model');
		$this->load->library("pagination");
		$config = array();
        $config["base_url"] = '/'.SITE_FOLDER. "/clients/search";
        $config["total_rows"] = $this->Client_model->record_search_count();
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;
 
        $this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['title'] = 'Search | Chicago circuit';
		$data['lists'] = $this->Client_model->search_clients($config["per_page"], $page);
		$data["links"] = $this->pagination->create_links();
		$data['companies'] = $this->Client_model->getCompanies();
		$data['products'] = $this->Client_model->getProducts();
		
		
		if($_POST)
		{
			$data['default'] = $_POST;
		}
		else
		{
			$data['default'] = array('companies'=>'','products'=>'');
		}
		
		$this->load->view('header',$data);
		$this->load->view('topmenu',$data);
		$this->load->view('search',$data);
		$this->load->view('footer');
		
	}
	
}
