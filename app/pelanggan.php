<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pelanggan extends Model
{
    protected $table="tblpelanggan";

    protected $fillable = ['nama','alamat','telepon','email'];
}
