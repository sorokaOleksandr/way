function add() {
    // добавление формы
    $('#addform').append('<form class="fAdd" method="get">\n' +
        '<h3>Добавление отдела</h3>\n' +
        '<div class="form-group">\n' +
        '    <label>Название отдела</label>\n' +
        '    <textarea class="form-control" id="ForOne" rows="1"></textarea>\n' +
        '</div>\n' +
        '<div class="form-group">\n' +
        '    <label>Описание отдела</label>\n' +
        '    <textarea class="form-control" id="ForTwo" rows="3"></textarea>\n' +
        '</div>\n' +
        '<button type="submit" class="btn btn-primary" onClick="save();">Сохранить</button>\n' +
        '    </form><br>');
}

// Выборка значений с формы
function save() {
    var log = $( ".treeHTML :checked" ).val();
    var name = $("form #ForOne").val();
    var description = $(" form #ForTwo").val();
    $.ajax({
        url: 'add.php',
        type: 'GET',
        data: {id: log, name: name, description: description},
        success: function () {
            // if (!res) alert('Ошибка!');
            $("form.fAdd").remove();
            alert("Добавление нового отдела оргструктуры прошло успешно!");
            window.location.reload();
        },
        error: function () {
            alert('Erorr!');
        }
    });
}