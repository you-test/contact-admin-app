<?php

class ContactListController
{
    public function __construct(private PDO $pdo)
    {
    }

    // データの取得
    public function showContactList(): array
    {
        $startTime = isset($_POST['start']) ? $_POST['start'] : '';
        $endTime = isset($_POST['end']) ? $_POST['end'] : '';
        $sortType = isset($_POST['sort_type']) ? $_POST['sort_type'] : '';
        $ascDesc = '';
        if (isset($_POST['asc_desc'])) {
            if ($_POST['asc_desc'] === 'desc') {
                $ascDesc = 'DESC';
            } elseif ($_POST['asc_desc'] === 'asc') {
                $ascDesc = 'ASC';
            }
        }

        // 期間指定のSQL文字列を生成
        $changedStartTime = $this->changeDateTime($startTime);
        $changedEndTime = $this->changeDateTime($endTime);

        $period = "WHERE received_date BETWEEN '$changedStartTime' AND '$changedEndTime'";
        if (empty($startTime) || empty($endTime)) {
            $period = '';
        }

        // ソートのSQL文字列を生成
        $sort = "$sortType $ascDesc";
        if (empty($sortType) || empty($ascDesc)) {
            $sort = 'contact_id DESC';
        }

        $sql = <<<SQL
        SELECT
            contact_id,
            received_date,
            status,
            user_id,
            name,
            mail,
            title,
            updated_at
        FROM
            contact_data
        $period
        ORDER BY
            $sort
        SQL;

        $statement = $this->pdo->query($sql);
        $statement->execute();
        $contactListData = $statement->fetchAll();
        return $contactListData;
    }

    // 日時の返還(2022-05-12T12:05--->2022-05-12 12:05:00)
    private function changeDateTime(string $dateTime): string
    {
        $changedDateTime = str_replace('T', ' ',$dateTime) . ':00';
        return $changedDateTime;
    }
}
