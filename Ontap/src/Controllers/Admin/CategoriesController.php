<?php


namespace Ngotr\Ontap\Controllers\Admin;

use Ngotr\Ontap\Commons\Controller;
use Ngotr\Ontap\Models\Categories;

class CategoriesController extends Controller
{
    private Categories $categories;
    private string $folder = 'categories.';
    public function __construct()
    {
        $this->categories = new Categories();
    }
    public function index()
    {
        $data['categories'] = $this->categories->getAllCategories();
        return $this->renderViewAdmin($this->folder . __FUNCTION__, $data);
    }
    public function create()
    {
        if (!empty($_POST)) {
            $name = $_POST['name'];
            $this->categories->insertCategories($name);
            header('Location: /ONTAP/admin/categories');
            exit();
        }
        return $this->renderViewAdmin($this->folder . __FUNCTION__);
    }
    public function update($id)
    {
        $Categories = $this->categories->getByIdCategories($id);
        if (empty($Categories)) {
            e404();
        }
        if (!empty($_POST)) {

            $name = $_POST['name'];
            $this->categories->updateCategories($id, $name);
            header('Location: /Ontap/admin/categories');
            exit();
        }

        return $this->renderViewAdmin($this->folder . __FUNCTION__, ['Categories' => $Categories]);
    }
    public function delete($id)
    {
        $Categories = $this->categories->getByIdCategories($id);
        if (empty($Categories)) {
            e404();
        }
        $this->categories->deleteByIDCategories($Categories['id']);

        header('Location: /Ontap/admin/categories');
        exit();
    }
}