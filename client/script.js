document.addEventListener("DOMContentLoaded", async () => {

 const response = await fetch('http://server.local/api/v1/customers/get',
    {
        headers: {
            "X-Api-Key": "demo123"
        }
    }
 );
    const customers = await response.json();
    const container = document.querySelector(".customers");
 
    customers.forEach(element => {
        container.innerHTML += `
            <div class=customer>
                <p>Name: ${element.name}</p>
                <p>Email: ${element.email}</p>
            </div>
            <hr>
        `;
    });
});