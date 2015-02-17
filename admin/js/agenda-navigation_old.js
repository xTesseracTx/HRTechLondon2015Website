$(document).ready(function(){
    $('#day-selector').on('change', function() {
      if ( this.value == '0')
      {
        $("#Day1MainContainer").fadeIn();
	$("#Day2MainContainer").fadeIn();
      }
      else if ( this.value == '1')
      {
        $("#Day1MainContainer").fadeIn();
	    $("#Day2MainContainer").fadeOut()
      }
	  else if ( this.value == '2')
      {
        $("#Day1MainContainer").fadeOut();
		$("#Day2MainContainer").fadeIn()
      }
	 
    });
});
$(document).ready(function(){
    $('#session-selector').on('change', function() {
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
		
	$(".day1-no-event").fadeOut();
	$(".day2-no-event").fadeOut();
      }
      else if ( this.value == '1')
      {
        $(".MainStage").fadeIn();
	
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
		
	$(".day1-no-event").fadeOut();
	$(".day2-no-event").fadeOut();
      }
	  else if ( this.value == '2')
      {
        $(".MainStage").fadeOut();
	
	$(".HRShare").fadeIn();
	$(".FutureOfWork").fadeOut();
	$(".HRTech").fadeOut();
		
	$(".Compensation").fadeOut();
	$(".CloudTech").fadeOut();
	$(".HRAnalytics").fadeOut();
		
	$(".TalentAndRecruitment").fadeOut();
	$(".SocialCollaboration").fadeOut();
	$(".Labs").fadeOut();
	$(".RoundTable").fadeOut();
		
	$(".day1-no-event").fadeOut();
	$(".day2-no-event").fadeIn();
      }
	    else if ( this.value == '3')
      {
        $(".MainStage").fadeOut();
	
	$(".HRShare").fadeOut();
	$(".FutureOfWork").fadeIn();
	$(".HRTech").fadeOut();
		
	$(".Compensation").fadeOut();
	$(".CloudTech").fadeOut();
	$(".HRAnalytics").fadeOut();
		
	$(".TalentAndRecruitment").fadeOut();
	$(".SocialCollaboration").fadeOut();
	$(".Labs").fadeOut();
	$(".RoundTable").fadeOut();
		
	$(".day1-no-event").fadeOut();
	$(".day2-no-event").fadeIn();
      }
	   else if ( this.value == '4')
      {
        $(".MainStage").fadeOut();
	
	$(".HRShare").fadeOut();
	$(".FutureOfWork").fadeOut();
	$(".HRTech").fadeIn();
		
	$(".Compensation").fadeOut();
	$(".CloudTech").fadeOut();
	$(".HRAnalytics").fadeOut();
		
	$(".TalentAndRecruitment").fadeOut();
	$(".SocialCollaboration").fadeOut();
	$(".Labs").fadeOut();
	$(".RoundTable").fadeOut();
		
	$(".day1-no-event").fadeOut();
	$(".day2-no-event").fadeIn();
      }
	    else if ( this.value == '5')
      {
        $(".MainStage").fadeOut();
	
	$(".HRShare").fadeOut();
	$(".FutureOfWork").fadeOut();
	$(".HRTech").fadeOut();
		
	$(".Compensation").fadeIn();
	$(".CloudTech").fadeOut();
	$(".HRAnalytics").fadeOut();
		
	$(".TalentAndRecruitment").fadeOut();
	$(".SocialCollaboration").fadeOut();
	$(".Labs").fadeOut();
	$(".RoundTable").fadeOut();
		
	$(".day1-no-event").fadeIn();
	$(".day2-no-event").fadeOut();
      }
	    else if ( this.value == '6')
      {
        $(".MainStage").fadeOut();
	
	$(".HRShare").fadeOut();
	$(".FutureOfWork").fadeOut();
	$(".HRTech").fadeOut();
		
	$(".Compensation").fadeOut();
	$(".CloudTech").fadeIn();
	$(".HRAnalytics").fadeOut();
		
	$(".TalentAndRecruitment").fadeOut();
	$(".SocialCollaboration").fadeOut();
	$(".Labs").fadeOut();
	$(".RoundTable").fadeOut();
		
	$(".day1-no-event").fadeIn();
	$(".day2-no-event").fadeOut();
      }
	    else if ( this.value == '7')
      {
        $(".MainStage").fadeOut();
	
	$(".HRShare").fadeOut();
	$(".FutureOfWork").fadeOut();
	$(".HRTech").fadeOut();
		
	$(".Compensation").fadeOut();
	$(".CloudTech").fadeOut();
	$(".HRAnalytics").fadeIn();
		
	$(".TalentAndRecruitment").fadeOut();
	$(".SocialCollaboration").fadeOut();
	$(".Labs").fadeOut();
	$(".RoundTable").fadeOut();
		
	$(".day1-no-event").fadeIn();
	$(".day2-no-event").fadeOut();
      }
	   else if ( this.value == '8')
      {
        $(".MainStage").fadeOut();
	
	$(".HRShare").fadeOut();
	$(".FutureOfWork").fadeOut();
	$(".HRTech").fadeOut();
		
	$(".Compensation").fadeOut();
	$(".CloudTech").fadeOut();
	$(".HRAnalytics").fadeOut();
		
	$(".TalentAndRecruitment").fadeIn();
	$(".SocialCollaboration").fadeOut();
	$(".Labs").fadeOut();
	$(".RoundTable").fadeOut();
		
	$(".day1-no-event").fadeOut();
	$(".day2-no-event").fadeOut();
      }
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
	$(".SocialCollaboration").fadeIn();
	$(".Labs").fadeOut();
	$(".RoundTable").fadeOut();
		
	$(".day1-no-event").fadeOut();
	$(".day2-no-event").fadeOut();
      }
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
	$(".Labs").fadeIn();
	$(".RoundTable").fadeOut();
		
	$(".day1-no-event").fadeOut();
	$(".day2-no-event").fadeOut();
      }
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
	$(".RoundTable").fadeIn();
		
	$(".day1-no-event").fadeOut();
	$(".day2-no-event").fadeOut();
      }
    });
});