/*
Navicat MySQL Data Transfer

Source Server         : 145_praew
Source Server Version : 50505
Source Host           : 172.17.8.145:3306
Source Database       : sps

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-07-24 13:46:50
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
INSERT INTO `evaluation` VALUES ('1', '1');
INSERT INTO `evaluation` VALUES ('2', '2');
INSERT INTO `evaluation` VALUES ('3', '3');
INSERT INTO `evaluation` VALUES ('4', '4');
INSERT INTO `evaluation` VALUES ('5', '5');

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
  PRIMARY KEY (`person_id`),
  UNIQUE KEY `id_card` (`id_card`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of person_info
-- ----------------------------
INSERT INTO `person_info` VALUES ('1', '1509901498141', '3', 'ธรเทพ', 'กาชัย', '1994-10-04', 'ชาย', '82', '174', 'ไหล่ขวา', '2', '1', 'นักวิชากาคอมพิวเตอร์', 'คณะแพทยศาสตร์ มหาวิทยาลัยเชียงใหม่', '0806767905', '222', '15', '-', 'ป่าไพร', 'สันทราย', 'เชียงใหม่', '0806767905', '-', '1', '', 'toptopty', 'mushroom_kiwi@hotmail.com', 'นางบัวผิน ศรีดาวเรือง', '0819931884', 'ไม่มี', 'HBV', '1', 'ไข้หวัดใหญ่', '', 'ไข้เลือดออก', 'เบาหวาน', 'B01', 'อยากช่วยนักศึกษา', '2018-06-14', '2018-07-16 14:39:03');
INSERT INTO `person_info` VALUES ('2', '1509901498142', '1', 'การกนร', 'กรลายน้ำ', '1991-10-08', 'ชาย', '82', '174', 'ไหล่ขวา', '1', '0', 'นักวิชากาคอมพิวเตอร์', 'คณะแพทยศาสตร์ มหาวิทยาลัยเชียงใหม่', '0806767905', '222', '15', '-', 'ป่าไพร', 'สันทราย', 'เชียงใหม่', '0806767905', '-', '1', '', 'toptopty', 'mushroom_kiwi@hotmail.com', 'นางบัวผิน ศรีดาวเรือง', '0819931884', 'ไม่มี', 'HBV', '2', 'ไข้หวัดใหญ่', 'ไข้หวัด', 'ไข้เลือดออก', 'เบาหวาน', 'A01', '', '2018-06-18', '2018-07-16 14:39:03');
INSERT INTO `person_info` VALUES ('4', '1314115679434', '2', 'ธรรนินนานา', 'โอ', '1994-10-04', 'หญิง', '100', '180', '', '3', '0', '', '', '', '', '', '', '', '', '', '', '', '1', '', '', '', '', '', '', 'ddd', '2', '', '', '', '', 'B02', '', '2018-06-13', '2018-07-16 14:39:12');
INSERT INTO `person_info` VALUES ('5', '1456667788944', '4', 'ธรรนิน', 'x', '1992-10-08', 'หญิง', '70', '168', '', '1', '0', '', '', '', '', '', '', '', '', '', '', '', '1', '', '', '', '', '', '', '', '1', '', '', '', '', 'C01', '', '2018-06-18', '2018-07-16 14:39:12');
INSERT INTO `person_info` VALUES ('6', '2221113221564', '5', 'ธรรนิน 24', 'y', '1986-10-08', 'หญิง', '50', '160', null, null, '0', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, null, null, null, '2018-06-20', '2018-07-24 10:18:02');
INSERT INTO `person_info` VALUES ('8', '1554897854512', '5', 'ธรรนิน', 'z', '1984-10-10', 'หญิง', '72', '180', '', '3', '0', '', '', '', '', '', '', '', '', '', '', '', '1', '', '', '', '', '', '', '', '0', '', '', '', '', 'C01', '', '2018-06-21', '2018-07-20 14:49:24');
INSERT INTO `person_info` VALUES ('11', '5464654654654', '3', 'ธรรนิน 32', 'F', '1986-10-16', 'ชาย', '75', '175', '', '1', '0', '', '', '', '', '', '', '', '', '', '', '', '1', '', '', '', '', '', '', '', '1', '', '', '', '', 'A01', '', '2018-06-16', '2018-07-16 14:38:07');
INSERT INTO `person_info` VALUES ('12', '7878546484848', '3', 'ธรรนิน 31', 'G', '1987-10-07', 'ชาย', '45', '156', '', '1', '0', '', '', '', '', '', '', '', '', '', '', '', '1', '', '', '', '', '', '', '', '1', '', '', '', '', 'A01', '', '2018-06-15', '2018-07-16 14:38:03');
INSERT INTO `person_info` VALUES ('13', '1556562131554', '3', 'TOPTENx', 'ma', '1983-01-06', 'ชาย', '65', '170', 'ข้อเท้าซ้าย', '1', '0', 'โปรแกรมเมอร์', 'มช.', '0806555566', '56', '65', '-', 'ป่าไกล', 'สันทราย', 'เชียงใหม่', '0806464805', '-', '4', 'วิศวกรรมศาสตร์', 'tarathep', 'tarathep@gmail.com', 'นางบัวลอย ลอยลับ', '0888655688', 'ไม่เคย', 'หอบหืด', '0', '', '', '', '', 'A01', 'อยากสนับสนุนการเรียนการศึกษา', '2018-07-05', '2018-07-18 11:50:12');
INSERT INTO `person_info` VALUES ('15', '1122334455667', '3', 'TYTYty', 'xxx', '1981-01-08', 'ชาย', '50', '175', '', '1', '1', 'นักวิชากาคอมพิวเตอร์', 'คณะแพทยศาสตร์ มหาวิทยาลัยเชียงใหม่', '', '', '25', '', '', '', '', '', '', '2', 'วิทยาศาสตร์', '', '', '', '', '', '', '0', '', '', '', '', 'C01', '', '2018-07-05', '2018-07-18 11:41:14');
INSERT INTO `person_info` VALUES ('16', '1677455677891', '3', 'ทดสอบ', 'ลองทำดู', '1978-10-04', 'ชาย', '65', '169', 'รอบเอว', '2', '0', 'หมอดู', 'ห้างเดาเอา', '0805411718', '47', '5', 'หลง', 'หาทาง', 'ขอทางหน่อย', 'ทดสอบหลง', '0805644567', '-', '2', '', 'lost_somewhere', 'helpme@gmail.com', 'นายหาทางกลับ', '0800000056', '1.ผ่าตัดสมอง\r\n2.ผ่าตัดหัวใจ', 'ความจำเสื่อม', '1', null, null, null, null, '1', 'ต้องการหาทางกลับบ้าน', '2018-07-20', '2018-07-24 10:57:49');

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
  `evaluation` int(1) unsigned zerofill DEFAULT NULL,
  `comment` text,
  `datetime` datetime NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`sp_info_id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sp_info
-- ----------------------------
INSERT INTO `sp_info` VALUES ('1', '1', '2018-06-25', '4', '4', '2', '', '2018-06-27 09:32:01', '2018-07-18 16:26:38');
INSERT INTO `sp_info` VALUES ('2', '1', '2018-06-26', '1', '2', '1', 'No', '2018-06-26 09:34:06', '2018-06-28 13:40:25');
INSERT INTO `sp_info` VALUES ('7', '2', '2018-06-20', '1', '19', '2', 'ทดสอบ', '2018-06-26 11:32:53', '2018-07-13 14:17:20');
INSERT INTO `sp_info` VALUES ('8', '2', '2018-06-19', '1', '20', '5', '', '2018-06-26 11:33:51', '2018-06-28 09:31:29');
INSERT INTO `sp_info` VALUES ('9', '4', '2018-06-27', '1', '52', '0', '', '2018-06-27 10:25:45', '2018-06-28 14:24:44');
INSERT INTO `sp_info` VALUES ('11', '2', '2018-06-28', '1', '8', '5', '', '2018-06-28 16:03:40', '2018-06-28 16:03:40');
INSERT INTO `sp_info` VALUES ('12', '2', '2018-06-05', '1', '57', '5', '', '2018-06-28 16:12:20', '2018-06-28 16:12:20');
INSERT INTO `sp_info` VALUES ('13', '2', '2018-06-28', '4', '3', '3', '', '2018-06-28 16:12:58', '2018-06-28 16:12:58');
INSERT INTO `sp_info` VALUES ('15', '12', '2018-06-28', '1', '52', '2', '', '2018-06-28 16:23:58', '2018-07-20 17:28:51');
INSERT INTO `sp_info` VALUES ('18', '2', '2018-06-28', '1', '55', '3', '', '2018-06-29 09:30:56', '2018-06-29 09:31:03');
INSERT INTO `sp_info` VALUES ('19', '2', '2018-07-04', '1', '40', '5', 'dsds', '2018-07-04 17:06:12', '2018-07-13 14:17:01');
INSERT INTO `sp_info` VALUES ('22', '13', '2018-07-17', '2', '45', '1', '111', '2018-07-17 10:26:31', '2018-07-18 16:41:57');
INSERT INTO `sp_info` VALUES ('23', '13', '2018-07-17', '3', '13', '1', '', '2018-07-17 10:28:07', '2018-07-18 16:19:04');
INSERT INTO `sp_info` VALUES ('24', '13', '2018-07-17', '2', '48', '2', '', '2018-07-17 10:28:07', '2018-07-18 15:50:45');
INSERT INTO `sp_info` VALUES ('25', '15', '2018-07-17', '2', '13', '4', '', '2018-07-17 10:28:07', '2018-07-18 15:50:51');
INSERT INTO `sp_info` VALUES ('26', '13', '2018-07-18', '3', '57', '3', '', '2018-07-18 11:44:50', '2018-07-18 11:44:50');
INSERT INTO `sp_info` VALUES ('34', '15', '2018-07-20', '1', '45', '1', '', '2018-07-20 12:33:00', '2018-07-20 17:34:00');
INSERT INTO `sp_info` VALUES ('35', '13', '2018-07-20', '4', '45', '0', '', '2018-07-20 12:33:00', '2018-07-20 12:33:00');
INSERT INTO `sp_info` VALUES ('37', '13', '2018-07-20', '4', '45', '0', '', '2018-07-20 12:33:02', '2018-07-20 12:33:02');
INSERT INTO `sp_info` VALUES ('38', '15', '2018-07-20', '2', '45', '1', '', '2018-07-20 12:33:02', '2018-07-20 17:34:03');
INSERT INTO `sp_info` VALUES ('39', '13', '2018-07-20', '4', '45', '0', '', '2018-07-20 12:33:02', '2018-07-20 12:33:02');
INSERT INTO `sp_info` VALUES ('41', '13', '2018-07-20', '4', '45', '0', '', '2018-07-20 12:33:02', '2018-07-20 12:33:02');
INSERT INTO `sp_info` VALUES ('43', '13', '2018-07-20', '4', '45', '0', '', '2018-07-20 12:33:14', '2018-07-20 12:33:14');
INSERT INTO `sp_info` VALUES ('45', '16', '2018-07-24', '1', '26', '2', '', '2018-07-24 05:16:40', '2018-07-24 05:16:40');
INSERT INTO `sp_info` VALUES ('46', '2', '2018-07-24', '1', '26', '0', '', '2018-07-24 05:16:40', '2018-07-24 05:16:40');
INSERT INTO `sp_info` VALUES ('47', '16', '2018-07-24', '1', '2', '0', '', '2018-07-24 10:57:58', '2018-07-24 10:57:58');

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
  `time_code` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `time_name` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`time_code`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of time_sp
-- ----------------------------
INSERT INTO `time_sp` VALUES ('1', 'ทุกครั้งเมื่อคณะแพทยศาสตร์ต้องการ');
INSERT INTO `time_sp` VALUES ('2', 'บางครั้งตามแต่เวลาและโอกาสจะเอื้ออำนวย / วันจันทร์ - ศุกร์ (เวลาราชการ)');
INSERT INTO `time_sp` VALUES ('3', 'บางครั้งตามแต่เวลาและโอกาสจะเอื้ออำนวย / วันเสาร์ - อาทิตย์');
INSERT INTO `time_sp` VALUES ('4', 'ไม่แน่ใจยังไม่ได้ตัดสินใจ');
