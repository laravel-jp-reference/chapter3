<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Author
 *
 * @property integer $id
 * @property integer $prefecture_id
 * @property string $name
 * @property string $furigana
 * @property string $romaji
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $deleted_at
 * @property-read Phone $phone
 * @property-read \Illuminate\Database\Eloquent\Collection|Book[] $books
 * @property-read \Illuminate\Database\Eloquent\Collection|AuthorType[] $types
 * @method static \Illuminate\Database\Query\Builder|\App\Author whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Author wherePrefectureId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Author whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Author whereFurigana($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Author whereRomaji($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Author whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Author whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Author whereDeletedAt($value)
 */

/**
 * App\Author
 *
 * @property integer $id
 * @property integer $prefecture_id
 * @property string $name
 * @property string $furigana
 * @property string $romaji
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $deleted_at
 * @property-read Phone $phone
 * @property-read \Illuminate\Database\Eloquent\Collection|Book[] $books
 * @property-read \Illuminate\Database\Eloquent\Collection|AuthorType[] $types
 * @method static \Illuminate\Database\Query\Builder|\App\Author whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Author wherePrefectureId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Author whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Author whereFurigana($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Author whereRomaji($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Author whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Author whereUpdatedAt($value)
 */
class Author extends Model
{

    use SoftDeletes;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    protected $dates = ['deleted_at'];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];


    public function getRomajiAttribute($value)
    {
        return ucwords($value);
    }

    public function setRomajiAttribute($value)
    {
        $this->attributes['romaji'] = strtolower($value);
    }

    public function phone()
    {
        return $this->hasOne(Phone::class);
    }

    public function books()
    {
        return $this->hasMany(Book::class);
    }

    public function types()
    {
        return $this->belongsToMany(AuthorType::class)->withTimestamps();
    }
}
