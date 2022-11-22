<div class="contact-register-wrapper">
    <h2>ユーザー管理【新規登録】</h2>
    <div class="register-btn-block">
        <a href="../../user" class="btn btn-back">< 一覧に戻る</a>
        <button class="btn submit-btn" form="register">登録</button>
    </div>
    <form action="../../actions/user/action_register.php" method="post" id="register">
        <div>
            <div>
                <label for="name">お名前</label>
                <input type="text" id="name" name="name">
            </div>
            <div>
                <label for="mail">メールアドレス</label>
                <input type="email" id="mail" name="mail">
            </div>
        </div>
        <label for="permission">権限</label>
        <select name="permission" id="permission">
            <option value="1">管理者</option>
            <option value="2">編集者</option>
            <option value="3">閲覧者</option>
        </select>
        <label for="password">パスワード</label>
        <input type="password" name="password" id="password">
    </form>
</div>
