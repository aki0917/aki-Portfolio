// ==========================================================================
// Main JavaScript - GSAP Animations
// ==========================================================================

"use strict";

// --- Register GSAP Plugins ---
gsap.registerPlugin(ScrollTrigger, ScrollToPlugin);

// --- Shared Config ---
const EASE_SMOOTH = "circ.out";
const EASE_HEAVY = "power4.out";

// ==========================================================================
// Loading Animation
// ==========================================================================
const loading = () => {
  const counter = document.getElementById("js-loading-counter");
  const loadingEl = document.getElementById("js-loading");

  if (!counter || !loadingEl) return;

  const tl = gsap.timeline({
    onComplete: () => {
      mvAnimation();
    },
  });

  tl.to(counter, {
    innerText: 100,
    duration: 1.4,
    ease: "power2.out",
    snap: { innerText: 1 },
    onUpdate: function () {
      counter.textContent = Math.round(
        gsap.getProperty(counter, "innerText")
      );
    },
  });

  tl.to(
    loadingEl,
    {
      yPercent: -100,
      duration: 1,
      ease: EASE_HEAVY,
    },
    "+=0.1"
  );

  tl.set(loadingEl, { display: "none" });
};

// ==========================================================================
// Main Visual Animation
// ==========================================================================
const mvAnimation = () => {
  const tl = gsap.timeline({ defaults: { ease: EASE_SMOOTH } });

  gsap.set(".p-mv__title-text", { y: 0, yPercent: 120 });
  tl.to(".p-mv__title-text", {
    yPercent: 0,
    duration: 1.4,
    stagger: 0.18,
  });

  tl.to(
    ".p-mv__subtitle",
    {
      opacity: 1,
      duration: 1.2,
    },
    "-=0.8"
  );

  tl.fromTo(
    ".p-mv__bg-line",
    { scaleX: 0, scaleY: 0 },
    {
      scaleX: 1,
      scaleY: 1,
      duration: 1.6,
      stagger: 0.06,
    },
    "-=1.0"
  );

  tl.to(
    "#js-scroll-indicator",
    {
      opacity: 1,
      duration: 1,
    },
    "-=0.8"
  );

  tl.fromTo(
    "#js-header",
    { opacity: 0, y: -24 },
    {
      opacity: 1,
      y: 0,
      duration: 1,
    },
    "-=0.8"
  );
};

// ==========================================================================
// Scroll Animations
// ==========================================================================
const scrollAnimations = () => {
  const fadeUpElements = document.querySelectorAll(".c-fade-up");

  fadeUpElements.forEach((el) => {
    gsap.fromTo(
      el,
      { opacity: 0, y: 50 },
      {
        opacity: 1,
        y: 0,
        duration: 1.1,
        ease: EASE_SMOOTH,
        scrollTrigger: {
          trigger: el,
          start: "top 88%",
          toggleActions: "play none none none",
        },
      }
    );
  });

  const aboutOverlay = document.getElementById("js-about-overlay");
  if (aboutOverlay) {
    gsap.to(aboutOverlay, {
      scaleY: 0,
      duration: 1.3,
      ease: EASE_HEAVY,
      scrollTrigger: {
        trigger: aboutOverlay,
        start: "top 78%",
        toggleActions: "play none none none",
      },
    });
  }

  const workOverlays = document.querySelectorAll(".p-work__thumbnail-overlay");
  workOverlays.forEach((overlay, index) => {
    gsap.to(overlay, {
      xPercent: 101,
      duration: 1.1,
      ease: EASE_HEAVY,
      scrollTrigger: {
        trigger: overlay.closest(".p-work__item"),
        start: "top 82%",
        toggleActions: "play none none none",
      },
      delay: index % 2 === 0 ? 0 : 0.15,
    });
  });

  const headings = document.querySelectorAll(".c-heading");
  headings.forEach((heading) => {
    gsap.fromTo(
      heading,
      { opacity: 0, x: -30 },
      {
        opacity: 1,
        x: 0,
        duration: 1,
        ease: EASE_SMOOTH,
        scrollTrigger: {
          trigger: heading,
          start: "top 88%",
          toggleActions: "play none none none",
        },
      }
    );
  });

  const contactTitle = document.querySelector(".p-contact__title");
  if (contactTitle) {
    gsap.fromTo(
      contactTitle,
      { opacity: 0, scale: 0.88, y: 24 },
      {
        opacity: 1,
        scale: 1,
        y: 0,
        duration: 1.2,
        ease: EASE_SMOOTH,
        scrollTrigger: {
          trigger: contactTitle,
          start: "top 82%",
          toggleActions: "play none none none",
        },
      }
    );
  }
};

// ==========================================================================
// Smooth Scroll (Nav Links)
// ==========================================================================
const smoothScroll = () => {
  const navLinks = document.querySelectorAll('a[href^="#"]');

  navLinks.forEach((link) => {
    link.addEventListener("click", (e) => {
      const href = link.getAttribute("href");
      if (href === "#") return;

      e.preventDefault();
      const target = document.querySelector(href);
      if (!target) return;

      const spMenu = document.getElementById("js-sp-menu");
      const header = document.getElementById("js-header");
      if (spMenu && spMenu.classList.contains("is-active")) {
        gsap.to(spMenu, {
          opacity: 0,
          duration: 0.3,
          ease: "power2.in",
          onComplete: () => {
            spMenu.classList.remove("is-active");
            if (header) header.classList.remove("is-menu-open");
          },
        });
      }

      gsap.to(window, {
        scrollTo: { y: target, offsetY: 0 },
        duration: 1.4,
        ease: EASE_HEAVY,
      });
    });
  });
};

