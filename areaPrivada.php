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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,
				initial-scale=1.0">
    <title>Workspace</title>
    <link rel="stylesheet" href="style/area_privada.css">
    <link rel="stylesheet" href="style/area_privada.css">
</head>

<body>

    <!-- for header part -->
    <header>

        <div class="logosec">
            <div class="logo">Workspace</div>
            <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210182541/Untitled-design-(30).png" class="icn menuicn" id="menuicn" alt="menu-icon">
        </div>

        <div class="message">
            <div class="dp">
                <img src="imagens/login.png" class="dpicn" alt="dp">
            </div>
        </div>

    </header>

    <div class="main-container">
        <div class="navcontainer">
            <nav class="nav">
                <div class="nav-upper-options">
                    <div class="nav-option option1">
                        <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210182148/Untitled-design-(29).png" class="nav-img" alt="dashboard">
                        <h3> Dashboard</h3>
                    </div>

                    <div class="option2 nav-option">
                        <a href="https://convertice4.netlify.app/" target="_blank">
                            <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183322/9.png" class="nav-img" alt="articles">
                            <h3> Convertice</h3>
                        </a>
                    </div>


                    <div class="nav-option option3">
                        <a href="http://localhost/relatorio_glpi/" target="_blank">
                            <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183320/5.png" class="nav-img" alt="report">
                            <h3> Relatorio de atividades</h3>
                        </a>
                    </div>

                    <div class="nav-option option4">
                    <?php if (isset($_SESSION['acesso']) && $_SESSION['acesso'] == 1) : ?>
                        <a href="http://localhost/Relatorio_tecnico_processos/" target="_blank">
                        <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183321/6.png" class="nav-img" alt="institution">
                        <h3> Relatorio de Processos </h3>
                        <?php endif; ?>
                        </a>
                    </div>

                    <div class="nav-option option5">
                    <?php if (isset($_SESSION['acesso']) && $_SESSION['acesso'] == 1) : ?>
                    <a href="http://localhost/extra%c3%a7%c3%a3o_glpi/" target="_blank"> 
                    <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183323/10.png" class="nav-img" alt="blog">
                    <h3>R. estatisticas</h3>
                    <?php endif; ?>
                    </a>
                    </div>
                    <div class="nav-option option6">
                        <a href="forum.php" target="_blank"> 
                        <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183320/4.png" class="nav-img" alt="settings">
                        <h3> Fórum</h3>
                        
                    </div>

                    <div class="nav-option logout" onclick="logout()">
                        <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183321/7.png" class="nav-img" salt="logout">
                        <h3>Logout</h3>
                    </div>

                    <script>
                        function logout() {
                            window.location.href = 'sair.php';
                        }
                    </script>


                </div>
            </nav>
        </div>
        <div class="main">

            <div class="searchbar2">
                <input type="text" name="" id="" placeholder="Search">
                <div class="searchbtn">
                    <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210180758/Untitled-design-(28).png" class="icn srchicn" alt="search-button">
                </div>
            </div>

            <div class="report-container">
                <div class="report-header">
                    <h1 class="recent-Articles">Documentação</h1>
                </div>

                <div class="report-body">
                    <div class="report-topic-heading">
                        <h3 class="t-op"></h3>
                        <h3 class="t-op"></h3>
                        <h3 class="t-op"></h3>
                        <h3 class="t-op"></h3>
                    </div>

                    <div class="items">
                        <div class="item1">
                            <h3 class="t-op-nextlvl">Convertice </h3>
                            <h3 class="t-op-nextlvl"> Utilize o link a frente</h3>
                            <h3 class="t-op-nextlvl"></h3>
                            <a href="https://orginstitutobrasil-my.sharepoint.com/:w:/g/personal/joao_pedro_orginstitutobrasil_onmicrosoft_com/ES92k2_Bry9PkbuwQW5_gAIBk-0eWMAKRmic5AQ0jYmm8w?e=3zdKsv" target="_blank" class="button">Convertice</a>
                        </div>

                        <div class="item1">
                            <h3 class="t-op-nextlvl">Relatorio de Atividades</h3>
                            <h3 class="t-op-nextlvl">Utilize o link a frente</h3>
                            <h3 class="t-op-nextlvl"></h3>
                            <a href="https://docs.google.com/document/d/13FenxFltO14482AeLnroEu1DOBksB6APxpE4CkH8Bz0/edit" target="_blank" class="button">R. atividades</a>
                        </div>

                        <div class="item1">
                            <h3 class="t-op-nextlvl">Relatorio de Processos</h3>
                            <h3 class="t-op-nextlvl">Utilize o link a frente</h3>
                            <h3 class="t-op-nextlvl"></h3>
                            <a href="https://orginstitutobrasil-my.sharepoint.com/:w:/g/personal/joao_pedro_orginstitutobrasil_onmicrosoft_com/ES92k2_Bry9PkbuwQW5_gAIBk-0eWMAKRmic5AQ0jYmm8w?e=3zdKsv" target="_blank" class="button">R. Processos</a>
                        </div>

                        <div class="item1">
                            <h3 class="t-op-nextlvl">Relatorio de estatisticas</h3>
                            <h3 class="t-op-nextlvl">Utilize o link a frente</h3>
                            <h3 class="t-op-nextlvl"></h3>
                            <a href="https://docs.google.com/document/d/1MVoKnJbJz5UljBIFiN52CAF-JblOcCb_OnlmRwF8GjQ/edit?usp=sharing" target="_blank" class="button">R. estatisticas</a>
                        </div>

                        
                        


                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="./index.js">
</script>
</body>

</html>