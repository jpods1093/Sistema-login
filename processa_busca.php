<?php
// ... código de conexão ao banco de dados
session_start();

$host = 'localhost'; // substitua pelo nome do host do seu banco de dados
$username = 'root'; // substitua pelo nome de usuário do seu banco de dados
$password = ''; // substitua pela senha do seu banco de dados
$database = 'projeto_login'; // substitua pelo nome do seu banco de dados

// Criar uma nova conexão com o banco de dados
$conn = new mysqli($host, $username, $password, $database);

// Verificar se houve erros ao conectar ao banco de dados
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}


// Verificar se o parâmetro de busca está definido
if (isset($_GET['query'])) {
    $searchQuery = $_GET['query'];

    // Consulta para buscar tópicos que correspondem à consulta de busca
    $topicSearchQuery = "SELECT * FROM topics WHERE title LIKE '%$searchQuery%'";
    $topicResult = $conn->query($topicSearchQuery);

    // Consulta para buscar posts que correspondem à consulta de busca
    $postSearchQuery = "SELECT * FROM posts WHERE content LIKE '%$searchQuery%'";
    $postResult = $conn->query($postSearchQuery);

    // Exibir os resultados da busca de tópicos
    echo "<h2>Resultados da busca de tópicos:</h2>";
    if ($topicResult->num_rows > 0) {
        while ($topicRow = $topicResult->fetch_assoc()) {
            $topicTitle = $topicRow['title'];
            // Exibir o título do tópico encontrado
            echo "<p>$topicTitle</p>";
        }
    } else {
        echo "<p>Nenhum resultado de tópico encontrado.</p>";
    }

    // Exibir os resultados da busca de posts
    echo "<h2>Resultados da busca de posts:</h2>";
    if ($postResult->num_rows > 0) {
        while ($postRow = $postResult->fetch_assoc()) {
            $postContent = $postRow['content'];
            // Exibir o conteúdo do post encontrado
            echo "<p>$postContent</p>";
        }
    } else {
        echo "<p>Nenhum resultado de post encontrado.</p>";
    }
} else {
    // Redirecionar para a página do fórum se a consulta de busca não estiver definida
    header("Location: forum.html");
    exit;
}
