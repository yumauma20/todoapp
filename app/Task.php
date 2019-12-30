<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Task extends Model
{
    /**
     * 状態定義
     */

    const STATUS = [
        1 => ['label'=>'未着手', 'class' => 'label-danger'],
        2 => ['label'=>'着手中', 'class' => 'label-info'],
        3 => ['label'=>'完了', 'class' => ''],
    ];

     /**
     * 状態のラベル
     * @return string
     */

    public function getStatusLabelAttribute()
    {
        //状態値
        $status = $this->attribute['status'];

        //定義されていなければ空文字を返す
        if(!isset(self::STATUS[$status])){
            return '';
        }

        return self::STATUS[$status]['class'];
    }

    public function getFormattedDueDateAttribute()
    {
        return Carbon::createFromFormat('Y-m-d',$this->attributes['due_date'])
        ->format('Y-m-d');
    }
}
