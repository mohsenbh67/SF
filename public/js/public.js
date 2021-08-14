$(document).on('click','.manage-cart', function() {
    var element = $(this);
    var type = element.attr('value');
    var form = element.parents('form');
    var url = form.attr('action');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: url,
        method: "POST",
        data: {
                type: type
        },
        success: function(res){

            var alertBox = form.siblings('.alert');
            var inCartDiv = form.children('.in-cart');
            var notInCartDiv = form.children('.not-in-cart');

            if (res.error) {
                alertBox.text(res.error);
                alertBox.show();
            }else {
                alertBox.hide();
                if (res.count == 0) {
                    inCartDiv.hide();
                    notInCartDiv.show();
                }else {
                    inCartDiv.show();
                    notInCartDiv.hide();
                }
                form.find('.cart-count').text(res.count);
                $('#cart-count').text(res.totalCount);
            }

    }});
});
