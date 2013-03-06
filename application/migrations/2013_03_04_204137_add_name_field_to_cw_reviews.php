<?php

class Add_Name_Field_To_Cw_Reviews {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('Data_Reviews_Carwashes', function($table)
		{
			$table->text('title');
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('Data_Reviews_Carwashes', function($table)
		{
			$table->drop_column('title');
		});
	}

}
