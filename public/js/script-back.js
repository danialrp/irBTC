/*GENERAL DOCUMENT READY*/
$(document).ready(function () {
    $(".sub-menu").css("display", "none");
});

/*GENERAL POPUP FLASH MESSAGE*/
function show_flash()
{
    $("#flash-message").dialog(
        {
            title: "توجه!",
            autoOpen: true,
            modal: true,
            draggable: false,
            resizable: false,
            dialogClass: "alert",
            width: 300,
            position: { my: "center center-50%", at: "center", of: "#page-wrap" },
            buttons: [
                {
                    text: "بستن",
                    click: function() {
                        $(this).dialog( "close" );
                    }
                }]
        });
}

/*SHOW SESSION $ERROR ITEMS*/
$(document).ready(function(){
    var $err = $(".message-item");
    if($err.text() != 0)
        show_flash();
});

/*BINDE CLICKOUTSITE PLUGIN TO CLASS*/
$(".mainBar").bind( "clickoutside", function(event){
    $(".sub-menu").hide();
});

$("#menu-1").on("click", function() {
    $("#submenu-1").fadeToggle("fast");
    $("#submenu-2").css("display", "none");
    $("#submenu-3").css("display", "none");
    $("#submenu-4").css("display", "none");
    $("#submenu-5").css("display", "none");
    $("#submenu-6").css("display", "none");
});

$("#menu-2").on("click", function() {
    $("#submenu-2").fadeToggle("fast");
    $("#submenu-1").css("display", "none");
    $("#submenu-3").css("display", "none");
    $("#submenu-4").css("display", "none");
    $("#submenu-5").css("display", "none");
    $("#submenu-6").css("display", "none");
});

$("#menu-3").on("click", function() {
    $("#submenu-3").fadeToggle("fast");
    $("#submenu-2").css("display", "none");
    $("#submenu-1").css("display", "none");
    $("#submenu-4").css("display", "none");
    $("#submenu-5").css("display", "none");
    $("#submenu-6").css("display", "none");
});

$("#menu-4").on("click", function() {
    $("#submenu-4").fadeToggle("fast");
    $("#submenu-2").css("display", "none");
    $("#submenu-3").css("display", "none");
    $("#submenu-1").css("display", "none");
    $("#submenu-5").css("display", "none");
    $("#submenu-6").css("display", "none");
});

$("#menu-5").on("click", function() {
    $("#submenu-5").fadeToggle("fast");
    $("#submenu-2").css("display", "none");
    $("#submenu-3").css("display", "none");
    $("#submenu-1").css("display", "none");
    $("#submenu-4").css("display", "none");
    $("#submenu-6").css("display", "none");
});

$("#menu-6").on("click", function() {
    $("#submenu-6").fadeToggle("fast");
    $("#submenu-5").css("display", "none");
    $("#submenu-2").css("display", "none");
    $("#submenu-3").css("display", "none");
    $("#submenu-1").css("display", "none");
    $("#submenu-4").css("display", "none");
});

/*HOVER TABLE TR*/
$(document).ready(function () {
    $("tr").not(':first').hover(
        function () {
            $(this).css("cssText","background: #DEDEDE !important;");
        },
        function () {
            $(this).css("background","");
        });
});

/*EDIT PROFILE TABLE*/
function editProfile(userId) {

}

