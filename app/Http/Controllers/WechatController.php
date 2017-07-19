<?php

namespace App\Http\Controllers;

use EasyWeChat\Foundation\Application;

class WechatController extends Controller
{

    protected  $options = [
        'debug'     => true,
        'app_id'    => 'wxa45f4b3d03a09468',
        'secret'    => '8322e2e67e679f23cc2255c1ad218cc7',
        'token'     => 'CWI4y86blVB8OhUQg4BnMF2vDryudx6f',
        'log' => [
            'level' => 'debug',
            'file'  => '/tmp/easywechat.log',
        ],
    ];


    public function serve(){

        $app = new Application($this->options);

        $server = $app->server;
        $user = $app->user;

        $server->setMessageHandler(function($message) use ($user) {

            switch ($message->MsgType) {
                case 'event':
                    return '收到事件消息';
                    break;
                case 'text':
                    return "你好！".$user->get($message->FromUserName)->nickname;
                    break;
                case 'image':
                    return '收到图片消息';
                    break;
                case 'voice':
                    return '收到语音消息';
                    break;
                case 'video':
                    return '收到视频消息';
                    break;
                case 'location':
                    return '收到坐标消息';
                    break;
                case 'link':
                    return '收到链接消息';
                    break;
                // ... 其它消息
                default:
                    return '收到其它消息';
                    break;
            }

        });

        $server->serve()->send();
    }

}
