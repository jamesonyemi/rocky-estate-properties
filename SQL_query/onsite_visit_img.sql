-- JOIN-FOR VISIT-PROJECTIMAGE-PROJECT ORDER-BY

SELECT
    a.vid,
    a.vdate,
    a.comments,
    c.title
FROM
    tblvisit a
INNER JOIN tblprojectimage b ON
    (b.vid = a.vid)
INNER JOIN tblproject c ON
    (c.pid = b.pid)
 
  ORDER BY a.vid