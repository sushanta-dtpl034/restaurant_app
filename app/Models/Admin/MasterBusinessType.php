<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MasterBusinessType extends Model{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'business_type','status','created_by','updated_by'
    ];


    


}

