<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;
use App\Models\Activity;
use App\Http\Resources\ActivityResource;
use Illuminate\Support\Facades\Redirect;

class ActivityController extends Controller
{
    public $cache_key = 'all_activities';

    public function getActivities()
    {
        $activities = Activity::all()->sortBy('date', SORT_REGULAR, true);
        $response   = [];
        foreach ($activities as $activity) {
            $response[] = ActivityResource::buildResponse($activity);
        }
        // $activities =  Cache::remember($this->cache_key, 3600, function () {
        //     return Activity::all()->sortBy('date', SORT_REGULAR, true);
        // });

        return $response;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $activities = Cache::remember($this->cache_key, 3600, function () {
            return Activity::all()->sortBy('date', SORT_REGULAR, true);
        });

        return response(ActivityResource::collection($activities, 200));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->toArray(), [
            'user_id'     => 'required',
            'date'        => 'required|date|before:tomorrow',
            'type'        => 'required',
            'distance'    => 'required',
            'finish_time' => 'required',
            'rating'      => 'nullable',
            'notes'       => 'nullable',
        ]);
        if ($validate->fails()) {
            return response($validate->errors(), 400);
        }

        // purge activities cache
        Cache::forget($this->cache_key);

        new ActivityResource(Activity::create($validate->validate()));

        return Redirect::route('dashboard');
    }
}
