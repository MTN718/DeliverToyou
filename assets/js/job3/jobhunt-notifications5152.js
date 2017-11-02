(function($) {
	$(function() {
		$(".email-jobs-top").click(function() {
			$(".job-alert-container-top .validation").addClass("hide");
			//$(".name-input-top").val('');
			$(".job-alert-container-top").slideToggle();
			return false;
		});
		
		$(".btn-close-job-alert-box").click(function() {
			$(".job-alert-container-top").slideToggle();
			return false;
		});
		
		$(".jobalert-submit").click(function() {
			$(".job-alert-container-top .validation").hide();
			$(".jobalert-submit").attr('disabled' , true);
			$(".jobalert-submit").html('<i class="icon-spinner8 icon-spin"></i>');
			var email = $(".email-input-top").val();
			// This one is removed
			var name =  $(".name-input-top").val();
			//var name = email;
			
			var frequency = $('input[name="alert-frequency"]:checked').val();
			if(typeof frequency == "undefined") {
				frequency = "never";
			}
			var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
			if ( re.test( email ) ) {
				$.ajax({
					"type"		: "POST",
					"url"		: jobhunt_notifications.ajax_url,
					"data"		: {
						"action"	: "jobhunt_create_job_alert",
						"email"		: email,
						"name"		: name,
						"frequency"	: frequency,
						"location"	: window.location.toString(),
						"security"	: jobhunt_notifications.security,
						"query"	: $(".jobs_query").text(),
					},	
					"dataType"	: "json",
					"success"	: function( response ) {
						if ( response.success == true ) {
							$(".job-alert-container-top .validation").removeClass("error").addClass("success").show();
							$(".job-alert-container-top .validation label").text(response.message);
//							setTimeout(function() {
//								$(".job-alert-container-top").addClass("hide");
//							}, 5000);
						} else {
							$(".job-alert-container-top .validation").removeClass("success").addClass("error").show();
							$(".job-alert-container-top .validation label").text(response.message);
						}
						$(".jobalert-submit").html('Submit');
						$(".jobalert-submit").removeAttr('disabled');
						$(".job-alert-container-top .validation").removeClass("hide");
					},
				});
			} else {
				$(".jobalert-submit").html('Submit');
				$(".jobalert-submit").removeAttr('disabled');
				$(".job-alert-container-top .validation").removeClass("hide");
				$(".job-alert-container-top .validation").addClass("error").show();
            }
			return false;
		});
	});
})(jQuery);

function jobhunt_dashboard_tab_load_job_alerts(tabid, type, admin_url, uid, pkg_array, page_id_all, tab_options) {
	var dataString = "cs_uid=" + uid + "&action=jobhunt_employer_jobalerts" + "&page_id_all=" + page_id_all;
	ajaxRequest = jQuery.ajax({
		type: "POST",
		url: admin_url,
		data: dataString,
		success: function (response) {alert("a");
			jQuery("#job-alerts").html(response);
			cs_change_dashboard_tab(tab_options);
		}
	});
}