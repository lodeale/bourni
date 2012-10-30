<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Panel_model extends CI_Model {

    function getPost($iduser,$fecha=null){
    	$this->db->select("m.id_post, m.post, m.fecha, m.hora, c.categoria, u.usuario");
    	$this->db->from("usuarios as u, categoria as c, muro as m");
    	$this->db->where("m.id_usuario = u.id_user");
    	$this->db->where("m.id_categoria = c.id_categoria");
    	$this->db->where("m.id_usuario = ".$iduser);
    	if($fecha != null):
    		$this->db->where("m.fecha = '".$fecha."'");
    	endif;
		$this->db->order_by("m.id_post","desc");
		$query = $this->db->get();
		if($query):
			return $query->result();
		else:
			return false;
		endif;
	}

	public function getInicio($iduser){
		$postFriends = array();
		$query = $this->db->get_where("relaciones",array("id_user"=>$iduser));
		$relashionFriends = $query->result();

		foreach($relashionFriends as $row):
			$postFriends[] = $this->getPost($row->id_friends);
		endforeach;
		
		return $postFriends;

	}


	private function uniqueRelashion($idUser,$idFriends){
		$this->db->where("id_user = ".$idUser);
		$this->db->where("id_friends = ".$idFriends);
		$query = $this->db->get("relaciones");
		if($query->num_rows() > 0):
			return true;
		else:
			return false;
		endif;
		
	}

	function insertMuro($msg,$user,$cat=1){
		$this->db->set("post",$msg);
		$this->db->set("id_categoria",$cat);
		$this->db->set("fecha",date("Y-m-d",time()));
		$this->db->set("hora",date("H:i:s",time()));
		$this->db->set("id_usuario",(int)$user);
		$query = $this->db->insert("muro");
		if($query):
			return true;
		else:
			return false;
		endif;
	}

	public function getPersona($user){
		$this->db->select("p.id_persona,p.n_p,p.estudios,p.profesion,p.lenguajes,p.descripcion,p.imagen");
		$this->db->from ("personas as p, usuarios as u");
		$this->db->where("u.id_persona = p.id_persona");
		$this->db->where("u.id_user = ".$user);
		$query = $this->db->get();
		if($query->num_rows() > 0):
			return $query->result();
		else:
			return false;
		endif;
	}

	public function updatePerson($post){
		$this->db->set("n_p",$post["n_p"]);
		$this->db->set("estudios",$post["estudios"]);
		$this->db->set("profesion",$post["profesion"]);
		$this->db->set("lenguajes",$post["lenguajes"]);
		$this->db->set("descripcion",$post["descripcion"]);
		$this->db->set("imagen",$post["imagen"]);
		$this->db->where("id_persona",$post["id_persona"]);
		$query = $this->db->update("personas");
		if($query):
			return true;
		else:
			return false;
		endif;
	}

	public function getUser($user){
		$this->db->select("usuario");
		$this->db->from("usuarios");
		$this->db->like("usuario",$user);
		$this->db->limit("10");
		$query = $this->db->get();
		if($query->num_rows > 0):
			return $query->result();
		else:
			return false;
		endif;
	}


	public function getSearchFriends($user){
		$this->db->select("u.id_user,u.usuario,p.profesion");
		$this->db->from("usuarios as u, personas as p");
		$this->db->where("u.id_persona = p.id_persona");
		$this->db->like("usuario",$user);
		$query = $this->db->get();
		if($query->num_rows > 0):
			return $query->result();
		else:
			return false;
		endif;
	}

	public function insertRelashion($myuser,$idfriends){
		/*
		* Testeamos que no se duplique ni sea el mismo 
		* el usuario que sigue
		*/
		if($this->uniqueRelashion($myuser,$idfriends)):
			return false;
		endif;

		if($myuser === $idfriends):
			return false;
		endif;

		/*
		* Si todo salio bien insertamos la relación
		*/
		$this->db->set("id_user",$myuser);
		$this->db->set("id_friends",$idfriends);
		$this->db->set("fecha",date("Y-m-d",time()));
		$this->db->set("estado",0);
		$query = $this->db->insert("relaciones");
		if($query):
			return true;
		else:
			return false;
		endif;
	}

	/*
	* Apis de PasteBin
	*/
	function pastebin($title,$code,$expire='10M',$perm='1'){
		$api_dev_key 			= '5b1fe199f8fd7a86810632c541b59c01'; // your api_developer_key
		$api_paste_code 		= $code; // your paste text
		$api_paste_private 		= $perm; // 0=public 1=unlisted 2=private
		$api_paste_name			= $title; // name or title of your paste
		$api_paste_expire_date 		= $expire;
		$api_paste_format 		= 'php';
		$api_user_key 			= ''; // if an invalid api_user_key or no key is used, the paste will be create as a guest
		$api_paste_name			= urlencode($api_paste_name);
		$api_paste_code			= urlencode($api_paste_code);


		$url 				= 'http://pastebin.com/api/api_post.php';
		$ch 				= curl_init($url);

		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, 'api_option=paste&api_user_key='.$api_user_key.'&api_paste_private='.$api_paste_private.'&api_paste_name='.$api_paste_name.'&api_paste_expire_date='.$api_paste_expire_date.'&api_paste_format='.$api_paste_format.'&api_dev_key='.$api_dev_key.'&api_paste_code='.$api_paste_code.'');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_VERBOSE, 1);
		curl_setopt($ch, CURLOPT_NOBODY, 0);

		$response  			= curl_exec($ch);
		return $response;
	}
}

/* End of file panel_model.php */
/* Location: ./application/controllers/panel_model.php */