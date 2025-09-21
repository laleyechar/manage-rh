const barreCentrale = document.getElementById('barreCentrale')
      const barreSecond = document.getElementById('barreSecond')
      const overlayRecherche = document.getElementById('overlayRecherche')
      barreCentrale.addEventListener("click", ()=>{
          event.preventDefault()
          barreSecond.classList.remove('hidden')
          overlayRecherche.classList.remove('hidden')
      }) 
      overlayRecherche.addEventListener("click", ()=>{
          barreSecond.classList.add('hidden')
          overlayRecherche.classList.add('hidden')
      })