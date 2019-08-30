<?php 

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {
	// Prevent Eloquent from requiring an updated_at field
	public $timestamps = false;
	
}

?>