const queryString = window.location.search;

const loginState = new URLSearchParams(queryString).get('login');

const cadastrationState = new URLSearchParams(queryString).get('cadastro');

if(loginState != null){
    alert(loginState);
} else if (cadastrationState != null){
    alert(cadastrationState);
}

function recovery(){
    window.location.assign("Index.php");
}

function logout(){
    $(document).ready(function(){
        $('#sair').click('php/logout.php')
    })
}

//Products below


function start(){
    divState = sessionStorage.getItem('divState');
    productsShow(divState);
    modButton(sessionStorage.getItem('btnState'));
    alert(btnState);

}
function limpa(){
    document.getElementsByTagName('input').value('')
}



function productsShow(state){


    if(state == "search"){
        var div = document.getElementById('searchProd');
        var otherdiv= document.getElementById('modProducts');
        var SomeOtherDiv= document.getElementById('addInventory');

        div.style.visibility = 'visible';
        otherdiv.style.visibility = 'hidden';
        SomeOtherDiv.style.visibility = 'hidden';

        sessionStorage.setItem('divState', 'search');

    } else if (state == "addProduct"){
        var div = document.getElementById('searchProd');
        var otherdiv= document.getElementById('modProducts');
        var SomeOtherDiv= document.getElementById('addInventory');

        div.style.visibility = 'hidden';
        otherdiv.style.visibility = 'visible';
        SomeOtherDiv.style.visibility = 'hidden';

        sessionStorage.setItem('divState', 'addProduct');
    }
    else if(state == "addInventory") {
        var div = document.getElementById('searchProd');
        var otherdiv= document.getElementById('modProducts');
        var SomeOtherDiv= document.getElementById('addInventory');

        div.style.visibility = 'hidden';
        otherdiv.style.visibility = 'hidden';
        SomeOtherDiv.style.visibility = 'visible';

        sessionStorage.setItem('divState', 'addInventory');

        
    } else{
        var div = document.getElementById('searchProd');
        var otherdiv= document.getElementById('modProducts');
        var SomeOtherDiv= document.getElementById('addInventory');

        div.style.visibility = 'hidden';
        otherdiv.style.visibility = 'hidden';
        SomeOtherDiv.style.visibility = 'hidden';

        sessionStorage.setItem('divState', '');
    }
}

/*Purchase commands*/
function Purchase(){
    window.addEventListener('keydown', function (e) {

        switch(e.key){
            case "Escape":
                e.preventDefault();
                window.location.assign("./php/unset.php");
                break;
            case "F1":
                e.preventDefault();
                showProd("add");
                
                break;
            case "F2":
                e.preventDefault();
                showProd("dell");
                
                break;
            case "F3":
                e.preventDefault();
                showProd("payMethod");
                break;
            case "F4":
                e.preventDefault();
                showProd("clientCad");
                break;
            case "F5":
                e.preventDefault();
                showProd("clientAdd");
                break;
            case "F6":
                e.preventDefault();
                showProd("discount");
                break;
            case "F7":
                e.preventDefault();
                showProd("close");
                break;
                
        }
      }, false);
}


var call = 0;
function showProd(caso){
    
    if(call <= 0){
        call ++;
        document.getElementById('purchase-screen').style.visibility = "visible";
        switch(caso){
        case "add":
            document.getElementById('purchase-add').style.visibility = "visible";
            break;
        case "dell":
            document.getElementById('purchase-delete').style.visibility = "visible";
            break;
        case "payMethod":
            document.getElementById('purchase-payMethod').style.visibility = "visible";
            document.getElementById('valorCliente').style.visibility = "visible";
            break;
        case "clientCad":
            document.getElementById('purchase-clientCad').style.visibility = "visible";
            break;
        case"clientAdd":
            document.getElementById('purchase-clientAdd').style.visibility = "visible";
            break;
        case "discount":
            document.getElementById('purchase-discount').style.visibility = "visible";
            break;
        case "close":
            window.location.assign("./php/purchase.php?submit=close");
            break;
        }   
    } else {
        call --;
        document.getElementById('purchase-screen').style.visibility = "hidden";
        document.getElementById('purchase-add').style.visibility = "hidden";
        document.getElementById('purchase-delete').style.visibility = "hidden";
        document.getElementById('purchase-payMethod').style.visibility = "hidden";
        document.getElementById('purchase-clientCad').style.visibility = "hidden";
        document.getElementById('purchase-clientAdd').style.visibility = "hidden";
        document.getElementById('purchase-discount').style.visibility = "hidden";
        document.getElementById('valorCliente').style.visibility = "hidden";
       
    }
    
    console.log(call);
}

function change(type){
    switch (type){
        case "credito":
            document.getElementById('lblValCli').innerHTML = 'Qtd Parcelas';
            document.getElementById('valorCliente').style.visibility = "visible";
            break;
        case "dinheiro":
            document.getElementById('lblValCli').innerHTML = 'Valor Pago';
            document.getElementById('valorCliente').style.visibility = "visible";
            break;
        case "debito":
            document.getElementById('lblValCli').innerHTML = '   ';
            document.getElementById('valorCliente').style.visibility = "hidden";
            break;
    }
        
}




function graphicDraw() {

    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        theme: "light2",
        title:{
            text: "Vendas no mês"
        },
        data: [{        
            type: "line",
              indexLabelFontSize: 16,
            dataPoints: [
                { y: 450 },
                { y: 414},
                { y: 520, indexLabel: "\u2191 highest",markerColor: "red", markerType: "triangle" },
                { y: 460 },
                { y: 450 },
                { y: 500 },
                { y: 480 },
                { y: 480 },
                { y: 410 , indexLabel: "\u2193 lowest",markerColor: "DarkSlateGrey", markerType: "cross" },
                { y: 500 },
                { y: 480 },
                { y: 700 }
            ]
        }]
    });
    chart.render();
    
    }

function editUserPanel(){
    var camp = document.getElementById('7Func');
        camp.disabled = false;
        camp = document.getElementById('8Func');
        camp.disabled = false;

}
