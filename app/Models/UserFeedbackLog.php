<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UserFeedbackLog
 *
 * @package App\Models
 * @property int id
 * @property int user_id
 * @property string action
 * @property string created_at
 * @property User user
 */
class UserFeedbackLog extends Model
{
    /**
     * Don't use timestamp*
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'action'
    ];
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Get the user that owns the phone.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
