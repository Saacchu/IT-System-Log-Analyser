import os
import sqlite3
from datetime import datetime,date,time
import shutil
import mysql.connector


mydb = mysql.connector.connect(
  host="localhost",
  user="root",
  password="",
  database="sih1408"
)
src="C:\\Users\\Dell\\AppData\\Local\\Google\\Chrome\\User Data\\Profile 1\\History"
dest="C:\\Users\\Dell\\AppData\\Local\\Google\\Chrome\\User Data\\Profile 1\\History2"

shutil.copy(src,dest)

con=sqlite3.connect(dest)
cr=con.cursor()
history_SQL = """
        SELECT
            urls.id,
            datetime(
                visits.visit_time/1000000-11644473600, 'unixepoch', 'localtime'
            ) as 'visit_time',
            urls.url,
            urls.title
        FROM
            visits INNER JOIN urls ON visits.url = urls.id
        WHERE
            visits.visit_duration > 0
        ORDER BY
            visit_time DESC
    """
rows=cr.execute(history_SQL)
res=rows.fetchall()

print("<center>")
print("<table class='table table-hover table-bordered table-responsive' >")
print("<tr><th>Id</th><th>Date and Time</th><th>Title</th><th>URL</th></tr>")
for id,dt,url,title in res:
    x=dt.split()
    dt2=datetime.strptime(x[0],'%Y-%m-%d').date()
    if dt2==date.today() and "localhost" not in url and "SIH1408" not in url:
        mycursor = mydb.cursor()
        query="SELECT * from links WHERE DT='"+dt+"'"
        print(query)
        mycursor.execute(query)
        myresult=mycursor.fetchall()
        if len(myresult)==0:
            sql = "INSERT INTO links (ID,DT,URL,TITLE) VALUES (%s, %s, %s,%s)"
            val = (id,dt,url,title)
            mycursor.execute(sql, val)
            mydb.commit()


mycursor = mydb.cursor()
mycursor.execute("SELECT * from links order by dt desc")
myresult=mycursor.fetchall()
for sno,id,dt,url,title in myresult:
    x=dt.split()
    dt2=datetime.strptime(x[0],'%Y-%m-%d').date()
    if dt2==date.today() and "localhost" not in url and "SIH1408" not in url:
        if "http:" in url:
            print("<tr>")
            print("<td style='background-color: red;color:white; '>"+str(id)+"</td>") 
            print("<td style='background-color:red;color:white; '>"+str(dt)+"</td>") 
            print("<td style='background-color:red;color:white; '>"+str(title)+"</td>") 
            print("<td style='background-color: red;color:white; '><p>"+url+"</p></td>") 
            print("</tr>")
        else:
            print("<tr>")
            print("<td>"+str(id)+"</td>")
            print("<td>"+str(dt)+"</td>")
            print("<td><p>"+str(title)+"</p></td>")
            print("<td><p>"+url+"</p></td>")
            print("</tr>")
    	
print("</table>")
print("</center>")