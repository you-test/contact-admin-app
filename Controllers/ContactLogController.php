<?php

class ContactLogController
{
    public function __construct(private PDO $pdo)
    {
    }

    // 履歴の新規追加
    public function register(): void
    {
        $contactId = $_POST['id'];
        $logContent = $_POST['log'];

        $sql = <<<SQL
        INSERT INTO action_logs (
            contact_id,
            content
        )
        VALUES (
            :contact_id,
            :content
        )
        SQL;

        $statement = $this->pdo->prepare($sql);
        $statement->bindValue('contact_id', $contactId);
        $statement->bindValue('content', $logContent);
        $statement->execute();
    }
    // 既存履歴の更新
    public function update(): void
    {

    }
}
