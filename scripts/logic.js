
var glo_tot=2;
var base = 31;
var linens_add = 6;
var total = 0;
var x=1;
var bed_nights = 0;
//var y=1;
var add_row = function(){
		var s = document.getElementsByName('arr'+1)[0].value;
		var e = document.getElementsByName('dep'+1)[0].value;
        var l=document.getElementsByName('linens'+1)[0].value;
	var row="<tr><td><input type=\"text\" name=\"first"+glo_tot+"\"/></td><td><input type=\"text\" name=\"last"+glo_tot+"\"/></td><td>\
	<select name=\"gender"+glo_tot+"\"><option value=\"m\">Male</option><option value=\"f\">Female</option>\
	</select></td><td><select name=\"arr"+glo_tot+"\">";
	if(s==14){
	var str="<option value=\"14\" selected=\"selected\">May 14th</option>\
	<option value=\"15\">May 15th</option>\
	<option value=\"16\">May 16th</option>\
	<option value=\"17\">May 17th</option></select></td><td>";
	}else if(s==15){
		var str="<option value=\"14\">May 14th</option>\
	<option value=\"15\" selected=\"selected\">May 15th</option>\
		<option value=\"16\">May 16th</option>\
	<option value=\"17\">May 17th</option></select></td><td>";
	}else if(s==16){
		var str="<option value=\"14\">May 14th</option>\
	<option value=\"15\">May 15th</option>\
	<option value=\"16\" selected=\"selected\">May 16th</option>\
		<option value=\"17\">May 17th</option></select></td><td>";
	}else if(s==17){
		var str="<option value=\"14\">May 14th</option>\
	<option value=\"15\">May 15th</option>\
	<option value=\"16\">May 16th</option>\
	<option value=\"17\" selected=\"selected\">May 17th</option></select></td><td>";
	
	}else{
	var str="	<option value=\"14\">May 14th</option>\
	<option value=\"15\">May 15th</option>\
	<option value=\"16\">May 16th</option>\
	<option value=\"17\">May 17th</option></select></td><td>"
	}
	row+=str;
	row +="<select name=\"dep"+glo_tot+"\" id=\"leaving\">";
    if(e==14){
	str_two="<option value=\"14\" selected=\"selected\">May 14th</option>\
	<option value=\"15\">May 15th</option>\
	<option value=\"16\">May 16th</option>\
	<option value=\"17\">May 17th</option>\
	<option value=\"18\">May 18th</option>\
	<option value=\"19\">May 19th</option>\
	<option value=\"20\">May 20th</option>\
	</select></td><td>";
    }else if(e==15){
        	str_two="<option value=\"14\">May 14th</option>\
	<option value=\"15\" selected=\"selected\">May 15th</option>\
	<option value=\"16\">May 16th</option>\
	<option value=\"17\">May 17th</option>\
	<option value=\"18\">May 18th</option>\
	<option value=\"19\">May 19th</option>\
	<option value=\"20\">May 20th</option>\
	</select></td><td>";
    }else if(e==16){
        	str_two="<option value=\"14\">May 14th</option>\
	<option value=\"15\">May 15th</option>\
	<option value=\"16\" selected=\"selected\">May 16th</option>\
	<option value=\"17\">May 17th</option>\
	<option value=\"18\">May 18th</option>\
	<option value=\"19\">May 19th</option>\
	<option value=\"20\">May 20th</option>\
	</select></td><td>";
    }else if(e==17){
        	str_two="<option value=\"14\">May 14th</option>\
	<option value=\"15\">May 15th</option>\
	<option value=\"16\">May 16th</option>\
	<option value=\"17\" selected=\"selected\">May 17th</option>\
	<option value=\"18\">May 18th</option>\
	<option value=\"19\">May 19th</option>\
	<option value=\"20\">May 20th</option>\
	</select></td><td>";
    }else if(e==18){
        	str_two="<option value=\"14\">May 14th</option>\
	<option value=\"15\">May 15th</option>\
	<option value=\"16\">May 16th</option>\
	<option value=\"17\">May 17th</option>\
	<option value=\"18\" selected=\"selected\">May 18th</option>\
	<option value=\"19\">May 19th</option>\
	<option value=\"20\">May 20th</option>\
	</select></td><td>";
    }else if(e==19){
        	str_two="<option value=\"14\">May 14th</option>\
	<option value=\"15\">May 15th</option>\
	<option value=\"16\">May 16th</option>\
	<option value=\"17\">May 17th</option>\
	<option value=\"18\" >May 18th</option>\
	<option value=\"19\" selected=\"selected\">May 19th</option>\
	<option value=\"20\">May 20th</option>\
	</select></td><td>";
    }else if(e==20){
        	str_two="<option value=\"14\">May 14th</option>\
	<option value=\"15\">May 15th</option>\
	<option value=\"16\">May 16th</option>\
	<option value=\"17\">May 17th</option>\
	<option value=\"18\">May 18th</option>\
	<option value=\"19\">May 19th</option>\
	<option value=\"20\" selected=\"selected\">May 20th</option>\
	</select></td><td>";
    }else{
        	str_two="<option value=\"14\">May 14th</option>\
	<option value=\"15\">May 15th</option>\
	<option value=\"16\">May 16th</option>\
	<option value=\"17\">May 17th</option>\
	<option value=\"18\">May 18th</option>\
	<option value=\"19\">May 19th</option>\
	<option value=\"20\">May 20th</option>\
	</select></td><td>";
    }
	row +=str_two;
	
	row +="<select name=\"linens"+glo_tot+"\">";
	if(l==1){
	var str="<option value=\"0\">No</option><option value=\"1\" selected=\"selected\">Yes</option></select>";
    }else{
	var str="<option value=\"0\">No</option><option value=\"1\">Yes</option></select>";
	}
	row+=str;
	row+="</td><td><select name=\"occ"+glo_tot+"\">\
	<option value=\"2\">Double</option><option value=\"1\">Alone</option></select></td><td><select name=\"disab"+glo_tot+"\"><option value=\"no\">No</option><option value=\"yes\">Yes</option></select></td><td><select name=\"role"+glo_tot+"\"><option value=\"competitor\">Competitor</option><option value=\"chaperone\">Chaperone</option><option value=\"noncompetitor\">Non Competitor</option></td><td> <div id=\"day"+glo_tot+"\"></div></td>";


	$("#beds").append(row);
	var number_rows = parseInt(document.getElementById('total_rows').value);
	number_rows+=1
	$('#total_rows').val(number_rows);
	glo_tot++;
}
var rem_row = function(){

}
var get_price = function(){
	for(x; x<glo_tot; x++){
		var cost=0;
		var b = 0;
if(document.getElementsByName('first'+x)[0]!='undefined'){
	if(document.getElementsByName('first'+x)[0].value!=""){
		b++;
		if(document.getElementsByName('linens'+x)[0].value==1){
			cost+=36;
		}else{
			cost+=31;
		}
		if(document.getElementsByName('occ'+x)[0].value == '1'){
			cost *=2;
		}
		var days = document.getElementById('day'+x).innerHTML;
		console.log(days);
		b*=days;
		bed_nights+=b;
		cost *=days;
		total +=cost;
	}
}
	}
	//var previous=document.getElementById("database_cost").innerHTML;
	//var true_total=parseInt(total)+parseInt(previous);
	//$('#full_cost').text(true_total);
	$('#price_in').text(total);
	$('#full_price').val(total);
	$('#total_beds').text(bed_nights);
	total = 0;
	bed_nights=0;
	x=1;
	//get_days();
}
var get_days = function(){
	for(y=1;y<glo_tot; y++){
		var s = document.getElementsByName('arr'+y)[0].value;
		var e = document.getElementsByName('dep'+y)[0].value;
		/*console.log('s:'+s);
		console.log('e'+e);*/
		var set =  s-e;
		//console.log('set: '+set);
		set = Math.abs(set);
		//document.getElementsByName('days'+x)[0].value=set;
		//console.log('abs: '+set);
		var divs = '#day'+y;
		//console.log(divs);
		$(divs).text(set);

	}
}
$(document).click(function() {
   get_price();
   
});
window.onload = function(){
    document.onkeypress = function(e){
        get_price();
        // do something with key
    };
};
    /*document.getElementById('leaving').addEventListener('change',function(){
                 get_price();
            });*/
