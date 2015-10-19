(function () {
    //When hovering over the anchor tags on top, call "change_bg", with the ID of the tag as a parameter.
    var anchs = $("#secPic a");
    anchs.on('mouseover', function () {
        change_bg(this.id);
    })
    //When not hoveing on any of the anchor tags, will change the Bg image to default
    anchs.on('mouseout', function () {
        $('#secPic').css({ 'background-image': "none" });
    })

    //Print document functionality to the "print your report" button.
    $("#printMe").on('click', function () { window.print() });


    $("#convApp").on("click", function () {
        $("#dimmer").fadeIn("fast");
        var dist = $("#convApp").offset().top;
        $("#convPopup").css({ "top": dist }).fadeIn(75);

    })

    $("#altApp").on("click", function () {
        $("#dimmer").fadeIn("fast");
        var dist = $("#altApp").offset().top;
        $("#altPopup").css({ "top": dist }).fadeIn(75);
    })

    $('[data-toggle="tooltip docs"]').tooltip();
})();

function exit(obj) {
    $("#dimmer").fadeOut("slow");
    $("#convPopup").fadeOut("fast");
    $("#schedapp").fadeOut("fast");
    $("#altPopup").fadeOut("fast");
    $("html").css("overflow", "auto");
}

//parses the ID of the anchor tag to determine which of the BG images in the array to set.
function change_bg(id) {
    var imgs = ["url('http://noviqr.com/report/reportBgs/nq-top-first.png')", "url('http://noviqr.com/report/reportBgs/nq-top-second.png')", "url('http://noviqr.com/report/reportBgs/nq-top-third.png')", "url('http://noviqr.com/report/reportBgs/nq-top-fourth.png')", "url('http://noviqr.com/report/reportBgs/nq-top-fifth.png')"];
    pos = id.substring(3, 4);
    $('#secPic').css({ 'background-image': imgs[pos] });
};

function contswitch() {
    var state = $("#altPopup").css("display");
    if (state == "block") {
        $("#altPopup").animate({ "width": "toggle", "opacity": "toggle" }, "slow");
        var dist = $("#schedapp").offset().top;
        $("#schedapp").css({ "top": dist }).animate({ "width": "toggle", "opacity": "toggle" }, "slow");
    }
    else {
        $("#convPopup").animate({ "width": "toggle", "opacity": "toggle" }, "slow");
        var dist = $("#schedapp").offset().top;
        $("#schedapp").css({ "top": dist }).animate({ "width": "toggle", "opacity": "toggle" }, "slow");
    }
}

function bringitback() {
    var hite = $("#altPopup").css("width");
    $("#schedapp").animate({ "width": "toggle", "opacity": "toggle" }, "slow");
    var dist = $("#convPopup").offset().top;
    $("#convPopup").css({ "top": dist }).animate({ "width": "toggle", "opacity": "toggle" }, "slow");
}
