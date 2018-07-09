/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : sp_patient

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-07-04 08:39:58
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for education
-- ----------------------------
DROP TABLE IF EXISTS `education`;
CREATE TABLE `education` (
  `id` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `edu_name` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of education
-- ----------------------------
INSERT INTO `education` VALUES ('1', 'ประถมศึกษา');
INSERT INTO `education` VALUES ('2', 'มัธยมศึกษาตอนต้น');
INSERT INTO `education` VALUES ('3', 'มัธยมศึกษาตอนปลาย/หรือเทียบเท่า');
INSERT INTO `education` VALUES ('4', 'อนุปริญญา/หรือเทียบเท่า');
INSERT INTO `education` VALUES ('5', 'ปริญญาตรีขึ้นไป');

-- ----------------------------
-- Table structure for evaluation
-- ----------------------------
DROP TABLE IF EXISTS `evaluation`;
CREATE TABLE `evaluation` (
  `eva_id` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `eva_desc` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`eva_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of evaluation
-- ----------------------------
INSERT INTO `evaluation` VALUES ('1', null);
INSERT INTO `evaluation` VALUES ('2', null);
INSERT INTO `evaluation` VALUES ('3', null);
INSERT INTO `evaluation` VALUES ('4', null);
INSERT INTO `evaluation` VALUES ('5', null);

-- ----------------------------
-- Table structure for person_info
-- ----------------------------
DROP TABLE IF EXISTS `person_info`;
CREATE TABLE `person_info` (
  `person_id` int(7) NOT NULL AUTO_INCREMENT,
  `id_card` varchar(13) DEFAULT NULL,
  `prefix` int(2) unsigned DEFAULT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `age` varchar(3) DEFAULT NULL,
  `gender` varchar(10) NOT NULL,
  `weight` double(5,0) unsigned DEFAULT NULL,
  `height` double(5,0) DEFAULT NULL,
  `scar` mediumtext,
  `status` int(2) DEFAULT NULL,
  `child` varchar(10) DEFAULT NULL,
  `job` varchar(200) DEFAULT NULL,
  `workplace` varchar(200) DEFAULT NULL,
  `tel_work` char(10) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `mu` varchar(4) DEFAULT NULL,
  `road` varchar(100) DEFAULT NULL,
  `tambol` varchar(100) DEFAULT NULL,
  `amphur` varchar(100) DEFAULT NULL,
  `province` varchar(100) DEFAULT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `fax` varchar(30) DEFAULT NULL,
  `edu` varchar(2) DEFAULT NULL,
  `edu_detail` varchar(100) DEFAULT NULL,
  `line_id` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `person_em` varchar(100) DEFAULT NULL,
  `tel_em` varchar(20) DEFAULT NULL,
  `admission` text,
  `disease` varchar(255) DEFAULT NULL,
  `exp` varchar(1) DEFAULT NULL,
  `exp_1` text,
  `exp_2` text,
  `exp_3` text,
  `exp_4` text,
  `time_sp` varchar(3) DEFAULT NULL,
  `reason` text,
  `rec_day` date DEFAULT NULL,
  `last_update` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`person_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of person_info
-- ----------------------------
INSERT INTO `person_info` VALUES ('1', '1509901498141', '3', 'ธรเทพ', 'กาชัย', '1994-10-04', '24', 'male', '82', '174', 'ไหล่ขวา', '2', '1', 'นักวิชากาคอมพิวเตอร์', 'คณะแพทยศาสตร์ มหาวิทยาลัยเชียงใหม่', '0806767905', '222', '15', '-', 'ป่าไพร', 'สันทราย', 'เชียงใหม่', '0806767905', '-', '1', '', 'toptopty', 'mushroom_kiwi@hotmail.com', 'นางบัวผิน ศรีดาวเรือง', '0819931884', 'ไม่มี', 'HBV', '1', 'ไข้หวัดใหญ่', '', 'ไข้เลือดออก', 'เบาหวาน', 'B01', 'อยากช่วยนักศึกษา', '2018-06-14', '2018-06-29 16:30:38');
INSERT INTO `person_info` VALUES ('2', '1509901498142', '1', 'การกนร', 'กรลายน้ำ', '1991-10-08', '27', 'male', '82', '174', 'ไหล่ขวา', '1', '0', 'นักวิชากาคอมพิวเตอร์', 'คณะแพทยศาสตร์ มหาวิทยาลัยเชียงใหม่', '0806767905', '222', '15', '-', 'ป่าไพร', 'สันทราย', 'เชียงใหม่', '0806767905', '-', '1', '', 'toptopty', 'mushroom_kiwi@hotmail.com', 'นางบัวผิน ศรีดาวเรือง', '0819931884', 'ไม่มี', 'HBV', '2', 'ไข้หวัดใหญ่', 'ไข้หวัด', 'ไข้เลือดออก', 'เบาหวาน', 'A01', '', '2018-06-18', '2018-06-25 10:50:14');
INSERT INTO `person_info` VALUES ('4', '1314115679434', '2', 'ธรรนินนานา', 'โอ', '1994-10-04', '24', 'female', '100', '180', '', '3', '0', '', '', '', '', '', '', '', '', '', '', '', '1', '', '', '', '', '', '', 'ddd', '2', '', '', '', '', 'B02', '', '2018-06-13', '2018-06-28 14:26:07');
INSERT INTO `person_info` VALUES ('5', '131', '4', 'ธรรนิน', '2', '1994-10-04', '24', 'female', null, null, null, null, '0', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '1', null, null, null, null, 'C01', null, '2018-06-18', '2018-06-21 13:54:36');
INSERT INTO `person_info` VALUES ('6', '131', '5', 'ธรรนิน', '2', '1994-10-04', '24', 'female', null, null, null, null, '0', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '1', null, null, null, null, null, null, '2018-06-20', '2018-06-29 16:30:10');
INSERT INTO `person_info` VALUES ('7', '131', '3', 'ธรรนิน', '2', '1994-10-04', '24', 'male', null, null, null, null, '0', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '1', null, null, null, null, null, null, '2018-06-21', '2018-06-29 16:30:06');
INSERT INTO `person_info` VALUES ('8', '131', '3', 'ธรรนิน', '2', '1994-10-04', '24', 'male', null, null, null, null, '0', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '1', null, null, null, null, null, null, '2018-06-21', '2018-06-29 16:30:02');
INSERT INTO `person_info` VALUES ('9', '131', '3', 'ธรรนิน', '2', '1994-10-04', '24', 'male', null, null, null, null, '0', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '1', null, null, null, null, null, null, '2018-06-19', '2018-06-29 16:30:18');
INSERT INTO `person_info` VALUES ('10', '131', '3', 'ธรรนิน', '2', '1994-10-04', '24', 'male', null, null, null, null, '0', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '1', null, null, null, null, null, null, '2018-06-17', '2018-06-29 16:30:24');
INSERT INTO `person_info` VALUES ('11', '131', '3', 'ธรรนิน', '2', '1994-10-04', '24', 'male', null, null, null, null, '0', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '1', null, null, null, null, null, null, '2018-06-16', '2018-06-29 16:30:28');
INSERT INTO `person_info` VALUES ('12', '131', '3', 'ธรรนิน', '2', '1994-10-04', '24', 'male', null, null, null, null, '0', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '1', null, null, null, null, null, null, '2018-06-15', '2018-06-29 16:30:33');

-- ----------------------------
-- Table structure for person_status
-- ----------------------------
DROP TABLE IF EXISTS `person_status`;
CREATE TABLE `person_status` (
  `id` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of person_status
-- ----------------------------
INSERT INTO `person_status` VALUES ('1', 'โสด');
INSERT INTO `person_status` VALUES ('2', 'สมรส');
INSERT INTO `person_status` VALUES ('3', 'หย่าร้าง');

-- ----------------------------
-- Table structure for prefix
-- ----------------------------
DROP TABLE IF EXISTS `prefix`;
CREATE TABLE `prefix` (
  `id` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `prefix` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of prefix
-- ----------------------------
INSERT INTO `prefix` VALUES ('1', 'ด.ช.');
INSERT INTO `prefix` VALUES ('2', 'ด.ญ.');
INSERT INTO `prefix` VALUES ('3', 'นาย');
INSERT INTO `prefix` VALUES ('4', 'นาง');
INSERT INTO `prefix` VALUES ('5', 'นางสาว');

-- ----------------------------
-- Table structure for sp_act
-- ----------------------------
DROP TABLE IF EXISTS `sp_act`;
CREATE TABLE `sp_act` (
  `sp_act_id` int(5) NOT NULL,
  `sp_code` varchar(3) NOT NULL,
  `sp_act_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`sp_act_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sp_act
-- ----------------------------
INSERT INTO `sp_act` VALUES ('1', 'A', 'ซักประวัติ');
INSERT INTO `sp_act` VALUES ('2', 'B', 'รับคำแนะนำ');
INSERT INTO `sp_act` VALUES ('3', 'C', 'ตรวจร่างกาย');
INSERT INTO `sp_act` VALUES ('4', 'D', 'การทำหัตถการ');

-- ----------------------------
-- Table structure for sp_info
-- ----------------------------
DROP TABLE IF EXISTS `sp_info`;
CREATE TABLE `sp_info` (
  `sp_info_id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `person_id` int(7) NOT NULL,
  `date` date NOT NULL,
  `sp_act_id` int(5) DEFAULT NULL,
  `symp_id` int(11) unsigned DEFAULT NULL,
  `evaluation` char(1) DEFAULT NULL,
  `comment` text,
  `datetime` datetime NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`sp_info_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sp_info
-- ----------------------------
INSERT INTO `sp_info` VALUES ('1', '1', '2018-06-25', '1', '4', '2', '', '2018-06-27 09:32:01', '2018-06-28 16:16:29');
INSERT INTO `sp_info` VALUES ('2', '1', '2018-06-26', '1', '2', '1', 'No', '2018-06-26 09:34:06', '2018-06-28 13:40:25');
INSERT INTO `sp_info` VALUES ('7', '2', '2018-06-20', '1', '19', '3', '', '2018-06-26 11:32:53', '2018-06-28 13:21:11');
INSERT INTO `sp_info` VALUES ('8', '2', '2018-06-19', '1', '20', '5', '', '2018-06-26 11:33:51', '2018-06-28 09:31:29');
INSERT INTO `sp_info` VALUES ('9', '4', '2018-06-27', '1', '52', '', '', '2018-06-27 10:25:45', '2018-06-28 14:24:44');
INSERT INTO `sp_info` VALUES ('11', '2', '2018-06-28', '1', '8', '5', '', '2018-06-28 16:03:40', '2018-06-28 16:03:40');
INSERT INTO `sp_info` VALUES ('12', '2', '2018-06-05', '1', '57', '5', '', '2018-06-28 16:12:20', '2018-06-28 16:12:20');
INSERT INTO `sp_info` VALUES ('13', '2', '2018-06-28', '4', '3', '3', '', '2018-06-28 16:12:58', '2018-06-28 16:12:58');
INSERT INTO `sp_info` VALUES ('15', '12', '2018-06-28', '1', '52', '4', '', '2018-06-28 16:23:58', '2018-06-28 16:24:11');
INSERT INTO `sp_info` VALUES ('18', '2', '2018-06-28', '1', '55', '3', '', '2018-06-29 09:30:56', '2018-06-29 09:31:03');

-- ----------------------------
-- Table structure for symptom
-- ----------------------------
DROP TABLE IF EXISTS `symptom`;
CREATE TABLE `symptom` (
  `symp_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `symp_name` varchar(255) NOT NULL,
  PRIMARY KEY (`symp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of symptom
-- ----------------------------
INSERT INTO `symptom` VALUES ('2', 'acute glomerulonephritis');
INSERT INTO `symptom` VALUES ('3', 'acute pancreatitis');
INSERT INTO `symptom` VALUES ('4', 'angina pectoris');
INSERT INTO `symptom` VALUES ('5', 'benign venus');
INSERT INTO `symptom` VALUES ('6', 'bitemporal hemianopia');
INSERT INTO `symptom` VALUES ('7', 'breast feeding');
INSERT INTO `symptom` VALUES ('8', 'CA Cx.');
INSERT INTO `symptom` VALUES ('9', 'cardiogenic syncope');
INSERT INTO `symptom` VALUES ('10', 'carpal tunnel');
INSERT INTO `symptom` VALUES ('11', 'cervical nerve root 6 radiculopathy/compression');
INSERT INTO `symptom` VALUES ('12', 'consent tonsil');
INSERT INTO `symptom` VALUES ('13', 'DM');
INSERT INTO `symptom` VALUES ('14', 'ectopic pregnancy');
INSERT INTO `symptom` VALUES ('15', 'G6PD deficiency');
INSERT INTO `symptom` VALUES ('16', 'Genetic counseling');
INSERT INTO `symptom` VALUES ('17', 'hematochesia');
INSERT INTO `symptom` VALUES ('18', 'hemophilia');
INSERT INTO `symptom` VALUES ('19', 'herpes zooster');
INSERT INTO `symptom` VALUES ('20', 'HNP rt.5th lumbar compression');
INSERT INTO `symptom` VALUES ('21', 'lumbar puncture');
INSERT INTO `symptom` VALUES ('22', 'majordepressive disorder');
INSERT INTO `symptom` VALUES ('23', 'maxillofacial injury');
INSERT INTO `symptom` VALUES ('24', 'normal breast');
INSERT INTO `symptom` VALUES ('25', 'obstructive jaundice');
INSERT INTO `symptom` VALUES ('26', 'paroxysmal ventricular tachycardia');
INSERT INTO `symptom` VALUES ('27', 'Poor visual acuity');
INSERT INTO `symptom` VALUES ('28', 'postural drainage');
INSERT INTO `symptom` VALUES ('29', 'premature rupture of membranes');
INSERT INTO `symptom` VALUES ('30', 'primary survey');
INSERT INTO `symptom` VALUES ('31', 'right homonymous hemianopia');
INSERT INTO `symptom` VALUES ('32', 'roseolar infantum');
INSERT INTO `symptom` VALUES ('33', 'splint');
INSERT INTO `symptom` VALUES ('34', 'URI');
INSERT INTO `symptom` VALUES ('35', 'viral gastroenteritis');
INSERT INTO `symptom` VALUES ('36', 'jaundice');
INSERT INTO `symptom` VALUES ('37', 'urethral cath.');
INSERT INTO `symptom` VALUES ('38', 'anterior nasal packing');
INSERT INTO `symptom` VALUES ('39', 'pap smear');
INSERT INTO `symptom` VALUES ('40', 'CPR');
INSERT INTO `symptom` VALUES ('41', 'disability');
INSERT INTO `symptom` VALUES ('42', 'labor curve');
INSERT INTO `symptom` VALUES ('43', 'EKG tracing');
INSERT INTO `symptom` VALUES ('44', 'Gram, AFB, Tzank stain');
INSERT INTO `symptom` VALUES ('45', 'abd.x-ray');
INSERT INTO `symptom` VALUES ('46', 'blood smear');
INSERT INTO `symptom` VALUES ('47', 'basic CPR');
INSERT INTO `symptom` VALUES ('48', 'suturing');
INSERT INTO `symptom` VALUES ('50', 'stool exam');
INSERT INTO `symptom` VALUES ('51', 'meningococcal septicemia');
INSERT INTO `symptom` VALUES ('52', 'RUL atelectasis ???? lung tumor');
INSERT INTO `symptom` VALUES ('53', 'thrombotic thrombocytopenic purpura (TTP)');
INSERT INTO `symptom` VALUES ('54', 'ventricular tachycardia');
INSERT INTO `symptom` VALUES ('55', 'DMPA');
INSERT INTO `symptom` VALUES ('56', 'incision & drain');
INSERT INTO `symptom` VALUES ('57', 'remove foreign body');
INSERT INTO `symptom` VALUES ('59', 'acute cholecystitis');

-- ----------------------------
-- Table structure for time_sp
-- ----------------------------
DROP TABLE IF EXISTS `time_sp`;
CREATE TABLE `time_sp` (
  `time_code` varchar(3) NOT NULL,
  `time_name` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`time_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of time_sp
-- ----------------------------
INSERT INTO `time_sp` VALUES ('A01', 'ทุกครั้งเมื่อคณะแพทยศาสตร์ต้องการ');
INSERT INTO `time_sp` VALUES ('B01', 'บางครั้งตามแต่เวลาและโอกาสจะเอื้ออำนวย / วันจันทร์ - ศุกร์ (เวลาราชการ)');
INSERT INTO `time_sp` VALUES ('B02', 'บางครั้งตามแต่เวลาและโอกาสจะเอื้ออำนวย / วันเสาร์ - อาทิตย์');
INSERT INTO `time_sp` VALUES ('C01', 'ไม่แน่ใจยังไม่ได้ตัดสินใจ');
