//This is a Script for Function Design only
let activeButtonId = null;

function showContent(contentId, buttonId) {
    var allContents = document.querySelectorAll('.content');
    allContents.forEach(function(content) {
        content.style.display = 'none';
        content.classList.remove('active');
    });

    var selectedContent = document.getElementById(contentId);
    if (selectedContent) {
        setTimeout(function() {
            selectedContent.style.display = 'block';
            selectedContent.classList.add('active');
        }, 200);
    }
    if (buttonId) {
        if (activeButtonId) {
            const prevActiveButton = document.getElementById(activeButtonId);
            prevActiveButton.classList.remove('active');
        }
        const currentButton = document.getElementById(buttonId);
        currentButton.classList.add('active');
        activeButtonId = buttonId;
    }
}

// Show the first topic by default
document.addEventListener("DOMContentLoaded", function() {
    showContent('content1', 'button1');
});

//LINKING PAGES TOGETHER
//Mathematics
function mathematics() {
    setTimeout(function() {
        window.location.href = '../Content/math-contents/math.php';
    }, 1000); // 1000 milliseconds = 1 second
}
//English
function english() {
    setTimeout(function() {
        window.location.href = '../Content/english-contents/english.php';
    }, 1000); 
}
//Science
function science() {
    setTimeout(function() {
        window.location.href = '../Content/science-contents/science.php';
    }, 1000);
}

//DELAY IN COURSE PANEL
document.addEventListener("DOMContentLoaded", function() {
    var delayInMilliseconds = 1000;
    function redirect_to_mainpage() {
    window.location.href = "../User-interface/Login_form/index.php";
    }
    function redirect_aboutus() {
    window.location.href = "../User-interface/Login_form/index.php #aboutus";
    }

    document.getElementById("home").addEventListener("click", function(event) {
    event.preventDefault();
    setTimeout(redirect_to_mainpage, delayInMilliseconds);
    });

    document.getElementById("aboutus").addEventListener("click", function(event) {
    event.preventDefault();
    setTimeout(redirect_aboutus, delayInMilliseconds);
    });
});

//LIGHTMODE AND DARKMODE
function toggleMode() {
    const body = document.body;
    const button = document.getElementById('modeToggleBtn'); // Assuming your button has an ID

    body.classList.toggle('light-mode');
    body.classList.toggle('dark-mode');

    // Update button text based on the current mode
    if (body.classList.contains('dark-mode')) {
        button.textContent = 'Light Mode';
        document.querySelector('.hover-btn').title = 'Toggle Light Mode';
    } else {
        button.textContent = 'Dark Mode';
        document.querySelector('.hover-btn').title = 'Toggle Dark Mode';
    }
    button.style.backgroundColor = (button.style.backgroundColor === 'white') ? 'black' : 'white';
    button.style.color = (button.style.color === 'black') ? 'white' : 'black';
}

  

