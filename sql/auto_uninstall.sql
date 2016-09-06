DROP TABLE IF EXISTS `civicrm_fbpixel_rule`;

DELETE
  og.*, ov.*
FROM
  civicrm_option_group og
  INNER JOIN civicrm_option_value ov ON ov.option_group_id = og.id
WHERE
  og.name in ('fbpixel_entities', 'fbpixel_pages', 'fbpixel_events', 'fbpixel_actions');	