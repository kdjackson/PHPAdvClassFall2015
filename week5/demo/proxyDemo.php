<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <style type="text/css">
            textarea {
                width: 500px;
                height: 100px;
            }
            
            textarea[name="results"] {
                 height: 300px;
            }
        </style>
        
        <h1>Rest API Demo</h1>
        
        Verb/HTTP Method:<br />
        <select name="verb">
            <option value="GET">GET</option>
            <option value="POST">POST</option>
            <option value="PUT">PUT</option>
            <option value="DELETE">DELETE</option>
        </select>
        <br />
        <br />
        Resource for endpoint:<br />
        <input name="resource" value="address" />
        <br />
        <br />
        Data(optional):<br />   
        fullname <input type="text" name="fullname" value="" />
        <br />
        email <input type="email" name="email" value="" />
        <br />
        addressline1 <input type="text" name="addressline1" value="" />
        <br />
        city <input type="text" name="city" value="" />
        <br />
        state <input type="text" name="state" list="states" placeholder="Find U.S. State">
        <br />
        zip <input type="number" pattern="[0-9]*" maxlength="5" min="0" name="zip">
        <br />
        birthday <input type="date" name="birthday">
        <br />
        <br />
        <button>Make Call</button>
        <h3>Results</h3>
        
        <textarea name="results"></textarea>
        
        <script type="text/javascript">
        
            var callBtn = document.querySelector('button');
            
            callBtn.addEventListener('click', makeCall);
        
            function makeCall() {
                var verbfield = document.querySelector('select[name="verb"]');
                var verb = verbfield.options[verbfield.selectedIndex].value;
                var resource = document.querySelector('input[name="resource"]').value;
                var data = {
                    'fullname' : document.querySelector('input[name="fullname"]').value,
                    'email' : document.querySelector('input[name="email"]').value,
                    'addressline1' : document.querySelector('input[name="addressline1"]').value,
                    'city' : document.querySelector('input[name="city"]').value,
                    'state' : document.querySelector('input[name="state"]').value,
                    'zip' : document.querySelector('input[name="zip"]').value,
                    'birthday' : document.querySelector('input[name="birthday"]').value
                };            
                var results = document.querySelector('textarea[name="results"]');

                var xmlhttp = new XMLHttpRequest();

                var url = './api/v1/' + resource;

                xmlhttp.open(verb, url, true);

                xmlhttp.onreadystatechange = function() {
                    if (xmlhttp.readyState === 4 ) {

                        console.log(xmlhttp.responseText);
                        results.value = xmlhttp.responseText;
                    } else {
                        // waiting for the call to complete
                    }
                };
                //var username = 'test';
               // xmlhttp.setRequestHeader("Authorization", "Basic " + btoa(username + ":"));

                 if ( verb === 'GET' ) {
                      xmlhttp.send(null);
                 } else {
                    xmlhttp.setRequestHeader('Content-type','application/json;charset=UTF-8');
                    xmlhttp.send(JSON.stringify(data));
                }
            }
        </script>
        
        
        

    <datalist id="states">
        <option value="Alabama">
        <option value="Alaska">
        <option value="Arizona">
        <option value="Arkansas">
        <option value="California">
        <option value="Colorado">
        <option value="Connecticut">
        <option value="Delaware">
        <option value="Florida">
        <option value="Georgia">
        <option value="Hawaii">
        <option value="Idaho">
        <option value="Illinois">
        <option value="Indiana">
        <option value="Iowa">
        <option value="Kansas">
        <option value="Kentucky">
        <option value="Louisiana">
        <option value="Maine">
        <option value="Maryland">
        <option value="Massachusetts">
        <option value="Michigan">
        <option value="Minnesota">
        <option value="Mississippi">
        <option value="Missouri">
        <option value="Montana">
        <option value="Nebraska">
        <option value="Nevada">
        <option value="New Hampshire">
        <option value="New Jersey">
        <option value="New Mexico">
        <option value="New York">
        <option value="North Carolina">
        <option value="North Dakota">
        <option value="Ohio">
        <option value="Oklahoma">
        <option value="Oregon">
        <option value="Pennsylvania">
        <option value="Rhode Island">
        <option value="South Carolina">
        <option value="South Dakota">
        <option value="Tennessee">
        <option value="Texas">
        <option value="Utah">
        <option value="Vermont">
        <option value="Virginia">
        <option value="Washington">
        <option value="West Virginia">
        <option value="Wisconsin">
        <option value="Wyoming">
    </datalist>
        
    </body>
</html>
