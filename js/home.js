//https://developer.mozilla.org/en-US/docs/Web/API/Fetch_API/Using_Fetch

window.onload = () => {

    document.getElementById("a_").addEventListener("click", (e) => {

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
            alert(data);
            table.innerHTML = data.trim();
        })
    })
    
    document.getElementById("o_").addEventListener("click", (e) => {

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
            alert(data);
            // table.innerHTML = data.trim();
        })
    })

    document.getElementById("m_").addEventListener("click", (e) => {

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
            alert(data);
            // table.innerHTML = data.trim();
        })
    })

    //Navigates to Create New Issue Page 
    document.getElementById("crbtn").addEventListener('click' , (e) => {

        window.location.href = "./newissue.php"
    }) 

    document.getElementById("a_").click(); // Clicks the ALL Button by Default 
}