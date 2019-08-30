<?php 
//namespace Models;
use Illuminate\Database\Eloquent\Model;
include('Comment.php');

class Post extends Model {
	// Prevent Eloquent from requiring an updated_at field
	public $timestamps = false;
	// Establish one-to-many relationship between Posts and Comments
	public function comments() 
	{
		return $this->hasMany('Comment');
	}
}

?>