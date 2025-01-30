<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
	use HasFactory;

	 	/**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
			'name',
			'type',
			'original_title',
			'year',
			'duration',
			'synopsis',
			'trailer_link',
		];

		public $timestamps = true;
}
