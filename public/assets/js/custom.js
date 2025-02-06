// Function to set the active tab from localStorage
function setActiveTab() {
  // Get the stored active tab from localStorage
  const activeTab = localStorage.getItem("activeTab");

  // If there's a stored active tab, set it as active
  if (activeTab) {
    const tabToActivate = document.getElementById(activeTab);
    if (tabToActivate) {
      tabToActivate.classList.add("active");
    }
  }
}

// Set active tab on page load
setActiveTab();

// Get all the anchor tags
const tabs = document.querySelectorAll(".sidebar_list a");

tabs.forEach((tab) => {
  tab.addEventListener("click", function () {
    // Remove 'active' class from all tabs
    tabs.forEach((t) => t.classList.remove("active"));

    // Add 'active' class to the clicked tab
    this.classList.add("active");

    // Store the ID of the active tab in localStorage
    localStorage.setItem("activeTab", this.id);
  });
});

// PROFILE MEnu Toggle

let profile = document.querySelector(".profile_toggle");
let menu = document.querySelector(".menu");

profile.onclick = function () {
  menu.classList.toggle("active");
};

//PAGINATION JS

document.addEventListener("click", (evt) => {
  const link = evt.target.closest("a");
  if (!link || !link.closest("nav.pagination")) return;

  const allPageLinks = Array.from(
    document.querySelectorAll("nav.pagination ul.pages a")
  );
  let currentPageIndex = allPageLinks.findIndex((link) =>
    link.classList.contains("current")
  );

  if (link.classList.contains("previous")) {
    if (currentPageIndex > 0) currentPageIndex--;
  } else if (link.classList.contains("next")) {
    if (currentPageIndex < allPageLinks.length - 1) currentPageIndex++;
  } else if (link.closest("li.page")) {
    currentPageIndex = allPageLinks.indexOf(link);
  }

  allPageLinks.forEach((pageLink) => pageLink.classList.remove("current"));
  allPageLinks[currentPageIndex].classList.add("current");
  allPageLinks[currentPageIndex].setAttribute("aria-current", "page");

  evt.preventDefault();
});

// ADD MORE BOOTH JS
document.addEventListener("DOMContentLoaded", function () {
  let boothCounter = document.querySelectorAll(".booth-form").length; // Initial booth count

  // Remove "Remove Booth" button from the first booth form
  // const firstBoothForm = document.querySelector(".booth-form");
  // const removeButton = firstBoothForm.querySelector(".remove-booth");
  // if (removeButton) {
  //   removeButton.remove();
  // }

  // Add event listener for 'Add Booth' button

  
  // document
  //   .querySelector("#booth-form-container")
  //   .addEventListener("click", function (event) {
  //     if (event.target && event.target.classList.contains("add-booth")) {
  //       boothCounter++;
  //       const boothForm = document.querySelector(".booth-form:last-child");
  //       const newBoothForm = boothForm.cloneNode(true);

  //       const newTitle = newBoothForm.querySelector(".page_title span");
  //       newTitle.textContent = "Booth Details " + boothCounter;

  //       newBoothForm.querySelectorAll("input").forEach((input) => {
  //         input.value = "";
  //       });

  //       const existingRemoveButton =
  //         newBoothForm.querySelector(".remove-booth");
  //       if (existingRemoveButton) {
  //         existingRemoveButton.remove(); 
  //       }

  //       const removeButton = document.createElement("a");
  //       removeButton.href = "javascript:void(0)";
  //       removeButton.classList.add("btn", "btn-danger", "remove-booth");
  //       removeButton.textContent = "Remove Booth";

  //       const btnGroup = newBoothForm.querySelector(".btn-grp");
  //       btnGroup.appendChild(removeButton);

  //       removeButton.addEventListener("click", function () {
  //         newBoothForm.remove(); 

  //         boothCounter = document.querySelectorAll(".booth-form").length;
  //         updateSubmitButtonVisibility(); 
  //       });

  //       document
  //         .querySelector("#booth-form-container")
  //         .appendChild(newBoothForm);

  //       updateSubmitButtonVisibility();
  //     }
  //   });

  function updateSubmitButtonVisibility() {
    const boothForms = document.querySelectorAll(".booth-form");

    boothForms.forEach(function (boothForm, index) {
      const submitButton = boothForm.querySelector(".btn-primary");
      if (submitButton) {
        submitButton.style.display =
          index === boothForms.length - 1 ? "inline-block" : "none";
      }
    });
  }
});


// MODAL 1 JS
// document.getElementById("openModal").addEventListener("click", function () {
//   console.log('openModal');
//   document.getElementById("teamModal").style.display = "flex";
// });

// document.getElementById("closeModal").addEventListener("click", function () {
//   document.getElementById("teamModal").style.display = "none";
// });

// MODAL 2
// document.getElementById("openModal2").addEventListener("click", function (event) {
//   document.getElementById("teamModal2").style.display = "flex";
// });

// document.getElementById("closeModal2").addEventListener("click", function () {
//   document.getElementById("teamModal2").style.display = "none";
// });
// MODAL 3
// document.getElementById("openModal3").addEventListener("click", function () {
//   document.getElementById("teamModal3").style.display = "flex";
// });

// document.getElementById("closeModal3").addEventListener("click", function () {
//   document.getElementById("teamModal3").style.display = "none";
// }); 
// MODAL 3
// document.getElementById("openModal4").addEventListener("click", function () {
//   document.getElementById("teamModal4").style.display = "flex";
// });

// document.getElementById("closeModal4").addEventListener("click", function () {
//   document.getElementById("teamModal4").style.display = "none";
// }); 







// const selectBtn = document.querySelector(".select-btn"),
//       items = document.querySelectorAll(".item");

// selectBtn.addEventListener("click", () => {
//     selectBtn.classList.toggle("open");
// });

// items.forEach(item => {
//     item.addEventListener("click", () => {
//         item.classList.toggle("checked");

//         let checked = document.querySelectorAll(".checked"),
//             btnText = document.querySelector(".btn-text");

//             if(checked && checked.length > 0){
//                 btnText.innerText = `${checked.length} Selected`;
//             }else{
//                 btnText.innerText = "Select Language";
//             }
//     });
// })