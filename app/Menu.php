<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Menu extends Model
{

  /**
   * Indicate table name
   *
   * @var array
   */
  protected $table = 'menus';

  /**
   * latest menu id
   *
   * @return int
   */
  public function latest_menu()
  {
      // 最新のidを取得する
      return DB::table($this->table)->orderBy('id', 'desc')->first();
  }

}
