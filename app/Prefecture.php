<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Prefecture
 *
 * @property integer $id
 * @property string $name
 * @method static \Illuminate\Database\Query\Builder|\App\Prefecture whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Prefecture whereName($value)
 */

/**
 * App\Prefecture
 *
 * @property integer $id
 * @property string $name
 * @method static \Illuminate\Database\Query\Builder|\App\Prefecture whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Prefecture whereName($value)
 */
class Prefecture extends Model
{
    public function books()
    {
        return $this->hasManyThrough(Book::class, Author::class);
    }
}
