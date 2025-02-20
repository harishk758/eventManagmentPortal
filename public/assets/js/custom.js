
// Get all the anchor tags for sidebar and top menu
const sidebarTabs = document.querySelectorAll(".sidebar_list a");
const topMenuTabs = document.querySelectorAll(".top_menu a");

// Function to handle tab activation
function handleTabActivation(tab, allTabs) {
  allTabs.forEach((t) => t.classList.remove("active")); // Remove 'active' from all tabs
  tab.classList.add("active"); // Add 'active' class to the clicked tab
  localStorage.setItem("activeTab", tab.id); // Store the ID of the active tab in localStorage
}

// Add event listeners to sidebar tabs
sidebarTabs.forEach((tab) => {
  tab.addEventListener("click", function () {
    handleTabActivation(this, sidebarTabs);
  });
});

// Add event listeners to top menu tabs
topMenuTabs.forEach((tab) => {
  tab.addEventListener("click", function () {
    handleTabActivation(this, topMenuTabs);
  });
});

// PROFILE Menu Toggle
let profile = document.querySelector(".profile_toggle");
let menu = document.querySelector(".menu");

if (profile && menu) {
  profile.addEventListener("click", function (e) {
    e.stopPropagation(); // Prevent the click from propagating to other elements
    menu.classList.toggle("active");
  });
}

// Close menu if clicked outside
document.addEventListener("click", function (e) {
  if (!profile.contains(e.target) && !menu.contains(e.target)) {
    menu.classList.remove("active");
  }
});

// Dropdown Toggle (assuming dropdowns are within top menu or a similar structure)
let dropdowns = document.querySelectorAll(".dropdown-toggle");

dropdowns.forEach((dropdown) => {
  dropdown.addEventListener("click", function (e) {
    e.preventDefault(); // Prevent the default link action
    
    // Toggle the 'active' class to show/hide the dropdown
    const dropdownMenu = this.nextElementSibling;
    if (dropdownMenu) {
      dropdownMenu.classList.toggle("active");
    }
    
    // Close other dropdowns
    dropdowns.forEach((otherDropdown) => {
      if (otherDropdown !== dropdown) {
        const otherDropdownMenu = otherDropdown.nextElementSibling;
        if (otherDropdownMenu && otherDropdownMenu !== dropdownMenu) {
          otherDropdownMenu.classList.remove("active");
        }
      }
    });
  });
});
