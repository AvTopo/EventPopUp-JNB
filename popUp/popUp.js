function popUp() {
    console.log('success')
    var popUpElement = document.getElementById('popUpModal');
    popUpElement.addEventListener('click', () => {

        popUpElement.style.display = 'none';
    })

}
