# Project0

Please submit the URL to your repository AND a self assessment using the rubric ( you can't actually click on it, just tell me how many points you earned for each item )

Write a PHP application that allows the user to calculate their federal income taxes ( badly, it's just an example, please don't use it for tax purposes in real life )

Have a form that asks the user for their name, gross income, and total deductions.

Validate the income and deductions are numeric values

Use html special characters before displaying the users name.

If the users deductions are less than the standard deduction ( $12,950 for individuals ), use the standard deduction when calculating the adjusted gross income.

Calculate the users adjusted gross income as gross income - total deductions.

Then display the taxes the user owes at EACH bracket ( see http://www.moneychimp.com/features/tax_brackets.htm )

Remember, income is taxed at the bracket in which it is earned, not at the highest bracket the user ends up in.  Everyone pays 10% of their first 10,275 of income, regardless of if they make $20,000/year or $1,000,000/year.

Also calculate the total taxes owed, and the taxes as a percentage of gross income and taxes as a percentage of adjusted gross income.

Your output might look something like

Tax Calculator Results for Eric Charnesky ( don't actually use this! )  

Gross Income : $100,000.00  

Total Deductions : $12,950.00  

Adusted Gross Income : $87,050.00  

Taxes Owed at 10% bracket : $1,027.50  

Taxes Owed at 12% bracket : $3,780.00  

Taxes Owed at 22% bracket : $9,960.50  

Taxes Owed at 24% bracket : $0.00  

Taxes Owed at 32% bracket : $0.00  

Taxes Owed at 35% bracket : $0.00  

Taxes Owed at 37% bracket : $0.00  

Total Taxes Owed : $14,768.00  

Taxes Owed as percentage of gross income: 14.77%  

Taxes Owed as percentage of adjusted gross income: 16.96%  

http://www.moneychimp.com/features/tax_brackets.htm

GROSS INCOME:         gross_income (input from user)
DEDUCTION:            deduction    (input from user)

Actual Deduction:     actual deduction ->  if deduction <=12950) then actual_deduction = 12950 else actual_deduction = deduction;

adjusted_gross_income = gross_income - actual_deduction;

//Variables for Brackets

bracket_1_upper = 10275;  bracket_1_percent = 0.10;  taxes_owed_bracket_1;  

bracket_2_upper = 41775;  bracket_2_percent = 0.12;  taxes_owed_bracket_2;  

bracket_3_upper = 89075;  bracket_3_percent = 0.22;  taxes_owed_bracket_3;  

bracket_4_upper = 170050; bracket_4_percent = 0.24;  taxes_owed_bracket_4;  

bracket_5_upper = 215950; bracket_5_percent = 0.32;  taxes_owed_bracket_5;  

bracket_6_upper = 539900; bracket_6_percent = 0.35;  taxes_owed_bracket_6;  

bracket_7_upper = 539900; bracket_7_percent = 0.35;  taxes_owed_bracker_7;  

//Bracket 1
if(adjusted_gross_income >0 and adjusted_gross_income<=bracket_1_upper)
{
     //Value lies in this bracket
}
else //Value is greater than current bracket
{

}

Form with all required inputs                                       2 / 2

PHP file validates inputs as correct types                         2  / 2

uses html special characters before displaying the name           2  / 2

Taxes calculated correct for EACH bracket and displayed           2  / 2

Total taxes, taxes as % of gross income and taxes as % of adjusted gross income 2  / 2

Score of Project 10 / 10
