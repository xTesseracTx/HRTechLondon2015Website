
/* Day Selector dropdown function */
$(document).ready(function(){
    $('#day-selector').on('change', function() {
      /* if the "Day1 & Day2" option is selected, show the sessions of both days */
	  if ( this.value == '0'){
		$("#Day1MainContainer").fadeIn();
		$("#Day2MainContainer").fadeIn();
      
	  /* if the "Day1" option is selected, show the sessions of Day1 only */
	  }else if ( this.value == '1'){
        $("#Day1MainContainer").fadeIn();
	    $("#Day2MainContainer").fadeOut()
		
	  /* if the "Day2" option is selected, show the sessions of Day2 only */
      }else if ( this.value == '2') {
        $("#Day1MainContainer").fadeOut();
		$("#Day2MainContainer").fadeIn()
      }
	 
    });	
	
});

/* Session Selector dropdown function. this.value represents the chosen session which is FADED IN (shown), the rest are faded out (hidden).
	The day1-no-event and day2-no-event represent unique sessions: those are shown only if there are no sessions on the chosen stage.
	
Value = Session
0 = Whole Day. Every session are shown on both days.
1 = Main Stage
2 = HR Shared Services & Payroll. DAY1 only.
3 = Future of Workforce Learning. DAY1 only.
4 = HR Technology. DAY1 only.
5 = Compensation & Benefits. DAY2 only.
6 = Cloud Technology. DAY2 only.
7 = HR Analytics. DAY2 only.
8 = Talent & Recruitment Technology
9 = Social Collaboration
10=	Labs & Executive Briefings
11= Round Table
12= User Adoption
13 = ProductDemo

*/
$(document).ready(function(){
    $('#session-selector').on('change', function() {
      /* All Sessions are selected */
	  if ( this.value == '0')
      {
        $(".MainStage").fadeIn();
		$(".HRShare").fadeIn();
		$(".FutureOfWork").fadeIn();
		$(".HRTech").fadeIn();
		$(".Compensation").fadeIn();
		$(".CloudTech").fadeIn();
		$(".HRAnalytics").fadeIn();
		$(".TalentAndRecruitment").fadeIn();
		$(".SocialCollaboration").fadeIn();
		$(".Labs").fadeIn();
		$(".RoundTable").fadeIn();
		$(".UserAdoption").fadeIn();
		$(".ProductDemo").fadeIn();
		$(".day1-no-event").fadeOut();
		$(".day2-no-event").fadeOut();
      }
	  
	  /* "Main Stage" is selected */
      else if ( this.value == '1')
      {
        $(".MainStage").fadeIn(); /* selected */
		$(".HRShare").fadeOut();
		$(".FutureOfWork").fadeOut();
		$(".HRTech").fadeOut();
		$(".Compensation").fadeOut();
		$(".CloudTech").fadeOut();
		$(".HRAnalytics").fadeOut();
		$(".TalentAndRecruitment").fadeOut();
		$(".SocialCollaboration").fadeOut();
		$(".Labs").fadeOut();
		$(".RoundTable").fadeOut();
		$(".ProductDemo").fadeOut();
		$(".UserAdoption").fadeOut();
		$(".day1-no-event").fadeOut();
		$(".day2-no-event").fadeOut();
      }
	  
	  /* "HR Shared Services & Payroll" is selected. DAY1 only. */
	  else if ( this.value == '2')
      {
        $(".MainStage").fadeOut();
		$(".HRShare").fadeIn();		/* selected */
		$(".FutureOfWork").fadeOut();
		$(".HRTech").fadeOut();
		$(".Compensation").fadeOut();
		$(".CloudTech").fadeOut();
		$(".HRAnalytics").fadeOut();
		$(".TalentAndRecruitment").fadeOut();
		$(".SocialCollaboration").fadeOut();
		$(".Labs").fadeOut();
		$(".RoundTable").fadeOut();
		$(".UserAdoption").fadeOut();
		$(".ProductDemo").fadeOut();
		$(".day1-no-event").fadeOut();
		$(".day2-no-event").fadeIn();
      }
	  
	  /* "Future of Workforce Learning" is selected. DAY1 only. */
	    else if ( this.value == '3')
      {
        $(".MainStage").fadeOut();
		$(".HRShare").fadeOut();
		$(".FutureOfWork").fadeIn();		/* selected */
		$(".HRTech").fadeOut();
		$(".Compensation").fadeOut();
		$(".CloudTech").fadeOut();
		$(".HRAnalytics").fadeOut();
		$(".TalentAndRecruitment").fadeOut();
		$(".SocialCollaboration").fadeOut();
		$(".Labs").fadeOut();
		$(".RoundTable").fadeOut();
		$(".ProductDemo").fadeOut();
		$(".UserAdoption").fadeOut();
		$(".day1-no-event").fadeOut();
		$(".day2-no-event").fadeIn();
      }
	   
	  /* "HR Technology" is selected. DAY1 only. */
	  else if ( this.value == '4')
      {
        $(".MainStage").fadeOut();
		$(".HRShare").fadeOut();
		$(".FutureOfWork").fadeOut();
		$(".HRTech").fadeIn();			/* selected */
		$(".Compensation").fadeOut();
		$(".CloudTech").fadeOut();
		$(".HRAnalytics").fadeOut();
		$(".TalentAndRecruitment").fadeOut();
		$(".SocialCollaboration").fadeOut();
		$(".Labs").fadeOut();
		$(".RoundTable").fadeOut();
		$(".UserAdoption").fadeOut();
		$(".ProductDemo").fadeOut();
		$(".day1-no-event").fadeOut();
		$(".day2-no-event").fadeIn();
      }
	  
	  /* "Compensation & Benefits" is selected. DAY2 only. */
	  else if ( this.value == '5')
      {
        $(".MainStage").fadeOut();
		$(".HRShare").fadeOut();
		$(".FutureOfWork").fadeOut();
		$(".HRTech").fadeOut();
		$(".Compensation").fadeIn(); 	/* selected */
		$(".CloudTech").fadeOut();
		$(".HRAnalytics").fadeOut();
		$(".TalentAndRecruitment").fadeOut();
		$(".SocialCollaboration").fadeOut();
		$(".Labs").fadeOut();
		$(".RoundTable").fadeOut();
		$(".UserAdoption").fadeOut();
		$(".ProductDemo").fadeOut();
		$(".day1-no-event").fadeIn();
		$(".day2-no-event").fadeOut();
      }
	  
	  /* "Cloud Technology" is selected. DAY2 only. */
	  else if ( this.value == '6')
      {
        $(".MainStage").fadeOut();
		$(".HRShare").fadeOut();
		$(".FutureOfWork").fadeOut();
		$(".HRTech").fadeOut();
		$(".Compensation").fadeOut();
		$(".CloudTech").fadeIn();		/* selected */
		$(".HRAnalytics").fadeOut();
		$(".TalentAndRecruitment").fadeOut();
		$(".SocialCollaboration").fadeOut();
		$(".Labs").fadeOut();
		$(".RoundTable").fadeOut();
		$(".UserAdoption").fadeOut();
		$(".ProductDemo").fadeOut();
		$(".day1-no-event").fadeIn();
		$(".day2-no-event").fadeOut();
      }
	  
	  /* "HR Analytics" is selected. DAY2 only. */
	  else if ( this.value == '7')
      {
        $(".MainStage").fadeOut();
		$(".HRShare").fadeOut();
		$(".FutureOfWork").fadeOut();
		$(".HRTech").fadeOut();
		$(".Compensation").fadeOut();
		$(".CloudTech").fadeOut();
		$(".HRAnalytics").fadeIn();		/* selected */
		$(".TalentAndRecruitment").fadeOut();
		$(".SocialCollaboration").fadeOut();
		$(".Labs").fadeOut();
		$(".RoundTable").fadeOut();
		$(".UserAdoption").fadeOut();
		$(".ProductDemo").fadeOut();
		$(".day1-no-event").fadeIn();
		$(".day2-no-event").fadeOut();
      }
	  
	  /* "Talent & Recruitment Technology" is selected. */
	  else if ( this.value == '8')
      {
        $(".MainStage").fadeOut();
		$(".HRShare").fadeOut();
		$(".FutureOfWork").fadeOut();
		$(".HRTech").fadeOut();
		$(".Compensation").fadeOut();
		$(".CloudTech").fadeOut();
		$(".HRAnalytics").fadeOut();
		$(".TalentAndRecruitment").fadeIn();  /* selected */
		$(".SocialCollaboration").fadeOut();
		$(".Labs").fadeOut();
		$(".RoundTable").fadeOut();
		$(".UserAdoption").fadeOut();
		$(".ProductDemo").fadeOut();
		$(".day1-no-event").fadeOut();
		$(".day2-no-event").fadeOut();
      }
	  
	  /* "Social Collaboration" is selected. */
	  else if ( this.value == '9')
      {
        $(".MainStage").fadeOut();
		$(".HRShare").fadeOut();
		$(".FutureOfWork").fadeOut();
		$(".HRTech").fadeOut();
		$(".Compensation").fadeOut();
		$(".CloudTech").fadeOut();
		$(".HRAnalytics").fadeOut();
		$(".TalentAndRecruitment").fadeOut();
		$(".SocialCollaboration").fadeIn();		/* selected */
		$(".Labs").fadeOut();
		$(".RoundTable").fadeOut();
		$(".UserAdoption").fadeOut();
		$(".ProductDemo").fadeOut();
		$(".day1-no-event").fadeOut();
		$(".day2-no-event").fadeOut();
      }
	  
	  /* "Labs & Executive Briefings" is selected. */
	  else if ( this.value == '10')
      {
        $(".MainStage").fadeOut();
		$(".HRShare").fadeOut();
		$(".FutureOfWork").fadeOut();
		$(".HRTech").fadeOut();
		$(".Compensation").fadeOut();
		$(".CloudTech").fadeOut();
		$(".HRAnalytics").fadeOut();
		$(".TalentAndRecruitment").fadeOut();
		$(".SocialCollaboration").fadeOut();
		$(".Labs").fadeIn();					/* selected */
		$(".RoundTable").fadeOut();
		$(".UserAdoption").fadeOut();
		$(".ProductDemo").fadeOut();
		$(".day1-no-event").fadeOut();
		$(".day2-no-event").fadeOut();
      }
	  
	  /* "Round Table" is selected. */
	    else if ( this.value == '11')
      {
        $(".MainStage").fadeOut();
		$(".HRShare").fadeOut();
		$(".FutureOfWork").fadeOut();
		$(".HRTech").fadeOut();
		$(".Compensation").fadeOut();
		$(".CloudTech").fadeOut();
		$(".HRAnalytics").fadeOut();
		$(".TalentAndRecruitment").fadeOut();
		$(".SocialCollaboration").fadeOut();
		$(".Labs").fadeOut();
		$(".RoundTable").fadeIn();		/* selected */
		$(".UserAdoption").fadeOut();
		$(".ProductDemo").fadeOut();
		$(".day1-no-event").fadeOut();
		$(".day2-no-event").fadeOut();
      }
	  
	  /* "User Adoption" is selected. */
	  else if ( this.value == '12')
      {
        $(".MainStage").fadeOut();
		$(".HRShare").fadeOut();
		$(".FutureOfWork").fadeOut();
		$(".HRTech").fadeOut();
		$(".Compensation").fadeOut();
		$(".CloudTech").fadeOut();
		$(".HRAnalytics").fadeOut();
		$(".TalentAndRecruitment").fadeOut();
		$(".SocialCollaboration").fadeOut();
		$(".Labs").fadeOut();
		$(".RoundTable").fadeOut();
		$(".UserAdoption").fadeIn();		/* selected */
		$(".ProductDemo").fadeOut();
		$(".day1-no-event").fadeOut();
		$(".day2-no-event").fadeIn();
      } 
	  
	  /* "Product Demo" is selected. */
	  else if ( this.value == '13')
      {
        $(".MainStage").fadeOut();
		$(".HRShare").fadeOut();
		$(".FutureOfWork").fadeOut();
		$(".HRTech").fadeOut();
		$(".Compensation").fadeOut();
		$(".CloudTech").fadeOut();
		$(".HRAnalytics").fadeOut();
		$(".TalentAndRecruitment").fadeOut();
		$(".SocialCollaboration").fadeOut();
		$(".Labs").fadeOut();
		$(".RoundTable").fadeOut();
		$(".UserAdoption").fadeOut();		
		$(".ProductDemo").fadeIn(); /* selected */
		$(".day1-no-event").fadeOut();
		$(".day2-no-event").fadeIn();
      } 
    });
});

