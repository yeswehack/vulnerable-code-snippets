<!--
A 'Thank you' from us / YesWeHack
MC0tPjAvJy8qPiovLTAtLyItMS8tMS0wLS8qPjxpbWcvc3JjLyUwYW9uZXJyb3I9LyoqLy1hbGVydCgxKTtvbmVycm9yLy8+

Test it:
https://dojo-yeswehack.com/Playground#eyJkZXNjcmlwdGlvbiI6IldvcmtzIGluIG1vc3Qgb3V0YnJlYWsgc2VuYXJpb3MgKyBzdGFuZGFyZCBET00gWFNTLCB5dyIsInNvbHV0aW9uIjpudWxsLCJoaW50cyI6W10sInF1ZXJ5Ijp7ImJhY2tlbmQiOiJYU1MiLCJ0ZW1wbGF0ZSI6IlxuPGRpdiB2YWx1ZT1cIiRwYXlsb2FkXCI+XG48ZGl2IHZhbHVlPSckcGF5bG9hZCc+XG5cbjxwIGlkPVwiZG9tXCI+Li4uPC9wPlxuPHNjcmlwdD5cbi8qJHBheWxvYWQqL1xueCA9IFwiJHBheWxvYWRcIjtcbnkgPSAnJHBheWxvYWQnO1xuXG4vL0RPTSBYU1MgUE9DOlxuZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ2RvbScpLmlubmVySFRNTD0gYCRwYXlsb2FkYFxuXG4vLyRwYXlsb2FkXG48L3NjcmlwdD4tLT5cbiIsImZpbHRlcnMiOnsiJHBheWxvYWQiOlt7ImZ1bmMiOiJVUkwgZGVjb2RlIiwiYXJncyI6W119XX19fQ==
-->

<div align="center">
 <h1><img src="./img/ywhlogo.png" alt="YWH Logo" width="24" height="auto"> Vulnerable Code Snippets</h1>
 <img src="./img/VsnippetBanner.gif" alt="Vulnerable code snippet (Vsnippet) banner YesWeHack Github repository" >
</div>


<p align="center">
  <a href="#vulnerabilities">Vulnerabilities</a> |
  <a href="#programming-languages">Programming languages</a> |
  <a href="#run-a-vulnerable-code-snippet">Run a vulnerable code snippet</a> |
  <a href="#installation">Installation</a> |
  <a href="#update">Update</a>
</p>


