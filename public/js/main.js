    function fetch_customer_dataUsers(query = '')
    {
    $.ajax({
        url:"users/action",
        method:'POST',
        data:{query:query},
        dataType:'json',
        success:function(data)
    {
        $('tbody').html(data.table_data);
        $('.total_records').text(data.total_data);
    }
    })
    }

    function fetch_customer_dataVehicles(query = '')
    {
    $.ajax({
        url:"inventari/action",
        method:'POST',
        data:{query:query},
        dataType:'json',
        success:function(data)
    {
        $('tbody').html(data.table_data);
        $('.total_records').text(data.total_data);
    }
    })
    }

$(document).ready(function(){

    var URLactual = window.location;

    if(URLactual == 'http://localhost/gjunkyard/inventari'){
        fetch_customer_dataVehicles();
    }else if(URLactual == 'http://localhost/gjunkyard/users'){
        fetch_customer_dataUsers();
    }


    $(document).on('keyup', '#searchUsers', function(){
        var query = $(this).val();
        fetch_customer_dataUsers(query);
    });

    $(document).on('keyup', '#searchVehicles', function(){
        var query = $(this).val();
        fetch_customer_dataVehicles(query);
    });

});