<?php

class UserListController
{
   public function showUserList(): array
   {
      $sql = <<<SQL
      SELECT
         user_id,
         name,
         mail,
         permission_id,
         created_at,
         updated_at
      FROM
         users
      SQL;

      $statement = $this->pdo->query($sql);
      $statement->execute();
      $usersData = $statement->fetchAll();

      /**
       * 下記のデータ構造にする
       * $usersData = [
       *    [
       *       user_id => 1,
       *       name => '佐藤佑介',
       *       mail => 'sato11.jp@xxx.com',
       *       permission_id => 1,
       *       crated_at => 2022-10-03 16:16:17,
       *       updated_at => 2022-10-05 17:00:00,
       *       not_started => 4,
       *       in_progress => 3,
       *       done => 5,
       *    ],
       *    ....
       * ]
       * */
      foreach ($usersData as $userData) {
         foreach ($this->getTasksNumByProgress($userData['id']) as $taskNum) {
            $userData[] = $taskNum;
         }
      }

      return $usersData;
   }

   // ユーザーの進捗別タスク数を取得
   private function getTasksNumByProgress(int $user_id): array
   {
      // $tasks = [[status => '未対応'],　[status => '進行中'], [status => '完了'],...]
      $sql = "SELECT status FROM contact_data WHERE user_id = '$user_id'";
      $statement = $this->pdo->query($sql);
      $statement->execute();
      $tasks = $statement->fetchAll();

      $tasksNumByProgress = [];
      foreach ($tasks as $task) {
         if ($task['status'] === '未対応') {

         }
      }
   }
}
