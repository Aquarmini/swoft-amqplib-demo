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

use Swoft\Bean\Annotation\Bean;
use Swoft\Bean\Annotation\Value;
use Swoftx\Amqplib\ConfigInterface;

/**
 * @Bean
 */
class Config implements ConfigInterface
{
    /**
     * @Value(env="${AMQP_HOST}")
     * @var string
     */
    protected $host = '127.0.0.1';

    /**
     * @Value(env="${AMQP_PORT}")
     * @var int
     */
    protected $port = 5672;

    /**
     * @Value(env="${AMQP_USER}")
     * @var string
     */
    protected $user = 'guest';

    /**
     * @Value(env="${AMQP_PASSWORD}")
     * @var string
     */
    protected $password = 'guest';

    /**
     * @Value(env="${AMQP_VHOST}")
     * @var string
     */
    protected $vhost = '/';

    public function getHost(): string
    {
        return $this->host;
    }

    public function getPort(): int
    {
        return $this->port;
    }

    public function getUser(): string
    {
        return $this->user;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getVhost(): string
    {
        return $this->vhost;
    }
}
