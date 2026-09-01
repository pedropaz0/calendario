document.addEventListener('DOMContentLoaded', () => {
    // Filtro de data ao alterar a seleção
    const datePicker = document.getElementById('datePicker');
    if (datePicker) {
        datePicker.addEventListener('change', (e) => {
            window.location.href = `index.php?data=${e.target.value}`;
        });
    }

    // Confirmação ao apagar tarefa
    const deleteButtons = document.querySelectorAll('.btn-delete');
    deleteButtons.forEach(button => {
        button.addEventListener('click', (e) => {
            if (!confirm('Deseja realmente excluir esta tarefa?')) {
                e.preventDefault();
            }
        });
    });
});