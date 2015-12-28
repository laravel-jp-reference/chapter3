<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Book
 *
 * @property integer $id
 * @property string $isbn
 * @property string $title
 * @property integer $price
 * @property integer $pages
 * @property \Carbon\Carbon $published_date
 * @property integer $author_id
 * @property integer $publisher_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read Author $author
 * @property-read \Illuminate\Database\Eloquent\Collection|Photo[] $photos
 * @property-read \Illuminate\Database\Eloquent\Collection|Tag[] $tags
 * @property-read \Illuminate\Database\Eloquent\Collection|Comment[] $comments
 * @property-read mixed $is_expensive
 * @method static \Illuminate\Database\Query\Builder|\App\Book whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Book whereIsbn($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Book whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Book wherePrice($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Book wherePages($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Book wherePublishedDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Book whereAuthorId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Book wherePublisherId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Book whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Book whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Book cheaperThan($price)
 */
class Book extends Model
{

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    protected $dates = ['created_at', 'updated_at', 'published_date'];

    protected $appends = ['is_expensive'];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function scopeCheaperThan(Builder $query, $price)
    {
        return $query->where('price', '<', $price);
    }

    public function getIsExpensiveAttribute()
    {
        return $this->attributes['price'] >= 10000;
    }
}
