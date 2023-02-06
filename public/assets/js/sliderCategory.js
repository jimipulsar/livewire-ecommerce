$(function () {
    $('#categories .list-second-level').hide();

    $('#categories li').click(function () {

        var $this = $(this);
        var id = $this.data('id');

        // Collapse siblings
        $this.siblings('li[data-id!="' + id + '"]').children('i').addClass('fi-rs-angle-small-right').removeClass('fi-rs-angle-small-down');
        $this.siblings('div[data-id!="' + id + '"]').hide();

        $this.children('i').toggleClass('fi-rs-angle-small-right').toggleClass('fi-rs-angle-small-down');
        $this.siblings('div[data-id="' + id + '"]').toggle();
    });

});