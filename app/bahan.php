<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bahan extends Model
{
    protected $table="tblbahan";

    protected $fillable = ['nama','harga','qty','satuan'];
}
