<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class menu extends Model
{
    protected $table="tblmenu";

    protected $fillable = ['nama','kelompok','harga'];
}
