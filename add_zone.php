<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Style.css">
    <title>Add Zone</title>

</head>
<body>    
    <center>
        <h2>ADD ZONE</h2>   

        <form action="add_Zone_Action.php" method = "POST">    
            <div class = "container">    

                <div class = "form_group">    
                    <label>Zone Code:</label>    
                    <input type = "text" name = "zoneCode" placeholder="Automatically"/>    
                </div>  

                <div class = "form_group">    
                    <label>Zone Long Description:</label>    
                    <input type = "text" name = "zoneLong"/>    
                </div>  

                <div class = "form_group">    
                    <label>Short Description:</label>    
                    <input type = "text" name = "zoneShort"/>    
                </div>   

				<div  class = "form_group">
				<input  class="btn" type = "submit" name = "zoneBtn" value="Save"/>   
				</div>

            </div>    
        </form>  
</center>
    </body>  
</html>