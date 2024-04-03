// function getOption() {
//     selectElement =
//         document.querySelector('.catSel');
//
//     var $this = $(this);
//     if(  $this.data('clicked', true)) {
//
//         let sel = document.querySelector('.mainCatSel');
//         let selCat = document.getElementById("categories");
//         let valuez = selectElement.options[selectElement.selectedIndex].value; // or just sel.value
//         let text = selectElement.options[selectElement.selectedIndex].text;
//
//         // sel.selectedIndex = valuez;
//         console.log(valuez, text);
//     }
//
//     // let output = selectElement.options[selectElement.selectedIndex].value;
//     // document.querySelector('.mainCatSel').textContent = output;
//     // document.getElementById('categories').value = output;
//
// }

    $('.catSel').on('click',function(){
        let selectElement = document.querySelector('.catSel');
        let values = selectElement.options[selectElement.selectedIndex].value;
        let text = selectElement.options[selectElement.selectedIndex].text;
        let id = $(this).find('option:selected').val();
        let sel = document.querySelector('.mainCatSel');
        // $('.mainCatSel').val(valuez);
        // $(".mainCatSel").val(values).change();
        // $('.mainCatSel').append(values);
        // sel.selectedIndex = values;
        console.log(id, text);
    });


