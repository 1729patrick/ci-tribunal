<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Reu extends CI_Controller {

    public $data = array();

    public function __construct() {
        parent::__construct();
        $this->data['menu'] = 'reu';
    }

    public function Listar() {
        $this->load->model('Reu_model', 'rm');
        $this->data['reu'] = $this->rm->getAll();

        $this->load->view('header', $this->data);
        $this->load->view('ListaReu', $this->data);
        $this->load->view('footer');
    }

    public function Cadastrar() {
        $this->form_validation->set_rules('idpessoa', 'idpessoa', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->model('Pessoa_model', 'pm');
            $this->data['pessoas'] = $this->pm->getAll();

            $this->load->view('header', $this->data);
            $this->load->view('FormReu');
            $this->load->view('footer');
        } else {
            //salva no banco....
            $this->load->model('Reu_model', 'rm');

            $data = array(
                'idpessoa' => $this->input->post('idpessoa')
            );

            if ($this->rm->insert($data)) {
                redirect('Reu/Listar');
            } else {
                redirect('Reu/Cadastrar');
            }
        }
    }

    public function Alterar($id) {
        if ($id > 0) {
            //alteração
            $this->load->model('Reu_model', 'rm');

            $this->form_validation->set_rules('idpessoa', 'idpessoa', 'required');

            if ($this->form_validation->run() == false) {
                $this->load->model('Pessoa_model', 'pm');
                $this->data['pessoas'] = $this->pm->getAll();

                $this->data['reu'] = $this->rm->getOne($id);
                $this->load->view('header', $this->data);
                $this->load->view('FormReu', $this->data);
                $this->load->view('footer');
            } else {
                $data = array(
                    'idpessoa' => $this->input->post('idpessoa')
                );

                if ($this->rm->update($id, $data)) {
                    redirect('Reu/Listar');
                } else {
                    redirect('Reu/Alterar/' . $id);
                }
            }
        } else {
            redirect('Reu/Listar');
        }
    }

    public function Excluir($id) {
        if ($id > 0) {
            $this->load->model('Reu_model', 'rm');
            $this->rm->delete($id); //deleta o registro
        }
        redirect('Reu/Listar');
    }

}
