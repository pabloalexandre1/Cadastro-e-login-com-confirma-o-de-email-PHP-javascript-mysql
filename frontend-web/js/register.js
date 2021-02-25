function doRequest(url) {
    let request = new XMLHttpRequest();
    request.open("GET", url, false);
    request.send();
    return request.responseText;
}

function sendRegister(){
    let nick = document.getElementById("username").value;
    let email  = document.getElementById("email").value;
    let cEmail = document.getElementById("confirmaemail").value;
    let password = document.getElementById("password").value;
    let cPassword = document.getElementById("confirmapassword").value;

    if(password === cPassword && email === cEmail && password !== '' && email !== ''){
        console.log("informações coerentes");
        let url = "http://localhost/fantasyproject/api/umburana2011/register/"+nick+"/"+email+"/"+password;
        let requestResult = doRequest(url);
        console.log(requestResult);
        if(requestResult == "nick invalido" || requestResult == "email invalido"){
            if(document.getElementById("errorspace").firstChild){
                document.getElementById("errorspace").firstChild.remove();
            }
            let errorText = requestResult;
            let erro = document.createElement("h4");
            erro.innerHTML = errorText;
            let append = document.getElementById("errorspace");
            erro.classList.add("bg-warning");
            append.append(erro);
        }

        if(requestResult == "usuario cadastrado com sucesso"){
            window.location.href = "successRegister.php";
        }
    }else{
        console.log("informações informadas incoerentes");
        alert("As suas informações estão incoerentes");
    }
}

let registerButton = document.getElementById("submit");
registerButton.addEventListener("click", sendRegister);