<footer class="footer text-center"> <?php echo date('Y'); ?> &copy; The Food Analysts </footer>
        </div>
        <!-- ============================================================== -->
        <!-- End Page Content -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?php echo base_url('theme/admin-theme/js/jquery.min.js'); ?>"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url('theme/admin-theme/js/bootstrap.min.js'); ?>"></script>
    <!--slimscroll JavaScript -->
    <script src="<?php echo base_url('theme/admin-theme/js/jquery.slimscroll.js'); ?>"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url('theme/admin-theme/js/waves.js'); ?>"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/additional-methods.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url('theme/admin-theme/js/custom.js'); ?>"></script>
<script>
    $(document).ready(function(){
            $('body').on('click', function (e) {
                $('[data-toggle="popover"]').each(function () {
                    if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {
                        $(this).popover('hide');
                    }
                });
            });
            $('[data-toggle="tooltip"]').tooltip();
        $('[data-toggle="popover"]').popover(); 
    });
</script>
</body>

</html>
