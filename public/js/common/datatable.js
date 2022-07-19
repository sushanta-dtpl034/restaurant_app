$(function () {

    /* For Export Buttons available inside jquery-datatable "server side processing" - Start
      - due to "server side processing" jquery datatble doesn't support all data to be exported
      - below function makes the datatable to export all records when "server side processing" is on */

    function newexportaction(e, dt, button, config) {
        var self = this;
        var oldStart = dt.settings()[0]._iDisplayStart;
        dt.one('preXhr', function (e, s, data) {
            // Just this once, load all data from the server...
            data.start = 0;
            data.length = 2147483647;
            dt.one('preDraw', function (e, settings) {
                // Call the original action function
                if (button[0].className.indexOf('buttons-copy') >= 0) {
                    $.fn.dataTable.ext.buttons.copyHtml5.action.call(self, e, dt, button, config);
                } else if (button[0].className.indexOf('buttons-excel') >= 0) {
                    $.fn.dataTable.ext.buttons.excelHtml5.available(dt, config) ?
                        $.fn.dataTable.ext.buttons.excelHtml5.action.call(self, e, dt, button, config) :
                        $.fn.dataTable.ext.buttons.excelFlash.action.call(self, e, dt, button, config);
                } else if (button[0].className.indexOf('buttons-csv') >= 0) {
                    $.fn.dataTable.ext.buttons.csvHtml5.available(dt, config) ?
                        $.fn.dataTable.ext.buttons.csvHtml5.action.call(self, e, dt, button, config) :
                        $.fn.dataTable.ext.buttons.csvFlash.action.call(self, e, dt, button, config);
                } else if (button[0].className.indexOf('buttons-pdf') >= 0) {
                    $.fn.dataTable.ext.buttons.pdfHtml5.available(dt, config) ?
                        $.fn.dataTable.ext.buttons.pdfHtml5.action.call(self, e, dt, button, config) :
                        $.fn.dataTable.ext.buttons.pdfFlash.action.call(self, e, dt, button, config);
                } else if (button[0].className.indexOf('buttons-print') >= 0) {
                    $.fn.dataTable.ext.buttons.print.action(e, dt, button, config);
                }
                dt.one('preXhr', function (e, s, data) {
                    // DataTables thinks the first item displayed is index 0, but we're not drawing that.
                    // Set the property to what it was before exporting.
                    settings._iDisplayStart = oldStart;
                    data.start = oldStart;
                });
                // Reload the grid with the original page. Otherwise, API functions like table.cell(this) don't work properly.
                setTimeout(dt.ajax.reload, 0);
                // Prevent rendering of the full data to the DOM
                return false;
            });
        });
        // Requery the server with the new one-time export settings
        dt.ajax.reload();
    };
    //For Export Buttons available inside jquery-datatable "server side processing" - End

    //Export Button
    let exportButtons = [];
    if (typeof actionsSettings !== 'undefined' && Object.hasOwn(actionsSettings, 'export')) {

        function getExportFileName() {
            let listtitle = $('.header-title').find('.card-title').html();
            listtitle = listtitle.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-');
            var d = new Date();
            var n = d.getTime();
            return `${listtitle}-${n}`;
        }

        exportButtons = [
            {
                text: '<i class="fa fa-download"></i> Excel',
                className: 'btn btn-info btn-sm',
                id: 'gridExportExcel',
                extend: 'excelHtml5',
                title: '',
                action: newexportaction,
                exportOptions: {
                    columns: function (idx, data, node) {
                        let isVisible = table.column(idx).visible();
                        if (Object.hasOwn(actionsSettings, 'hideFromExport') && actionsSettings.hideFromExport.length > 0) {
                            let isNotForExport = $.inArray(idx, actionsSettings.hideFromExport) !== -1;
                            return isVisible && !isNotForExport ? true : false;
                        } else {
                            return isVisible ? true : false;
                        }
                    }
                },
                filename: function () { return getExportFileName(); }
            },
            {
                text: '<i class="fa fa-download"></i> PDF',
                className: 'btn btn-info btn-sm',
                id: 'gridExportExcel',
                extend: 'pdfHtml5',
                action: newexportaction,
                title: '',
                exportOptions: {
                    columns: function (idx, data, node) {
                        let isVisible = table.column(idx).visible();
                        if (Object.hasOwn(actionsSettings, 'hideFromExport') && actionsSettings.hideFromExport.length > 0) {
                            let isNotForExport = $.inArray(idx, actionsSettings.hideFromExport) !== -1;
                            return isVisible && !isNotForExport ? true : false;
                        } else {
                            return isVisible ? true : false;
                        }
                    }
                },
                orientation: 'landscape',
                pageSize: 'LEGAL',
                filename: function () { return getExportFileName(); }
            },
        ];
    }

    //Add Button
    let addButton = [];
    if (typeof actionsSettings !== 'undefined' && Object.hasOwn(actionsSettings, 'add')) {
        addButton = [
            {
                text: '<i class="fa fa-plus"></i> Add',
                className: 'btn btn-success btn-sm',
                id: 'gridAdd',
                titleAttr: 'Add',
                init: function (dt, node, config) {
                    $(node).attr('href', `${actionsSettings.addurl}`)
                },
                action: function (e, dt, node, config) {
                    //This will send the page to the location specified
                    if (actionsSettings.add == 'popup' && Object.hasOwn(actionsSettings, 'popupMid')) {
                        $(`#${actionsSettings.popupMid}`).modal('show');
                    } else {
                        window.location.href = `${actionsSettings.addurl}`;
                    }
                }
            }
        ];
    }

    //Import nutton
    let importButtons = [];
    if (typeof actionsSettings !== 'undefined' && Object.hasOwn(actionsSettings, 'import')) {
        importButtons = [
            {
                text: '<i class="fa fa-upload"></i> Import',
                className: 'btn btn-info btn-sm',
                id: 'gridImport',
                title: 'Import data',
                action: function (e, dt, node, config) {
                    window.location.href = `${base_url}${baseModule}/importdata`;
                }
            },
        ];
    }
    //Button Setting: ends

    //
    let default_buttons = [{
        text: '<i class="fa fa-low-vision"></i> Columns',
        extend: 'colvis',
        className: 'btn btn-warning btn-sm',
        title: 'Col Vis',
        columnText: function (dt, idx, title) {
            return title;
        }
    }];
    //

    //Extra Top Button Setting: starts
    let buttonSettings1 = [...addButton, ...default_buttons, ...exportButtons, ...importButtons];
    let buttonSettings2 = [];
    let extraBtnArr = [];
    if (typeof listTopButtons !== 'undefined' && listTopButtons.length > 0) {
        $.each(listTopButtons, function (index, element) {
            let icon = '';
            if (typeof element.feathericon !== 'undefined' && element.feathericon !== '') {
                icon = '<i data-feather="' + element.feathericon + '"></i>';
            }
            else if (typeof element.faicon !== 'undefined' && element.faicon !== '') {
                icon = '<i class="' + element.faicon + '"></i>';
            }

            let btnarr = [];
            if (element.href !== '') {
                btnarr = [{
                    text: icon + ' ' + element.text,
                    className: element.className + ' btn-sm',
                    id: element.id,
                    title: element.title,
                    action: function (e, dt, node, config) {
                        window.location.href = element.href;
                    }
                }];
            } else {
                btnarr = [{
                    text: icon + ' ' + element.text,
                    className: element.className + ' btn-sm',
                    id: element.id,
                    title: element.title,
                }];
            }
            extraBtnArr = [...extraBtnArr, ...btnarr];
        });
        buttonSettings2 = extraBtnArr;

    }
    let buttonSettings = $.merge(buttonSettings1, buttonSettings2);
    //Extra Top Button Setting: ends

    let columnDefsSettings = [{
        "defaultContent": "-",
        "targets": "_all"
    }];


    let orderSetting = [[1, 'asc']];
    let dataParams = {};
    let table = $('#datatable').DataTable({
        processing: true,
        serverSide: true,
        colReorder: true,
        'order': orderSetting,
        /*dom: 'Bfrtip',*/
        //dom: '<"top"Bfrt><"bottom"lip><"clear">',//'Blfrtip',//'<"top"Bfrt><"bottom"lip><"clear">',//
        //dom:'<"top"Bfrt><"bottom"lip><"clear">',
        dom:
            "<'row'<'col-sm-9 'B><'col-sm-3'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row mb-2 mt-2'<'col-sm-5'li><'col-sm-7'p>>",
        "lengthMenu": [[10, 20, 30, 50, 100, - 1], [10, 20, 30, 50, 100, "All"]],
        //buttons: buttonSettings,
        buttons: {
            dom: {
                button: {
                    tag: 'button',
                    className: ''
                }
            },
            buttons: buttonSettings,
        },
        language: {
            searchPlaceholder: 'Search records'
        },
        /*ajax: routesindex,*/
        'ajax': {
            'url': routesindex,
            'type': 'GET',
            data: function (d) {
                return $.extend({}, d, dataParams);
            },
        },
        columns: columnArr,
        'columnDefs': columnDefsSettings,
    });

    /**
     * Delete record Calling
     */
    $('body').on('click', '.delrec', function () {
        let id = $(this).data('id');
        const baseUrl = routesindex + '/' + id;
        dataDelete(id, baseUrl);
    });

});





