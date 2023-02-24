function send(all, url, arg = false) {
    $.post(url, all, function (res) {
        console.log(res);
        if (arg) {
            if (arg == 'reg') {
                console.log(res);
                if (res * 1 !== 0) {
                    alert("帳號重複");
                } else {
                    send(all, './api/save.php');
                    alert("註冊完成，歡迎加入");
                    lof(`?do=login`);
                }
            } else if (arg == 'login') {
                if (res * 1 == 0) {
                    alert("查無帳號");
                } else if (res * 1 == 10) {
                    alert("密碼錯誤");
                } else {
                    lof('./back.php');
                }
            } else {
                console.log(res);
                $(".find").text(res);
            }
        }
    })
}

function sendFile(all, url) {
    console.log(all);
    console.log(url);
    $.ajax({
        url: url,
        type: 'post',
        data: all,
        cache: false,
        processData: false,
        contentType: false,
        success: function (res) {
            console.log(res);
        }
    })
}

function lof(x) {
    location.href = x
}

function more() {
    $('table').append(`<tr>
        <td class="bg w150">選項</td>
        <td><input type="text" name="options[]" required></td>
    </tr>`);
}