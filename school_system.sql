/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : school_system

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-02-22 16:49:37
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for assessment
-- ----------------------------
DROP TABLE IF EXISTS `assessment`;
CREATE TABLE `assessment` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(50) DEFAULT NULL COMMENT '评价者',
  `evaluation` varchar(200) DEFAULT NULL COMMENT '评价',
  `average_score` decimal(10,2) DEFAULT NULL COMMENT '平均分',
  `type` tinyint(11) DEFAULT NULL COMMENT '评价类型: 1:学生 2:职工',
  `create_time` datetime DEFAULT NULL COMMENT '创建时间',
  `other_id` int(11) DEFAULT NULL COMMENT '被评价者ID',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of assessment
-- ----------------------------
INSERT INTO `assessment` VALUES ('4', '2', '速度', '3.50', '1', '2018-02-09 15:37:23', '2');
INSERT INTO `assessment` VALUES ('5', '2', '453434', '3.50', '1', '2018-02-09 15:48:27', '19');

-- ----------------------------
-- Table structure for assessment_log
-- ----------------------------
DROP TABLE IF EXISTS `assessment_log`;
CREATE TABLE `assessment_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `standard_id` int(11) DEFAULT NULL COMMENT '关联standard的id',
  `score` decimal(10,0) DEFAULT NULL COMMENT '分数',
  `create_time` datetime DEFAULT NULL COMMENT '创建时间',
  `user_id` int(11) DEFAULT NULL COMMENT '用户ID',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of assessment_log
-- ----------------------------
INSERT INTO `assessment_log` VALUES ('2', '1', '2', '2018-02-08 17:20:49', '2');
INSERT INTO `assessment_log` VALUES ('3', '2', '3', '2018-02-08 17:20:49', '2');
INSERT INTO `assessment_log` VALUES ('4', '1', '3', '2018-02-09 15:37:22', '2');
INSERT INTO `assessment_log` VALUES ('5', '2', '4', '2018-02-09 15:37:23', '2');
INSERT INTO `assessment_log` VALUES ('6', '1', '4', '2018-02-09 15:48:27', '19');
INSERT INTO `assessment_log` VALUES ('7', '2', '3', '2018-02-09 15:48:27', '19');

-- ----------------------------
-- Table structure for asssessment_standard
-- ----------------------------
DROP TABLE IF EXISTS `asssessment_standard`;
CREATE TABLE `asssessment_standard` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL COMMENT '题目',
  `content` text COMMENT '内容',
  `create_time` datetime DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of asssessment_standard
-- ----------------------------
INSERT INTO `asssessment_standard` VALUES ('1', '勤务态度', '1.把工作放第一位,努力工作 2:对新工作表现出积极的态度 3:忠于职守,严守岗位', '2018-02-05 00:00:00');
INSERT INTO `asssessment_standard` VALUES ('2', '业务工作', '1.正确理解工作指示和方针,制订适当的实施计划 2:按照部下的能力和个性合理分配工作', '2018-02-05 23:25:00');

-- ----------------------------
-- Table structure for auth_assignment
-- ----------------------------
DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_assignment
-- ----------------------------
INSERT INTO `auth_assignment` VALUES ('人事处', '24', '1519203825');
INSERT INTO `auth_assignment` VALUES ('人事处', '28', '1519288649');
INSERT INTO `auth_assignment` VALUES ('校长', '26', '1519288640');
INSERT INTO `auth_assignment` VALUES ('职工', '1', '1509090056');
INSERT INTO `auth_assignment` VALUES ('职工', '25', '1519288634');
INSERT INTO `auth_assignment` VALUES ('职工', '3', '1509094372');
INSERT INTO `auth_assignment` VALUES ('超级管理员', '2', '1509090028');

-- ----------------------------
-- Table structure for auth_item
-- ----------------------------
DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`),
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_item
-- ----------------------------
INSERT INTO `auth_item` VALUES ('/*', '2', null, null, null, '1509089918', '1509089918');
INSERT INTO `auth_item` VALUES ('/admin/*', '2', null, null, null, '1509089893', '1509089893');
INSERT INTO `auth_item` VALUES ('/admin/assignment/*', '2', null, null, null, '1509089839', '1509089839');
INSERT INTO `auth_item` VALUES ('/admin/assignment/assign', '2', null, null, null, '1509089836', '1509089836');
INSERT INTO `auth_item` VALUES ('/admin/assignment/index', '2', null, null, null, '1509089835', '1509089835');
INSERT INTO `auth_item` VALUES ('/admin/assignment/revoke', '2', null, null, null, '1509089840', '1509089840');
INSERT INTO `auth_item` VALUES ('/admin/assignment/view', '2', null, null, null, '1509089838', '1509089838');
INSERT INTO `auth_item` VALUES ('/admin/default/*', '2', null, null, null, '1509089841', '1509089841');
INSERT INTO `auth_item` VALUES ('/admin/default/index', '2', null, null, null, '1509089842', '1509089842');
INSERT INTO `auth_item` VALUES ('/admin/menu/*', '2', null, null, null, '1509089845', '1509089845');
INSERT INTO `auth_item` VALUES ('/admin/menu/create', '2', null, null, null, '1509089847', '1509089847');
INSERT INTO `auth_item` VALUES ('/admin/menu/delete', '2', null, null, null, '1509089849', '1509089849');
INSERT INTO `auth_item` VALUES ('/admin/menu/index', '2', null, null, null, '1509089844', '1509089844');
INSERT INTO `auth_item` VALUES ('/admin/menu/update', '2', null, null, null, '1509089846', '1509089846');
INSERT INTO `auth_item` VALUES ('/admin/menu/view', '2', null, null, null, '1509089843', '1509089843');
INSERT INTO `auth_item` VALUES ('/admin/permission/*', '2', null, null, null, '1509089858', '1509089858');
INSERT INTO `auth_item` VALUES ('/admin/permission/assign', '2', null, null, null, '1509089856', '1509089856');
INSERT INTO `auth_item` VALUES ('/admin/permission/create', '2', null, null, null, '1509089850', '1509089850');
INSERT INTO `auth_item` VALUES ('/admin/permission/delete', '2', null, null, null, '1509089852', '1509089852');
INSERT INTO `auth_item` VALUES ('/admin/permission/index', '2', null, null, null, '1509089848', '1509089848');
INSERT INTO `auth_item` VALUES ('/admin/permission/remove', '2', null, null, null, '1509089855', '1509089855');
INSERT INTO `auth_item` VALUES ('/admin/permission/update', '2', null, null, null, '1509089854', '1509089854');
INSERT INTO `auth_item` VALUES ('/admin/permission/view', '2', null, null, null, '1509089851', '1509089851');
INSERT INTO `auth_item` VALUES ('/admin/role/*', '2', null, null, null, '1509089866', '1509089866');
INSERT INTO `auth_item` VALUES ('/admin/role/assign', '2', null, null, null, '1509089867', '1509089867');
INSERT INTO `auth_item` VALUES ('/admin/role/create', '2', null, null, null, '1509089862', '1509089862');
INSERT INTO `auth_item` VALUES ('/admin/role/delete', '2', null, null, null, '1509089861', '1509089861');
INSERT INTO `auth_item` VALUES ('/admin/role/index', '2', null, null, null, '1509089857', '1509089857');
INSERT INTO `auth_item` VALUES ('/admin/role/remove', '2', null, null, null, '1509089863', '1509089863');
INSERT INTO `auth_item` VALUES ('/admin/role/update', '2', null, null, null, '1509089859', '1509089859');
INSERT INTO `auth_item` VALUES ('/admin/role/view', '2', null, null, null, '1509089860', '1509089860');
INSERT INTO `auth_item` VALUES ('/admin/route/*', '2', null, null, null, '1509089871', '1509089871');
INSERT INTO `auth_item` VALUES ('/admin/route/assign', '2', null, null, null, '1509089870', '1509089870');
INSERT INTO `auth_item` VALUES ('/admin/route/create', '2', null, null, null, '1509089864', '1509089864');
INSERT INTO `auth_item` VALUES ('/admin/route/index', '2', null, null, null, '1509089868', '1509089868');
INSERT INTO `auth_item` VALUES ('/admin/route/refresh', '2', null, null, null, '1509089872', '1509089872');
INSERT INTO `auth_item` VALUES ('/admin/route/remove', '2', null, null, null, '1509089869', '1509089869');
INSERT INTO `auth_item` VALUES ('/admin/rule/*', '2', null, null, null, '1509089886', '1509089886');
INSERT INTO `auth_item` VALUES ('/admin/rule/create', '2', null, null, null, '1509089879', '1509089879');
INSERT INTO `auth_item` VALUES ('/admin/rule/delete', '2', null, null, null, '1509089877', '1509089877');
INSERT INTO `auth_item` VALUES ('/admin/rule/index', '2', null, null, null, '1509089874', '1509089874');
INSERT INTO `auth_item` VALUES ('/admin/rule/update', '2', null, null, null, '1509089875', '1509089875');
INSERT INTO `auth_item` VALUES ('/admin/rule/view', '2', null, null, null, '1509089873', '1509089873');
INSERT INTO `auth_item` VALUES ('/admin/user/*', '2', null, null, null, '1509089892', '1509089892');
INSERT INTO `auth_item` VALUES ('/admin/user/activate', '2', null, null, null, '1509089891', '1509089891');
INSERT INTO `auth_item` VALUES ('/admin/user/change-password', '2', null, null, null, '1509089890', '1509089890');
INSERT INTO `auth_item` VALUES ('/admin/user/delete', '2', null, null, null, '1509089885', '1509089885');
INSERT INTO `auth_item` VALUES ('/admin/user/index', '2', null, null, null, '1509089879', '1509089879');
INSERT INTO `auth_item` VALUES ('/admin/user/login', '2', null, null, null, '1509089881', '1509089881');
INSERT INTO `auth_item` VALUES ('/admin/user/logout', '2', null, null, null, '1509089884', '1509089884');
INSERT INTO `auth_item` VALUES ('/admin/user/request-password-reset', '2', null, null, null, '1509089887', '1509089887');
INSERT INTO `auth_item` VALUES ('/admin/user/reset-password', '2', null, null, null, '1509089889', '1509089889');
INSERT INTO `auth_item` VALUES ('/admin/user/signup', '2', null, null, null, '1509089883', '1509089883');
INSERT INTO `auth_item` VALUES ('/admin/user/view', '2', null, null, null, '1509089880', '1509089880');
INSERT INTO `auth_item` VALUES ('/assessment-log/*', '2', null, null, null, '1518195842', '1518195842');
INSERT INTO `auth_item` VALUES ('/assessment-log/create', '2', null, null, null, '1518195838', '1518195838');
INSERT INTO `auth_item` VALUES ('/assessment-log/delete', '2', null, null, null, '1518195841', '1518195841');
INSERT INTO `auth_item` VALUES ('/assessment-log/index', '2', null, null, null, '1518195835', '1518195835');
INSERT INTO `auth_item` VALUES ('/assessment-log/update', '2', null, null, null, '1518195840', '1518195840');
INSERT INTO `auth_item` VALUES ('/assessment-log/view', '2', null, null, null, '1518195837', '1518195837');
INSERT INTO `auth_item` VALUES ('/assessment/*', '2', null, null, null, '1514703646', '1514703646');
INSERT INTO `auth_item` VALUES ('/assessment/create', '2', null, null, null, '1514703535', '1514703535');
INSERT INTO `auth_item` VALUES ('/assessment/delete', '2', null, null, null, '1514703648', '1514703648');
INSERT INTO `auth_item` VALUES ('/assessment/index', '2', null, null, null, '1514703533', '1514703533');
INSERT INTO `auth_item` VALUES ('/assessment/update', '2', null, null, null, '1514703645', '1514703645');
INSERT INTO `auth_item` VALUES ('/assessment/view', '2', null, null, null, '1514703537', '1514703537');
INSERT INTO `auth_item` VALUES ('/asssessment-standard/*', '2', null, null, null, '1518195851', '1518195851');
INSERT INTO `auth_item` VALUES ('/asssessment-standard/create', '2', null, null, null, '1518195848', '1518195848');
INSERT INTO `auth_item` VALUES ('/asssessment-standard/delete', '2', null, null, null, '1518195849', '1518195849');
INSERT INTO `auth_item` VALUES ('/asssessment-standard/index', '2', null, null, null, '1518195843', '1518195843');
INSERT INTO `auth_item` VALUES ('/asssessment-standard/update', '2', null, null, null, '1518195847', '1518195847');
INSERT INTO `auth_item` VALUES ('/asssessment-standard/view', '2', null, null, null, '1518195845', '1518195845');
INSERT INTO `auth_item` VALUES ('/collect-pensions/*', '2', null, null, null, '1515247699', '1515247699');
INSERT INTO `auth_item` VALUES ('/collect-pensions/create', '2', null, null, null, '1515247692', '1515247692');
INSERT INTO `auth_item` VALUES ('/collect-pensions/delete', '2', null, null, null, '1515247698', '1515247698');
INSERT INTO `auth_item` VALUES ('/collect-pensions/index', '2', null, null, null, '1515247690', '1515247690');
INSERT INTO `auth_item` VALUES ('/collect-pensions/update', '2', null, null, null, '1515247696', '1515247696');
INSERT INTO `auth_item` VALUES ('/collect-pensions/view', '2', null, null, null, '1515247694', '1515247694');
INSERT INTO `auth_item` VALUES ('/debug/*', '2', null, null, null, '1509089901', '1509089901');
INSERT INTO `auth_item` VALUES ('/debug/default/*', '2', null, null, null, '1509089900', '1509089900');
INSERT INTO `auth_item` VALUES ('/debug/default/db-explain', '2', null, null, null, '1509089894', '1509089894');
INSERT INTO `auth_item` VALUES ('/debug/default/download-mail', '2', null, null, null, '1509089897', '1509089897');
INSERT INTO `auth_item` VALUES ('/debug/default/index', '2', null, null, null, '1509089896', '1509089896');
INSERT INTO `auth_item` VALUES ('/debug/default/toolbar', '2', null, null, null, '1509089898', '1509089898');
INSERT INTO `auth_item` VALUES ('/debug/default/view', '2', null, null, null, '1509089895', '1509089895');
INSERT INTO `auth_item` VALUES ('/get-pension/*', '2', null, null, null, '1515247714', '1515247714');
INSERT INTO `auth_item` VALUES ('/get-pension/create', '2', null, null, null, '1515247702', '1515247702');
INSERT INTO `auth_item` VALUES ('/get-pension/delete', '2', null, null, null, '1515247706', '1515247706');
INSERT INTO `auth_item` VALUES ('/get-pension/index', '2', null, null, null, '1515247700', '1515247700');
INSERT INTO `auth_item` VALUES ('/get-pension/update', '2', null, null, null, '1515247704', '1515247704');
INSERT INTO `auth_item` VALUES ('/get-pension/view', '2', null, null, null, '1515247703', '1515247703');
INSERT INTO `auth_item` VALUES ('/gii/*', '2', null, null, null, '1509089910', '1509089910');
INSERT INTO `auth_item` VALUES ('/gii/default/*', '2', null, null, null, '1509089911', '1509089911');
INSERT INTO `auth_item` VALUES ('/gii/default/action', '2', null, null, null, '1509089907', '1509089907');
INSERT INTO `auth_item` VALUES ('/gii/default/diff', '2', null, null, null, '1509089904', '1509089904');
INSERT INTO `auth_item` VALUES ('/gii/default/index', '2', null, null, null, '1509089903', '1509089903');
INSERT INTO `auth_item` VALUES ('/gii/default/preview', '2', null, null, null, '1509089905', '1509089905');
INSERT INTO `auth_item` VALUES ('/gii/default/view', '2', null, null, null, '1509089902', '1509089902');
INSERT INTO `auth_item` VALUES ('/good/*', '2', null, null, null, '1509089912', '1509089912');
INSERT INTO `auth_item` VALUES ('/good/create', '2', null, null, null, '1509035719', '1509035719');
INSERT INTO `auth_item` VALUES ('/good/index', '2', null, null, null, '1509035710', '1509035710');
INSERT INTO `auth_item` VALUES ('/punishment/*', '2', null, null, null, '1511596640', '1511596640');
INSERT INTO `auth_item` VALUES ('/punishment/create', '2', null, null, null, '1511596644', '1511596644');
INSERT INTO `auth_item` VALUES ('/punishment/delete', '2', null, null, null, '1511596642', '1511596642');
INSERT INTO `auth_item` VALUES ('/punishment/index', '2', null, null, null, '1511596648', '1511596648');
INSERT INTO `auth_item` VALUES ('/punishment/update', '2', null, null, null, '1511596645', '1511596645');
INSERT INTO `auth_item` VALUES ('/punishment/view', '2', null, null, null, '1511596646', '1511596646');
INSERT INTO `auth_item` VALUES ('/record-pensions/*', '2', null, null, null, '1515247715', '1515247715');
INSERT INTO `auth_item` VALUES ('/record-pensions/create', '2', null, null, null, '1515247710', '1515247710');
INSERT INTO `auth_item` VALUES ('/record-pensions/delete', '2', null, null, null, '1515247713', '1515247713');
INSERT INTO `auth_item` VALUES ('/record-pensions/index', '2', null, null, null, '1515247707', '1515247707');
INSERT INTO `auth_item` VALUES ('/record-pensions/update', '2', null, null, null, '1515247711', '1515247711');
INSERT INTO `auth_item` VALUES ('/record-pensions/view', '2', null, null, null, '1515247709', '1515247709');
INSERT INTO `auth_item` VALUES ('/recruitment/*', '2', null, null, null, '1513496252', '1513496252');
INSERT INTO `auth_item` VALUES ('/recruitment/create', '2', null, null, null, '1513496247', '1513496247');
INSERT INTO `auth_item` VALUES ('/recruitment/delete', '2', null, null, null, '1513496250', '1513496250');
INSERT INTO `auth_item` VALUES ('/recruitment/index', '2', null, null, null, '1513496246', '1513496246');
INSERT INTO `auth_item` VALUES ('/recruitment/update', '2', null, null, null, '1513496249', '1513496249');
INSERT INTO `auth_item` VALUES ('/recruitment/view', '2', null, null, null, '1513496245', '1513496245');
INSERT INTO `auth_item` VALUES ('/redactor/*', '2', null, null, null, '1513496244', '1513496244');
INSERT INTO `auth_item` VALUES ('/site/*', '2', null, null, null, '1509089916', '1509089916');
INSERT INTO `auth_item` VALUES ('/site/error', '2', null, null, null, '1509089914', '1509089914');
INSERT INTO `auth_item` VALUES ('/site/index', '2', null, null, null, '1509089913', '1509089913');
INSERT INTO `auth_item` VALUES ('/site/login', '2', null, null, null, '1509089915', '1509089915');
INSERT INTO `auth_item` VALUES ('/site/logout', '2', null, null, null, '1509089917', '1509089917');
INSERT INTO `auth_item` VALUES ('/staff-info/*', '2', null, null, null, '1510987382', '1510987382');
INSERT INTO `auth_item` VALUES ('/staff-info/create', '2', null, null, null, '1510987385', '1510987385');
INSERT INTO `auth_item` VALUES ('/staff-info/delete', '2', null, null, null, '1510987383', '1510987383');
INSERT INTO `auth_item` VALUES ('/staff-info/index', '2', null, null, null, '1510987389', '1510987389');
INSERT INTO `auth_item` VALUES ('/staff-info/update', '2', null, null, null, '1510987386', '1510987386');
INSERT INTO `auth_item` VALUES ('/staff-info/view', '2', null, null, null, '1510987388', '1510987388');
INSERT INTO `auth_item` VALUES ('/staff-transfer/*', '2', null, null, null, '1512658009', '1512658009');
INSERT INTO `auth_item` VALUES ('/staff-transfer/create', '2', null, null, null, '1512658012', '1512658012');
INSERT INTO `auth_item` VALUES ('/staff-transfer/delete', '2', null, null, null, '1512658011', '1512658011');
INSERT INTO `auth_item` VALUES ('/staff-transfer/index', '2', null, null, null, '1512658017', '1512658017');
INSERT INTO `auth_item` VALUES ('/staff-transfer/update', '2', null, null, null, '1512658014', '1512658014');
INSERT INTO `auth_item` VALUES ('/staff-transfer/view', '2', null, null, null, '1512658016', '1512658016');
INSERT INTO `auth_item` VALUES ('人事处', '1', '管理职工', null, null, '1509091134', '1509091165');
INSERT INTO `auth_item` VALUES ('人事处权限', '2', null, null, null, '1519203535', '1519203535');
INSERT INTO `auth_item` VALUES ('校长', '1', '管理学校', null, null, '1509091228', '1519203243');
INSERT INTO `auth_item` VALUES ('职工', '1', '高校所有的职工', null, null, '1509034241', '1509091291');
INSERT INTO `auth_item` VALUES ('超级管理', '2', null, null, null, '1509089993', '1509089993');
INSERT INTO `auth_item` VALUES ('超级管理员', '1', '拥有所有权限的管理员', null, null, '1509089938', '1509091260');

