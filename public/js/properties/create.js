'use strict';

( () => {
    window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
}) ();

// Establecer un máximo en el la longitud.
function maxlogStr (obj) {
    if (obj.value.length > obj.maxLength) {
        obj.value = obj.value.slice(0, obj.maxLength);
    }
}

// Funcion para asignar ID de Property en input para relacionar.
function getIdProperty (obj) {
    let property_id = document.querySelector('#property_id');
    let input = obj.dataset.idproperty;
    property_id.value = input;
}