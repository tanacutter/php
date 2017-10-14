<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{

  /**
   * Indicate table name
   *
   * @var array
   */
  protected $table = 'staffs';

  /**
   * Relation: Calendars belongs to User
   *
   * @return \Illuminate\Database\Eloquent\Relations\belongsTo
   */
  public function user()
  {
      return $this->belongsTo('App\User');
  }

  
  /**
   * Relation: User has many Posts.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function calendars()
  {
      // 新しい順で取得する
      return $this->hasMany('App\Calendar')->latest();
  }

}
