#!/usr/bin/python

import MySQLdb

db = MySQLdb.connect(host="localhost",user="teubico_crowdval",passwd="--cambiarpass--",db="teubico_wrdp1")

cur = db.cursor();
cMaxA = db.cursor();
cMaxB = db.cursor();
updater = db.cursor();

cur.execute("SELECT id FROM actas");

for row in cur.fetchall():
  cMaxA.execute("SELECT digitado,score FROM votos_digitados WHERE acta_id="+str(row[0])+" AND partido='f' AND score>1 ORDER BY score DESC LIMIT 1");
  cMaxB.execute("SELECT digitado,score FROM votos_digitados WHERE acta_id="+str(row[0])+" AND partido='a' AND score>1 ORDER BY score DESC LIMIT 1");
  resA = cMaxA.fetchone();
  resB = cMaxB.fetchone();

  tVotA = "NULL"
  tScrA = "NULL"
  tVotB = "NULL"
  tScrB = "NULL"

  if resA!=None:
    tVotA = str(resA[0])
    tScrA = str(resA[1])
  
  if resB!=None:
    tVotB = str(resB[0])
    tScrB = str(resB[1])

  updater.execute("INSERT INTO results_final(acta_id,f,score_f,a,score_a) VALUES("+str(row[0])+","+tVotA+","+tScrA+","+tVotB+","+tScrB+")")

  print "Procesada acta: "+str(row[0])
