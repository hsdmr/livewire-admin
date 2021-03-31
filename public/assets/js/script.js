
function rangeCount(a,b,d1,d2,d3){
    var x = document.getElementById(a).value.length;
    document.getElementById(b).innerHTML = x;
    if(x<d1) document.getElementById(b).className="pull-right input-group-text";
    if(x>d1 && x<d2) document.getElementById(b).className="pull-right text-warning input-group-text";
    if(x>d2 && x<d3) document.getElementById(b).className="pull-right text-success input-group-text";
    if(x>d3) document.getElementById(b).className="pull-right text-danger input-group-text";
}
