document.addEventListener('DOMContentLoaded', function () {
  const input = document.getElementById('searchInput');
  const resultsBox = document.getElementById('searchResults');
  const resultsList = document.getElementById('resultsList');

  input.addEventListener('input', function () {
    const query = input.value.trim();

    if (query.length < 2) {
      resultsBox.classList.add('hidden');
      resultsList.innerHTML = '';
      return;
    }

    fetch(`/recherche-global?q=${encodeURIComponent(query)}`)
      .then(res => res.json())
      .then(data => {
        resultsList.innerHTML = '';

        if (data.length === 0) {
          resultsList.innerHTML = '<li class="p-3  text-xs">Aucun résultat trouvé.</li>';
        } else {
          data.forEach(item => {
            const li = document.createElement('li');
            li.classList.add('m-4', 'p-2', 'hover:bg-gray-200', 'hover:text-black', 'cursor-pointer', 'hover:rounded-lg');
            li.innerHTML = `
              <div class="text-sm font-bold ">${item.title}</div>
              <div class="text-xs">${item.category}</div>
              ${item.date ? `<div class="text-xs text-gray-500">${item.date}</div>` : ''}
            `;
            li.onclick = () => window.location.href = item.url;
            resultsList.appendChild(li);
          });
        }

        resultsBox.classList.remove('hidden');
      });
  });

  // Masquer les résultats quand on clique en dehors
  document.addEventListener('click', (e) => {
    if (!e.target.closest('#searchInput') && !e.target.closest('#searchResults')) {
      resultsBox.classList.add('hidden');
    }
  });
});