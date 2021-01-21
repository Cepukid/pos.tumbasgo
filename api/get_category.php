<?php 


if ($_SERVER['REQUEST_METHOD'] == 'GET' ){
require_once 'db_connect.php';

   $search_text = $_GET['search_text'];
  
  if(strlen($search_text)>1)
  {
       $query = "SELECT * FROM customers  WHERE customer_name LIKE '%$search_text%'  OR customer_cell LIKE '%$search_text%'  OR customer_email LIKE '%$search_text%'   OR customer_address LIKE '%$search_text%'   ";
  }
  else
  {
         $query = "SELECT * FROM product_category  ORDER BY product_category_id DESC";
  }

        
        
        $result = mysqli_query($con, $query);
        $response = array();
        while( $row = mysqli_fetch_assoc($result) ){
            array_push($response, 
            array(
                'product_category_id'=>$row['product_category_id'], 
                'product_category_name'=>$row['product_category_name'], 
                
                ) 
            );
        }
        echo json_encode($response);   
    


mysqli_close($con);

}

?>