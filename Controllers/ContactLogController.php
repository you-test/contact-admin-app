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
        $logContent = $_POST['log_add'];

        // 追加の履歴がない場合は終了する
        if (empty(trim($logContent))) {
            return;
        }
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
        $contactLogs = $_POST['logs_exist'];
        print_r($contactLogs);
    }

    public function getContactLogs(): array
    {
        $contactId = $_GET['id'];
        $sql = <<<SQL
        SELECT *
        FROM
            action_logs
        WHERE
            contact_id = :contact_id;
        SQL;
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue('contact_id', $contactId);
        $statement->execute();
        $contactLogs = $statement->fetchAll();
        return $contactLogs;
    }
}
