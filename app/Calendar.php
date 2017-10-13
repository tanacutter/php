<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
  /**
   * Relation: Calendars belongs to User
   *
   * @return \Illuminate\Database\Eloquent\Relations\belongsTo
   */
  public function user()
  {
      return $this->belongsTo('App\User');
  }

}
