<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu_relationship extends Model
{
    /**
     * Indicate table name
     *
     * @var array
     */
    protected $table = 'menu_relationships';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'menu_id', 'staff_id', 'user_id',
    ];

    /**
     * Relation: related to User.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Relation: related to Staff.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function staff()
    {
        return $this->belongsTo('App\Staff');
    }

    /**
     * Relation: related to Menu.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function menus()
    {
        return $this->belongsTo('App\Menu');
    }

}
