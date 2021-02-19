function popUp() {
    console.log('sucess')
    var popUpElement = document.getElementById('popUpModal');
    popUpElement.addEventListener('click', () => {

        popUpElement.style.display = 'none';
    })

}