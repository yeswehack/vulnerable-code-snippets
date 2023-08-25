<?php
//Note : (This code is never a part of the vulnerable code snippet. It's only for design.)

function Design($file) {
    /**Outout the source code of "x" V-snippet*/
    $sourceCode = file_get_contents($file);

    ini_set("highlight.comment", "#008000");
    ini_set("highlight.default", "#efa743");
    ini_set("highlight.html", "#808080");
    ini_set("highlight.keyword", "#318fca; font-weight: bold");
    ini_set("highlight.string", "#81481f");

    return '
    <style>
        @import url("https://fonts.googleapis.com/css2?family=VT323&display=swap");
        body {
            padding: 2%;
            font-family: "VT323", monospace;
            background-color: #000;
            color: white;
        }

        button, input{
            border-radius: 12px;
            border: 2px solid #09d8c4;
            padding: 4px;
        }

        #Vcode {
            z-index: -1;
            opacity: 0.8;
            position: absolute;
            transform: translate(-100%, -100%);
            top: 96%;
            left: 98%;

            word-wrap: break-word;
            padding: 2%;
            background-color: rgb(10, 10, 10);
            border: 2px solid #09d8c4;
            border-radius: 10px;

            font-size: 12px;
        }

        #profilePicture {
            border-radius: 50%;
            border: 2px solid #09d8c4;
            width: 200px;
            height: 200px;
            margin-bottom: 30px;
        }

    </style>
    <div id="Vcode">' . (highlight_string($sourceCode, true)) . '</div>
    ';
}

?>
