$(function() {
    $('div.modal-container').on('change', 'form#handlePicture input[name=picture]', function() {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) { $('#img_preview').attr('src', e.target.result) };
            reader.readAsDataURL(this.files[0]);
        }
        $('#img_changed').val('1');
    });

    $('div.modal-container').on('submit', 'form#handlePicture', function(e) {
        e.preventDefault();
        var $this = $(this);
        var formData =  new FormData(document.forms.handlePicture);

        $('div.alerts').empty();
        $.ajax({
            url: $this.attr('action'),
            data: formData,
            contentType: false,
            processData: false,
            type: $this.attr('method'),
            dataType: 'JSON',
            success: function() {
                $('#myModal').modal('hide');
                updateWall();
            },
            error: function(response) {
                for(var e in response.responseJSON.data)
                    $('div.alerts').append('<div class="alert alert-danger fade in">'+response.responseJSON.data[e]+'</div>');
            }
        });
        return false;
    });

    $('div.modal-container').on('click', 'button.delete-picture', function() {
        if(!confirm('Do you realy wont delete this item?')) return false;

        var $this = $(this);

        $.ajax({
            url: $this.attr('data-action'),
            type: 'delete',
            dataType: 'JSON',
            success: function() {
                $('#myModal').modal('hide');
                updateWall();
            },
            error: function() { alert('Can\'t delete this item. Try to reload page.') }
        });
    });

    function updateWall() {
        $.ajax({
            url: window.location.href,
            dataType: 'JSON',
            success: function(response) {
                var items = '';
                var location = window.location.href.slice(0,window.location.href.indexOf('\?')) + '/';
                for (var i = 0; i < response.data.length; i++) {
                    items += '<div class="col-md-3"><a href="' + location + response.data[i].id +
                        '" class="thumbnail modal-action"><p class="text-center">' + response.data[i].title +
                        '</p><img src="' + response.data[i].min + '" alt="' + response.data[i].title + '"></a></div>';
                };
                $('div#pictures div.panel-body').fadeOut('200', function() { $(this).html(items).fadeIn(200); });
                return true;
            },
            error: function() { return false; }
        });
    }
});
