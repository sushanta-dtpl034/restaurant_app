<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SuperCategory extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'msts_super_category';
    const CREATED_AT = 'created_date';
    const UPDATED_AT = 'modify_date';
    const DELETED_AT = 'deleted_at';

    protected $fillable = [
        'name','image','modify_by','created_by'
    ];
}
