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

    var a = document.getElementById("rate");
    var b = document.getElementById("from");
    var c = document.getElementById("to");
    var a2 = document.getElementById("rate2");
    var b2 = document.getElementById("from2");
    var c2 = document.getElementById("to2");
    var a3 = document.getElementById("rate3");
    var b3 = document.getElementById("from3");
    var c3 = document.getElementById("to3");
    var a4 = document.getElementById("rate4");
    var b4 = document.getElementById("from4");
    var c4 = document.getElementById("to4");
    var a5 = document.getElementById("rate5");
    var b5 = document.getElementById("from5");
    var c5 = document.getElementById("to5");
    var a6 = document.getElementById("rate6");
    var b6 = document.getElementById("from6");
    var c6 = document.getElementById("to6");
    var a7 = document.getElementById("rate7");
    var b7 = document.getElementById("from7");
    var c7 = document.getElementById("to7");

    var check = document.getElementById("coinme");

    function calculate_price23()
    {
        //alert("Hello");
        //      margin = document.getElementById("margin").value;
        $.getJSON("https://min-api.cryptocompare.com/data/pricemulti?fsyms=LTC,ETH,BTC,BCH,WAVES,STEEM&tsyms=USD,EUR",function(data){
            /*   $.each(data,function(i,item){
             alert(item.value);
             })*/
            $("#coin1").append(data['BTC'].USD);
            $("#coin2").append(data['BCH'].USD);
            $("#coin3").append(data['ETH'].USD);
            $("#coin4").append(data['LTC'].USD);
            $("#coin5").append(data['WAVES'].USD);
            $("#coin6").append(data['STEEM'].USD);
            $("#coin26").append(data['STEEM'].USD);


        });
    }



    function calculate_price()
    {

        //alert("Hello");
        //      margin = document.getElementById("margin").value;
        $.getJSON("https://min-api.cryptocompare.com/data/pricemulti?fsyms=LTC,ETH,BTC,BCH,WAVES,STEEM&tsyms=USD,EUR",function(data){
            /*   $.each(data,function(i,item){
             alert(item.value);
             })*/
            $("#coin1").append();
            c.value = b.value * data['BTC'].USD;
            a.value = data['BTC'].USD;
        });


    }

    function calculate_price2()
    {
        //alert("Hello");
        //      margin = document.getElementById("margin").value;
        $.getJSON("https://min-api.cryptocompare.com/data/pricemulti?fsyms=LTC,ETH,BTC,BCH,WAVES,STEEM&tsyms=USD,EUR",function(data){
            /*   $.each(data,function(i,item){
             alert(item.value);
             })*/
            $("#coin2").append();
            c2.value = b2.value * data['BCH'].USD;
            a2.value = data['BCH'].USD;
        });

    }
    function calculate_price3()
    {
        //alert("Hello");
        //      margin = document.getElementById("margin").value;
        $.getJSON("https://min-api.cryptocompare.com/data/pricemulti?fsyms=LTC,ETH,BTC,BCH,WAVES,STEEM&tsyms=USD,EUR",function(data){
            /*   $.each(data,function(i,item){
             alert(item.value);
             })*/
            $("#coin3").append();
            c3.value = b3.value * data['ETH'].USD;
            a3.value = data['ETH'].USD;
        });

    }
    function calculate_price4()
    {
        //alert("Hello");
        //      margin = document.getElementById("margin").value;
        $.getJSON("https://min-api.cryptocompare.com/data/pricemulti?fsyms=LTC,ETH,BTC,BCH,WAVES,STEEM&tsyms=USD,EUR",function(data){
            /*   $.each(data,function(i,item){
             alert(item.value);
             })*/
            $("#coin4").append();
            c4.value = b4.value * data['LTC'].USD;
            a4.value = data['LTC'].USD;
        });

    }
    function calculate_price5()
    {
        //alert("Hello");
        //      margin = document.getElementById("margin").value;
        $.getJSON("https://min-api.cryptocompare.com/data/pricemulti?fsyms=LTC,ETH,BTC,BCH,WAVES,STEEM&tsyms=USD,EUR",function(data){
            /*   $.each(data,function(i,item){
             alert(item.value);
             })*/
            $("#coin5").append();
            c5.value = b5.value * data['WAVES'].USD;
            a5.value = data['WAVES'].USD;
        });

    }
    function calculate_price6()
    {
        //alert("Hello");
        //      margin = document.getElementById("margin").value;
        $.getJSON("https://min-api.cryptocompare.com/data/pricemulti?fsyms=LTC,ETH,BTC,BCH,WAVES,STEEM&tsyms=USD,EUR",function(data){
            /*   $.each(data,function(i,item){
             alert(item.value);
             })*/
            $("#coin6").append();
            c6.value = b6.value * data['STEEM'].USD;
            a6.value = data['STEEM'].USD;
        });

    }
    function calculate_price7()
    {

        c7.value = b7.value * a7.value;
    }


</script>
</body>

</html>
