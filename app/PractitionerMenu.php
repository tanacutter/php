<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PractitionerMenu extends Model
{
    /**
     * Indicate table name
     *
     * @var array
     */
    protected $table = 'practitioner_menus';

    /**
     * モデルのタイムスタンプを更新するかの指示
     *
     * @var bool
     */
    public $timestamps = false;
    
}
