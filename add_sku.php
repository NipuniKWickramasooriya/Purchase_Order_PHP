<?php 
    
    include_once 'db_connection.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Style.css">
    <title>Add SKU</title>
</head>
<body>  
<center>   
        <h2>ADD SKU</h2>    
        <form action="add_Sku_Action.php" method = "POST" >    
            <div class = "container">       				
                <div class = "form_group">    
                    <label>SKU ID:</label>    
                    <input type = "text" name = "skuID" placeholder="Automatically"/>    
                </div>    
                <div class = "form_group">    
                    <label>SKU code:</label>    
                    <input type = "text" name = "skuCode" required/>    
                </div>  
                <div class = "form_group">    
                    <label>SKU Name:</label>    
                    <input type = "text" name = "skuName" placeholder="Main Product Name/Auto" required/>    
                </div>  
                <div class = "form_group">    
                    <label>MRP:</label>    
                    <input type = "text" name = "mrp" required/>    
                </div>
                <div class = "form_group">    
                    <label>Distributor Price:</label>    
                    <input type = "text" name = "distributionPrice" required/>    
                </div>  				
                <div class = "form_group">    
                    <label>Weight/Volume:</label>    
                    <input type = "text" name = "weight_vol" required/>    
                    <select name="Volume" id="Volume">
					  <option value="Kg">KG</option>
					  <option value="mg">mG</option>
					  <option value="L">L</option>
					  <option value="mL">mL</option>
					</select>    
                </div>   				
				<div>
				<input class="btn" type = "submit" name = "skuBtn" value="Save"/> 
				</div>
            </div>    
        </form> 
</center>    
    </body>  
</html>