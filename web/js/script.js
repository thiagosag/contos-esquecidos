const FORM = document.querySelector('form');
const CAMPOS = document.querySelectorAll('.campo');

FORM.addEventListener('submit', function(event){
    for(let campo of CAMPOS){
        if(campo.value.trim() === ""){
            event.preventDefault(); // Se encarrega de previnir coisas nulas?
            campo.style.backgroundColor = "#ffe2e2e8";
            campo.style.color = "#570000ff";
            campo.focus();
            break;
        }
    }
});

for (let campo of CAMPOS){
    campo.addEventListener('input', () => {
        campo.style.backgroundColor = "";
        campo.style.color = "#000000";
    });
}