// ==========================================================================
// Hamburger Menu (SP)
// ==========================================================================
const hamburgerMenu = () => {
  const hamburger = document.getElementById("js-hamburger");
  const spMenu = document.getElementById("js-sp-menu");
  const header = document.getElementById("js-header");

  if (!hamburger || !spMenu || !header) return;

  const navLinks = spMenu.querySelectorAll(".l-header__sp-nav-link");
  let isOpen = false;
  let menuTl = null;

  const openMenu = () => {
    isOpen = true;
    header.classList.add("is-menu-open");
    spMenu.classList.add("is-active");

    if (menuTl) menuTl.kill();
    menuTl = gsap.timeline();

    menuTl.fromTo(
      spMenu,
      { opacity: 0 },
      { opacity: 1, duration: 0.5, ease: "power2.out" }
    );

    menuTl.fromTo(
      navLinks,
      { opacity: 0, y: 30 },
      {
        opacity: 1,
        y: 0,
        duration: 0.6,
        ease: "power3.out",
        stagger: 0.08,
      },
      "-=0.25"
    );
  };

  const closeMenu = () => {
    isOpen = false;

    if (menuTl) menuTl.kill();
    menuTl = gsap.timeline({
      onComplete: () => {
        spMenu.classList.remove("is-active");
        header.classList.remove("is-menu-open");
      },
    });

    menuTl.to(navLinks, {
      opacity: 0,
      y: -20,
      duration: 0.3,
      ease: "power2.in",
      stagger: 0.04,
    });

    menuTl.to(
      spMenu,
      { opacity: 0, duration: 0.35, ease: "power2.in" },
      "-=0.15"
    );
  };

  hamburger.addEventListener("click", () => {
    if (isOpen) {
      closeMenu();
    } else {
      openMenu();
    }
  });
};

// ==========================================================================
// Parallax Effect on MV
// ==========================================================================
const mvParallax = () => {
  const mvContent = document.querySelector(".p-mv__content");

  if (!mvContent) return;

  gsap.to(mvContent, {
    y: 200,
    opacity: 0,
    ease: "none",
    scrollTrigger: {
      trigger: ".p-mv",
      start: "top top",
      end: "bottom top",
      scrub: 0.8,
    },
  });
};

// ==========================================================================
// Magnetic Cursor Effect (PC only)
// ==========================================================================
const magneticEffect = () => {
  if (window.matchMedia("(hover: none)").matches) return;

  const cursor = document.createElement("div");
  cursor.className = "custom-cursor";
  cursor.style.cssText = `
    position: fixed;
    width: 20px;
    height: 20px;
    border: 1px solid #111;
    border-radius: 50%;
    pointer-events: none;
    z-index: 9998;
    mix-blend-mode: difference;
    transition: width 0.4s cubic-bezier(0.16,1,0.3,1),
                height 0.4s cubic-bezier(0.16,1,0.3,1),
                border-color 0.4s cubic-bezier(0.16,1,0.3,1);
    transform: translate(-50%, -50%);
  `;
  document.body.appendChild(cursor);

  let mouseX = 0;
  let mouseY = 0;
  let cursorX = 0;
  let cursorY = 0;

  document.addEventListener("mousemove", (e) => {
    mouseX = e.clientX;
    mouseY = e.clientY;
  });

  const lerp = (start, end, factor) => start + (end - start) * factor;

  const animateCursor = () => {
    cursorX = lerp(cursorX, mouseX, 0.1);
    cursorY = lerp(cursorY, mouseY, 0.1);
    cursor.style.left = cursorX + "px";
    cursor.style.top = cursorY + "px";
    requestAnimationFrame(animateCursor);
  };
  animateCursor();

  const interactiveElements = document.querySelectorAll("a, button");
  interactiveElements.forEach((el) => {
    el.addEventListener("mouseenter", () => {
      cursor.style.width = "50px";
      cursor.style.height = "50px";
      cursor.style.borderColor = "#fff";
    });
    el.addEventListener("mouseleave", () => {
      cursor.style.width = "20px";
      cursor.style.height = "20px";
      cursor.style.borderColor = "#111";
    });
  });
};

// ==========================================================================
// About Image → Video Hover Effect
// ==========================================================================
const aboutVideoHover = () => {
  const wrapper = document.getElementById("js-about-image");
  if (!wrapper) return;

  const video = wrapper.querySelector(".p-about__video");
  if (!video) return;

  const fadeOut = () => {
    wrapper.classList.remove("is-playing");
    video.addEventListener(
      "transitionend",
      () => {
        if (!wrapper.classList.contains("is-playing")) {
          video.pause();
          video.currentTime = 0;
        }
      },
      { once: true }
    );
  };

  video.addEventListener("ended", fadeOut);

  wrapper.addEventListener("mouseenter", () => {
    if (video.ended || video.currentTime === 0) {
      video.currentTime = 0;
      video.play();
      wrapper.classList.add("is-playing");
    }
  });

  wrapper.addEventListener("mouseleave", () => {
    if (!video.ended) {
      fadeOut();
    }
  });
};

// ==========================================================================
// Initialize
// ==========================================================================
document.addEventListener("DOMContentLoaded", () => {
  loading();
  scrollAnimations();
  smoothScroll();
  hamburgerMenu();
  mvParallax();
  magneticEffect();
  aboutVideoHover();
});
