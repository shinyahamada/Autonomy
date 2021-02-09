<?php

namespace App\Http\Actions\Slack;

use App\Http\Controllers\Controller;
use App\Usecase\Tests\SendMessageUsecase;
use Symfony\Component\HttpKernel\Log\Logger;

class sendMessageAction extends Controller
{
    protected $usecase;

    public function __construct(SendMessageUsecase $usecase)
    {
        Logger('酷くないですか?あもんさん~~');
        $this->usecase = $usecase;

    }

    public function __invoke()
    {
        $this->usecase->send('テストですyーーーo');
    }
}