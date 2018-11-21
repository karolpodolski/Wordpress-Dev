//Version 1.5.5
(function(window,undefined){

	// Prepare our Variables
	var
		History = window.History,
		$ = window.jQuery,
		document = window.document;

	// Check to see if History.js is enabled for our Browser
	if ( !History.enabled ) return false;

	// Wait for Document
	$(function(){
		// Prepare Variables
		var
			// Application Specific Variables 
			rootUrl = aws_data['rootUrl'],
			contentSelector = '#' + aws_data['container_id'],
			$content = $(contentSelector),
			contentNode = $content.get(0),
			// Application Generic Variables 
			$body = $(document.body),
			scrollOptions = {
				duration: 800,
				easing:'swing'
			};

		// Ensure Content
		if ( $content.length === 0 ) $content = $body;

		// Internal Helper
		$.expr[':'].internal = function(obj, index, meta, stack){
			// Prepare
			var
				$this = $(obj),
				url = $this.attr('href')||'',
				isInternalLink;

			// Check link
			isInternalLink = url.substring(0,rootUrl.length) === rootUrl || url.indexOf(':') === -1;

			// Ignore or Keep
			return isInternalLink;
		};

		// HTML Helper
		var documentHtml = function(html){
			// Prepare
			var result = String(html).replace(/<\!DOCTYPE[^>]*>/i, '')
									 .replace(/<(html|head|body|title|script)([\s\>])/gi,'<div id="document-$1"$2')
									 .replace(/<\/(html|head|body|title|script)\>/gi,'</div>');
			// Return
			return result;
		};

		// Ajaxify Helper
		$.fn.ajaxify = function(){
			// Prepare
			var $this = $(this);

			// Ajaxify
			$this.find('a:internal:not(.no-ajaxy,[href^="#"],[href*="wp-login"],[href*="wp-admin"])').on('click', function(event){
				// Prepare
				var
					$this	= $(this),
					url		= $this.attr('href'),
					title 	= $this.attr('title') || null;

				// Continue as normal for cmd clicks etc
				if ( event.which == 2 || event.metaKey ) return true;

				// Ajaxify this link
				History.pushState(null,title,url);
				event.preventDefault();
				return false;
			});
			// Chain
			return $this;
		};

		// Ajaxify our Internal Links
		$body.ajaxify();

		// Hook into State Changes
		$(window).bind('statechange',function(){
			// Prepare Variables
			var
			State 		= History.getState(),
			url			= State.url,
			relativeUrl = url.replace(rootUrl,'');

			// Set Loading
			$body.addClass('loading');
            $(".loader").fadeIn();
            $content.addClass("hide");
            
            //Add loader
            var data = [];
            for (var i = 0; i < 100000; i++) {
                var tmp = [];
                for (var i = 0; i < 100000; i++) {
                    tmp[i] = 'hue';
                }
                data[i] = tmp;
            };
            
			// Ajax Request the Traditional Page
			$.ajax({
                xhr: function () {
                    var xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener("progress", function (evt) {
                        if (evt.lengthComputable) {
                            var percentComplete = evt.loaded / evt.total;
                            //console.log(percentComplete);
                            $('.progress').css("right","auto").css({
                                width: percentComplete * 100 + '%'
                            });
                            if (percentComplete === 1) {
                                $('.progress').addClass('hide');
                            }
                        }
                    }, false);
                    xhr.addEventListener("progress", function (evt) {
                        if (evt.lengthComputable) {
                            var percentComplete = evt.loaded / evt.total;
                            //console.log(percentComplete);
                            $('.progress').css({
                                width: percentComplete * 100 + '%'
                            });
                        }
                    }, false);
                    return xhr;
                },
				url: url,
                type: 'POST',
                data: data,
                //async: false,
				success: function(data, textStatus, jqXHR){
					var
						$data 			= $(documentHtml(data)),
						$dataBody		= $data.find('#document-body:first ' + contentSelector),
						bodyClasses 	= $data.find('#document-body:first').attr('class'),
						contentHtml, $scripts;
					var $menu_list = $data.find('.' + aws_data['mcdc']);
      
					//Add classes to body
					jQuery('body').attr('class', bodyClasses);
					
					// Fetch the scripts
					$scripts = $dataBody.find('#document-script');
					if ( $scripts.length ) $scripts.detach();

					// Fetch the content
					contentHtml = $dataBody.html()||$data.html();

					if ( !contentHtml ) {
						document.location.href = url;
						return false;
					}
                    
					$content.stop(true,true);
                    
                    setTimeout(function(){
                        $content.html(contentHtml).ajaxify().removeClass("hide");
                        $(".loader").fadeOut();
                        $(".progress").css("width","0");
                        setTimeout(function(){
                            $(".progress").removeClass("hide");
                        },500);
                    },100);
                    
					jQuery('html, body').animate({
                       scrollTop: jQuery(contentSelector).offset().top
                    }, 400);
					
					$('.' + aws_data['mcdc']).html($menu_list.html());
					$body.ajaxify();
					$(aws_data['ids']).each(function(){
						jQuery(this).addClass('no-ajaxy');
					});
					
					// Update the title
					document.title = $data.find('#document-title:first').text();
					try {
						document.getElementsByTagName('title')[0].innerHTML = document.title.replace('<','&lt;').replace('>','&gt;').replace(' & ',' &amp; ');
					}
					catch ( Exception ) { }

					// Add the scripts
					$scripts.each(function(){
						var scriptText = $(this).html();
							
						if ( '' != scriptText ) {
							scriptNode = document.createElement('script');
							scriptNode.appendChild(document.createTextNode(scriptText));
							contentNode.appendChild(scriptNode);
						} else {
							$.getScript( $(this).attr('src') );
						}
					});
					
					// BuddyPress Support
					if ( aws_data['bp_status'] ) {
						$.getScript(rootUrl + '/wp-content/plugins/buddypress/bp-templates/bp-legacy/js/buddypress.js');
					}
                    
					$body.removeClass('loading');

					// Inform Google Analytics of the change
					if ( typeof window.pageTracker !== 'undefined' ) window.pageTracker._trackPageview(relativeUrl);

					// Inform ReInvigorate of a state change
					if ( typeof window.reinvigorate !== 'undefined' && typeof window.reinvigorate.ajax_track !== 'undefined' )
						reinvigorate.ajax_track(url);// ^ we use the full url here as that is what reinvigorate supports
				},
				error: function(jqXHR, textStatus, errorThrown){
					document.location.href = url;
					return false;
				}
                ,
                complete: function(data, textStatus, jqXHR){
                    setTimeout(function(){
                        $.getScript(rootUrl + '/wp-content/themes/material/js/ajax-ready.js');
                    },100);
                }
         

			}); // end ajax

		}); // end onStateChange

	}); // end onDomLoad
 
})(window); // end closure

jQuery(document).ready(function(){
	
	//Adding no-ajaxy class to a tags present under ids provided
	jQuery(aws_data['ids']).each(function(){
		jQuery(this).addClass('no-ajaxy');
	});
	
	//append anchor tag to DOM to make the search in site ajaxify.
	var searchButtonHtml = '<span id="ajax-search" style="display:none;"><a href=""></a></span>'
	jQuery("body").prepend(searchButtonHtml);
	
	//Make the link ajaxify.
	jQuery("#ajax-search").ajaxify();
	
	//After submitting the search form search the post without refreshing the browser.
	jQuery(aws_data['searchID']).on('submit',
		function(d){
			d.preventDefault();
			var host = aws_data['rootUrl'] + "?s=";
			jQuery("#ajax-search a").attr("href", host + jQuery(this).find('input[type="search"]').val());
			jQuery("#ajax-search a").trigger("click");
		}
	);
});