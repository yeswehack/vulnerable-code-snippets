//[Just to delete & restore the users. It's not a part of the vulnerable code challenge] - (Important that you inside the correct database!)
const db = require('./../../db/db.js');

/** [MySQL commands to reset the users table] */
function resetUserTable() {
    //Delete `users` table:
    con.query(`DROP TABLE users`,   
    function (err, result) {
    if (err) throw err;
    console.log("[INF]", result);
    });

    //Create `users` table:
    con.query(`CREATE TABLE IF NOT EXISTS users (
    id int NOT NULL AUTO_INCREMENT,
    csrf varchar(255),
    session varchar(255),
    username varchar(255),
    password varchar(255),
    PRIMARY KEY (id))`,   
    function (err, result) {
    if (err) throw err;
    console.log("[INF]", result);
    });

    //Add values to users:
    con.query(`INSERT INTO users (
    username,csrf,session,password
    )
    VALUES 
    ('Mario','RandSess','RandSess','secret123'),
    ('james','c4ca4238a0b923820dcc509a6f75849b','c4ca4238a0b923820dcc509a6f75849b','cbfdac6008f9cab4083784cbd1874f76618d2a97'),
    ('billy','c81e728d9d4c2f636f067f89cc14862c','c81e728d9d4c2f636f067f89cc14862c','5cec175b165e3d5e62c9e13ce848ef6feac81bff'),
    ('elsa','eccbc87e4b5ce2fe28308fd9f2a7baf3','eccbc87e4b5ce2fe28308fd9f2a7baf3','99efc50a9206bde3d7a8e694aad8e138ca7dc3f7'),
    ('kate','a87ff679a2f3e71d9181a67b7542122c','a87ff679a2f3e71d9181a67b7542122c','be2dd7fb7a6d0f8ba5add12b5e8fb75bbda64721'),
    ('eric','e4da3b7fbbce2345d7772b0674a318d5','e4da3b7fbbce2345d7772b0674a318d5','7c222fb2927d828af22f592134e8932480637c0d')`,   
    function (err, result) {
    if (err) throw err;
    console.log("[INF]", result);
    });
}

resetUserTable()
