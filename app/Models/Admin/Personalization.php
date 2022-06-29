<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Personalization extends Model
{
    use HasFactory;
    use SoftDeletes;
    const CREATED_AT = 'created_date';
    const UPDATED_AT = 'modify_date';
    const DELETED_AT = 'deleted_at';

    protected $fillable = [
        'name','image','type','options'
    ];

}
