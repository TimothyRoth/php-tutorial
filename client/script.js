document.addEventListener("DOMContentLoaded", async () => {
 const response = await fetch('http://server.local/api/v1/customers/get', {
    headers: {
        "X-API-KEY": "demo123"
    }
 })

 const data = await response.json();

}); 