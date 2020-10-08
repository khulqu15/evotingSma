$(document).ready(function() {
    $('.img-vote').click(function() {
        let id = $(this).attr('data-voteId')
        $(this).find('.overlay-primary').addClass('overlay-show')
        $(this).find('.check-voting').addClass('check-voting-show')
        $('.img-vote').not(this).find('.overlay-primary').removeClass('overlay-show')
        $('.img-vote').not(this).find('.check-voting').removeClass('check-voting-show')
        $('#id_voting').val(id)
        $('#submit_voting').removeAttr('disabled')
        $('#submit_voting').removeClass('btn-disabled')
    })
    $('.btn-visi').click(function() {
        $('#visi-misi').addClass('overlay-show')
        $('body').addClass('overflow-hidden')
    })
    $('#closable-visi-misi').click(function() {
        $('#visi-misi').removeClass('overlay-show')
        $('body').removeClass('overflow-hidden')
    })
})
