<?php


namespace App\Repositories;
use App\Models\UserFeedbackLog as Model;
use App\Services\FeedbackService;

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
     * @param int $userId
     * @param string $action
     */
    public function addLog(int $userId, string $action)
    {
        $actions = FeedbackService::getActions();
        if (in_array($action,$actions)) {
            Model::create([
                'user_id' => $userId,
                'action' => $action,
            ]);
        }
    }
}
