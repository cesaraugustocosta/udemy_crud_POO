<?php
$conn = new PDO("mysql:host=localhost;dbname=cadastro-escolar", 'root', '');

$nome = 'Cesar Augusto';
$idade = 'codigo malicioso';
$stmt = $conn->prepare("SELECT nome, idade FROM usuario WHERE idade > :idade");

$smtp->bindvalue(':nome', $nome);
$smtp->bindvalue(':idade', $idade);
$smtp->execute();