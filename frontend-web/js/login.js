function doRequest(url) {
    let request = new XMLHttpRequest();
    request.open("GET", url, false);
    request.send();
    return request.responseText;
}
let submit = document.getElementById("submit");

//functino to call the back end to realize the login
function sendLogin() {
    let email = document.getElementById("email");
    let password = document.getElementById("password");

    let url = "http://localhost/fantasyproject/api/umburana2011/login/"+email.value+"/"+password.value;
    let request = doRequest(url);
    result = 'o';
    if(request == '{"status":"logado com sucesso","nick":"Didito"}'){
        result = JSON.parse(request);
    }
    
    //if seccessfully login
    if(result !== 'o'){
        if(result["status"] == "logado com sucesso"){
            console.log("logado com sucesso");
            console.log(request);
        }
    }
    //if the email is wrong
    if(request == "email invalido") {
        console.log("email invalido");
    }
    //if password is wrong
    if(request == ''){
        console.log("senha incorreta")
    }
    //if account is not verified
    if(request == 'not verified'){
        console.log("not verified")
    }
}

submit.addEventListener('click',sendLogin);