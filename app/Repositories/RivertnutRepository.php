<?php

namespace App\Repositories;

use App\Models\Rivertnut;
use App\Repositories\BaseRepository;

/**
 * Class RivertnutRepository
 * @package App\Repositories
 * @version April 7, 2022, 6:40 am UTC
*/

class RivertnutRepository extends BaseRepository
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
        return Rivertnut::class;
    }
}
