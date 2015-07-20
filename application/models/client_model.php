<?php
class client_model extends CI_Model {
	public function __construct()
    {
       $this->load->database();
    }

	public function add_client()
    {
		$logged_in_user = $this->session->userdata('logged_in');
		$set_reminder = $this->input->post('reminder_date');
		if(!empty($set_reminder))
		{
			$user_id = $logged_in_user['id'];
		}
		else
		{
			$user_id=0;
		}
		
		if($set_reminder =='__/__/____ __:__')
		{
			$set_reminder = '';
		}
		
		$data= array(
				'Company' => $this->input->post('company'),
        		'Address' => $this->input->post('address'),
        		'City'	   =>$this->input->post('city'),
        		'State'  =>$this->input->post('state'),
				'Country'  =>$this->input->post('country'),
				'Products' =>$this->input->post('products'),
				'Phone'=>$this->input->post('phone'),
				'Contact'=>$this->input->post('contact'),
				'Comment'=>$this->input->post('comment'),
				'Reminder'=>$this->input->post('reminder'),
				'Reminder_date'=>$set_reminder,
				'Mailer'=>$this->input->post('mailer'),
				'user_id'=>$user_id,
				'created'=>date('m/d/Y h:i:s a', time()),
				'modified'=>date('m/d/Y h:i:s a', time()),
		);
      return  $this->db->insert('potential_customer',$data);
       
    }
	
	public function update_client($id)
    {
		$logged_in_user = $this->session->userdata('logged_in');
		$set_reminder = $this->input->post('reminder_date');
		if(!empty($set_reminder) && $set_reminder != '__/__/____ __:__')
		{
			$user_id = $logged_in_user['id'];
		}
		else
		{
			$user_id=0;
		}
		if($set_reminder =='__/__/____ __:__')
		{
			$set_reminder = '';
		}
		
		$data= array(
				'Company' => $this->input->post('company'),
        		'Address' => $this->input->post('address'),
        		'City'	   =>$this->input->post('city'),
        		'State'  =>$this->input->post('state'),
				'Country'  =>$this->input->post('country'),
				'Products' =>$this->input->post('products'),
				'Phone'=>$this->input->post('phone'),
				'Contact'=>$this->input->post('contact'),
				'Comment'=>$this->input->post('comment'),
				'Reminder'=>$this->input->post('reminder'),
				'Reminder_date'=>$set_reminder,
				'Mailer'=>$this->input->post('mailer'),
				'user_id'=>$user_id,
				'created'=>date('m/d/Y h:i:s a', time()),
				'modified'=>date('m/d/Y h:i:s a', time()),
		);
		$this->db->where('id',$id);
      return  $this->db->update('potential_customer',$data);
       
    }
	
	
	public function get_cities()
	{
		$cities = $this->db->get('cities')->result_array();
		
		return $cities;
	}
	public function get_states()
	{
		$states = $this->db->get('states')->result_array();
		
		return $states;
	}
	public function searchstateByCode($state_code)
	{
		$state = $this->db->get_where('states',array('state_code'=>$state_code))->result_array();
		$state_code=$state[0]['state_code'] ;
		
		return $state_code;
	}
	public function getAllClients()
	{
		$this->db->order_by('id','desc');
		$this->db->limit(10);
		
		$clients = $this->db->get('potential_customer')->result_array();
		
		
		return $clients;
	}
	public function getClientByID($id)
	{
		$this->db->where('id',$id);
		$clients = $this->db->get('potential_customer')->result_array();
		
		return $clients;
	}
	
	public function deleteClientByID($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('potential_customer');
		
	}
	public function record_count() {
        return $this->db->count_all("potential_customer");
    }
	public function fetch_clients($limit, $start) {
        $this->db->limit($limit, $start);
		$this->db->order_by('id','desc');
        $query = $this->db->get("potential_customer");
 
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
   public function getClientByReminderDate($date)
   {
	   
	   $this->db->order_by('Reminder_date','asc');
	   $reminders = $this->db->get('potential_customer')->result_array();
	   $todays_reminder = array();
	   $i=0;
	   foreach($reminders as $reminder)
	   {
		   $reminder_date = explode(' ',$reminder['Reminder_date']);
		 //  && $reminder_date[0] <= $time
		   if($reminder_date[0] == $date)
		   {
			   $todays_reminder[$i] = $reminder;
			    $i++;
		   }
		  
	   }
	  
	   return $todays_reminder;
	   
	   
   }
   
   public function record_search_count() {
        return $this->db->count_all("potential_customer");
    }
	public function search_clients($limit, $start) {
        $this->db->limit($limit, $start);
		$this->db->order_by('id','desc');
		$company = $this->input->post('companies');
		$products = $this->input->post('products');
		$searchquery = '';
		$OR_operator = '';
		if($company)
		{
			$searchquery .= "Company LIKE '%".$company."%'";
			
		}
		if($products)
		{
			if($company)
			{
				$OR_operator = ' OR ';
			}
			$searchquery .= $OR_operator ."Products LIKE '%".$products."%'";
		}
		
		
		
		
		
		if($searchquery != '')
		{
			$this->db->where($searchquery);
		}
		$query = $this->db->get("potential_customer");
 
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
			
            return $data;
        }
        return false;
   }
   
   public function getCompanies()
   {
	   $this->db->select('Company');
	   $this->db->group_by('Company');
	   $this->db->order_by('Company ASC');
	   
	   $companies = $this->db->get('potential_customer')->result_array();
	   return $companies;
   }
   
   public function getProducts()
   {
	   $this->db->select('Products');
	   $this->db->group_by('Products');
	   $this->db->order_by('Products ASC');
	   $products = $this->db->get('potential_customer')->result_array();
	   return $products;
   }
   
   
}
?>