<?php 
// 1. String de conexão para o SEU banco local
$string_conexao = "pgsql:host=10.153.0.81;port=5432;dbname=aluno;user=postgres;password=postgres";

try {
    $conn = new PDO($string_conexao);
} catch (PDOException $e) {
    echo "Não conectado";
    exit;
}

// 2. A instrução SQL (ajustada para pegar todos os campos necessários)
$varSQL = "SELECT id, nome, celular FROM aluno";
$select = $conn->query($varSQL);

// Início da Tabela HTML
echo "<table border='1'>";
echo "<tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Celular</th>
        <th>Editar</th>
      </tr>";

// 3. O laço while que você já conhece
while($linha = $select->fetch())
{
    // Pegando os dados das colunas
    $id = $linha['id'];
    $nome = $linha['nome'];
    $celular = $linha['celular'];

    echo "<tr>";
    echo "<td>$id</td>";
    echo "<td>$nome</td>";
    echo "<td>$celular</td>";
    
    // 4. A coluna com o ícone e o link dinâmico
    echo "<td>
            <a href='mostra.php?id=$id'>
                <img height='40' src='https://cdn-icons-png.flaticon.com/512/1828/1828911.png'>
            </a>
          </td>";
    echo "</tr>";
}

echo "</table>";
?>
<style>
    /* Configuração geral do corpo */
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f9;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 20px;
    }

    h2 {
        color: #333;
    }

    /* Estilo da Tabela */
    table {
        border-collapse: collapse;
        width: 80%;
        max-width: 800px;
        background-color: #fff;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1); /* Sombra suave */
        border-radius: 8px;
        overflow: hidden; /* Para as bordas arredondadas funcionarem */
    }

    /* Cabeçalho */
    th {
        background-color: #4CAF50; /* Verde */
        color: white;
        padding: 12px;
        text-align: left;
    }

    /* Células */
    td {
        padding: 10px;
        border-bottom: 1px solid #ddd;
        color: #555;
    }

    /* Efeito Zebra */
    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    /* Efeito de Hover (Passar o mouse) */
    tr:hover {
        background-color: #e9f5e9;
    }

    /* Estilo da imagem do lápis */
    img {
        transition: transform 0.2s; /* Animaçãozinha ao passar o mouse */
    }

    img:hover {
        transform: scale(1.2); /* Aumenta um pouco o ícone */
    }
</style>