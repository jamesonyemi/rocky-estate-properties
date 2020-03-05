SELECT
    a.clientid,
    a.pid,
    d.status,
    a.img_name,
    a.uploaded_date,
    a.uploaded_time,
    b.matpurchased,
    b.amtspent,
    b.amtdetails
FROM
    tblstage_image a
INNER JOIN tblstage b ON
    (b.id = a.stage_id)
INNER JOIN tblproject_phase c ON
    (c.id = a.phase_id)
INNER JOIN tblstatus d ON
    (d.id = b.status_id)