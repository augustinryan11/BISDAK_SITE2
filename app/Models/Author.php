<?php
 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Author extends Model{
   

   protected $table = 'tblauthors';

// column sa table
   protected $fillable = [
       'id','fullname', 'gender', 'birthday'
   ];

   public $timestamps = false;
   protected $primarykey = 'id';
}