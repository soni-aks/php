var imageID=0;
function changeimage(every_seconds){
    //change the image
    if(!imageID){
        document.getElementById("myimage").src="aa.jpg";
        imageID++;
    }
    else{if(imageID==1){
        document.getElementById("myimage").src="bb.jpg";
        imageID++;
    }else{if(imageID==2){
        document.getElementById("myimage").src="cc.jpg";
        imageID++;
	}else{if(imageID==3){
		document.getElementById("myimage").src="dd.jpg";
		imageID++;
	}else{if(imageID==4){
		document.getElementById("myimage").src="4.jpg";
		imageID=0;
    }}}}}
    //call same function again for x of seconds
    setTimeout("changeimage("+every_seconds+")",((every_seconds)*1000));
}