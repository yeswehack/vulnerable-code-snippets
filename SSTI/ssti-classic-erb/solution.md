# Solution

This vulnerable code snippet runs on Ruby WEBricks and uses the ERB template engine.
As we can see on line 12-13, the value from the user-specified GET parameter `email` is added to the variable `message`. It is then rendered by the ERB template engine. This makes it vulnerable to a server-side template injection vulnerability.

You can confirm the vulnerability with a payload such as the one below:
```
<%=7*7%>
```

To archive a remote code execution (RCE) on the application we can use a payload such as:
```
<%=`id`%>
```