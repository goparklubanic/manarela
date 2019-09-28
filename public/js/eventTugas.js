$(document).ready(function(){
    /*Penanganan nomor halaman */
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

    $("#filterNamaRelawan").keyup( function (){
        let namaRelawan = $(this).val();
        if( namaRelawan.length >= 3 ){
            $.getJSON( baseurl + `/Relawan/carijson/${namaRelawan}` , function(person){
                $("#etg_dftRelawan li").remove();
                $.each( person , function(i,data){
                    $("#etg_dftRelawan").append(`<li class='list-group-item etg_idRelawan' id='${data.kodeRelawan}'>[${data.angkatan}]&nbsp;${data.namaLengkap}</li>`)
                })
            })
        }
    })

    $("#etg_dftRelawan").on( 'click' , '.etg_idRelawan' , function(){
        let idrlw = $(this).prop("id");
        let nmrlw = $(this).text();
        let rlwne = nmrlw.replace(/ /g,'_');
        setKirimRelawan(idrlw,rlwne);
    })
})
/*
function setKirimRelawan(id){
    let dikirim = $("#etg_relawan").val();
    dikirim+=id+";";
    $("#etg_relawan").val(dikirim);
}
*/
function setKirimRelawan(id,rlwn){
    let nmrlw = rlwn.replace(/_/g,' ');
    $("#etg_relawan").append(`
    <span class='epl_kr'>
    <input style="visibility:hidden;" type='checkbox' checked name=relawan[] value='${id}'>&nbsp; ${nmrlw} 
    </span>
    `);
}

function pindahHalaman(nmhal){
    if(nmhal < 1 ){
        window.location= baseurl + '/Penugasan/event/1';
    }else{
        window.location= baseurl + '/Penugasan/event/'+nmhal;
    }
}