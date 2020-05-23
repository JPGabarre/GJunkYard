    function fetch_customer_dataUsers(query = '')
    {
    $.ajax({
        url:"users/action",
        method:'POST',
        data:{query:query},
        dataType:'json',
        success:function(data)
    {
        console.log('Ajax');
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
    $(document).on('keyup', '#searchUsers', function(){
        var query = $(this).val();
        fetch_customer_dataUsers(query);
    });

    $(document).on('keyup', '#searchVehicles', function(){
        var query = $(this).val();
        fetch_customer_dataVehicles(query);
    });

    //Hidden and show per inputs del formulari per editar un usuari
    $("#editarContrasenya").hide();

    jQuery(':button').click(function () {
       if (this.id == 'editarContButton') {
          $("#editarContDiv").hide();
          $("#editarContrasenya").show();
       }
       else if (this.id == 'cancelarContButton') {
          $("#editarContrasenya").hide();
          $("#editarContDiv").show();
       }
    });

    //Hidden and show per inputs del formulari per crear un vehicle
    $("#nouTipusVehicle").hide();

   jQuery(':button').click(function () {
      if (this.id == 'nouTVButton') {
         $("#actualTipusVehicle").hide();
         $("#nouTipusVehicle").show();
      }
      else if (this.id == 'cancelarTVButton') {
         $("#nouTipusVehicle").hide();
         $("#actualTipusVehicle").show();
      }
   });

});