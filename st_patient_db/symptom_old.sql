/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : test

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-06-14 16:11:31
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for symptom
-- ----------------------------
DROP TABLE IF EXISTS `symptom`;
CREATE TABLE `symptom` (
  `sym_id` int(11) NOT NULL AUTO_INCREMENT,
  `sym_desc` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`sym_id`)
) ENGINE=MyISAM AUTO_INCREMENT=60 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of symptom
-- ----------------------------
INSERT INTO `symptom` VALUES ('1', '');
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
INSERT INTO `symptom` VALUES ('49', 'การออกใบรับรองแพทย์(อุบัติเหตุ หรือ บาดแผลถูกทำร้าย)');
INSERT INTO `symptom` VALUES ('50', 'stool exam');
INSERT INTO `symptom` VALUES ('51', 'meningococcal septicemia');
INSERT INTO `symptom` VALUES ('52', 'RUL atelectasis หรือ lung tumor');
INSERT INTO `symptom` VALUES ('53', 'thrombotic thrombocytopenic purpura (TTP)');
INSERT INTO `symptom` VALUES ('54', 'ventricular tachycardia');
INSERT INTO `symptom` VALUES ('55', 'DMPA');
INSERT INTO `symptom` VALUES ('56', 'incision & drain');
INSERT INTO `symptom` VALUES ('57', 'remove foreign body');
INSERT INTO `symptom` VALUES ('58', 'การออกใบรับรองแพทย์ (fracture of left clavicle)');
INSERT INTO `symptom` VALUES ('59', 'acute cholecystitis');