-- ----------------------------
-- Table structure for auth_item_child
-- ----------------------------
DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_item_child
-- ----------------------------
INSERT INTO `auth_item_child` VALUES ('人事处', '人事处权限');
INSERT INTO `auth_item_child` VALUES ('人事处权限', '/site/*');
INSERT INTO `auth_item_child` VALUES ('人事处权限', '/staff-info/*');
INSERT INTO `auth_item_child` VALUES ('人事处权限', '/staff-transfer/*');
INSERT INTO `auth_item_child` VALUES ('校长', '超级管理员');
INSERT INTO `auth_item_child` VALUES ('超级管理', '/*');
INSERT INTO `auth_item_child` VALUES ('超级管理', '/admin/*');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '超级管理');

-- ----------------------------
-- Table structure for auth_rule
-- ----------------------------
DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_rule
-- ----------------------------

-- ----------------------------
-- Table structure for collect_pensions
-- ----------------------------
DROP TABLE IF EXISTS `collect_pensions`;
CREATE TABLE `collect_pensions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL COMMENT '用户ID',
  `salary` decimal(10,0) DEFAULT NULL COMMENT '薪水',
  `refer_pension` decimal(10,0) DEFAULT NULL COMMENT '上缴养老金额',
  `create_time` datetime DEFAULT NULL COMMENT '创建日期',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of collect_pensions
-- ----------------------------
INSERT INTO `collect_pensions` VALUES ('1', '19', '1000', '100', '2018-02-04 22:19:00');
INSERT INTO `collect_pensions` VALUES ('2', '19', '1000', '300', '2018-01-04 22:19:00');
INSERT INTO `collect_pensions` VALUES ('3', '19', '122223', '6111', '2018-01-22 08:36:01');
INSERT INTO `collect_pensions` VALUES ('4', '19', '122223', '2444', '2018-02-22 09:20:03');

-- ----------------------------
-- Table structure for get_pension
-- ----------------------------
DROP TABLE IF EXISTS `get_pension`;
CREATE TABLE `get_pension` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL COMMENT '用户ID',
  `get_pension` decimal(10,0) DEFAULT NULL COMMENT '领取金额',
  `create_time` datetime DEFAULT NULL COMMENT '创建日期',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of get_pension
-- ----------------------------
INSERT INTO `get_pension` VALUES ('2', '19', '100', '2018-02-04 16:36:12');
INSERT INTO `get_pension` VALUES ('3', '19', '100', '2018-02-04 16:37:19');
INSERT INTO `get_pension` VALUES ('4', '19', '4', '2018-02-04 17:00:17');

-- ----------------------------
-- Table structure for menu
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `route` varchar(255) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `data` blob,
  PRIMARY KEY (`id`),
  KEY `parent` (`parent`),
  CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `menu` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES ('1', '权限管理', null, '/admin/default/index', '1', null);
INSERT INTO `menu` VALUES ('2', '角色列表', '1', '/admin/role/index', '1', null);
INSERT INTO `menu` VALUES ('3', '权限列表', '1', '/admin/permission/index', '2', null);
INSERT INTO `menu` VALUES ('4', '用户列表', '1', '/admin/user/index', '2', null);
INSERT INTO `menu` VALUES ('5', '路由列表', '1', '/admin/route/index', '2', null);
INSERT INTO `menu` VALUES ('6', '权限分配', '1', '/admin/assignment/index', '2', null);
INSERT INTO `menu` VALUES ('7', '菜单列表', '1', '/admin/menu/index', '2', null);
INSERT INTO `menu` VALUES ('8', '教职工管理', null, '/admin/default/index', '2', null);
INSERT INTO `menu` VALUES ('9', '教职工列表', '8', '/staff-info/index', '1', null);
INSERT INTO `menu` VALUES ('10', '奖惩信息管理', null, '/admin/default/index', '3', null);
INSERT INTO `menu` VALUES ('11', '奖惩信息列表', '10', '/punishment/index', '1', null);
INSERT INTO `menu` VALUES ('12', '职工调动', null, '/admin/default/index', '4', null);
INSERT INTO `menu` VALUES ('13', '职工调动记录', '12', '/staff-transfer/index', '1', null);
INSERT INTO `menu` VALUES ('14', '招聘管理', null, '/admin/default/index', '5', null);
INSERT INTO `menu` VALUES ('15', '招聘信息', '14', '/recruitment/index', '1', null);
INSERT INTO `menu` VALUES ('16', '考核管理', null, '/admin/default/index', '6', null);
INSERT INTO `menu` VALUES ('17', '考核列表', '16', '/assessment/index', '1', null);
INSERT INTO `menu` VALUES ('18', '养老金管理', null, '/admin/default/index', '7', null);
INSERT INTO `menu` VALUES ('19', '养老金列表', '18', '/collect-pensions/index', '1', null);
INSERT INTO `menu` VALUES ('20', '提交养老金记录', '18', '/record-pensions/index', '2', null);
INSERT INTO `menu` VALUES ('21', '领取养老金列表', '18', '/get-pension/index', '3', null);
INSERT INTO `menu` VALUES ('22', '考核标准', '16', '/asssessment-standard/index', '2', null);

-- ----------------------------
-- Table structure for migration
-- ----------------------------
DROP TABLE IF EXISTS `migration`;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of migration
-- ----------------------------
INSERT INTO `migration` VALUES ('m000000_000000_base', '1508947589');
INSERT INTO `migration` VALUES ('m140506_102106_rbac_init', '1508947943');
INSERT INTO `migration` VALUES ('m140602_111327_create_menu_table', '1508948109');
INSERT INTO `migration` VALUES ('m160312_050000_create_user', '1508948110');

-- ----------------------------
-- Table structure for punishment
-- ----------------------------
DROP TABLE IF EXISTS `punishment`;
CREATE TABLE `punishment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL COMMENT '用户id',
  `staff_info_id` int(11) DEFAULT NULL COMMENT '档案Id',
  `create_author_id` int(11) DEFAULT NULL COMMENT '创建该信息的作者ID',
  `title` varchar(55) DEFAULT NULL COMMENT '标题',
  `content` varchar(155) DEFAULT NULL COMMENT '内容',
  `create_time` datetime DEFAULT NULL COMMENT '创建时间',
  `type` tinyint(2) DEFAULT NULL COMMENT '类型:0:惩罚 1:奖励',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of punishment
