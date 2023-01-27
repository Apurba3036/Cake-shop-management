const searchForm = document.getElementById("search-form");
const searchInput = document.getElementById("search-input");
searchForm.addEventListener("submit", function (event) {
    event.preventDefault();
  });
  const searchTerm = searchInput.value;
  const searchableElements = document.querySelectorAll(".searchable");
  searchableElements.forEach(function (element) {
    if (element.innerText.toLowerCase().includes(searchTerm.toLowerCase())) {
      element.style.display = "block";
    } else {
      element.style.display = "none";
    }
  });
  searchInput.value = "";
    
