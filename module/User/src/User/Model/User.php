<?php
/**********************************************************
 * CLIENTE: PMA Colombia
 * ========================================================
 * 
 * @copyright PMA Colombia 2014
 * @updated 11/06/2014 14:00
 * @version 1
 * @author {Abel Oswaldo Moreno Acevedo} <{moreno.abel@gmail.com}>
 **********************************************************/
namespace User\Model;

use User\Model\Tables\UserTable;
use Zend\Debug\Debug;
use Zend\Authentication\Storage;

/**********************************************************
 * MODELO User
 * ======================================================= 
 * 
 *	ATRIBUTOS
 *	$userTable   // Tabla usuarios
 *
 *
 * 	METODOS
 *	login();
 *  
 **********************************************************/
class User //extends Storage\Session
{
    protected $userTable;
    
    public function __construct()
    {
    	$this->userTable = new UserTable();	// Inicializa la tabla
    }
    
    public function login($username = '', $password = '')
    {
        $user = $this->userTable->getUser($username, $password);
        if ($user){
            //$this->session->getManager()->user($user);
            return true;
        }
        return false;
    }
    
    public function getActiveUser(){
        //return $this->session->getManager()->user();
    }
}

?>