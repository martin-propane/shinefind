<?php

class Add_Frontend_User_Fields {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('Data_Users', function($table)
		{
			$table->string('first_name');
			$table->string('last_name');
			$table->boolean('newsletter');
			$table->string('state');
			$table->string('city');
			$table->string('zip');
		});	
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('Data_Users', function($table)
		{
			$table->drop_column('first_name');
			$table->drop_column('last_name');
			$table->drop_column('newsletter');
			$table->drop_column('state');
			$table->drop_column('city');
			$table->drop_column('zip');
		});	
	}

}
