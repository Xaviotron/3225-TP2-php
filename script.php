<?php
// Check if it's a GET request
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Set content type to JSON
    header('Content-Type: application/json');
    
    // Check if a name parameter was provided
    if (isset($_GET['name'])) {
        $name = htmlspecialchars($_GET['name']);
        $response = [
            'message' => "Hello $name!",
            'status' => 'success'
        ];
    } else {
        $response = [
            'message' => 'Hello World!',
            'status' => 'success'
        ];
    }
    
    // Return the response as JSON
    echo json_encode($response);
} else {
    // If not a GET request, return an error
    header('Content-Type: application/json');
    http_response_code(405); // Method Not Allowed
    echo json_encode([
        'message' => 'Only GET requests are allowed',
        'status' => 'error'
    ]);
}
?>