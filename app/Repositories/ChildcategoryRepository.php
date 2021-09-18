<?php

namespace App\Repositories;

use App\Models\Childcategory;
use App\Repositories\BaseRepository;

/**
 * Class ChildcategoryRepository
 * @package App\Repositories
 * @version May 1, 2021, 2:13 pm UTC
*/

class ChildcategoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'parentcategory_id'
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
        return Childcategory::class;
    }
}
