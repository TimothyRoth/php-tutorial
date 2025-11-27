document.addEventListener("DOMContentLoaded", async () => {
 fetch('http://server.local/server.php', {
    headers: {
        "X-Api-Token": "123"
    }
 })
    .then(res => res.text())
    .then(console.log)
    .catch(console.error);
});