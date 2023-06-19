// JS FOR SEARCH BOX STARTS HERE

document.addEventListener("DOMContentLoaded", function() {
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
});

// JS FOR SEARCH BOX ENDS HERE


// JS FOR TOGGLE BUTTON VALUE CHANGE STARTS HERE
function updateStatus(eventId, checkbox) {
    const status = checkbox.checked ? 1 : 0;

    // Make an AJAX request to update the database
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "update-status.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log(xhr.responseText); // Optional: Display response from server
        }
    };
    xhr.send("eventId=" + eventId + "&status=" + status);
}

// JS FOR TOGGLE BUTTON VALUE CHANGE ENDS HERE


//JAVASCRIPT TO TOGGLE ACTIVE MENU IN DASHBOARD STARTS HERE
document.addEventListener("DOMContentLoaded", function() {
    const dashboard = document.getElementById('dashboard');
    const events = document.getElementById('events');
    const reservations = document.getElementById('reservations');
    const packages = document.getElementById('packages');
    const analytics = document.getElementById('analytics');
    const messages = document.getElementById('messages');
    const settings = document.getElementById('settings');

    // Add click event listeners to each list item
    dashboard.addEventListener('click', toggleActiveClass);
    events.addEventListener('click', toggleActiveClass);
    reservations.addEventListener('click', toggleActiveClass);
    packages.addEventListener('click', toggleActiveClass);
    analytics.addEventListener('click', toggleActiveClass);
    messages.addEventListener('click', toggleActiveClass);
    settings.addEventListener('click', toggleActiveClass);

    // Function to toggle the active class on clicked list item
    function toggleActiveClass(event) {
        const clickedItem = event.currentTarget;
        // Remove the active class from all list items
        const listItems = document.querySelectorAll('.side-navbar ul li');
        listItems.forEach(item => item.classList.remove('active'));
        // Add the active class to the clicked list item
        clickedItem.classList.add('active');
    }
});

//JAVASCRIPT TO TOGGLE ACTIVE MENU IN DASHBOARD ENDS HERE





