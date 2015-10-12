<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;

class AclController extends AdminController
{
    public function getRoles(Request $request, $aclFor = 'user')
    {
        return view('admin.acl.role');
    }

    public function getPermissions(Request $request, $aclFor = 'user')
    {
    }
}
