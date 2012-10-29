<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio_model extends CI_Model {

    public function validarLogin($user,$pass) {
		$this->db->select("id_user,usuario,email");
		$this->db->from("usuarios");
		$this->db->where("usuario = '$user'");
		$this->db->where("clave = '".sha1($pass)."'");
		$query = $this->db->get();
		if($query->num_rows() > 0):
			return $query->result();
		else:
			return FALSE;
		endif;
	}

	function registrar($post){
		$this->db->set("n_p",$post["n_p"]);
		$query = $this->db->insert("personas");
		$id_p = $this->db->insert_id();
		if($query):
			$this->db->set("usuario",$post["user"]);
			$this->db->set("clave",sha1($post["clave"]));
			$this->db->set("email",$post["email"]);
			$this->db->set("id_persona",$id_p);
			$query2 = $this->db->insert("usuarios");
			if($query2):
				return true;
			else:
				return false;
			endif;
		else:
			return false;
		endif;
	}

}

/* End of file modelName.php */
/* Location: ./application/controllers/modelName.php */