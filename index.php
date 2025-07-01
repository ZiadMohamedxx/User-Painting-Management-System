<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up & Sign In</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        form {
            margin: 20px 0;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        input {
            display: block;
            margin: 10px 0;
            padding: 10px;
            width: 100%;
            box-sizing: border-box;
        }
        button {
            padding: 10px;
            background-color: #28a745;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
        .delete-button {
            background-color: #dc3545;
        }
        .delete-button:hover {
            background-color: #c82333;
        }
        .update-button {
            background-color: #ffc107;
        }
        .update-button:hover {
            background-color: #e0a800;
        }
        .search-button {
            background-color: #17a2b8;
        }
        .search-button:hover {
            background-color: #138496;
        }
    </style>
</head>
<body>
    <h1>Sign Up</h1>
    <form method="POST" action="signup.php">
        <input type="text" name="fname" placeholder="First Name" required>
        <input type="text" name="lname" placeholder="Last Name" required>
        <input type="text" name="username" placeholder="Enter username" required>
        <input type="password" name="password" placeholder="Enter password" required>
        <input type="text" name="phone_number" placeholder="Phone Number" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="text" name="national_id" placeholder="National ID" required>
        <button type="submit">Sign Up</button>
    </form>

    <h1>Sign In</h1>
    <form method="POST" action="signin.php">
        <input type="text" name="username" placeholder="Enter username" required>
        <input type="password" name="password" placeholder="Enter password" required>
        <button type="submit">Sign In</button>
    </form>

    <h1>Delete User</h1>
    <form method="POST" action="delete.php">
        <input type="text" name="username" placeholder="Enter username to delete" required>
        <button type="submit" class="delete-button">Delete User</button>
    </form>

    <h1>Update User</h1>
    <form method="POST" action="update.php">
        <input type="text" name="username" placeholder="Enter username to update" required>
        <input type="text" name="new_fname" placeholder="New First Name (optional)">
        <input type="text" name="new_lname" placeholder="New Last Name (optional)">
        <input type="email" name="new_email" placeholder="New Email (optional)">
        <input type="password" name="new_password" placeholder="New Password (optional)">
        <button type="submit" class="update-button">Update User</button>
    </form>

    <h1>Search User</h1>
    <form method="POST" action="search.php">
        <input type="text" name="username" placeholder="Enter username to search" required>
        <button type="submit" class="search-button">Search User</button>
    </form>

    <h1>Search Paintings</h1>
<form method="POST" action="search_paintings.php">
    <input type="text" name="painting_title" placeholder="Enter painting title to search" required>
    <button type="submit" class="search-button">Search Painting</button>
</form>

</body>
</html>
