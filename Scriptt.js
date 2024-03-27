
function valorar(valor) 
{
    // Actualizar el valor de la valoración en el campo oculto
    document.getElementById("valoracion").value = valor;


    // Enviar el formulario
    document.getElementById("formulario").submit();
}

