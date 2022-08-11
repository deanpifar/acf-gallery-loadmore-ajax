	$('#loadMore').on('click', function(e) {
		e.preventDefault();

		$page = $(this).attr("page");
		$postID = $(this).attr("post-id");
		$total = $(this).attr("total");
		$display = $(this).attr("display");
		$maxPage = $(this).attr('max-page');

		wp.ajax.post( "load_more", {page: $page, display: $display, maxpage: $maxPage, total: $total, postid: $postID} )

		.done(function(response) {

			$page++;
			$('#loadMore').attr("page", $page);

			if( $maxPage == $page ) {
				$('#loadMore').fadeOut();
			}

			$('.gallery__list').append(response);

		});

	});
