<?php
Namespace Nodopiano\Corda;

use Twig_Autoloader;
use Twig_Loader_Filesystem;
use Twig_Environment;
use Nodopiano\Corda\QueryBuilder;
use Nodopiano\Corda\Repositories\ApiRepository;

/**
 *
 */
class Controller
{

    protected $functions;
    protected $api;
    protected $view;

    function __construct()
    {
        Twig_Autoloader::register();
        $this->twig = new Twig_Environment(new Twig_Loader_Filesystem('../app/views'));
        $this->api = new ApiRepository(App::get('api')['driver']);
    }

    public function show()
    {
    }

    public function notFound()
    {
        $view = view();
        return $view->render($this->twig->loadTemplate('errors/404.html')->render(array('message' => 'Hello!')));
    }
}
