<?php

namespace App\Usecase\Tests;

use App\Infra\Notifications\SlackReply;
use App\Infra\Notifications\SlackReply\ReplyFields;
use App\Services\Slack\SendSlackService;

class SendMessageUsecase
{
    protected $title = 'タイトル';
    protected $sendSlackService;

    public function __construct(SendSlackService $sendSlackService)
    {
        $this->sendSlackService = $sendSlackService;
    }

    public function send(string $message): void
    {
        $slackReply = new SlackReply($this->title, (new ReplyFields($message))->fields());
        $this->sendSlackService->notify($slackReply);
    }
}