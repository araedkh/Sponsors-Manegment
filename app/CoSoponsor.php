<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoSoponsor extends Model
{
    protected $fillable = [
    	'Country',
    	'FullName',
    	'ContactPerson',
    	'Address',
    	'FirstTel',
    	'SecondTel',
    	'Email'

 ];
}
