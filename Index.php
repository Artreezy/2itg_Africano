<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>Tax Calculator</title>
</head>


        <div id="home">
            <h1><center>TAXXY:  A TAX CALCULATOR WEB APP </center> </h1>
        </div>
   
    <center>
        <h3>To use this calculator, first input your salary. Then
			input the type if it is bi-Monthly or Monlthy. Lastly, press the calculate button and you will see
            the Annual salary as well as the Est. Annual tax and Est Monlthy tax.</h3>
    </center>

	<form method="POST">
		<label for="salary"> Salary:</label>
		<input type="number" name="salary" required min="1"><br><br>

		<label for="pay_frequency">Pay Frequency:</label>
		<input type="radio" name="pay_frequency" value="monthly" checked>Monthly
		<input type="radio" name="pay_frequency" value="bi-monthly">Bi-Monthly<br><br>

		<input type="submit" name="submit" value="Compute Taxes"> <br> <br>
        <label for="results">  <label>
	</form>

	<?php
		
		if(isset($_POST['submit'])) {
			
			$salary = $_POST['salary'];
			$pay_frequency = $_POST['pay_frequency'];

			
			if($pay_frequency == 'monthly') {
				$annual_salary = $salary * 12;
			} else { 
				$annual_salary = $salary * 24;
			}

			
			$taxable_income = $annual_salary - 250000;

		
			if($taxable_income <= 0) {
				$tax = 0;
			} elseif($taxable_income <= 150000) {
				$tax = $taxable_income * 0.20;
			} elseif($taxable_income <= 600000) {
				$tax = 30000 + ($taxable_income - 400000) * 0.25;
			} elseif($taxable_income <= 1500000) {
				$tax = 130000 + ($taxable_income - 800000) * 0.30;
			} elseif($taxable_income <= 5000000) {
				$tax = 490000 + ($taxable_income - 2000000) * 0.32;
			} else { 
				$tax = 2410000 + ($taxable_income - 8000000) * 0.35;
			}

			
			if($pay_frequency == 'monthly') {
				$estimated_monthly_tax = $tax / 12;
				$annual_tax = $tax;
			} else { 
				$estimated_monthly_tax = $tax / 24;
				$annual_tax = $tax * 2;
			}

			
			echo "<h2>Results</h2>";
			echo "Monthly Salary: " . number_format($salary, 2) . "<br>";
			echo "Annual Salary: " . number_format($annual_salary, 2) . "<br>";
			echo "Estimated Monthly Tax: " . number_format($estimated_monthly_tax, 2) . "<br>";
			echo "Annual Tax: " . number_format($annual_tax, 2) . "<br>";
		}
	?>


</body>
</html>