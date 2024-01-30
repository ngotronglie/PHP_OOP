<?php

namespace Ngotr\Ontap\Controllers\Admin;

use Ngotr\Ontap\Commons\Controller;
use Ngotr\Ontap\Models\User;

class UserController extends Controller
{
    private User $user;
    private string $folder = 'users.';
    const PATH_UPLOAD = '/uploads/users/';

    public function __construct()
    {
        $this->user = new User();
    }
    // index user -> danh sach
    public function index()
    {
        $data['users'] = $this->user->getAll();
        return $this->renderViewAdmin($this->folder . __FUNCTION__, $data);
    }
    // create user -> them user
    public function create()
    {
        if (!empty($_POST)) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $avartar = $_FILES['avartar'] ?? null;
            $avartarPath = null;
            if (!empty($avartar)) {
                $avartarPath = self::PATH_UPLOAD . time() . $avartar['name'];
                if (!move_uploaded_file($avartar['tmp_name'], PATH_ROOT . $avartarPath)) {
                    $avartarPath = null;
                }
            }

            $this->user->insert($name, $email, $password, $avartarPath);
            header('Location: /Ontap/admin/users');
            exit();
        }
        return $this->renderViewAdmin($this->folder . __FUNCTION__);
    }
    // update user -> sua user
    public function update($id)
    {
        $user = $this->user->getById($id);
        if (empty($user)) {
            e404();
        }
        if (!empty($_POST)) {

            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $avartar = $_FILES['avartar'] ?? null;
            $avartarPath = $user['avartar'];
            if (!empty($avartar)) {
                $avartarPath = self::PATH_UPLOAD . time() . $avartar['name'];
                if (!move_uploaded_file($avartar['tmp_name'], PATH_ROOT . $avartarPath)) {
                    $avartarPath = $user['avartar'];
                }
            }

            $this->user->update($id, $name, $email, $password, $avartarPath);
            header('Location: /Ontap/admin/users');
            exit();
        }

        return $this->renderViewAdmin($this->folder . __FUNCTION__, ['user' => $user]);
    }
    // show user -> hien chi tiet user
    public function show($id)
    {
        $user = $this->user->getById($id);
        if (empty($user)) {
            e404();
        }
        return $this->renderViewAdmin($this->folder . __FUNCTION__, ['user' => $user]);
    }
    // delete user -> xoa user
    public function delete($id)
    {
        $user = $this->user->getById($id);
        if (empty($user)) {
            e404();
        }
        $this->user->deleteByID($user['id']);
        if (!empty($user['avartar']) && file_exists(PATH_ROOT . $user['avartar'])) {
            unlink(PATH_ROOT . $user['avartar']);

        }

        header('Location: /Ontap/admin/users');
        exit();
    }
}