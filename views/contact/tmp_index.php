<div class="contact-wrapper">
    <h2>お問い合わせ管理【一覧】</h2>
    <a href="../../contact/register.php" class="btn btn_contact">新規登録</a>
    <form action="" method="post">
        <table class="sort_contact">
            <tr>
                <td>期間</td>
                <td><input type="datetime-local" name="start"></td>
                <td><input type="datetime-local" name="end"></td>
            </tr>
            <tr>
                <td>並び順</td>
                <td>
                    <select name="sort_1">
                        <option value="">ソートタイプを選択</option>
                        <option value="number">NO</option>
                        <option value="receive_time">受信日</option>
                        <option value="status">ステータス</option>
                        <option value="update_time">更新日</option>
                    </select>
                </td>
                <td>
                    <select name="sort_2">
                        <option value="">降順/昇順を選択</option>
                        <option value="down">降順</option>
                        <option value="up">昇順</option>
                    </select>
                </td>
            </tr>
        </table>
        <button class="btn btn_contact border-none">検索</button>
    </form>
    <table class="contact-list">
        <thead>
            <tr>
                <th>お問い合わせNO</th>
                <th>受信日</th>
                <th>対応ステータス</th>
                <th>タイトル</th>
                <th>お名前</th>
                <th>メールアドレス</th>
                <th>更新日</th>
                <th>担当ユーザー</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><a href="">000001</a></td>
                <td>2022/05/29 15:00</td>
                <td>完了</td>
                <td>決済について</td>
                <td>佐藤太郎</td>
                <td>example@xxx.com</td>
                <td>2022/05/30 13:00</td>
                <td>佐藤佑介</td>
            </tr>
            <tr>
                <td><a href="">000002</a></td>
                <td>2022/05/29 15:00</td>
                <td>未対応</td>
                <td>利用方法についての質問</td>
                <td>佐藤次郎</td>
                <td>example.jiro@xxx.com</td>
                <td>2022/05/30 12:00</td>
                <td>佐藤佑介</td>
            </tr>
            <tr>
                <td><a href="">000003</a></td>
                <td>2022/06/01 12:00</td>
                <td>進行中</td>
                <td>退会方法についての質問</td>
                <td>佐藤三郎</td>
                <td>example.sabu@xxx.com</td>
                <td>2022/08/01 15:00</td>
                <td>佐藤佑介</td>
            </tr>
        </tbody>
    </table>
</div>
