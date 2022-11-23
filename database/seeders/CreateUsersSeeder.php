<?php

    namespace Database\Seeders;

    use App\Models\User;
    use Illuminate\Database\Console\Seeds\WithoutModelEvents;
    use Illuminate\Database\Seeder;

    class CreateUsersSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
            $users = [
                [
                    'name' => 'User',
                    'email' => 'user@websolutionstuff.com',
                    'role' => 0,
                    'password' => bcrypt('123456'),
                ],
                [
                    'name' => 'Super Admin',
                    'email' => 'super-admin@websolutionstuff.com',
                    'role' => 1,
                    'password' => bcrypt('123456'),
                ],
                [
                    'name' => 'Manager',
                    'email' => 'manager@websolutionstuff.com',
                    'role' => 2,
                    'password' => bcrypt('123456'),
                ],
            ];

            foreach ($users as $key => $user) {
                User::create($user);
            }
        }
    }
