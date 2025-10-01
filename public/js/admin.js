document.addEventListener("DOMContentLoaded", function () {
    // --- Toggle Sidebar pour version mobile ---
    const toggleBtn = document.querySelector("#sidebar-toggle");
    const sidebar = document.querySelector(".sidebar");
    
    if (toggleBtn) {
        toggleBtn.addEventListener("click", () => {
            sidebar.classList.toggle("active");
        });
    }

    // --- Confirmation de suppression ---
    const deleteButtons = document.querySelectorAll(".btn-delete");
    deleteButtons.forEach(btn => {
        btn.addEventListener("click", function (e) {
            if (!confirm("Voulez-vous vraiment supprimer cet élément ?")) {
                e.preventDefault();
            }
        });
    });

    // --- Notification simple ---
    const flashMessage = document.querySelector(".flash-message");
    if (flashMessage) {
        setTimeout(() => {
            flashMessage.style.opacity = "0";
        }, 4000); // disparaît après 4s
    }

    // --- Exemple Chart.js pour statistiques ---
    const ctx = document.getElementById('statsChart');
    if (ctx) {
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Services', 'Annonces', 'Messages'],
                datasets: [{
                    label: 'Statistiques',
                    data: [25, 12, 58],
                    backgroundColor: ['#3498db', '#e67e22', '#2ecc71']
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: false }
                }
            }
        });
    }
});
