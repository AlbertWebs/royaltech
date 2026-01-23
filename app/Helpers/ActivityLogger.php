<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ActivityLogger
{
    /**
     * Log an activity.
     *
     * @param string $description
     * @return $this
     */
    public function log($description)
    {
        DB::table('activity_log')->insert([
            'description' => $description,
            'causer_id' => Auth::id(),
            'causer_type' => 'App\Models\User',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return $this;
    }
}
