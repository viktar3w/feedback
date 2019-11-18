<?php

namespace App\Observers;

use App\Models\Feedback;
use App\Models\User;
use App\Repositories\UserFeedbackLogRepository;
use App\Services\FeedbackService;

/**
 * Class FeedbackObserver
 *
 * @package App\Observers
 */
class FeedbackObserver
{
    /**
     * Handle the feedback "created" event.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return void
     */
    public function created(Feedback $feedback)
    {
        $this->setLog(FeedbackService::ACTION_CREATE);
    }
    /**
     * Handle the feedback "created" event.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return void
     */
    public function creating(Feedback $feedback)
    {
//        $this->setHtml($feedback);
    }

    /**
     * Action before update Feedback
     * @param Feedback $feedback
     */
    public function updating(Feedback $feedback)
    {
//        $this->setHtml($feedback);
    }

    /**
     * Handle the feedback "updated" event.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return void
     */
    public function updated(Feedback $feedback)
    {
        $this->setLog(FeedbackService::ACTION_UPDATE);
    }

    /**
     * Handle the feedback "deleted" event.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return void
     */
    public function deleted(Feedback $feedback)
    {
        $this->setLog(FeedbackService::ACTION_DESTROY);
    }

    /**
     * Handle the feedback "restored" event.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return void
     */
    public function restored(Feedback $feedback)
    {
        //
    }

    /**
     * Handle the feedback "force deleted" event.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return void
     */
    public function forceDeleted(Feedback $feedback)
    {
        $this->setLog(FeedbackService::ACTION_DESTROY);
    }

    /**
     * Set html
     * @param Feedback $feedback
     */
    private function setHtml(Feedback $feedback)
    {
        if ($feedback->isDirty('text') && false) {
            $feedback->text_html = $feedback->text;
        }
    }
    /**
     * Set log about action of User
     * @param string $feedbackAction
     */
    private function setLog(string $feedbackAction)
    {
        /**@var User $user**/
        $user = auth()->user();
        $userId = $user->id ?? FeedbackService::DEFAULT_USER;
        $log = new UserFeedbackLogRepository();
        $log->addLog($userId,$feedbackAction);
    }
}
