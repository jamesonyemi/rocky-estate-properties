-- CLIENT-PORTAL-SYSTEMS

SELECT
    b.id AS user_id,
    b.full_name,
    b.first_name,
    b.middle_name,
    b.last_name,
    a.phone1,
    a.phone2,
    a.dob,
    a.nok,
    a.relationship,
    a.nokphone,
    c.country_name AS nationality
FROM
    tblclients AS a
INNER JOIN users b ON
    (b.clientid = a.clientid)
INNER JOIN tblcountry c ON
    (c.id = a.nationality)
ORDER BY
   user_id