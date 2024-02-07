const VIEW_BUTTONS = document.querySelectorAll(".view-button");

VIEW_BUTTONS.forEach(button => {
	const viewId = button.dataset.for;
	button.addEventListener("click", (event) => {
		const target = event.target;

		VIEW_BUTTONS.forEach(button => {
			button.dataset.active = false;
		});

		target.dataset.active = true;

		showContent(viewId)
	});
});

function showContent(viewId) {
  const contentViews = document.querySelectorAll(".content-view");
  contentViews.forEach(function (view) {
    view.setAttribute("aria-hidden", "true");
  });

  const selectedView = document.getElementById(viewId);
  if (selectedView) {
    selectedView.setAttribute("aria-hidden", "false");
  }
}