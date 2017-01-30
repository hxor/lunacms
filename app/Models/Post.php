<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['user_id', 'slug', 'title', 'body', 'image', 'published'];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function user(){
    	return $this->belongsTo('App\Models\User');
    }

    public function categories(){
      return $this->belongsToMany('App\Models\Category');
    }
    
    /**
     * Deleting the relation post with categories
     * @return [type] [description]
     */
    public static function boot(){
        parent::boot();

        static::deleting(function($model){
            // remove relations to category
            $model->categories()->detach();
        });
    }

    /**
     * Custom Accessor Array
     * Berisi Semua id kategori yg berhubungan dengan suatu postingan
     * Menggunakan method "pluck" bukan lagi "lists" *laravel 5.3
     * @return [array] [id categories list]
     */
    public function getCategoryListsAttribute(){
        if ($this->categories()->count() < 1) {
            return null;
        }
        return $this->categories->pluck('id')->all();
    }

    public function getCategoryPostAttribute(){
        foreach ($this->categories as $category){
                $cat[] = '<span class="label label-primary">
                            <i class="fa fa-btn fa-tags"></i>'.$category->title.' 
                        </span>';
        }
        return $cat;
    }
}
