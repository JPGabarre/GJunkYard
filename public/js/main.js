   //Realitzarà peticions ajax a la base de dades per obtenir les dades d'usuaris segons la query
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

    //Realitzarà peticions ajax a la base de dades per obtenir les dades de vehicles segons la query
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

    //Funcio que aplicara jquery per fer Hidden and show als inputs del formularis de vehicles
    function vehiclesHiddenShow(){
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
    }

    //Funcio que aplicara jquery per fer Hidden and show als inputs del formularis d'usuaris
    function usersHiddenShow(){
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
    }

$(document).ready(function(){
    //Al escriure en el cercador de la view de users.index
    $(document).on('keyup', '#searchUsers', function(){
        var query = $(this).val();
        fetch_customer_dataUsers(query);
    });

    //Al escriure en el cercador de la view de inventari.index
    $(document).on('keyup', '#searchVehicles', function(){
        var query = $(this).val();
        fetch_customer_dataVehicles(query);
    });

    usersHiddenShow();

    vehiclesHiddenShow();

});