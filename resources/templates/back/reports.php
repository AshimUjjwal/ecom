<h1 class="page-header">
   Reports
<p class="bg-success"><?php display_message();?></p>
</h1>

<table class="table table-hover">


    <thead>

      <tr>
           <th>Report_Id</th>
           <th>Product_Id</th>
           <th>Order_Id</th>
           <th>Product_Price</th>
		   <th>Product_Title</th>
		   <th>Product_Quantity</th>
      </tr>
    </thead>
    <tbody>

      
     <?php get_reports() ;?>


  </tbody>
</table>











                
                 


             