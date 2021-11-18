<?php
/* ************************************************************************************************ */
/*                                                                                                  */
/*                                                        :::   ::::::::   ::::::::  :::::::::::    */
/*   DefaultController.php                             :+:+:  :+:    :+: :+:    :+: :+:     :+:     */
/*                                                      +:+         +:+        +:+        +:+       */
/*   By: magoumi <magoumi@student.1337.ma>             +#+      +#++:      +#++:        +#+         */
/*                                                    +#+         +#+        +#+      +#+           */
/*   Created: 2021/11/13 23:41:33 by magoumi         #+#  #+#    #+# #+#    #+#     #+#             */
/*   Updated: 2021/11/13 23:41:33 by magoumi      ####### ########   ########      ###.ma           */
/*                                                                                                  */
/* ************************************************************************************************ */

namespace Controller;

use Model\User;
use Simfa\Framework\Application;
use Simfa\Framework\Request;

class DefaultController extends \Simfa\Action\Controller
{

   public function __construct()
   {
        // TODO implement your Controller
   }

   public function index()
   {
      $user = NEW \Model\User();
      $user->setUsername('agoumi');

      return render('home', [
		  'controller'  => '/src/Controller/DefaultController.php',
	      'view'        => '/views/template/home.gaster.php'
	      ]);
   }

   public function login(Request $request)
   {
	   if (!Application::isGuest())
		   return Application::$APP->response->redirect('/');

	   $user = new User();
	   if ($request->isPost()) {
			$user->loadData($request->getBody());

			$login = User::findOne([
				'username' => $user->getUsername(),
				'password' => $user->getPassword() // don't forget to encrypt your passwords folk, thi is just a test
				]);

			if ($login->getId()) {
				Application::$APP->login($login, '/');
			}else
				$user->addError('username', 'username or password is wrong');

			$user->setPassword('');
	   }

	   return render('login', ['user' => $user]);
   }

   public function logout()
   {
	   Application::logout('/');
   }
}
