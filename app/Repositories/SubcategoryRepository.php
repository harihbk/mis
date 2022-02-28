<?php

namespace App\Repositories;

use App\Models\Subcategory;
use App\Repositories\BaseRepository;

/**
 * Class SubcategoryRepository
 * @package App\Repositories
 * @version May 1, 2021, 1:07 pm UTC
*/

class SubcategoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'category_id'
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
        return Subcategory::class;
    }
}
