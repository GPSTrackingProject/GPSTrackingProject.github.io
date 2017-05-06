function redirectTo(location)
{
     window.location=location;
}
function btnxemclick()
{
	//var soimei=document.getElementById("optionchonxe").val(); 	
	//redirectTo("quatring.php?imei="+soimei);
	var optionsoimei = document.getElementById("optionchonxe"),
    selectedNode = optionsoimei.options[optionsoimei.selectedIndex];
	var soimei=selectedNode.value;
	if (soimei=="0")
		alert("Chua chon xe");
	else
	redirectTo("quatrinh.php?imei="+soimei);
}
// them marker
function addMarker(location, biensoxe, tocdo, diadiem, capnhat) {
	flightArray.push(location);
	marker = new google.maps.Marker({ position: location, icon:image });
	var new_marker={marker:marker, biensoxe:biensoxe, tocdo:tocdo, diadiem:diadiem, capnhat:capnhat, latlng:location};
	markersArray.push(new_marker); 
	}
function showMarker() {
	if (markersArray) { 
	for (i in markersArray) { 
		markersArray[i]["marker"].setMap(map);
		var contentString = "Thông tin xe:<table><tr><td width= 150px>Biển số xe</td><td><strong>"+markersArray[i]["biensoxe"]+"</strong></td></tr><tr><td>Tốc độ</td><td><strong>"+markersArray[i]["tocdo"]+"</strong> km/h</td></tr><tr><td>Địa điểm</td><td>"+markersArray[i]["diadiem"]+"</td></tr><tr><td>Lần cập nhật cuối</td><td>"+markersArray[i]["capnhat"]+"</td></tr></table>";
		var marker_run=markersArray[i]["marker"];
		var infowindow = new google.maps.InfoWindow({
			content: contentString,
				maxWidth: 300,
				position: markersArray[i]["latlng"]
			});
	infowindow.open(map,marker_run);	
	google.maps.event.addListener(marker_run,'click', (function(marker_run,infowindow){ 
        return function() {
           infowindow.open(map,marker_run);
        };
    })(marker_run,infowindow)); 
}
 } 
 }
function clearOverlays(){
	 if (markersArray) {
		 for (i in markersArray) {
			 markersArray[i].setMap(null);
		 }
	 }
}