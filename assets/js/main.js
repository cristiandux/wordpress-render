/* ============================================
   CRISTIAN DUX — Portfolio JS
   Vanilla JS — no jQuery — no WP deps
   ============================================ */

/* ---- Hero particles ---- */
(function () {
  const canvas = document.getElementById("hero-particles");
  if (!canvas) return;
  const ctx = canvas.getContext("2d");
  let W, H, particles;

  function resize() {
    W = canvas.width  = canvas.offsetWidth;
    H = canvas.height = canvas.offsetHeight;
  }

  function createParticles() {
    const count = Math.floor((W * H) / 18000);
    particles = Array.from({ length: count }, () => ({
      x: Math.random() * W,
      y: Math.random() * H,
      r: Math.random() * 1.4 + 0.3,
      dx: (Math.random() - 0.5) * 0.3,
      dy: (Math.random() - 0.5) * 0.3,
      alpha: Math.random() * 0.5 + 0.1,
    }));
  }

  function draw() {
    ctx.clearRect(0, 0, W, H);
    particles.forEach((p) => {
      p.x += p.dx;
      p.y += p.dy;
      if (p.x < 0) p.x = W;
      if (p.x > W) p.x = 0;
      if (p.y < 0) p.y = H;
      if (p.y > H) p.y = 0;
      ctx.beginPath();
      ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2);
      ctx.fillStyle = `rgba(187,186,166,${p.alpha})`;
      ctx.fill();
    });
    // líneas entre partículas cercanas
    for (let i = 0; i < particles.length; i++) {
      for (let j = i + 1; j < particles.length; j++) {
        const dx = particles[i].x - particles[j].x;
        const dy = particles[i].y - particles[j].y;
        const dist = Math.sqrt(dx * dx + dy * dy);
        if (dist < 120) {
          ctx.beginPath();
          ctx.moveTo(particles[i].x, particles[i].y);
          ctx.lineTo(particles[j].x, particles[j].y);
          ctx.strokeStyle = `rgba(187,186,166,${0.06 * (1 - dist / 120)})`;
          ctx.lineWidth = 0.5;
          ctx.stroke();
        }
      }
    }
    requestAnimationFrame(draw);
  }

  window.addEventListener("resize", () => { resize(); createParticles(); });
  resize();
  createParticles();
  draw();
})();

