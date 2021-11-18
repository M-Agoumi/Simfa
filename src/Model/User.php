<?php
/* ************************************************************************************************ */
/*                                                                                                  */
/*                                                        :::   ::::::::   ::::::::  :::::::::::    */
/*   user.php                                          :+:+:  :+:    :+: :+:    :+: :+:     :+:     */
/*                                                      +:+         +:+        +:+        +:+       */
/*   By: magoumi <magoumi@student.1337.ma>             +#+      +#++:      +#++:        +#+         */
/*                                                    +#+         +#+        +#+      +#+           */
/*   Created: 2021/11/14 0:00:02 by magoumi         #+#  #+#    #+# #+#    #+#     #+#             */
/*   Updated: 2021/11/14 0:00:02 by magoumi      ####### ########   ########      ###.ma           */
/*                                                                                                  */
/* ************************************************************************************************ */

namespace   Model;

/**
 * Class user
 */

use Simfa\Framework\Db\DbModel;

class User extends DbModel
{
	protected ?int $entityID = null;
	protected ?string $name = NULL;
	protected ?string $username = NULL;
	protected ?string $email = NULL;
	protected ?int $status = NULL;
	protected ?string $password = NULL;


	protected static string $tableName = "users";

	/**
	 * @return array[]
	 */
	public function rules(): array
	{
		return [
		    'username' => [self::RULE_REQUIRED,[self::RULE_MAX, 'max' => 31]],
		    'name' => [self::RULE_REQUIRED,[self::RULE_MAX, 'max' => 255]],
		    'email' => [self::RULE_REQUIRED,[self::RULE_MAX, 'max' => 255]],
		    'password' => [self::RULE_REQUIRED,[self::RULE_MAX, 'max' => 255]],
		];
	}
}
