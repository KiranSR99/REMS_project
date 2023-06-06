// JS FOR SEARCH BOX STARTS HERE

const searchInput = document.getElementById("search-input");
const clearButton = document.getElementById("clear-button");


searchInput.addEventListener("input", function () {
    if (searchInput.value.length > 0) {
        clearButton.style.display = "block";
    } else {
        clearButton.style.display = "none";
    }
});

clearButton.addEventListener("click", function () {
    searchInput.value = "";
    clearButton.style.display = "none";
});

// JS FOR SEARCH BOX ENDS HERE

// JS FOR CLICKABLE ROW

document.addEventListener("DOMContentLoaded", function () {
    var rows = document.querySelectorAll(".clickable-row");
    rows.forEach(function (row) {
        row.addEventListener("click", function () {
            var href = this.dataset.href;
            if (href) {
                window.location.href = href;
            }
        });
    });
});

console.log("Hello world!!!!!!!!");

// JS FOR CLICKABLE ROW ENDS HERE
