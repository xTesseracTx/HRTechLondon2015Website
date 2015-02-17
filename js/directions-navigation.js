/* Navigation between the information shown on the Logistics page */
/* Desktop */
$('#Plane').click(function(e){    
    $('#DirectionsByTubeDesktop, #DirectionsByRailDesktop, #DirectionsByCarDesktop, #DirectionsByCableCarDesktop, #DirectionsByBoatDesktop').fadeOut('slow', function(){
        $('#DirectionsByPlaneDesktop').fadeIn('slow');
    });
});

$('#Tube').click(function(e){    
    $(' #DirectionsByPlaneDesktop, #DirectionsByRailDesktop, #DirectionsByCarDesktop, #DirectionsByCableCarDesktop, #DirectionsByBoatDesktop').fadeOut('slow', function(){
        $('#DirectionsByTubeDesktop').fadeIn('slow');
    });
});
$('#Rail').click(function(e){    
    $(' #DirectionsByPlaneDesktop, #DirectionsByTubeDesktop, #DirectionsByCarDesktop, #DirectionsByCableCarDesktop, #DirectionsByBoatDesktop').fadeOut('slow', function(){
        $('#DirectionsByRailDesktop').fadeIn('slow');
    });
});
$('#Car').click(function(e){    
    $(' #DirectionsByPlaneDesktop, #DirectionsByTubeDesktop, #DirectionsByRailDesktop, #DirectionsByCableCarDesktop, #DirectionsByBoatDesktop').fadeOut('slow', function(){
        $('#DirectionsByCarDesktop').fadeIn('slow');
    });
});

$('#CableCar').click(function(e){    
    $(' #DirectionsByPlaneDesktop, #DirectionsByTubeDesktop, #DirectionsByRailDesktop, #DirectionsByCarDesktop, #DirectionsByBoatDesktop').fadeOut('slow', function(){
        $('#DirectionsByCableCarDesktop').fadeIn('slow');
    });
});

$('#Boat').click(function(e){    
    $(' #DirectionsByPlaneDesktop, #DirectionsByTubeDesktop, #DirectionsByRailDesktop, #DirectionsByCarDesktop, #DirectionsByCableCarDesktop').fadeOut('slow', function(){
        $('#DirectionsByBoatDesktop').fadeIn('slow');
    });
});
/* END Desktop*/

/* Mobile */
	/* reset active state of tabs-contents */
		$('#DirectionsByPlane').removeClass("active");
		$('#DirectionsByTube').removeClass("active");
		$('#DirectionsByRail').removeClass("active");
		$('#DirectionsByCar').removeClass("active");
		$('#DirectionsByCableCar').removeClass("active");
		$('#DirectionsByBoat').removeClass("active");
	/* END: reset active state of tabs-contents */

    $('#DirectionsByPlaneButton').click(function() {
		$('#DirectionsByPlane').fadeIn("slow");
		$('#DirectionsByTube, #DirectionsByRail, #DirectionsByCar, #DirectionsByCableCar, #DirectionsByBoat').fadeOut("slow");
	});
	$('#DirectionsByTubeButton').click(function() {
		$('#DirectionsByTube').fadeIn("slow");
		$('#DirectionsByPlane, #DirectionsByRail, #DirectionsByCar, #DirectionsByCableCar, #DirectionsByBoat').fadeOut("slow");
	});
	
	$('#DirectionsByRailButton').click(function() {
		$('#DirectionsByRail').fadeIn("slow");
		$('#DirectionsByPlane, #DirectionsByTube, #DirectionsByCar, #DirectionsByCableCar, #DirectionsByBoat').fadeOut("slow");
	});

	$('#DirectionsByCarButton').click(function() {
		$('#DirectionsByCar').fadeIn("slow");
		$('#DirectionsByPlane, #DirectionsByTube, #DirectionsByRail, #DirectionsByCableCar, #DirectionsByBoat').fadeOut("slow");
	});

	$('#DirectionsByCableCarButton').click(function() {
		$('#DirectionsByCableCar').fadeIn("slow");
		$('#DirectionsByPlane, #DirectionsByTube, #DirectionsByRail, #DirectionsByCar, #DirectionsByBoat').fadeOut("slow");
	});

	$('#DirectionsByBoatButton').click(function() {
		$('#DirectionsByBoat').fadeIn("slow");
		$('#DirectionsByPlane, #DirectionsByTube, #DirectionsByRail, #DirectionsByCar, #DirectionsByCableCar').fadeOut("slow");
	});

/* END Mobile */
