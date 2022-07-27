<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mechanikas extends Model
{
    use HasFactory;
    const RATINGS = [
        1=>'Labai blogai',
        2=>'Blogai',
        3=>'Patenkinamai',
        4=>'Gerai',
        5=>'Labai gerai'
    ];
}
