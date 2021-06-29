<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KitabMilikSantri extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_kms',
        'id_kitab',
        'id_santri',
        'id_pesantren',
        'status',
        'created_at',
        'updated_at'
    ];
    protected $primaryKey = 'id_kms';

    protected $table = 'kitab_milik_santri';
}
