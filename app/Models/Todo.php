<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;
    protected $fillable = ['task', 'category_id','is_completed'];

    public function todoCategory(){
    	return $this->belongsTo(Category::class,'category_id');
    }
}