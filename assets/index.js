console.log("hello homepage js");
const newPostModalTrigger = document.querySelector("#new-post-modal-trigger");
const newPostModal = document.querySelector("#modal");
const body = document.querySelector("body");
const closeButton = document.querySelector("#modal-close");
const form = document.querySelector("form");
const bodyInput = document.querySelector("textarea#body");
const clientBodyError = document.querySelector("#client-body-error");
const bodyCount = document.querySelector("#body-count");
const bodyCountWarning = document.querySelector('#body-count-warning');

// modal JS
newPostModalTrigger.addEventListener("click", () => {
  newPostModal.classList.remove("hidden");
  body.classList.add("modal-active");
  body.addEventListener("click", handleClickOutside);
});
closeButton.addEventListener("click", () => {
  body.classList.remove("modal-active");
  newPostModal.classList.add("hidden");
});

function handleClickOutside(event) {
  if (
    !newPostModal.contains(event.target) &&
    !newPostModalTrigger.contains(event.target)
  ) {
    body.classList.remove("modal-active");
    newPostModal.classList.add("hidden");
  }
}

// client-side form validation
form.addEventListener("submit", (e) => {
  if (!bodyInput.value) {
    clientBodyError.textContent =
      "Body field cannot be blank. Please try again.";
    e.preventDefault();
  } else if (bodyInput.value.length > 280) {
    clientBodyError.textContent =
      "Body is too long. Body must be 280 or fewer characters.";
    e.preventDefault();
  }
});

//interactive measurement of body length
bodyInput.addEventListener("input", () => {
  console.log(bodyInput.value.length);
  
  if (bodyInput.value.length > 280) {
    bodyCount.textContent = bodyInput.value.length;
    bodyCountWarning.classList.remove('hidden');
  } else {
    bodyCount.textContent = bodyInput.value.length;
    bodyCountWarning.classList.add('hidden');
  }
});
