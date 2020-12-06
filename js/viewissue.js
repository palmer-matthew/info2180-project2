//https://developer.mozilla.org/en-US/docs/Web/API/Fetch_API/Using_Fetch

window.onload = () => {   
    
    var searchParams = new URLSearchParams();
    searchParams.append('action','viewmain');

    fetch("../php/main.php", {
        method: 'POST' ,
        body: searchParams,
    }).then(response => {
        return response.text();
    }).then(data => {
        let main = document.querySelector(".main");
        main.innerHTML = data.trim();

        document.querySelector(".close").addEventListener('click', function(event){

            var searchParams = new URLSearchParams();
            searchParams.append('action','updateissue');
            searchParams.append('status','closed');

            fetch("../php/main.php", {
                method: 'POST' ,
                body: searchParams,
            }).then(response => {
                return response.text();
            }).then(data => {
            
            })
        })

        document.querySelector(".inprog").addEventListener('click', function(event){

            var searchParams = new URLSearchParams();
            searchParams.append('action','updateissue');
            searchParams.append('status','inprogress');

            fetch("../php/main.php", {
                method: 'POST' ,
                body: searchParams,
            }).then(response => {
                return response.text();
            }).then(data => {

            })
        })
    })


    //The event listener for the LOGOUT List Item
    document.querySelector(".last").addEventListener('click', function(event){
        event.preventDefault();

        var searchParams1 = new URLSearchParams();
        searchParams1.append('action','logout');

        fetch("../php/main.php", {
            method: 'POST' ,
            body: searchParams1,
        }).then(response => {
            return response.text();
        }).then(data => {
            if(data.trim() == "LOG-OUT"){
                window.location.href = "../index.php";
            }
        })
    });

    
}