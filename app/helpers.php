<?php

if (!function_exists('activity')) {
    /**
     * Get the activity logger instance.
     *
     * @return \App\Helpers\ActivityLogger
     */
    function activity()
    {
        return app(\App\Helpers\ActivityLogger::class);
    }
}
