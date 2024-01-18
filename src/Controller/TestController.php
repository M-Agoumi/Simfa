<?php
/* ************************************************************************************************ */
/*                                                                                                  */
/*                                                        :::   ::::::::   ::::::::  :::::::::::    */
/*   TestController.php                                :+:+:  :+:    :+: :+:    :+: :+:     :+:     */
/*                                                      +:+         +:+        +:+        +:+       */
/*   By: magoumi <magoumi@student.1337.ma>             +#+      +#++:      +#++:        +#+         */
/*                                                    +#+         +#+        +#+      +#+           */
/*   Created: 2023/12/18 13:02:16 by magoumi         #+#  #+#    #+# #+#    #+#     #+#             */
/*   Updated: 2023/12/18 13:02:16 by magoumi      ####### ########   ########      ###.ma           */
/*                                                                                                  */
/* ************************************************************************************************ */

namespace Controller;

/**
 * Class TestController
 */

class TestController extends \Simfa\Action\Controller
{

   public function __construct()
   {
        // TODO implement your middlewares
   }

   public function index()
   {
      return render('TestController.index.gaster.php', ['controller' => 'TestController.php', 'view' => 'TestController.gaster.php']);
   }
}
