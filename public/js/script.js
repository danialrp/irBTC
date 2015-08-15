/*GENERAL DOCUMENT READY*/
$(document).ready(function() {
    $(".active-trades").hide();
    $(".no-active").show();
    var rowCount = $('#active-trades-table .active-row').size();
    if(rowCount){
        $(".active-trades").show();
        $(".no-active").hide();
    }
    setInterval(function () {
        updateList();
    }, 60000);
});

/*GLOBAL AJAX LOADER AND AJAX SETUP*/
var $loading = $('.cssload-container').hide();
$(document)
    .ajaxStart(function () {
        $loading.show();
    })
    .ajaxStop(function () {
        $loading.hide();
    });

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
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

/*THOUSAND SEPARATOR FOR NUMBERS*/
$.fn.digits = function(){
    return this.each(function(){
        $(this).text( $(this).text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
    })
}

/*SHOW SELL-BOX CALCULATED PARAMETERS*/
function set_sell(amount, value, fee)
{
    $("#sell-amount").val(amount);
    $("#sell-value").val(value);
    $("#sell-total").text((amount*value).toFixed(0)).digits();
    $("#sell-fee").text((fee*amount*value).toFixed(0)).digits();
}

/*SHOW BUY-BOX CALCULATED PARAMETERS*/
function set_buy(amount, value, fee)
{
    $("#buy-amount").val(amount);
    $("#buy-value").val(value);
    $("#buy-total").text((amount*value).toFixed(0)).digits();
    $("#buy-fee").text((fee*amount*value).toFixed(0)).digits();
}

/*SELL CALCULATE BUTTON .CLICK EVENT*/
$(document).ready(function(){
    $("#sell-cal").click(function (e) {
        e.preventDefault();
        var fee = $("#sell-fee-cal").val();
        var amount = $("#sell-amount").val();
        var value = $("#sell-value").val();
        $("#sell-total").text((amount*value).toFixed(0) + " ").digits();
        $("#sell-fee").text((fee*amount*value).toFixed(0) + " ").digits();
    });
});

/*BUY CALCULATE BUTTON .CLICK EVENT*/
$(document).ready(function(){
    $("#buy-cal").click(function (event) {
        event.preventDefault();
        var fee = $("#buy-fee-cal").val();
        var amount = $("#buy-amount").val();
        var value = $("#buy-value").val();
        $("#buy-total").text((amount*value).toFixed(0) + " ").digits();
        $("#buy-fee").text((fee*amount*value).toFixed(0) + " ").digits();
    });
});

/*UPDATE USER BALANCES --AJAX*/
function updateBalance()
{
    $.ajax({
        type: "post",
        url: "/user/update/balance",
        data: "data",
        cache:false
    })
        .done(function(bal) {
            $("#ir_balance").text(Number(bal[0].current_balance).toFixed(0)).digits();
            $("#btc_balance").text(Number(bal[2].current_balance).toFixed(6));
            $("#wm_balance").text(Number(bal[3].current_balance).toFixed(2));
            $("#pm_balance").text(Number(bal[4].current_balance).toFixed(2));
        })
        .fail(function(jqXhr) {
            console.log(jqXhr.responseJSON);
        })
        .always(function () {

        });
}

/*CANCEL ACTIVE TRADE --AJAX*/
function cancelTrade(t_id)
{
    var tradeId = {
        trade_id : t_id
    }
    $.ajax({
        type: "post",
        url: "/trade/update/cancel",
        data: tradeId,
        cache: false
    })
        .done(function(scs){
            $(".two .message-item").text(scs.message);
            show_flash();
        })
        .fail(function(jqXhr){
            if(jqXhr.status === 422){
                var error = jqXhr.responseJSON;
                $.each(error, function(key, value) {
                    $(".two .message-item").text(value[0]);
                });
                show_flash()
            }
            else
                console.log(jqXhr.responseJSON);
        })
        .always(function () {
            updateBalance();
            updateBitcoinActiveTrades();
        });
}

/*UPDATE TRADES LIST --AJAX*/
function updateList() {
    $.ajax({
        type: "post",
        url: "/trade/bitcoin/bitcoin-list",
        data: "data",
        dataType: "html",
        cache: false
    })
        .done(function (lst) {
            $('#trade-list').html($.parseHTML(lst));
        })
        .fail(function (jqXhr) {
            console.log(jqXhr.responseJSON);
        })
        .always(function () {

        });
};

/*UPDATE BITCOIN ACTIVE TRADES LIST --AJAX*/
function updateBitcoinActiveTrades()
{
    $.ajax({
        type: "post",
        url: "/trade/bitcoin/active-trades",
        data: "data",
        dataType: "html",
        cache: false
    })
        .done(function (actv) {
            $("#active-trades").html(actv);
        })
        .fail(function (jqXhr) {
            console.log(jqXhr.responseJSON);
        })
        .always(function () {
            var rowCount = $('.active-row').size();
            if(!rowCount){
                $(".active-trades").hide();
                $(".no-active").show();
            }
        });
}

/*SELL BTC ON .SUBMIT EVENT --AJAX*/
$(document).ready(function () {
    $("form#sell-btc").on("submit", function (event) {
        event.preventDefault();
        var formData = {
            sell_amount : $("input[name=sell_amount]").val(),
            sell_value : $("input[name=sell_value]").val()
        }
        var formAction = $(this).attr("action");
        var formMethod = $(this).attr("method");

        $.ajax({
            type : formMethod,
            url : formAction,
            data : formData,
            cache : false
        })
            .done(function(scs) {
                $(".two .message-item").text(scs.message);
                show_flash();
                $(".active-trades").show();
                $(".no-active").hide();
            })
            .fail(function(jqXhr) {
                if(jqXhr.status === 401) {
                    $(".two .message-item").text("برای مبادله لطفا وارد شوید یا ثبت نام کنید!");
                    show_flash();
                }
                if(jqXhr.status === 422){
                    var error = jqXhr.responseJSON;
                    $.each(error, function(key, value) {
                        $(".two .message-item").text(value[0]);
                    });
                    show_flash()
                }
            })
            .always(function () {
                updateBalance();
                updateBitcoinActiveTrades();
            });
    })
});

/*BUY BTC ON SUBMIT EVENT --AJAX*/
$(document).ready(function () {
    $("form#buy-btc").on("submit", function (event) {
        event.preventDefault();
        var formData = {
            sell_amount: $("input[name=buy_amount]").val(),
            sell_value: $("input[name=buy_value]").val()
        }
        var formAction = $(this).attr("action");
        var formMethod = $(this).attr("method");

        $.ajax({
            type: formMethod,
            url: formAction,
            data: formData,
            cache: false
        })
            .done(function (scs) {
                $(".two .message-item").text(scs.message);
                show_flash();
                $(".active-trades").show();
                $(".no-active").hide();
            })
            .fail(function (jqXhr) {
                if (jqXhr.status === 401) {
                    $(".two .message-item").text("برای مبادله لطفا وارد شوید یا ثبت نام کنید!");
                    show_flash();
                }
                if (jqXhr.status === 422) {
                    var error = jqXhr.responseJSON;
                    $.each(error, function (key, value) {
                        $(".two .message-item").text(value[0]);
                    });
                    show_flash()
                }
            })
            .always(function () {
                updateBalance();
                updateBitcoinActiveTrades();
            });
    })
});

$(document).ready(function () {
    $("#mellat-bank-info").hide();
    $("#saman-bank-info").hide();
    $("#our-banks").change(function () {
        if($("#our-banks :selected").val() == "") {
            $("#mellat-bank-info").hide();
            $("#saman-bank-info").hide();
        }
        else if($("#our-banks :selected").val() == "بانک ملت") {
            $("#mellat-bank-info").show();
            $("#saman-bank-info").hide();
        }
        else if($("#our-banks :selected").val() == "بانک سامان") {
            $("#mellat-bank-info").hide();
            $("#saman-bank-info").show();
        }
    });
});

$(document).ready(function () {
    $("#btc-address-1").hide();
    $("#btc-address-2").hide();
    $("#our-btc-address").change(function () {
        if($("#our-btc-address :selected").val() == "") {
            $("#btc-address-1").hide();
            $("#btc-address-2").hide();
        }
        else if($("#our-btc-address :selected").val() == "14HmXbnCgEnvNVsFQ38YtpMcqtEyruU8zC") {
            $("#btc-address-1").show();
            $("#btc-address-2").hide();
        }
        else if($("#our-btc-address :selected").val() == "address-2") {
            $("#btc-address-1").hide();
            $("#btc-address-2").show();
        }
    });
});





