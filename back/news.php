<?php
$table = "News";
$stable = lcfirst($table);
?>
<fieldset class="mAuto">
    <legend>最新文章管理</legend>
    <form action="" class="adminform">
        <table class="ct">
            <tr class="bg">
                <td class="">編號</td>
                <td class="w50">標題</td>
                <td class="">顯示</td>
                <td class="">刪除</td>
            </tr>
            <?php
            $div = 3;
            $pages = ceil($$table->count(1) / $div);
            $now = $_GET['p'] ?? 1;
            $start = $div * ($now - 1);
            $rows = $$table->all(" LIMIT $start , $div");
            foreach ($rows as $key => $row) {
                $checked = $row['sh'] == 1 ? 'checked' : '';
            ?>
                <tr>
                    <td><?= $key + 1; ?></td>
                    <td>
                        <div class="line"><?= $row['title']; ?></div>
                    </td>
                    <td><input type="checkbox" name="sh[]" id="" value="<?= $row['id']; ?>" <?= $checked; ?>></td>
                    <td><input type="checkbox" name="del[]" id="" value="<?= $row['id']; ?>"></td>
                    <input type="hidden" name="id[]" value="<?= $row['id']; ?>">
                </tr>
            <?php
            }
            $next = $now + 1 <= $pages ? $now + 1 : $now;
            $last = $now - 1 > 0 ? $now - 1 : $now;
            ?>
        </table>
        <div style="text-align:center;">

            <a class="bl" style="font-size:24px;" href="?do=news&p=<?= $last; ?>">&lt;&nbsp;</a>
            <?php
            for ($i = 1; $i <= $pages; $i++) {
                $size = $i == $now ? 'font-size:30px;' : 'font-size:24px;';

                echo "<a class='bl' style='$size' href='?do=news&p=$i'>$i</a>";
            }

            ?>
            <a class="bl" style="font-size:24px;" href="?do=news&p=<?= $next; ?>">&nbsp;&gt;</a>
        </div>
        <div class="ct">
            <input type="hidden" name="table" value="<?= $table; ?>">
            <input type="submit" value="確定修改">
        </div>
    </form>
</fieldset>

<script>
    $("form").submit(function(e) {
        e.preventDefault();
        let data = $(this).serialize();
        console.log(data);
        send(data, './api/save.php');
        lof('?do=news');
    })
</script>