   <script src="js/jquery.js"></script>
   <script>
	<?php if(isset($_GET['id'])){ ?>
	$('#product_category').val(<?=$product_category_id?>);
   </script>
	<?php }?>
   <script src="js/scripts.js"></script>


    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>
