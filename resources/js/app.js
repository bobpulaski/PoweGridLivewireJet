import "./bootstrap";

window.addEventListener("alert", (event) => {
    toastr[event.detail[0].type](event.detail[0].message, {
        closeButton: true,
        positionClass: "toast-top-right",
    });
});
