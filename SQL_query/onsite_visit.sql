-- CLIENT-PORTAL
-- ONSITE-VISIT

SELECT
    a.vdate AS date_of_visit,
    c.title,
    a.vid,
    c.clientid,
    c.pid,
    e.status
FROM
    tblvisit a
INNER JOIN tblprojectimage b ON
    (b.vid = a.vid)
INNER JOIN tblproject c ON
    (c.pid = b.pid)
INNER JOIN users d ON(d.clientid = c.clientid)
INNER JOIN tblstatus e ON(e.id = a.status)