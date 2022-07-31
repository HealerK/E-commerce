$(document).ready(function () {
    $(".increaseBtn").click(function (e) {
        e.preventDefault();
        var inc_value = $(this)
            .closest(".product_data")
            .find(".qty_input")
            .val();
        var value = parseInt(inc_value, 10);
        value = isNaN(value) ? 0 : value;
        if (value < 10) {
            value++;
            $(this).closest(".product_data").find(".qty_input").val(value);
        }
    });

    $(".addToCart").click(function (e) { 
        e.preventDefault();

        var product_id = $(this).closest('.product_data').find('.prod_id').val();
        var product_qty = $(this).closest('.product_data').find('.qty_input').val();
        data = {
            "prod_id": product_id,
            "prod_qty": product_qty,
        }
        $.ajax({
            method: "POST",
            url: "/addtoCart",
            data: data,
            success: function (response) {
                alert(response.status)
            }
        });
        
    });

    $(".decreaseBtn").click(function (e) {
        e.preventDefault();
        var dec_value = $(this)
            .closest(".product_data")
            .find(".qty_input")
            .val();
        var value = parseInt(dec_value, 10);
        value = isNaN(value) ? 0 : value;
        if (value > 1) {
            value--;
            $(this).closest(".product_data").find(".qty_input").val(value);
        }
    });
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $(".wishlist").click(function (e) {
        e.preventDefault();
        var prod_id = $(this).closest(".product_data").find(".prod_id").val();
        console.log(prod_id);
        data = {
            prod_id: prod_id,
        };
        $.ajax({
            method: "POST",
            url: "/add-to-wish",
            data: data,
            success: function (response) {
                alert(response.status)
            },
        });
    });

    $(".changeQty").click(function (e) {
        e.preventDefault();
        var prod_id = $(this)
            .closest(".product_data")
            .find(".product_id")
            .val();
        var prod_qty = $(this)
            .closest(".product_data")
            .find(".qty_input")
            .val();
        data = {
            prod_id: prod_id,
            prod_qty: prod_qty,
        };
        $.ajax({
            method: "POST",
            url: "update-cart",
            data: data,
            success: function (response) {
                window.location.reload();
            },
        });
    });
});
