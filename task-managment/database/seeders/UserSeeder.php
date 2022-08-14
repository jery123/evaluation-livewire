<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->truncateTables();

        User::factory()
            ->count(1)
            ->hasTasks(20)
            ->create();

        $user = User::first();

        $this->command->info( 'Admin Credentials:');
        $this->command->info( 'Email: '. $user->email);
        $this->command->info( 'Password: password');
    }

    /**
     * Truncates the users and tasks table
     *
     * @return    void
     */
    public function truncateTables()
    {
        Schema::disableForeignKeyConstraints();
        Task::truncate();
        User::truncate();
        Schema::enableForeignKeyConstraints();
    }
}
