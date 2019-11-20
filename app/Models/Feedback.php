<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
* Class Feedback
 * @package App\Models
 *
 * @property string id
 * @property string name
 * @property string email
 * @property string text
 * @property string text_html
 * @property int status
 * @property string phone
 * @property string created_at
 * @property string updated_at
 * @property UserFeedbackLog[] userFeedbackLogs
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

    /**
     * Get all of the userFeedbackLogs.
     */
    public function userFeedbackLogs()
    {
        return $this->belongsToMany(User::class,'user_feedback_logs','feedback_id','user_id');
    }
}
