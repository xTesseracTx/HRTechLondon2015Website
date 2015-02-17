/* Identification of User Agent */

    function BrwoserDetect() { 
     if(navigator.userAgent.indexOf("Chrome") != -1 ) 
    {
       
    }
    else if(navigator.userAgent.indexOf("Opera") != -1 )
    {
    
    }
    else if(navigator.userAgent.indexOf("Firefox") != -1 ) 
    {
 
    }
    else if((navigator.userAgent.indexOf("MSIE") != -1 ) || (!!document.documentMode == true ))
    {
      
    }  
	  else  if(navigator.userAgent.indexOf("Safari") != -1 ) 
    {
      alert('It looks like you are trying to browse our website with Safari. Some functions of this website are not compatible with this browser. Please use Google Chrome or Mozilla Firefox!'); 
    }  
    else 
    {
       alert('It looks like you are using an exotic browser. Some functions of our site are not compatible with this web browser. Please use Google Chrome or Mozilla Firefox!');
    }
    }
