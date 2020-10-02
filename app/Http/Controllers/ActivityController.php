<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Inertia\Inertia;
use App\Models\Activity;

class ActivityController extends Controller
{
    public $cache_key = 'all_activities';

    public function getActivities()
    {
        return Activity::all()->sortBy('date', SORT_REGULAR, true);

        return Cache::remember($this->cache_key, 3600, function () {
            return Activity::all()->sortBy('date', SORT_REGULAR, true);
        });
    }
}
