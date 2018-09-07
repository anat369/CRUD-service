<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['name', 'key'];


    public function history()
    {
        return $this->hasOne(History::class);
    }

    /**
     * @param array $fields
     * @return Item
     */
    public static function add( array $fields)
    {
        $item = new static;
        $item->fill($fields);
        $item->save();

        return $item;
    }

    /**
     * @param array $fields
     */
    public function edit(array $fields)
    {
        $this->fill($fields);
        $this->save();
    }

    /**
     * @throws \Exception
     */
    public function remove()
    {
        $this->delete();
    }

    /**
     * Получаем историю обновления товара
     *
     * @return array
     */
    public function getHistoryText()
    {
        if (null != $this->history) {
            $history = explode('|', $this->history->text);
            return $history;
        } else {
            $history[] = 'Нет истории';
        }

        return $history;
    }
}
