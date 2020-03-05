-- CLIENT-PROJECT-REGION-TOWN-STATUS-COUNTRY
CREATE view vw_clientwithprojects AS
SELECT
    a.pid AS p_id,
    CONCAT(b.fname, ' ', b.lname) AS client_name,
    a.title AS p_title,
    c.region,
    d.town,
    e.status
FROM
    tblclients b
INNER JOIN tblproject a ON
    (b.clientid = a.clientid)
INNER JOIN tbltown d ON
    (d.tid = a.tid)
INNER JOIN tblstatus e ON
    (e.id = a.statusid)
INNER JOIN tblregion c ON
    (c.rid = a.rid)
ORDER BY
    a.pid