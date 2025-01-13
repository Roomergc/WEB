document.addEventListener('DOMContentLoaded', () => {
    const ventasCanvas = document.getElementById('ventasChart');
    const visitantesCanvas = document.getElementById('visitantesChart');

    if (ventasCanvas) {
        const ventasCtx = ventasCanvas.getContext('2d');

        new Chart(ventasCtx, {
            type: 'bar',
            data: {
                labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                datasets: [{
                    label: 'Ventas Mensuales',
                    data: ventasMensuales, // Datos dinámicos
                    backgroundColor: 'rgba(42, 157, 143, 0.5)',
                    borderColor: 'rgba(42, 157, 143, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }

    if (visitantesCanvas) {
        const visitantesCtx = visitantesCanvas.getContext('2d');

        new Chart(visitantesCtx, {
            type: 'line',
            data: {
                labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                datasets: [{
                    label: 'Visitantes Mensuales',
                    data: visitantesMensuales, // Datos dinámicos
                    borderColor: 'rgba(42, 157, 143, 1)',
                    backgroundColor: 'rgba(42, 157, 143, 0.2)',
                    borderWidth: 2,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }
});
