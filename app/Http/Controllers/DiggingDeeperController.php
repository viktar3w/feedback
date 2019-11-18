<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Services\FeedbackService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class DiggingDeeperController extends Controller
{
    /**
     * Base Info
     * @url https://laravel.com/docs/5.8/collections
     */
    public function collections()
    {
        $result = [];

        /***@var Collection $eloquentCollection*/
        $eloquentCollection = Feedback::where('status',FeedbackService::STATUS_DISABLED)
            ->get();
//        dd(__METHOD__,$eloquentCollection,$eloquentCollection->toArray());
        $collection = collect($eloquentCollection->toArray());
        $result['last'] = $collection->last();
        $result['first'] = $collection->first();
        $result['data'] = $collection->where('name','Янина')
            ->values()
            ->keyBy('id');
        dd($result);

    }
}
