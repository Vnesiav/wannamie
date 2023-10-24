    // Menutup dropdown setelah opsi dipilih
    $(".dropdown-menu a").click(function () {
        $(this).closest(".dropdown").find(".dropdown-toggle").html($(this).text());
        $(this).closest(".dropdown").find(".dropdown-toggle").val($(this).data("value"));
        $(this).closest(".dropdown").removeClass("show"); // Menutup dropdown
    });
