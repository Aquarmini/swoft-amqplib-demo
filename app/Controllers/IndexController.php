<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  limingxin@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace App\Controllers;

use App\Core\Amqp\Demo\DemoPublisher;
use Swoft\App;
use Swoft\Http\Server\Bean\Annotation\Controller;
use Swoft\Http\Server\Bean\Annotation\RequestMapping;
use Swoft\Http\Server\Bean\Annotation\RequestMethod;
use Swoft\Redis\Redis;
use Swoft\View\Bean\Annotation\View;
use Swoft\Http\Message\Server\Response;
use Swoft\Http\Message\Server\Request;

/**
 * Class IndexController
 * @Controller
 * @package App\Controllers
 */
class IndexController extends BaseController
{
    /**
     * @RequestMapping(route="/", method={RequestMethod::GET,RequestMethod::POST})
     */
    public function index(Request $request): Response
    {
        $data = config('message');

        if ($request->getMethod() === 'POST') {
            return $this->response->success($data);
        }
        return view('index/index', $data);
    }

    /**
     * @RequestMapping(route="/mq", method={RequestMethod::GET,RequestMethod::POST})
     */
    public function mq(Request $request)
    {
        DemoPublisher::make()->publish();

        $redis = bean(Redis::class);
        $res = $redis->get('swoft-demo-rabbitmq');

        return $this->response->success($res);
    }
}
