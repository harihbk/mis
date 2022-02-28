<?php

namespace App\Repositories;

use App\Models\Weight;
use App\Repositories\BaseRepository;

/**
 * Class WeightRepository
 * @package App\Repositories
 * @version October 24, 2021, 3:48 am UTC
*/

class WeightRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'description'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Weight::class;
    }
}
