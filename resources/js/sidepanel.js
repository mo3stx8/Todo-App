// side panel js code
document.addEventListener('DOMContentLoaded', function () {
    const details = document.getElementById('taskDetails');
    details.addEventListener('show.bs.offcanvas', function (event) {
        const button = event.relatedTarget;
        const taskId = button.getAttribute('data-id');

        fetch(`/tasks/${taskId}`)
            .then(res => res.text())
            .then(html => {
                document.getElementById('task-details-content').innerHTML = html;
            });
    });
});
