<?php


class Usuarios {
    private $idusuario;
    private $deslogin;
    private $dessenha;
    private $dtcadastro;

    public function getIdUsuario(){
        return $this->idusuario;
    }

    public function setIdUsuario($value){
        $this->idusuario = $value;
    }

    public function getDesLogin(){
        return $this->deslogin;
    }

    public function setDesLogin($login){
        $this->deslogin = $login;
    }

    public function getDesSenha(){
        return $this->dessenha;
    }

    public function setDesSenha($password){
        $this->dessenha = $password;
    }

    public function getDtCadastro(){
        return $this->dtcadastro;
    }

    public function setDtCadastro($time){
        $this->dtcadastro = $time;
    }

    public function loadById($id){
        $sql = new Sql();

        $results = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID", array(
            ":ID"=>$id
        ));
        if(count($results) > 0){
            $this->setData($results[0]);
        }
    }


    public static function search($login){
        $sql = new Sql();
        return $sql->select("SELECT * FROM tb_usuarios WHERE deslogin LIKE :SEARCH ORDER BY deslogin", array(
            ':SEARCH'=>"%".$login."%"
        ));
    }

    public static function getList(){
        $sql = new Sql();
        return $sql->select("SELECT * FROM tb_usuarios ORDER BY deslogin");
    }

    public function login($login, $password){
       
        $sql = new Sql();

        $results = $sql->select("SELECT * FROM tb_usuarios WHERE deslogin = :LOGIN AND dessenha = :PASSWORD", array(
            ':LOGIN'=>$login,
            ':PASSWORD'=>$password
        ));

        if(count($results) > 0){
            $this->setData($results[0]);
        }
        else{
            throw new Exception("Senha ou Login invalidos");
            
        }
    }

    public function setData($data){
        $this->setIdUsuario($data['idusuario']);
        $this->setDesLogin($data['deslogin']);
        $this->setDesSenha($data['dessenha']);
        $this->setDtCadastro(new DateTime($data['dtcadastro']));
    }

    public function insert(){
        $sql = new Sql();
        $results = $sql->select("CALL sp_usuarios_insert(:LOGIN, :PASSWORD)", array(
            ":LOGIN"=>$this->getDesLogin(),
            ":PASSWORD"=>$this->getDesSenha()
        ));

        if(count($results) > 0){
            $this->setData($results[0]);
        }
    }

    public function __construct($login = "", $senha = ""){
        $this->setDesLogin($login);
        $this->setDesSenha($senha);
    }
    
    public function __toString(){
        return json_encode(array(
            "idusuario"=>$this->getIdUsuario(),
            "deslogin"=>$this->getDesLogin(),
            "dessenha"=>$this->getDesSenha(),
            "dtcadastro"=>$this->getDtCadastro()->format("d/m/Y H:i:s")
        ));
    }
}