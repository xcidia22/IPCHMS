
    
<script src="../assets/js/jquery.min.js"></script>
<?php 
    if(!isset($_SESSION['userid']) && empty($_SESSION['userid'])) { ?>
       <script>
            (function() {
                var proxied = window.alert;
                window.alert = function() {
                    swal({
                        text: "You are not logged in. Please Login first.",
                        type: 'warning',
                        confirmButtonClass: 'btn btn-confirm mt-2',
                        confirmButtonText: 'OK'
                    }).then(function() {
                        setTimeout(function(){location.href="../index.php"} , 500);  
                    })
                };
                })();
                alert();
       </script>
  <?php  }
?>