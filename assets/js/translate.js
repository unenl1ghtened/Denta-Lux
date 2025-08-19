(function () {
  document.addEventListener("DOMContentLoaded", () => {
    const langSwitcher = document.getElementById("lang-switcher");

    // По умолчанию — латышский язык
    let currentLang = localStorage.getItem("lang");
    if (!currentLang) {
      currentLang = "lv";
      localStorage.setItem("lang", currentLang);
    }

    function loadTranslations(lang) {
      fetch("./assets/js/translations.json")
        .then((response) => response.json())
        .then((data) => {
          document.querySelectorAll("[data-key]").forEach((element) => {
            const key = element.getAttribute("data-key");
            if (data[lang][key]) {
              if (key === "phone") {
                const phoneLink = element.closest("a");
                if (phoneLink) {
                  phoneLink.href = "tel:" + data[lang][key].replace(/\s+/g, "");
                }
                element.textContent = data[lang][key];
              } else {
                element.textContent = data[lang][key];
              }
            }
          });
        });
    }

    // Переключатель языка вручную
    langSwitcher.addEventListener("click", () => {
      currentLang = currentLang === "ru" ? "lv" : "ru";
      localStorage.setItem("lang", currentLang);
      loadTranslations(currentLang);
      langSwitcher.textContent = currentLang === "ru" ? "LV" : "RU";
    });

    // Установка текста на переключателе
    langSwitcher.textContent = currentLang === "ru" ? "LV" : "RU";

    // Загрузка перевода при старте
    loadTranslations(currentLang);
  });
})();
