<script type="text/javascript">
	(function ($) {

		function newPaginateObj()
		{
			var paginate = {
				init: function (paginateId) {
					paginate.prepare(paginateId);
					paginate.events();
				},

				prepare: function (paginateId) {
					paginate.paginateId     = paginateId;
					paginate.galleryContent = $('div#{{ $medialibraryName }}galleryContent');
				},

				events: function () {
					$(document).on('click', paginate.paginateId, function(e) {
						e.preventDefault();
						paginate.ajaxAction();
					});
				},

				ajaxAction: function () {
					$.ajax({
						url         : $(paginate.paginateId).attr('href'),
						type        : 'GET',
						success		: function(data)
						{
							paginate.galleryContent.empty();
							paginate.galleryContent.append(data);
						}
					});
				}
			}
			return paginate;
		}

		$(document).ready(function (){

			var mediaLibraryPrevious =  newPaginateObj();
			mediaLibraryPrevious.init("#{{ $medialibraryName }}mediaLibraryPrevious");

			var mediaLibraryNext =  newPaginateObj();
			mediaLibraryNext.init("#{{ $medialibraryName }}mediaLibraryNext");
		});

	}(jQuery));
</script>