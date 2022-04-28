<?php

namespace App\Repositories;

use App\Models\revertnutdd;
use App\Repositories\BaseRepository;

/**
 * Class revertnutddRepository
 * @package App\Repositories
 * @version April 7, 2022, 6:28 am UTC
*/

class revertnutddRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'pname'
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
        return revertnutdd::class;
    }
}
