<?php

class Sponsored_Field_To_Carwash_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('Data_Carwashes', function($table)
		{
			$table->boolean('sponsored')->nullable();
			$table->text('sponsor_description')->nullable();
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
			$table->drop_column('sponsored');
			$table->drop_column('sponsor_description');
		});
	}
}

