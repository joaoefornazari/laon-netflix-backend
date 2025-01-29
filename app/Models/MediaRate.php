<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaRate extends Model
{
    use HasFactory;

		/**
		 * The attributes that are mass assignable.
		 * 
		 * @var array<int, string>
		 */
		protected $fillable = [
			'media_id',
			'reviewer_id',
			'rate'
		];		

		public $timestamps = true;
}
