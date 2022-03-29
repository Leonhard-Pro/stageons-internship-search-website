var flag = false;

function filtersDisplay() {
    flag =!flag;
    
    if(flag){
        $(".filters-hidden").fadeIn();
        $("#Icon_barre").fadeIn();
    }else{
        $(".filters-hidden").fadeOut();
        $("#Icon_barre").fadeOut();
    }

}
