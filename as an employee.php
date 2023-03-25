<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>good to see u</title>
    <link rel="stylesheet" href="../helpingelements/css/as an employee.css">
</head>
<body>
    <form action="SEND ADDRESS" id="ft-form" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
        <fieldset>
          <legend>Job</legend>
          <label>
            Application for *
            <select name="Application for" required>
              <option>Job A</option>
              <option>Job B</option>
            </select>
          </label>
        </fieldset>
        <fieldset>
          <legend>Personal data</legend>
          <div class="two-cols">
            <label>
              First name *
              <input type="text" name="First name" required>
            </label>
            <label>
              Family name *
              <input type="text" name="Family name" required>
            </label>
          </div>
          <div class="two-cols">
            <label>
              Citizenship
              <input type="text" name="Citizenship">
            </label>
            <label>
              Date of birth
              <input type="date" name="Date of birth">
            </label>
          </div>
          <label>
            Address
            <input type="text" name="Address">
          </label>
          <div class="two-cols">
            <label>
              ZIP Code
              <input type="text" name="ZIP">
            </label>
            <label>
              City
              <input type="text" name="City">
            </label>
          </div>
          <div class="two-cols">
            <label>
              Phone *
              <input type="tel" name="Phone" required>
            </label>
            <label>
              Email address *
              <input type="email" name="Email" required>
            </label>
          </div>
        </fieldset>
        <fieldset>
          <legend>Application documents</legend>
          <input type="hidden" name="MAX_FILE_SIZE" value="10485760">
          <div class="two-cols">
            <label>
              Application letter
              <input type="file" name="Application letter" accept=".doc,.docx,.pdf">
            </label>
            <label>
              Curriculum vitae
              <input type="file" name="Curriculum vitae" accept=".doc,.docx,.pdf">
            </label>
          </div>
          <p>Possible file types: DOC, PDF. Maximum file size: 10 MB.</p>
        </fieldset>
        <div class="btns">
          <input type="text" name="_gotcha" value="" style="display:none;">
          <input type="submit" value="Submit application">
        </div>
      </form>
</body>
</html>