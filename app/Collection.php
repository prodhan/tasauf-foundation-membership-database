<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    protected $table = 'collections';
    protected $fillable = [
        'member_id',
        'date',
        'month',
        'year',
        'method',
        'amount',
        'head',
        'remarks',
        'user_id',
    ];
    /**
     * @var mixed
     */
    private $member_id;
    /**
     * @var mixed
     */
    private $year;
    /**
     * @var mixed
     */
    private $month;

    public function member(){
        return $this->hasOne(Member::class, 'id', 'member_id');
    }

    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
