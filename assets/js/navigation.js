document.addEventListener("DOMContentLoaded", function () {
  document.body.addEventListener("click", function (e) {
    const link = e.target.closest("[data-route]");
    if (link) {
      e.preventDefault();
      loadPage(link.getAttribute("href"));
    }
  });

  function loadPage(url) {
    const mainContent = document.querySelector(".main-content");
    mainContent.classList.add("loading");

    fetch(url)
      .then((response) => response.text())
      .then((html) => {
        const parser = new DOMParser();
        const doc = parser.parseFromString(html, "text/html");
        const newContent = doc.querySelector(".main-content").innerHTML;

        document.querySelector(".main-content").innerHTML = newContent;
        history.pushState(null, null, url);
        updateActiveLink();
      })
      .finally(() => {
        mainContent.classList.remove("loading");
      });
  }

  window.addEventListener("popstate", function () {
    loadPage(window.location.pathname);
  });

  function updateActiveLink() {
    document.querySelectorAll("[data-route]").forEach((link) => {
      link.classList.toggle(
        "active",
        link.getAttribute("href") === window.location.pathname
      );
    });
  }
});
