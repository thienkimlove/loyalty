@if ($crud->bulk_actions)
    <a href="javascript:void(0)" onclick="exportCodes(this)" class="btn btn-default bulk-button"><i class="fa fa-clone"></i> Export Codes</a>
@endif

@push('after_scripts')
    <script>
        if (typeof exportCodes != 'function') {
            function exportCodes(button) {

                if (typeof crud.checkedItems === 'undefined' || crud.checkedItems.length == 0)
                {
                    new PNotify({
                        title: "{{ trans('backpack::crud.bulk_no_entries_selected_title') }}",
                        text: "{{ trans('backpack::crud.bulk_no_entries_selected_message') }}",
                        type: "warning"
                    });

                    return;
                }

                var message = "Are you sure you want to export these :number entries?";
                message = message.replace(":number", crud.checkedItems.length);

                // show confirm message
                if (confirm(message) === true) {
                    var ajax_calls = [];
                    var export_route = "{{ url($crud->route) }}/export";

                    // submit an AJAX delete call
                    $.ajax({
                        url: export_route,
                        type: 'POST',
                        data: { entries: crud.checkedItems },
                        success: function(result) {

                            if (result) {
                                new PNotify({
                                    title: "Entries exported",
                                    text: crud.checkedItems.length+" entries have been exported.",
                                    type: "success"
                                });

                                window.location.href = result;

                            } else {
                                new PNotify({
                                    title: "Exporting failed",
                                    text: "One or more entries could not be exported. Please try again.",
                                    type: "warning"
                                });
                            }
                            // Show an alert with the result


                            crud.checkedItems = [];
                            crud.table.ajax.reload();
                        },
                        error: function(result) {
                            // Show an alert with the result
                            new PNotify({
                                title: "Exporting failed",
                                text: "One or more entries could not be exported. Please try again.",
                                type: "warning"
                            });
                        }
                    });
                }
            }
        }
    </script>
@endpush