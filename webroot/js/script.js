function myFunction(form) {
    "use strict";
    window.alert("Vérifier que votre email est correct : " + form.mail.value);
    //document.getElementById("Form").action = "/action_page.php";
    //document.getElementById("demo").innerHTML = "The value of the action attribute was changed to /action_page.php.";
}

function addXP(form) {
    "use strict";
    var diplome = document.getElementById("table"), td = document.createElement("td"), p = document.createElement("p"), td2 = document.createElement("td"),
        tr = document.createElement("tr");
    p.appendChild(document.createTextNode(form.diplome.value));
    td.appendChild(p);
    td2.appendChild(document.createTextNode(form.date.value));
    tr.appendChild(td2);
    tr.appendChild(td);
    diplome.appendChild(tr);
    
    
}


