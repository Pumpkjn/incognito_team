/*
Navicat MySQL Data Transfer

Source Server         : myDB
Source Server Version : 50719
Source Host           : localhost:3306
Source Database       : incognito

Target Server Type    : MYSQL
Target Server Version : 50719
File Encoding         : 65001

Date: 2018-03-26 16:09:32
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) DEFAULT NULL,
  `slug` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES ('11', 'computer', 'computer');
INSERT INTO `categories` VALUES ('12', 'accessories', 'accessories');
INSERT INTO `categories` VALUES ('13', 'facilities', 'facilities');
INSERT INTO `categories` VALUES ('14', 'parking', 'parking');
INSERT INTO `categories` VALUES ('15', 'library', 'library');
INSERT INTO `categories` VALUES ('16', 'student service', 'student-service');
INSERT INTO `categories` VALUES ('17', 'employability', 'employability');
INSERT INTO `categories` VALUES ('18', 'internship', 'internship');
INSERT INTO `categories` VALUES ('19', 'graduation', 'graduation');
INSERT INTO `categories` VALUES ('20', 'event', 'event');
INSERT INTO `categories` VALUES ('21', 'website', 'website');
INSERT INTO `categories` VALUES ('22', 'IT ', 'it');
INSERT INTO `categories` VALUES ('23', 'contest', 'contest');
INSERT INTO `categories` VALUES ('24', 'competition', 'competition');
INSERT INTO `categories` VALUES ('25', 'training', 'training');

-- ----------------------------
-- Table structure for categories_ideas
-- ----------------------------
DROP TABLE IF EXISTS `categories_ideas`;
CREATE TABLE `categories_ideas` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idea_id` int(11) unsigned DEFAULT NULL,
  `category_id` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_ref` (`category_id`),
  KEY `idea_ref` (`idea_id`),
  CONSTRAINT `category_ref` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `idea_ref` FOREIGN KEY (`idea_id`) REFERENCES `ideas` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of categories_ideas
-- ----------------------------
INSERT INTO `categories_ideas` VALUES ('24', '15', '11');
INSERT INTO `categories_ideas` VALUES ('25', '15', '12');
INSERT INTO `categories_ideas` VALUES ('26', '16', '16');
INSERT INTO `categories_ideas` VALUES ('27', '17', '17');
INSERT INTO `categories_ideas` VALUES ('28', '17', '18');
INSERT INTO `categories_ideas` VALUES ('29', '17', '20');
INSERT INTO `categories_ideas` VALUES ('30', '18', '12');
INSERT INTO `categories_ideas` VALUES ('31', '18', '13');
INSERT INTO `categories_ideas` VALUES ('32', '19', '11');
INSERT INTO `categories_ideas` VALUES ('33', '19', '12');
INSERT INTO `categories_ideas` VALUES ('34', '19', '13');
INSERT INTO `categories_ideas` VALUES ('35', '20', '16');
INSERT INTO `categories_ideas` VALUES ('36', '20', '20');
INSERT INTO `categories_ideas` VALUES ('37', '21', '11');
INSERT INTO `categories_ideas` VALUES ('38', '21', '13');
INSERT INTO `categories_ideas` VALUES ('39', '21', '20');
INSERT INTO `categories_ideas` VALUES ('40', '22', '11');
INSERT INTO `categories_ideas` VALUES ('41', '22', '12');
INSERT INTO `categories_ideas` VALUES ('42', '22', '15');
INSERT INTO `categories_ideas` VALUES ('43', '23', '17');
INSERT INTO `categories_ideas` VALUES ('44', '23', '18');
INSERT INTO `categories_ideas` VALUES ('45', '24', '21');
INSERT INTO `categories_ideas` VALUES ('46', '24', '22');
INSERT INTO `categories_ideas` VALUES ('47', '25', '23');
INSERT INTO `categories_ideas` VALUES ('48', '25', '24');
INSERT INTO `categories_ideas` VALUES ('49', '26', '18');
INSERT INTO `categories_ideas` VALUES ('50', '26', '20');
INSERT INTO `categories_ideas` VALUES ('51', '27', '15');
INSERT INTO `categories_ideas` VALUES ('52', '27', '16');
INSERT INTO `categories_ideas` VALUES ('53', '27', '20');
INSERT INTO `categories_ideas` VALUES ('54', '28', '20');
INSERT INTO `categories_ideas` VALUES ('55', '28', '25');
INSERT INTO `categories_ideas` VALUES ('56', '29', '12');
INSERT INTO `categories_ideas` VALUES ('57', '29', '13');

-- ----------------------------
-- Table structure for comments
-- ----------------------------
DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idea_id` int(11) unsigned DEFAULT NULL,
  `content` varchar(512) DEFAULT NULL,
  `user_id` int(11) unsigned DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `comment_status` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `comment_idea_ref` (`idea_id`),
  KEY `commnet_user_ref` (`user_id`),
  CONSTRAINT `comment_idea_ref` FOREIGN KEY (`idea_id`) REFERENCES `ideas` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `commnet_user_ref` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of comments
-- ----------------------------
INSERT INTO `comments` VALUES ('1', '21', 'Good idea !', '1', '2018-03-26 12:44:37', '0');
INSERT INTO `comments` VALUES ('2', '21', 'I dont think its good idea', '1', '2018-03-26 12:45:54', '1');
INSERT INTO `comments` VALUES ('3', '18', 'Good idea !', '17', '2018-03-26 12:50:30', '0');
INSERT INTO `comments` VALUES ('4', '22', 'Great idea', '22', '2018-03-26 12:53:43', '0');

-- ----------------------------
-- Table structure for deps
-- ----------------------------
DROP TABLE IF EXISTS `deps`;
CREATE TABLE `deps` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of deps
-- ----------------------------
INSERT INTO `deps` VALUES ('11', 'Architecture, Computing and Humanities');
INSERT INTO `deps` VALUES ('12', 'Business school');
INSERT INTO `deps` VALUES ('13', 'Education and health');
INSERT INTO `deps` VALUES ('14', 'Engineering and Science');

-- ----------------------------
-- Table structure for deps_data
-- ----------------------------
DROP TABLE IF EXISTS `deps_data`;
CREATE TABLE `deps_data` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `dep_id` int(11) unsigned DEFAULT NULL,
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `deps_ref` (`dep_id`),
  CONSTRAINT `deps_ref` FOREIGN KEY (`dep_id`) REFERENCES `deps` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of deps_data
-- ----------------------------
INSERT INTO `deps_data` VALUES ('11', '11', 'thumbnail', '');
INSERT INTO `deps_data` VALUES ('12', '12', 'thumbnail', '');
INSERT INTO `deps_data` VALUES ('13', '13', 'thumbnail', '');
INSERT INTO `deps_data` VALUES ('14', '14', 'thumbnail', '');

-- ----------------------------
-- Table structure for ideas
-- ----------------------------
DROP TABLE IF EXISTS `ideas`;
CREATE TABLE `ideas` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `close_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_ref` (`user_id`),
  CONSTRAINT `user_ref` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ideas
-- ----------------------------
INSERT INTO `ideas` VALUES ('15', '1', null, '2018-03-26 11:05:23', null);
INSERT INTO `ideas` VALUES ('16', '19', null, '2018-03-26 11:29:21', null);
INSERT INTO `ideas` VALUES ('17', '18', null, '2018-03-26 11:35:43', null);
INSERT INTO `ideas` VALUES ('18', '20', null, '2018-03-26 11:40:24', null);
INSERT INTO `ideas` VALUES ('19', '20', null, '2018-03-26 11:43:23', null);
INSERT INTO `ideas` VALUES ('20', '20', null, '2018-03-26 11:50:42', null);
INSERT INTO `ideas` VALUES ('21', '1', null, '2018-03-26 11:56:31', null);
INSERT INTO `ideas` VALUES ('22', '22', null, '2018-03-26 12:05:02', null);
INSERT INTO `ideas` VALUES ('23', '17', null, '2018-03-26 14:44:02', null);
INSERT INTO `ideas` VALUES ('24', '1', null, '2018-03-26 14:50:54', null);
INSERT INTO `ideas` VALUES ('25', '18', null, '2018-03-26 14:54:45', null);
INSERT INTO `ideas` VALUES ('26', '18', null, '2018-03-26 14:59:47', null);
INSERT INTO `ideas` VALUES ('27', '19', null, '2018-03-26 15:02:55', null);
INSERT INTO `ideas` VALUES ('28', '19', null, '2018-03-26 15:05:11', null);
INSERT INTO `ideas` VALUES ('29', '1', null, '2018-03-26 15:09:03', null);

-- ----------------------------
-- Table structure for ideas_metadata
-- ----------------------------
DROP TABLE IF EXISTS `ideas_metadata`;
CREATE TABLE `ideas_metadata` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idea_id` int(11) unsigned DEFAULT NULL,
  `meta_key` varchar(64) DEFAULT NULL,
  `meta_value` varchar(1024) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `meta_idea_ref` (`idea_id`),
  CONSTRAINT `meta_idea_ref` FOREIGN KEY (`idea_id`) REFERENCES `ideas` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=246 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ideas_metadata
-- ----------------------------
INSERT INTO `ideas_metadata` VALUES ('111', '15', 'title', 'Upgrade SSD for every computers in labs');
INSERT INTO `ideas_metadata` VALUES ('112', '15', 'desc', 'Phasellus id sodales ex. Cras ut viverra lorem. Nullam eu ligula semper lacus cursus gravida. Fusce feugiat fringilla congue. Donec fermentum rhoncus eros sit amet vehicula. Morbi laoreet dolor nunc, nec eleifend nulla varius vel. Aliquam auctor erat quis leo egestas, eget porttitor metus aliquam. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Morbi sodales vitae tortor nec tempus. Morbi gravida sapien non iaculis porttitor. Cras volutpat, nibh sed malesuada porttitor, neque quam pellentesque sem, vitae iaculis purus metus eget neque. Etiam ultricies felis turpis, nec semper tellus iaculis vel. Cras laoreet sapien sit amet leo eleifend, blandit eleifend sem tempor. Morbi sollicitudin, diam ac ultrices maximus, augue lacus convallis mi, sed congue dolor nulla non nisi.');
INSERT INTO `ideas_metadata` VALUES ('113', '15', 'dep', '11');
INSERT INTO `ideas_metadata` VALUES ('114', '15', 'topic', '5');
INSERT INTO `ideas_metadata` VALUES ('115', '15', 'views', '4');
INSERT INTO `ideas_metadata` VALUES ('116', '15', 'thumbup', '17');
INSERT INTO `ideas_metadata` VALUES ('117', '15', 'thumbdown', '');
INSERT INTO `ideas_metadata` VALUES ('118', '15', 'total_fav', '999');
INSERT INTO `ideas_metadata` VALUES ('119', '15', 'anonymousSubmit', 'false');
INSERT INTO `ideas_metadata` VALUES ('120', '16', 'title', 'Short course in how to write a good essay');
INSERT INTO `ideas_metadata` VALUES ('121', '16', 'desc', 'Vestibulum a tincidunt elit, vitae sollicitudin nisl. Pellentesque congue, neque ac sagittis rhoncus, ex neque tristique quam, id vulputate enim felis suscipit urna. Aliquam erat volutpat. Praesent sed placerat diam. Morbi id velit massa. Praesent vel ex tempus, ornare orci sed, venenatis nulla. Vivamus id egestas ante, eu commodo ligula. Curabitur accumsan gravida mauris, a lobortis tortor semper imperdiet. Integer in odio tempor, ultricies libero in, auctor tortor. Proin vitae est sed mauris pellentesque ultricies.');
INSERT INTO `ideas_metadata` VALUES ('122', '16', 'dep', '13');
INSERT INTO `ideas_metadata` VALUES ('123', '16', 'topic', '6');
INSERT INTO `ideas_metadata` VALUES ('124', '16', 'views', '1');
INSERT INTO `ideas_metadata` VALUES ('125', '16', 'thumbup', '');
INSERT INTO `ideas_metadata` VALUES ('126', '16', 'thumbdown', '');
INSERT INTO `ideas_metadata` VALUES ('127', '16', 'total_fav', '0');
INSERT INTO `ideas_metadata` VALUES ('128', '16', 'anonymousSubmit', 'false');
INSERT INTO `ideas_metadata` VALUES ('129', '17', 'title', 'Skills and Development Week');
INSERT INTO `ideas_metadata` VALUES ('130', '17', 'desc', 'Quisque maximus tortor in felis molestie tempus. Pellentesque a lorem orci. Donec tempor est ac nunc sodales, eget ultrices sapien suscipit. Sed varius sodales gravida. Donec et risus interdum, venenatis tortor eget, vestibulum lacus. Curabitur est enim, commodo a fringilla vitae, convallis id enim. Duis et viverra magna. Vivamus malesuada odio nibh. Mauris eget ante sed nisi vulputate tincidunt a id neque. Donec placerat, nulla a dapibus lacinia, risus risus dignissim erat, in ullamcorper justo urna ac sem. Cras fringilla sem vel dolor vestibulum hendrerit. Cras est odio, consequat vitae turpis eget, elementum placerat eros. Maecenas sollicitudin leo quis dui gravida congue.');
INSERT INTO `ideas_metadata` VALUES ('131', '17', 'dep', '12');
INSERT INTO `ideas_metadata` VALUES ('132', '17', 'topic', '5');
INSERT INTO `ideas_metadata` VALUES ('133', '17', 'views', '1');
INSERT INTO `ideas_metadata` VALUES ('134', '17', 'thumbup', '');
INSERT INTO `ideas_metadata` VALUES ('135', '17', 'thumbdown', '');
INSERT INTO `ideas_metadata` VALUES ('136', '17', 'total_fav', '0');
INSERT INTO `ideas_metadata` VALUES ('137', '17', 'anonymousSubmit', 'false');
INSERT INTO `ideas_metadata` VALUES ('138', '18', 'title', 'Construction of new room in Queen Anne building');
INSERT INTO `ideas_metadata` VALUES ('139', '18', 'desc', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nisl dui, pretium at cursus ac, mollis non urna. Fusce ac finibus tortor, eget efficitur tortor. Mauris consequat massa at purus cursus egestas. Duis tristique consectetur tellus ac molestie. Ut varius velit ut nisl molestie efficitur. Maecenas eu consectetur ligula. Ut malesuada, velit eget luctus imperdiet, enim mi venenatis libero, vel sagittis felis nunc eget orci. Curabitur malesuada vitae enim sit amet facilisis. Vivamus quis sagittis lacus. Aenean lobortis urna quis sagittis tristique. Suspendisse dolor diam, ultricies at sem sit amet, ullamcorper elementum neque. Donec iaculis pellentesque leo, quis hendrerit nulla tempor quis.');
INSERT INTO `ideas_metadata` VALUES ('140', '18', 'dep', '14');
INSERT INTO `ideas_metadata` VALUES ('141', '18', 'topic', '8');
INSERT INTO `ideas_metadata` VALUES ('142', '18', 'views', '7');
INSERT INTO `ideas_metadata` VALUES ('143', '18', 'thumbup', '');
INSERT INTO `ideas_metadata` VALUES ('144', '18', 'thumbdown', '');
INSERT INTO `ideas_metadata` VALUES ('145', '18', 'total_fav', '0');
INSERT INTO `ideas_metadata` VALUES ('146', '18', 'anonymousSubmit', 'false');
INSERT INTO `ideas_metadata` VALUES ('147', '19', 'title', 'Equip VGA for PCs to support students of Game Development courses');
INSERT INTO `ideas_metadata` VALUES ('148', '19', 'desc', 'Quisque nec neque congue est gravida faucibus. Maecenas ornare accumsan ipsum nec consectetur. Etiam laoreet dolor tellus, vitae elementum sem hendrerit eget. Proin ultricies hendrerit ligula sit amet hendrerit. Maecenas in efficitur enim. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nec purus in magna facilisis euismod. In quis lacus at lacus tempus porta. Donec sodales, magna a faucibus vestibulum, lacus nisl egestas lacus, non iaculis libero felis vitae metus. Praesent volutpat, ante sed accumsan dapibus, ipsum leo lacinia tellus, eget tincidunt purus ex ut arcu. Maecenas suscipit a erat nec pulvinar. Duis euismod pulvinar tellus, non rutrum nulla.');
INSERT INTO `ideas_metadata` VALUES ('149', '19', 'dep', '11');
INSERT INTO `ideas_metadata` VALUES ('150', '19', 'topic', '5');
INSERT INTO `ideas_metadata` VALUES ('151', '19', 'views', '1');
INSERT INTO `ideas_metadata` VALUES ('152', '19', 'thumbup', '');
INSERT INTO `ideas_metadata` VALUES ('153', '19', 'thumbdown', '');
INSERT INTO `ideas_metadata` VALUES ('154', '19', 'total_fav', '0');
INSERT INTO `ideas_metadata` VALUES ('155', '19', 'anonymousSubmit', 'false');
INSERT INTO `ideas_metadata` VALUES ('156', '20', 'title', 'Short course in building resumes');
INSERT INTO `ideas_metadata` VALUES ('157', '20', 'desc', 'Donec et diam at justo ornare auctor. Sed elementum pharetra urna, id ultrices nulla sodales mollis. Praesent sed laoreet ligula, quis mollis tellus. Quisque a augue urna. Praesent ultricies commodo pretium. Aliquam orci nisl, suscipit a mollis nec, viverra vel ipsum. Nulla non placerat arcu, id consequat est. Duis nec pharetra erat. Quisque dapibus pulvinar nunc congue ullamcorper. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer vulputate risus libero, nec iaculis ligula hendrerit id. Curabitur at erat ipsum. Interdum et malesuada fames ac ante ipsum primis in faucibus.');
INSERT INTO `ideas_metadata` VALUES ('158', '20', 'dep', '13');
INSERT INTO `ideas_metadata` VALUES ('159', '20', 'topic', '6');
INSERT INTO `ideas_metadata` VALUES ('160', '20', 'views', '2');
INSERT INTO `ideas_metadata` VALUES ('161', '20', 'thumbup', '');
INSERT INTO `ideas_metadata` VALUES ('162', '20', 'thumbdown', '');
INSERT INTO `ideas_metadata` VALUES ('163', '20', 'total_fav', '0');
INSERT INTO `ideas_metadata` VALUES ('164', '20', 'anonymousSubmit', 'false');
INSERT INTO `ideas_metadata` VALUES ('165', '21', 'title', 'Hold programming contest for IT students');
INSERT INTO `ideas_metadata` VALUES ('166', '21', 'desc', 'Nulla urna nunc, laoreet non dolor sit amet, blandit tincidunt lacus. Nulla fermentum, nisl ut tincidunt ultricies, nulla mauris blandit quam, sit amet laoreet felis lacus condimentum velit. Proin nec euismod mauris. Etiam ullamcorper orci in erat auctor, et malesuada augue tincidunt. Suspendisse velit ex, blandit euismod leo varius, porttitor dignissim orci. Curabitur vel tincidunt sem. Aliquam pellentesque venenatis pellentesque. Curabitur vel lobortis magna. Phasellus tellus ex, feugiat non odio sit amet, malesuada dignissim nisi.');
INSERT INTO `ideas_metadata` VALUES ('167', '21', 'dep', '11');
INSERT INTO `ideas_metadata` VALUES ('168', '21', 'topic', '9');
INSERT INTO `ideas_metadata` VALUES ('169', '21', 'views', '35');
INSERT INTO `ideas_metadata` VALUES ('170', '21', 'thumbup', '');
INSERT INTO `ideas_metadata` VALUES ('171', '21', 'thumbdown', '22');
INSERT INTO `ideas_metadata` VALUES ('172', '21', 'total_fav', '999');
INSERT INTO `ideas_metadata` VALUES ('173', '21', 'anonymousSubmit', 'false');
INSERT INTO `ideas_metadata` VALUES ('174', '22', 'title', 'Forgot your student card ID card? Use an NFC enabled device. ');
INSERT INTO `ideas_metadata` VALUES ('175', '22', 'desc', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eget sem leo. Cras bibendum porta eros sit amet aliquet. Maecenas scelerisque, nisl non gravida facilisis, felis magna dictum nulla, non convallis ligula enim vel mauris. Quisque vestibulum nulla nulla, sit amet viverra leo suscipit et.');
INSERT INTO `ideas_metadata` VALUES ('176', '22', 'dep', '14');
INSERT INTO `ideas_metadata` VALUES ('177', '22', 'topic', '10');
INSERT INTO `ideas_metadata` VALUES ('178', '22', 'views', '20');
INSERT INTO `ideas_metadata` VALUES ('179', '22', 'thumbup', '22');
INSERT INTO `ideas_metadata` VALUES ('180', '22', 'thumbdown', '17');
INSERT INTO `ideas_metadata` VALUES ('181', '22', 'total_fav', '998');
INSERT INTO `ideas_metadata` VALUES ('182', '22', 'anonymousSubmit', 'false');
INSERT INTO `ideas_metadata` VALUES ('183', '23', 'title', 'Placement year for second-year students');
INSERT INTO `ideas_metadata` VALUES ('184', '23', 'desc', 'Morbi id arcu id tellus suscipit imperdiet quis id orci. Aenean sollicitudin elementum lacus sed dignissim. Sed quis justo libero. Nulla consectetur vulputate magna a faucibus. Donec convallis, mauris a eleifend tincidunt, lorem nisi ultrices massa, vel porta est elit volutpat neque. Quisque pulvinar ipsum vitae dolor porttitor accumsan. Cras ultrices arcu eu mauris aliquam, ut maximus dolor tempus. Donec nec urna a nisi vehicula auctor at a dolor. Aliquam maximus enim velit, sit amet eleifend sapien mattis sit amet.');
INSERT INTO `ideas_metadata` VALUES ('185', '23', 'dep', '12');
INSERT INTO `ideas_metadata` VALUES ('186', '23', 'topic', '7');
INSERT INTO `ideas_metadata` VALUES ('187', '23', 'views', '1');
INSERT INTO `ideas_metadata` VALUES ('188', '23', 'thumbup', '');
INSERT INTO `ideas_metadata` VALUES ('189', '23', 'thumbdown', '');
INSERT INTO `ideas_metadata` VALUES ('190', '23', 'total_fav', '0');
INSERT INTO `ideas_metadata` VALUES ('191', '23', 'anonymousSubmit', 'false');
INSERT INTO `ideas_metadata` VALUES ('192', '24', 'title', 'Make the website reponsive');
INSERT INTO `ideas_metadata` VALUES ('193', '24', 'desc', 'Morbi id arcu id tellus suscipit imperdiet quis id orci. Aenean sollicitudin elementum lacus sed dignissim. Sed quis justo libero. Nulla consectetur vulputate magna a faucibus. Donec convallis, mauris a eleifend tincidunt, lorem nisi ultrices massa, vel porta est elit volutpat neque. Quisque pulvinar ipsum vitae dolor porttitor accumsan. Cras ultrices arcu eu mauris aliquam, ut maximus dolor tempus. Donec nec urna a nisi vehicula auctor at a dolor. Aliquam maximus enim velit, sit amet eleifend sapien mattis sit amet.');
INSERT INTO `ideas_metadata` VALUES ('194', '24', 'dep', '11');
INSERT INTO `ideas_metadata` VALUES ('195', '24', 'topic', '11');
INSERT INTO `ideas_metadata` VALUES ('196', '24', 'views', '1');
INSERT INTO `ideas_metadata` VALUES ('197', '24', 'thumbup', '');
INSERT INTO `ideas_metadata` VALUES ('198', '24', 'thumbdown', '');
INSERT INTO `ideas_metadata` VALUES ('199', '24', 'total_fav', '0');
INSERT INTO `ideas_metadata` VALUES ('200', '24', 'anonymousSubmit', 'false');
INSERT INTO `ideas_metadata` VALUES ('201', '25', 'title', 'Student selection for the national contests');
INSERT INTO `ideas_metadata` VALUES ('202', '25', 'desc', 'Duis nunc augue, viverra id lectus aliquam, interdum aliquet libero. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam auctor libero nec velit eleifend ullamcorper. Curabitur non felis vel magna scelerisque sodales a vitae dolor. Curabitur rutrum eget ipsum in dapibus. Phasellus molestie velit tortor, non finibus felis maximus at. Praesent et enim scelerisque lacus fermentum tincidunt non id leo. Vestibulum interdum tellus id diam mattis rutrum.');
INSERT INTO `ideas_metadata` VALUES ('203', '25', 'dep', '12');
INSERT INTO `ideas_metadata` VALUES ('204', '25', 'topic', '12');
INSERT INTO `ideas_metadata` VALUES ('205', '25', 'views', '1');
INSERT INTO `ideas_metadata` VALUES ('206', '25', 'thumbup', '');
INSERT INTO `ideas_metadata` VALUES ('207', '25', 'thumbdown', '');
INSERT INTO `ideas_metadata` VALUES ('208', '25', 'total_fav', '0');
INSERT INTO `ideas_metadata` VALUES ('209', '25', 'anonymousSubmit', 'false');
INSERT INTO `ideas_metadata` VALUES ('210', '26', 'title', 'Business employability fair');
INSERT INTO `ideas_metadata` VALUES ('211', '26', 'desc', 'Fusce fermentum est in aliquam ornare. Morbi sed sagittis augue. Mauris quis ex volutpat velit iaculis consequat. Vestibulum mauris elit, feugiat ac nibh sit amet, condimentum feugiat enim. Phasellus posuere enim at elementum ornare. Maecenas a mi augue. Donec elementum, massa in tincidunt efficitur, odio neque suscipit risus, in viverra sapien nibh eu ligula. Mauris suscipit sem auctor, egestas dolor nec, vestibulum urna. Proin ut tortor convallis, sollicitudin turpis sit amet, iaculis est. Nunc congue nisl nec molestie faucibus. Fusce et finibus ipsum.\r\n\r\n');
INSERT INTO `ideas_metadata` VALUES ('212', '26', 'dep', '12');
INSERT INTO `ideas_metadata` VALUES ('213', '26', 'topic', '7');
INSERT INTO `ideas_metadata` VALUES ('214', '26', 'views', '1');
INSERT INTO `ideas_metadata` VALUES ('215', '26', 'thumbup', '');
INSERT INTO `ideas_metadata` VALUES ('216', '26', 'thumbdown', '');
INSERT INTO `ideas_metadata` VALUES ('217', '26', 'total_fav', '0');
INSERT INTO `ideas_metadata` VALUES ('218', '26', 'anonymousSubmit', 'false');
INSERT INTO `ideas_metadata` VALUES ('219', '27', 'title', 'Lectures on how to make a good presentation');
INSERT INTO `ideas_metadata` VALUES ('220', '27', 'desc', 'Praesent finibus magna varius risus bibendum, eu euismod nibh pulvinar. Nunc fringilla odio at tellus elementum, eget accumsan nisl mattis. Nam quis nibh eget nulla ornare molestie. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam eget sollicitudin lacus, non finibus est. Pellentesque sit amet tristique purus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed mauris arcu, consectetur in pellentesque eget, elementum id nunc. Maecenas quis congue libero, in euismod risus. In porttitor odio scelerisque imperdiet consequat. Phasellus ac eros ligula. Praesent vitae enim vel urna tempor pellentesque. Phasellus mollis sodales elit, non euismod nibh auctor eget.\r\n\r\n');
INSERT INTO `ideas_metadata` VALUES ('221', '27', 'dep', '13');
INSERT INTO `ideas_metadata` VALUES ('222', '27', 'topic', '6');
INSERT INTO `ideas_metadata` VALUES ('223', '27', 'views', '1');
INSERT INTO `ideas_metadata` VALUES ('224', '27', 'thumbup', '');
INSERT INTO `ideas_metadata` VALUES ('225', '27', 'thumbdown', '');
INSERT INTO `ideas_metadata` VALUES ('226', '27', 'total_fav', '0');
INSERT INTO `ideas_metadata` VALUES ('227', '27', 'anonymousSubmit', 'false');
INSERT INTO `ideas_metadata` VALUES ('228', '28', 'title', 'Training sessions for teacher-training students');
INSERT INTO `ideas_metadata` VALUES ('229', '28', 'desc', 'Cras euismod tellus orci, at rhoncus dolor dignissim eget. Cras feugiat ut lorem rutrum elementum. Vestibulum lacinia sit amet leo ac rutrum. Nunc quis eros orci. Vestibulum luctus quam vitae commodo tincidunt. Praesent dignissim enim nec elementum varius. Nam accumsan, felis sed elementum interdum, quam lectus molestie nunc, sed lobortis mauris tellus et magna. Aliquam mattis eget dui in egestas. Duis eget gravida sapien. Aenean facilisis libero sed pretium rhoncus. Ut sit amet tincidunt justo. Curabitur at tellus nec lorem dictum commodo id nec nunc. Nulla non lobortis ligula, ut efficitur enim. Pellentesque ullamcorper porta hendrerit. Cras varius, arcu vel aliquet aliquam, erat risus aliquam elit, a aliquet est dolor et justo.');
INSERT INTO `ideas_metadata` VALUES ('230', '28', 'dep', '13');
INSERT INTO `ideas_metadata` VALUES ('231', '28', 'topic', '13');
INSERT INTO `ideas_metadata` VALUES ('232', '28', 'views', '1');
INSERT INTO `ideas_metadata` VALUES ('233', '28', 'thumbup', '');
INSERT INTO `ideas_metadata` VALUES ('234', '28', 'thumbdown', '');
INSERT INTO `ideas_metadata` VALUES ('235', '28', 'total_fav', '0');
INSERT INTO `ideas_metadata` VALUES ('236', '28', 'anonymousSubmit', 'false');
INSERT INTO `ideas_metadata` VALUES ('237', '29', 'title', 'Buying equipments necessary for chemistry students to experiment');
INSERT INTO `ideas_metadata` VALUES ('238', '29', 'desc', 'Morbi id arcu id tellus suscipit imperdiet quis id orci. Aenean sollicitudin elementum lacus sed dignissim. Sed quis justo libero. Nulla consectetur vulputate magna a faucibus. Donec convallis, mauris a eleifend tincidunt, lorem nisi ultrices massa, vel porta est elit volutpat neque. Quisque pulvinar ipsum vitae dolor porttitor accumsan. Cras ultrices arcu eu mauris aliquam, ut maximus dolor tempus. Donec nec urna a nisi vehicula auctor at a dolor. Aliquam maximus enim velit, sit amet eleifend sapien mattis sit amet.');
INSERT INTO `ideas_metadata` VALUES ('239', '29', 'dep', '14');
INSERT INTO `ideas_metadata` VALUES ('240', '29', 'topic', '14');
INSERT INTO `ideas_metadata` VALUES ('241', '29', 'views', '1');
INSERT INTO `ideas_metadata` VALUES ('242', '29', 'thumbup', '');
INSERT INTO `ideas_metadata` VALUES ('243', '29', 'thumbdown', '');
INSERT INTO `ideas_metadata` VALUES ('244', '29', 'total_fav', '0');
INSERT INTO `ideas_metadata` VALUES ('245', '29', 'anonymousSubmit', 'false');

-- ----------------------------
-- Table structure for open_subs
-- ----------------------------
DROP TABLE IF EXISTS `open_subs`;
CREATE TABLE `open_subs` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `closure_date` datetime DEFAULT NULL,
  `status` varchar(128) DEFAULT NULL,
  `dep_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `dep_ref_open_sub` (`dep_id`),
  CONSTRAINT `dep_ref_open_sub` FOREIGN KEY (`dep_id`) REFERENCES `deps` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of open_subs
-- ----------------------------
INSERT INTO `open_subs` VALUES ('5', 'Upgrade computers in labs', '2018-03-26 11:02:48', '2018-03-30 00:00:00', '1', '11');
INSERT INTO `open_subs` VALUES ('6', 'Short course to teach students about soft skills', '2018-03-26 11:25:09', '2018-04-26 00:00:00', '1', '13');
INSERT INTO `open_subs` VALUES ('7', 'Summer internship', '2018-03-26 11:32:28', '2018-05-27 00:00:00', '1', '12');
INSERT INTO `open_subs` VALUES ('8', 'Building a laboratory for experiment on drones', '2018-03-26 11:39:29', '2018-05-03 00:00:00', '1', '14');
INSERT INTO `open_subs` VALUES ('9', 'Holding contests for computing students', '2018-03-26 11:55:46', '2018-06-12 00:00:00', '1', '11');
INSERT INTO `open_subs` VALUES ('10', 'University ID cards implemented using NFC enabled mobile devices', '2018-03-26 11:58:12', '2018-04-26 00:00:00', '1', '14');
INSERT INTO `open_subs` VALUES ('11', 'Update the faculty website', '2018-03-26 14:49:54', '2018-05-03 00:00:00', '1', '11');
INSERT INTO `open_subs` VALUES ('12', 'Holding business contests', '2018-03-26 14:53:28', '2019-05-03 00:00:00', '1', '12');
INSERT INTO `open_subs` VALUES ('13', 'Practical training', '2018-03-26 15:03:37', '2018-07-29 00:00:00', '1', '13');
INSERT INTO `open_subs` VALUES ('14', 'Facility maintenance', '2018-03-26 15:07:59', '2018-06-05 00:00:00', '1', '14');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  `name` varchar(64) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  `role` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `dep_id` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_unique` (`username`) USING BTREE,
  KEY `dep_user_ref` (`dep_id`),
  CONSTRAINT `dep_user_ref` FOREIGN KEY (`dep_id`) REFERENCES `deps` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'nguyenvu9405@gmail.com', '$2a$12$4ed4ad246bf2df65edf60eEJs6V/VfgUByu0geekuYopmtyOZz9qu', 'Tran Le Nguyen Vu', 'nguyenvu9405@gmail.com', '0', null);
INSERT INTO `users` VALUES ('17', 'alan@gmail.com', '$2a$12$a10f4419f1b2dc863fd80u./VKLUNHiJ/pBGqDOUwc5DpH4OVN43i', 'Alan', 'alan@gmail.com', '1', '11');
INSERT INTO `users` VALUES ('18', 'jas@gmail.com', '$2a$12$c66089c5e33e37ee0d3fdO8ElpqYokEexItZhddMC4/jpk2mYokK.', 'Jas', 'jas@gmail.com', '1', '12');
INSERT INTO `users` VALUES ('19', 'eval@gmail.com', '$2a$12$62eb7f65e369cd0308d27uC6Eppz08NJ3gnl6tG/ICtHUnKtDiTdu', 'Eval Thompson', 'eval@gmail.com', '1', '13');
INSERT INTO `users` VALUES ('20', 'pumpkjn1508@gmail.com', '$2a$12$26186d0553f4dadd4fc2feLcmLIcev.4Z/LZBXyteQKdBSEObc.BS', 'Allen', 'pumpkjn1508@gmail.com', '1', '14');
INSERT INTO `users` VALUES ('22', 'luke@gmail.com', '$2a$12$b5302b96159e9b8f17f66uuBCCMwHMajwZ/wdtJndXB5L12PJKYKm', 'Luke', 'luke@gmail.com', '1', '14');
