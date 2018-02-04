<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Testemunha extends CI_Controller {

    public $data = array();

    public function __construct() {
        parent::__construct();
        $this->data['menu'] = 'testemunha';
    }

    public function Listar() {
        $this->load->model('Testemunha_model', 'tm');
        $this->data['testemunhas'] = $this->tm->getAll();

        $this->load->view('header', $this->data);
        $this->load->view('ListaTestemunha', $this->data);
        $this->load->view('footer');
    }

    public function Cadastrar() {
        $this->form_validation->set_rules('idpessoa', 'idpessoa', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->model('Pessoa_model', 'pm');
            $this->data['pessoas'] = $this->pm->getAll();

            $this->load->view('header', $this->data);
            $this->load->view('FormTestemunha');
            $this->load->view('footer');
        } else {
            //salva no banco....
            $this->load->model('Testemunha_model', 'tm');

            $data = array(
                'idpessoa' => $this->input->post('idpessoa')
            );

            if ($this->tm->insert($data)) {
                redirect('Testemunha/Listar');
            } else {
                redirect('Testemunha/Cadastrar');
            }
        }
    }

    public function Alterar($id) {
        if ($id > 0) {
            //alteração
            $this->load->model('Testemunha_model', 'tm');

            $this->form_validation->set_rules('idpessoa', 'idpessoa', 'required');

            if ($this->form_validation->run() == false) {
                $this->load->model('Pessoa_model', 'pm');
                $this->data['pessoas'] = $this->pm->getAll();

                $this->data['testemunha'] = $this->tm->getOne($id);
                $this->load->view('header', $this->data);
                $this->load->view('FormTestemunha', $this->data);
                $this->load->view('footer');
            } else {
                $data = array(
                    'idpessoa' => $this->input->post('idpessoa')
                );

                if ($this->tm->update($id, $data)) {
                    redirect('Testemunha/Listar');
                } else {
                    redirect('Testemunha/Alterar/' . $id);
                }
            }
        } else {
            redirect('Testemunha/Listar');
        }
    }

    public function Excluir($id) {
        if ($id > 0) {
            $this->load->model('Testemunha_model', 'tm');
            $this->tm->delete($id); //deleta o registro
        }
        redirect('Testemunha/Listar');
    }

}
