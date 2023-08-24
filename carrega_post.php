<?php
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

//$title = $_POST['title'];
 // substitua pelo nome do campo do formulário que contém o título
//$content = $_POST['content']; // substitua pelo nome do campo do formulário que contém o conteúdo

// Inserção de novo tópico
//$insertTopicQuery = "INSERT INTO topics (title) VALUES ('$title')";
//mysqli_query($conn, $insertTopicQuery);

// Inserção de novo post
//$topicId = mysqli_insert_id($conn); // obtém o ID do tópico recém-inserido
//$insertPostQuery = "INSERT INTO posts (topic_id, content) VALUES ('$topicId', '$content')";
//mysqli_query($conn, $insertPostQuery);

// Consulta para obter os posts existentes
$sql = "SELECT * FROM posts";
$result = $conn->query($sql);

// Verificar se há resultados e montar um array com os dados dos posts
$posts = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $post = array(
            'id' => $row['id'],
            'content' => $row['content']
            // Adicione outros campos do post, se necessário
        );
        $posts[] = $post;
    }
}

// Fechar a conexão com o banco de dados
$conn->close();

// Retornar os posts como uma resposta JSON
header('Content-Type: application/json');
echo json_encode($posts);

?>