/**
 * data delete by id
 */
function dataDelete(id, functionName) {
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success mx-2',
            cancelButton: 'btn btn-danger mx-2'
        },
        buttonsStyling: false
    });
    swalWithBootstrapButtons.fire({
        allowOutsideClick: false,
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true,
    }).then((result) => {
        if (result.isConfirmed) {
            if (id != '') {
                $.ajax({
                    url: functionName,
                    method: 'DELETE',
                    cache: false,
                    data: {
                        id: id
                    },
                    success: function (dataJson) {
                        //var data = JSON.parse(dataJson);
                        if (dataJson.status == 200) {
                            swalWithBootstrapButtons.fire(
                                'Deleted!',
                                dataJson.success,
                                'success',
                            );
                            setTimeout(() => {
                                window.location.reload();
                            }, 2000);
                        } else {
                            Swal.fire('Error!', 'No data Found', 'error');
                        }
                    },
                    error: function (jqXHR) {
                        //console.log(jqXHR.responseText);
                    }
                });

            } else {
                Swal.fire('Error!', '', 'error');
            }

        } else if (result.dismiss === Swal.DismissReason.cancel) {
            swalWithBootstrapButtons.fire(
                'Cancelled',
                'Your data is safe.',
                'error'
            );
        }
    });

}
