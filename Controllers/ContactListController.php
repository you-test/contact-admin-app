<?php

class ContactListController
{
    public function __construct(private PDO $pdo)
    {
    }

    // データの取得
    public function showContactList(): array
    {
        $sql = <<<SQL
        SELECT
            contact_id,
            received_date,
            status, user_id,
            mail,
            title,
            updated_at
        FROM contact_data
        ORDER BY contact_id DESC
        SQL;
        $statement = $this->pdo->query($sql);
        $statement->execute();
        $contactListData = $statement->fetchAll();
        return $contactListData;
    }
}
