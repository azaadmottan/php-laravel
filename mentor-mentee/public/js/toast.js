const message = (msg, type) => {

    let toast = $("<div></div>").addClass(`fw-bold alert  alert-${type}`).html(msg);

    $("#toast-container").append(toast);

    setTimeout(() => {
        toast.fadeOut();
    }, 5000);
};