<?php
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class MyWebSocket implements MessageComponentInterface {
    protected $clients;

    public function __construct() {
        $this->clients = new \SplObjectStorage;
    }

    public function onOpen(ConnectionInterface $conn) {
        // Called when a new WebSocket connection is established
        $this->clients->attach($conn);
        echo "New connection: {$conn->resourceId}\n";
    }

    public function onMessage(ConnectionInterface $from, $msg) {
        // Called when a message is received from a WebSocket connection
        echo "Received message from {$from->resourceId}: $msg\n";

        foreach ($this->clients as $client) {
            $client->send($msg); // Send the received message to all connected clients
        }
    }

    public function onClose(ConnectionInterface $conn) {
        // Called when a WebSocket connection is closed
        $this->clients->detach($conn);
        echo "Connection closed: {$conn->resourceId}\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        // Called when an error occurs
        echo "Error: {$e->getMessage()}\n";
        $conn->close();
    }
}
