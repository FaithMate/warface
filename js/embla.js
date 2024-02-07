const EMBLA_OPTIONS = { containScroll: 'trimSnaps' };

const emblaNode = document.querySelector(".embla");
const viewportNode = emblaNode.querySelector(".embla__viewport");

const emblaApi = EmblaCarousel(viewportNode, EMBLA_OPTIONS);

// const EMBLA_PREV_BTN = document.querySelector("#embla-prev-btn");
// const EMBLA_NEXT_BTN = document.querySelector("#embla-next-btn");

// EMBLA_PREV_BTN.addEventListener("click", () => emblaApi.scrollPrev(), false);
// EMBLA_NEXT_BTN.addEventListener("click", () => emblaApi.scrollNext(), false);