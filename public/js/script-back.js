/*GENERAL DOCUMENT READY*/
$(document).ready(function () {
    $(".sub-menu").css("display", "none");
});

$(".mainBar").bind( "clickoutside", function(event){
    $(".sub-menu").hide();
});

$("#menu-1").on("click", function() {
    $("#submenu-1").fadeToggle("fast");
    $("#submenu-2").css("display", "none");
    $("#submenu-3").css("display", "none");
    $("#submenu-4").css("display", "none");
    $("#submenu-5").css("display", "none");
});

$("#menu-2").on("click", function() {
    $("#submenu-2").fadeToggle("fast");
    $("#submenu-1").css("display", "none");
    $("#submenu-3").css("display", "none");
    $("#submenu-4").css("display", "none");
    $("#submenu-5").css("display", "none");
});

$("#menu-3").on("click", function() {
    $("#submenu-3").fadeToggle("fast");
    $("#submenu-2").css("display", "none");
    $("#submenu-1").css("display", "none");
    $("#submenu-4").css("display", "none");
    $("#submenu-5").css("display", "none");
});

$("#menu-4").on("click", function() {
    $("#submenu-4").fadeToggle("fast");
    $("#submenu-2").css("display", "none");
    $("#submenu-3").css("display", "none");
    $("#submenu-1").css("display", "none");
    $("#submenu-5").css("display", "none");
});

$("#menu-5").on("click", function() {
    $("#submenu-5").fadeToggle("fast");
    $("#submenu-2").css("display", "none");
    $("#submenu-3").css("display", "none");
    $("#submenu-1").css("display", "none");
    $("#submenu-4").css("display", "none");
});