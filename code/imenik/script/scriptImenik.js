/**
 * Created by Luka Kadunc on 22. 03. 2017.
 */



function init() {

    var modal =document.getElementById('add-window');
}


function search() {
    var td;
    var input = document.getElementById("search");
    var filter = input.value.toUpperCase();
    var imenik = document.getElementById("imeniktable");
    var tr = imenik.getElementsByTagName("tr");

    for (var i = 0; i < tr.length; i++) {
        console.log("Iscemo"+filter);
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
            if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }

}


//Close modal window with click out of box
window.onclick = function(event) {
    var modal=document.getElementById('add-window');
    if (event.target == modal) {

       modal.style.display = "none";
    }
}

function closeAdd() {
    var modal=document.getElementById('add-window');
    modal.style.display = "none";
}

function openAdd() {
    var modal = document.getElementById('add-window');
    modal.style.display = "block";

}


function addContact(){
    const firstName = document.getElementById("first-name").value;
    const lastName = document.getElementById("last-name").value;
    const address = document.getElementById("address").value;
    const phoneNumber = document.getElementById("phone-number").value;

    if(firstName==""){
        document.getElementById("label").innerHTML = "Prosim vnesite ime!";
        return;
    }

    if(lastName==""){
        document.getElementById("label").innerHTML = "Prosim vnesite priimek!";
        return;
    }

    if(address==""){
        document.getElementById("label").innerHTML = "Prosim vnesite naslov!";
        return;
    }
    if(phoneNumber==""){
        document.getElementById("label").innerHTML = "Prosim vnesite številko!";
        return;
    }

    const table = document.getElementById("imeniktable");
    const row = table.insertRow(1);
    const cellName = row.insertCell(0);
    const cellLastname = row.insertCell(1);
    const cellAddress = row.insertCell(2);
    const cellPhone = row.insertCell(3);

    const contact ={
    firstName: firstName,
    lastName: lastName,
    address:address,
    phoneNumber:phoneNumber

    }



    cellName.innerHTML = contact.firstName;
    cellLastname.innerHTML = contact.lastName;
    cellAddress.innerHTML = contact.address;
    cellPhone.innerHTML = contact.phoneNumber;

    closeAdd();

}
/*
//remove tr
$(document).ready(function () {
    $("#imeniktable tr").dblclick(function () {
        $(this).remove();
       
    })
})
*/

//Drag and drop

function allowDrop(event){
    event.preventDefault();
}

function drag(event){
    event.dataTransfer.setData("text", event.target.id);
    
}

function drop(ev) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
    ev.target.appendChild(document.getElementById(data));
}



