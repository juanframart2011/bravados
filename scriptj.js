import ASScroll from "https://cdn.skypack.dev/@ashthornton/asscroll@1.7.3";
import gsap from "https://cdn.skypack.dev/gsap@3.5.1";
import ScrollTrigger from "https://cdn.skypack.dev/gsap@3.5.1/ScrollTrigger";
gsap.registerPlugin(ScrollTrigger);

// https://github.com/ashthornton/asscroll
const asscroll = new ASScroll({
  customScrollbar: true });


ScrollTrigger.defaults({
  scroller: asscroll.Scroll.scrollContainer });


ScrollTrigger.scrollerProxy(asscroll.Scroll.scrollContainer, {
  scrollTop(value) {
    return arguments.length ? asscroll.scrollTo(value) : -asscroll.smoothScrollPos;
  },
  getBoundingClientRect() {
    return { top: 0, left: 0, width: window.innerWidth, height: window.innerHeight };
  } });


asscroll.on("raf", ScrollTrigger.update);
ScrollTrigger.addEventListener("refresh", () => asscroll.onResize());

window.addEventListener("load", () => {

  const totalScroll =
  document.querySelector(".asscroll-container").scrollHeight -
  innerHeight;

  gsap.to(".peach", {
    scrollTrigger: {
      pin: true,
      scrub: true,
      trigger: ".peaches" },

    y: (i, target) => -totalScroll * target.dataset.speed,
    ease: "none" });


  gsap.to(".text", {
    scrollTrigger: {
      pin: true,
      scrub: true,
      trigger: ".text" },

    ease: "none" });


  gsap.from(".gif img", {
    scrollTrigger: {
      pin: true,
      scrub: true,
      trigger: ".gif" },

    scale: 0.2,
    autoAlpha: 0,
    ease: "sine.out" });


  asscroll.enable();
});