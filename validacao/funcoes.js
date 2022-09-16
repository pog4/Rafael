function mostramsg(msg) {
    document.getElementById("dMsg").innerHTML = msg; 
    setTimeout(() => {
       document.getElementById("dMsg").innerHTML = ""; 
    }, 3000);
}

function fValidaEmail(vemail) {    
    var re = /^[\w+.]+@\w+\.\w{2,}(?:\.\w{2})?$/;
     console.log(vemail," - ",re.test(vemail));
    return(re.test(vemail))
}

function fValida() {
    const vnome=document.getElementById("iNome");
    const vemail=document.getElementById("iEmail");
    const vfone=document.getElementById("iFone");
    var valido = true; //variavel para controlar validação

    //Verificar Nome foi preenchido
    if (vnome.value == "") {
        mostramsg("Nome é Obrigatório");
        vnome.focus();
        valido = false;
    } else if (vemail.value == "") { //Verificar e-mail foi preenchido
        mostramsg("e-mail é Obrigatório");
        vemail.focus();
        valido = false;
    } else if (!fValidaEmail(vemail.value)) {
        mostramsg("e-mail Inválido");
        vemail.focus();
        valido = false;
    } else if (vfone.value == "") { //Verificar Fone foi preenchido
        mostramsg("Fone é Obrigatório");
        vfone.focus();
        valido = false;
    }
    return(valido);
}