const links = document.querySelectorAll('.nav-link')


links.forEach(link => {
    link.addEventListener('click', (e) => {

        if(link.classList.contains('active')){
            link.classList.remove('active')
        }
        
        link.classList.add('active')
    })
})

