//https://developer.mozilla.org/en-US/docs/Web/API/Fetch_API/Using_Fetch

window.onload = () => {

    //Validation For New User on Submit button 
    document.querySelector(".sbtn").addEventListener('click', function(event) {
        event.preventDefault();

        let $fname = false;
        let $lname = false;
        let $pass = false;
        let $email = false;

        let $fnamev = document.getElementById("f_name").value;
        let $lnamev = document.getElementById("l_name").value;
        let $passv = document.getElementById("passwd").value;
        let $emailv = document.getElementById("e_mail").value;

        //Individual input validation

        if($fnamev.match(/^[A-Z][-a-zA-Z]+$/) == null || $fnamev == null){
            document.getElementById("msg_a").innerHTML = "First Name Invalid - Try Again (No spaces)"
        }else{
            $fname = true; 
        }

        if($lnamev.match(/^[A-Z][a-zA-Z]+$/) == null || $lnamev == null){
            document.getElementById("msg_a").innerHTML = "Last Name Invalid - Try Again (No spaces)"
        }else{
            $lname = true; 
        }

        if ($emailv.match(/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/) == null ||  $emailv == null){
            document.getElementById("msg_a").innerHTML = "Please Enter a Valid Email !";
        }else{
            $email = true;
        }

        if ($passv.match(/^(?=.+[a-z])(?=.+[A-Z])(?=.+[0-9])$/) == null || $passv == null){
            document.getElementById("msg_a").innerHTML ="Please Enter a Valid Password!"
        }else{
            $pass = true;
        }

        if($fname == false && $lname == false && $pass == false && $email == false){
            document.getElementById("msg_a").innerHTML= "Oops, something's wrong - Please Try Again";
        }

        if($fname == true && $lname == true && $pass == true && $email == true){
            
            var searchParams = new URLSearchParams();
            searchParams.append('action','adduser');
            searchParams.append('fname', $fnamev);
            searchParams.append('lname', $lnamev);
            searchParams.append('pswd', $passv);
            searchParams.append('email', $emailv);

            fetch("./php/main.php", {
                method: 'POST' ,
                body: searchParams,
            }).then(response => {
                response.text();
            }).then(data => {
                if(data == "SA"){
                    window.location.href = "./pages/home.php";
                }else{
                    document.getElementById("msg_a").innerHTML = data.trim()
                }
            })
        }
    })

    //The event listener for the LOGOUT List Item
    document.querySelector(".last").addEventListener('click', function(event){
        event.preventDefault();

        var searchParams = new URLSearchParams();
        searchParams.append('action','logout');

        fetch("../php/main.php", {
            method: 'POST' ,
            body: searchParams,
        }).then(response => {
            return response.text();
        }).then(data => {
            if(data.trim() == "LOG-OUT"){
                window.location.href = "../index.php";
            }
        })
    });
}