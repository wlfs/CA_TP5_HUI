/*
Navicat MySQL Data Transfer

Source Server         : loc
Source Server Version : 50547
Source Host           : localhost:3306
Source Database       : ca_v1

Target Server Type    : MYSQL
Target Server Version : 50547
File Encoding         : 65001

Date: 2016-09-30 17:54:50
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for common_actions
-- ----------------------------
DROP TABLE IF EXISTS `common_actions`;
CREATE TABLE `common_actions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `is_group` tinyint(4) DEFAULT '1' COMMENT '是否分组',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=249 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of common_actions
-- ----------------------------
INSERT INTO `common_actions` VALUES ('213', 'demo', 'demo', '0', null, '1');
INSERT INTO `common_actions` VALUES ('214', 'demo/page', 'demo/page', '213', 'demo/page', '0');
INSERT INTO `common_actions` VALUES ('215', 'demo/db', 'demo/db', '213', 'demo/db', '0');
INSERT INTO `common_actions` VALUES ('216', '删除', 'demo/delete', '213', '删除', '0');
INSERT INTO `common_actions` VALUES ('217', '权限管理', 'common.actions', '0', '', '1');
INSERT INTO `common_actions` VALUES ('218', '列表', 'common.actions/index', '217', '列表', '0');
INSERT INTO `common_actions` VALUES ('219', '添加', 'common.actions/create', '217', '添加', '0');
INSERT INTO `common_actions` VALUES ('220', '修改', 'common.actions/edit', '217', '修改', '0');
INSERT INTO `common_actions` VALUES ('221', 'common.actions/refreshAction', 'common.actions/refreshAction', '217', 'common.actions/refreshAction', '0');
INSERT INTO `common_actions` VALUES ('222', '删除', 'common.actions/delete', '217', '删除', '0');
INSERT INTO `common_actions` VALUES ('223', '管理员', 'common.admin', '0', '', '1');
INSERT INTO `common_actions` VALUES ('224', '列表', 'common.admin/index', '223', '列表', '0');
INSERT INTO `common_actions` VALUES ('225', 'common.admin/disable', 'common.admin/disable', '223', 'common.admin/disable', '0');
INSERT INTO `common_actions` VALUES ('226', 'common.admin/recovery', 'common.admin/recovery', '223', 'common.admin/recovery', '0');
INSERT INTO `common_actions` VALUES ('227', '添加', 'common.admin/create', '223', '添加', '0');
INSERT INTO `common_actions` VALUES ('228', '修改', 'common.admin/edit', '223', '修改', '0');
INSERT INTO `common_actions` VALUES ('229', 'common.admin/setPasswormodel', 'common.admin/setPasswormodel', '223', 'common.admin/setPasswormodel', '0');
INSERT INTO `common_actions` VALUES ('230', '删除', 'common.admin/delete', '223', '删除', '0');
INSERT INTO `common_actions` VALUES ('231', 'common.groups', 'common.groups', '0', null, '1');
INSERT INTO `common_actions` VALUES ('232', '列表', 'common.groups/index', '231', '列表', '0');
INSERT INTO `common_actions` VALUES ('233', '添加', 'common.groups/create', '231', '添加', '0');
INSERT INTO `common_actions` VALUES ('234', '修改', 'common.groups/edit', '231', '修改', '0');
INSERT INTO `common_actions` VALUES ('235', 'common.groups/auth', 'common.groups/auth', '231', 'common.groups/auth', '0');
INSERT INTO `common_actions` VALUES ('236', '删除', 'common.groups/delete', '231', '删除', '0');
INSERT INTO `common_actions` VALUES ('237', 'common.loginRecord', 'common.loginRecord', '0', null, '1');
INSERT INTO `common_actions` VALUES ('238', '列表', 'common.loginRecord/index', '237', '列表', '0');
INSERT INTO `common_actions` VALUES ('239', '删除', 'common.loginRecord/delete', '237', '删除', '0');
INSERT INTO `common_actions` VALUES ('240', 'common.menus', 'common.menus', '0', null, '1');
INSERT INTO `common_actions` VALUES ('241', '列表', 'common.menus/index', '240', '列表', '0');
INSERT INTO `common_actions` VALUES ('242', '添加', 'common.menus/create', '240', '添加', '0');
INSERT INTO `common_actions` VALUES ('243', '修改', 'common.menus/edit', '240', '修改', '0');
INSERT INTO `common_actions` VALUES ('244', '删除', 'common.menus/delete', '240', '删除', '0');
INSERT INTO `common_actions` VALUES ('245', 'common.operationLog', 'common.operationLog', '0', null, '1');
INSERT INTO `common_actions` VALUES ('246', '列表', 'common.operationLog/index', '245', '列表', '0');
INSERT INTO `common_actions` VALUES ('247', '查看', 'common.operationLog/read', '245', '查看', '0');
INSERT INTO `common_actions` VALUES ('248', '删除', 'common.operationLog/delete', '245', '删除', '0');

-- ----------------------------
-- Table structure for common_admin
-- ----------------------------
DROP TABLE IF EXISTS `common_admin`;
CREATE TABLE `common_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) DEFAULT NULL,
  `login_name` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `salt` varchar(5) DEFAULT NULL COMMENT '密码盐',
  `mobile` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL COMMENT '邮箱',
  `last_login_ip` varchar(20) DEFAULT NULL,
  `last_login_time` bigint(20) DEFAULT NULL,
  `last_login_address` varchar(50) DEFAULT NULL,
  `error_count` int(11) DEFAULT '0' COMMENT '密码输入异常次数',
  `memo` varchar(255) DEFAULT NULL COMMENT '备注',
  `status` tinyint(4) DEFAULT '1' COMMENT '状态',
  `created` int(11) DEFAULT NULL COMMENT '创建时间',
  `skin` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of common_admin
-- ----------------------------
INSERT INTO `common_admin` VALUES ('1', '超级管理员', 'admin', 'c4e8120040b73db42167a3b91fc51424', 'QETS', '13883096587', 'ww@qq.com', '127.0.0.1', '1475216025', '本机地址', '0', 'sssss', '1', null, 'green');
INSERT INTO `common_admin` VALUES ('2', 'test001', 'admin1', 'bf0a7b071550cb4a64be9fcaae8f63e8', 'Aa8a', '', '', '127.0.0.1', '1469003696', '本机地址', '0', '12345\r\nadddddddddddddddd', '1', '1469003696', null);
INSERT INTO `common_admin` VALUES ('3', '123', '13883096587', '3e9154953e649c794cbdac4e77be9568', 'sRto', '', '', '127.0.0.1', '1469003759', '本机地址', '0', '', '1', '1469003759', null);
INSERT INTO `common_admin` VALUES ('4', '123456', '15025409035', '95173257e3c10a411d384376254a039d', '97JZ', '15025409035', '', '127.0.0.1', '1469003824', '本机地址', '0', 'asdfasdfasdfas', '2', '1469003824', null);

-- ----------------------------
-- Table structure for common_admin_group
-- ----------------------------
DROP TABLE IF EXISTS `common_admin_group`;
CREATE TABLE `common_admin_group` (
  `admin_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`admin_id`,`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of common_admin_group
-- ----------------------------
INSERT INTO `common_admin_group` VALUES ('1', '1');
INSERT INTO `common_admin_group` VALUES ('2', '1');
INSERT INTO `common_admin_group` VALUES ('2', '2');
INSERT INTO `common_admin_group` VALUES ('4', '2');
INSERT INTO `common_admin_group` VALUES ('6', '1');
INSERT INTO `common_admin_group` VALUES ('6', '2');

-- ----------------------------
-- Table structure for common_groups
-- ----------------------------
DROP TABLE IF EXISTS `common_groups`;
CREATE TABLE `common_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `is_sys` tinyint(4) DEFAULT '0' COMMENT '是否系统组',
  `type` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `intro` varchar(255) DEFAULT NULL COMMENT '描述',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of common_groups
-- ----------------------------
INSERT INTO `common_groups` VALUES ('1', '管理员', '1', null, null, '所有权限1');
INSERT INTO `common_groups` VALUES ('2', '普通用户', '0', null, null, '普通用户');
INSERT INTO `common_groups` VALUES ('3', '组长', '0', null, null, '组长');
INSERT INTO `common_groups` VALUES ('7', 'asdfasdf按时发多少地方', '0', null, null, 'asdfsadf是打发斯蒂芬');

-- ----------------------------
-- Table structure for common_group_action
-- ----------------------------
DROP TABLE IF EXISTS `common_group_action`;
CREATE TABLE `common_group_action` (
  `group_id` int(11) NOT NULL,
  `action_id` int(11) NOT NULL,
  PRIMARY KEY (`group_id`,`action_id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of common_group_action
-- ----------------------------
INSERT INTO `common_group_action` VALUES ('1', '213');
INSERT INTO `common_group_action` VALUES ('1', '214');
INSERT INTO `common_group_action` VALUES ('1', '215');
INSERT INTO `common_group_action` VALUES ('1', '216');
INSERT INTO `common_group_action` VALUES ('1', '217');
INSERT INTO `common_group_action` VALUES ('1', '218');
INSERT INTO `common_group_action` VALUES ('1', '219');
INSERT INTO `common_group_action` VALUES ('1', '220');
INSERT INTO `common_group_action` VALUES ('1', '221');
INSERT INTO `common_group_action` VALUES ('1', '222');
INSERT INTO `common_group_action` VALUES ('1', '223');
INSERT INTO `common_group_action` VALUES ('1', '224');
INSERT INTO `common_group_action` VALUES ('1', '225');
INSERT INTO `common_group_action` VALUES ('1', '226');
INSERT INTO `common_group_action` VALUES ('1', '227');
INSERT INTO `common_group_action` VALUES ('1', '228');
INSERT INTO `common_group_action` VALUES ('1', '229');
INSERT INTO `common_group_action` VALUES ('1', '230');
INSERT INTO `common_group_action` VALUES ('1', '231');
INSERT INTO `common_group_action` VALUES ('1', '232');
INSERT INTO `common_group_action` VALUES ('1', '233');
INSERT INTO `common_group_action` VALUES ('1', '234');
INSERT INTO `common_group_action` VALUES ('1', '235');
INSERT INTO `common_group_action` VALUES ('1', '236');
INSERT INTO `common_group_action` VALUES ('1', '237');
INSERT INTO `common_group_action` VALUES ('1', '238');
INSERT INTO `common_group_action` VALUES ('1', '239');
INSERT INTO `common_group_action` VALUES ('1', '240');
INSERT INTO `common_group_action` VALUES ('1', '241');
INSERT INTO `common_group_action` VALUES ('1', '242');
INSERT INTO `common_group_action` VALUES ('1', '243');
INSERT INTO `common_group_action` VALUES ('1', '244');
INSERT INTO `common_group_action` VALUES ('1', '245');
INSERT INTO `common_group_action` VALUES ('1', '246');
INSERT INTO `common_group_action` VALUES ('1', '247');
INSERT INTO `common_group_action` VALUES ('1', '248');
INSERT INTO `common_group_action` VALUES ('2', '1');
INSERT INTO `common_group_action` VALUES ('2', '2');
INSERT INTO `common_group_action` VALUES ('2', '3');
INSERT INTO `common_group_action` VALUES ('3', '1');
INSERT INTO `common_group_action` VALUES ('3', '2');
INSERT INTO `common_group_action` VALUES ('3', '3');
INSERT INTO `common_group_action` VALUES ('7', '1');
INSERT INTO `common_group_action` VALUES ('7', '2');
INSERT INTO `common_group_action` VALUES ('7', '3');
INSERT INTO `common_group_action` VALUES ('7', '4');
INSERT INTO `common_group_action` VALUES ('7', '5');
INSERT INTO `common_group_action` VALUES ('7', '6');
INSERT INTO `common_group_action` VALUES ('7', '7');
INSERT INTO `common_group_action` VALUES ('7', '8');
INSERT INTO `common_group_action` VALUES ('7', '9');
INSERT INTO `common_group_action` VALUES ('7', '10');
INSERT INTO `common_group_action` VALUES ('7', '11');
INSERT INTO `common_group_action` VALUES ('7', '12');
INSERT INTO `common_group_action` VALUES ('7', '13');
INSERT INTO `common_group_action` VALUES ('7', '14');

-- ----------------------------
-- Table structure for common_login_record
-- ----------------------------
DROP TABLE IF EXISTS `common_login_record`;
CREATE TABLE `common_login_record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_id` int(11) NOT NULL,
  `created` int(11) DEFAULT NULL,
  `ip` varchar(20) DEFAULT NULL,
  `ip_address` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=68 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of common_login_record
-- ----------------------------
INSERT INTO `common_login_record` VALUES ('59', '1', '1475197028', '127.0.0.1', '本机地址');
INSERT INTO `common_login_record` VALUES ('58', '1', '1475197018', '127.0.0.1', '本机地址');
INSERT INTO `common_login_record` VALUES ('17', '1', '1468225527', '127.0.0.1', '本机地址');
INSERT INTO `common_login_record` VALUES ('16', '1', '1468221515', '127.0.0.1', '本机地址');
INSERT INTO `common_login_record` VALUES ('15', '1', '1467252264', '127.0.0.1', '本机地址');
INSERT INTO `common_login_record` VALUES ('14', '6', '1467184370', '127.0.0.1', '本机地址');
INSERT INTO `common_login_record` VALUES ('13', '6', '1467184321', '127.0.0.1', '本机地址');
INSERT INTO `common_login_record` VALUES ('12', '1', '1467182608', '127.0.0.1', '本机地址');
INSERT INTO `common_login_record` VALUES ('60', '1', '1475197051', '127.0.0.1', '本机地址');
INSERT INTO `common_login_record` VALUES ('61', '1', '1475198280', '127.0.0.1', '本机地址');
INSERT INTO `common_login_record` VALUES ('62', '1', '1475200502', '127.0.0.1', '本机地址');
INSERT INTO `common_login_record` VALUES ('63', '1', '1475200621', '127.0.0.1', '本机地址');
INSERT INTO `common_login_record` VALUES ('64', '1', '1475200667', '127.0.0.1', '本机地址');
INSERT INTO `common_login_record` VALUES ('65', '1', '1475200743', '127.0.0.1', '本机地址');
INSERT INTO `common_login_record` VALUES ('66', '1', '1475201316', '127.0.0.1', '本机地址');
INSERT INTO `common_login_record` VALUES ('67', '1', '1475216025', '127.0.0.1', '本机地址');
INSERT INTO `common_login_record` VALUES ('42', '1', null, '127.0.0.1', '未知');
INSERT INTO `common_login_record` VALUES ('43', '1', null, '127.0.0.1', '未知');
INSERT INTO `common_login_record` VALUES ('44', '1', null, '127.0.0.1', '未知');
INSERT INTO `common_login_record` VALUES ('45', '1', null, '127.0.0.1', '未知');
INSERT INTO `common_login_record` VALUES ('46', '1', null, '127.0.0.1', '未知');
INSERT INTO `common_login_record` VALUES ('47', '1', null, '127.0.0.1', '未知');
INSERT INTO `common_login_record` VALUES ('48', '1', null, '127.0.0.1', '未知');
INSERT INTO `common_login_record` VALUES ('49', '1', null, '127.0.0.1', '未知');
INSERT INTO `common_login_record` VALUES ('50', '1', null, '127.0.0.1', '未知');

-- ----------------------------
-- Table structure for common_menus
-- ----------------------------
DROP TABLE IF EXISTS `common_menus`;
CREATE TABLE `common_menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL,
  `pid` int(11) DEFAULT '0' COMMENT '菜单父级',
  `icon_class` varchar(255) DEFAULT NULL,
  `weight` int(11) DEFAULT '99' COMMENT '权重（值越大排序越前）',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of common_menus
-- ----------------------------
INSERT INTO `common_menus` VALUES ('7', '登录日志', '0', 'common.loginRecord/index', 'common.loginRecord/index', '2', '', '99');
INSERT INTO `common_menus` VALUES ('2', '日志管理', '0', '', '', '0', '日志', '98');
INSERT INTO `common_menus` VALUES ('1', '管理员管理', 'Hui-iconfont-root', '', '', '0', '管理', '99');
INSERT INTO `common_menus` VALUES ('3', '管理员列表', '0', 'common.admin/Index', 'common.admin/index', '1', '', '99');
INSERT INTO `common_menus` VALUES ('4', '用户组管理', '0', 'common.groups/Index', 'common.groups/index', '1', '', '99');
INSERT INTO `common_menus` VALUES ('5', '菜单管理', '0', 'common.menus/Index', 'common.menus/index', '1', '', '99');
INSERT INTO `common_menus` VALUES ('6', '权限列表', '0', 'common.actions/Index', 'common.actions/index', '1', '', '99');
INSERT INTO `common_menus` VALUES ('8', '操作日志', '0', 'common.operationLog/Index', 'common.operationLog/index', '2', '', '99');

-- ----------------------------
-- Table structure for common_operation_log
-- ----------------------------
DROP TABLE IF EXISTS `common_operation_log`;
CREATE TABLE `common_operation_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` int(11) DEFAULT NULL COMMENT '创建时间戳',
  `admin_id` int(11) DEFAULT NULL COMMENT '操作员编号',
  `table` varchar(50) DEFAULT NULL COMMENT '操作表名称',
  `type` int(11) DEFAULT '1' COMMENT '1：添加：2:修改；3：删除',
  `log` text COMMENT '日志详情',
  `main_id` int(11) DEFAULT '0' COMMENT '主键编号',
  `msg` varchar(50) DEFAULT NULL,
  `ip` varchar(50) DEFAULT NULL,
  `ip_address` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=gbk COMMENT='操作日志';

-- ----------------------------
-- Records of common_operation_log
-- ----------------------------
INSERT INTO `common_operation_log` VALUES ('48', '1475215595', '1', 'CommonMenus', '2', '{\"url\":[\"common.loginRecord\\/Index\",\"common.loginRecord\\/index\"]}', '7', '修改了名为【登录日志】的菜单信息', '127.0.0.1', '本机地址');
