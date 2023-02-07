document.querySelector("#search").addEventListener('input', function() {
    for (var i = 0; i < document.querySelectorAll('.tasks').length; i++) {
        if (document.querySelectorAll('.tasks')[i].textContent.includes(document.querySelector("#search").value)) {
            document.querySelectorAll('.tasks')[i].parentElement.style.display = "block";
        } else {
            document.querySelectorAll('.tasks')[i].parentElement.style.display = "none";
        }
    }
})