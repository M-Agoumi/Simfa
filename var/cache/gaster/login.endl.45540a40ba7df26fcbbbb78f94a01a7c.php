<h1>login</h1>

<?php
	/** @var User $user */

use Model\User;
use Simfa\Form\Form;

$form = Form::begin();
	echo $form->field($user, 'username')->required();
	echo $form->field($user, 'password')->required()->passwordField();
	echo $form->submit();
	$form::end();
