<?php
$table = "Admin";
// $stable = lcfirst($table);
?>
<fieldset class="mAuto">
    <legend>帳號管理</legend>
    <form action="" class="adminform">
        <table class="ct">
            <tr class="bg">
                <td class="w150">帳號</td>
                <td class="w150">密碼</td>
                <td class="w150">刪除</td>
            </tr>
            <?php
            $rows = $$table->all();
            foreach ($rows as $row) {
            ?>
                <tr>
                    <td><?= $row['acc']; ?></td>
                    <td><?= $row['pw']; ?></td>
                    <td><input type="checkbox" name="del[]" id="" value="<?= $row['id']; ?>"></td>
                </tr>
            <?php
            }
            ?>
        </table>
        <div class="ct">
            <input type="hidden" name="table" value="<?= $table; ?>">
            <input type="submit" value="確定刪除">
            <input type="reset" value="清除選取">
        </div>
    </form>

    <h2>新增會員</h2>
    <form action="./api/save.php" method="post" class="regform">
        <span style="color:red;">*請設定您要註冊的帳號及密碼(最長12個字元)</span>
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
            <input type="hidden" name="from" value="back">
            <input type="hidden" name="table" value="<?= $table; ?>">
            <input type="submit" value="新增">
            <input type="reset" value="清除">
        </div>
    </form>
</fieldset>

<script>
    $(".adminform").submit(function(e) {
        e.preventDefault();
        let data = $(this).serialize();
        console.log(data);
        send(data, './api/save.php');
        lof('?do=<?= $stable; ?>');
    })

    $(".regform").submit(function(e) {
        e.preventDefault();
        let data = $(this).serialize();
        console.log(data);
        if (data.includes('=+') || data.includes('=&')) {
            alert("不可空白");
        } else if ($(".pw").val() !== $(".cfpw").val()) {
            alert("密碼錯誤");
        } else {
            this.submit();
            // let chkacc = 'reg';
            // send(data, './api/chk.php', chkacc);
            // console.log(chkacc);
        }
    })
</script>