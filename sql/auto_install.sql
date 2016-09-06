DROP TABLE IF EXISTS `civicrm_fbpixel_rule`;

CREATE TABLE `civicrm_fbpixel_rule` (
  `id` int unsigned NOT NULL AUTO_INCREMENT  COMMENT 'Unique Rule ID',
  `entity` varchar(255)    COMMENT 'Entity on which to display pixel',
  `actionpage` varchar(255)    COMMENT 'Action/page on which to display pixel',
  `event` varchar(255)    COMMENT 'The Facebook pixel event to implement',
  `params` text    COMMENT 'Query parameters to send along with the pixel',
  PRIMARY KEY ( `id` )
)
ENGINE=InnoDB DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci
COMMENT='Rules for including Facebook pixels';

