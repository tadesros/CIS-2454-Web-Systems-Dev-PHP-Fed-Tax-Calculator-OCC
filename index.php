<?php
//Initial page load set default values
if(!isset($user_name)) {$user_name = '';}
if(!isset($gross_income)) {$gross_income = '';}
if(!isset($yearly_deduction)) {$yearly_deduction = '';}
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Tax Calculator</title>   
        
        <style>            
            .container {
                width: 500px;
                clear: both;
              }
            .container input {
              width: 100%;
              clear: both;
            }            
        </style>        
    </head>
    
    <body>        
        <br>
        <div><b>Tax Calculator</b></div>
             
        <?php  if(!empty($error_message)){?>        
            <p><?php echo $error_message ?></p>    
        <?php } ?>   
        
        <br>
        
        <!--Post-->
        <div class="container">
            
        <form action="view.php" method="post">            
            <label>Enter your name: </label>
            <input type="text"  name="user_name"
                   value="<?php echo htmlspecialchars($user_name); ?>">
            <br><br>
            <label>Enter your gross income for the year $: </label>
            <input type="text" name="gross_income"
                   value="<?php echo htmlspecialchars($gross_income); ?>">
            <br><br>
            <label>Enter your total yearly deductions $: </label>
            <input type="text" name="yearly_deduction"
                   value="<?php echo htmlspecialchars($yearly_deduction); ?>">
            <br>
            <br>
            <input type="submit" value="Submit"/>          
        </form>             
        </div>
    </body>
</html>