<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Like;

class Post extends Model
{
    use HasFactory;

	protected $fillable = [
		"body",
	];

	public function user() {
		return $this->belongsTo(User::class);
	}

	public function like() {
		return $this->hasMany(Like::class);
	}

	public function likedBy(User $user)
	{
		return $this->like->contains('user_id', $user->id);
	}

	// public function ownedBy(User $user)
	// {
	// 	return $user->id === $this->user_id;
	// }
}