-- ----------------------------
INSERT INTO `punishment` VALUES ('8', '19', '2', '2', '123', '头键盘', '2017-11-25 08:49:23', '0');

-- ----------------------------
-- Table structure for record_pensions
-- ----------------------------
DROP TABLE IF EXISTS `record_pensions`;
CREATE TABLE `record_pensions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL COMMENT '用户ID',
  `already_pensions` int(11) DEFAULT NULL COMMENT '已经提交养老金月数',
  `all_pensions` int(11) DEFAULT NULL COMMENT '总月数',
  `create_time` datetime DEFAULT NULL COMMENT '创建日期',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of record_pensions
-- ----------------------------
INSERT INTO `record_pensions` VALUES ('1', '19', '4', '20', '2018-02-04 00:00:00');

-- ----------------------------
-- Table structure for recruitment
-- ----------------------------
DROP TABLE IF EXISTS `recruitment`;
CREATE TABLE `recruitment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL COMMENT '发布人id',
  `introducer` varchar(25) DEFAULT NULL COMMENT '介绍人',
  `company` varchar(50) DEFAULT '' COMMENT '公司',
  `address` varchar(50) DEFAULT NULL COMMENT '地址',
  `content` text COMMENT '内容',
  `phone` varchar(15) DEFAULT NULL COMMENT '电话号码',
  `create_time` datetime DEFAULT NULL COMMENT '创建时间',
  `deadline` datetime DEFAULT NULL COMMENT '截止时间',
  `method` varchar(255) DEFAULT NULL COMMENT '方式',
  `school_location` varchar(50) DEFAULT NULL COMMENT '学校位置',
  `email` varchar(25) DEFAULT NULL COMMENT '邮箱',
  `position_info` varchar(155) DEFAULT NULL COMMENT '职位',
  `introduced` varchar(200) DEFAULT NULL COMMENT '公司简介',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='招聘表';

