SELECT A.NAME FROM EMPLOYEES A WHERE A.ID NOT IN (SELECT B.MANAGERID FROM EMPLOYEES B WHERE B.MANAGERID IS NOT NULL );


 