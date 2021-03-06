<?php
 
class Admin extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
    } 

    /*
     * Listing of admin
     */
    function index()
    {
        $data['admin'] = $this->Admin_model->get_all_admin();
        
        $data['_view'] = 'admin/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new admin
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('password','Password','required|max_length[255]');
		$this->form_validation->set_rules('nama','Nama','required|max_length[255]');
		$this->form_validation->set_rules('email','Email','required|max_length[255]|valid_email');
		$this->form_validation->set_rules('username','Username','required|max_length[255]');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'password' => $this->input->post('password'),
				'nama' => $this->input->post('nama'),
				'email' => $this->input->post('email'),
				'username' => $this->input->post('username'),
            );
            
            $admin_id = $this->Admin_model->add_admin($params);
            redirect('admin/index');
        }
        else
        {            
            $data['_view'] = 'admin/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a admin
     */
    function edit($id_admin)
    {   
        // check if the admin exists before trying to edit it
        $data['admin'] = $this->Admin_model->get_admin($id_admin);
        
        if(isset($data['admin']['id_admin']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('password','Password','required|max_length[255]');
			$this->form_validation->set_rules('nama','Nama','required|max_length[255]');
			$this->form_validation->set_rules('email','Email','required|max_length[255]|valid_email');
			$this->form_validation->set_rules('username','Username','required|max_length[255]');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'password' => $this->input->post('password'),
					'nama' => $this->input->post('nama'),
					'email' => $this->input->post('email'),
					'username' => $this->input->post('username'),
                );

                $this->Admin_model->update_admin($id_admin,$params);            
                redirect('admin/index');
            }
            else
            {
                $data['_view'] = 'admin/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The admin you are trying to edit does not exist.');
    } 

    /*
     * Deleting admin
     */
    function remove($id_admin)
    {
        $admin = $this->Admin_model->get_admin($id_admin);

        // check if the admin exists before trying to delete it
        if(isset($admin['id_admin']))
        {
            $this->Admin_model->delete_admin($id_admin);
            redirect('admin/index');
        }
        else
            show_error('The admin you are trying to delete does not exist.');
    }
    
}
