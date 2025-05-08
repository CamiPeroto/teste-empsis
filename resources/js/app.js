import './bootstrap';
import $ from 'jquery';
import 'jquery-mask-plugin';

// Alerta confirmação de exclusão
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
    //Fim alerta confirmação de exclusão

    // Função Pesquisar
    document.addEventListener('DOMContentLoaded', () => {
      const searchInput = document.getElementById('search-user');
      const resultsBox = document.getElementById('user-results');
  
      if (!searchInput || !resultsBox) return;
  
      searchInput.addEventListener('keyup', function () {
          const term = this.value;
  
          if (term.length < 3) {
              resultsBox.classList.add('hidden');
              resultsBox.innerHTML = '';
              return;
          }
  
          fetch(`/users/search?term=${encodeURIComponent(term)}`)
              .then(response => response.json())
              .then(users => {
                  let html = '';
  
                  const isCpfSearch = /^\d{2,}$/.test(term);
  
                  if (users.length > 0) {
                      html = users.map(user => {
                          const displayText = isCpfSearch ? user.cpf : user.name;
                          return `
                              <li class="px-4 py-2 hover:bg-gray-300 cursor-pointer"
                                  onclick="window.location.href='/show-user/${user.cpf}'">
                                  ${displayText}
                              </li>
                          `;
                      }).join('');
                  } else {
                      html = '<li class="px-4 py-2 text-gray-500">Nenhum usuário encontrado.</li>';
                  }
  
                  resultsBox.classList.remove('hidden');
                  resultsBox.innerHTML = html;
              });
      });
  
      document.addEventListener('click', function (e) {
          if (!searchInput.contains(e.target) && !resultsBox.contains(e.target)) {
              resultsBox.classList.add('hidden'); 
              searchInput.value = ''; 
          }
      });
  });
// Fim Função Pesquisar

//Máscaras dos inputs

    $(document).ready(function () {
        // Aplica as máscaras
        $('#cpf').mask('000.000.000-00');
        $('#phone_number').mask('(00) 9 0000-0000');
        $('#zip_code').mask('00000-000');

        // Limpa as máscaras antes de enviar o formulário
        $('form').on('submit', function () {
            $('#cpf').val($('#cpf').cleanVal());
            $('#phone_number').val($('#phone_number').cleanVal());
            $('#zip_code').val($('#zip_code').cleanVal());
        });
    });

//Fim máscaras dos inputs