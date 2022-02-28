<?php

namespace App\Repositories;

use App\Models\Product_part_number;
use App\Repositories\BaseRepository;

/**
 * Class Product_part_numberRepository
 * @package App\Repositories
 * @version May 1, 2021, 4:10 pm UTC
*/

class Product_part_numberRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'part_number',
        'dates_to_ship',
        'nominal_thread_m',
        'nominal_thread_inch',
        'product_length',
        'pinch',
        'detailed_ship',
        'mounting_hole_shape',
        'basic_shape',
        'material',
        'surface_treatment',
        'tip_shape',
        'additional_shape',
        'sales_unit',
        'application',
        'strength_class_steel',
        'strength_class_stainless_steel',
        'screw_type',
        'manufacturer',
        'sale_discount',
        'cad',
        'modified_by',
        'product_id',
        'specification_id'
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
        return Product_part_number::class;
    }
}