-- ----------------------------
-- Records of recruitment
-- ----------------------------
INSERT INTO `recruitment` VALUES ('3', '2', 'admin', 'asdas', 'asdas', '<p>asdas</p>', 'asdas', '2017-12-17 00:00:00', '2017-12-22 00:00:00', '1', 'asdas', 'asdas@qw.com', 'php开发-2k~4k', null);
INSERT INTO `recruitment` VALUES ('4', '2', 'admin', '无敌公司', '越秀', '<p>asdasdasas</p><p><img src=\"uploads/2/0589dd536f-006ni5roly1fkya5ak4vxj309606e0t3.jpg\" alt=\"0589dd536f-006ni5roly1fkya5ak4vxj309606e0t3\"></p>', '23123123123', '2017-12-16 00:00:00', '2017-12-22 00:00:00', '网上投递简历', '', 'weqweqw@qq.com', 'php开发-2k~4k', null);
INSERT INTO `recruitment` VALUES ('8', '19', '陈易迅', '舞台公司', '32132123', 'wqeqweqw13213', '12321634', '2018-02-04 07:26:08', '2018-02-23 00:00:00', '1', '', '213123@we.com', 'php开发-2k~4k', 'wqeqweqweq');

-- ----------------------------
-- Table structure for staff_info
-- ----------------------------
DROP TABLE IF EXISTS `staff_info`;
CREATE TABLE `staff_info` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL COMMENT '关联user表的id',
  `name` varchar(25) DEFAULT NULL COMMENT '姓名',
  `address` varchar(100) DEFAULT NULL COMMENT '地址',
  `phone` varchar(50) DEFAULT NULL COMMENT '手机号码',
  `id_card` varchar(100) DEFAULT NULL COMMENT '身份证',
  `age` int(10) DEFAULT NULL COMMENT '年龄',
  `position` varchar(25) DEFAULT NULL COMMENT '职位',
  `sex` varchar(11) DEFAULT NULL COMMENT '性别',
  `pay` int(50) DEFAULT NULL COMMENT '薪酬',
  `create_date` datetime DEFAULT NULL COMMENT '入职日期',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='职工档案表';

