import './bootstrap';

window.confirmDelete = function (cpf) {
    Swal.fire({
        title: "Tem certeza ?",
        text: "Essa ação não pode ser desfeita!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Sim, excluir!",
        cancelButtonText: "Cancelar",
      }).then((result)=>{
        if(result.isConfirmed){
            document.getElementById('delete-form-' + cpf).submit();
        }
      })
    }

