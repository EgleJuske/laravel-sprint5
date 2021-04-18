<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $em1 = new Employee();
        $em1->employee_name = 'Paulius';
        $em1->employee_surname = 'Pauliukaitis';
        $em1->save();

        $em2 = new Employee();
        $em2->employee_name = 'Laura';
        $em2->employee_surname = 'Laurinaitė';
        $em2->save();

        $em3 = new Employee();
        $em3->employee_name = 'Ona';
        $em3->employee_surname = 'Onutytė';
        $em3->save();

        $em4 = new Employee();
        $em4->employee_name = 'Jonas';
        $em4->employee_surname = 'Jonaitis';
        $em4->save();

        $em5 = new Employee();
        $em5->employee_name = 'Antanas';
        $em5->employee_surname = 'Fontanas';
        $em5->save();
    }
}
