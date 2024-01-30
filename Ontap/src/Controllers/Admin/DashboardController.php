<?php


namespace Ngotr\Ontap\Controllers\Admin;

use Ngotr\Ontap\Commons\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return $this->renderViewAdmin(__FUNCTION__);
    }
}