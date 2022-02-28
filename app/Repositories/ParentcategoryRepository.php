<?php

namespace App\Repositories;

use App\Models\Parentcategory;
use App\Repositories\BaseRepository;

/**
 * Class ParentcategoryRepository
 * @package App\Repositories
 * @version May 1, 2021, 2:12 pm UTC
*/

class ParentcategoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'subcategory_id'
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
        return Parentcategory::class;
    }
}
