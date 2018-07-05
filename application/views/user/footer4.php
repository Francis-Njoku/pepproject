</div>
<!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->
<div class="clearfix"></div>
<footer>
    <div class="container-fluid">
        <p class="copyright">&copy; 2018 <a href="" target="_blank">PEP PROJECT</a>. All Rights Reserved.</p>
    </div>
</footer>
</div>
<!-- END WRAPPER -->
<!-- Javascript -->
<script src="<?php echo base_url('') ?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url('') ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url('') ?>assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url('') ?>assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
<script src="<?php echo base_url('') ?>assets/vendor/chartist/js/chartist.min.js"></script>
<script src="<?php echo base_url('') ?>assets/scripts/klorofil-common.js"></script>
<script>
    var i;
    for(i = 1; i <= 10000000; i++)
    {
    }


    var b = document.getElementById("amt");
    var d = document.getElementById("prc");
    var e = document.getElementById("tt");
    var f = document.getElementById("fee");
    var g = document.getElementById("tt_fee");

    function calculate_price1()
    {

        e.value = b.value * d.value;
        f.value = 0.02 * e.value;
        g.value = f.value + e.value;

    }
    function calculate_price2()
    {

        b.value = e.value / d.value;
        d.value = e.value / b.value;
        f.value = 0.02 * e.value;
        g.value = f.value + e.value;

    }
    function calculate_price3()
    {

        e.value = b.value * d.value;
        f.value = 0.02 * e.value;
        g.value = f.value + e.value;

    }

    function calculate_price431()
    {

        var a787 = document.getElementById("rate1").textContent;
        var a788 = document.getElementById("currency1").textContent;
        var a789 = document.getElementById("trade1").textContent;
        b.value = a788;
        d.value = a787;
        e.value = a789;

        f.value = 0.02 * e.value;
        g.value = f.value + e.value;

    }

    function calculate_price432()
    {
        var a787 = document.getElementById("rate2").textContent;
        var a788 = document.getElementById("currency2").textContent;
        var a789 = document.getElementById("trade2").textContent;
        b.value = a788;
        d.value = a787;
        e.value = a789;

        f.value = 0.02 * e.value;
        g.value = f.value + e.value;

    }
    function calculate_price433()
    {
        var a787 = document.getElementById("rate3").textContent;
        var a788 = document.getElementById("currency3").textContent;
        var a789 = document.getElementById("trade3").textContent;
        b.value = a788;
        d.value = a787;
        e.value = a789;

        f.value = 0.02 * e.value;
        g.value = f.value + e.value;

    }
    function calculate_price434()
    {
        var a787 = document.getElementById("rate4").textContent;
        var a788 = document.getElementById("currency4").textContent;
        var a789 = document.getElementById("trade4").textContent;
        b.value = a788;
        d.value = a787;
        e.value = a789;

        f.value = 0.02 * e.value;
        g.value = f.value + e.value;

    }
    function calculate_price435()
    {
        var a787 = document.getElementById("rate5").textContent;
        var a788 = document.getElementById("currency5").textContent;
        var a789 = document.getElementById("trade5").textContent;
        b.value = a788;
        d.value = a787;
        e.value = a789;

        f.value = 0.02 * e.value;
        g.value = f.value + e.value;

    }


</script>
</body>

</html>
