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
use Swoft\Pool\ConnectionInterface;
use Swoftx\Amqplib\Connection;
use Swoftx\Amqplib\Message\Publisher;
use Swoftx\Amqplib\Pool\RabbitMQPool;
use Swoftx\Amqplib\SwoftConnection;

class DemoPublisher extends Publisher
{
    protected $exchange = 'swoft-demo-exchange';

    protected $routingKey = 'swoft-demo-route';

    /** @var SwoftConnection */
    protected $swoftConnection;

    public function __construct()
    {
        $this->setData([
            'request_id' => uniqid(),
            'time' => time(),
        ]);

        parent::__construct();
    }

    protected function getConnection(): Connection
    {
        $pool = \Swoft\App::getPool(RabbitMQPool::class);
        $this->swoftConnection = $pool->getConnection();
        return $this->swoftConnection->getConnection();
    }

    public function publish()
    {
        parent::publish();
        $this->swoftConnection->release(true);
    }
}
