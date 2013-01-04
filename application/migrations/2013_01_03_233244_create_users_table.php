<?php

class Create_Users_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Data_Users', function($table)
		{
			$table->increments('id');
			$table->string('email');
			$table->string('password');
			$table->boolean('admin');
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('Data_Users');
	}
}

