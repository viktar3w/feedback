<?php


namespace App\Services;

use App\Models\Feedback;

/**
 * Class FeedbackService
 * @property Feedback|null $feedback
 */
class FeedbackService
{
    public const DEFAULT_USER = 0;
    public const QUANTITY = 6;
    public const STATUS_ACTIVE = 1;
    public const STATUS_DISABLED = 0;

    /**
     * Get statuses label of Feedback model
     * @return array
     */
    public static function getStatusesLabel(): array
    {
        return [
            0 => 'Disabled',
            1 => 'Active',
        ];
    }

    /**
     * Get list all statuses
     * @return array
     */
    public static function getStatuses(): array
    {
        return [
            self::STATUS_ACTIVE,
            self:: STATUS_DISABLED
        ];
    }
}
