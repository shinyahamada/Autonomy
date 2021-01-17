<?php

namespace App\Infra\Notifications\SlackReply;

/**
 * 返信用のFieldsを好きに生成するクラス
 * (用途ごとに好きに作って良い。引数の数も返すFieldsの数も)
 */
class ReplyFields
{
    protected $text;

    public function __construct(string $text)
    {
        $this->text = $text;
    }
    
    /**
     * fields (feildが複数ある場合は通知データクラス(このクラスの引き渡し先)で
     * その数だけattachmentをしてあげる必要がある) 
     *
     * @return array
     */
    private function fields(): array
    {
        $fields = [
            "basic" => [
                "【 テスト 】" => $this->text,
            ],
        ];

        return $fields;
    }
}