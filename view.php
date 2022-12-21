<?php
    $user_name = htmlspecialchars(filter_input(INPUT_POST,'user_name')); 
    $gross_income = filter_input(INPUT_POST,'gross_income',FILTER_VALIDATE_FLOAT);  
    $yearly_deduction = filter_input(INPUT_POST,'yearly_deduction',FILTER_VALIDATE_FLOAT);    

    //Declare error message variable set to empty
    $error_message = '';
    
    //Check for validation with gross income
     if($gross_income === FALSE){
           $error_message .= 'Gross Income must not be empty and it must be in correct monetary format.<br>';
    }
    else if($gross_income <= 0){
         $error_message .= 'Gross Income must be greater than zero.<br>';
    }        
    //Check for validation with yearly deduction
    if($yearly_deduction === FALSE){
           $error_message .= 'Yearly deduction must not be empty and it must be in correct monetory format.<br>';
    }
    else if($yearly_deduction <= 0){
         $error_message .= 'Yearly deduction must be greater than zero.<br>';
    }    
    //Validate name
    if(empty($user_name))
    {
        $error_message .= 'Name is a mandatory field.<br>';
    }      
    //If error message route to index page
    if($error_message !='')
    {
        include('index.php');
        exit();         
    }    
    //Variables for calculations
    $bracket_1_upper = 10275.00;
    $bracket_1_decimal= 0.10;
    $bracket_1_percent= $bracket_1_decimal * 100;
    
    $bracket_2_upper = 41775.00;
    $bracket_2_decimal= 0.12;  
    $bracket_2_percent= $bracket_2_decimal * 100;     
    
    $bracket_3_upper = 89075.00;
    $bracket_3_decimal= 0.22;   
    $bracket_3_percent= $bracket_3_decimal * 100;    
    
    $bracket_4_upper = 170050.00;
    $bracket_4_decimal= 0.24;    
    $bracket_4_percent= $bracket_4_decimal * 100; 
    
    $bracket_5_upper = 215950.00;
    $bracket_5_decimal= 0.32;   
    $bracket_5_percent= $bracket_5_decimal * 100;      
    
    $bracket_6_upper = 539900.00;
    $bracket_6_decimal= 0.35;   
    $bracket_6_percent= $bracket_6_decimal * 100;      
    
    $bracket_7_decimal= 0.37;   
    $bracket_7_percent= $bracket_7_decimal * 100; 
    
    $minimum_deduction = 12950.00;
    
    //Set deduction to be used in calculations
    if($yearly_deduction <= $minimum_deduction)
    {
        $actual_deduction = $minimum_deduction;        
    }
    else
    {
        $actual_deduction = $yearly_deduction; 
    }
    
    //Calculate Adjusted Gross Income    
    if($gross_income <= $actual_deduction)
    {
        $adjusted_gross_income = 0;
    }else{
         $adjusted_gross_income = $gross_income - $actual_deduction;
    }

    //*Bracket 1*
    if(($adjusted_gross_income > 0) && ($adjusted_gross_income <= $bracket_1_upper))
    {
         //Value lies in this bracket
         $bracket_1_tax_owed = $adjusted_gross_income * $bracket_1_decimal;
    }
    else if($adjusted_gross_income==0)//AGI is equal to zero
    {
          $bracket_1_tax_owed = 0;
    }
    else{
         $bracket_1_tax_owed = $bracket_1_upper * $bracket_1_decimal;        
    }
        
    //*Bracket 2*   
    //AGI == 0 or AGI less than this brackets minimum
    if(($adjusted_gross_income<=0) || ($adjusted_gross_income <=$bracket_1_upper) )
    {
          $bracket_2_tax_owed = 0;
    }  
    //AGI within this bracket
    else if($adjusted_gross_income <= $bracket_2_upper)
    {
         //Value lies in this bracket
         $bracket_2_tax_owed = ($adjusted_gross_income-$bracket_1_upper) * $bracket_2_decimal;
    }
    //AGI is greater than this bracker
    else{
         $bracket_2_tax_owed = ($bracket_2_upper - $bracket_1_upper) * $bracket_2_decimal;        
    }
    
    //*Bracket 3* 
    //AGI == 0 or AGI less than this brackets minimum
    if(($adjusted_gross_income<=0) || ($adjusted_gross_income <=$bracket_2_upper) )
    {
          $bracket_3_tax_owed = 0;
    }  
    //AGI within this bracket
    else if($adjusted_gross_income <= $bracket_3_upper)
    {
         //Value lies in this bracket
         $bracket_3_tax_owed = ($adjusted_gross_income-$bracket_2_upper) * $bracket_3_decimal;
    }
    //AGI is greater than this bracker
    else{
         $bracket_3_tax_owed = ($bracket_3_upper - $bracket_2_upper) * $bracket_3_decimal;        
    }
    
    //*Bracket 4*
    //AGI == 0 or AGI less than this brackets minimum
    if(($adjusted_gross_income<=0) || ($adjusted_gross_income <=$bracket_3_upper) )
    {
          $bracket_4_tax_owed = 0;
    }  
    //AGI within this bracket
    else if($adjusted_gross_income <= $bracket_4_upper)
    {
         //Value lies in this bracket
         $bracket_4_tax_owed = ($adjusted_gross_income-$bracket_3_upper) * $bracket_4_decimal;
    }
    //AGI is greater than this bracket
    else{
         $bracket_4_tax_owed = ($bracket_4_upper - $bracket_3_upper) * $bracket_4_decimal;        
    }
    
    
    //*Bracket 5*
    //AGI == 0 or AGI less than this brackets minimum
    if(($adjusted_gross_income<=0) || ($adjusted_gross_income <=$bracket_4_upper) )
    {
          $bracket_5_tax_owed = 0;
    }  
    //AGI within this bracket
    else if($adjusted_gross_income <= $bracket_5_upper)
    {
         //Value lies in this bracket
         $bracket_5_tax_owed = ($adjusted_gross_income-$bracket_4_upper) * $bracket_5_decimal;
    }
    //AGI is greater than this bracket
    else{
         $bracket_5_tax_owed = ($bracket_5_upper - $bracket_4_upper) * $bracket_5_decimal;        
    }
    
    //*Bracket 6*
    //AGI == 0 or AGI less than this brackets minimum
    if(($adjusted_gross_income<=0) || ($adjusted_gross_income <=$bracket_5_upper) )
    {
          $bracket_6_tax_owed = 0;
    }  
    //AGI within this bracket
    else if($adjusted_gross_income <= $bracket_6_upper)
    {
         //Value lies in this bracket
         $bracket_6_tax_owed = ($adjusted_gross_income-$bracket_5_upper) * $bracket_6_decimal;
    }
    //AGI is greater than this bracket
    else{
         $bracket_6_tax_owed = ($bracket_6_upper - $bracket_5_upper) * $bracket_6_decimal;        
    }    
    
    //*Bracket 7*
    //AGI == 0 or AGI less than this brackets minimum
    if(($adjusted_gross_income<=0) || ($adjusted_gross_income <=$bracket_6_upper) )
    {
          $bracket_7_tax_owed = 0;
    }  
    //AGI within this bracket this bracket has no upper limit 
    else 
    {
         //Value lies in this bracket
         $bracket_7_tax_owed = ($adjusted_gross_income-$bracket_6_upper) * $bracket_7_decimal;
    }
 
    
    //Calculate total tax owed
    $total_tax_owed = $bracket_1_tax_owed + $bracket_2_tax_owed + $bracket_3_tax_owed + $bracket_4_tax_owed + $bracket_5_tax_owed + $bracket_6_tax_owed + $bracket_7_tax_owed;
  
  
    if($total_tax_owed==0){
        
        $perc_of_agi = 0;
        $perc_of_gross_income = 0;
        
    }
    else{
    //Calculate percentage of AGI
    $perc_of_agi = ($total_tax_owed/$adjusted_gross_income) * 100;
    //Calculate percentage of gross income  
    $perc_of_gross_income = ($total_tax_owed/$gross_income) * 100;
    }
    
    //Format to currency format and percentage
    $gross_income_f = "$".number_format($gross_income,2);
    $yearly_deduction_f = "$".number_format($yearly_deduction,2);   
    $actual_deduction_f = "$".number_format($actual_deduction,2); 
    $adjusted_gross_income_f = "$".number_format($adjusted_gross_income,2);    
     
    
    $bracket_1_tax_owed_f = "$".number_format($bracket_1_tax_owed,2); 
    $bracket_2_tax_owed_f = "$".number_format($bracket_2_tax_owed,2); 
    $bracket_3_tax_owed_f = "$".number_format($bracket_3_tax_owed,2); 
    $bracket_4_tax_owed_f = "$".number_format($bracket_4_tax_owed,2); 
    $bracket_5_tax_owed_f = "$".number_format($bracket_5_tax_owed,2); 
    $bracket_6_tax_owed_f = "$".number_format($bracket_6_tax_owed,2); 
    $bracket_7_tax_owed_f = "$".number_format($bracket_7_tax_owed,2);   
   
   
    $total_tax_owed_f = "$".number_format($total_tax_owed,2); 
   
   $perc_of_gross_income_f = number_format($perc_of_gross_income,2)."%";
   $perc_of_agi_f = number_format($perc_of_agi,2)."%";   
