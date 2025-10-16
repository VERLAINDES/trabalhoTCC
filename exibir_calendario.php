<?php
include 'conexao.php';

// Definir dias e turnos
$dias = ["Segunda", "Terça", "Quarta", "Quinta", "Sexta"];
$turnos = ["Manhã", "Tarde", "Noite"];

// Buscar cursos, professores e competências
$sql = "SELECT c.IDcurso, c.nome AS curso,
        p.IDprofessor, p.nome_professor,
        comp.nome AS competencia, comp.carga_horaria
        FROM cursos c
        JOIN competencia comp ON c.competencias = comp.IDcompetencia
        JOIN professor p ON c.professor = p.IDprofessor";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Curso: " . $row["curso"] . 
             " | Professor: " . $row["nome_professor"] . 
             " | Competência: " . $row["competencia"] . "<br>";
    }
} else {
    echo "Nenhum curso encontrado.";
}
?>