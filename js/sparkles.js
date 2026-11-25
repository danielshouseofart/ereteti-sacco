(() => {
  const reducedMotion = window.matchMedia("(prefers-reduced-motion: reduce)");
  const colors = ["#fff7ad", "#e7b5ff", "#8fffea", "#a9caff"];

  document.addEventListener("click", (event) => {
    if (reducedMotion.matches) return;

    const target = event.target;
    const bounds = target instanceof Element ? target.getBoundingClientRect() : document.body.getBoundingClientRect();
    const x = event.detail === 0 ? bounds.left + bounds.width / 2 : event.clientX;
    const y = event.detail === 0 ? bounds.top + bounds.height / 2 : event.clientY;
    const burst = document.createElement("span");
    burst.className = "sparkle-burst";
    burst.setAttribute("aria-hidden", "true");
    burst.style.left = `${x}px`;
    burst.style.top = `${y}px`;

    for (let index = 0; index < 12; index += 1) {
      const angle = (Math.PI * 2 * index) / 12 + (Math.random() - 0.5) * 0.2;
      const distance = 20 + Math.random() * 36;
      const particle = document.createElement("span");
      particle.className = `sparkle-particle ${index % 3 === 0 ? "sparkle-dot" : "sparkle-star"}`;
      particle.style.setProperty("--sparkle-x", `${Math.cos(angle) * distance}px`);
      particle.style.setProperty("--sparkle-y", `${Math.sin(angle) * distance}px`);
      particle.style.setProperty("--sparkle-color", colors[Math.floor(Math.random() * colors.length)]);
      particle.style.setProperty("--sparkle-size", `${5 + Math.random() * 5}px`);
      particle.style.setProperty("--sparkle-delay", `${Math.random() * 70}ms`);
      burst.append(particle);
    }

    document.body.append(burst);
    window.setTimeout(() => burst.remove(), 900);
  });
})();