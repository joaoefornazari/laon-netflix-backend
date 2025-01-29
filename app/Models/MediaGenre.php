<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaGenre extends Model
{
    use HasFactory;

		/**
		 * The attributes that are mass assignable.
		 * 
		 * @var array<int, string>
		 */
		protected $fillable = [
			'media_id',
			'genre_id'
		];

		public $timestamps = true;
}
