<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class ApiController extends Controller
{
    public function fake()
    {
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

        # Return the 'fake' file
        return Storage::get($files[$key]);
    }
}
