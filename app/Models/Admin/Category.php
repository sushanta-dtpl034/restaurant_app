<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'msts_category';
    const CREATED_AT = 'created_date';
    const UPDATED_AT = 'modify_date';
    const DELETED_AT = 'deleted_at';

    protected $fillable = [
        'name','image','parent_id'
    ];

    public function children()
    {
    	return $this->hasMany(self::class, 'parent_id','id');
    }

    public function parent()
    {
    	return $this->belongsTo(Category::class, 'parent_id');
    }

    public function getParentsNames() {
        if($this->parent) {
            return $this->parent->getParentsNames(). " > " . $this->name;
        } else {
            return $this->name;
        }
    }
}
