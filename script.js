// Function to filter the table based on search input
function searchTable() {
    const input = document.getElementById("search").value.toUpperCase();
    const table = document.getElementById("dept-table");
    const rows = table.getElementsByTagName("tr");

    for (let i = 1; i < rows.length; i++) {
        const cells = rows[i].getElementsByTagName("td");
        let rowVisible = false;

        for (let j = 0; j < cells.length; j++) {
            const cell = cells[j];

            if (cell && cell.textContent.toUpperCase().indexOf(input) > -1) {
                rowVisible = true;
                break;
            }
        }
        
        rows[i].style.display = rowVisible ? "" : "none";
    }
}
