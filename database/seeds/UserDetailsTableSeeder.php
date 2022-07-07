<?php

use App\User;
use App\UserDetail;
use Illuminate\Database\Seeder;

class UserDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $new_user_detail = new UserDetail();
        $new_user_detail->address = 'Via Papa Giovanni XXIII, 25';
        $new_user_detail->phone_number = '3407050544';
        $new_user_detail->user_id = User::all()->first()->id;
        $new_user_detail->save();
    }
}
