function mostrarInputs() {
    const operacao = document.getElementById("operacao").value;
    const inputContainer1 = document.getElementById("inputContainer1");
    const inputContainer2 = document.getElementById("inputContainer2");

    if (operacao === "soma" || operacao === "subtracao" || operacao === "multiplicacao" || operacao === "divisao") {
        inputContainer1.style.display = "block";
        inputContainer2.style.display = "block";
    } else if (operacao === "raiz" || operacao === "sin" || operacao === "cos" || operacao == "troca" || operacao == "tan") {
        inputContainer1.style.display = "block";
        inputContainer2.style.display = "none";
    } else {
        inputContainer1.style.display = "none";
        inputContainer2.style.display = "none";
    }
}