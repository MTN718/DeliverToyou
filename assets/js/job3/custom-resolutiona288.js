jQuery(document).ready(function($){
	if( jQuery('.navigation>ul').length != '' ) {
		jQuery('.navigation>ul').slicknav();
	}
    if($(".cs-content-holder").width() <= 720){
        $(".cs-content-holder").addClass('custom-styling')
    }
    if($(".cs-content-holder").width() <= 920){
        $(".hiring-holder").addClass('custom-styling-list')
    }
    if($(".cs-content-holder").width() <= 920){
        $(".recriutment-listing").addClass('custom-styling-employer')
    }
    if($(".jobs-detail-3").width() <= 920){
        $(".jobs-detail-3").addClass('custom-detail-page')
    }
    if($(".jobs-detail-4").width() <= 920){
        $(".jobs-detail-4").addClass('custom-detail-page-4')
    }
    if($(".page-section.jobs-detail-1").width() <= 920){
        $(".page-section.jobs-detail-1").addClass('custom-detail-page-1')
    }
    if($(".employer-contact-form").width() <= 300){
        $(".employer-contact-form").addClass('custom-captcha')
    }
    if($(".cs-profile").width() <= 920){
        $(".cs-profile").addClass('candidate-detail-custom')
    }
    if($(".profile-nav").width() <= 768){
        $(".profile-nav").addClass('candidate-custom-nav')
    }
    if($(".jobs-detail-listing").width() <= 768){
        $(".jobs-detail-listing").addClass('jobs-detial-listing-custom')
    }
    if($("#profile").width() <= 768){
        $("#profile").addClass('custom-img-detail')
    }
    if($("#cs_candidate").width() <= 768){
        $("#cs_candidate").addClass('custom-img-detail')
    }
    if($("#resume").width() <= 768){
        $("#resume").addClass('custom-img-detail')
    }
    if($("#shortlisted-job").width() <= 768){
        $("#shortlisted-job").addClass('custom-width-style')
    }
    if($("#applied-jobs").width() <= 768){
        $("#applied-jobs").addClass('custom-width-style')
    }
    if($(".cs-candidate-list").width() <= 600){
        $(".cs-candidate-list").addClass('custom-width-style')
    }
    if($("#jobs").width() <= 600){
        $("#jobs").addClass('custom-width-style')
    }  
});