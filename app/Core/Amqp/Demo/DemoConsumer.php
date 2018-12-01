<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  limingxin@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace App\Core\Amqp\Demo;

use App\Core\Amqp\AmqpConnection;
use Swoft\App;
use Swoft\Redis\Redis;
use Swoftx\Amqplib\Connection;
use Swoftx\Amqplib\Message\Consumer;
use Swoftx\Amqplib\Pool\RabbitMQPool;
use Swoftx\Amqplib\SwoftConnection;

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
        $pool = App::getPool(RabbitMQPool::class);
        /** @var SwoftConnection $conn */
        $conn = $pool->getConnection();
        return $conn->getConnection();
    }
}