[YesWeHack](https://www.yeswehack.com/) present code snippets containing several different vulnerabilities to practice your code analysis in a safe dockerized envoriment. The vulnerable code snippets are suitable for all skill levels.

~ New **vulnerable code snippet** at Twitter [@yeswehack](https://twitter.com/yeswehack) **every Friday**! 🗒
> If you want to see something special or if you just have an idea about a vulnerable code snippet, feel free to create a "[New Issue](https://github.com/yeswehack/vulnerable-code-snippets/issues)" where you explain your idea, **no idea is stupid**.

---

⚠️ **Be aware**
> Be sure to run this in a secure environment, as the code is vulnerable and is intended to be used for learning code analysis!
By default, all vulnerable code snippets contain a docker setup that isolates the code from your host system and make it safe to run (*read more in the section : "Run a vulnerable code snippet"*).

## Twitter (X) posts
A Collection of all vulnerable code snippets posted on our Twitter 📂  

| ID | Vulnerability | Description |
|---|---|---|
📜[#1](https://twitter.com/yeswehack/status/1570757831468679169) | **SQLi & XSS** | Backslash filter collide  
📜[#2](https://twitter.com/yeswehack/status/1573303741310271490) | **Improper file access & XSS** | Invalid char and regex verificaion  
📜[#3](https://twitter.com/yeswehack/status/1575839882269818881) | **Log Forging injection, Path traversal & Code injection** | Poor filter and improper `include()` handling  
📜[#4](https://twitter.com/yeswehack/status/1578370258230194177) | **XSS** | Invalid user input filter  
📜[#5](https://twitter.com/yeswehack/status/1580911299382296576) | **SSRF & Broken authorization** | Trusted user input and client IP from header  
📜[#6](https://twitter.com/yeswehack/status/1583445497687130114) | **SSTI** | Mixed input format  
📜[#7](https://twitter.com/yeswehack/status/1585979707522134017) | **SQLi** | Use of invalid variable within statement  
📜[#8](https://twitter.com/yeswehack/status/1588531516665171969) | **CSRF** | No CSRF token included  
📜[#9](https://twitter.com/yeswehack/status/1591068243439009798) | **Open Redirect** | Invalid regex handler  
📜[#10](https://twitter.com/yeswehack/status/1593604941897236485) | **DOM XSS** | Backend filter collide with client side JavaScript  
📜[#11](https://twitter.com/yeswehack/status/1596141663075926017) | **CORS** | Misconfigured `Access-Control-Allow` header  
📜[#12](https://twitter.com/yeswehack/status/1598678380072902660) | **CSRF/ClickJacking** | GET request CSRF with insecure delete process / ClickJacking - `X-Frame-Options` set in HTML meta tag  
📜[#13](https://twitter.com/yeswehack/status/1601230194035105797) | **Path Traversal/Unrestricted File Upload** | Poor Path Traversal and file upload protection results in a code injection  
📜[#14](https://twitter.com/yeswehack/status/1603751408678969347) | **DOS** | Incorrect operator handler in "for loop"  
📜[#15](https://twitter.com/yeswehack/status/1606288516744347648) | **Weak Password Recovery Mechanism for Forgotten Password** | Weak hash for password recovery  
📜[#16](https://twitter.com/yeswehack/status/1608822361419321350) | **IDOR** | insecure if statement leads to improper access control  
📜[#17](https://twitter.com/yeswehack/status/1611361951644368898) | **Insecure deserialization** | Execute trusted user input inside pickle function `loads()`  
📜[#18](https://twitter.com/yeswehack/status/1614985966178996225) | **Path Traversal** | Improper user validation of filename  
📜[#19](https://twitter.com/yeswehack/status/1616435388507201536) | **Open Redirect** | Invalid handling of user-controlled input "*location.hash*"  
📜[#20](https://twitter.com/yeswehack/status/1618972101943107584) | **SQL injection** | Invalid use of function `replace()`, The char is only replaced once  
📜[#21](https://twitter.com/yeswehack/status/1621508813177212930) | **PostMessage DOM XSS** | No origin validation, leading to PostMessage DOM XSS  
📜[#22](https://twitter.com/yeswehack/status/1626582253215318016) | **XSS/OpenRedirect** | The filter protection does not filter all special characters that can be used to exploit the vulnerabilities  
📜[#23](https://twitter.com/yeswehack/status/1631655669244784640) | **Buffer overflow** | Take user's STDIN input with the `gets()` function without checking the buffer size  
📜[#24](https://twitter.com/yeswehack/status/1636725322447220739) | **SQL injection** | Incorrect use of the PHP function `addslashes()`  
📜[#25](https://twitter.com/yeswehack/status/1639253229203599361) | **XSS - CSP bypass** | No validation of user input along with insecure handling of nonce  
📜[#26](https://twitter.com/yeswehack/status/1641776354315190272) | **Path Traversal** | The filter provided by the PHP function "preg_replace()" is limited to filtering only the first 10 characters  
📜[#27](https://twitter.com/yeswehack/status/1646854408196456448) | **Web Cache Poisoning** | The HTTP header `Referer` is reflected in the cached response body without being filtered  
📜[#28](https://twitter.com/yeswehack/status/1649394393374248963) | **Business logic vulnerability** | An attacker can withdraw negative amounts to increase the overall balance of their account  
📜[#29](https://twitter.com/yeswehack/status/1651933932198285314) | **IDOR** |  An attacker can gain access to sensitive data from other users by performing a *Forced browsing* attack  
📜[#30](https://twitter.com/yeswehack/status/1654465424560365568) | **Insecure deserialization** | Use of a dangerous function (`exec`) that can be controlled by the user, resulting in an RCE  
📜[#31](https://twitter.com/yeswehack/status/1659568814609117185) | **LFI** | No proper character escaping or filter verification. The `include()` function executes all PHP code in the given file, no matter the file extension, resulting in code injection    
📜[#32](https://twitter.com/yeswehack/status/1669693673846591488) | **Format injection!** | Format a string containing values provided by the client, resulting in a format injection  
📜[#33](https://twitter.com/yeswehack/status/1678378536015372288) | **SQL injection (second order)** | All SQL queries use prepared statements except the last one. This statement extracts a value from the database that was once controlled by the user and adds it to the SQL query, leading to an SQL injection (second order)   
📜[#34](https://twitter.com/yeswehack/status/1680877622685843456) | **Regular expression Denial of Service (ReDoS)** | Poorly configured regex pattern used to filter user-controlled input  
📜[#35](https://twitter.com/yeswehack/status/1691057079996350464) | **XSS** | Trusted user input in GET parameter  
📜[#36](https://twitter.com/yeswehack/status/1696130513038418312) | **Unrestricted File Upload** | Insufficient validation of the file extension of the uploaded file and missed validation of the file content  
📜[#37](https://twitter.com/yeswehack/status/1705190707768479828) | **SSRF** | Insecure handling of the proxy header `X-Forwarded-Host` and cURL leading to a full SSRF  
📜[#38](https://twitter.com/yeswehack/status/1709124683377885530) | **Code injection** | The user can write customised content to a selected file which is then launched on the vulnerable system  
📜[#39](https://twitter.com/yeswehack/status/1717202895701954626) | **LFI** | Exploitation of an LFI make it possible to run the tool *pearcmd* resulting in a remote code execution  
📜[#40](https://twitter.com/yeswehack/status/1745074482522243552) | **Unrestricted File Upload** | The `php3` extension can be used to execute php code due to the configuration in the Apache proxy.  
📜[#41](https://twitter.com/yeswehack) | **Command injection**  | Invalid usage of escapeshellcmd lead to a command injection vulnerability  
📜[#42](https://x.com/yeswehack/status/1801619463097274624) | **Command injection**  | No validation of user input is performed, leading to a command injection vulnerability  
📜[#43](https://x.com/yeswehack/status/1775179767412593021) | **SSTI**  | Improper usage of templte engine leading to a SSTI which result in an RCE  


## Vulnerabilities
- [Broken access control](https://owasp.org/www-community/Broken_Access_Control) - CWE-284
- [Code injection](https://owasp.org/www-community/attacks/Code_Injection) - CWE-94
- [Cross Site Request Forgery (CSRF)](https://owasp.org/www-community/attacks/csrf) - CWE-352
- [SQL injection (SQLi)](https://owasp.org/www-community/attacks/SQL_Injection) - CWE-89
- [Cross Site Scripting (XSS)](https://owasp.org/www-community/attacks/xss/) - CWE-79
- [Open Redirect](https://cheatsheetseries.owasp.org/cheatsheets/Unvalidated_Redirects_and_Forwards_Cheat_Sheet.html) - CWE-601
- [Server-side template injection (SSTI)](https://owasp.org/www-project-web-security-testing-guide/v41/4-Web_Application_Security_Testing/07-Input_Validation_Testing/18-Testing_for_Server_Side_Template_Injection) - CWE-1336
- [Server Side Request Forgery (SSRF)](https://owasp.org/www-community/attacks/Server_Side_Request_Forgery) - CWE-918
- [Cross Origin Resource Sharing (CORS)](https://owasp.org/www-community/attacks/CORS_OriginHeaderScrutiny) - CWE-942
- [Clickjacking](https://owasp.org/www-community/attacks/Clickjacking) - CWE-1021
- [Unrestricted File Upload](https://owasp.org/www-community/vulnerabilities/Unrestricted_File_Upload) - CWE-434
- [Path Traversal](https://owasp.org/www-community/attacks/Path_Traversal) - CWE-35
- [Denial Of Service](https://owasp.org/www-community/attacks/Denial_of_Service) - CWE-400
- [Weak Password Recovery Mechanism for Forgotten Password](https://cwe.mitre.org/data/definitions/640.html) - CWE-640
- [Insecure Direct Object Reference (IDOR)](https://cwe.mitre.org/data/definitions/639.html) - CWE-639
- [Deserialization Of Untrusted Data](https://owasp.org/www-community/vulnerabilities/Deserialization_of_untrusted_data) - CWE-502
- [Local File Inclusion](https://cwe.mitre.org/data/definitions/98.html) - CWE-98
- [Buffer Overflow](https://cwe.mitre.org/data/definitions/120.html) - CWE-120
- [Acceptance of Extraneous Untrusted Data With Trusted Data ("Cache Poisoning")](https://cwe.mitre.org/data/definitions/349.html) - CWE-349
- [Business Logic Errors](https://cwe.mitre.org/data/definitions/840.html) - CWE-840
- [Format injection](https://cwe.mitre.org/data/definitions/134.html) - CWE-134
- [Command injection](https://cwe.mitre.org/data/definitions/77) - CWE-77



## Programming languages
- [PHP](https://www.php.net/)
- [Python](https://www.python.org/)
- [Golang](https://go.dev/)
- [Java](https://www.java.com/)
- [JavaScript](https://www.javascript.com/)
- [C](https://en.wikipedia.org/wiki/C_(programming_language))

__Also included__
- SQL ([MySQL](https://www.mysql.com/))
- HTML
- CSS

---

## Run a vulnerable code snippet
In each vulnerable code snippet (Vsnippet) folder there is a `docker-compose.yml` file. To start a Vsnippet in an isolated docker environment simply run the following command:
```
docker compose up --build
```
or
```
docker-compose up --build
```

## Installation

```bash
git clone https://github.com/yeswehack/vulnerable-code-snippets.git
```

## Update
To get the latest vulnerable code snippets, run:
```bash
git pull
```

  ~ **H4v3 y0u f0und th3 E4st3r 3gg y3t?** 🐇🪺

For questions, help or if you have discovered a problem with the code. Contact us on Twitter: [@yeswehack](https://twitter.com/yeswehack) 📬
