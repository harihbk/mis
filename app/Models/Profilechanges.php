<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profilechanges extends Model
{
    use HasFactory;
    public $table = "profilechanges";

    public $fillable = [
        'name',
       'email',
       'mobileno',
       'useCompany',
       'userCompanyGST',
       'newsletter',
       'user_id',
       'status'
    ];
}
  