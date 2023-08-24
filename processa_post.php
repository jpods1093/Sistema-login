<?php
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

// Verificar se o ID do usuário está armazenado na sessão
if (isset($_SESSION['id_usuario'])) {
    $userID = $_SESSION['id_usuario'];

    $content = $_POST['content'];
    $title = $_POST['title'];
    $parentPostID = $_POST['parent_post_id']; // Novo campo adicionado para receber o ID do post pai (resposta)

    // Verificar se é uma resposta ou um novo post
    if (!empty($parentPostID)) {
        // Recupere o ID do tópico associado ao post pai
        $getTopicIdQuery = "SELECT topic_id FROM posts WHERE id = '$parentPostID'";
        $result = $conn->query($getTopicIdQuery);
        
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $topicId = $row['topic_id'];

            // Inserção de nova resposta
            $insertReplyQuery = "INSERT INTO posts (topic_id, content, id_usuario, parent_post_id) VALUES ('$topicId', '$content', '$userID', '$parentPostID')";
            if ($conn->query($insertReplyQuery) === TRUE) {
                echo "Resposta adicionada com sucesso";
            } else {
                echo "Erro ao adicionar a resposta: " . $conn->error;
            }
        } else {
            echo "Erro ao recuperar o tópico associado ao post pai";
        }
    } else {
        // Inserção de novo tópico
        $insertTopicQuery = "INSERT INTO topics (title) VALUES ('$title')";
        if ($conn->query($insertTopicQuery) === TRUE) {
            $topicId = $conn->insert_id; // Obtém o ID do tópico recém-inserido

            // Inserção de novo post
            $insertPostQuery = "INSERT INTO posts (topic_id, content, id_usuario) VALUES ('$topicId', '$content', '$userID')";
            if ($conn->query($insertPostQuery) === TRUE) {
                echo "Post adicionado com sucesso";
            } else {
                echo "Erro ao adicionar o post: " . $conn->error;
            }
        } else {
            echo "Erro ao adicionar o tópico: " . $conn->error;
        }
    }
} else {
    // Lógica de tratamento se o ID do usuário não estiver disponível na sessão
}

// Fechar a conexão com o banco de dados
$conn->close();
?>
