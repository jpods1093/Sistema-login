<?php
session_start();

if (!isset($_SESSION['id_usuario'])) :
    header("location: index.php");
    exit;
endif;
?>

<!DOCTYPE html>
<html lang="PT-br">
<head>
    <meta charset="UTF-8">
    <title>Meu Fórum</title>
    <link rel="stylesheet" type="text/css" href="style/forum.css">
    <script src="script.js"></script>
</head>
<body>
    <h1>Bem-vindo ao Fórum</h1>
    
    <div id="search-container">
        <h2>Pesquisar</h2>
        <form id="search-form" action="processa_busca.php" method="get">
            <input type="text" id="search-input" name="query" placeholder="Digite sua busca">
            <button type="submit">Buscar</button>
        </form>
    </div>

    <div id="forum-container">
        <div id="topic-list">
            <h2>Tópicos</h2>
            <ul id="topic-list-ul">
                <!-- Tópicos serão carregados dinamicamente via JavaScript -->
            </ul>
        </div>
        
        <div id="post-list">
            <h2>Posts</h2>
            <ul id="post-list-ul">
                <!-- Posts serão carregados dinamicamente via JavaScript -->
            </ul>
        </div>
    </div>
    
    <div id="search-results">
        <!-- Aqui os resultados da busca serão exibidos dinamicamente -->
    </div>

    <div id="new-post-container">
        <h2>Novo Post</h2>
        <form action="processa_post.php" method="post">
            <input type="text" id="post-content" name="content" placeholder="Digite seu post aqui">
            <input type="text" id="topic-title" name="title" placeholder="Digite o título do tópico">
            <button type="submit">Enviar</button>
        </form>
    </div>

    <template id="reply-form-template" style="display: none;">
  <form class="reply-form" action="processa_post.php" method="post">
    <input type="hidden" class="parent-post-id" name="parent_post_id">
    <textarea class="reply-content" name="content" placeholder="Digite sua resposta"></textarea>
    <button type="submit">Enviar Resposta</button>
  </form>
    </template>


    <script>
        // Função para exibir o formulário de resposta quando o botão "Responder" for clicado
        function showReplyForm(postId) {
    var replyFormTemplate = document.getElementById('reply-form-template');
    var replyFormClone = replyFormTemplate.content.cloneNode(true);
    replyFormClone.querySelector('.parent-post-id').value = postId;

    var postElement = document.getElementById('post-' + postId);
    postElement.appendChild(replyFormClone);

    // Adicionar evento de envio ao formulário de resposta
    var replyForm = postElement.querySelector('.reply-form');
    if (replyForm) {
        replyForm.addEventListener('submit', function (event) {
            event.preventDefault();

            var replyContentField = postElement.querySelector('.reply-content');
            var replyContent = replyContentField.value;

            var formData = new FormData();
            formData.append('content', replyContent);
            formData.append('parent_post_id', postId);

            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        console.log(xhr.responseText);
                        loadPosts(); // Recarrega os posts após enviar a resposta
                    } else {
                        console.error("Erro ao enviar a resposta");
                    }
                }
            };
            xhr.open('POST', 'processa_post.php', true);
            xhr.send(formData);

            replyContentField.value = '';
            postElement.removeChild(replyFormClone);
        });
    }
}



        // Função para carregar os posts existentes
        function loadPosts() {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'carrega_post.php', true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var posts = JSON.parse(xhr.responseText);
                    var postList = document.getElementById('post-list-ul');
                    postList.innerHTML = '';
                    posts.forEach(function(post) {
                        var postId = post.id;
                        var postContent = post.content;

                        var postElement = document.createElement('li');
                        postElement.setAttribute('id', 'post-' + postId);
                        postElement.textContent = postContent;

                        var replyButton = document.createElement('button');
                        replyButton.textContent = 'Responder';
                        replyButton.addEventListener('click', function() {
                            showReplyForm(postId);
                        });

                        postElement.appendChild(replyButton);
                        postList.appendChild(postElement);
                    });
                }
            };
            xhr.send();
        }

        // Carregar os posts existentes ao carregar a página
        window.onload = function() {
            loadPosts();
        };
    </script>
</body>
</html>
