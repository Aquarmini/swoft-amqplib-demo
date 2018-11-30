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
