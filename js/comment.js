$('.bls').click(function(event){

$("html, body").animate({ scrollTop: $(this.hash).offset().top }, 1000);
var button = $(this);
var commentm = button.data('idid');
var nama = button.data('nama');
var modal = $(this.hash);

modal.find('#id_commentm').val(commentm);
modal.find('#isi').val('@'+nama);

});