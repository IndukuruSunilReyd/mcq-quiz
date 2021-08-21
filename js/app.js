$(function(){
	var id = $("#hideV").val();
	var M = id+"-M";
	var S = id+"-S";
	function initializeClock(endtime) {
		var minutesSpan = document.getElementById('minutes');
		  var secondsSpan = document.getElementById('seconds');

		  function updateClock() {
		    var t = getTimeRemaining(endtime);
		    if(t.minutes >=0){
		    	m1  = ('0' + t.minutes).slice(-2);
		    	minutesSpan.innerHTML = m1
		    	sessionStorage.setItem(M,m1) 
		    }else{
		    	minutesSpan.innerHTML = 0 ;
		    }
		    if(t.seconds >=0){
		    	s1 = ('0' + t.seconds).slice(-2);
		    	secondsSpan.innerHTML = s1;
		    	sessionStorage.setItem(S,s1);
		    }else{
		    	secondsSpan.innerHTML = 0;
		    }
		    if (t.total <= 0) {
		      $("#quiz").submit();
		      clearInterval(timeinterval);
		      
		    }
		  }

		  updateClock();
		  var timeinterval = setInterval(updateClock, 1000);
		}
	function getTimeRemaining(endtime) {
		  var t = Date.parse(endtime) - Date.parse(new Date());
		  return {
		    'total': t,
		    'minutes': Math.floor((t / 1000 / 60) % 60),
		    'seconds':  Math.floor((t / 1000) % 60)
		  };
	}
	
	var Site_Root = location.protocol + '//' + location.host + "/";  
	if(location.host == 'localhost' || location.host == '192.168.43.67'){
		Site_Root +='QUIZ/';
    }
	
	var SM = sessionStorage.getItem(M);
	var SS = sessionStorage.getItem(S);
	if(SM == 00 && SS == 00 && ((id.split('-'))[3] == 2)){
		document.getElementById('minutes').innerText = SM;
		document.getElementById('seconds').innerText = SS;
	}else if(SM == 00 && SS == 00 && ((id.split('-'))[3] == 1)){
		document.getElementById('minutes').innerText = SM;
		document.getElementById('seconds').innerText = SS;
		window.location = Site_Root+"home.php?L=2"
	}else if ( SM && SS ) {
		 SM = parseInt(SM);
		 SS = parseInt(SS);
		 var d = new Date();
		 d.setMinutes(d.getMinutes()+SM,d.getSeconds() + SS);
		 var deadline = new Date(d);
		 initializeClock(deadline); 
	} else {
		var deadline = new Date(Date.parse(new Date()) + 10 * 60 * 1000);
		initializeClock(deadline); 
	}
})