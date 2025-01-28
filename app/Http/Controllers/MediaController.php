<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\MediaService;
use Exception;

class MediaController extends Controller
{
	protected $mediaService;

	public function __construct(MediaService $mediaService)
	{
		$this->mediaService = $mediaService;
	}

	public function create(Request $request)
	{
		try {
			$result = $this->mediaService->createMedia($request->data);
		} catch (Exception $e) {
			return $this->error($e->getTrace(), $e->getMessage(), $e->getCode());
		}
	
		return $this->success($result, 'Media created');
	}
}
