<?php
class register_model extends CI_Model {
	public function __construct()
    {
                $this->load->database();
    }

	public function create_user()
    {
		//$this->load->database();
		
    	$data= array(
				'username' => $this->input->post('username'),
        		'password' => md5($this->input->post('pwd')),
        		'email'	   =>$this->input->post('email'),
        		'contact_no'  =>$this->input->post('contactno'),
				'role'=>$this->input->post('role')
				);
				
      return  $this->db->insert('authorize_users',$data);
       
    }
	public function get_roles()
	{
		
		$roles = $this->db->get('roles')->result_array();
		return $roles;
	}
	public function login()
	{
		$user = $this->db->get_where('authorize_users',array('username'=>$this->input->post('username'),'password'=>md5($this->input->post('pwd'))));
		
		 
		return $user->result_array();
	}
	

}
?>