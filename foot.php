
            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  , made with ❤️ by
                  <a href="" target="_blank" class="footer-link fw-bolder">Abeliya</a>
                </div>
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="assets/vendor/libs/jquery/jquery.js"></script>
    <script src="assets/vendor/libs/popper/popper.js"></script>
    <script src="assets/vendor/js/bootstrap.js"></script>
    <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <script>
        $(document).ready(function () {
            $('#search').on('input', function () {
                var searchTerm = $(this).val().trim();
                if (searchTerm.length > 0) {
                    highlightText(searchTerm);
                } else {
                    removeHighlights();
                }
            });

            function highlightText(searchTerm) {
                removeHighlights(); // Clear previous highlights
                var regex = new RegExp('\\b' + searchTerm + '\\b', 'gi');
                $('body *').contents().each(function () {
                    if (this.nodeType === 3) { // Node.TEXT_NODE
                        var replacedText = $(this).text().replace(regex, '<span class="highlight">$&</span>');
                        $(this).replaceWith(replacedText);
                    }
                });
            }

            function removeHighlights() {
                $('span.highlight').each(function () {
                    $(this).replaceWith($(this).text());
                });
            }
        });
    </script>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script>
        $(document).ready(function() {
            $('.table').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'copy',
                        text: 'Copy',
                        className: 'btn btn-primary btn-sm border border-0 text-primary rounded-pill'
                    },
                    {
                        extend: 'csv',
                        text: 'CSV',
                        className: 'btn btn-primary btn-sm border border-0 text-primary rounded-pill'
                    },
                    {
                        extend: 'excel',
                        text: 'Excel',
                        className: 'btn btn-primary btn-sm border border-0 text-primary rounded-pill'
                    },
                    {
                        extend: 'pdf',
                        text: 'PDF',
                        className: 'btn btn-primary btn-sm border border-0 text-primary rounded-pill'
                    },
                    {
                        extend: 'print',
                        text: 'Print',
                        className: 'btn btn-primary btn-sm border border-0 text-primary rounded-pill'
                    }
                ]
            });
        });
    </script>
  </body>
</html>