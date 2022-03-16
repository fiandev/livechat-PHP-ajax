
$('#root').append(`
<form class='container' enctype='multipart/form-data' id='form' target='' method='POST'>
        <div class='right-side'>
          <div class='containte'>
          <div class='login-card'>
            <label for='username'>username :</label>
              <input class='form-input' required id='username' name='username' type='text' placeholder='username' value=''>
              <label for='age'>age :</label>
              <input class='form-input' required name='age' type='number' id='age' placeholder='your age' value=''>
              <label for='avatar'>upload avatar :</label>
              <input class='form-input' name='avatar' type='file' id='avatar' placeholder='your age' value=''>
              <button name='submit' value='send' type='submit'>Next</button>
          </div>
          <div class='esf'>
           
          <p>© <year></year> | <a href='//localhost:5000'><domain>localhost:5000</domain></a></p>
        </div>
          </div>
        </div>
    </form>`);
 