<fieldset class="mAuto">
    <legend>新增問券</legend>
    <form action="./api/que.php" method="post">
        <table>
            <tr>
                <td class="bg w150">問券名稱</td>
                <td><input type="text" name="title" required></td>
                <td></td>
            </tr>
            <tr>
                <td class="bg w150">選項</td>
                <td><input type="text" name="options[]" required></td>
                <td><button type="button" onclick="more()">更多</button></td>
            </tr>
            <tr>
                <td class="bg w150">選項</td>
                <td><input type="text" name="options[]" required></td>
                <td></td>
            </tr>
        </table>
        <div>
            <input type="submit" value="新增">
            <input type="reset" value="清空">
        </div>
    </form>
</fieldset>