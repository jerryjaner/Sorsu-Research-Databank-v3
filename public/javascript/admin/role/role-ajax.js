(function ($) {
    "use strict";

    const Roles = {
        init: function () {
            this.fetchRoles();
            this.bindEvents();
        },

        fetchRoles: function () {
            $.get(window.routes.fetch, function (res) {
                $("#all_roles").html(res);

                if ($.fn.DataTable) {
                    if ($.fn.DataTable.isDataTable("#kt_table_widget_1")) {
                        $("#kt_table_widget_1").DataTable().destroy();
                    }
                    $("#kt_table_widget_1").DataTable();
                }
            });
        },

        bindEvents: function () {
            const self = this;

            // CREATE / UPDATE
            $(document).on("submit", "#RoleForm", function (e) {
                e.preventDefault();
                let id = $("#role_id").val();
                let url = id
                    ? window.routes.update.replace(":id", id)
                    : window.routes.store;
                let method = id ? "PUT" : "POST";

                $.ajax({
                    url: url,
                    method: method,
                    data: $(this).serialize(),
                    dataType: "json",
                    beforeSend: function () {
                        $("#role_save_button")
                            .prop("disabled", true)
                            .html('Please wait <span class="spinner-border spinner-border-sm ms-2"></span>');
                        $("#RoleForm").find("span.error-text").text("");
                    },
                    success: function (res) {
                        if (res.status === 422) {
                            $.each(res.error, function (key, val) {
                                $("#RoleForm")
                                    .find(`span.${key}_error`)
                                    .text(val[0]);
                            });
                        } else {
                            self.resetForm();
                            Swal.fire("Success", res.message, "success");
                            self.fetchRoles();
                        }
                        $("#role_save_button")
                            .prop("disabled", false)
                            .text("Save Role");
                    },
                    error: function () {
                        Swal.fire("Error", "Something went wrong.", "error");
                        $("#role_save_button")
                            .prop("disabled", false)
                            .text("Save Role");
                    },
                });
            });

            // EDIT inline
            $(document).on("click", ".role_edit", function () {
                let id = $(this).data("id"); // <- gets the correct role ID
                if (!id) return;

                $.get(
                    window.routes.show.replace(":id", id),
                    function (response) {
                        $("#role_id").val(response.id);
                        $("#role_name").val(response.name);
                        $("#saveRoleButton").text("Update Role");
                    },
                );
            });

            // CANCEL editing
            $(document).on("click", "#role_cancel_button", function () {
                self.resetForm();
            });

            // // DELETE
            // $(document).on("click", ".role_delete", function () {
            //     let id = $(this).data("id");
            //     Swal.fire({
            //         title: "Are you sure? ",
            //          text: "You won't be able to revert this!",
            //         icon: "warning",
            //         showCancelButton: true,
            //         confirmButtonText: "Yes, delete it!",
            //     }).then((result) => {
            //         if (result.isConfirmed) {
            //             $.ajax({
            //                 url: window.routes.destroy.replace(":id", id),
            //                 method: "DELETE",
            //                 data: {
            //                     _token: $('meta[name="csrf-token"]').attr(
            //                         "content",
            //                     ),
            //                 },
            //                 success: function (res) {
            //                     Swal.fire("Deleted!", res.message, "success");
            //                     self.fetchRoles();
            //                 },
            //                 error: function () {
            //                     Swal.fire(
            //                         "Error",
            //                         "Something went wrong.",
            //                         "error",
            //                     );
            //                 },
            //             });
            //         }
            //     });
            // });


            $(document).on('click', '.role_delete', function() {

                    const id = $(this).attr('id');

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {

                        if (!result.isConfirmed) return;

                        $.ajax({
                            url: window.routes.destroy.replace(":id", id),
                            method: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function() {
                                GetRoleRecord();

                                Swal.fire({
                                    icon: 'success',
                                    title: 'Role Deleted Successfully',
                                    showConfirmButton: false,
                                    timer: 3000
                                });
                            }
                        });
                    });
            });



        },

        resetForm: function () {
            $("#RoleForm")[0].reset();
            $("#role_id").val("");
            $("#role_save_button").text("Save Role");
            $("#role_cancel_button").hide();
            $("#RoleForm").find("span.error-text").text("");
        },
    };

    $(document).ready(function () {
        Roles.init();
    });
})(jQuery);
