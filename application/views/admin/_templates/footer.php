</div>
    </div>
        <div class="modal fade in" id="customModel" tabindex="-1" role="dialog" aria-labelledby="customModel" aria-hidden="true" style="overflow: auto;"></div>
         <div class="modal fade overflow-hidden" id="modal-image" role="dialog" aria-labelledby="modal-default"aria-hidden="true">
            <div class="modal-dialog " role="document">
                <div class="modal-content">
                    <img src="" alt="img" id="image-model">
                </div>
            </div>
        </div>
        <div class="modal fade in" id="lightbox" role="dialog" aria-labelledby="customModel" aria-hidden="true">
        <div class="modal-dialog modal-top">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="lightbox-close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
                <img src="" class="popup-image">
            </div>
        </div>
        </div>
        </div>
        <!-- Footer opened -->
            <footer class="footer-main icon-footer">
                <div class="container">
                    <div class="  mt-2 mb-2 text-center">
                        <a></a>
                    </div>
                </div>
            </footer>
            <!-- Footer closed -->
    <!-- Back to top -->
    <a href="#top" id="back-to-top"><i class="fa fa-angle-double-up"></i></a>
    <script>
        var site_url = '<?=base_url();?>';
    </script>
    <script src="<?=base_url('assets/plugins/moment/moment.min.js');?>"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- Jquery-scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/crypto-js.js"></script>
    <!-- Bootstrap-scripts js -->
    <script src="<?=base_url('assets/js/vendors/bootstrap.bundle.min.js');?>"></script>
       <script src="<?=base_url('assets/plugins/jquery-validation/dist/jquery.validate.min.js');?>"></script>
     <script src="<?=base_url('assets/plugins/jquery-validation/dist/additional-methods.min.js');?>"></script>
    <!-- Sidemenu js  -->
    <script src="<?=base_url('assets/plugins/sidemenu/icon-sidemenu.js');?>"></script>
    <script src="<?=base_url('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.js')?>"></script>
    <!-- Sidemenu-responsive-tabs js -->
    <script src="<?=base_url('assets/plugins/sidemenu-responsive-tabs/js/sidemenu-responsive-tabs.js');?>"></script>

    <!-- Rightsidebar js -->
    <script src="<?=base_url('assets/plugins/sidebar/sidebar.js');?>"></script>
    <script src="<?=base_url('assets/plugins/datatable/js/jquery.dataTables.js');?>"></script>
    <script src="<?=base_url('assets/plugins/datatable/js/dataTables.bootstrap4.js');?>"></script>
    <script src="<?=base_url('assets/plugins/datatable/js/dataTables.buttons.min.js');?>"></script>
    <script src="<?=base_url('assets/plugins/datatable/dataTables.responsive.min.js');?>"></script>

    <!-- Select2 js -->
    <script src="<?=base_url('assets/plugins/select2/select2.full.min.js');?>"></script>
    <!-- Custom Js-->
    <script src="<?=base_url('assets/js/theme.js');?>"></script>
    <script src="<?=base_url('assets/js/custom.js?v='.time());?>"></script>
</body>
</html>