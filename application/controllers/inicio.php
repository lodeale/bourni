<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->_isLogin();
		$this->load->helper("form");
		$this->load->model("inicio_model");
	}

	function _isLogin(){
 		$test = $this->session->userdata('loginTrue');
 		if($test):
 			redirect("panel");
 		endif;
 	}

    public function index()
    {
        $this->load->view("inicio_view");
    }


    function acceder(){
 		$user = $this->input->post("usuario");
 		$pass = $this->input->post("clave");
 		
 		if(!isset($user) && !isset($pass)):
 			redirect("inicio");
 		endif;
 		
 		$query = $this->inicio_model->validarLogin($user,$pass);
 		if($query):
 			foreach($query as $row){
 				$permiso = ($row->permisos == 1)?TRUE:FALSE;
 				$data_session = array(
 							"loginTrue"=>TRUE,
 							"email"=>$row->email,
 							"id"=>$row->id_user,
 							"user"=>$row->usuario 
 						);
 			}
 			$this->session->set_userdata($data_session);
 			redirect("panel");
 		else:
 			redirect("inicio");
 		endif;
	}

	public function registrar(){
        if($this->inicio_model->registrar($this->input->post())):
            redirect("panel");
        else:
            redirect("panel");
        endif;
    }
}

/* End of file controllername.php */
/* Location: ./application/controllers/controllername.php */