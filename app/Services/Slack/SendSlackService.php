<?php

namespace App\Services\Slack;

use Illuminate\Notifications\Notifiable;

/**
 * 受けたデータを送るだけの役割を持つクラス
 */
class SendSlackService
{
    use Notifiable;

    public function routeNotificationForSlack()
    {
        return config('services.slack.test');
    }
}