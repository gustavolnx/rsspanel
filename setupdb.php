<?php
$db = new SQLite3('new_users.sqlite');

$db->exec('CREATE TABLE IF NOT EXISTS users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    username TEXT NOT NULL UNIQUE,
    password TEXT NOT NULL
)');

$db->exec('CREATE TABLE IF NOT EXISTS default_words (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    user_id INTEGER,
    word TEXT,
    FOREIGN KEY (user_id) REFERENCES users(id)
)');
?>
