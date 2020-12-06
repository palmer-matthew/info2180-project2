//https://developer.mozilla.org/en-US/docs/Web/API/Fetch_API/Using_Fetch

window.onload = () => {
        document.getElementById("log_btn").addEventListener("click", (click) => {

            click.preventDefault();

            let pass = false;
            let email = false;

            let passv = document.getElementById("pass_input").value;
            let emailv = document.getElementById("email_input").value;

            
            //Find a regex for email validation 
            if (emailv.match(/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/) == null ||  emailv == null){
                document.getElementById("msgg").innerHTML= "Please Enter a Valid Email !!!";
            }else{
                email = true;
            }

            if (passv.match(/^(?=.+[a-z])(?=.+[A-Z])(?=.+[0-9])([a-zA-Z0-9]+)$/) == null || passv == null){
                document.getElementById("msgg").innerHTML="Please Enter a Valid Password!!!"
            }else{
                pass = true;
            }

            if(pass == false && email == false){
                document.getElementById("msgg").innerHTML= "Please Enter a Valid Password And Email!!!";
            }

            
            if(pass == true && email == true ){
                var searchParams = new URLSearchParams();
                searchParams.append('action','login');
                searchParams.append('email', emailv);
                searchParams.append('pswd', passv);

                fetch("../php/main.php" , {
                    method: 'POST',
                    body : searchParams,
                }).then(response => {
                    return response.text();
                }).then(data => {
                    alert(data);
                    if(data == "SL"){
                        window.location.href = "./home.php";
                    }else{
                        document.getElementById("msgg").innerHTML = data.trim();
                    }
                })
                
            }

        })
    }