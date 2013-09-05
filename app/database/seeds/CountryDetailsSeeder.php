<?php

class CountryDetailsSeeder extends Seeder {
	public function run()
	{
		$country = array();
		
		$date= new DateTime;

		$country[] = array(
			'name' => 'India',
			'created_at' => $date->modify('-1 day +1 hour'),
			'updated_at' => $date->modify('-1 day +1 hour'),
		);

		// Delete all the posts comments
		DB::table('country_details')->truncate();

		// Insert the posts comments
		CountryDetail::insert($country);
	}
}