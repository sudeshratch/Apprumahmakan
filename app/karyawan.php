<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class karyawan extends Model
{
    protected $table="tblkaryawan";

    protected $fillable = ['nama','alamat','telepon','jenis'];
}
