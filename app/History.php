<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class History extends Model
{

    protected $fillable = ['item_id', 'text'];


    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }

    /**
     * @param array $fields
     * @return History
     */
    public static function add( array $fields)
    {
        $history = new static;
        $history->fill($fields);
        $history->save();

        return $history;
    }

    /**
     * Обновление истории изменения товара при его обновлении,
     * запрос не смог написать более красиво пока, надо переделать
     *
     * @param Item $item
     */
    public static function edit(Item $item)
    {
        $sql = 'UPDATE `histories` SET `text` = CONCAT(`text`, "'.self::updateText($item).'") WHERE `item_id` = ' . $item->id;
        DB::statement($sql);
    }

    /**
     * @throws \Exception
     */
    public function remove()
    {
        $this->delete();
    }

    /**
     * Формируем запись добавления товара для сохранения в таблице истории изменений товара
     *
     * @param Item $item
     * @return string
     */
    public static function setText(Item $item)
    {
        $text = 'Создано: ' . $item->created_at . '; ' . 'Название: ' . $item->name . '; ' . 'Ключ: ' . $item->key . ' |';
        return $text;
    }

    /**
     * @param Item $item
     * @return string
     */
    public static function updateText(Item $item)
    {
        $text = 'Обновлено: ' . $item->updated_at . '; ' . 'Название: ' . $item->name . '; ' . 'Ключ: ' . $item->key . ' |';
        return $text;
    }
}
