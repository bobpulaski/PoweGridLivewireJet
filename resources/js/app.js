import "./bootstrap";

window.addEventListener("client-deleted", (event) => {
    toastr["success"]("Have fun storming the castle!", "Miracle Max Says", {
        closeButton: true,
        positionClass: "toast-top-right",
    });
});
