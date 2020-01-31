$(document).ready(function() {
    goFunc();
});


function goFunc() {
    $('a').dblclick(function () {
        var res = $(this).attr('title');
        $('a').attr('title');
        $.ajax({
            type: 'GET',
            url: 'double click.php',
            data: {res: res},
            success: function (res) {
                if (!res) alert('Ошибка!');
                showCart(res);
            },
            error: function () {
                alert('Erorr!');
            }
        });
    });
}

function showCart(cart) {
    alert(cart);
}