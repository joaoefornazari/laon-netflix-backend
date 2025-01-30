<?php

namespace App\Http\Controllers;

use App\Http\Services\AwardService;
use Exception;
use Illuminate\Http\Request;

class AwardController extends Controller
{
    protected $awardService;

    public function __construct(AwardService $awardService)
    {
        $this->awardService = $awardService;
    }

    /**
     * Create a new award.
     */
    public function create(Request $request)
    {
        try {
            $result = $this->awardService->createAward($request->data);
        } catch (Exception $e) {
            return $this->error($e->getTrace(), $e->getMessage(), $e->getCode());
        }

        return $this->success($result, 'Award created');
    }

    /**
     * Read an award data, fetching it by its id.
     */
    public function read(Request $request, int $id)
    {
        try {
            $result = $this->awardService->getAward($id);
        } catch (Exception $e) {
            return $this->error($e->getTrace(), $e->getMessage(), $e->getCode());
        }

        return $this->success($result);
    }

    /**
     * Update an award's data, referred by award's id.
     */
    public function update(Request $request, int $id)
    {
        try {
            $result = $this->awardService->updateAward($request->data, $id);
            if (!$result) throw new Exception('Award data not found. Check payload again.', 404);
        } catch (Exception $e) {
            return $this->error($e->getTrace(), $e->getMessage(), $e->getCode());
        }

        return $this->success([], 'Award updated');
    }

    /**
     * Delete an award by its id.
     */
    public function delete(Request $request, int $id)
    {
        try {
            $result = $this->awardService->deleteAward($id);
        } catch (Exception $e) {
            return $this->error($e->getTrace(), $e->getMessage(), $e->getCode());
        }

        return $this->success($result, 'Award deleted');
    }
}