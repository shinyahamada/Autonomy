<?php

namespace App\Console\Commands;

use App\Usecase\Tests\SendMessageUsecase;
use Illuminate\Console\Command;

class SlackTest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'SlackTest';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Slack通知テスト';

    protected $sendSlackUsecase;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(SendMessageUsecase $sendSlackUsecase)
    {
        parent::__construct();
        $this->sendSlackUsecase = $sendSlackUsecase;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('Slack通知テスト開始します');

        $this->info(config('services.slack.test'));

        $message = $this->ask('メッセージを入力してください');

        $this->info("次のメッセージを送信します : $message");

        try {
            $this->sendSlackUsecase->send($message);
        } catch (Exception $e) {
            $this->info('エラーが発生しました');
            $this->info($e);
        }

        $this->info('完了しました');
    }
}
