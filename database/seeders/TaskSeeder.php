<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Task;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // phan them du lieu mau 
        Task::create([
            'title' =>'cong viec 1',
            'description'=>'Mo ta cong viec 1',
            'completed'=> false,
        ]);
        Task::create([
            'title' =>'cong viec 2',
            'description'=>'Mo ta cong viec 2',
            'completed'=> false,
        ]);
        Task::create([
            'title' =>'cong viec 3',
            'description'=>'Mo ta cong viec 3',
            'completed'=> true,
        ]);
        Task::create([
            'title' =>'cong viec 4',
            'description'=>'Mo ta cong viec 4',
            'completed'=> false,
        ]);
        Task::create([
            'title' =>'cong viec 5',
            'description'=>'Mo ta cong viec 5',
            'completed'=> false,
        ]);
    }
}
