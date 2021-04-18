<?php

namespace Database\Seeders;

use App\Models\Project;
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
        $pr1 = new Project();
        $pr1->project_name = 'PHP course';
        $pr1->project_info = 'Courses for back-end developers';
        $pr1->save();

        $pr2 = new Project();
        $pr2->project_name = 'Laravel course';
        $pr2->project_info = 'Courses for those, who want to know more about php Laravel framework';
        $pr2->save();

        $pr3 = new Project();
        $pr3->project_name = 'JavaScript course';
        $pr3->project_info = 'Courses for front-end developers';
        $pr3->save();
    }
}
