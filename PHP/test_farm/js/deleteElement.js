function deleteStruct() {
    var log = $( ".treeHTML :checked" ).val();
    $.ajax({
        url: 'delete.php',
        type: 'GET',
        data: {id: log},
        success: function (res) {
            alert("Отдел удален!");
            window.location.reload();
        },
        error: function () {
            alert('Erorr!');
        }
    });
}