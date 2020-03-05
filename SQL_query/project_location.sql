-- CLIENT-PORTAL-SYSTEM

SELECT
    a.pid,
    b.clientid,
    a.title,
    c.region,
    d.town,
    CONCAT(d.town, ', ', c.region) location
FROM
    tblproject a
INNER JOIN users b ON
    (b.clientid = a.clientid)
INNER JOIN tblregion c ON
    (c.rid = a.rid)
INNER JOIN tbltown d ON
    (d.tid = a.tid)