-- 
-- Table structure for table `nova_shipalerts`
-- 

DROP TABLE IF EXISTS `nova_shipalerts`;
CREATE TABLE IF NOT EXISTS `nova_shipalerts` (
  `alert_id` int(11) NOT NULL auto_increment,
  `alert_name` text NOT NULL,
  `alert_image` text NOT NULL,
  `alert_description` text NOT NULL,
  `alert_active` enum('y','n') NOT NULL default 'n',
  PRIMARY KEY  (`alert_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- 
-- Dumping data for table `nova_shipalerts`
-- 

INSERT INTO `nova_shipalerts` VALUES (1, 'Red Alert', 'al-red', 'Red alert is the highest state of alert for a Starfleet vessel or installation, indicating an extremely dangerous situation such as entering combat.\r\n\r\nWhen red alert is called on board a ship, the lights dim, audio alarms sound, the force field shields are activated, the ship''s weapons are brought online, red alert lights are illuminated, the crew maintains a heightened state of readiness, and all holodecks must cease. A state of red alert may be called on starships, installations, regions, or the entire fleet. The red alert state in the fictional Star Trek universe is similar to a call to general quarters aboard United States Navy vessels.', 'n');
INSERT INTO `nova_shipalerts` VALUES (2, 'Yellow Alert', 'al-yellow', 'A yellow alert or condition yellow is the second highest alert signal status on Starfleet vessels, one stage below red alert. It designates a ship-wide state of increased preparedness for possible crisis situations. ', 'n');
INSERT INTO `nova_shipalerts` VALUES (3, 'Grey Mode', 'al-grey', 'When in gray mode, the starship runs on reserve power, cutting power to non-essential decks and ship systems. It allows for maximum power conservation, budgeting a starship''s energy resources during a time of crisis, while still maintaining an operating status. Gray mode can be invoked during a massive fuel shortage, or when the tactical situation requires a reduction in discretionary energy usage. ', 'n');
INSERT INTO `nova_shipalerts` VALUES (4, 'Green Mode', 'al-green', 'Condition green refers to the normal operating condition  (cruise mode) of a starship.', 'y');
INSERT INTO `nova_shipalerts` VALUES (5, 'Blue Mode', 'al-blue', 'Blue alert (also code blue or condition blue) is an alert signal status on Starfleet  vessels  and outposts  which is called for in exceptional situations, ranging from environmental hazards to the crew, to docking and separation maneuvers and landing protocols, for ships with the capability.\r\n\r\nIn the event of an imminent environmental systems failure or disruption, blue alert is called in order to help affected personnel escape or safeguard their lives.', 'n');

INSERT INTO `nova_menu_items` VALUES (NULL , 'Alert Status', '0', '5', 'admin/alertstatus', 'onsite', 'none', 'y', 'admin/index', '0', 'adminsub', 'admin', 'y', '1');
