<!DOCTYPE html>
<html lang="en">
<!-- <link rel="stylesheet" href="styles.css"> -->
<head>
  <title> The Millionnials </title>
  <style>
    .display-5{font-size:2.5rem;font-weight:300;line-height:1.2}
  </style>
</head>
<?php include 'navbar.php'; ?>

<div class="pricing-header text-center">
  <h1 class="display-5">Financial Risk Tolerance Assessment</h1>
</div>
<br></br>
<div class="container">
  <form action="process_risk_test.php" method="post" id="survey-form">

    <!-- survey source: https://missouri.qualtrics.com/jfe/form/SV_e5O9zdPbe1NDMWh -->
    <!-- survey source: https://static.arnaudsylvain.fr/2017/03/Grable-Lyton-1999-Financial-Risk-revisited.pdf -->

    <div class="form-group">
      <p><strong>1. In general, how would your best friend describe you as a risk taker?</strong></p>
      <label> <input name="general" value="4" type="radio" class="input-radio" /> A real gambler</label><br>
      <label> <input name="general" value="3" type="radio" class="input-radio" /> Willing to take risks after completing adequate research </label><br>
      <label><input name="general" value="2" type="radio" class="input-radio" /> Cautious</label><br>
      <label><input name="general" value="1" type="radio" class="input-radio" /> A real risk avoider</label><br>
    </div>

    <div class="form-group">
      <p><strong>2. You are on a TV game show and can choose one of the following. Which would you take?</strong></p>
      <label><input name="q2" value="1" type="radio" class="input-radio" /> $1,000 in cash</label><br>
      <label><input name="q2" value="2" type="radio" class="input-radio" /> A 50% chance at winning $5,000</label><br>
      <label><input name="q2" value="3" type="radio" class="input-radio" /> A 25% chance at winning $10,000</label><br>
      <label><input name="q2" value="4" type="radio" class="input-radio" /> A 5% chance at winning $100,000</label><br>
    </div>

    <div class="form-group">
      <p><strong>3. You have just finished saving for a "once-in-a-lifetime" vacation. Three weeks before you plan to leave, you lose your job. You would:</strong></p>
      <label><input name="q3" value="1" type="radio" class="input-radio" /> Cancel the vacation</label><br>
      <label><input name="q3" value="2" type="radio" class="input-radio" /> Take a much more modest vacation</label><br>
      <label><input name="q3" value="3" type="radio" class="input-radio" /> Go as scheduled, reasoning that you need the time to prepare for a job search</label><br>
      <label><input name="q3" value="4" type="radio" class="input-radio" /> Extend your vacation, because this might be your last chance to go first-class</label><br>
    </div>

    <div class="form-group">
      <p><strong>4. If you unexpectedly received $20,000 to invest, what would you do?</strong></p>
      <label><input name="q4" value="1" type="radio" class="input-radio" /> Deposit it in a bank account, money market account, or an insured CD</label><br>
      <label><input name="q4" value="2" type="radio" class="input-radio" /> Invest it in safe high quality bonds or bond mutual funds</label><br>
      <label><input name="q4" value="3" type="radio" class="input-radio" /> Invest it in stocks or stock mutual funds</label><br>
    </div>

    <div class="form-group">
      <p><strong>5. In terms of experience, how comfortable are you investing in stocks or stock mutual funds?</strong></p>
      <label><input name="q5" value="1" type="radio" class="input-radio" /> Not at all comfortabl</label><br>
      <label><input name="q5" value="2" type="radio" class="input-radio" /> Somewhat comfortable</label> <br>
      <label><input name="q5" value="3" type="radio" class="input-radio" /> Very comfortable</label><br>
    </div>

    <div class="form-group">
      <p><strong>6. When you think of the word "risk" which of the following words comes to mind first? </strong></p>
      <label><input name="q6" value="1" type="radio" class="input-radio" /> Loss</label><br>
      <label><input name="q6" value="2" type="radio" class="input-radio" /> Uncertainty</label><br>
      <label><input name="q6" value="3" type="radio" class="input-radio" /> Opportunity </label><br>
      <label><input name="q6" value="4" type="radio" class="input-radio" /> Thrill </label><br>
    </div>

    <div class="form-group">
      <button type="submit" id="submit" class="submit-button btn btn-outline-primary">
        Submit
      </button>
    </div>
  </form>

  <!-- <body>
    <script src="https://cdn.freecodecamp.org/testable-projects-fcc/v1/bundle.js"></script>
  </body> -->

</div>

</html>