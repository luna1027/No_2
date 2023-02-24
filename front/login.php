<fieldset class="mAuto">
    <legend>會員登入</legend>
    <form action="./api/chk.php" method="post">
        <table>
            <tr>
                <td class="bg w150">帳號</td>
                <td><input type="text" name="acc" class="acc" required></td>
            </tr>
            <tr>
                <td class="bg w150">密碼</td>
                <td><input type="password" name="pw" class="pw" required></td>
            </tr>
        </table>
        <div>
            <input type="submit" value="登入">
            <input type="reset" value="清除">
            <span style="float:right">
                <a href="?do=forget">忘記密碼</a> |
                <a href="?do=reg">尚未註冊</a>
            </span>
        </div>
    </form>
</fieldset>

<script>
    $("form").submit(function(e) {
        e.preventDefault();
        // let all = new FormData(this);
        // let neww = new URLSearchParams(all).toString();
        // console.log(all);
        let data = $(this).serialize();
        // console.log(data);
        let chk = 'login';
        send(data, './api/chk.php', chk);
    })
</script>