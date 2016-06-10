<?php

class RouteHelper
{
    use \Illuminate\Console\AppNamespaceDetectorTrait;

    public function getNamespace()
    {
        return $this->getAppNamespace();
    }
}

Route::group([
        'namespace' => (new RouteHelper)->getNamespace() . "Http\\Controllers",
        'middleware' => 'web'
    ], function() {
    Route::auth();
});
