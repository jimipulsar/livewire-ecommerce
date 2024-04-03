$('.catSel').on('click', function () {
    document.querySelector('.catSel').addEventListener('change', function () {
        // let values = selectElement.options[selectElement.selectedIndex].value;
//      let text = selectElement.options[selectElement.selectedIndex].text;
        console.log('You selected: ', this.value);
        document.querySelector('.mainCatSel').selectedIndex = this.selectedIndex;

    });
});
