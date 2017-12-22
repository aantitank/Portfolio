</div>
</div>
</div>
<div  id="footerSection">
    <div class="container">
    </div><!-- Container End -->
</div>
<!-- Placed at the end of the document so the pages load faster ============================================= -->
<script src="/template/themes/js/jquery.js" type="text/javascript"></script>
<script src="/template/themes/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/template/themes/js/google-code-prettify/prettify.js"></script>
<script src="/template/themes/js/bootshop.js"></script>
<script src="/template/themes/js/jquery.lightbox-0.5.js"></script>
<script>
    $(document).ready(function(){
        $(".add-to-cart").click(function () {
            var id = $(this).attr("data-id");
            $.post("/cart/addAjax/"+id, {}, function (data) {
                $("#cart-count1").html(data);
                $("#cart-count2").html(data);
                $("#cart-count3").html(data);
            });
            return false;
        });
    });
</script>

<span id="themesBtn"></span>
</body>
</html>