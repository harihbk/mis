<?php

namespace App\Repositories;

use App\Models\Categorys;
use App\Repositories\BaseRepository;

/**
 * Class CategorysRepository
 * @package App\Repositories
 * @version May 1, 2021, 12:44 pm UTC
*/

class CategorysRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'icon'
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
        return Categorys::class;
    }
}
