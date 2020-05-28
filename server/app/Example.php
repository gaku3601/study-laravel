<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Example extends Model
{
    // 対応するテーブルを記載
    protected $table = 'examples';
    // 主キーの指定
    protected $primaryKey = 'id';
    // created_atとupdated_atの自動更新をONにする
    public $timestamps = true;
}
