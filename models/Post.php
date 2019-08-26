<?php 
//namespace Models;
use Illuminate\Database\Eloquent\Model;
include('Comment.php');

class Post extends Model {

	public $timestamps = false;
	
	public function comments() 
	{
		return $this->hasMany('Comment');
	}
}

?>