$(document).ready(function() {
    $('.select2').select2({
        width : '100%'
    });
});

var deleteshopbtns = document.querySelectorAll('.deleteshop-btn');

deleteshopbtns.forEach((btn, i) => {

    btn.addEventListener('click',function () {
        swal({
            title: "آیا مطمئن هستید؟",
            text: "در صورت تایید امکان بازیابی وجود ندارد!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            buttons: {
                cancel: "انصراف",
                ok : "تایید",

            }
        })
        .then((willDelete) => {
            if (willDelete) {
                btn.parentElement.submit();
            } else {
                swal("آیتم مورد نظر پاک نشد");
            }
        });

    })

});
