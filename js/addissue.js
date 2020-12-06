//https://developer.mozilla.org/en-US/docs/Web/API/Fetch_API/Using_Fetch

window.onload = () => {


    //Async Call for Assigned to drop down
    
    var searchParams1 = new URLSearchParams();
    searchParams1.append('action','cissueinputs');

    fetch("../php/main.php", {
        method: 'POST' ,
        body: searchParams1,
    }).then(response => {
        return response.text();
    }).then(data => {
        let selection = document.getElementById("assignto")
        selection.innerHTML = data.trim();
    })
    
    document.querySelector(".sbtn").addEventListener('click', function(event) {

        event.preventDefault();

        let title = false;
        let description = false;
        let $titlev = document.getElementById("title").value;
        let $desc = document.getElementById("description").value;
        let $type = document.getElementById("type").value;
        let $prior = document.getElementById("month").value;
        let $assign = document.getElementById("assignto").value;

        //Validation
        if($titlev.match(/^[A-Z][- a-zA-Z]+$/) == null || $titlev == null){
            document.getElementById("msg_b").innerHTML = "Oops, something's wrong (Check Title) - Please Try Again"
        }else{
            title = true;
        }

        if($desc.match(/\b((?!=|\,|\.).)+(.)\b/) == null || $desc == null){
            document.getElementById("msg_b").innerHTML = "Oops, something's wrong (Check Description) - Please Try Again"
        }else{
            description = true;
        }

        if($titlev.match(/^[A-Z][- a-zA-Z]+$/) == null && $desc.match(/\b((?!=|\,|\.).)+(.)\b/) == null){
            document.getElementById("msg_b").innerHTML = "Please Fill in Title/Description";
        }

        if(title == true && description == true){

            var searchParams = new URLSearchParams();
            searchParams.append('action', 'createissue');
            searchParams.append('title', $titlev);
            searchParams.append('desc', $desc);
            searchParams.append('type', $type);
            searchParams.append('prior', $prior);
            searchParams.append('assign', $assign);

            fetch("../php/main.php", {
                method: 'POST' ,
                body: searchParams,
            }).then(response => {
                return response.text();
            }).then(data => {
                alert("New Issue Recorded")
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