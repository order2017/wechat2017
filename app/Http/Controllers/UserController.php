<?php

namespace App\Http\Controllers;

use EasyWeChat\Foundation\Application;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public $wechat;

    /**
     * UserController constructor.
     * @param $user
     */
    public function __construct(Application $wechat)
    {
        $this->wechat = $wechat;
    }

    public function users(){
        $users = $this->wechat->user->lists();

        return $users;
    }

}
