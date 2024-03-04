// элементы

buttons = document.querySelectorAll('.calculator__btn');
input = document.querySelector('.calculator__equation')


// обработчик события

const handleButtonNumberClick = (e) => {
    e.preventDefault();
    const symbol = e.target.innerText;
    input.value += symbol;
}


// привязка события

buttons.forEach((element) => {
    element.addEventListener('click', handleButtonNumberClick);
});


