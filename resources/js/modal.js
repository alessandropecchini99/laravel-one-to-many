// Var
const myModal = document.querySelectorAll(".myModal");

if (myModal.length != 0) {
    const myForm = document.getElementById("myForm");
    const oldAction = myForm.action;

    // Event
    myModal.forEach((button) => {
        button.addEventListener("click", function () {
            myForm.action = oldAction;

            const id = button.getAttribute("data-id");

            const newAction = myForm.action.replace("***", id);

            myForm.action = newAction;
        });
    });
}
