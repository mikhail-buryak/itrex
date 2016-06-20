$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });

$(function() {
    $('div#pictures').on('click', '.modal-action', function(e) {
        e.preventDefault();
        $('#myModal').remove();

        var $this = $(this);
        var $modal = $('<div class="modal fade" id="myModal" role="dialog"></div>');

        $('div.modal-container').append($modal);
        $modal.load($this.attr('href'), function() { $modal.modal({ keyboard: true }) });
        return false;
    });
});