?>



<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Deduction Calculator</title>
    </head>
    <body>
        <?php         
          echo "<p align='left'> <font color=black  size='3pt'>Name: $user_name</font> </p>";
          echo "<p align='left'> <font color=black  size='3pt'>Gross Income: $gross_income_f</font> </p>";
          echo "<p align='left'> <font color=black  size='3pt'>Yearly deduction: $yearly_deduction_f</font> </p>";   
          echo "<p align='left'> <font color=black  size='3pt'>Deduction used in calculations: $actual_deduction_f</font> </p>";
          
          echo "<p align='left'> <font color=black  size='3pt'>Adjusted Gross Income: $adjusted_gross_income_f</font> </p>";
          
          echo "<p align='left'> <font color=black  size='3pt'>Taxes Owed at $bracket_1_percent% bracket: $bracket_1_tax_owed_f </font> </p>";          
          echo "<p align='left'> <font color=black  size='3pt'>Taxes Owed at $bracket_2_percent% bracket: $bracket_2_tax_owed_f</font> </p>";    
          echo "<p align='left'> <font color=black  size='3pt'>Taxes Owed at $bracket_3_percent% bracket: $bracket_3_tax_owed_f</font> </p>";     
          echo "<p align='left'> <font color=black  size='3pt'>Taxes Owed at $bracket_4_percent% bracket: $bracket_4_tax_owed_f</font> </p>";          
          echo "<p align='left'> <font color=black  size='3pt'>Taxes Owed at $bracket_5_percent% bracket: $bracket_5_tax_owed_f</font> </p>";    
          echo "<p align='left'> <font color=black  size='3pt'>Taxes Owed at $bracket_6_percent% bracket: $bracket_6_tax_owed_f</font> </p>";
          echo "<p align='left'> <font color=black  size='3pt'>Taxes Owed at $bracket_7_percent% bracket: $bracket_7_tax_owed_f</font> </p>";        
     
          echo "<p align='left'> <font color=black  size='3pt'>Total Taxes Owed: $total_tax_owed_f</font> </p>";           
          echo "<p align='left'> <font color=black  size='3pt'>Taxes Owed as percentage of gross income:$perc_of_gross_income_f</font> </p>";  
          echo "<p align='left'> <font color=black  size='3pt'>Taxes Owed as percentage of adjusted gross income:$perc_of_agi_f</font> </p>";             

         ?>          
    </body>
</html>