-- ----------------------------
-- Records of staff_info
-- ----------------------------
INSERT INTO `staff_info` VALUES ('5', '25', '李四', '天河区', '11231232131', '1254431231231', '25', '职工', '男', '6000', '2018-02-22 00:00:00');
INSERT INTO `staff_info` VALUES ('6', '26', '陈国富', '天河区', '231231231233', '79841637123', '50', '校长', '男', '10000', '2018-02-22 00:00:00');
INSERT INTO `staff_info` VALUES ('7', '27', '张教师', '天河区', '12365464543', '312356456413', '25', '教师', '男', '5000', '2018-02-22 00:00:00');
INSERT INTO `staff_info` VALUES ('8', '28', '宋人事', '天河区', '123123123', '232312534543', '39', '人事处', '男', '7000', '2018-02-22 00:00:00');

-- ----------------------------
-- Table structure for staff_posistion
-- ----------------------------
DROP TABLE IF EXISTS `staff_posistion`;
CREATE TABLE `staff_posistion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(15) DEFAULT NULL COMMENT '职位名称',
  `parent_id` int(11) DEFAULT NULL COMMENT '父ID',
  `permissions` int(11) DEFAULT NULL COMMENT '权限',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='职位种类';

-- ----------------------------
-- Records of staff_posistion
-- ----------------------------
INSERT INTO `staff_posistion` VALUES ('1', '校长', '0', null);
INSERT INTO `staff_posistion` VALUES ('2', '人事处', '1', null);
INSERT INTO `staff_posistion` VALUES ('3', '系主任', '2', null);
INSERT INTO `staff_posistion` VALUES ('4', '系教师', '3', null);
INSERT INTO `staff_posistion` VALUES ('5', '系普通职工', '3', null);

-- ----------------------------
-- Table structure for staff_transfer
-- ----------------------------
DROP TABLE IF EXISTS `staff_transfer`;
CREATE TABLE `staff_transfer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL COMMENT '用户ID',
  `original_position` varchar(20) DEFAULT NULL COMMENT '原来职位',
  `now_position` varchar(20) DEFAULT NULL COMMENT '目前职位',
  `reason` varchar(50) DEFAULT NULL COMMENT '调动原因',
  `create_author_id` int(11) DEFAULT NULL COMMENT '经手人',
  `create_time` datetime DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='员工调动表';

