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
        $contactId = $_POST['id'];

        if (array_key_exists('logs_exist', $_POST)) {
            $contactLogs = $_POST['logs_exist'];
            foreach ($contactLogs as $logId => $contactLog) {
                $sql = <<<SQL
                UPDATE
                    action_logs
                SET
                    content = :content,
                    contact_id = :contact_id
                WHERE
                    id = :id
                SQL;

                $statement = $this->pdo->prepare($sql);
                $statement->bindValue('content', $contactLog);
                $statement->bindValue('contact_id', $contactId);
                $statement->bindValue('id', $logId);
                $statement->execute();
            }
        }

        header('Location: ../../contact');
    }

    // 表示する履歴の取得
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

    // 対象のお問合せに紐づく履歴を全て削除
    public function delete(): void
    {
        $contactId = $_GET['contact_id'];
        $sql = <<<SQL
        DELETE FROM action_logs
        WHERE contact_id = :contact_id
        SQL;

        $statement = $this->pdo->prepare($sql);
        $statement->bindValue('contact_id', $contactId);
        $statement->execute();
    }

    // 対象の履歴IDに紐づく履歴のみ削除
    public function deleteTargetLog(): void
    {
        $contactLogId = $_POST['log_id'];
        $sql = <<<SQL
        DELETE
            FROM action_logs
        WHERE
            id = :id
        SQL;

        $statement = $this->pdo->prepare($sql);
        $statement->bindValue('id', $contactLogId);
        $statement->execute();

        $contactId = $_POST['contact_id'];
        header('Location: ../../contact/detail.php?id=' . $contactId);
    }
}
