<?php

namespace App\Repositories;

use App\Models\Specification_type;
use App\Repositories\BaseRepository;

/**
 * Class Specification_typeRepository
 * @package App\Repositories
 * @version May 2, 2021, 4:00 am UTC
*/

class Specification_typeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'spec_type',
        'description',
        'image',
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
        return Specification_type::class;
    }
}
