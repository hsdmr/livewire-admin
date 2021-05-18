
function rangeCount(a,b,d1,d2,d3){
    var x = document.getElementById(a).value.length;
    document.getElementById(b).innerHTML = x;
    if(x<d1) document.getElementById(b).className="input-group-text";
    if(x>d1 && x<d2) document.getElementById(b).className="btn-warning input-group-text";
    if(x>d2 && x<d3) document.getElementById(b).className="btn-success input-group-text";
    if(x>d3) document.getElementById(b).className="btn-danger input-group-text";
}

