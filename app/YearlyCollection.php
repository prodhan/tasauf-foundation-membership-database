<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class YearlyCollection extends Model
{
    protected $table = 'yearly_collections';
    protected $fillable = [
        'member_id',
        'year',
        'jan',
        'feb',
        'march',
        'april',
        'may',
        'jun',
        'july',
        'aug',
        'sept',
        'oct',
        'nov',
        'dec',
    ];

    public function member(){
        return $this->hasOne(Member::class, 'id', 'member_id');
    }
}
