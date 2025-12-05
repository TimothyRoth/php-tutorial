document.addEventListener("DOMContentLoaded", async () => {
 const response = await fetch('http://server.local/server.php', {
    headers: {
        "X-Api-Token": "123"
    }
 })

 const data = await response.text();
 
 document.querySelector(".show-response").innerHTML = data;

});