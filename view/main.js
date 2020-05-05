//////////////////////////// define functions 
const resetQuoteListForm = () => {
    //reset select menus
    const selectMenuOptions = document.querySelectorAll("#make_selection select option");
    selectMenuOptions.forEach(option => {
        if (option.text == "View All Authors" || 
            option.text == "View All Categories") {
                option.selected = true;
                option.defaultSelected = true;
        } else {
            option.selected = false;
            option.defaultSelected = false;
        }
    });
    //reset radio buttons
   // document.getElementById("sortByPrice").checked = true;
    //document.getElementById("sortByPrice").defaultChecked = true;
    //document.getElementById("sortByYear").checked = false;
    //document.getElementById("sortByYear").defaultChecked = false;
}
// call initialize function when script loads
const init = () => {
    document.getElementById("resetQuoteListForm").addEventListener("click", resetQuoteListForm);
}
//////////////////////////// end function definitions

//calling initialize function
init();


