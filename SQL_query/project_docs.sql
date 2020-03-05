-- CLIENT-PROJECT-DOCUMENTS- SQL-QUERY

SELECT
	d.id user_id,
    d.clientid cid,
	a.pid project_id,
    a.id doc_id,
    a.docname,
    a.doc_link,
    concat(c.fname, ' ', c.lname) client_name,
    d.full_name,
    b.title project_title
FROM
    tblprojectdocs a
INNER JOIN tblproject b ON
    (b.pid = a.pid)
    INNER JOIN tblclients c ON(c.clientid=b.clientid)
    inner JOIN users d ON(d.clientid = c.clientid)