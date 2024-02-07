const FILTER_SELECT = document.querySelector("#filter-select");
const FILTER_OPTIONS = document.querySelector("#filter-options");

FILTER_SELECT.addEventListener("click", () => {
	if(FILTER_OPTIONS.dataset.visible === "true")
		FILTER_OPTIONS.dataset.visible = false;
	else
		FILTER_OPTIONS.dataset.visible = true;
});