
//XHR Object variable
function ajaxRequest(method, url, async, data, callback){

	var request = new XMLHttpRequest();
	request.open(method,url,async);
	
	if(method == "POST"){
		request.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
	}
	
	request.onreadystatechange = function(){
		if (request.readyState == 4) {
			if (request.status == 200) {
				var response = request.responseText;
				callback(response);
			} else {
                //Add error handling
				console.log("Error:" + request.statusText);	
			}
		}
	}
	
	request.send(data);
}

//Process the result and display the table
function processResult(response) {
	var box = document.getElementById("box");
	box.innerHTML = response;	
}

//Log in button
function submit(){
    var log = document.getElementById('user').value;
	var pass = document.getElementById('pass').value;
	
	if( log && pass !=""){
		var url = "login.php";
		var data = "username="+log+"&password="+pass;
		ajaxRequest("POST",url,true,data,hideLogin);
	
	}
	else{
		alert("Please enter your username and password.")
	}
}

//Check the input values are true
//If the values are true, the result will send to process
function hideLogin(response){
	var log = document.getElementById('user').value;
	var pass = document.getElementById('pass').value;

	if(response.trim() === '666'){
		alert('Your username or your password is wrong.');
		
	}
	else{
		
		document.getElementById('container').style.display = "none";
		var web = "table.php";
		var file = "username="+log+"&password="+pass;
		ajaxRequest("POST",web,true,file,processResult);

		document.getElementById('kotak').style.display="block";
		//Copy the username to the title
		document.getElementById("head").innerHTML = log;
		document.getElementById('head').style.display="block";
		document.getElementById('lout').style.display="block";
	}
}

//Log out the page
function kill_session() {
   window.location.reload();
}

function showExtra(){
	
	var url = "extra.php";
	ajaxRequest("POST",url,true,"",popExtra);
	
}

function popExtra(response){
	var add = document.getElementById("add");
	add.innerHTML = response;
}

window.onload = function(){
	var lis = document.getElementsByTagName("td");

    for (var i=0;i<lis.length;i++){
        var item = lis[i];
        item.onmouseover = showExtra;
        item.onmouseout = hideDetails;
    }
};

function hideDetails(){
    document.getElementById("add").style.display = "none"; 
}
	
    
/* Add the town*/
function processTown(response) {
	
	if(response.trim() === '888'){
		alert('This town already in the table!');
	}
	else{
		alert('Add successfully.');
	}

	var box = document.getElementById("boxx");
	box.innerHTML = response;	
}

function addTowns(){
	var select = document.getElementById('towns').value;
	var log = document.getElementById('user').value;

	var web = "addTown.php";
	var file = "username="+log+"&town="+select;
	ajaxRequest("POST",web,true,file,processTown);
}