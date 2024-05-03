<?php
$dsn = 'mysql:host=localhost;dbname=cadastro';
$username = 'root';
$password = '';

try {
    $pdo = new PDO($dsn, $username, $password);
    
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $nome = $_POST['nome'];
        $data_nascimento = $_POST['data_nascimento'];
        $cidade = $_POST['cidade'];
        $bairro = $_POST['bairro'];

        $sql = "INSERT INTO lista (nome, data_nascimento, cidade, bairro)
        VALUE (:nome, :data_nascimento, :cidade, :bairro)";

        $smt = $pdo->prepare($sql);

        $stmt->bindValue(':nome', $nome, PDO::PARAM_STR);
        $stmt->bindValue(':data_nascimento', $data_nascimento, PDO::PARAM_STR);
        $stmt->bindValue(':cidade', $nome, PDO::PARAM_STR);
        $stmt->bindValue(':bairro', $bairro, PDO::PARAM_STR);

        $stmt->execute();

        echo "Dados inseridos com sucesso!";
    }
} catch(PDOException $e){

    echo "Erro: " . $e->getMessage();
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <title>Formulário PHP PDO com Tailwind CSS</title>
    <link
            href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css"
            rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto py-8">
        <h2 class="text-2xl font-bold mb-4">Insira seus dados:</h2>
        <form method="POST" class="max-w-lg">
            <div class="mb-4">
                <label for="nome" class="block text-gray-700">Nome:</label>
                <input
                    type="text"
                    id="nome"
                    name="nome"
                    required="required"
                    class="form-input mt-1 block w-full">
            </div>
            
            <div class="mb-4">
                <label for="data_nascimento" class="block text_gray-700">
                    Data de Nascimento:
                </label>
                <input
                    type="date"
                    id="data_nascimento"
                    name="data_nascimento"
                    required="required"
                    class="form-input mt-1 block w-full">
            </div>

            <div class="mb-4">
                <label for="cidade" class="block text-gray-700">Cidade:</label>
                <input
                    type="text"
                    id="cidade"
                    name="cidade"
                    required="required"
                    class="form-input mt-1 block w-full">
            </div>

            <div class="mb-4">
                <label for="bairro" class="block text-gray-700">Bairro:</label>
                <input
                    type="text"
                    id="bairro"
                    name="bairro"
                    required="required"
                    class="form-input mt-1 block w-full">
            </div>

            <button
                type="submit"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Enviar</button>
        </form>
            </div>
    
</body>
</html>