<?php

class Change_Admin_Field_In_Users_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('Data_Users', function($table)
		{
			$table->drop_column('admin');
		});
		Schema::table('Data_Users', function($table)
		{
			$table->integer('admin');
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
			$table->drop_column('admin');
		});
		Schema::table('Data_Users', function($table)
		{
			$table->drop_column('admin');
		});
	}

}
