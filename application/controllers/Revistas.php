<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class revistas extends CI_Controller {

	public function __construct(){
		parent::__construct();
        if (!$this->session->userdata('login')) {
            redirect(base_url());
        }
		$this->load->model('Revistas_model');
		$this->load->model('Categorias_model');
	}


	public function index()
	{
		$contenido_interno = array(
            'revistas' => $this->Revistas_model->getRevistas(),
        );

        $contenido_exterior = array(
            'title'     => 'Catalogo de Revistas',
            'contenido' => $this->load->view('revistas/list', $contenido_interno, true),
        );

        $this->load->view('template', $contenido_exterior);
	}

	public function add(){
        $contenido_exterior = array(
            'title'     => 'Agregar Revista',
            'contenido' => $this->load->view('revistas/add', "", true),
        );

        $this->load->view('template', $contenido_exterior);
	}

	public function store(){
		$numero_registro      = $this->input->post("numero_registro");
        $codigo_ubicacion        = $this->input->post("codigo_ubicacion");
        $titulo      = $this->input->post("titulo");
        $revista       = $this->input->post("revista");
        $publicacion = $this->input->post("publicacion");
        $editorial   = $this->input->post("editorial");
        $lugar    = $this->input->post("lugar");
        $ejemplares  = $this->input->post("ejemplares");

        $this->form_validation->set_rules('codigo_ubicacion', 'Codigo Unicacion', 'trim|required|is_unique[revistas.codigo_ubicacion]', array('required' => 'Debes proporcionar un %s.', 'is_unique' => 'Este %s ya existe'));
        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

        if ($this->form_validation->run() == false) {
            $this->add();
        } else {
            $config['upload_path']   = './assets/images/revistas';
            $config['allowed_types'] = 'gif|jpg|png';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('imagen')) {
                $imagen = "default-book.png";
            } else {
                $data   = array('upload_data' => $this->upload->data());
                $imagen = $data["upload_data"]["file_name"];
            }

            $dataLibro = array(
                'codigo_ubicacion'    => $codigo_ubicacion,
                'numero_registro'        	=> $numero_registro,
                'titulo'      			=> $titulo,
                'revista'       			=> $revista,
                'año_publicacion' 			=> $publicacion,
                'editorial'   			=> $editorial,
                'lugar'    			=> $lugar,
                'ejemplares'  			=> $ejemplares,
                'prestados'   			=> 0,
                "imagen"      			=> $imagen,
            );

            if ($this->Revistas_model->save($dataLibro)) {
            	$this->session->set_flashdata("success","La Revista fue registrado exitosamente");
                redirect(base_url() . "revistas/add");
            } else {
                //$this->session->set_flashdata("error","No se pudo registrar al usuario");
                redirect(base_url() . "revistas/add");
            }
        }
	}

	public function edit($id)
    {
        $contenido_interno = array(
            'revista'      => $this->Revistas_model->getRevista($id),
        );

        $contenido_exterior = array(
            'title'     => 'Editar Revista',
            'contenido' => $this->load->view('revistas/edit', $contenido_interno, true),
        );

        $this->load->view('template', $contenido_exterior);
    }

    public function update(){
    	$idRevista = $this->input->post("idRevista");
    	$numero_registro      = $this->input->post("numero_registro");
        $codigo_ubicacion        = $this->input->post("codigo_ubicacion");
        $titulo      = $this->input->post("titulo");
        $revista       = $this->input->post("revista");
        $publicacion = $this->input->post("publicacion");
        $editorial   = $this->input->post("editorial");
        $lugar    = $this->input->post("lugar");
        $ejemplares  = $this->input->post("ejemplares");

        $revistaActual = $this->Revistas_model->getRevista($idRevista);
        $is_unique = '';
        if ($revistaActual->codigo_ubicacion != $codigo_ubicacion) {
        	$is_unique = '|is_unique[revistas.codigo_ubicacion]';
        }

        $this->form_validation->set_rules('codigo_ubicacion', 'Codigo Ubicacion', 'trim|required'.$is_unique, array('required' => 'Debes proporcionar un %s.', 'is_unique' => 'Este %s ya existe'));
     
        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

        if ($this->form_validation->run() == false) {
            $this->edit($idRevista);
        } else {
            $config['upload_path']   = './assets/images/revistas';
            $config['allowed_types'] = 'gif|jpg|png';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('imagen')) {
                $imagen = $imagenLast;
            } else {
                $data   = array('upload_data' => $this->upload->data());
                $imagen = $data["upload_data"]["file_name"];
            }

            $dataLibro = array(
                'codigo_ubicacion'    => $codigo_ubicacion,
                'numero_registro'        	=> $numero_registro,
                'titulo'      			=> $titulo,
                'revista'       			=> $revista,
                'año_publicacion' 			=> $publicacion,
                'editorial'   			=> $editorial,
                'lugar'    			=> $lugar,
                'ejemplares'  			=> $ejemplares,
                "imagen"      			=> $imagen,
            );

            if ($this->Revistas_model->update($idRevista,$dataLibro)) {
            	$this->session->set_flashdata("success","La informacion de la Revista fue actualizada correctamente");
                redirect(base_url() . "revistas");
            } else {
                //$this->session->set_flashdata("error","No se pudo registrar al usuario");
                redirect(base_url() . "revistas/edit/".$idRevista);
            }
        }
    }
}
