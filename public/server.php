<?php

ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);
$dbh = new PDO('mysql:host=localhost;dbname=booksite', 'web_user', 'mypass');
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if(!empty($_GET['book_id'])) {
     $query = 'SELECT book.*, 
        genre.name as genre,
        format.name as format,
        author.name as author,
        publisher.name as publisher
        FROM book 
        JOIN author USING(author_id)
        JOIN format USING(format_id)
        JOIN genre USING(genre_id)
        JOIN publisher USING(publisher_id)
        WHERE book_id = :book_id';
    $stmt = $dbh->prepare($query);
    $params = array(':book_id' => (int) $_GET['book_id']);
    $stmt->execute($params);
    $results = $stmt->fetch(PDO::FETCH_ASSOC);
} elseif(!empty($_GET['genre_id'])) {
   $query = 'SELECT book.*, 
        genre.name as genre,
        format.name as format,
        author.name as author,
        publisher.name as publisher
        FROM book 
        JOIN author USING(author_id)
        JOIN format USING(format_id)
        JOIN genre USING(genre_id)
        JOIN publisher USING(publisher_id)
        WHERE genre_id = :genre_id';
    $stmt = $dbh->prepare($query);
    $params = array(':genre_id' => (int) $_GET['genre_id']);
    $stmt->execute($params);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
} elseif(!empty($_GET['format_id'])) {
    $query = 'SELECT book.*, 
        genre.name as genre,
        format.name as format,
        author.name as author,
        publisher.name as publisher
        FROM book 
        JOIN author USING(author_id)
        JOIN format USING(format_id)
        JOIN genre USING(genre_id)
        JOIN publisher USING(publisher_id)
        WHERE format_id = :format_id';
    $stmt = $dbh->prepare($query);
    $params = array(':format_id' => (int) $_GET['format_id']);
    $stmt->execute($params);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
} elseif(!empty($_GET['publisher_id'])) {
    $query = 'SELECT book.*, 
        genre.name as genre,
        format.name as format,
        author.name as author,
        publisher.name as publisher
        FROM book 
        JOIN author USING(author_id)
        JOIN format USING(format_id)
        JOIN genre USING(genre_id)
        JOIN publisher USING(publisher_id)
        WHERE publisher_id = :publisher_id';
    $stmt = $dbh->prepare($query);
    $params = array(':publisher_id' => (int) $_GET['publisher_id']);
    $stmt->execute($params);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
} elseif(!empty($_GET['author_id'])) {
    $query = 'SELECT book.*, 
        genre.name as genre,
        format.name as format,
        author.name as author,
        publisher.name as publisher
        FROM book 
        JOIN author USING(author_id)
        JOIN format USING(format_id)
        JOIN genre USING(genre_id)
        JOIN publisher USING(publisher_id)
        WHERE author_id = :author_id';
    $stmt = $dbh->prepare($query);
    $params = array(':author_id' => (int) $_GET['author_id']);
    $stmt->execute($params);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
}  else {
     $query = 'SELECT book.*, 
        genre.name as genre,
        format.name as format,
        author.name as author,
        publisher.name as publisher
        FROM book 
        JOIN author USING(author_id)
        JOIN format USING(format_id)
        JOIN genre USING(genre_id)
        JOIN publisher USING(publisher_id)';
    $stmt = $dbh->query($query);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
header('Content-Type: application/json');
echo json_encode($results);