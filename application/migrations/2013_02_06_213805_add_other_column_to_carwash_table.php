<?php

class Add_Other_Column_To_Carwash_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('Data_Carwashes', function($table)
		{
			$table->string('option_other')->nullable();
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
			$table->drop_column('option_other');
		});
	}
}
