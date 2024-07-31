import mysql.connector

mydb = mysql.connector.connect(
  host="localhost",
  user="root",
  password="",
  database="test"
)

mycursor = mydb.cursor()

mycursor.execute("SELECT * FROM links")

myresult = mycursor.fetchall()

for x in myresult:
  print(x)