<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaAward extends Model
{
    use HasFactory;

		protected $table = "Media_Award";

		/**
		 * The attributes that are mass assignable.
		 * 
		 * @var array<int, string>
		 */
		protected $fillable = [
			'media_id',
			'award_id'
		];

		public $timestamps = true;
}
