$(document).ready( function(){
    $("#spc_kodeRelawan").keyup( function (){
        let namaRelawan = $(this).val();
        if( namaRelawan.length >= 3 ){
            $.getJSON( baseurl + `/Relawan/carijson/${namaRelawan}` , function(person){
                $("#spc_dftRelawan li").remove();
                $.each( person , function(i,data){
                    $("#spc_dftRelawan").append(`<option value='${data.kodeRelawan}'>${data.namaLengkap}</option>`)
                })
            })
        }
    })
    
    $("#spr_kodeRelawan").keyup( function(){
        let rlw = $(this).val();
        if( rlw.length >= 3 ){
            $.getJSON( baseurl + `/Relawan/carijson/${rlw}` , function(person){
                $("#spr_dftRelawan option").remove();
                $.each( person , function( i , data ){
                    $("#spr_dftRelawan").append(
                    `<option value='${data.kodeRelawan}'>${data.namaLengkap}</option>`
                    );
                })
            })
        }
    })

    $("#spr_kodeRelawan").change( function(){
        let korel = $(this).val();
        $.getJSON( baseurl + `/Spesialisasi/kompetensiRelawan/${korel}` , function(spec){
            $("#spr_dftKompetensi li").remove();
            $.each( spec , function( i , data ){
                $("#spr_dftKompetensi").append(
                    `<li class='list-group-item kptrel'>${data.res}</li>`
                );
            })
        })
    })

    $("#rsp_kompetensi").change( function(){
        let kompetensi = $(this).val();
        $.getJSON( baseurl + `/Spesialisasi/relawanKompeten/${kompetensi}` , function(kompet){
            $("#rsp_dftRelawan li").remove();
            $.each( kompet , function( i , data ){
                $("#rsp_dftRelawan").append(`<li class='list-group-item' id='${data.idxSpesialisasi}'>${data.namaLengkap}</li>`)
            })
        })
    })
})