        <!-- jQuery  -->
        <script src="../assets/js/jquery.min.js"></script>
        <script src="../assets/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/js/waves.js"></script>
        <script src="../assets/js/jquery.slimscroll.js"></script>

        <!-- KNOB JS -->
        <!--[if IE]>
        <script type="text/javascript" src="../plugins/jquery-knob/excanvas.js"></script>
        <![endif]-->

        <script src="../plugins/chart.js/chart.bundle.js"></script>
        <script src="../assets/pages/jquery.chartjs.init.js"></script>


        <!-- Required datatable js -->
        <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="../plugins/datatables/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="../plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="../plugins/datatables/buttons.bootstrap4.min.js"></script>
        <script src="../plugins/datatables/jszip.min.js"></script>
        <script src="../plugins/datatables/pdfmake.min.js"></script>
        <script src="../plugins/datatables/vfs_fonts.js"></script>
        <script src="../plugins/datatables/buttons.html5.min.js"></script>
        <script src="../plugins/datatables/buttons.print.min.js"></script>

        <!-- Advanced Inputs -->
        <script src="../plugins/switchery/switchery.min.js"></script>
        <script src="../plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js"></script>
        <script src="../plugins/select2/js/select2.min.js" type="text/javascript"></script>
        <script src="../plugins/bootstrap-select/js/bootstrap-select.js" type="text/javascript"></script>
        <script src="../plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js" type="text/javascript"></script>
        <script src="../plugins/bootstrap-maxlength/bootstrap-maxlength.js" type="text/javascript"></script>

        <!-- Key Tables -->
        <script src="../plugins/datatables/dataTables.keyTable.min.js"></script>

        <!-- Responsive examples -->
        <script src="../plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="../plugins/datatables/responsive.bootstrap4.min.js"></script>

        <!-- Selection table -->
        <script src="../plugins/datatables/dataTables.select.min.js"></script>

        <!-- Sweet Alert Js  -->
        <script src="../plugins/sweet-alert/sweetalert2.min.js"></script>
        <script src="../assets/pages/jquery.sweet-alert.init.js"></script>


         <!-- App js -->
         <script src="../assets/js/jquery.core.js"></script>
        <script src="../assets/js/jquery.app.js"></script>
        
        <script type="text/javascript">
            $(document).ready(function() {

                // Default Datatable
                $('#datatable').DataTable();

                //Buttons examples
                var table = $('#datatable-buttons').DataTable({
                    lengthChange: false,
                    buttons: ['copy', 'excel', 'pdf']
                });

                // Key Tables

                $('#key-table').DataTable({
                    keys: true
                });

                // Responsive Datatable
                $('#responsive-datatable').DataTable();

                // Multi Selection Datatable
                $('#selection-datatable').DataTable({
                    select: {
                        style: 'multi'
                    }
                });

                table.buttons().container().appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
            
            $("#dashboard-year").on('change', function(){
                var year=$(this).val();
                window.location = 'dashboard.php?year='+year;
            });

            $("#report-registered-applicants").on('change', function(){
                var year=$(this).val();
                window.location = 'report-registered-applicants.php?year='+year;
            });

            $("#report-schools-country").on('change', function(){
                var year=$(this).val();
                window.location = 'report-schools-country.php?year='+year;
            });

            $("#report-frequent-country").on('change', function(){
                var year=$(this).val();
                window.location = 'report-frequent-country.php?year='+year;
            });

            $("#report-visa").on('change', function(){
                var year=$(this).val();
                window.location = 'report-visa.php?year='+year;
            });
            
            $("#report-student-tourist-country").on('change', function(){
                var year=$(this).val();
                window.location = 'report-tourist-country.php?year='+year;
            });
            
            $("#btn-select-me").on('click', function(){ 
                getValueUsingClass();
            });

            $("#btn-select-me-tourist").on('click', function(){ 
                getValueUsingClassTourist();
            });

            $(".user-disable").on('click', function(){ 
                var userid = $('#userid').val();
                swal({
                    text: "Are you sure you want to disable this user?",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonClass: 'btn btn-confirm mt-2',
                    cancelButtonClass: 'btn btn-cancel ml-2 mt-2',
                    confirmButtonText: 'Yes!'
                }).then(function () {
                    swal({
                            text: "Disabled Successfully",
                            type: 'success',
                            confirmButtonClass: 'btn btn-confirm mt-2'
                        }
                    ).then(function() {
                        window.location = 'actions/disable-user.php?id='+userid;
                    })
                })
            });

            $('#Mr').click(function(){
                $("#male").prop("checked", true);
            });

            $('#Ms').click(function(){
                $("#female").prop("checked", true);
            });

            $('#Mrs').click(function(){
                $("#female").prop("checked", true);
            });

            $(".delete-course").on('click', function(){ 
                var userid = $('#courseid').val();
                swal({
                    text: "Are you sure you want to delete this Program of Study?",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonClass: 'btn btn-confirm mt-2',
                    cancelButtonClass: 'btn btn-cancel ml-2 mt-2',
                    confirmButtonText: 'Yes!'
                }).then(function () {
                    swal({
                            text: "Disabled Successfully",
                            type: 'success',
                            confirmButtonClass: 'btn btn-confirm mt-2'
                        }
                    ).then(function() {
                        window.location = 'actions/delete-course.php?id='+userid;
                    })
                })
            });

            $(".delete-school").on('click', function(){ 
                var userid = $('#schoolid').val();
                swal({
                    text: "Are you sure you want to delete this school?",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonClass: 'btn btn-confirm mt-2',
                    cancelButtonClass: 'btn btn-cancel ml-2 mt-2',
                    confirmButtonText: 'Yes!'
                }).then(function () {
                    swal({
                            text: "Disabled Successfully",
                            type: 'success',
                            confirmButtonClass: 'btn btn-confirm mt-2'
                        }
                    ).then(function() {
                        window.location = 'actions/delete-school.php?id='+userid;
                    })
                })
            });
            
            
        });

        $('#report-summary-year', '#report-summary-status').change(function() {
            alert("call the do something function on option 0");
        });

        function getValueUsingClass(){
            /* declare an checkbox array */
            var chkArray = [];
            var userid = $('.user').val();
            /* look for all checkboes that have a class 'chk' attached to it and check if it was checked */
            $(".chkd:checked").each(function() {
                chkArray.push($(this).val());
            });
            
            /* we join the array separated by the comma */
            var selected;
            selected = chkArray.join(',') ;
            var num = $(".chkd:checked").length;
            console.log(num);
            
            /* check if there is selected checkboxes, by default the length is 1 as it contains one single comma */
            if(num == 1) {
                swal({
                        text: "Are you sure you want these selections?",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonClass: 'btn btn-confirm mt-2',
                        cancelButtonClass: 'btn btn-cancel ml-2 mt-2',
                        confirmButtonText: 'Yes!'
                    }).then(function () {
                        swal({
                                text: "Successfully Added",
                                type: 'success',
                                confirmButtonClass: 'btn btn-confirm mt-2'
                            }
                        ).then(function() {
                            window.location = 'actions/match-student.php?ids='+selected+'&userid='+userid;
                        })
                    })
            }else{
                swal(
                {
                    text: "Please only select one match",
                    type: 'warning',
                    confirmButtonClass: 'btn btn-confirm mt-2',
                }
            )
            }
        }

        function getValueUsingClassTourist(){
            /* declare an checkbox array */
            var chkArray = [];
            var userid = $('.user').val();
            /* look for all checkboes that have a class 'chk' attached to it and check if it was checked */
            $(".chkd:checked").each(function() {
                chkArray.push($(this).val());
            });
            
            /* we join the array separated by the comma */
            var selected;
            selected = chkArray.join(',');
            
            /* check if there is selected checkboxes, by default the length is 1 as it contains one single comma */
            if(selected.length > 0) {
                    swal({
                        text: "Are you sure you want these selections?",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonClass: 'btn btn-confirm mt-2',
                        cancelButtonClass: 'btn btn-cancel ml-2 mt-2',
                        confirmButtonText: 'Yes!'
                    }).then(function () {
                        swal({
                                text: "Successfully Added",
                                type: 'success',
                                confirmButtonClass: 'btn btn-confirm mt-2'
                            }
                        ).then(function() {
                            window.location = 'actions/match-tourist.php?ids='+selected+'&userid='+userid;
                        })
                    })
                // window.location.href = 'actions/match-tourist.php?ids='+selected+'&userid='+userid;
            }else{
                swal(
                {
                    text: "Please at least check one of the checkbox",
                    type: 'warning',
                    confirmButtonClass: 'btn btn-confirm mt-2',
                }
            )
            }
        }
        </script>
        
    </body>

<!-- Mirrored from coderthemes.com/highdmin/horizontal/index.html by HTTrack Website Copier/3.x [XR&CO2014], Mon, 19 Nov 2018 13:11:13 GMT -->
</html>