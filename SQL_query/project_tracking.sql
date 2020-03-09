ALTER VIEW
    vw_project_stage_of_completion AS
SELECT
    `a`.`clientid` AS `clientid`,
    `a`.`pid` AS `pid`,
    `d`.`status` AS `status`,
    `c`.`phase` AS `phase`,
    `a`.`img_name` AS `img_name`,
    `a`.`uploaded_date` AS `uploaded_date`,
    `a`.`uploaded_time` AS `uploaded_time`,
    `b`.`matpurchased` AS `matpurchased`,
    `b`.`amtspent` AS `amtspent`,
    `b`.`amtdetails` AS `amtdetails`,
    `e`.`title` AS `title`,
    `e`.`landmark` AS `landmark`,
    CONCAT(f.region, ', ', g.town) location,
    `e`.`created_at` AS `created_at`
FROM
    (
        (
            (
                (
                    `tblstage_image` `a`
                JOIN `tblstage` `b` ON
                    (`b`.`id` = `a`.`stage_id`)
                )
            JOIN `tblproject_phase` `c` ON
                (`c`.`id` = `a`.`phase_id`)
            )
        JOIN `tblstatus` `d` ON
            (`d`.`id` = `b`.`status_id`)
        )
    JOIN `tblproject` `e` ON
        (`e`.`pid` = `a`.`pid`)
    INNER JOIN tblregion f ON
        (f.rid = e.rid)
    INNER JOIN tbltown g ON
        (g.tid = e.tid)
    )