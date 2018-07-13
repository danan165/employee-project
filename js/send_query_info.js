var employeeListActions = {
    deleteEmployee: function(id) {
        var data = {
            type: 'delete',
            id: id
        };

        $.post("../DB_Queries/handle_queries.php", {data: data}, function(response, status) {
            $('#' + data['id']).remove();
        });
    },
    updateEmployee: function(id) {
        var data = {
            type: 'update',
            id: id,
            name: $("#new-name" + id).val()
        };

        $.post("../DB_Queries/handle_queries.php", {data: data}, function(response, status) {
            document.getElementById('name' + data['id']).value = data['name'];
            document.getElementById('new-name' + data['id']).value = "";
        });
    }
};
