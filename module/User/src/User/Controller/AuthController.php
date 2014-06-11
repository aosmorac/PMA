<?php
/**********************************************************
 * CLIENTE: PMA Colombia
 * ========================================================
 * 
 * @copyright PMA Colombia 2014
 * @updated 10/06/2014 08:00
 * @version 1
 * @author {Abel Oswaldo Moreno Acevedo} <{moreno.abel@gmail.com}>
 **********************************************************/

namespace User\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Debug\Debug;
use User\Form\LoginForm;
use Zend\View\Model\ViewModel;
use User\Model\Tables\UserTable;
use User\Model\User;

/**********************************************************
 * CONTROLADOR AuthController
 * ======================================================= 
 * 
 *	ATRIBUTOS
 *
 *
 * 	METODOS
 *	indexAction();
 *	loginAction();
 *  enterAction();  // Realiza loggin y activa sesion
 *  
 **********************************************************/
class AuthController extends AbstractActionController
{
    
    /*
     * index
     * 
     */
    public function indexAction()
    {
        return array();
    }
    
    /*
     * login
     * 
     * Muestra el formulario de ingreso
     */
    public function loginAction()
    {
        $form = new LoginForm();
        return array('form' => $form);
    }
    
    /*
     * enter
     * 
     * Toma los datos ingresados en el formulario login
     * compara con la base de datos e inicia sesion.
     */
    public function enterAction()
    {
        $request = $this->getRequest();
        if ($request->isPost()) {
            $user = new User();
            if ($user->login(trim($request->getPost('username')), trim($request->getPost('password')))){
                echo 'ok';
                //Debug::dump($user->getActiveUser());
            }
        }
        return $this->response; //Desabilita View y Layout
    }

    
}