-- ----------------------------
-- Records of staff_transfer
-- ----------------------------

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'test', 'BKJgNHKbI3kouTs42d5AoRnfiY2wJHMp', '$2y$13$jkhlnoO/Zq3hyFOrw6Q2kuA8a5IFf0yK8fvbX5pEuZQW03H6bHIja', null, 'test@qq.com', '10', '1509033214', '1509033214');
INSERT INTO `user` VALUES ('2', 'admin', 'uRNbZxFZoyvosJT5viur1bjMHMN1y8k1', '$2y$13$6WXH2tW8zIPgml36CmekhuT3rn9TE3aSSXu9zba6XV4Liv.fWcDNa', 'B7dh6y95dZuiXVLDjkm4X8n9c7TGuhJX_1518197162', '724798069@qq.com', '10', '1509033232', '1518197162');
INSERT INTO `user` VALUES ('25', '李四', 'xT701vcXaFrtiyIynFIHRa68efHQ6vhJ', '$2y$13$9aSgSKQp6B1jzdXMZbX9gub3/OqxPMGpVAqTNfsI9f8l1OGXjBNVS', null, '123@qq.com', '10', '1519288227', '1519288227');
INSERT INTO `user` VALUES ('26', '陈校长', 'XO4iHH6BSAsFG1tYYkQ_R0E5WI77VHMG', '$2y$13$l.9jjIzmQqlRF01ukjGHx.xHld9.JlXg9M9hEb3axtLOfS76vKuyW', null, '1234@qq.com', '10', '1519288321', '1519288321');
INSERT INTO `user` VALUES ('27', '张教师', 'Tss4-12ra-qyoTBN4UODkd6PrQi5JvIw', '$2y$13$m8OjuW/ouQY.hNZ8nDjot.FHTXCL7Eg/O0w16jBngSqIYGti2daWa', null, '12345@qq.com', '10', '1519288389', '1519288389');
INSERT INTO `user` VALUES ('28', '宋人事', 'BSELBkL7gkpSCrYDSPvibiexNaznC8mv', '$2y$13$kLgMX3RNPTbdKeu5gv8xTOizrg3Oks3t6mTLxi4qVXySNO89R40mK', null, '1234567@qq.com', '10', '1519288449', '1519288449');
