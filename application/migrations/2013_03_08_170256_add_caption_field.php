<?php

class Add_Caption_Field {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('Data_Carwashes', function($table)
		{
			$table->text('caption');
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('Data_Carwashes', function($table)
		{
			$table->drop_column('caption');
		});
	}
}
