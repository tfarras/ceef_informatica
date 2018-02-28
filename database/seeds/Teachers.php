<?php

use Illuminate\Database\Seeder;
use App\Teacher;
class Teachers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
        $gurdis= new Teacher();
        $gurdis->first_name='Tamara';
        $gurdis->last_name='Zatîca';
        $gurdis->function='Profesor';
        $gurdis->didactic_level='I';
        $gurdis->cabinet='23';
        $gurdis->email='tamarazatica@yahoo.com';
        $gurdis->image='zatica.jpg';
        $gurdis->save();


    }
}
