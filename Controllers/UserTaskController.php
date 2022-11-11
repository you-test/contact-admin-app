<?php

class UserTaskController
{
    public static function getTasksNumByProgress(int $user_id, PDO $pdo)
    {
        // $tasks = [[status => '未対応'],　[status => '進行中'], [status => '完了'],...]
        $sql = "SELECT status FROM contact_data WHERE user_id = '$user_id'";
        $statement = $pdo->query($sql);
        $statement->execute();
        $tasks = $statement->fetchAll();

        $tasksNumByProgress = [
            'not_started' => 0,
            'in_progress' => 0,
            'done' => 0
        ];

        foreach ($tasks as $task) {
            if ($task['status'] === '未対応') {
                $tasksNumByProgress['not_started'] ++;
            } elseif ($task['status'] === '進行中') {
                $tasksNumByProgress['in_progress'] ++;
            } else {
                $tasksNumByProgress['done'] ++;
            }
        }

        return $tasksNumByProgress;
    }
}
