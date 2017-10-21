<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuCategory extends Model
{
    /**
     * Indicate table name
     *
     * @var array
     */
    protected $table = 'menu_categories';

    /**
     * モデルのタイムスタンプを更新するかの指示
     *
     * @var bool
     */
    public $timestamps = false;
    
    /**
     * Relational table
     */
    public function practitioner_menus()
    {
        return $this->hasMany(PractitionerMenu::class);
    }

}
