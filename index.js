
    let menuicn = document.querySelector(".menuicn");
    let nav = document.querySelector(".navcontainer");

    menuicn.addEventListener("click", () => {
        nav.classList.toggle("navclose");
    })
    function toggleDropdown() {
        var dropdownMenu = document.getElementById("dropdownMenu");
        dropdownMenu.style.display = (dropdownMenu.style.display === 'block') ? 'none' : 'block';
    }

    // Fechar o dropdown quando o usuário clica fora dele
    window.onclick = function(event) {
        if (!event.target.matches('.dropdown') && !event.target.matches('.dropdown-btn')) {
            var dropdownMenus = document.getElementsByClassName("dropdown-content");
            for (var i = 0; i < dropdownMenus.length; i++) {
                var openDropdown = dropdownMenus[i];
                openDropdown.style.display = 'none';
            }
        }
    }