document.addEventListener('resize', GetWindowSize, false);


function GetWindowSize(){
    if (window.width <= "1100px"){
        console.log("blblb");
    }
}

let shown = false;

let codeHtml ='<div class="further_info">';
codeHtml +=     '<div id="header_info">'
codeHtml +=         '<h2>Title</h2>';
codeHtml +=         '<input type="checkbox" name="like_button" value="valuable" id="like_button"/><label for="like_button"></label>';
codeHtml +=     '</div>';
codeHtml +=     '<div id="body_info">';
codeHtml +=         '<ul>';
codeHtml +=             '<li>Company Name</li>';
codeHtml +=             '<li>City (Postal code)</li>';
codeHtml +=             '<li>Date</li>';
codeHtml +=         '</ul>';
codeHtml +=         '<input type="button" name="Apply" id="apply_button" value="Apply">';
codeHtml +=         '<ul>';
codeHtml +=             '<li>Degree</li>';
codeHtml +=             '<li>Nb places</li>';
codeHtml +=             '<li>skill</li>';
codeHtml +=             '<li>Duration, durationtype</li>';
codeHtml +=         '</ul>';
codeHtml +=         '<div id="division_description">';
codeHtml +=             '<p>';
codeHtml +=                 'placeholder for the description';
codeHtml +=             '</p>';
codeHtml +=         '</div>';
codeHtml +=     '</div>';
codeHtml += '</div>';





function PannelAppear(){
    if (!shown)
    {
        $("#right_pannel").hidden = true;

        if ($("#right_pannel").width == "0%")
            {
                $("#right_pannel").fadeOut();
            }
        $("#right_pannel").hide();
        $("#left_pannel").width("55%");
        $("#right_pannel").width("40%");
        $("#right_pannel").html(codeHtml);
        
        $("#right_pannel").fadeIn();
        shown = true
    }
    else
    {
        setTimeout(() => { $("#right_pannel").width("0%"); $("#left_pannel").width("70%");}, 400);
        $("#right_pannel").fadeOut();
        shown = false;
    }
}