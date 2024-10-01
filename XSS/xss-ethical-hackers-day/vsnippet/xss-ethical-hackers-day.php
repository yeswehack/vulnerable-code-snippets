<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Preprod</title>
    <link rel="stylesheet" href="/ignore/desing/design.css">
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="logo">
                <img src="/ignore/desing/shiba.png" alt="shiba">
            </div>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>
    </header> 

    <div class="main-container">
        <div class="login-box">
            <h2>Login Preprod</h2>
            <form>
                <div class="input-group">
                    <input type="text" required>
                    <label>Username</label>
                </div>
                <div class="input-group">
                    <input type="password" required>
                    <label>Password</label>
                </div>
                <button type="submit">Login</button>
                <p class="signup-text">Don't have an account? <a href="#">Sign up</a></p>
            </form>
        </div>

        <div class="post-box">
            <h2>Ask for preprod Session !</h2>
            <form method="GET" action="/">
                <div class="input-group">
                    <input type="text" id="todo-username" name="todo-username" required>
                    <label>Username (TODO)</label>
                </div>
                <button type="submit">Submit Username</button>
            </form>
        </div>
    </div> 

<!-- everything at the top is for design purposes, it's not part of the challenge :) -->

    <script>
        class SessionManager {
            constructor(username) {
                this.username = username;
                this.sessionID = Math.random().toString(36).substring(2, 15);
                console.log(`Preprod is active for ${this.username} - ID: ${this.sessionID}`);
            }
            startSession() {
                console.log(`Session load for ${this.username}`);
            }
            endSession() {
                console.log(`Session ended for ${this.username}`);
            }
        }
        
        var testTodoClass = new todoClass(); // TODO: ...
        
        var test = new SessionManager("<?= preg_replace('/[<>]/', '', $_REQUEST['todo-username']); ?>");
        test.startSession();
    </script>

</body>
</html>
