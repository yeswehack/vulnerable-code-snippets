import mysql.connector

##
# YesWeHack - Vulnerable code snippets
##

# MySQL Credentials:
db = mysql.connector.connect(
  host="<HOST>",
  user="<USERNAME>",
  password="<PASSWORD>",
  database="<DATABASE>"
)

# Create a connection:
mysql_cursor = db.cursor() 
