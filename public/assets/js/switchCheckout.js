$("#Stripe").click(function(){
    var $this = $(this);
    if(  $this.data('clicked', true)) {
        $('#button-order').prop("disabled",true);
        $('#stripe_payment').attr('checked', true);
        $('#wire_transfer').attr('checked', false);
    }
    else {
        $('#button-order').prop("disabled",false);
        $('#stripe_payment').attr('checked', false);
    }
});
$("#WireTransfer").click(function(){
    var $this = $(this);
    if(  $this.data('clicked', true)) {
        $('#button-order').prop("disabled",false);
        $('#stripe_payment').attr('checked', false);
        $('#wire_transfer').attr('checked', true);
    }
    else {
        $('#button-order').prop("disabled",true);
        $('#wire_transfer').attr('checked', false);
    }
    if ($("#cash-on-delivery").hasClass("collapsed")) {
        $('#button-order').prop("disabled", true);
    } else {
        $('#button-order').prop("disabled", false);

    }
});

$('.tab_contents').hide();

$('.tab').click(function() {
    var target = $(this.rel);
    $('.tab_contents').not(target).hide();
    target.toggle();
    $('#tabs_container > .tabs > li.active')
        .removeClass('active');

    $(this).parent().addClass('active');

    $('#tabs_container > .tab_contents_container > div.tab_contents_active')
        .removeClass('tab_contents_active');

    $(this.rel).addClass('tab_contents_active');
});