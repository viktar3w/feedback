<?php

namespace App\Observers;

use App\Models\Feedback;
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
        //
    }
    /**
     * Handle the feedback "created" event.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return void
     */
    public function creating(Feedback $feedback)
    {
        $this->setHtml($feedback);
        $this->setUser($feedback);
    }

    /**
     * Action before update Feedback
     * @param Feedback $feedback
     */
    public function updating(Feedback $feedback)
    {
        $this->setHtml($feedback);
        $this->setUser($feedback);
    }

    /**
     * Handle the feedback "updated" event.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return void
     */
    public function updated(Feedback $feedback)
    {
        //
    }

    /**
     * Handle the feedback "deleted" event.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return void
     */
    public function deleted(Feedback $feedback)
    {
        //
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
        //
    }

    /**
     * Set html
     * @param Feedback $feedback
     */
    private function setHtml(Feedback $feedback)
    {
        if ($feedback->isDirty('text')) {
            $feedback->text_html = $feedback->text;
        }
    }
    /**
     * Set user id
     * @param Feedback $feedback
     */
    private function setUser(Feedback $feedback)
    {
        $feedback->user_id = auth()->id ?? FeedbackService::DEFAULT_USER;
    }
}
