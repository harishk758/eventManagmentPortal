 // Function to set the active tab from localStorage
 function setActiveTab() {
    // Get the stored active tab from localStorage
    const activeTab = localStorage.getItem('activeTab');
    
    // If there's a stored active tab, set it as active
    if (activeTab) {
      const tabToActivate = document.getElementById(activeTab);
      if (tabToActivate) {
        tabToActivate.classList.add('active');
      }
    }
  }

  // Set active tab on page load
  setActiveTab();

  // Get all the anchor tags
  const tabs = document.querySelectorAll('.sidebar_list a');

  tabs.forEach(tab => {
    tab.addEventListener('click', function() {
      // Remove 'active' class from all tabs
      tabs.forEach(t => t.classList.remove('active'));

      // Add 'active' class to the clicked tab
      this.classList.add('active');
      
      // Store the ID of the active tab in localStorage
      localStorage.setItem('activeTab', this.id);
    });
  });

// PROFILE MEnu Toggle

let profile = document.querySelector('.profile_toggle');
let menu = document.querySelector('.menu');

profile.onclick = function () {
    menu.classList.toggle('active');
}


//PAGINATION JS
document.addEventListener('click', (evt) => {
    const link = evt.target.closest('a');
    if (!link || !link.closest('nav.pagination')) return;

    const allPageLinks = Array.from(document.querySelectorAll('nav.pagination ul.pages a'));
    let currentPageIndex = allPageLinks.findIndex(link => link.classList.contains('current'));

    if (link.classList.contains('previous')) {
        if (currentPageIndex > 0) currentPageIndex--;
    } else if (link.classList.contains('next')) {
        if (currentPageIndex < allPageLinks.length - 1) currentPageIndex++;
    } else if (link.closest('li.page')) {
        currentPageIndex = allPageLinks.indexOf(link);
    }

    allPageLinks.forEach(pageLink => pageLink.classList.remove('current'));
    allPageLinks[currentPageIndex].classList.add('current');
    allPageLinks[currentPageIndex].setAttribute('aria-current', 'page');

    evt.preventDefault();
});





// ADD MORE JS

// document.addEventListener("DOMContentLoaded", function() {
//     let boothCounter = document.querySelectorAll(".booth-form").length; // Initial booth count
//     // Remove "Remove Booth" button from the first booth form
//     const firstBoothForm = document.querySelector(".booth-form");
//     const removeButton = firstBoothForm.querySelector(".remove-booth");
//     if (removeButton) {
//         removeButton.remove(); // Remove the button from the first booth
//     }
//     // Add event listener for 'Add Booth' button
//     document.querySelector("#booth-form-container").addEventListener("click", function(event) {
//         if (event.target && event.target.classList.contains("add-booth")) {
//             boothCounter++; // Increment boothCounter for the next form number
//             // Clone the last booth form (instead of the first one)
//             const boothForm = document.querySelector(".booth-form:last-child");
//             const newBoothForm = boothForm.cloneNode(true);
//             // Update the title for the new form
//             const newTitle = newBoothForm.querySelector(".page_title span");
//             newTitle.textContent = "Booth Details " + boothCounter;
//             // Clear input values in the new form (optional)
//             newBoothForm.querySelectorAll("input").forEach(input => {
//                 input.value = "";
//                  input.name = boothCounter;
//             });
//             // Remove any existing "Remove Booth" button from the cloned form
//             const existingRemoveButton = newBoothForm.querySelector(".remove-booth");
//             if (existingRemoveButton) {
//                 existingRemoveButton.remove(); // Remove duplicate "Remove Booth" button if present
//             }
//             // Add a "Remove Booth" button to the cloned form
//             const removeButton = document.createElement("a");
//             removeButton.href = "javascript:void(0)";
//             removeButton.classList.add("btn", "btn-danger", "remove-booth");
//             removeButton.textContent = "Remove Booth";
//             // Append the "Remove Booth" button to the new form's button group
//             const btnGroup = newBoothForm.querySelector(".btn-grp");
//             btnGroup.appendChild(removeButton);
//             // Add event listener for the "Remove Booth" button
//             removeButton.addEventListener("click", function() {
//                 newBoothForm.remove(); // Remove the form from the DOM
//                 // Recalculate boothCounter after removing a booth form
//                 boothCounter = document.querySelectorAll(".booth-form").length;
//                 updateSubmitButtonVisibility(); // Update visibility of the submit button
//             });
//             // Append the new booth form to the container
//             document.querySelector("#booth-form-container").appendChild(newBoothForm);
//             // Update visibility of the submit button for the last form
//             updateSubmitButtonVisibility();
//         }
//     });
//     // Function to hide the submit button for all forms except the last one
//     function updateSubmitButtonVisibility() {
//         const boothForms = document.querySelectorAll(".booth-form");
//         boothForms.forEach(function(boothForm, index) {
//             const submitButton = boothForm.querySelector(".btn-primary");
//             if (submitButton) {
//                 submitButton.style.display = (index === boothForms.length - 1) ? "inline-block" : "none";
//             }
//         });
//     }
// });




    document.addEventListener("DOMContentLoaded", function () {
        let boothCounter = 0;

        document.querySelector("#booth-form-container").addEventListener("click", function (event) {
            if (event.target.classList.contains("add-booth")) {
                boothCounter++;

                const boothWrapper = document.querySelector("#booth-wrapper");
                const firstBoothForm = document.querySelector(".booth-form:first-child");
                const newBoothForm = firstBoothForm.cloneNode(true);

                newBoothForm.setAttribute("data-index", boothCounter);
                newBoothForm.querySelector(".page_title span").textContent = "Booth Details " + (boothCounter + 1);

                newBoothForm.querySelectorAll("input, select").forEach((input) => {
                    let name = input.getAttribute("name");
                    if (name) {
                        name = name.replace(/\d+/, boothCounter);
                        input.setAttribute("name", name);
                        input.value = "";
                    }
                });

                // Show "Remove Booth" button for new booth
                newBoothForm.querySelector(".remove-booth").style.display = "inline-block";

                // Append new booth
                boothWrapper.appendChild(newBoothForm);

                updateSubmitButtonVisibility();
            }

            if (event.target.classList.contains("remove-booth")) {
                event.target.closest(".booth-form").remove();
                updateSubmitButtonVisibility();
            }
        });

        function updateSubmitButtonVisibility() {
            const boothForms = document.querySelectorAll(".booth-form");
            boothForms.forEach((boothForm, index) => {
                const submitButton = boothForm.querySelector(".btn-primary");
                submitButton.style.display = index === boothForms.length - 1 ? "inline-block" : "none";
            });
        }

        updateSubmitButtonVisibility();
    });

// MODAL JS
document.getElementById("openModal").addEventListener("click", function () {
  document.getElementById("teamModal").style.display = "flex";
});

document.getElementById("closeModal").addEventListener("click", function () {
  document.getElementById("teamModal").style.display = "none";
});
