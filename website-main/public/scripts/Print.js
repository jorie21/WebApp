function printTable() {
    let tableToPrint = document.getElementById('scheduleTable').outerHTML;
    let printWindow = window.open('', '_blank');
    printWindow.document.open();
    printWindow.document.write('<html><head><title>Colegio De Montalban</title>');
    
    // Include stylesheets
    let stylesheets = document.querySelectorAll('link[rel="stylesheet"]');
    stylesheets.forEach(function(stylesheet) {
        printWindow.document.write(stylesheet.outerHTML);
    });

    // Add custom styles
    printWindow.document.write('<style>');
    printWindow.document.write('body { margin: 0; }'); 
    printWindow.document.write('.logo { position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: -1; opacity: 0.2; }');
    printWindow.document.write('table { border-collapse: collapse; }'); // Set border-collapse for the table
    printWindow.document.write('</style>');

    // Add logo
    printWindow.document.write('</head><body>');
    printWindow.document.write('<img src="../public/images/cdm-logo.png" class="logo" alt="CDM Logo">');

    // Add table
    printWindow.document.write(tableToPrint);
    printWindow.document.write('</body></html>');
    
    // Finish and print
    printWindow.document.close();
    printWindow.print();
}