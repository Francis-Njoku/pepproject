<footer class="footer">
    <div class="container-fluid">
        <!-- <nav class="pull-left">
             <ul>

                 <li>
                     <a href="#">
                         Faucet
                     </a>
                 </li>
                 <li>
                     <a href="">
                         Blog
                     </a>
                 </li>
                 <li>
                     <a href="">
                         Licenses
                     </a>
                 </li>
             </ul>
         </nav>-->
        <div class="copyright pull-right">
            &copy; <script>document.write(new Date().getFullYear())</script>, <a href="#">XCoinLive</a>
        </div>
    </div>
</footer>

</div>
</div>
</body>

<!--   Core JS Files   -->
<script src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js')?>"></script>

<!--<script src="<?php echo base_url('assets2/js/jquery-1.10.2.js')?>" type="text/javascript"></script>-->
<script src="<?php echo base_url('assets2/js/bootstrap.min.js')?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/dist/js/bootstrap-formhelpers.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js')?>"></script>

<!--  Checkbox, Radio & Switch Plugins -->
<script src="<?php echo base_url('assets2/js/bootstrap-checkbox-radio.js')?>"></script>

<!--  Charts Plugin -->
<script src="<?php echo base_url('assets2/js/chartist.min.js')?>"></script>

<!--  Notifications Plugin    -->
<script src="<?php echo base_url('assets2/js/bootstrap-notify.js')?>"></script>

<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

<!-- Paper Dashboard Core javascript and methods for Demo purpose -->
<script src="<?php echo base_url('assets2/js/paper-dashboard.js')?>"></script>

<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
<script src="<?php echo base_url('assets2/js/demo.js')?>"></script>
<script>
    $(document).ready(function(){
        $("#myBtn").click(function(){
            $("#myModal").modal();
        });
    });
</script>
<script type="application/javascript">
    function toggleIcon(e) {
        $(e.target)
            .prev('.panel-heading')
            .find(".more-less")
            .toggleClass('glyphicon-plus glyphicon-minus');
    }
    $('.panel-group').on('hidden.bs.collapse', toggleIcon);
    $('.panel-group').on('shown.bs.collapse', toggleIcon);
</script>


</html>
