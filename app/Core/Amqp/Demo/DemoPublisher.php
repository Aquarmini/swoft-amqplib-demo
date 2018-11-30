<?php
/**
 * Created by PhpStorm.
 * User: limx
 * Date: 2018/11/30
 * Time: 2:28 PM
 */

namespace App\Core\Amqp\Demo;


use App\Core\Amqp\AmqpConnection;
use Swoftx\Amqplib\Connection;
use Swoftx\Amqplib\Message\Publisher;

class DemoPublisher extends Publisher
{
    protected $exchange = 'swoft-demo-exchange';

    protected $routingKey = 'swoft-demo-route';

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
        return bean(AmqpConnection::class)->build();
    }
}
