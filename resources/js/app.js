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

    document.addEventListener('DOMContentLoaded', () => {
      const searchInput = document.getElementById('search-user');
      const resultsBox = document.getElementById('user-results');
  
      if (!searchInput || !resultsBox) return;
  
      // Evento de input para capturar as alterações no campo de pesquisa
      searchInput.addEventListener('keyup', function () {
          const term = this.value;
  
          // Se o termo tiver menos de 3 caracteres, esconde os resultados e limpa
          if (term.length < 3) {
              resultsBox.classList.add('hidden');
              resultsBox.innerHTML = '';
              return;
          }
  
          // Faz a requisição para buscar usuários
          fetch(`/users/search?term=${encodeURIComponent(term)}`)
              .then(response => response.json())
              .then(users => {
                  let html = '';
  
                  // Verifica se é uma busca por CPF (pelo menos 2 números)
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
  
                  // Exibe os resultados na caixa
                  resultsBox.classList.remove('hidden');
                  resultsBox.innerHTML = html;
              });
      });
  
      // Evento para fechar o dropdown e limpar o input se o usuário clicar fora
      document.addEventListener('click', function (e) {
          if (!searchInput.contains(e.target) && !resultsBox.contains(e.target)) {
              resultsBox.classList.add('hidden'); // Esconde a lista de resultados
              searchInput.value = ''; // Limpa o valor do input
          }
      });
  });
