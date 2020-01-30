-- FOR CLIENT-PROJECT-REGION-TOWN SQL QUERY

SELECT
    b.pid,
    CONCAT(a.fname, ' ', a.lname) AS client_name,
    a.email AS client_email,
    a.phone1 AS client_primarycontact,
    b.title AS project_title, c.town, d.region
FROM
    tblclients a
JOIN tblproject b ON	
    (b.clientid = a.clientid)
    JOIN tbltown c ON (c.tid =b.town)
        JOIN tblregion d ON (b.rid = d.rid)

ORDER BY
    b.pid