//grab everything we need
const btn = document.querySelector("button.mobile-menu-button");
const menu = document.querySelector(".mobile-menu");

//add event listeners
btn.addEventListener("click", () => {
    menu.classList.toggle("hidden");
});

window.addEventListener('DOMContentLoaded', () => {
    const dropBtn = document.querySelector('#dropBtn');
    const dropdown = document.querySelector('#dropdown')
    dropBtn.addEventListener('click', () => {
        dropdown.classList.toggle('hidden');
        dropdown.classList.toggle('flex');
    })
    // const dropBtn2 = document.querySelector('#dropBtn2');
    // const dropdown2 = document.querySelector('#dropdown2')
    // dropBtn2.addEventListener('click', () => {
    //     dropdown2.classList.toggle('hidden');
    //     dropdown2.classList.toggle('flex');
    // })
    const dropBtnM = document.querySelector('#dropBtnM');
    const dropdownM = document.querySelector('#dropdownM')
    dropBtnM.addEventListener('click', () => {
        dropdownM.classList.toggle('hidden');
        dropdownM.classList.toggle('flex');
    })
    // const dropBtnM2 = document.querySelector('#dropBtnM2');
    // const dropdownM2 = document.querySelector('#dropdownM2')
    // dropBtnM2.addEventListener('click', () => {
    //     dropdownM2.classList.toggle('hidden');
    //     dropdownM2.classList.toggle('flex');
    // })
})

window.onclick = function(e) {
    if (!e.target.matches('.dropBtn')) {
        var myDropdown = document.getElementById("dropdown");
        if (myDropdown.classList.contains('flex')) {
            myDropdown.classList.remove('flex');
            myDropdown.classList.add('hidden');
        }
    }
    // if (!e.target.matches('.dropBtn2')) {
    //     var myDropdown = document.getElementById("dropdown2");
    //     if (myDropdown.classList.contains('flex')) {
    //         myDropdown.classList.remove('flex');
    //         myDropdown.classList.add('hidden');
    //     }
    // }
    if (!e.target.matches('.dropBtnM')) {
        var myDropdown = document.getElementById("dropdownM");
        if (myDropdown.classList.contains('flex')) {
            myDropdown.classList.remove('flex');
            myDropdown.classList.add('hidden');
        }
    }
    // if (!e.target.matches('.dropBtnM2')) {
    //     var myDropdown = document.getElementById("dropdownM2");
    //     if (myDropdown.classList.contains('flex')) {
    //         myDropdown.classList.remove('flex');
    //         myDropdown.classList.add('hidden');
    //     }
    // }
}