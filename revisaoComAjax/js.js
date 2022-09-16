/*function confirma() {

    let salario = document.getElementById('salario').value;


    if (!parseInt(salario)) {
        document.write("<a href='index.php'><h3>Voltar</h3></a>")
        document.write("<h1>Salário tem que ter apenas números</h1>")
        
    }else if (salario <= 0) {
        
        document.write("<a href='index.php'><h3>Voltar</h3></a>")
        document.write("<h1>Salário tem que ser maior que 0</h1>")
        
    }
}*/

document.getElementById("enviar").onclick = function(e) {
    if ((parseFloat(document.getElementById("salario").value) <= 0) || document.getElementById("salario").value === "") {
        window.alert("Salário deve ser informado e maior que zero!");
        document.getElementById("salario").focus();
    } else {
        var xhttp = new XMLHttpRequest();
        xhttp.open("POST", "receba.php");
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("nome="+document.getElementById("nome").value
        +"&salario="+document.getElementById("salario").value
        +"&endereco="+document.getElementById("endereco").value);
        xhttp.onload = function() {
            document.getElementById("caixa").innerHTML = this.responseText;
        }
    }
};