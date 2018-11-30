<?php
/**
 * Created by PhpStorm.
 * User: limx
 * Date: 2018/11/30
 * Time: 2:27 PM
 */

namespace App\Core\Amqp\Demo;


use App\Core\Amqp\AmqpConnection;
use Swoft\Redis\Redis;
use Swoftx\Amqplib\Connection;
use Swoftx\Amqplib\Message\Consumer;

class DemoConsumer extends Consumer
{
    protected $exchange = 'swoft-demo-exchange';

    protected $routingKey = 'swoft-demo-route';

    protected $queue = 'swoft-demo-queue';

    public function handle($data): bool
    {
        $redis = bean(Redis::class);
        $redis->incr('swoft-demo-rabbitmq');

        return true;
    }

    protected function getConnection(): Connection
    {
        return bean(AmqpConnection::class)->build();
    }
}
