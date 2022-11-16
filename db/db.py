import mysql.connector

##
# YesWeHack - Vulnerable code snippets
##

# MySQL Credentials:
db = mysql.connector.connect(
  host='localhost',
  user='__USER__',
  password='__PASS__',
  database='__DB__'
)

# Create a connection:
mysql_cursor = db.cursor()
