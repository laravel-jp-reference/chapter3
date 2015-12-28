<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


/**
 * App\AuthorType
 *
 * @property integer $id
 * @property string $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|Author[] $authors
 * @method static \Illuminate\Database\Query\Builder|\App\AuthorType whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\AuthorType whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\AuthorType whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\AuthorType whereUpdatedAt($value)
 */
class AuthorType extends Model
{
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    public function authors()
    {
        return $this->belongsToMany(Author::class);
    }

}
