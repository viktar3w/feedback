<?php


namespace App\Repositories;
use App\Models\Feedback;
use App\Models\User;
use App\Models\UserFeedbackLog as Model;
use App\Services\FeedbackService;
/**
 * Class UserFeedbackLogRepository
 * @method Model startCondition(): Model
 * @property Model model
*/
class UserFeedbackLogRepository extends MainRepository
{
    /**
     * Get Model class name
     * @return mixed|string
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * Add log action of Feedback
     * @param Feedback $feedback
     * @param string $action
     */
    public function addLog(Feedback $feedback, string $action)
    {
        /**@var User $user**/
        $user = auth()->user();
        $userId = $user->id ?? FeedbackService::DEFAULT_USER;
        $actions = FeedbackService::getActions();
        if (in_array($action,$actions)) {
            Model::create([
                'feedback_id' => $feedback->id,
                'user_id' => $userId,
                'action' => $action,
            ]);
        }
    }
}
