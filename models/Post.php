<?php 

use Illuminate\Database\Eloquent\Model;
include('Comment.php');

class Post extends Model {

	public function comments() 
	{
		return $this->hasMany('Comment');
	}
}

?>