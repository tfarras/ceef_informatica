<?php

use Illuminate\Database\Seeder;
use App\Discipline;
use App\Teacher;
use App\Shedule;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
                'name' => 'admin',
                'email' => 'informatica@ceef.md',
                'password' => bcrypt('admin'),
                'security' => bcrypt('1593578624'),
            ]
        );

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

        DB::table('days_of_week')->insert([
                ['name' => 'Monday'],
                ['name' => 'Tuesday'],
                ['name' => 'Wednesday'],
                ['name' => 'Thursday'],
                ['name' => 'Friday']
            ]
        );


        $bagrin= new Teacher();
        $bagrin->first_name='Diana';
        $bagrin->last_name='Bagrin';
        $bagrin->function='Șef catedră Informatică';
        $bagrin->didactic_level='I';
        $bagrin->cabinet='518';
        $bagrin->email='dianabagrin@yahoo.com';
        $bagrin->image='bagrin.png';
        $bagrin->save();
        $zatica= new Teacher();
        $zatica->first_name='Alexandru';
        $zatica->last_name='Zatîca';
        $zatica->function='Profesor';
        $zatica->didactic_level='II';
        $zatica->cabinet='514';
        $zatica->email='zatica.alexandru@gmail.com';
        $zatica->image='zaticat.jpg';
        $zatica->save();
        $ganea= new Teacher();
        $ganea->first_name='Ion';
        $ganea->last_name='Ganea';
        $ganea->function='Profesor';
        $ganea->didactic_level='II';
        $ganea->cabinet='521';
        $ganea->email='iganea9@yahoo.com';
        $ganea->image='ganea.jpg';
        $ganea->save();
        $liseniuc= new Teacher();
        $liseniuc->first_name='Adrian';
        $liseniuc->last_name='Lîseniuc';
        $liseniuc->function='Profesor';
        $liseniuc->cabinet='516';
        $liseniuc->email='alyseniuc@gmail.com';
        $liseniuc->image='liseniuc.jpg';
        $liseniuc->save();
        $gurdis= new Teacher();
        $gurdis->first_name='Alina';
        $gurdis->last_name='Gurdiș';
        $gurdis->function='Profesor';
        $gurdis->didactic_level='II';
        $gurdis->cabinet='523';
        $gurdis->email='gurdisalina@gmail.com';
        $gurdis->image='gurdis.jpg';
        $gurdis->save();
        $gurdis= new Teacher();
        $gurdis->first_name='Galina';
        $gurdis->last_name='Luncașu';
        $gurdis->function='Profesor';
        $gurdis->didactic_level='I';
        $gurdis->cabinet='512';
        $gurdis->email='luncas.galina@gmail.com';
        $gurdis->image='luncas.jpg';
        $gurdis->save();
        $tamara= new Teacher();
        $tamara->first_name='Tamara';
        $tamara->last_name='Zatîca';
        $tamara->function='Profesor';
        $tamara->didactic_level='II';
        $tamara->cabinet='23';
        $tamara->email='tamarazatica@yahoo.com';
        $tamara->image='zatica.jpg';
        $tamara->save();
        for ($i=1;$i<=5;$i++){
            $teachers=Teacher::get();
            foreach ($teachers as $teacher){
                $shedule=new Shedule();
                $shedule->day_of_week_id=$i;
                $shedule->teacher_id=$teacher->id;
                $shedule->save();
            }
        }
    }
}
