<div class="contact-register-wrapper">
    <h2>お問い合わせ管理【新規登録】</h2>
    <div class="register-btn-block">
        <a href="../../contact" class="btn btn-back">< 一覧に戻る</a>
        <button class="btn submit-btn" form="register">登録</button>
    </div>
    <form action="../../actions/register.php" method="post" id="register">
        <label for="contact-no">お問い合わせNO</label>
        <input type="text" disabled value="000001" id="contact-no" class="contact-no">
        <div>
            <div>
                <label for="contact-date">受信日</label>
                <input type="datetime-local" name="receive_time">
            </div>
            <div>
                <label for="status">対応ステータス</label>
                <select name="status">
                    <option value="1">未対応</option>
                    <option value="2">進行中</option>
                    <option value="3">完了</option>
                </select>
            </div>
            <div>
                <label for="user">担当者</label>
                <select name="user">
                    <option value="1">佐藤佑介</option>
                    <option value="2">佐藤次郎</option>
                </select>
            </div>
        </div>
        <div>
            <div>
                <label for="name">お名前</label>
                <input type="text" id="name">
            </div>
            <div>
                <label for="mail">メールアドレス</label>
                <input type="email" id="mail">
            </div>
        </div>
        <label for="title">タイトル</label>
        <textarea name="title" cols="30" rows="10">支払方法についてのお問い合わせ</textarea>
        <label for="content">受信本文</label>
        <textarea name="content" cols="30" rows="10">支払い方法についてお問い合わせ下です。</textarea>
        <!-- 履歴 -->
        <h3>履歴</h3>
        <textarea name="log" cols="30" rows="10"></textarea>
    </form>
</div>
