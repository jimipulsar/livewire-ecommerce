function getOption() {
    selectElement =
        document.querySelector('.catSel');

    var $this = $(this);
    if(  $this.data('clicked', true)) {

        let sel = document.querySelector('.mainCatSel');
        let selCat = document.getElementById("categories");
        let valuez = selectElement.options[selectElement.selectedIndex].value; // or just sel.value
        let text = selectElement.options[selectElement.selectedIndex].text;


        sel.selectedIndex = valuez;
        console.log(valuez, text);
    }

    // let output = selectElement.options[selectElement.selectedIndex].value;
    // document.querySelector('.mainCatSel').textContent = output;
    // document.getElementById('categories').value = output;

}

// let show = () => {
//     const sel = document.getElementById("categories"); // or this if only called onchange
//     let value = sel.options[sel.selectedIndex].value; // or just sel.value
//     let text = sel.options[sel.selectedIndex].text;
//     console.log(value, text);
// }
//
// window.addEventListener("load", () => { // on load
//     document.getElementById("categories").addEventListener("change", show); // show on change
//     show(); // show onload
// });
// const selectEl = $('#categories');
//
// selectEl.on('change', () => {
//
// });

