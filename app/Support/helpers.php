<?php

if (! function_exists('infrastructure_path')) {
    /**
     * Get the path to the Infrastructure folder.
     */
    function infrastructure_path(string $path = ''): string
    {
        return app_path('Infrastructure' . ($path ? DIRECTORY_SEPARATOR . $path : ''));
    }
}
if (! function_exists('presentations_path')) {
    /**
     * Get the path to the Infrastructure folder.
     */
    function presentations_path(string $path = ''): string
    {
        return app_path('Presentations' . ($path ? DIRECTORY_SEPARATOR . $path : ''));
    }
}
