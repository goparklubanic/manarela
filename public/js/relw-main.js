$(document).ready( function(){
    
    $('[data-toggle="tooltip"]').tooltip();

    var nomorHalaman;
    $('.pg-prev').click( function(){
        nomorHalaman = parseInt( $('#nomor-halaman').val()) - 1 ;
        pindahHalaman(nomorHalaman);
    })    

    $('.pg-next').click( function(){
        nomorHalaman = parseInt( $('#nomor-halaman').val() ) + 1 ;
        pindahHalaman(nomorHalaman);
    })

    $('.nomor-halaman').change( function(){
        nomorHalaman = parseInt( $('#nomor-halaman').val() );
        pindahHalaman(nomorHalaman);
    })

    $("#relSearchForm").click( function(){
        let nama = $("#relSearchName").val();
        window.location = baseurl + `/relawan/cari/${nama}`;
    })

    $("#relAddButton").click( function(){
        $("#mdlRelawan").modal('show');
        $("#mdr_modus").val('insert');
    })

    $(".fa-pencil-square-o").click( function(){
        let korel,anktn,nakap,jnkel,email,notlp,pnddk;
        korel = $(this).parent('td').parent('tr').children('td:nth-child(1)').text();
        anktn = $(this).parent('td').parent('tr').children('td:nth-child(2)').text();
        nakap = $(this).parent('td').parent('tr').children('td:nth-child(3)').text();
        jnkel = $(this).parent('td').parent('tr').children('td:nth-child(4)').text();
        email = $(this).parent('td').parent('tr').children('td:nth-child(5)').text();
        notlp = $(this).parent('td').parent('tr').children('td:nth-child(6)').text();
        pnddk = $(this).parent('td').parent('tr').children('td:nth-child(7)').text();

        $("#mdr_modus").val('update');
        $("#mdr_kodeRelawan").val(korel);
        $("#mdr_angkatan").val(anktn);
        $("#mdr_namaLengkap").val(nakap);
        $("#mdr_jenisKelamin").val(jnkel);
        $("#mdr_email").val(email);
        $("#mdr_nomorTelp").val(notlp);
        $("mdr_pendidikanTerakhir").val(pnddk);

        $("#mdlRelawan").modal('show');
    })

    $(".fa-trash-o").click( function(){
        let korel;
        korel = $(this).parent('td').parent('tr').children('td:nth-child(1)').text();
        let tenan = confirm('Relawan dengan id '+korel+' akan dihapus !');
        if ( tenan == true ){
            window.location = baseurl + "/relawan/buang/"+korel;
        }
    })

    $(".fa-bookmark-o").click( function(){
        let korel;
        korel = $(this).parent('td').parent('tr').children('td:nth-child(1)').text();
        window.location = baseurl + "/pelatihan/"+korel;
    })

    $(".fa-ambulance").click( function(){
        let korel;
        korel = $(this).parent('td').parent('tr').children('td:nth-child(1)').text();
        window.location = baseurl + "/penugasan/"+korel;
    })

    $(".toHome").click( function(){
        window.location = baseurl + `/relawan/1`;
    })

})

function pindahHalaman(nmhal){
    if(nmhal < 1 ){
        window.location= baseurl + '/relawan/1';
    }else{
        window.location= baseurl + '/relawan/'+nmhal;
    }
}