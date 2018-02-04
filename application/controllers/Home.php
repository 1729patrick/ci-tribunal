<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public $data = array();

    public function __construct() {
        parent::__construct();
        $this->data['menu'] = 'home';
    }

    public function index() {
        $this->load->view('header', $this->data);
        $this->load->view('Home');
        $this->load->view('footer');
    }

}
