<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\DataWasFetched;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\FetchDashboardDataRequest;

class ApiController extends Controller
{
    public function broadcast(FetchDashboardDataRequest $request)
    {
        $keys = $request->keys;

        $key = 0;

        # Check if there is a key in the cache
        if (Cache::has('lastKey')) {
            $key = Cache::get('lastKey') + 1;
        }

        # Retrieve all the downloaded files from the storage
        $files = Storage::files('data');

        # If the file does not exist, just start over again
        if (! isset($files[$key])) {
            $key = 0;
        }

        # Cache the last asked key for an hour
        Cache::put('lastKey', $key, 3600);

        # Get the json data
        $data = Storage::get($files[$key]);

        # Convert to an array
        $items = json_decode($data, true);

        if ($items && is_array($items)) {
            # Flatten to a dotted collection
            $items = collect(array_dot($items));

            # Only give back the requested keys
            $items = $items->filter(function($item, $key) use ($keys) {
                return in_array($key, $keys);
            });
        }

        # Broadcast the event so that the components
        # can pickup the event and use the data
        broadcast(new DataWasFetched($items, $files[$key]));

        return response()->json('ok');
    }
}
