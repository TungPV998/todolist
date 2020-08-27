<?php

use Illuminate\Database\Seeder;
use App\Model\ListTask as ListTask;
class ListTodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ListTask::class,5)->create();
    }
}
