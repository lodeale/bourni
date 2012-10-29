<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Panel extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->_isLogin();
        $this->load->model("panel_model");
	}

	function _isLogin(){
 		$test = $this->session->userdata('loginTrue');
 		if($test != TRUE):
 			redirect("inicio");
 		endif;
 	}

    public function index()
    {
        $iduser = $this->session->userdata("id");
        $data["post"] = $this->panel_model->getPost($iduser);
        $this->load->view("muro_view",$data);
    }

    public function inicio(){
        $iduser = $this->session->userdata("id");
        $data["post"] = $this->panel_model->getInicio($iduser);
        $this->load->view("panel_view",$data);
    }

    public function insertMuro(){
        if($this->input->post('btoCodePasteBin')):
            $title = $this->input->post("msgMuro");
            $code = $this->input->post("code");
            //$expire = $this->input->post("expire");
            $links = $this->panel_model->pastebin($title,$code);
            $msg = "Código compartido por pastebin.. <a href='$links'>..:ver:..</a>";

        else:
            $msg = $this->input->post("msgMuro");
        endif;

        /*User sacado de sessón*/
        $user = $this->session->userdata("id");

        if($this->panel_model->insertMuro($msg,$user)):
            redirect("panel");
        else:
            redirect("panel");
        endif;
    }

    public function perfil(){
        $user = $this->session->userdata("id");
        $data["persona"] = $this->panel_model->getPersona($user);
        $this->load->view("perfil_view",$data);
    }

    public function updatePersona(){
        $query = $this->panel_model->updatePerson($this->input->post());
        if($query):
            redirect("panel/perfil");
        else:
            redirect("panel");
        endif;
    }

    public function salir(){
    	$this->session->sess_destroy();
 		redirect("inicio");
    }

    public function searchUser(){
        $user = $this->input->post("qUser");
        $user = $this->panel_model->getUser($user);

        echo "<script type='text/javascript'>";
        echo "  var Users =[";
        foreach($user as $row):
            echo "'".$row->usuario."',";
        endforeach;
        echo "'vacio'";

        echo "
            ];
            console.log(Users)
            $('#qUser').autocomplete({
                source: Users
            });
        </script>
        ";
        /*foreach($user as $row):
            echo $row->usuario."<br>";
        endforeach;*/
    }

    public function perfilFriends($user){
        $data["users"] = $this->panel_model->getSearchFriends($user);
        $this->load->view("perfil_friends_view",$data);
    }

    public function seguir($idfriends){
        $myuser = $this->session->userdata("id");
        $query = $this->panel_model->insertRelashion($myuser,$idfriends);
        if($query):
            redirect("panel");
        else:
            redirect("panel");
        endif;
    }

  

}

/* End of file controllername.php */
/* Location: ./application/controllers/controllername.php */