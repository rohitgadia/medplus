var width;
$(window).resize(function(){
	width = $('.boxes').width();
	$('.shadow').css('width',width+1);
});
$(window).ready(function(){
	width = $('.boxes').width();
	$('.shadow').css('width',width+1);
});

// function preloader() {
// 	if (document.getElementById) {
// 		document.getElementsByClassName("Maternity_Homes").style.background = "url('http://medplus.dev/images/Maternity_Homes.jpg')";
// 		document.getElementsByClassName("Birth_Centers").style.background = "url('http://medplus.dev/images/Birth_Centers.jpg')";
// 		document.getElementsByClassName("Cancer_Hospitals").style.background = "url('http://medplus.dev/images/Cancer_Hospitals.jpg')";
// 		document.getElementsByClassName("General_Hospitals").style.background = "url('http://medplus.dev/images/General_Hospitals.jpg')";
// 		document.getElementsByClassName("Private_Eye_Hospitals").style.background = "url('http://medplus.dev/images/Private_Eye_Hospitals.jpg')";
// 		document.getElementsByClassName("Cardiology_Hospitals").style.background = "url('http://medplus.dev/images/Cardiology_Hospitals.jpg')";
// 		document.getElementsByClassName("Eye_Hospitals").style.background = "url('http://medplus.dev/images/Eye_Hospitals.jpg')";
// 		document.getElementsByClassName("Government_Eye_Hospitals").style.background = "url('http://medplus.dev/images/Government_Eye_Hospitals.jpg')";
// 		document.getElementsByClassName("Dialysis_Centres").style.background = "url('http://medplus.dev/images/Dialysis_Centres.jpg')";
// 		document.getElementsByClassName("Government_General_Hospitals").style.background = "url('http://medplus.dev/images/Government_General_Hospitals.jpg')";
// 		document.getElementsByClassName("Vitreo_Retinal_Surgeons").style.background = "url('http://medplus.dev/images/Vitreo_Retinal_Surgeons.jpg')";
// 		document.getElementsByClassName("Private_Hospitals").style.background = "url('http://medplus.dev/images/Private_Hospitals.jpg')";
// 		document.getElementsByClassName("Hospice_&_Palliative_Care").style.background = "url('http://medplus.dev/images/Hospice_&_Palliative_Care.jpg')";
// 		document.getElementsByClassName("IVF_Hospitals").style.background = "url('http://medplus.dev/images/IVF_Hospitals.jpg')";
// 		document.getElementsByClassName("Multi_Speciality_Hospitals").style.background = "url('http://medplus.dev/images/Multi_Speciality_Hospitals.jpg')";
// 		document.getElementsByClassName("Tuberculosis_Hospitals").style.background = "url('http://medplus.dev/images/Tuberculosis_Hospitals.jpg')";
// 		document.getElementsByClassName("Neurology_Hospitals").style.background = "url('http://medplus.dev/images/Neurology_Hospitals.jpg')";
// 		document.getElementsByClassName("Veterinary_Hospitals").style.background = "url('http://medplus.dev/images/Veterinary_Hospitals.jpg')";
// 		document.getElementsByClassName("Orthopaedic_Hospitals").style.background = "url('http://medplus.dev/images/Orthopaedic_Hospitals.jpg')";
// 		document.getElementsByClassName("Psychiatric_Hospitals").style.background = "url('http://medplus.dev/images/Psychiatric_Hospitals.jpg')";
// 	}
// }
// $(window).onload(funtion(e){
// 	addLoadEvent(preloader);
// });

