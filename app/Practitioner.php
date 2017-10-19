<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Practitioner extends Model
{
    /**
     * Indicate table name
     *
     * @var array
     */
    protected $table = 'practitioners';

    /**
     * モデルのタイムスタンプを更新するかの指示
     *
     * @var bool
     */
    public $timestamps = false;

}
