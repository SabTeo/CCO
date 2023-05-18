function prova(){
    const dropdowns= document.querySelectorAll(".dropdown");
    dropdowns.forEach(dropdown =>{
        const select=dropdown.querySelector('.dropbtn');
        const triangolo=dropdown.querySelector('.triangolino ');
        const menu=dropdown.querySelector('.dropdown-content');
        const options=dropdown.querySelectorAll('.dropdown-content li');
        const selected=dropdown.querySelector('.selected');
        select.addEventListener('click',()=>{
             /*select.classList.toggle('select-clicked');*/
            triangolo.classList.toggle('triangolino-rotate');
            menu.classList.toggle('menu-open');
        });
        options.forEach(option =>{
            option.addEventListener('click',() =>{
                selected.innerText=option.innerText;
                console.log(selected.innerText);
                console.log(option.innerText);
                /*select.classList.remove('select-clicked');*/
                triangolo.classList.remove('triangolino-rotate');
                menu.classList.remove('menu-open');
                options.forEach(option=>{ 
                    option.classList.remove('active');
                });
            option.classList.add('active');
            });
        });
    });
}