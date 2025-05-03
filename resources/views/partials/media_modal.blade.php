<!-- Modal -->
<div class="modal fade" id="mediaModal" tabindex="-1" aria-labelledby="mediaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediaModalLabel">{{ __('lang.media_preview') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <div id="modalContent"></div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const mediaModal = document.getElementById('mediaModal');
        const modalContent = document.getElementById('modalContent');

        mediaModal.addEventListener('show.bs.modal', function (event) {
            const trigger = event.relatedTarget; // Element that triggered the modal
            const content = trigger.getAttribute('data-content'); // Get the content
            modalContent.innerHTML = content; // Update modal content
        });

        mediaModal.addEventListener('hidden.bs.modal', function () {
            modalContent.innerHTML = ''; // Clear modal content when closed
        });
    });
</script>
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