(function () {
  "use strict";

  /* ---- Nav: scroll behaviour ---- */
  const nav = document.getElementById("nav");
  const navLinks = document.querySelectorAll(".nav-links a, .nav-mobile a");
  const sections = document.querySelectorAll("section[id]");

  function onScroll() {
    // sticky style
    if (window.scrollY > 40) {
      nav.classList.add("scrolled");
    } else {
      nav.classList.remove("scrolled");
    }

    // scrollspy
    let current = "";
    sections.forEach((sec) => {
      if (window.scrollY >= sec.offsetTop - 120) {
        current = sec.getAttribute("id");
      }
    });
    navLinks.forEach((a) => {
      a.classList.remove("active");
      if (a.getAttribute("href") === "#" + current) {
        a.classList.add("active");
      }
    });
  }

  window.addEventListener("scroll", onScroll, { passive: true });
  onScroll();

  /* ---- Mobile menu ---- */
  const hamburger = document.querySelector(".nav-hamburger");
  const mobileMenu = document.querySelector(".nav-mobile");

  if (hamburger && mobileMenu) {
    hamburger.addEventListener("click", () => {
      hamburger.classList.toggle("open");
      mobileMenu.classList.toggle("open");
      document.body.style.overflow = mobileMenu.classList.contains("open")
        ? "hidden"
        : "";
    });

    mobileMenu.querySelectorAll("a").forEach((a) => {
      a.addEventListener("click", () => {
        hamburger.classList.remove("open");
        mobileMenu.classList.remove("open");
        document.body.style.overflow = "";
      });
    });
  }

  /* ---- Smooth scroll for anchor links ---- */
  document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener("click", function (e) {
      const target = document.querySelector(this.getAttribute("href"));
      if (target) {
        e.preventDefault();
        const navH = nav ? nav.offsetHeight : 76;
        const top = target.getBoundingClientRect().top + window.scrollY - navH;
        window.scrollTo({ top, behavior: "smooth" });
      }
    });
  });

  /* ---- Intersection Observer: fade-in ---- */
  const fadeEls = document.querySelectorAll(".fade-in");
  const fadeObs = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add("visible");
          fadeObs.unobserve(entry.target);
        }
      });
    },
    { threshold: 0.15, rootMargin: "0px 0px -60px 0px" }
  );
  fadeEls.forEach((el) => fadeObs.observe(el));

  /* ---- Skill bar animation ---- */
  const skillFills = document.querySelectorAll(".skill-fill");
  const skillObs = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add("animated");
          skillObs.unobserve(entry.target);
        }
      });
    },
    { threshold: 0.5 }
  );
  skillFills.forEach((el) => skillObs.observe(el));

  /* ---- Counter animation ---- */
  function animateCounter(el) {
    const target = parseInt(el.dataset.target, 10);
    const duration = 1800;
    const start = performance.now();
    const suffix = el.dataset.suffix || "";

    function step(now) {
      const elapsed = now - start;
      const progress = Math.min(elapsed / duration, 1);
      const ease = 1 - Math.pow(1 - progress, 3);
      el.textContent = Math.floor(ease * target) + suffix;
      if (progress < 1) requestAnimationFrame(step);
    }
    requestAnimationFrame(step);
  }

  const counters = document.querySelectorAll(".counter");
  const counterObs = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          animateCounter(entry.target);
          counterObs.unobserve(entry.target);
        }
      });
    },
    { threshold: 0.5 }
  );
  counters.forEach((el) => counterObs.observe(el));

  /* ---- Portfolio filter ---- */
  const filterBtns = document.querySelectorAll(".filter-btn");
  const portfolioItems = document.querySelectorAll(".portfolio-item");

  filterBtns.forEach((btn) => {
    btn.addEventListener("click", () => {
      filterBtns.forEach((b) => b.classList.remove("active"));
      btn.classList.add("active");

      const filter = btn.dataset.filter;

      portfolioItems.forEach((item) => {
        const cat = item.dataset.category;
        const show = filter === "all" || cat === filter;

        item.style.transition = "opacity 0.4s ease, transform 0.4s ease";
        if (show) {
          item.style.opacity = "1";
          item.style.transform = "scale(1)";
          item.style.pointerEvents = "all";
        } else {
          item.style.opacity = "0.15";
          item.style.transform = "scale(0.97)";
          item.style.pointerEvents = "none";
        }
      });
    });
  });

  /* ---- Lightbox ---- */
  const lightbox = document.getElementById("lightbox");
  const lightboxImg = lightbox ? lightbox.querySelector("img") : null;
  const lightboxClose = lightbox ? lightbox.querySelector(".lightbox-close") : null;

  document.querySelectorAll(".portfolio-item[data-src]").forEach((item) => {
    item.addEventListener("click", () => {
      if (!item.classList.contains("folio-active")) {
        // Primer clic: revela color
        item.classList.add("folio-active");
      } else {
        // Segundo clic: abre lightbox
        if (lightbox && lightboxImg) {
          lightboxImg.src = item.dataset.src;
          lightboxImg.alt = item.dataset.title || "";
          lightbox.classList.add("open");
          document.body.style.overflow = "hidden";
        }
      }
    });
  });

  function closeLightbox() {
    if (lightbox) {
      lightbox.classList.remove("open");
      document.body.style.overflow = "";
    }
  }

  if (lightboxClose) lightboxClose.addEventListener("click", closeLightbox);
  if (lightbox) {
    lightbox.addEventListener("click", (e) => {
      if (e.target === lightbox) closeLightbox();
    });
  }
  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape") closeLightbox();
  });

  /* ---- Swiper: Testimonials ---- */
  if (typeof Swiper !== "undefined") {
    new Swiper(".swiper-testimonials", {
      slidesPerView: 1,
      spaceBetween: 24,
      loop: true,
      autoplay: {
        delay: 5000,
        disableOnInteraction: false,
      },
      pagination: {
        el: ".swiper-testimonials .swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-testimonials .swiper-button-next",
        prevEl: ".swiper-testimonials .swiper-button-prev",
      },
      breakpoints: {
        640: { slidesPerView: 1 },
        768: { slidesPerView: 2 },
        1100: { slidesPerView: 3 },
      },
    });

    /* ---- Swiper: Blog ---- */
    new Swiper(".swiper-blog", {
      slidesPerView: 1,
      spaceBetween: 24,
      loop: true,
      autoplay: {
        delay: 4500,
        disableOnInteraction: false,
      },
      pagination: {
        el: ".swiper-blog .swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-blog .swiper-button-next",
        prevEl: ".swiper-blog .swiper-button-prev",
      },
      breakpoints: {
        640: { slidesPerView: 1 },
        768: { slidesPerView: 2 },
        1100: { slidesPerView: 3 },
      },
    });
  }

  /* ---- Contact form (Formspree) ---- */
  const form = document.getElementById("contact-form");
  const formSuccess = document.getElementById("form-success");

  if (form) {
    form.addEventListener("submit", async (e) => {
      e.preventDefault();
      const submitBtn = form.querySelector(".form-submit");
      const originalText = submitBtn.innerHTML;

      submitBtn.disabled = true;
      submitBtn.innerHTML = '<span>Enviando...</span>';

      try {
        const data = new FormData(form);
        const response = await fetch(form.action, {
          method: "POST",
          body: data,
          headers: { Accept: "application/json" },
        });

        if (response.ok) {
          form.style.display = "none";
          if (formSuccess) formSuccess.style.display = "block";
        } else {
          throw new Error("Error en el servidor");
        }
      } catch {
        submitBtn.disabled = false;
        submitBtn.innerHTML = originalText;
        alert("Hubo un error. Inténtalo de nuevo o contacta directamente por email.");
      }
    });
  }

  /* ---- Hero parallax (subtle) ---- */
  const heroBg = document.querySelector(".hero-bg-glow");
  if (heroBg) {
    window.addEventListener(
      "mousemove",
      (e) => {
        const x = (e.clientX / window.innerWidth - 0.5) * 40;
        const y = (e.clientY / window.innerHeight - 0.5) * 40;
        heroBg.style.transform = `translate(${x}px, ${y}px)`;
      },
      { passive: true }
    );
  }
})();

