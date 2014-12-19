<?php

class UserTableSeeder extends Seeder{

	public function run(){

		DB::table('users')->delete();

		DB::table('profiles')->delete();

		$profile = Profile::create(array(
			'role' => 'administrator',
			'capabilities' => json_encode(array(
				'view_reservations',
				'make_reservations',
				'edit_reservations',
				'delete_reservations',
				'view_checkins',
				'make_checkins',
				'edit_checkins',
				'delete_checkins',
				'view_checkouts',
				'make_checkouts',
				'edit_checkouts',
				'delete_checkouts',
				'view_receipts',
				'make_receipts',
				'edit_receipts',
				'delete_receipts',
				'view_reports',
				'make_reports',
				'edit_reports',
				'delete_reports',
				'view_clients',
				'make_clients',
				'edit_clients',
				'delete_clients',
				'view_products',
				'make_products',
				'edit_products',
				'delete_products',
				'view_users',
				'make_users',
				'edit_users',
				'delete_users',
				'view_rooms',
				'make_rooms',
				'edit_rooms',
				'delete_rooms',
				'view_floors',
				'make_floors',
				'edit_floors',
				'delete_floors',
				'view_builds',
				'make_builds',
				'edit_builds',
				'delete_builds',
				'view_options',
				'make_options',
				'edit_options',
				'delete_options',
				'view_auditories',
				'make_auditories',
				'edit_auditories',
				'delete_auditories',
				)),
			));

		$user = User::create(array(
			'idProfile' => $profile->id,
			'firstName' => 'admin',
			'lastName' => 'admin',
			'email' => 'igor@gallardodesigner.com.br',
			'login' => 'admin',
			'password' => Hash::make('123456')
			));

		$user = User::create(array(
			'idProfile' => $profile->id,
			'firstName' => 'admin',
			'lastName' => 'journalist',
			'email' => 'journalist@gallardodesigner.com.br',
			'login' => 'journalist',
			'password' => Hash::make('valmir431')
			));

		$user = User::create(array(
			'idProfile' => $profile->id,
			'firstName' => 'Robert',
			'lastName' => 'DaCorte',
			'email' => 'robertdacorte@gmail.com',
			'login' => 'Robertdacorte',
			'password' => Hash::make('18554560')
			));

	}

}

?>