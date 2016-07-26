champagne = do ($) ->
	# Reset for $ not being shorthand for jQuery
	$ = jQuery

	###
	UTILS
	###
	checkPage: (template) ->
		if $('body').hasClass "page-template-custom-#{ template }"
			return true
		else
			return false

jQuery(document).ready ->
	#