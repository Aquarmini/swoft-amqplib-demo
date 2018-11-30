<?php
/**
 * Created by PhpStorm.
 * User: limx
 * Date: 2018/11/30
 * Time: 2:20 PM
 */

namespace App\Core\Amqp;

use Swoftx\Amqplib\Connection;
use Swoft\Bean\Annotation\Bean;
use Swoft\Bean\Annotation\Inject;

/**
 * @Bean
 */
class AmqpConnection extends Connection
{
    /**
     * @Inject
     * @var Config
     */
    protected $config;

    /**
     * @Inject
     * @var Params
     */
    protected $params;
}
