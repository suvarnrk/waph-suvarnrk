var shown=false;
function showhideEmail(){
	if(shown){
		document.getElementById('email').innerHTML="Show ny email";
		shown =false;
	}else{
		var myemail="<a href='mailto:suvarnrk"+"@"+"mail.uc.edu'>suvarnrk"+"@"+"mail.uc.edu</a>";
		document.getElementById('email').innerHTML=myemail;
		shown=true;
	}
}