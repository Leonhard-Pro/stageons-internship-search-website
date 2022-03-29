document.addEventListener('resize', GetWindowSize, false);

function GetWindowSize(){
    if (window.width <= "1100px"){
        console.log("blblb");
    }
}

function PannelAppear(){
    $("#right_pannel").hidden = true;

    if ($("#right_pannel").width == "0%")
        {
            $("#right_pannel").fadeOut();
        }
    $("#right_pannel").hide();
    $("#left_pannel").width("55%");
    $("#right_pannel").width("40%");
    $("#right_pannel").html("<div class=\"further_info\"><h2>Title of the offer</h2> <p>Google, one of the most famous companies in the world, is known for being the biggest IT company in terms of use per day. Bla bla bla, this is a test verse. We continue, as we want to test responsiveness and any kind of automatic modification.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam erat odio, laoreet in velit ut, posuere egestas diam. Vivamus mauris lacus, imperdiet in sem eget, consequat varius sem. Proin commodo sollicitudin ex, sed fermentum ligula scelerisque eu. Phasellus luctus mauris egestas nisl eleifend, id vulputate justo maximus. Nullam efficitur urna eu felis ullamcorper, at suscipit arcu dictum. Nam mauris sapien, sodales ut tellus vel, convallis ullamcorper ante. Mauris pretium pretium tempus. Etiam commodo eros augue, pulvinar lacinia nunc malesuada vitae. Quisque ultricies mattis urna quis tincidunt. Ut vel ligula aliquet, faucibus enim at, dictum quam. Nullam massa augue, consectetur non vehicula vitae, sollicitudin sed felis. Proin pharetra rutrum lorem, quis aliquam ex pellentesque at. Vestibulum elementum magna sed justo blandit, sit amet eleifend metus cursus. Etiam volutpat vel nisl sit amet cursus.  </p></div>");
    
    $("#right_pannel").fadeIn();
}