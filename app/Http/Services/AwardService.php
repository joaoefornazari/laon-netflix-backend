<?php

namespace App\Http\Services;

use App\Models\Award;
use Exception;
use Illuminate\Support\ServiceProvider;

class AwardService extends ServiceProvider
{
    protected $award;

    public function __construct(Award $award)
    {
        $this->award = $award;
    }

    /**
     * Create a new award using data payload.
     * @param array $data The data payload.
     * @return array
     */
    public function createAward(array $data)
    {
        $query = $this->award->query();
        $award = $query->create($data)->toArray();
        return $award;
    }

    /**
     * Get an award by its id.
     * @param int $id The Award id.
     * @return array
     */
    public function getAward(int $id)
    {
        $query = $this->award->query();
        $award = $query->where('id', $id)->get()->toArray();
        return $award;
    }

    /**
     * Delete an award by its id.
     * @param int $id The Award id.
     * @return array
     */
    public function deleteAward(int $id)
    {
        $query = $this->award->query();
        $query->where('id', $id)->delete();
        return ['id' => $id];
    }

    /**
     * Update an award's data.
     * @param array $data The data to be updated.
     * @param int $id The Award's id.
     * @return int 1 for True/Success, 0 for False/Failure.
     */
    public function updateAward(array $data, int $id)
    {
        $query = $this->award->query();

        if (array_key_exists('name', $data)) {
            $params['name'] = $data['name'];
        } else {
            throw new Exception('Payload is missing fields.', 400);
        }

        return $query->where('id', $id)->update($params);
    }
}