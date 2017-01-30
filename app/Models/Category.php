<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['slug', 'title', 'parent_id'];

    public static function boot(){
        parent::boot();
        static::deleting(function($model){
          // remove relation to products
          $model->posts()->detach();

          // remove parent from this category's child
          foreach ($model->childs as $child) {
            $child->parent_id = NULL;
            $child->save();
          }
        });
    }

    public function childs(){
      return $this->hasMany('App\Models\Category', 'parent_id');
    }

    public function parent(){
      return $this->belongsTo('App\Models\Category', 'parent_id');
    }

    public function posts(){
      return $this->belongsToMany('App\Models\Post');
    }
}
