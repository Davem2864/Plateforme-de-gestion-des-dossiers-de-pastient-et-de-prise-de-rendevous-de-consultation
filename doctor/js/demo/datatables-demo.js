// Call the dataTables jQuery plugin
$(document).ready(function() {
            $('#dataTable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'copy',
                        exportOptions: {
                            columns: ':not(:last)' // Exclut la dernière colonne (Actions)
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: ':not(:last)' // Exclut la dernière colonne (Actions)
                        }
                    },
                    'excel', // Ajoute un bouton pour exporter vers Excel
                    'csv', // Ajoute un bouton pour exporter vers CSV
                    'pdf' // Ajoute un bouton pour exporter vers PDF
                ]
            });
        });