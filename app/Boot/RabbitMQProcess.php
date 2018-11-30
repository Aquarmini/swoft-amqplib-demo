<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  limingxin@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace App\Boot;

use App\Core\Amqp\Demo\DemoConsumer;
use Swoft\Core\Coroutine;
use Swoft\Process\Bean\Annotation\Process;
use Swoft\Process\Process as SwoftProcess;
use Swoft\Process\ProcessInterface;

/**
 * @Process(name="rabbitMQ", coroutine=false, boot=true)
 * @package App\Process
 */
class RabbitMQProcess implements ProcessInterface
{
    public function run(SwoftProcess $process)
    {
        DemoConsumer::make()->consume();
    }

    public function check(): bool
    {
        return true;
    }
}
