<?php
 
class Dashboard extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Dashboard_model');
    }

    function index()
    {
        $data['costumer'] = $this->Dashboard_model->get_all_costumer();
        $data['_view'] = 'dashboard';
        $this->load->view('layouts/main',$data);
    }
}
