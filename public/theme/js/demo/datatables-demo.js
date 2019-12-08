// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable(
    {
        "language": {
            // "url": "dataTables.russian.lang"
            "url": "http://cdn.datatables.net/plug-ins/1.10.20/i18n/Ukrainian.json"
        }
    }

    );
});
