<?php

namespace App\Repositories;

use App\Models\Revertsnut;
use App\Repositories\BaseRepository;

/**
 * Class RevertsnutRepository
 * @package App\Repositories
 * @version April 7, 2022, 6:20 am UTC
*/

class RevertsnutRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'text',
        'text',
        'text',
        'text',
        'text',
        'text',
        'text'
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
        return Revertsnut::class;
    }
}
