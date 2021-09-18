<?php

namespace App\Repositories;

use App\Models\Specification;
use App\Repositories\BaseRepository;

/**
 * Class SpecificationRepository
 * @package App\Repositories
 * @version May 2, 2021, 4:00 am UTC
*/

class SpecificationRepository extends BaseRepository
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
        return Specification::class;
    }
}
