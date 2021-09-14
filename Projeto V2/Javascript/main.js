function validate(user, pass){
    var usuario = user


    if(usuario != "admin"){
        alert("passou o user");
        window.location.assign("telaInicial.html");
    }else{
        alert("Favor inserir usuário ou senha válidos");
    }

    

    
}

function recovery(){
    window.location.assign("Index.html");
    
}

function logout(){
    window.location.assign("Index.html");
}