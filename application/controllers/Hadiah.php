<?php
 
class Hadiah extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Hadiah_model');
    } 

    /*
     * Listing of hadiah
     */
    function index()
    {
        $data['hadiah'] = $this->Hadiah_model->get_all_hadiah();
        
        $data['_view'] = 'hadiah/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new hadiah
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('id_transaksi','Id Transaksi','required|integer');
		$this->form_validation->set_rules('nama_barang','Nama Barang','required|max_length[255]');
		$this->form_validation->set_rules('poin','Poin','required|integer');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'id_transaksi' => $this->input->post('id_transaksi'),
				'nama_barang' => $this->input->post('nama_barang'),
				'poin' => $this->input->post('poin'),
            );
            
            $hadiah_id = $this->Hadiah_model->add_hadiah($params);
            redirect('hadiah/index');
        }
        else
        {
			$this->load->model('Transaksi_model');
			$data['all_transaksi'] = $this->Transaksi_model->get_all_transaksi();
            
            $data['_view'] = 'hadiah/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a hadiah
     */
    function edit($id_hadiah)
    {   
        // check if the hadiah exists before trying to edit it
        $data['hadiah'] = $this->Hadiah_model->get_hadiah($id_hadiah);
        
        if(isset($data['hadiah']['id_hadiah']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('id_transaksi','Id Transaksi','required|integer');
			$this->form_validation->set_rules('nama_barang','Nama Barang','required|max_length[255]');
			$this->form_validation->set_rules('poin','Poin','required|integer');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'id_transaksi' => $this->input->post('id_transaksi'),
					'nama_barang' => $this->input->post('nama_barang'),
					'poin' => $this->input->post('poin'),
                );

                $this->Hadiah_model->update_hadiah($id_hadiah,$params);            
                redirect('hadiah/index');
            }
            else
            {
				$this->load->model('Transaksi_model');
				$data['all_transaksi'] = $this->Transaksi_model->get_all_transaksi();

                $data['_view'] = 'hadiah/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The hadiah you are trying to edit does not exist.');
    } 

    /*
     * Deleting hadiah
     */
    function remove($id_hadiah)
    {
        $hadiah = $this->Hadiah_model->get_hadiah($id_hadiah);

        // check if the hadiah exists before trying to delete it
        if(isset($hadiah['id_hadiah']))
        {
            $this->Hadiah_model->delete_hadiah($id_hadiah);
            redirect('hadiah/index');
        }
        else
            show_error('The hadiah you are trying to delete does not exist.');
    }
    
}
