//https://developer.mozilla.org/en-US/docs/Web/API/Fetch_API/Using_Fetch

window.onload = () => {

    function activate(e) {
        var i,tabs;

        tabs = document.getElementsByClassName("links");

        for (i = 0; i < tabs.length; i++) {
          tabs[i].className = tabs[i].className.replace(" active", "");
        }

        e.currentTarget.className += " active";
    }

    document.getElementById("a_").addEventListener("click", (e) => {

        activate(e);

        var searchParams = new URLSearchParams();
        searchParams.append('action','tdisplay');
        searchParams.append('type', "A");

        fetch("../php/main.php", {
            method: 'POST' ,
            body: searchParams,
        }).then(response => {
            return response.text();
        }).then(data => {
            let table = document.querySelector(".table");
            table.innerHTML = data.trim();
        })
    });
    
    document.getElementById("o_").addEventListener("click", (e) => {

        activate(e);

        var searchParams = new URLSearchParams();
        searchParams.append('action','tdisplay');
        searchParams.append('type', "O");

        fetch("../php/main.php", {
            method: 'POST' ,
            body: searchParams,
        }).then(response => {
            return response.text();
        }).then(data => {
            let table = document.querySelector(".table");
            table.innerHTML = data.trim();
        })
    });

    document.getElementById("m_").addEventListener("click", (e) => {

        activate(e);

        var searchParams = new URLSearchParams();
        searchParams.append('action','tdisplay');
        searchParams.append('type', "M");

        fetch("../php/main.php", {
            method: 'POST' ,
            body: searchParams,
        }).then(response => {
            return response.text();
        }).then(data => {
            let table = document.querySelector(".table");
            table.innerHTML = data.trim();
        })
    });

    //Navigates to Create New Issue Page 
    document.getElementById("crbtn").addEventListener('click' , (e) => {
        window.location.href = "./newissue.php"
    });

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

    document.getElementById("a_").click(); // Clicks the ALL Button by Default 

    
}