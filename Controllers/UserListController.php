<?php

class UserListController
{
   public function __construct(private PDO $pdo)
   {
   }

   public function showUserList(): array
   {
      $usersData = $this->getUsersData();

      /**
       * 下記のデータ構造にする
       * $usersData = [
       *    [
       *       'user_data' => [
       *          user_id => 1,
       *          name => '佐藤佑介',
       *          mail => 'sato11.jp@xxx.com',
       *          permission_id => 1,
       *          crated_at => 2022-10-03 16:16:17,
       *          updated_at => 2022-10-05 17:00:00
       *       ],
       *       'user_tasks' => [
       *          not_started => 4,
       *          in_progress => 3,
       *          done => 5
       *       ]
       *    ],
       *    ....
       * ]
       * */
      $usersDataAndTasks = [];
      foreach ($usersData as $key => $userData) {
         $usersDataAndTasks[$key]['user_data'] = $userData;
         $usersDataAndTasks[$key]['user_tasks'] = UserTaskController::getTasksNumByProgress($userData['user_id'], $this->pdo);
      }

      return $usersDataAndTasks;
   }

   public function getUsersData(): array
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

      return $usersData;
   }
}
