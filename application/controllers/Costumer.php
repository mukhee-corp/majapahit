<?php
 
class Costumer extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Costumer_model');
    } 

    /*
     * Listing of costumer
     */
    function index()
    {
        $data['costumer'] = $this->Costumer_model->get_all_costumer();
        
        $data['_view'] = 'costumer/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new costumer
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
            
            $costumer_id = $this->Costumer_model->add_costumer($params);
            redirect('costumer/index');
        }
        else
        {            
            $data['_view'] = 'costumer/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a costumer
     */
    function edit($id_costumer)
    {   
        // check if the costumer exists before trying to edit it
        $data['costumer'] = $this->Costumer_model->get_costumer($id_costumer);
        
        if(isset($data['costumer']['id_costumer']))
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

                $this->Costumer_model->update_costumer($id_costumer,$params);            
                redirect('costumer/index');
            }
            else
            {
                $data['_view'] = 'costumer/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The costumer you are trying to edit does not exist.');
    } 

    /*
     * Deleting costumer
     */
    function remove($id_costumer)
    {
        $costumer = $this->Costumer_model->get_costumer($id_costumer);

        // check if the costumer exists before trying to delete it
        if(isset($costumer['id_costumer']))
        {
            $this->Costumer_model->delete_costumer($id_costumer);
            redirect('costumer/index');
        }
        else
            show_error('The costumer you are trying to delete does not exist.');
    }
    
}
