document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('serviceModal');
    const modalImage = document.getElementById('modalImage');
    const modalTitle = document.getElementById('modalTitle');
    const modalDescription = document.getElementById('modalDescription');
    const closeModal = document.querySelector('.close-modal');

    // Sélectionner tous les services
    const serviceItems = document.querySelectorAll('.service-item');

    serviceItems.forEach(item => {
        item.addEventListener('click', () => {
            const title = item.getAttribute('data-title');
            const description = item.getAttribute('data-description');
            const image = item.getAttribute('data-image');

            modalTitle.textContent = title;
            modalDescription.textContent = description || "Aucune description disponible.";
            modalImage.src = image || "{{ asset('img/default-service.jpg') }}";

            modal.style.display = 'flex';
        });
    });

    // Fermer le modal
    closeModal.addEventListener('click', () => {
        modal.style.display = 'none';
    });

    // Fermer en cliquant à l’extérieur du contenu
    window.addEventListener('click', (e) => {
        if (e.target === modal) {
            modal.style.display = 'none';
        }
    });
});
