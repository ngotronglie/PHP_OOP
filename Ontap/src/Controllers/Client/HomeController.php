<?php


namespace Ngotr\Ontap\Controllers\Client;

use Ngotr\Ontap\Commons\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return $this->renderViewClient(__FUNCTION__);
    }
}