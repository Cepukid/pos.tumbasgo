<?php 


if ($_SERVER['REQUEST_METHOD'] == 'GET' ){
        require_once 'db_connect.php';

        $getReportType= $_GET['type'];
        include('my_function.php');

        


         $total_order_price=getOrderPriceByType($getReportType);
         $total_discount=getDiscountPriceByType($getReportType);
         $total_tax=getTaxPriceByType($getReportType);

 
        
        
      
        $response = array();
    
            array_push($response, 
            array(
                'total_order_price'=>$total_order_price, 
                'total_tax'=>$total_tax, 
                'total_discount'=>$total_discount  
                
                
                ) 
            );
        
        echo json_encode($response);   
    


mysqli_close($con);

}

?>