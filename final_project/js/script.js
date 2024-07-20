document.addEventListener("DOMContentLoaded", (event) => {
  const title = document.querySelector(".cookstown-title");
  title.addEventListener("click", () => {
    title.style.color = title.style.color === "yellow" ? "#fff" : "yellow";
  });
});
