document.addEventListener("DOMContentLoaded", function () {
  const btnBurger = document.getElementById("btnBurger");
  const sidebar = document.querySelector("sidebar");

  function isMobile() {
    return window.innerWidth <= 768;
  }

  function toggleMenu() {
    if (isMobile()) {
      sidebar.classList.toggle("open");
      btnBurger.classList.toggle("open");
    }
  }

  function closeMenuAfterClick() {
    if (isMobile()) {
      sidebar.classList.remove("open");
      btnBurger.classList.remove("open");
    }
  }

  function init() {
    if (isMobile()) {
      sidebar.classList.remove("open");
    } else {
      sidebar.classList.add("open");
    }

    btnBurger.addEventListener("click", toggleMenu);

    document.querySelectorAll(".nav-btn").forEach((link) => {
      link.addEventListener("click", closeMenuAfterClick);
    });

    window.addEventListener("resize", function () {
      if (!isMobile()) {
        sidebar.classList.remove("open");
        btnBurger.classList.remove("open");
      }
    });
  }

  init();
});
