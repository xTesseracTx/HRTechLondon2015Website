$( document ).ready(function() {
$("#VideoLeftArrowContainer").addClass("InvisibleArrow");
});	
function moveLeft() {
  $("#VideoSlider").addClass("MoveLeft");
  $("#VideoSlider").removeClass("MoveRight");

  $("#VideoRightArrowContainer").addClass("InvisibleArrow");
  $("#VideoLeftArrowContainer").removeClass("InvisibleArrow");

}
function moveRight() {
  $("#VideoSlider").addClass("MoveRight");
  $("#VideoSlider").removeClass("MoveLeft");

  $("#VideoLeftArrowContainer").addClass("InvisibleArrow");
  $("#VideoRightArrowContainer").removeClass("InvisibleArrow");
}  