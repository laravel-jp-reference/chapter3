<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Dvd
 *
 * @property integer $id
 * @property string $isbn
 * @property string $title
 * @property integer $price
 * @property integer $time
 * @property \Carbon\Carbon $published_date
 * @property integer $author_id
 * @property integer $publisher_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|Comment[] $comments
 * @property-read \Illuminate\Database\Eloquent\Collection|Photo[] $photos
 * @property-read \Illuminate\Database\Eloquent\Collection|Tag[] $tags
 * @method static \Illuminate\Database\Query\Builder|\App\Dvd whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Dvd whereIsbn($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Dvd whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Dvd wherePrice($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Dvd whereTime($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Dvd wherePublishedDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Dvd whereAuthorId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Dvd wherePublisherId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Dvd whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Dvd whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Dvd long()
 */
class Dvd extends Model
{

    protected $dates = ['created_at', 'updated_at', 'published_date'];

    public function scopeLong($query)
    {
        return $query->where('minutes', '>=', 120);

    }
}
