CLIENT-PORTAL-SYSTEMS

CREATE VIEW vw_my_projects AS
SELECT
    b.id AS user_id,
    a.pid,
    a.title,
    c.region,
    d.town,
    e.status,
    CONCAT(d.town, ' ', c.region) location
FROM
    tblproject a
INNER JOIN users b ON
    (b.clientid = a.clientid)
INNER JOIN tblregion c ON
    (c.rid = a.rid)
INNER JOIN tbltown d ON
    (d.tid = a.tid)
INNER JOIN tblstatus e ON
    (e.id = a.statusid)
ORDER BY
    user_id