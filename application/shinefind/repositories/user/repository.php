<?php namespace Shinefind\Repositories;

use \stdClass;
use Laravel\Database;
use Laravel\Hash;
use Shinefind\Entities\User;
use Shinefind\Services\User_Validator;

class User_Repository
{
	public $TABLE = 'Data_Users';

	public function add($data)
	{
		$user = new User($data);

		$valid = User_Validator::validate($user);

		if ($valid)
		{
			$password = $user->password;
			$user->update(array('password'=>Hash::make($password)));
			$id = Database::table($this->TABLE)->insert_get_id(get_object_vars($user));
			return $id;
		}
		else
		{
			return 0;
		}
	}

	public function edit($id, $data)
	{
		$user = $this->get_entity(Database::table($this->TABLE)->where('id', '=', $id)->first());

		$user->update($data);

		$valid = User_Validator::validate($user);

		if ($valid)
		{
			//if a new password was entered, hash/salt it
			if (isset($data['password']))
			{
				$password = $user->password;
				$user->update(array('password'=>Hash::make($password)));
			}
			Database::table($this->TABLE)->where('id', '=', $id)->update(get_object_vars($user));
			return $id;
		}
		else
		{
			return 0;
		}

	}

	public function delete($id)
	{
		Database::table($this->TABLE)->delete($id);
	}

	public function get_all()
	{
		return $this->get_entities(Database::table($this->TABLE)->get());
	}

	public function get($id)
	{
		return $this->get_entity(Database::table($this->TABLE)->where('id', '=', $id)->first());
	}

	public function get_with_email($email)
	{
		return $this->get_entity(Database::table($this->TABLE)->where('email', '=', $email)->first());
	}

	public function get_entities($user_tuples)
	{
		$users = array();
		foreach ($user_tuples as $i=>$user)
		{
			$users[$i] = $this->get_entity($user);
		}

		return $users;
	}

	public function get_entity($tuple)
	{
		return new User(get_object_vars($tuple));
	}
}

