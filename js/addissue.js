//https://developer.mozilla.org/en-US/docs/Web/API/Fetch_API/Using_Fetch

window.onload = () => {


    // //Async Call for Assigned to drop down
    
    // var searchParams = new URLSearchParams();
    // searchParams.append('action','cissueinputs');
    // //searchParams.append('type', "");

    // fetch("../php/main.php", {
    //     method: 'POST' ,
    //     body: searchParams,
    // }).then(response => {
    //     return response.text();
    // }).then(data => {
    //     let selection = document.getElementById("assignto")
    //     selection.innerHTML = data.trim();
    // })



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