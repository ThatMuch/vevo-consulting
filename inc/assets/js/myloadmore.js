$('#load-more').click(function () {
	var button = $(this),
		data = {
			'action': 'load_more',
			'query': load_more.posts,
			'page': load_more.current_page,
			'nonce': load_more.nonce
		};

	$.ajax({
		url: load_more.ajaxurl,
		data: data,
		type: 'POST',
		beforeSend: function (xhr) {
			button.text('Chargement...');
		},
		success: function (data) {
			console.log(data);
			if (data) {
				//reset button text
				button.text('Afficher plus');
				//append new data
				$('.load-more-target').append(data);
				// Aplpy lazy loading + resize
				var images = document.querySelectorAll('img[data-src]');
				var titles = Array.from(document.getElementsByClassName("card-blog_title"));
				var img_wrapper = document.querySelectorAll(".card-blog_wrapper")

				showImagesOnView(images);
				ratio_img(img_wrapper);
				ellipsisTitle(titles);

				load_more.current_page++;
				if (load_more.current_page == load_more.max_page)
					button.remove();

			} else {
				button.remove();
			}
		}
	});
});