$(document).click(function(){
	get_days();
});
$(document).ready(function() {
 $('.editname').editable('updaters/name.php', { 
     type   : 'textarea',
     submit : 'OK',
     onblur : 'submit'
 });
  $('.editgender').editable('updaters/gender.php', { 
     data   : " {'m':'Male','f':'Female'}",
     type   : 'select',
     submit : 'OK',
     onblur : 'submit' 
 });
  $('.editarrive').editable('updaters/arrive.php', { 
     data   : " {'14':'May 14th','15':'May 15th','16':'May 16th','17':'May 17th'}",
     type   : 'select',
     submit : 'OK',
     onblur : 'submit' 
 });
  $('.editdepart').editable('updaters/depart.php', { 
     data   : " {'14':'May 14th','15':'May 15th','16':'May 16th','17':'May 17th','18':'May 18th','19':'May 19th','20':'May 20th'}",
     type   : 'select',
     submit : 'OK',
     onblur : 'submit' 
 });
  $('.editlinens').editable('updaters/linens.php', { 
     data   : " {'0':'No','1':'Yes'}",
     type   : 'select',
     submit : 'OK',
     onblur : 'submit'
 });
  $('.editocc').editable('updaters/occ.php', { 
     data   : " {'2':'Double','1':'Alone'}",
     type   : 'select',
     submit : 'OK',
     onblur : 'submit'
 });
  $('.editdis').editable('updaters/dis.php', { 
     data   : " {'no':'No','yes':'Yes'}",
     type   : 'select',
     submit : 'OK',
     onblur : 'submit' 
 });
  $('.editrole').editable('updaters/role.php', { 
     data   : " {'competitor':'Competitor','chaperone':'Chaperone','noncompetitor':'Non Competitor'}",
     type   : 'select',
     submit : 'OK',
     onblur : 'submit' 
 });
 
 
 });
