<fieldset class="mAuto">
    <form action="./api/chk.php" method="post">
        <table>
            <tr>
                <td class="w150">請輸入信箱以查詢密碼</td>
            </tr>
            <tr>
                <td><input type="text" name="email" class="email" style="width: 300px;" required></td>
            </tr>
            <tr>
                <td class="find"></td>
            </tr>
        </table>
        <div>
            <input type="submit" value="尋找">
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
        let chk = 'forget';
        send(data, './api/chk.php', chk);
    })
</script>