<?php

class Add_Description_Fields {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('Data_Carwashes', function($table)
		{
			$table->text('description')->nullable();
		});	
		Schema::table('Data_Products', function($table)
		{
			$table->text('description')->nullable();
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
			$table->drop_column('description')->nullable();
		});	
		Schema::table('Data_Products', function($table)
		{
			$table->drop_column('description')->nullable();
		});	
	}

}
