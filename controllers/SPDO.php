<?php

use mysql_xdevapi\Result;

class SPDO
{

    private $PDOInstance = null;

    private static $instance = null;


    const DEFAULT_SQL_USER = 'root';

    const DEFAULT_SQL_HOST = 'localhost';


    const DEFAULT_SQL_PASS = '';


    const DEFAULT_SQL_DTB = 'manager';


    private function __construct()
    {
        $this->PDOInstance = new PDO('mysql:dbname='.self::DEFAULT_SQL_DTB.';host='.self::DEFAULT_SQL_HOST.';charset=utf8',self::DEFAULT_SQL_USER ,self::DEFAULT_SQL_PASS);
    }
    public static function getInstance()
    {
        if(is_null(self::$instance))
        {
            self::$instance = new SPDO();
        }
        return self::$instance;
    }
    public function query($query)
    {
        return $this->PDOInstance->query($query);
    }
    public function login($login,$pass){
        $password = sha1($pass);
        $query = $this->PDOInstance->prepare("SELECT  id,lastname,firstname,section , role from users where login = ? and passwd = ?");
        $query->execute(array($login,$password));
        if ($query->rowCount()==1){
//            $query->setFetchMode(PDO::FETCH_OBJ);
            $loged = $query->fetch();

            return [true,$loged];
        }else {

            return false;
        }
    }
    public function getUser($idUser){
        $query =$this->PDOInstance->prepare("SELECT lastname, firstname ,section,role FROM users where id = :idUser");
        $query->execute(array('idUser'=>$idUser));
        return $result = $query->fetch();

    }
    public function getAllUser(){
        $query =$this->PDOInstance->prepare("SELECT id ,login, lastname, firstname ,section,role FROM users");
        $query->execute();
        $result = $query->fetchAll();

        return $result;
    }
    public function AddUser($lastname,$firstname,$section,$role , $passwd){
        $login = $lastname[0].$firstname;
        $query=$this->PDOInstance->prepare("INSERT INTO users (login, passwd, lastname, firstname, section,role) value (':login',':passwd',':lastname',':firstname',':section',':role')");
        $query->execute(array('login'=>$login, 'passwd'=>$passwd, 'lastname'=>$lastname, 'firstname'=>$firstname, 'section'=>$section,'role'=>$role));

    }
    public function getUserSection($Sections){
        $Sections = (int)$Sections;
        $query = $this->PDOInstance->prepare("SELECT id, section FROM classes where id = '".$Sections."'");
        $query->execute();
        $result = $query->fetchAll();

        return $result;
    }
    public function getNotes(){

    }
    public function getData($id_user){
        $query = $this->PDOInstance->prepare("SELECT subject , result FROM data where id_user = '".$id_user."'");
        $query->execute();
        $result = $query->fetchAll();

        return $result;
    }
    public function pwdchange($id_user,$newpass){
        $query= $this->PDOInstance->prepare("UPDATE users set passwd = ? where id = ?");
        $query->execute(array($newpass,$id_user));

        return $query;
    }
    public function getSection($exclude){
        if ($exclude !=="none"){
            $exclude = (int)$exclude;

            $query = $this->PDOInstance->prepare("Select * from classes where id != '". $exclude ."'");

            $query->execute();
        }else {
            $query = $this->PDOInstance->prepare("Select * from classes");
            $query->execute();
        }
        $query->execute();
        return $result = $query->fetchAll();

    }
}