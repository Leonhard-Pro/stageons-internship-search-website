var show;

$(document).ready(function () {
    document.getElementById("Filtre_2").hidden = true;
    document.getElementById("Filtre_3").hidden = true;
    document.getElementById("Icon_barre").hidden = true;
    show = 0;
});

function Show_all() {

switch(show)
{
    case 0:
        $("#Filtre_2").fadeIn();
        $("#Filtre_3").fadeIn();
        $("#Icon_barre").fadeIn();
        show = 1;
        break;

    case 1:
        $("#Filtre_2").fadeOut();
        $("#Filtre_3").fadeOut();
        $("#Icon_barre").fadeOut();
        show = 0;
        break;
}

}
