<?php

namespace App\Repositories;

use App\Models\revert_nuts;
use App\Repositories\BaseRepository;

/**
 * Class revert_nutsRepository
 * @package App\Repositories
 * @version April 7, 2022, 6:25 am UTC
*/

class revert_nutsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'minimun_order_quantity',
        'brand',
        'warranty',
        'air_consumption',
        'handle_type',
        'air_pressure',
        'air_inlet',
        'rivet_diameter',
        'part_number',
        'stroke_length',
        'delivert_time',
        'packaging_details',
        'key_details'
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
        return revert_nuts::class;
    }
}
