/*Randomize sponsors :)*/
$(document).ready(function(){
    reorder();



function reorder() {
    var grp = $("#titanium-sponsors").children();
    var cnt = grp.length;

    var temp, x;
    for (var i = 0; i < cnt; i++) {
        temp = grp[i];
        x = Math.floor(Math.random() * cnt);
        grp[i] = grp[x];
        grp[x] = temp;
    }
    $(grp).remove();
    $("#titanium-sponsors").append($(grp));
}

function orderPosts() {
       
}
	
});
