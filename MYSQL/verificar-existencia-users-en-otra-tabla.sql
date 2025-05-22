SELECT *
  FROM databaseuno t1
 WHERE NOT EXISTS (SELECT NULL
                     FROM databasedos t2
                    WHERE t2.email('campo relacionado') = t1.email(('campo relacionado')))