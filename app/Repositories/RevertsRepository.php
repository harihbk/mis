<?php

namespace App\Repositories;

use App\Models\Reverts;
use App\Repositories\BaseRepository;

/**
 * Class RevertsRepository
 * @package App\Repositories
 * @version April 7, 2022, 6:15 am UTC
*/

class RevertsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'minimum',
        'Model',
        'Brand',
        'Warranty',
        'Air',
        'Handle',
        'Air',
        'Air',
        'Rivet',
        'Part',
        'Stroke',
        'Delivery',
        'Packaging',
        'Key'
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
        return Reverts::class;
    }
}
