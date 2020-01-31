function updateStruct() {

    // добавление формы
    var res = $(this).attr('title');
    $('a.my').attr('title');
    $('#addform').append('<form class="fAdd" method="get">\n' +
        '<h3>Обновление отдела</h3>\n' +
        '<div class="form-group">\n' +
        '    <label>Название</label>\n' +
        '    <textarea class="form-control" id="ForOne" rows="1"></textarea>\n' +
        '</div>\n' +
        '<div class="form-group">\n' +
        '    <label>Описание</label>\n' +
        '    <textarea class="form-control" id="ForTwo" rows="3"></textarea>\n' +
        '</div>\n' +
        '<button type="submit" class="btn btn-primary" onClick="saveUpdate();">Сохранить</button>\n' +
        '    </form><br>');
}

// Выборка значений с формы
function saveUpdate() {
    var log = $( ".treeHTML :checked" ).val();
    var name = $("form #ForOne").val();
    var description = $(" form #ForTwo").val();
    $.ajax({
        url: 'update.php',
        type: 'GET',
        data: {id: log, name: name, description: description},
        success: function () {
            //if (!res) alert('Ошибка!');
            $("form.fAdd").remove();
            alert("обновление елемента оргструктуры прошло успешно!");
            window.location.reload();
        },
        error: function () {
            alert('Erorr!');
        }
    });
}