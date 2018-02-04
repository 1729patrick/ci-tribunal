<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Vitima extends CI_Controller {

    public $data = array();

    public function __construct() {
        parent::__construct();
        $this->data['menu'] = 'vitima';
    }

    public function Listar() {
        $this->load->model('Vitima_model', 'vm');
        $this->data['vitima'] = $this->vm->getAll();

        $this->load->view('header', $this->data);
        $this->load->view('ListaVitima', $this->data);
        $this->load->view('footer');
    }

    public function Cadastrar() {
        $this->form_validation->set_rules('idpessoa', 'idpessoa', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->model('Pessoa_model', 'pm');
            $this->data['pessoas'] = $this->pm->getAll();

            $this->load->view('header', $this->data);
            $this->load->view('FormVitima');
            $this->load->view('footer');
        } else {
            //salva no banco....
            $this->load->model('Vitima_model', 'vm');

            $data = array(
                'idpessoa' => $this->input->post('idpessoa')
            );

            if ($this->vm->insert($data)) {
                redirect('Vitima/Listar');
            } else {
                redirect('Vitima/Cadastrar');
            }
        }
    }

    public function Alterar($id) {
        if ($id > 0) {
            //alteração
            $this->load->model('Vitima_model', 'vm');

            $this->form_validation->set_rules('idpessoa', 'idpessoa', 'required');

            if ($this->form_validation->run() == false) {
                $this->load->model('Pessoa_model', 'pm');
                $this->data['pessoas'] = $this->pm->getAll();

                $this->data['vitimas'] = $this->vm->getOne($id);
                $this->load->view('header', $this->data);
                $this->load->view('FormVitima', $this->data);
                $this->load->view('footer');
            } else {
                $data = array(
                    'idpessoa' => $this->input->post('idpessoa')
                );

                if ($this->vm->update($id, $data)) {
                    redirect('Vitima/Listar');
                } else {
                    redirect('Vitima/Alterar/' . $id);
                }
            }
        } else {
            redirect('Vitima/Listar');
        }
    }

    public function Excluir($id) {
        if ($id > 0) {
            $this->load->model('Vitima_model', 'vm');
            $this->vm->delete($id); //deleta o registro
        }
        redirect('Vitima/Listar');
    }

}
