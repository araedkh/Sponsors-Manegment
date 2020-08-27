<?php

use Illuminate\Database\Seeder;
use App\Models\CoSoponsor;

class CorSponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $CoSponsor = [

        	[
        		'Country' => 'Lebnon',
        		'FullName' => 'Foundation for International Cooperation',
        		'ContactPerson' => 'ali amer',
        		'Address' => 'Beirut - Al Mina Street',
        		'FirstTel' => '234567',
        		'SecondTel' => '256991',
        		'Email' => 'moaath155@gmail.com'

        	],

        	[
        		'Country' => 'Jordan',
        		'FullName' => 'Al-Salah Charitable Society',
        		'ContactPerson' => 'mahmood radi',
        		'Address' => 'Amman junction 17th',
        		'FirstTel' => '256789',
        		'SecondTel' => '243211',
        		'Email' => 'mahmood155@gmail.com'

        	],

        	[
        		'Country' => 'Syria',
        		'FullName' => 'Shipping company',
        		'ContactPerson' => 'zaid sami',
        		'Address' => 'The city of Aleppo',
        		'FirstTel' => '287654',
        		'SecondTel' => '243211',
        		'Email' => 'zaidf5@gmail.com'

        	],
                   ];

                   foreach ($CoSponsor as $cosponsor) {
            CoSoponsor::create(array(
                'Country' => $cosponsor['Country'],
                'FullName' => $cosponsor['FullName'],
                'ContactPerson' => $cosponsor['ContactPerson'],
                'Address' => $cosponsor['Address'],
                'FirstTel' => $cosponsor['FirstTel'],
                'SecondTel' => $cosponsor['SecondTel'],
                'Email' => $cosponsor['Email'],
                
            ));
        }
    }
}
