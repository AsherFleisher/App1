function ajax(a) {
    
    var action = a;
    var data = new FormData();
    data.append("page", action);

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("ajax").innerHTML = this.responseText;
        }
    };
    xhttp.open("POST", "lumberAPI.php", true);
    xhttp.send(data);
}
