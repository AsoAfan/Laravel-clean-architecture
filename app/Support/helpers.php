<?php


if (! function_exists('application_path')) {
    /**
     * Get the path to the Application folder.
     */
    function application_path(string $path = ''): string
    {
        return app_path('Application' . ($path ? DIRECTORY_SEPARATOR . $path : ''));
    }

}
if (! function_exists('domain_path')) {

    /**
     * Get the path to the Domain folder.
     */
    function domain_path(string $path = ''): string
    {
        return app_path('Domain' . ($path ? DIRECTORY_SEPARATOR . $path : ''));
    }
}
if (! function_exists('infrastructure_path')) {
    /**
     * Get the path to the Infrastructure folder.
     */
    function infrastructure_path(string $path = ''): string
    {
        return app_path('Infrastructure' . ($path ? DIRECTORY_SEPARATOR . $path : ''));
    }
}
if (! function_exists('presentation_path')) {
    /**
     * Get the path to the Infrastructure folder.
     */
    function presentation_path(string $path = ''): string
    {
        return app_path('Presentation' . ($path ? DIRECTORY_SEPARATOR . $path : ''));
    }
}



