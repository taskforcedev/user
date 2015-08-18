<?php namespace Taskforcedev\User\Http\Controllers;

use \Auth;
use \Schema;
use Illuminate\Routing\Controller;
use Illuminate\Console\AppNamespaceDetectorTrait;
/**
 * Class BaseController
 * @package Taskforcedev\LaravelForum\Http\Controllers
 */
class BaseController extends Controller
{
    use AppNamespaceDetectorTrait;

    public function getLayout()
    {
        return config('laravel-user.views.layout');
    }

    protected function buildData()
    {
        return [
            'layout' => $this->getLayout()
        ];
    }

    public function getUserModel()
    {
        /* Get the namespace */
        $ns = $this->getAppNamespace();
        if ($ns) {
            /* Try laravel default convention (models in the app folder). */
            $model = $ns . 'User';
            if (class_exists($model)) {
                return $model;
            }
            /* Try secondary convention of having a models directory. */
            $model = $ns . 'Models\User';
            if (class_exists($model)) {
                return $model;
            }
        }
        return false;
    }

    public function getDefaultRoute()
    {
        return config('laravel-user.default_route');
    }
}
