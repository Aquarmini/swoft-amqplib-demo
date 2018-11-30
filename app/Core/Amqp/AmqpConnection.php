<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  limingxin@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
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
