<?php

use Illuminate\Database\Seeder;
use App\Models\Sponsor;

class PerSponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $PerSponsor = [
        	[
        		'IdCard' => 'ID',
        		'IdCardNumber' => '987654123',
        		'FullName' => 'alaa raed mohammed',
        		'Gov' => 'Palestine',
        		'City' => 'Gaza',
        		'Dist' => 'Rimal District',
        		'AddressDetails' => 'OmarAlMokhtar Street',
        		'Tel' => '2567980',
        		'Mobile' => '0598765412',
        		'Email' => 'admin123@gmail.com',
        		'Nationality' => 'Palestinian',
        		'Country' => 'Qatar'
        	],

        	[
        		'IdCard' => 'Passport',
        		'IdCardNumber' => '95432156',
        		'FullName' => 'ali hassan',
        		'Gov' => 'Palestine',
        		'City' => 'Rafah',
        		'Dist' => 'EastRafah District',
        		'AddressDetails' => 'Khaled Street',
        		'Tel' => '2567768',
        		'Mobile' => '0594567712',
        		'Email' => 'alihassan123@gmail.com',
        		'Nationality' => 'Palestinian',
        		'Country' => 'Jordan'

             ],

             [
        		'IdCard' => 'ID',
        		'IdCardNumber' => '95459153',
        		'FullName' => 'Mohammed Zein',
        		'Gov' => 'Palestine',
        		'City' => 'Gaza',
        		'Dist' => 'AlZytoon District',
        		'AddressDetails' => 'Mosque of Ali bin Abi Talib Street',
        		'Tel' => '2564468',
        		'Mobile' => '0564567712',
        		'Email' => 'mohammed1776@gmail.com',
        		'Nationality' => 'Palestinian',
        		'Country' => 'Eygpt'

             ],

           ];

           foreach ($PerSponsor as $sponsor) {
            Sponsor::create(array(
                'IdCard' => $sponsor['IdCard'],
                'IdCardNumber' => $sponsor['IdCardNumber'],
                'FullName' => $sponsor['FullName'],
                'Gov' => $sponsor['Gov'],
                'City' => $sponsor['City'],
                'Dist' => $sponsor['Dist'],
                'AddressDetails' => $sponsor['AddressDetails'],
                'Tel' => $sponsor['Tel'],
                'Mobile' => $sponsor['Mobile'],
                'Email' => $sponsor['Email'],
                'Nationality' => $sponsor['Nationality'],
                'Country' => $sponsor['Country'],
            ));
        }
    }
}
