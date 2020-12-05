//https://developer.mozilla.org/en-US/docs/Web/API/Fetch_API/Using_Fetch

window.onload = () => {
        document.getElementById("log_btn").addEventListener("click", (click) => {

        click.preventDefault();
        
        if (document.getElementById("email_input").value.match(/^[a-zA-Z]+$/) === null || document.getElementById("pass_input").value.match(/^(?=.+[0-9])(?=.+[a-z])(?=.+[A-Z])([a-zA-Z0-9]+)$/) === null){

            document.getElementById("msgg").innerHTML="Please Enter a Valid Email & Password!!!"
        } else {
            
            fetch("../php/main.php" , {
                method: 'POST',
                headers: {
                    'Content-Type' : 'application/x-www-form-urlencoded'
                },
                body : "action=login&pswd=" + document.getElementById("pass_input").value + "&email=" + document.getElementById("email_input").value
            }).then(response => {
                return response.text();
            }).then(response => {
                window.location.href = "./home.php"
            })
            
        }

        })
    }