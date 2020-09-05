<!DOCTYPE html>
<html lang="en">
<!-- <link rel="stylesheet" href="styles.css"> -->

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

<div class="container">
  <header class="header">
    <h1 id="title" class="text-center">Financial Risk Tolerance Test</h1>
    <p id="description" class="description text-center"></p>
  </header>
</div>
<br></br>
<div class="container">
  <form action="process_risk_test.php" method="post" id="survey-form">

    <!-- survey source: https://missouri.qualtrics.com/jfe/form/SV_e5O9zdPbe1NDMWh -->
    <!-- survey source: https://static.arnaudsylvain.fr/2017/03/Grable-Lyton-1999-Financial-Risk-revisited.pdf -->

    <div class="form-group">
      <p>1. In general, how would your best friend describe you as a risk taker?</p>
      <label> <input name="general" value="4" type="radio" class="input-radio" />A real gambler</label>
      <label> <input name="general" value="3" type="radio" class="input-radio" />Willing to take risks after completing adequate research </label>
      <label><input name="general" value="2" type="radio" class="input-radio" />Cautious</label>
      <label><input name="general" value="1" type="radio" class="input-radio" />A real risk avoider</label>
    </div>

    <div class="form-group">
      <p>2. You are on a TV game show and can choose one of the following. Which would you take?</p>
      <label>
        <input name="qn2" value="1" type="radio" class="input-radio" />$1,000 in cash</label>
      <label><input name="qn2" value="2" type="radio" class="input-radio" />A 50% chance at winning $5,000
      </label>
      <label><input name="qn2" value="3" type="radio" class="input-radio" />A 25% chance at winning $10,000</label>
      <label><input name="qn2" value="4" type="radio" class="input-radio" />A 5% chance at winning $100,000</label>
    </div>

    <div class="form-group">
      <p>3. You have just finished saving for a "once-in-a-lifetime" vacation. Three weeks before you plan to leave, you lose your job. You would:</p>
      <label>
        <input name="q3" value="1" type="radio" class="input-radio" />Cancel the vacation</label>
      <label>
        <input name="q3" value="2" type="radio" class="input-radio" />Take a much more modest vacation
      </label>
      <label><input name="q3" value="3" type="radio" class="input-radio" />Go as scheduled, reasoning that you need the time to prepare for a job search</label>
      <label><input name="q3" value="4" type="radio" class="input-radio" />Extend your vacation, because this might be your last chance to go first-class</label>
    </div>

    <div class="form-group">
      <p>4. If you unexpectedly received $20,000 to invest, what would you do?</p>
      <label>
        <input name="q3" value="1" type="radio" class="input-radio" />Deposit it in a bank account, money market account, or an insured CD</label>
      <label>
        <input name="q3" value="2" type="radio" class="input-radio" />Invest it in safe high quality bonds or bond mutual funds
      </label>
      <label><input name="q3" value="3" type="radio" class="input-radio" />Invest it in stocks or stock mutual funds</label>
    </div>

    <div class="form-group">
      <p>5. In terms of experience, how comfortable are you investing in stocks or stock mutual funds?</p>
      <label>
        <input name="q3" value="1" type="radio" class="input-radio" />Not at all comfortabl</label>
      <label>
        <input name="q3" value="2" type="radio" class="input-radio" />Somewhat comfortable
      </label>
      <label><input name="q3" value="3" type="radio" class="input-radio" />Very comfortable</label>
    </div>

    <div class="form-group">
      <p> 6. When you think of the word "risk" which of the following words comes to mind first? </p>
      <label>
        <input name="q3" value="1" type="radio" class="input-radio" />Loss</label>
      <label>
        <input name="q3" value="2" type="radio" class="input-radio" />Uncertainty
      </label>
      <label><input name="q3" value="3" type="radio" class="input-radio" /> Opportunity </label>
      <label><input name="q3" value="4" type="radio" class="input-radio" /> Thrill </label>
    </div>

    <div class="form-group">
      <button type="submit" id="submit" class="submit-button">
        Submit
      </button>
    </div>
  </form>

  <!-- <body>
    <script src="https://cdn.freecodecamp.org/testable-projects-fcc/v1/bundle.js"></script>
  </body> -->

  </div>

</html>