$( "#nav-pwdchang-tab" ).on('click',function() {
    window.location.href="./index.php?menu=pwdchanger"
});
$( "#nav-AddUse-tab" ).on('click',function() {
    window.location.href="./index.php?menu=AddUser"
});
$( "#nav-ModUser-tab" ).on('click',function() {
    window.location.href="./index.php?menu=ModUser"
});

$( "#nav-SeeNotes-tab" ).on('click',function() {
    window.location.href="./index.php?menu=SeeNotes"
});
$( "#nav-AddNotes-tab" ).on('click',function() {
    window.location.href="./index.php?menu=AddNotes"
});
function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
    }
    console.log(sParameterName);
}
function TogglerClass(idtarget){
    var idlist= ['pwdchang','AddUse','ModUser','SeeNotes','AddNotes'];
   idlist= idlist.filter(e=>e !== idtarget);

    $('#nav-'+idtarget).toggleClass('show');
    $('#nav-'+idtarget).toggleClass('active');
    $('#nav-'+idtarget+'-tab').toggleClass('active');
    idlist.forEach(function (idother) {
        $('#nav-'+idother).removeClass('show');
        $('#nav-'+idother).removeClass('active');
        $('#nav-'+idother+'-tab').removeClass('active');
    })
}
$(document).ready(function(){
   console.log(getUrlParameter('menu'));
    var parm =getUrlParameter('menu');
    switch (parm) {
        case 'pwdchanger' :
            TogglerClass('pwdchang');
            break;
        case 'AddUser':
            TogglerClass("AddUser");
            break;
        case 'ModUser':
            TogglerClass("ModUser");
            break;
        case 'SeeNotes':
            TogglerClass("SeeNotes");
            break;
        case 'AddNotes':
            TogglerClass("AddNotes");
            break;
    }
    }
);