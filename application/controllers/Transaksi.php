<?php
 
class Transaksi extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Transaksi_model');
    } 

    /*
     * Listing of transaksi
     */
    function index()
    {
        $data['transaksi'] = $this->Transaksi_model->get_all_transaksi();
        
        $data['_view'] = 'transaksi/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new transaksi
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('id_costumer','Id Costumer','required|integer');
		$this->form_validation->set_rules('tanggal_transaksi','Tanggal Transaksi','required');
		$this->form_validation->set_rules('keterangan','Keterangan','required|max_length[255]');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'id_costumer' => $this->input->post('id_costumer'),
				'tanggal_transaksi' => $this->input->post('tanggal_transaksi'),
				'keterangan' => $this->input->post('keterangan'),
            );
            
            $transaksi_id = $this->Transaksi_model->add_transaksi($params);
            redirect('transaksi/index');
        }
        else
        {
			$this->load->model('Costumer_model');
			$data['all_costumer'] = $this->Costumer_model->get_all_costumer();
            
            $data['_view'] = 'transaksi/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a transaksi
     */
    function edit($id_transaksi)
    {   
        // check if the transaksi exists before trying to edit it
        $data['transaksi'] = $this->Transaksi_model->get_transaksi($id_transaksi);
        
        if(isset($data['transaksi']['id_transaksi']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('id_costumer','Id Costumer','required|integer');
			$this->form_validation->set_rules('tanggal_transaksi','Tanggal Transaksi','required');
			$this->form_validation->set_rules('keterangan','Keterangan','required|max_length[255]');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'id_costumer' => $this->input->post('id_costumer'),
					'tanggal_transaksi' => $this->input->post('tanggal_transaksi'),
					'keterangan' => $this->input->post('keterangan'),
                );

                $this->Transaksi_model->update_transaksi($id_transaksi,$params);            
                redirect('transaksi/index');
            }
            else
            {
				$this->load->model('Costumer_model');
				$data['all_costumer'] = $this->Costumer_model->get_all_costumer();

                $data['_view'] = 'transaksi/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The transaksi you are trying to edit does not exist.');
    } 

    /*
     * Deleting transaksi
     */
    function remove($id_transaksi)
    {
        $transaksi = $this->Transaksi_model->get_transaksi($id_transaksi);

        // check if the transaksi exists before trying to delete it
        if(isset($transaksi['id_transaksi']))
        {
            $this->Transaksi_model->delete_transaksi($id_transaksi);
            redirect('transaksi/index');
        }
        else
            show_error('The transaksi you are trying to delete does not exist.');
    }
    
}
