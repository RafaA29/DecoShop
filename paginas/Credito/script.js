let boton = document.getElementById("icono");
let enlaces = document.getElementById("enlaces");
let contador = 0;

boton.addEventListener("click", function(e){
    e.preventDefault();
    if(contador==0){
        enlaces.className = ("enlaces dos")
        contador=1;
    }else{
        enlaces.classList.remove("dos")
        enlaces.className = ("enlaces uno")
        contador=0;
    }
})


async function obtenerToken() {
    const url = 'https://developers.syscom.mx/oauth/token';
    const params = new URLSearchParams({
        client_id: 'BlWC9o3a22eyw1ptvo2b6fXKvm37q648iYADlaJv',        // Reemplaza con tu client_id
        client_secret: 'TU_SECRET_CLIENT', // Reemplaza con tu client_secret
        grant_type: 'client_credentials'
    });

    try {
        const response = await fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: params
        });

        const data = await response.json();
        return data.access_token;  // Devuelve el token de acceso
    } catch (error) {
        console.error('Error al obtener el token:', error);
    }
}

async function obtenerProductos() {
    const token = await obtenerToken(); // Obtiene el token

    try {
        const response = await fetch('https://developers.syscom.mx/api/v1/productos', {
            method: 'GET',
            headers: {
                'Authorization': `Bearer ${token}` // Usa el token para la solicitud
            }
        });

        // Verifica si la respuesta es exitosa
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }

        const productos = await response.json();

        // Verifica que productos sea un array
        if (Array.isArray(productos)) {
            mostrarProductos(productos);
        } else {
            console.error('La respuesta no es un array:', productos);
        }
    } catch (error) {
        console.error('Error al obtener productos:', error);
    }
}
