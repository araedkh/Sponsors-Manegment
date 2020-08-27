<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
   protected $fillable = [
           'IdCard',
           'IdCardNumber',
           'FullName',
           'Gov',
           'City',
           'Dist',
           'AddressDetails',
           'Tel',
           'Mobile',
           'Email',
           'Nationality',
           'Country'
           
        ];

        
}
