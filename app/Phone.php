<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


/**
 * App\Phone
 *
 * @property integer $id
 * @property integer $author_id
 * @property string $phone_number
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read Author $author
 * @method static \Illuminate\Database\Query\Builder|\App\Phone whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Phone whereAuthorId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Phone wherePhoneNumber($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Phone whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Phone whereUpdatedAt($value)
 */
class Phone extends Model
{
    protected $touches = ['author'];

    //
    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}
