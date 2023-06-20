<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administrator = new App\User;
        $administrator->name = 'DIAN';
        $administrator->email = 'deka2826@gmail.com';
        $administrator->password = Hash::make('admin');
        $administrator->nik = '0000000000000000';
        $administrator->address = 'Desa Sidowayah Rt 07/Rw 03';
        $administrator->phone ='085156543036';
        $administrator->roles =json_encode(['ADMIN']);
        $administrator->status = 'SUDAH';

        $administrator->save();

        $administrator = new App\User;
        $administrator->name = 'User';
        $administrator->email = 'user@gmail.com';
        $administrator->password = Hash::make('user');
        $administrator->nik = '0000000000000001';
        $administrator->address = 'Desa Sidowayah Rt 07/Rw 03';
        $administrator->phone ='0851565430361';
        $administrator->roles =json_encode(['VOTER']);
        $administrator->status = 'SUDAH';

        $administrator->save();

        $this->command->info('User Admin sudah diinsert');
    }
}
