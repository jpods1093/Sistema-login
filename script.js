
// Carregar tópicos e posts existentes aqui via AJAX ou outro método adequado
function submitPost() {
    var postContent = document.getElementById("post-content").value;
    
    // Código para enviar os dados do formulário para o arquivo PHP via AJAX ou outro método adequado
    
    // Limpar o campo de texto
    document.getElementById("post-content").value = "";
}

// Outro código JavaScript do seu fórum...
document.getElementById('search-form').addEventListener('submit', function (event) {
    event.preventDefault(); // Impede o envio do formulário

    // Obtenha o valor da consulta de busca
    var query = document.getElementById('search-input').value;

    // Faça uma solicitação AJAX para o arquivo processa_busca.php
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Atualize a div de resultados da busca com a resposta
            document.getElementById('search-results').innerHTML = xhr.responseText;
        }
    };
    xhr.open('GET', 'processa_busca.php?query=' + encodeURIComponent(query), true);
    xhr.send();
});


