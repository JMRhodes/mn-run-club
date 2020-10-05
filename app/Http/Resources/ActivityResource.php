<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\User;
use Illuminate\Support\Facades\Cache;

class ActivityResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return arrays
     */
    public static function buildResponse($request)
    {
        $cache_key = "user_data_{$request->user_id}";
        $user      = new UserResource(User::find($request->user_id));
        // $user      = Cache::remember($cache_key, 3600, function ($request) {
        //     return new UserResource(User::find($request->user_id));
        // });

        return [
            'id'          => $request->id,
            'user'        => $user,
            'date'        => [
                'complete' => $request->date,
                'common'   => date('m/d/y', strtotime($request->date))
            ],
            'type'        => $request->type,
            'distance'    => $request->distance,
            'finish_time' => $request->finish_time,
            'rating'      => $request->rating,
            'notes'       => $request->notes,
        ];
    }
}
