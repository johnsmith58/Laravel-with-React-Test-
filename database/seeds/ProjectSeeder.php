<?php

use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Project::class, 10)->create();

        foreach(\App\Project::all() as $project){
            $users = \App\User::inRandomOrder()->take(rand(1,3))->pluck('id');
            $project->users()->attach($users);
        }
    }
}
