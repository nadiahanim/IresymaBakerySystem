(function ($) {

    $(document).on("click", ".swal-save", function(e){
        let thisButton = $(this);

        $("#form").parsley().validate();

        if ($("#form").parsley().isValid()) {

            e.preventDefault();
            Swal.fire({
            title: "Are you sure you want to save the data?",
            icon: "warning",
            showCancelButton: !0,
            confirmButtonColor: "#485ec4",
            cancelButtonColor: "#74788d",
            confirmButtonText: "Save",
            cancelButtonText: "Cancel"
            }).then(function(result) {
                // if confirm clicked....
                if (result.value)
                {
                    thisButton.closest('form').trigger("submit");
                }
            })
        }

        e.preventDefault();        
    });

    $(document).on("click", ".swal-update", function(e){
        let thisButton = $(this);

        $("#form").parsley().validate();

        if ($("#form").parsley().isValid()) {

            e.preventDefault();
            Swal.fire({
                title: "Are you sure you want to update the data?",
                icon: "warning",
                showCancelButton: !0,
                confirmButtonColor: "#485ec4",
                cancelButtonColor: "#74788d",
                confirmButtonText: "Save",
                cancelButtonText: "Cancel"
                }).then(function(result) {
                    // if confirm clicked....
                    if (result.value)
                    {
                        thisButton.closest('form').trigger("submit");
                    }
            })
        }
        
        e.preventDefault();       
    });

    $(document).on("click", ".swal-delete", function(e){
        let thisButton = $(this);

        e.preventDefault();

        Swal.fire({
            title: "Are you sure you want to delete the data?",
            icon: "warning",
            showCancelButton: !0,
            confirmButtonColor: "#c35555",
            cancelButtonColor: "#74788d",
            confirmButtonText: "Delete",
            cancelButtonText: "Cancel"
        }).then(function(result) {
            // if confirm clicked....
            if (result.value)
            {
                $('#delete-form').trigger("submit"); // submit form
            }
        })
    });

    $(document).on("click", ".swal-delete-list", function(e){
        let thisButton = $(this);

        e.preventDefault();

        Swal.fire({
            title: "Are you sure you want to delete the data?",
            icon: "warning",
            showCancelButton: !0,
            confirmButtonColor: "#c35555",
            cancelButtonColor: "#74788d",
            confirmButtonText: "Delete",
            cancelButtonText: "Cancel"
        }).then(function(result) {
            // if confirm clicked....
            if (result.value)
            {
                // $('#delete-form').trigger("submit"); // submit form

                console.log(thisButton.closest("td").find("form"));
                thisButton.closest("td").find("form").trigger("submit");
            }
        })
    });

    $(document).on("click", ".swal-print", function(e){
        let thisButton = $(this);

        e.preventDefault();

        Swal.fire({
            title: "Anda pasti",
            text: "Anda pasti untuk Cetak Maklumat?",
            icon: "warning",
            showCancelButton: !0,
            confirmButtonColor: "#485ec4",
            cancelButtonColor: "#74788d",
            confirmButtonText: "Cetak",
            cancelButtonText: "Batal"
        }).then(function(result) {
            // if confirm clicked....
            if (result.value)
            {
                thisButton.closest('form').trigger("submit");
            }
        })
    });

})(jQuery)

