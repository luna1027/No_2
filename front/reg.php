<?php
$table = "Admin";
// $stable = lcfirst($table);
?>
<fieldset class="mAuto">
    <legend>會員註冊</legend>
    <form action="./api/save.php" method="post">
        <p style="color:red;">*請設定您要註冊的帳號及密碼(最長12個字元)</p>
        <table>
            <tr>
                <td class="bg w150">Step1 : 登入帳號</td>
                <td><input type="text" name="acc" class="acc" maxlength="12"></td>
            </tr>
            <tr>
                <td class="bg w150">Step2 : 登入密碼</td>
                <td><input type="password" name="pw" class="pw" maxlength="12"></td>
            </tr>
            <tr>
                <td class="bg w150">Step3 : 再次確認密碼</td>
                <td><input type="password" class="cfpw" maxlength="12"></td>
            </tr>
            <tr>
                <td class="bg w150">Step4 : 信箱(忘記密碼時使用)</td>
                <td><input type="text" name="email" class="acc"></td>
            </tr>
        </table>
        <div>
            <input type="hidden" name="from" value="index">
            <input type="hidden" name="table" value="<?= $table; ?>">
            <input type="submit" value="註冊">
            <input type="reset" value="清除">
        </div>
    </form>
</fieldset>

<script>
    $("form").submit(function(e) {
        e.preventDefault();
        let data = $(this).serialize();
        console.log(data);
        if (data.includes('=+') || data.includes('=&')) {
            alert("不可空白");
        } else if ($(".pw").val() !== $(".cfpw").val()) {
            alert("密碼錯誤");
        } else {
            // this.submit();
            let chkacc = 'reg';
            send(data, './api/chk.php', chkacc);
            console.log(chkacc);
        }
    })
</script>