<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaCrew extends Model
{
    use HasFactory;

		/**
		 * The attributes that are mass assignable.
		 * 
		 * @var array<int, string>
		 */
		protected $fillable = [
			'media_id',
			'person_id'
		];	

		public $timestamps = true;
}
