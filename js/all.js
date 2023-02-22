function send(all, url) {
    $.post(url, all, function (res) {
        console.log(JSON.parse(res));
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