$(document).ready(function(){
	$('#ExpoMobileGroup').on('click', function () {
		if( $('#ExpoMobileGroupContent').css("display") == "none" ){
			$('#ExpoMobileGroup .fa-angle-right').css("display", "none");
			$('#ExpoMobileGroup .fa-angle-down').css("display", "inline-block");
		}
		if( $('#ExpoMobileGroupContent').css("display") == "block" ){
			$('#ExpoMobileGroup .fa-angle-right').css("display", "inline-block");
			$('#ExpoMobileGroup .fa-angle-down').css("display", "none");
		}
		$('#ExpoMobileGroupContent').slideToggle( "normal", function() {});
	});
	$('#PartnersMobileGroup').on('click', function () {
		if( $('#PartnersMobileGroupContent').css("display") == "none" ){
			$('#PartnersMobileGroup .fa-angle-right').css("display", "none");
			$('#PartnersMobileGroup .fa-angle-down').css("display", "inline-block");
		}
		if( $('#PartnersMobileGroupContent').css("display") == "block" ){
			$('#PartnersMobileGroup .fa-angle-right').css("display", "inline-block");
			$('#PartnersMobileGroup .fa-angle-down').css("display", "none");
		}
		$('#PartnersMobileGroupContent').slideToggle( "normal", function() {});
	});	
});