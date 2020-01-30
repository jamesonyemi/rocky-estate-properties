-- STAGEIMAGE, STAGE, CLIENT, PROJECT,COUNTRY, GENDER

-- ===================

SELECT
    a.id stage_img_id,
    a.clientid,
    a.pid,
    a.stage_id,
    a.phase_id,
    g.phase,
    b.status_id,
    h.status,
    a.img_name,
    b.amtdetails,
    b.matpurchased,
    c.gender gender_id,
    e.type gender_type,
    c.nationality country_id,
    f.country_name client_country,
    c.email client_email,
    c.phone1 client_first_mobile,
    c.phone2 client_second_mobile,
    c.dob client_dob,
    d.totalcost project_budget,
    b.amtspent,
    d.rid,
    d.tid,
    CONCAT(
        c.title,
        ' ',
        c.fname,
        ' ',
        c.lname
    ) client_name,
    d.title AS project_title
FROM
    tblstage_image a
INNER JOIN tblstage b ON
    (b.id = a.stage_id)
INNER JOIN tblclients c ON
    (c.clientid = a.clientid)
INNER JOIN tblproject d ON
    (d.pid = a.pid)
INNER JOIN tblgender e ON
    (e.id = c.gender)
INNER  JOIN tblcountry f ON(f.id = c.nationality)
INNER JOIN tblproject_phase g ON(g.id = a.phase_id)
INNER JOIN tblstatus h ON(h.id = b.status_id)
ORDER BY
    a.id