<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonRole extends Model
{
    use HasFactory;

		/**
		 * The attributes that are mass assignable.
		 * 
		 * @var array<int, string>
		 */
		protected $fillable = [
			'person_id',
			'role_id'
		];

		public $timestamps = true;
}
