const formulario = document.getElementById('formulario')
const nameapp = document.getElementById('id_nameapp')
const email = document.getElementById('id_email')
const asunto = document.getElementById('id_asunto')
const mensaje = document.getElementById('id_mensaje')
const boton = document.getElementById('boton')

formulario.addEventListener('submit', (e) => {
    e.preventDefault()
    e.stopPropagation()
    
    const data = new FormData(formulario)

    // if (!data.get('nameapp').trim()) {
    //     console.log('sin texto para el campo nombres')
    //     campoError(nameapp)
    //     return
    // }
    // else{
    //     campoValido(nameapp)
    // }

    // if (!data.get('email').trim()) {
    //     console.log('sin texto para el campo email')
    //     campoError(email)
    //     return
    // }
    // else{
    //     campoValido(email)
    // }

    // if (!data.get('asunto').trim()) {
    //     console.log('sin texto para el campo asunto')
    //     campoError(asunto)
    //     return
    // }
    // else{
    //     campoValido(asunto)
    // }

    // if (!data.get('mensaje').trim()) {
    //     console.log('sin texto para el campo mensaje')
    //     campoError(mensaje)
    //     return
    // }
    // else{
    //     campoValido(mensaje)
    // }

    console.log('Campos completados')
    fetch('php/contacto.php', {
        method: 'POST',
        body: data

    })
        .then(res => res.json())
        .then(datos => {
            console.log(datos)
            if (datos.error && datos.campo === 'nameapp') {
                campoError(nameapp)
                return
            }
            campoValido(nameapp)

            if (datos.error && datos.campo === 'email') {
                campoError(email)
                return
            }
            campoValido(email)

            if (datos.error && datos.campo === 'asunto') {
                campoError(asunto)
                return
            }
            campoValido(asunto)

            if (datos.error && datos.campo === 'mensaje') {
                campoError(mensaje)
                return
            }
            campoValido(mensaje)

            // validaciones adicionales por si falla mail o post
            if (datos.error && datos.campo === 'mail' || datos.error && datos.campo === 'post') {
                campoError(boton)
                return
            }

            if (!datos.error) {
                limpiarFormulario()
                campoValido(boton)
            }
        })
        .catch(e => console.log(e))
})

const campoError = (campo) => {
    campo.classList.add('is-invalid')
    campo.classList.remove('is-valid')
}


const campoValido = (campo) => {
    campo.classList.remove('is-invalid')
    campo.classList.add('is-valid')
}

const limpiarFormulario = () => {
    console.log('Mensaje enviado con éxito')
    formulario.reset()
    nameapp.classList.remove('is-valid')
    email.classList.remove('is-valid')
    asunto.classList.remove('is-valid')
    mensaje.classList.remove('is-valid')
}