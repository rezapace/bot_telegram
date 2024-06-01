<?php

use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;
use BotMan\Drivers\Telegram\TelegramDriver;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Conversations\Conversation;

require_once 'vendor/autoload.php';

// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bot_db";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}

$configs = [
    "telegram" => [
        "token" => file_get_contents("private/token.txt")
    ]
];

DriverManager::loadDriver(TelegramDriver::class);
$botman = BotManFactory::create($configs); 

// CRUD Functions
function insertDataCatatan($user_id, $title, $content) {
    global $conn;
    try {
        $stmt = $conn->prepare("INSERT INTO notes (user_id, title, content) VALUES (:user_id, :title, :content)");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->execute();
        return "Note added successfully!";
    } catch(PDOException $e) {
        return "Error: " . $e->getMessage();
    }
}

function viewCatatanUser($user_id) {
    global $conn;
    try {
        $stmt = $conn->prepare("SELECT * FROM notes WHERE user_id = :user_id");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        $notes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (empty($notes)) {
            return "No notes found.";
        }
        $message = "Your notes:\n";
        foreach ($notes as $note) {
            $message .= "ID: " . $note['id'] . "\nTitle: " . $note['title'] . "\nContent: " . $note['content'] . "\n\n";
        }
        return $message;
    } catch(PDOException $e) {
        return "Error: " . $e->getMessage();
    }
}

// BotMan commands
$botman->hears("/start", function (BotMan $bot) {
    $question = Question::create("Welcome to your personal note-taking bot. Use the buttons below to see available commands.")
        ->addButtons([
            Button::create('View Notes')->value('/view_notes'),
            Button::create('Add Note')->value('/add_note')
        ]);

    $bot->reply($question);
});

$botman->hears("/help", function (Botman $bot) {
    $question = Question::create("Here are the available commands. Use the buttons below.")
        ->addButtons([
            Button::create('View Notes')->value('/view_notes'),
            Button::create('Add Note')->value('/add_note')
        ]);

    $bot->reply($question);
});

$botman->hears("/view_notes", function (Botman $bot) {
    try {
        $user = $bot->getUser();
        $id_user = $user->getId();
        $message = viewCatatanUser($id_user);
        $bot->reply($message);
    } catch (TelegramException $e) {
        $bot->reply("Error retrieving user info: " . $e->getMessage());
    }
});

$botman->hears("/add_note {title}_{content}", function (Botman $bot, $title, $content) {
    try {
        $user = $bot->getUser();
        $id_user = $user->getId();
        $message = insertDataCatatan($id_user, $title, $content);
        $bot->reply($message);
    } catch (TelegramException $e) {
        $bot->reply("Error retrieving user info: " . $e->getMessage());
    }
});

$botman->listen();
?>