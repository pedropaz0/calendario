document.addEventListener('DOMContentLoaded', () => {
    const datePicker = document.querySelector('#data_filtro');
    
    if (datePicker) {
        datePicker.addEventListener('change', (e) => {
            const novaData = e.target.value;
            window.location.href = `index.php?data=${novaData}`;
        });
    }

    const deleteButtons = document.querySelectorAll('.btn-delete');
    deleteButtons.forEach(btn => {
        btn.addEventListener('click', (e) => {
            if (!confirm('Tem certeza que deseja apagar esta tarefa?')) {
                e.preventDefault();
            }
        });
    });
});