const liElo = document.querySelectorAll('.elo');
const subLi =document.querySelectorAll('.sub-li');
console.log(liElo);
console.log(subLi);
liElo.forEach( li => {
    li.addEventListener('click', () => {
        let subliSelected = li.lastChild.previousElementSibling;
        console.log(subliSelected)
        subliSelected.classList.toggle('displayNone');
    })
});