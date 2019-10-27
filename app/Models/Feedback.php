<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
* Class Feedback
 * @property string id
 * @property string name
 * @property string email
 * @property string text
 * @property int status
 * @property string phone
 * @property string created_at
 * @property string updated_at
 */
class Feedback extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'text','status','phone'
    ];
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'feedbacks';
}
