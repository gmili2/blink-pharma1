<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Dci extends Model
{
    use SoftDeletes;

   //protected $fillable = ['title', 'pathimage', 'datedebut', 'datefin', 'user_id'];
    protected $date = ['deleted_at'];

    //
}
