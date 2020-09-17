<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Member extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $table = 'members';
    protected $fillable = [
        'membership_date',
        'name',
        'photo',
        'designation',
        'mobile',
        'email',
        'nid',
        'dob',
        'tin',
        'occupation',
        'org_name',
        'education',
        'address',
        'remarks',
    ];
    /**
     * @var mixed
     */
    private $id;
}
