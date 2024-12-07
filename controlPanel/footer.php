</div> <!-- container -->

</div> <!-- content -->

<footer class="footer text-right">
لوحة التحكم
</footer>

</div>


<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->


<!-- Right Sidebar -->
<div class="side-bar right-bar">
<a href="javascript:void(0);" class="right-bar-toggle">
    <i class="zmdi zmdi-close-circle-o"></i>
</a>
<h4 class="">Notifications</h4>
<div class="notification-list nicescroll">
    <ul class="list-group list-no-border user-list">
        <li class="list-group-item">
            <a href="#" class="user-list-item">
                <div class="avatar">
                    <img src="assets/images/users/avatar-2.jpg" alt="">
                </div>
                <div class="user-desc">
                    <span class="name">Michael Zenaty</span>
                    <span class="desc">There are new settings available</span>
                    <span class="time">2 hours ago</span>
                </div>
            </a>
        </li>
        <li class="list-group-item">
            <a href="#" class="user-list-item">
                <div class="icon bg-info">
                    <i class="zmdi zmdi-account"></i>
                </div>
                <div class="user-desc">
                    <span class="name">New Signup</span>
                    <span class="desc">There are new settings available</span>
                    <span class="time">5 hours ago</span>
                </div>
            </a>
        </li>
        <li class="list-group-item">
            <a href="#" class="user-list-item">
                <div class="icon bg-pink">
                    <i class="zmdi zmdi-comment"></i>
                </div>
                <div class="user-desc">
                    <span class="name">New Message received</span>
                    <span class="desc">There are new settings available</span>
                    <span class="time">1 day ago</span>
                </div>
            </a>
        </li>
        <li class="list-group-item active">
            <a href="#" class="user-list-item">
                <div class="avatar">
                    <img src="assets/images/users/avatar-3.jpg" alt="">
                </div>
                <div class="user-desc">
                    <span class="name">James Anderson</span>
                    <span class="desc">There are new settings available</span>
                    <span class="time">2 days ago</span>
                </div>
            </a>
        </li>
        <li class="list-group-item active">
            <a href="#" class="user-list-item">
                <div class="icon bg-warning">
                    <i class="zmdi zmdi-settings"></i>
                </div>
                <div class="user-desc">
                    <span class="name">Settings</span>
                    <span class="desc">There are new settings available</span>
                    <span class="time">1 day ago</span>
                </div>
            </a>
        </li>

    </ul>
</div>
</div>
<!-- /Right-bar -->

</div>
<!-- END wrapper -->


<script>
var resizefunc = [];
</script>

<!-- jQuery  -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap-rtl.min.js"></script>
<script src="assets/js/detect.js"></script>
<script src="assets/js/fastclick.js"></script>
<script src="assets/js/jquery.blockUI.js"></script>
<script src="assets/js/waves.js"></script>
<script src="assets/js/jquery.nicescroll.js"></script>
<script src="assets/js/jquery.slimscroll.js"></script>
<script src="assets/js/jquery.scrollTo.min.js"></script>

<!-- KNOB JS -->
<!--[if IE]>
<script type="text/javascript" src="assets/plugins/jquery-knob/excanvas.js"></script>
<![endif]-->
<script src="assets/plugins/jquery-knob/jquery.knob.js"></script>

<!--Morris Chart-->
<script src="assets/plugins/morris/morris.min.js"></script>
<script src="assets/plugins/raphael/raphael-min.js"></script>

<!-- Dashboard init -->
<script src="assets/pages/jquery.dashboard.js"></script>

<!-- Datatables-->
<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables/dataTables.bootstrap.js"></script>
<script src="assets/plugins/datatables/dataTables.buttons.min.js"></script>
<script src="assets/plugins/datatables/buttons.bootstrap.min.js"></script>
<script src="assets/plugins/datatables/jszip.min.js"></script>
<script src="assets/plugins/datatables/pdfmake.min.js"></script>
<script src="assets/plugins/datatables/vfs_fonts.js"></script>
<script src="assets/plugins/datatables/buttons.html5.min.js"></script>
<script src="assets/plugins/datatables/buttons.print.min.js"></script>
<script src="assets/plugins/datatables/dataTables.fixedHeader.min.js"></script>
<script src="assets/plugins/datatables/dataTables.keyTable.min.js"></script>
<script src="assets/plugins/datatables/dataTables.responsive.min.js"></script>
<script src="assets/plugins/datatables/responsive.bootstrap.min.js"></script>
<script src="assets/plugins/datatables/dataTables.scroller.min.js"></script>
<script src="https://cdn.ckeditor.com/4.16.2/full/ckeditor.js"></script>
<script>
        $(document).ready(function() {
            CKEDITOR.replace('.ckeditor');
            $("#form").submit(function(e) {
                var messageLength = CKEDITOR.instances['body'].getData().replace(/<[^>]*>/gi, '').length;
                if (!messageLength) {
                    swal({
                        title: `يرجى اضافة وصف`,
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    });
                    e.preventDefault();
                }
            });
        });
    </script>

<!-- Datatable init js -->
<script src="assets/pages/datatables.init.js"></script>

<!-- App js -->
<script src="assets/js/jquery.core.js"></script>
<script src="assets/js/jquery.app.js"></script>
<script>
    let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

elems.forEach(function(html) {
    let switchery = new Switchery(html, {
        size: 'small'
    });
});
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#datatable').DataTable();
        $('#datatable-keytable').DataTable( { keys: true } );
        $('#datatable-responsive').DataTable();
        $('#datatable-scroller').DataTable( { ajax: "assets/plugins/datatables/json/scroller-demo.json", deferRender: true, scrollY: 380, scrollCollapse: true, scroller: true } );
        var table = $('#datatable-fixed-header').DataTable( { fixedHeader: true } );
    } );
    TableManageButtons.init();

</script>

</body>
</html>
