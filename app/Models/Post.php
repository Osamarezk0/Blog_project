<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title','description','user_id','image'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    protected static function storeRules(){
        return [
            'title' => 'required|string|unique:posts,title|min:3',
            'description' => 'required|string|min:10',
            //'user_id' => 'required|exists:users,name',
            'image' => 'required|image'
        ];
    }

    public static function updateRules(){
        return [
            'id' => 'required|exists:posts,id',
            'title' => [
                'required',
                'string',
                'min:3',
                Rule::unique('posts', 'title')->ignore(request('id'))
                ],
            'description' => 'required|string|min:10',
            'image' => 'nullable|image'
        ];
    }

}
