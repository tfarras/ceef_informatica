<?php

use Illuminate\Database\Seeder;
use App\Discipline;

class DisciplineTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list_disciplines=[
            'Proiectarea și Administrarea paginilor web',
            'Asistență pentru programarea site-urilor web',
            'Administrarea sistemelor de operare',
            'Proiectarea sistemelor informatice',
            'Procesarea imaginilor',
            'Retele de calculatoare',
            'Baze de date',
            'Asamblarea calculatorului',
            'Sisteme de operare',
            'Programarea procedurală',
            'Programarea structurată',
            'Programarea calculatorului',
            'Asistența pentru POO',
            'Asistența pentru programarea vizuală',
            'Tehnologii Moderne de Programare',
            'Aplicaţii .Net',
            'Administrarea sistemelor de operare',
            'Sisteme de operare',
            'Studii medii de specialitate',
            'TIC (Tehnologii informationale de comunicare)',
            'Sistem de gestiune a bazelor de date',
            'Aplicații cu baze de date'
        ];

        foreach ($list_disciplines as $list_discipline){
            $discipline= new Discipline;
            $discipline->name=$list_discipline;
            $discipline->save();
        }
    }
}
