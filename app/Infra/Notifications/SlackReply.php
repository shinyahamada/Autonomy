<?php

namespace App\Infra\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\SlackMessage;

/**
 * 送られるデータそのものを規定するクラス
 */
class SlackReply extends Notification
{
    use Queueable;

    protected $channel;
    protected $content;
    protected $fields;

    /**
     * Create a new Notification instance.
     *
     * @return void
     */
    public function __construct( $content = null, $fields = null)
    {
        $this->content = $content;
        $this->fields = $fields;
    }

    /**
     * Get the Notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['slack'];
    }

    /**
     * Get the mail representation of the Notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\SlackMessage
     */
    public function toSlack($notifiable)
    {
        return (new SlackMessage)
            ->content($this->content)
            ->attachment(function ($attachment) {
                    $attachment->color("#D94050")
                        ->fields($this->fields['basic']);
            // 複数のFiledがある場合はここでattachmentを追加する
            });
    }

    /**
     * Get the array representation of the Notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}

