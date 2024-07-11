<?php
session_start();

// Verifique se o usuário está logado
if (!isset($_SESSION['id'])) {
    // Retorne uma mensagem de erro se o usuário não estiver logado
    echo json_encode(['status' => false, 'message' => 'Usuário não logado.']);
    exit();
}

$user_id = $_SESSION['id'];

// Verifique se foi enviado um arquivo
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    // Conecte-se ao banco de dados (ajuste conforme suas configurações)
    include '../config.php'; // Ajuste o caminho conforme necessário

    // Verifique a conexão com o banco de dados
    if ($conn->connect_error) {
        echo json_encode(['status' => false, 'message' => 'Erro na conexão com o banco de dados: ' . $conn->connect_error]);
        exit();
    }

    // Verifique se o arquivo foi carregado corretamente
    if ($_FILES['file']['error'] !== UPLOAD_ERR_OK) {
        echo json_encode(['status' => false, 'message' => 'Erro no upload do arquivo: ' . $_FILES['file']['error']]);
        exit();
    }

    // Caminho onde os arquivos serão salvos (ajuste conforme necessário)
    $uploadDir = './uploads/';

    // Verifique se o diretório de uploads existe, se não, crie-o
    if (!is_dir($uploadDir)) {
        if (!mkdir($uploadDir, 0777, true)) {
            echo json_encode(['status' => false, 'message' => 'Falha ao criar o diretório de uploads.']);
            exit();
        }
    }

    // Verificar e excluir a imagem antiga
    $sql = "SELECT imagem FROM usuarios WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $oldImagePath = $row['imagem'];
        if ($oldImagePath && file_exists($oldImagePath)) {
            unlink($oldImagePath);
        }
    }

    $stmt->close();

    // Informações do arquivo
    $fileTmpPath = $_FILES['file']['tmp_name'];
    $fileName = $_FILES['file']['name'];
    $fileSize = $_FILES['file']['size'];
    $fileType = $_FILES['file']['type'];

    // Gere um nome único para o arquivo
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));
    $newFileName = uniqid('', true) . '.' . $fileExtension;
    $destPath = $uploadDir . $newFileName;

    // Movendo o arquivo para o diretório de upload
    if (move_uploaded_file($fileTmpPath, $destPath)) {
        // Atualize o caminho da imagem no banco de dados
        $sql = "UPDATE usuarios SET imagem = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('si', $destPath, $user_id);

        if ($stmt->execute()) {
            // Sucesso no upload e na atualização do banco de dados
            echo json_encode(['status' => true, 'message' => 'Upload e atualização no banco de dados realizados com sucesso.', 'filePath' => $destPath]);
        } else {
            // Erro ao atualizar o banco de dados
            echo json_encode(['status' => false, 'message' => 'Erro ao atualizar o banco de dados.']);
        }

        $stmt->close();
    } else {
        // Erro ao mover o arquivo para o diretório de upload
        echo json_encode(['status' => false, 'message' => 'Erro ao mover o arquivo para o diretório de upload.']);
    }

    $conn->close();
} else {
    // Se não foi enviado um arquivo
    include '../config.php'; // Ajuste o caminho conforme necessário

    if ($conn->connect_error) {
        echo json_encode(['status' => false, 'message' => 'Erro na conexão com o banco de dados: ' . $conn->connect_error]);
        exit();
    }

    // Atualize a coluna imagem para vazio
    $sql = "UPDATE usuarios SET imagem = '' WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $user_id);

    if ($stmt->execute()) {
        echo json_encode(['status' => true, 'message' => 'A imagem foi removida com sucesso.']);
    } else {
        echo json_encode(['status' => false, 'message' => 'Erro ao atualizar o banco de dados.']);
    }

    $stmt->close();
    $conn->close();
}
?>
