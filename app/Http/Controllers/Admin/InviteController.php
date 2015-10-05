<?php

namespace app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class InviteController extends Controller
{
    /**
     *
     */
    public function __construct()
    {
    }

    public function email()
    {
        $data = [];

        return view('admin.invite.email', $data);
    }
}
