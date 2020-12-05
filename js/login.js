//https://developer.mozilla.org/en-US/docs/Web/API/Fetch_API/Using_Fetch
fetch("/main.php", {
    method: "POST",
    body: "action=login"
}).then(response => {
    document.body.innerHTML = response;
});