/* ---- Scroll emoji S-path ---- */
(function () {
  const el = document.querySelector(".scroll-emoji");
  if (!el) return;

  // S-curve waypoints: [x vw, y vh]
  const path = [
    [8,  8],   // top-left
    [68, 28],  // swing right
    [10, 58],  // swing left
    [65, 82],  // bottom-right
  ];

  function lerp(a, b, t) { return a + (b - a) * t; }
  function smoothstep(t) { return t * t * (3 - 2 * t); }

  function getPoint(progress) {
    const segs = path.length - 1;
    const raw  = progress * segs;
    const seg  = Math.min(Math.floor(raw), segs - 1);
    const t    = smoothstep(raw - seg);
    return [
      lerp(path[seg][0], path[seg + 1][0], t),
      lerp(path[seg][1], path[seg + 1][1], t),
    ];
  }

  function update() {
    const maxScroll = document.documentElement.scrollHeight - window.innerHeight;
    const progress  = maxScroll > 0 ? Math.min(window.scrollY / maxScroll, 1) : 0;
    const [x, y]    = getPoint(progress);
    const rotate    = -10 + progress * 20; // slight tilt along path
    el.style.left      = x + "vw";
    el.style.top       = y + "vh";
    el.style.transform = `rotate(${rotate}deg)`;
  }

  window.addEventListener("scroll", update, { passive: true });
  update();
})();

/* ---- Hero video — autoplay loop (iOS-safe) ---- */
(function () {
  const video = document.getElementById("hero-3d-video");
  if (!video) return;

  video.muted = true;
  video.loop = true;
  video.setAttribute("playsinline", "");
  video.setAttribute("webkit-playsinline", "");

  function tryPlay() {
    var p = video.play();
    if (p && typeof p.then === "function") {
      p.catch(function () {
        document.addEventListener("touchstart", function handler() {
          video.play().catch(function () {});
          document.removeEventListener("touchstart", handler);
        }, { once: true, passive: true });
      });
    }
  }

  if (video.readyState >= 3) {
    tryPlay();
  } else {
    video.addEventListener("canplay", tryPlay, { once: true });
  }

  document.addEventListener("visibilitychange", function () {
    if (!document.hidden) tryPlay();
  });
})();
