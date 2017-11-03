/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50611
Source Host           : localhost:3306
Source Database       : gochat

Target Server Type    : MYSQL
Target Server Version : 50611
File Encoding         : 65001

Date: 2017-11-03 01:46:39
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `chat`
-- ----------------------------
DROP TABLE IF EXISTS `chat`;
CREATE TABLE `chat` (
  `ChatId` int(11) NOT NULL AUTO_INCREMENT,
  `member` char(255) NOT NULL,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`ChatId`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of chat
-- ----------------------------
INSERT INTO `chat` VALUES ('1', '1,2', '0');
INSERT INTO `chat` VALUES ('2', '1,3', '0');
INSERT INTO `chat` VALUES ('3', '1,2,3', '1');
INSERT INTO `chat` VALUES ('4', '1,2,3,4', '1');
INSERT INTO `chat` VALUES ('5', '1,4', '0');
INSERT INTO `chat` VALUES ('10', '1,2,3,4,5', '1');
INSERT INTO `chat` VALUES ('11', '1,2,3,4,5', '1');

-- ----------------------------
-- Table structure for `friend`
-- ----------------------------
DROP TABLE IF EXISTS `friend`;
CREATE TABLE `friend` (
  `UserId` int(11) NOT NULL,
  `FriendId` char(255) NOT NULL,
  PRIMARY KEY (`UserId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of friend
-- ----------------------------
INSERT INTO `friend` VALUES ('1', '2,3,4');
INSERT INTO `friend` VALUES ('2', '1');
INSERT INTO `friend` VALUES ('3', '1,2');
INSERT INTO `friend` VALUES ('4', '1');

-- ----------------------------
-- Table structure for `message`
-- ----------------------------
DROP TABLE IF EXISTS `message`;
CREATE TABLE `message` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `ChatId` int(11) NOT NULL,
  `time` char(255) NOT NULL,
  `content` text NOT NULL,
  `from` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of message
-- ----------------------------
INSERT INTO `message` VALUES ('1', '1', '29/02/2017 19:33:21', 'hello', '1', '0');
INSERT INTO `message` VALUES ('2', '1', '29/02/2017 19:33:21', 'hi', '2', '0');
INSERT INTO `message` VALUES ('3', '2', '29/02/2017 19:33:21', '1', '3', '0');
INSERT INTO `message` VALUES ('4', '2', '29/02/2017 19:33:21', '2', '1', '0');
INSERT INTO `message` VALUES ('5', '1', '29/02/2017 19:33:21', 'my name is peggy', '1', '0');
INSERT INTO `message` VALUES ('6', '2', '29/02/2017 19:33:21', 'my name is vike', '3', '0');
INSERT INTO `message` VALUES ('7', '2', '29/02/2017 19:33:21', 'assets/dist/images/6.jpg', '1', '1');
INSERT INTO `message` VALUES ('8', '1', '29/02/2017 19:33:21', 'uploads/test.docx', '2', '2');
INSERT INTO `message` VALUES ('9', '2', '29/02/2017 19:33:21', 'uploads/test.docx', '1', '2');
INSERT INTO `message` VALUES ('10', '3', '29/02/2017 19:33:21', 'hello,all u guys', '1', '0');
INSERT INTO `message` VALUES ('11', '3', '29/02/2017 19:33:21', 'hi', '2', '0');
INSERT INTO `message` VALUES ('12', '3', '29/02/2017 19:33:21', 'hahahah', '3', '0');
INSERT INTO `message` VALUES ('13', '4', '29/02/2017 19:33:21', 'FASDFASDFASD', '4', '0');
INSERT INTO `message` VALUES ('14', '4', '29/02/2017 19:33:21', 'YTUTYUTYUYT', '3', '0');
INSERT INTO `message` VALUES ('15', '4', '29/02/2017 19:33:21', 'URYURYTUR', '2', '0');
INSERT INTO `message` VALUES ('16', '4', '29/02/2017 19:33:21', 'ASDADFASD', '1', '0');
INSERT INTO `message` VALUES ('17', '2', '29/02/2017 19:33:21', 'hhhhh', '1', '0');
INSERT INTO `message` VALUES ('18', '4', '29/02/2017 19:33:21', 'hey', '1', '0');
INSERT INTO `message` VALUES ('19', '5', '29/02/2017 19:33:21', 'hey11111', '4', '0');
INSERT INTO `message` VALUES ('20', '1', '29/02/2017 19:33:21', 'ffffff', '1', '0');
INSERT INTO `message` VALUES ('21', '1', '29/02/2017 19:33:21', 'www', '1', '0');
INSERT INTO `message` VALUES ('22', '2', '29/02/2017 19:33:21', 'hia\n', '1', '0');
INSERT INTO `message` VALUES ('23', '2', '29/02/2017 19:33:21', 'qqqqq', '1', '0');
INSERT INTO `message` VALUES ('24', '1', '29/02/2017 19:33:21', 'qqqqq', '1', '0');
INSERT INTO `message` VALUES ('25', '1', '29/02/2017 19:33:21', 'wwww', '1', '0');
INSERT INTO `message` VALUES ('26', '1', '29/02/2017 19:33:21', 'ccccc', '1', '0');
INSERT INTO `message` VALUES ('27', '1', '29/02/2017 19:33:21', ' qqqq', '1', '0');
INSERT INTO `message` VALUES ('28', '1', '29/02/2017 19:33:21', 'hgkasfkjasdfjasdkl', '1', '0');
INSERT INTO `message` VALUES ('29', '2', '29/02/2017 19:33:21', 'nihaoaoaoooaoa', '1', '0');
INSERT INTO `message` VALUES ('30', '5', '29/02/2017 19:33:21', 'aaaaaaa', '1', '0');
INSERT INTO `message` VALUES ('31', '1', '29/02/2017 19:33:21', '11111', '2', '0');
INSERT INTO `message` VALUES ('32', '1', '29/02/2017 19:33:21', '11asfasdfasdfasdfas', '2', '0');
INSERT INTO `message` VALUES ('33', '5', '29/02/2017 19:33:21', 'nihaoa ', '1', '0');
INSERT INTO `message` VALUES ('34', '5', '29/02/2017 19:33:21', 'nihaohaoahoahao', '1', '0');
INSERT INTO `message` VALUES ('35', '5', '29/02/2017 19:33:21', 'hh', '1', '0');
INSERT INTO `message` VALUES ('36', '1', '29/02/2017 19:33:21', 'aaaa', '1', '0');
INSERT INTO `message` VALUES ('37', '1', '29/02/2017 19:33:21', 'ff', '1', '0');
INSERT INTO `message` VALUES ('38', '2', '29/02/2017 19:33:21', 'q', '1', '0');
INSERT INTO `message` VALUES ('39', '1', '29/02/2017 19:33:21', '111', '1', '0');
INSERT INTO `message` VALUES ('40', '1', '29/02/2017 19:33:21', '111111', '1', '0');
INSERT INTO `message` VALUES ('41', '2', '29/02/2017 19:33:21', '111111', '1', '0');
INSERT INTO `message` VALUES ('42', '5', '29/02/2017 19:33:21', 'aaa', '1', '0');
INSERT INTO `message` VALUES ('43', '1', '29/02/2017 19:33:21', '1111', '1', '0');
INSERT INTO `message` VALUES ('44', '1', '29/02/2017 19:33:21', '1111111', '1', '0');
INSERT INTO `message` VALUES ('45', '10', '29/02/2017 19:33:21', '1111', '1', '0');
INSERT INTO `message` VALUES ('46', '3', '29/02/2017 19:33:21', 'dsfadfa', '1', '0');
INSERT INTO `message` VALUES ('47', '10', '29/02/2017 19:33:21', 'dsfadfafadfasdf', '1', '0');
INSERT INTO `message` VALUES ('48', '10', '29/02/2017 19:33:21', '1111', '1', '0');
INSERT INTO `message` VALUES ('49', '4', '29/02/2017 19:33:21', '1111', '1', '0');
INSERT INTO `message` VALUES ('50', '10', '29/02/2017 19:33:21', '11', '1', '0');
INSERT INTO `message` VALUES ('51', '3', '29/02/2017 19:33:21', 'aaa', '1', '0');
INSERT INTO `message` VALUES ('52', '1', '29/02/2017 19:33:21', 'adfafsadfa', '1', '0');
INSERT INTO `message` VALUES ('53', '1', '29/02/2017 19:33:21', 'adfafsadfafsdfa', '1', '0');
INSERT INTO `message` VALUES ('54', '1', '29/02/2017 19:33:21', 'adfafsadfafsdfafadsfa', '1', '0');
INSERT INTO `message` VALUES ('55', '1', '29/02/2017 19:33:21', 'fd', '1', '0');
INSERT INTO `message` VALUES ('56', '1', '29/02/2017 19:33:21', 'fdfdf', '1', '0');
INSERT INTO `message` VALUES ('57', '2', '29/02/2017 19:33:21', 'fdfdffff', '1', '0');
INSERT INTO `message` VALUES ('58', '5', '29/02/2017 19:33:21', 'ff', '1', '0');
INSERT INTO `message` VALUES ('59', '5', '29/02/2017 19:33:21', 'fffadfa', '1', '0');
INSERT INTO `message` VALUES ('60', '5', '29/02/2017 19:33:21', 'fffadfa===', '1', '0');
INSERT INTO `message` VALUES ('61', '5', '29/02/2017 19:33:21', 'fffadfa===', '1', '0');
INSERT INTO `message` VALUES ('62', '2', '29/02/2017 19:33:21', 'fffadfa===cx', '1', '0');
INSERT INTO `message` VALUES ('63', '2', '29/02/2017 19:33:21', 'cZX', '1', '0');
INSERT INTO `message` VALUES ('64', '2', '29/02/2017 19:33:21', 'cZX', '1', '0');
INSERT INTO `message` VALUES ('65', '2', '29/02/2017 19:33:21', 'cZXcX', '1', '0');
INSERT INTO `message` VALUES ('66', '2', '29/02/2017 19:33:21', 'cZXcXxcZXC', '1', '0');
INSERT INTO `message` VALUES ('67', '2', '29/02/2017 19:33:21', 'cZXcXxcZXC', '1', '0');
INSERT INTO `message` VALUES ('68', '2', '29/02/2017 19:33:21', 'cZXcXxcZXC', '1', '0');
INSERT INTO `message` VALUES ('69', '1', '29/02/2017 19:33:21', '1111', '1', '0');
INSERT INTO `message` VALUES ('70', '4', '29/02/2017 19:33:21', '1', '1', '0');
INSERT INTO `message` VALUES ('71', '3', '29/02/2017 19:33:21', 'fadfa', '1', '0');
INSERT INTO `message` VALUES ('72', '3', '29/02/2017 19:33:21', 'fadfa', '1', '0');
INSERT INTO `message` VALUES ('73', '1', '29/02/2017 19:33:21', '88', '1', '0');
INSERT INTO `message` VALUES ('74', '10', '29/02/2017 19:33:21', '111', '1', '0');
INSERT INTO `message` VALUES ('75', '3', '29/02/2017 19:33:21', '111', '1', '0');
INSERT INTO `message` VALUES ('76', '3', '29/02/2017 19:33:21', '111', '1', '0');
INSERT INTO `message` VALUES ('77', '4', '29/02/2017 19:33:21', 'qqqq', '1', '0');
INSERT INTO `message` VALUES ('78', '1', '29/02/2017 19:33:21', '111', '1', '0');
INSERT INTO `message` VALUES ('79', '1', '29/02/2017 19:33:21', 'pppp', '1', '0');
INSERT INTO `message` VALUES ('80', '1', '29/02/2017 19:33:21', '11111', '1', '0');
INSERT INTO `message` VALUES ('81', '1', '29/02/2017 19:33:21', '1111', '1', '0');
INSERT INTO `message` VALUES ('82', '3', '29/02/2017 19:33:21', '１１１', '1', '0');
INSERT INTO `message` VALUES ('83', '10', '29/02/2017 19:33:21', '１１１１', '1', '0');
INSERT INTO `message` VALUES ('84', '4', '29/02/2017 19:33:21', '１１１１', '1', '0');
INSERT INTO `message` VALUES ('85', '10', '29/02/2017 19:33:21', 'ｊｌｊｌｊｌｋｊｌｊｌ；', '1', '0');
INSERT INTO `message` VALUES ('86', '4', '29/02/2017 19:33:21', 'ｊｌｆｊｓａｄｌｋｊｆｌａｓ', '1', '0');
INSERT INTO `message` VALUES ('87', '3', '29/02/2017 19:33:21', 'ｆａｓｄｆａｓｄｆａ', '1', '0');
INSERT INTO `message` VALUES ('88', '2', '29/02/2017 23:21:44', './uploads/admin/36675.jpg', '1', '0');
INSERT INTO `message` VALUES ('89', '2', '29/02/2017 23:23:44', './uploads/admin/9396cover+letter.docx', '1', '0');
INSERT INTO `message` VALUES ('90', '1', '29/02/2017 23:28:11', './uploads/admin/5.jpg', '1', '1');
INSERT INTO `message` VALUES ('91', '2', '30/02/2017 02:30:21', '111', '1', '0');
INSERT INTO `message` VALUES ('92', '2', '30/02/2017 02:30:27', '3333', '1', '0');
INSERT INTO `message` VALUES ('93', '1', '30/02/2017 03:08:55', '444', '1', '0');
INSERT INTO `message` VALUES ('94', '1', '30/02/2017 03:11:17', '1213567', '1', '0');
INSERT INTO `message` VALUES ('95', '1', '30/02/2017 03:12:41', 'heallpoppppp', '1', '0');
INSERT INTO `message` VALUES ('96', '1', '30/02/2017 05:13:37', 'dfdf', '1', '0');
INSERT INTO `message` VALUES ('97', '1', '30/02/2017 18:00:06', '1111', '1', '0');
INSERT INTO `message` VALUES ('98', '1', '30/02/2017 18:00:11', '1111', '1', '0');
INSERT INTO `message` VALUES ('99', '1', '03/10/2017 01:08:38', 'hi', '1', '0');
INSERT INTO `message` VALUES ('100', '2', '03/10/2017 01:08:55', './uploads/admin/Image 8.png', '1', '1');
INSERT INTO `message` VALUES ('101', '2', '03/10/2017 01:15:14', './uploads/admin/CV.docx', '1', '2');
INSERT INTO `message` VALUES ('102', '2', '03/10/2017 01:15:31', './uploads/admin/Image 6.png', '1', '1');
INSERT INTO `message` VALUES ('103', '1', '03/10/2017 01:19:14', './uploads/admin/profile.png', '1', '1');
INSERT INTO `message` VALUES ('104', '1', '03/10/2017 01:19:48', './uploads/admin/2015111604362215922.jpg', '1', '1');
INSERT INTO `message` VALUES ('105', '2', '03/10/2017 01:19:57', './uploads/admin/2015102305485854832.jpg', '1', '1');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `UserId` int(11) NOT NULL AUTO_INCREMENT,
  `PIN` char(255) NOT NULL,
  `UserName` char(255) NOT NULL,
  `profile` char(255) NOT NULL,
  `Login` int(11) NOT NULL DEFAULT '0',
  `Ip` char(255) DEFAULT NULL,
  PRIMARY KEY (`UserId`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'admin', 'admin', 'assets/dist/images/1.jpg', '0', '::ffff:127.0.0.1');
INSERT INTO `user` VALUES ('2', 'admin', 'viki', 'assets/dist/images/4.jpg', '0', '');
INSERT INTO `user` VALUES ('3', 'admin', 'peggy', 'assets/dist/images/5.jpg', '0', '');
INSERT INTO `user` VALUES ('4', 'admin', 'milo', 'assets/dist/images/3.jpg', '0', null);
INSERT INTO `user` VALUES ('5', 'admin', 'anis', 'assets/dist/images/6.jpg', '0', '::ffff:127.0.0.1');
INSERT INTO `user` VALUES ('6', 'admin', 'woomin park', 'uploads/profile.png', '0', null);
INSERT INTO `user` VALUES ('7', 'admin', 'test', 'uploads/profile.png', '0', '::ffff:127.0.0.1');
INSERT INTO `user` VALUES ('8', '3548f96304db10622eceef5114d39d2818113620b50e896957e61f8f1a04d34a5a2581e0fec11725f5d0ea3e72613de47c9950c3b9290956fc80c994016473c2$6c9f91c0045b7694b824eaa2ae84fa8de30808e7dd888245c7c2fbc7b4e29a65', 'alice', 'uploads/profile/profile.png', '0', null);