/* 
Hour Selector dropdown function. Each value represents an Hour. 
The sessions for the selected hour are FADED IN (shown), the rest are FADED OUT (hidden).

Value = Hour
0 = Whole day. Sessions for all hours are shown.
1 = 7:00AM
2 = 8:00AM
3 = 9:00AM
4 = 10:00AM
5 = 11:00AM
6 = 12:00PM
7 = 1:00PM
8 = 2:00PM
9 = 3:00PM
10= 4:00PM

*/
$(document).ready(function(){
    $('#hour-selector').on('change', function() {
      if ( this.value == '0')
      {
	$(".SevenAM").fadeIn();
	$(".EightAM").fadeIn();
	$(".NineAM").fadeIn();
	$(".TenAM").fadeIn();
	$(".ElevenAM").fadeIn();
	$(".TwelvePM").fadeIn();
	$(".OnePM").fadeIn();
	$(".TwoPM").fadeIn();
	$(".ThreePM").fadeIn();
	$(".FourPM").fadeIn();
      }
      else if ( this.value == '1')
      {
	$(".SevenAM").fadeIn();
	$(".EightAM").fadeOut();
	$(".NineAM").fadeOut();
	$(".TenAM").fadeOut();
	$(".ElevenAM").fadeOut();
	$(".TwelvePM").fadeOut();
	$(".OnePM").fadeOut();
	$(".TwoPM").fadeOut();
	$(".ThreePM").fadeOut();
	$(".FourPM").fadeOut();
      }
      else if ( this.value == '2')
      {
	$(".SevenAM").fadeOut();
	$(".EightAM").fadeIn();
	$(".NineAM").fadeOut();
	$(".TenAM").fadeOut();
	$(".ElevenAM").fadeOut();
	$(".TwelvePM").fadeOut();
	$(".OnePM").fadeOut();
	$(".TwoPM").fadeOut();
	$(".ThreePM").fadeOut();
	$(".FourPM").fadeOut();
      }
      else if ( this.value == '3')
      {
	$(".SevenAM").fadeOut();
	$(".EightAM").fadeOut();
	$(".NineAM").fadeIn();
	$(".TenAM").fadeOut();
	$(".ElevenAM").fadeOut();
	$(".TwelvePM").fadeOut();
	$(".OnePM").fadeOut();
	$(".TwoPM").fadeOut();
	$(".ThreePM").fadeOut();
	$(".FourPM").fadeOut();
      }
      else if ( this.value == '4')
      {
	$(".SevenAM").fadeOut();
	$(".EightAM").fadeOut();
	$(".NineAM").fadeOut();
	$(".TenAM").fadeIn();
	$(".ElevenAM").fadeOut();
	$(".TwelvePM").fadeOut();
	$(".OnePM").fadeOut();
	$(".TwoPM").fadeOut();
	$(".ThreePM").fadeOut();
	$(".FourPM").fadeOut();
      }
      else if ( this.value == '5')
      {
	$(".SevenAM").fadeOut();
	$(".EightAM").fadeOut();
	$(".NineAM").fadeOut();
	$(".TenAM").fadeOut();
	$(".ElevenAM").fadeIn();
	$(".TwelvePM").fadeOut();
	$(".OnePM").fadeOut();
	$(".TwoPM").fadeOut();
	$(".ThreePM").fadeOut();
	$(".FourPM").fadeOut();
      }
      else if ( this.value == '6')
      {
	$(".SevenAM").fadeOut();
	$(".EightAM").fadeOut();
	$(".NineAM").fadeOut();
	$(".TenAM").fadeOut();
	$(".ElevenAM").fadeOut();
	$(".TwelvePM").fadeIn();
	$(".OnePM").fadeOut();
	$(".TwoPM").fadeOut();
	$(".ThreePM").fadeOut();
	$(".FourPM").fadeOut();
      }
      else if ( this.value == '7')
      {
	$(".SevenAM").fadeOut();
	$(".EightAM").fadeOut();
	$(".NineAM").fadeOut();
	$(".TenAM").fadeOut();
	$(".ElevenAM").fadeOut();
	$(".TwelvePM").fadeOut();
	$(".OnePM").fadeIn();
	$(".TwoPM").fadeOut();
	$(".ThreePM").fadeOut();
	$(".FourPM").fadeOut();
      }
      else if ( this.value == '8')
      {
	$(".SevenAM").fadeOut();
	$(".EightAM").fadeOut();
	$(".NineAM").fadeOut();
	$(".TenAM").fadeOut();
	$(".ElevenAM").fadeOut();
	$(".TwelvePM").fadeOut();
	$(".OnePM").fadeOut();
	$(".TwoPM").fadeIn();
	$(".ThreePM").fadeOut();
	$(".FourPM").fadeOut();
      }
      else if ( this.value == '9')
      {
	$(".SevenAM").fadeOut();
	$(".EightAM").fadeOut();
	$(".NineAM").fadeOut();
	$(".TenAM").fadeOut();
	$(".ElevenAM").fadeOut();
	$(".TwelvePM").fadeOut();
	$(".OnePM").fadeOut();
	$(".TwoPM").fadeOut();
	$(".ThreePM").fadeIn();
	$(".FourPM").fadeOut();
      }
      else if ( this.value == '10')
      {
	$(".SevenAM").fadeOut();
	$(".EightAM").fadeOut();
	$(".NineAM").fadeOut();
	$(".TenAM").fadeOut();
	$(".ElevenAM").fadeOut();
	$(".TwelvePM").fadeOut();
	$(".OnePM").fadeOut();
	$(".TwoPM").fadeOut();
	$(".ThreePM").fadeOut();
	$(".FourPM").fadeIn();
      }       
    });
});