<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Jurado extends CI_Controller {

    public $data = array();

    public function __construct() {
        parent::__construct();
        $this->data['menu'] = 'jurado';
    }

    public function Listar() {
        $this->load->model('Jurado_model', 'jm');
        $this->data['jurados'] = $this->jm->getAll();

        $this->load->view('header', $this->data);
        $this->load->view('ListaJurado', $this->data);
        $this->load->view('footer');
    }

    public function Cadastrar() {
        $this->form_validation->set_rules('idpessoa', 'idpessoa', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->model('Pessoa_model', 'pm');
            $this->data['pessoas'] = $this->pm->getAll();

            $this->load->view('header', $this->data);
            $this->load->view('FormJurado');
            $this->load->view('footer');
        } else {
            //salva no banco....
            $this->load->model('Jurado_model', 'jm');

            $data = array(
                'idpessoa' => $this->input->post('idpessoa')
            );

            if ($this->jm->insert($data)) {
                redirect('Jurado/Listar');
            } else {
                redirect('Jurado/Cadastrar');
            }
        }
    }

    public function Alterar($id) {
        if ($id > 0) {
            //alteração
            $this->load->model('Jurado_model', 'jm');

            $this->form_validation->set_rules('idpessoa', 'idpessoa', 'required');

            if ($this->form_validation->run() == false) {
                $this->load->model('Pessoa_model', 'pm');
                $this->data['pessoas'] = $this->pm->getAll();

                $this->data['jurado'] = $this->jm->getOne($id);
                $this->load->view('header', $this->data);
                $this->load->view('FormJurado', $this->data);
                $this->load->view('footer');
            } else {
                $data = array(
                    'idpessoa' => $this->input->post('idpessoa')
                );

                if ($this->jm->update($id, $data)) {
                    redirect('Jurado/Listar');
                } else {
                    redirect('Jurado/Alterar/' . $id);
                }
            }
        } else {
            redirect('Jurado/Listar');
        }
    }

    public function Excluir($id) {
        if ($id > 0) {
            $this->load->model('Jurado_model', 'jm');
            $this->jm->delete($id); //deleta o registro
        }
        redirect('Jurado/Listar');
    }

}
