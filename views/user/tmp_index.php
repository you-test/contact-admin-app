<div class="contact-wrapper">
    <h2>ユーザー管理【一覧】</h2>
    <a href="../../user/register.php" class="btn btn_contact">新規登録</a>
    <table class="contact-list">
        <thead>
            <tr>
                <th>ユーザーNO</th>
                <th>ユーザー名</th>
                <th>メールアドレス</th>
                <th>権限</th>
                <th>未対応タスク</th>
                <th>進行中タスク</th>
                <th>完了タスク</th>
                <th>登録日</th>
                <th>更新日</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usersDataAndTasks as $userData): ?>
            <tr>
                <td><a href="../../user/detail.php?user_id=<?= $userData['user_data']['user_id'] ?>"><?= str_pad($userData['user_data']['user_id'], 6, 0, STR_PAD_LEFT) ?></a></td>
                <td><?= $userData['user_data']['name'] ?></td>
                <td><?= $userData['user_data']['mail'] ?></td>
                <td><?= $userData['user_data']['permission_id'] ?></td>
                <td><?= $userData['user_tasks']['not_started'] ?></td>
                <td><?= $userData['user_tasks']['in_progress'] ?></td>
                <td><?= $userData['user_tasks']['done'] ?></td>
                <td><?= $userData['user_data']['created_at'] ?></td>
                <td><?= $userData['user_data']['updated_at'] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
