
$('#deleteButton').on('click', function (e){
        var idDetailorder = "$model->id";
        var keys = \$('#gvpjax').yiiGridView('getSelectedRows');  
        \$.post('index.php?r=detailorders/delete', { pk : keys, idDetailorder : idDetailorder },
        function () {
            \$.pjax.reload({container:'#gvpjax'});
        }
    );
});  
