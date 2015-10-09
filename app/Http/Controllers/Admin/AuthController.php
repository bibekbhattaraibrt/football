<?php

namespace App\Http\Controllers\Admin;

use App, Validator;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard as GuardContract;
use App\Http\Controllers\Controller as BaseController;

class AuthController extends BaseController
{
    /**
     * @var GuardContract
     */
    private $authManager;

    public function __construct()
    {
        $this->authManager = App::make('auth');
    }

    public function login(Request $request)
    {
        if ('POST' == $request->method()) {
            return $this->attemptLogin($request);
        }

        return view('admin.login');
    }

    protected function attemptLogin(Request $request)
    {
        $credentials = [
            'email' => $request->get('email'),
            'password' => $request->get('password'),
        ];
        $rules = [];
        $validator = Validator::make(
            $credentials,
            $rules
        );

        if ($validator->fails()) {
            throw new \Exception('Fatal Error :: Validation Failed!!');
        }

        return $this->authManager->attempt($credentials) ?
                redirect('admin') : redirect('admin/login');
    }

    public function logout()
    {
        $this->authManager->logout();
        return redirect('admin/login');
    }
} 