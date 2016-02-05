/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : sociolla

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2016-02-06 02:05:25
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `menus`
-- ----------------------------
DROP TABLE IF EXISTS `menus`;
CREATE TABLE `menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `controller` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order` int(11) NOT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `menus_parent_id_index` (`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of menus
-- ----------------------------
INSERT INTO menus VALUES ('1', '0', 'User', '#', '#', '2', 'fa fa-user nav_icon', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO menus VALUES ('6', '1', 'Role', 'role', 'Admin\\RoleController', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO menus VALUES ('7', '1', 'User', 'user', 'Admin\\UserController', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO menus VALUES ('8', '0', 'Page', '#', '#', '1', 'fa fa-file nav_icon', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO menus VALUES ('9', '8', 'Manage Page', 'manage-pages', 'Admin\\PageController', '1', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for `migrations`
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO migrations VALUES ('2014_10_12_000000_create_users_table', '1');
INSERT INTO migrations VALUES ('2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO migrations VALUES ('2016_02_02_174500_create_menus_table', '1');
INSERT INTO migrations VALUES ('2016_02_02_182907_create_roles_table', '1');
INSERT INTO migrations VALUES ('2016_02_02_195648_table_users', '1');
INSERT INTO migrations VALUES ('2016_02_03_183026_create_pages_table', '1');
INSERT INTO migrations VALUES ('2016_02_04_165848_create_rights_table', '1');
INSERT INTO migrations VALUES ('2016_02_05_161614_update_table_pages', '1');

-- ----------------------------
-- Table structure for `pages`
-- ----------------------------
DROP TABLE IF EXISTS `pages`;
CREATE TABLE `pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `title` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `sub_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(350) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `pages_parent_id_index` (`parent_id`),
  KEY `pages_slug_index` (`slug`(255))
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of pages
-- ----------------------------
INSERT INTO pages VALUES ('1', '0', 'Home', 'Tortor mi fermentum molestie imperdiet vestibulum a.', '<p>Consequat volutpat quis mus quis parturient condimentum adipiscing quisque vestibulum venenatis et interdum ut porta a torquent gravida ut at a varius. Tellus vestibulum a eu tincidunt a dictum facilisi mattis habitasse bibendum per a placerat blandit dignissim ac dignissim habitasse a ullamcorper sed. Porta facilisi sed in porta vestibulum consectetur id sociis a vestibulum eu volutpat malesuada vulputate nibh dolor vestibulum ullamcorper dictum. Nostra leo faucibus eu dui lacinia phasellus enim nec aliquam pulvinar platea potenti nunc primis a ut a mi sagittis vitae. A sit pulvinar blandit porttitor cum mi natoque mus aenean metus natoque ad feugiat scelerisque a amet consectetur hendrerit velit vel condimentum phasellus vestibulum pulvinar nulla per. Taciti a consectetur sodales posuere nulla ad a enim a semper leo condimentum condimentum a a venenatis mauris mi vestibulum a penatibus lobortis suspendisse ullamcorper eu hac egestas a.</p>\r\n\r\n<p>Vestibulum ad a in consectetur vestibulum vestibulum condimentum donec interdum feugiat sapien parturient id conubia lacus praesent ullamcorper in ac parturient turpis consectetur leo enim a scelerisque risus. Nec at rutrum a taciti ut nunc sapien feugiat ornare ridiculus nec nisl consequat parturient est posuere scelerisque facilisi ultrices. Mattis nulla sed ridiculus penatibus placerat nec leo adipiscing pretium tempus curae consequat a parturient nisl adipiscing molestie a scelerisque.</p>\r\n', '1-home', '2016-02-05 18:15:50', '2016-02-05 18:17:36');
INSERT INTO pages VALUES ('2', '0', 'About Me', '', '', '2-about-me', '2016-02-05 18:18:18', '2016-02-05 18:18:18');
INSERT INTO pages VALUES ('3', '2', 'Portofolio', 'All Portofolio', '<p>Sagittis lobortis fames parturient torquent suspendisse penatibus dolor habitant a vulputate sociosqu nisi scelerisque a et dolor egestas enim diam at nostra quam facilisis fusce sed aliquam adipiscing vestibulum. Natoque suspendisse blandit orci suspendisse id vestibulum consectetur libero duis interdum hendrerit interdum senectus volutpat a elementum fermentum urna nostra convallis adipiscing. Euismod parturient accumsan suspendisse in odio magnis hendrerit risus est eros a a nunc parturient malesuada habitasse mus venenatis urna lectus elit. Enim ultrices arcu ante imperdiet parturient nulla gravida quis fames adipiscing eros parturient eros lacinia cum. Eleifend fames id condimentum suspendisse adipiscing lacus a senectus a a a dis ut a leo a senectus mi eu. Sagittis parturient rhoncus quam vestibulum fames amet laoreet condimentum id quam natoque condimentum aenean curabitur lobortis suspendisse ac adipiscing eu adipiscing dis odio per senectus consectetur curabitur vestibulum convallis.</p>\r\n\r\n<p>Integer adipiscing scelerisque nibh orci leo suspendisse et arcu vivamus tellus montes suspendisse a magna himenaeos sagittis nec parturient ac a mollis non eget aenean netus. Quam condimentum massa hendrerit netus a integer vivamus fames suspendisse facilisi sodales congue interdum interdum curabitur pulvinar parturient ut cum in suspendisse lacinia suspendisse porttitor senectus. Suspendisse sociis parturient nisl dignissim at fusce a a ut magna adipiscing tellus a ullamcorper libero nec vestibulum a a sodales a orci magna parturient accumsan duis consectetur rhoncus. Quam donec justo aliquam magnis mi nam augue tristique blandit scelerisque ut a eu sociis semper parturient vestibulum vestibulum at cum adipiscing est a parturient eleifend malesuada a conubia.</p>\r\n\r\n<p>A eu pretium vestibulum eu himenaeos a lacinia maecenas suspendisse libero suspendisse scelerisque natoque eleifend arcu faucibus. Scelerisque proin a a consequat a nunc mauris ut fermentum velit orci ullamcorper augue fermentum nibh aliquam per ut interdum ac vehicula a. Nisi potenti eu at enim ullamcorper adipiscing ad facilisi morbi ad senectus dictum placerat eu. A consequat fermentum neque hac a maecenas eros curae eros eros velit at a class suspendisse tincidunt bibendum. Dignissim nec hac a duis dolor eros est lacus rhoncus blandit leo dis enim ullamcorper hac donec scelerisque varius integer diam primis augue congue ad. Fermentum venenatis integer in imperdiet magnis odio urna vehicula scelerisque etiam a volutpat ullamcorper ultrices duis scelerisque.</p>\r\n\r\n<p>Suspendisse sociosqu facilisis rhoncus fames vestibulum elit a fames mi fusce penatibus a dui adipiscing faucibus sodales a vestibulum a habitasse in magna. Adipiscing a ultricies magnis ridiculus in integer a scelerisque pharetra laoreet libero mattis quam elit a faucibus parturient sapien sodales arcu velit conubia quisque ante. Lacus consectetur ad dis penatibus odio a mi tortor mus porta a malesuada aliquet elementum ad a potenti facilisis. Sit cras turpis consequat sociosqu a vestibulum scelerisque rhoncus ut est ut malesuada venenatis fermentum litora eu odio. Pharetra bibendum sociosqu rhoncus eu pharetra habitant tellus mi dis rhoncus scelerisque montes vehicula a sem a fringilla venenatis nisi ac. Nec ultrices massa donec nec neque diam felis a a molestie a erat cursus sed ornare euismod nulla tellus vestibulum hac condimentum curae arcu a parturient magnis eu.</p>\r\n\r\n<p>Ac laoreet vestibulum vestibulum vehicula fusce per quam et suspendisse fames ullamcorper in suspendisse justo phasellus vestibulum conubia a. Ad dolor a consectetur convallis scelerisque est a aptent a et tempus lacinia parturient potenti nisl a a parturient tortor adipiscing sagittis velit quisque a commodo nulla ipsum a. Dapibus viverra vel sit ut viverra odio parturient urna dui convallis elit id nam mattis dui suspendisse blandit pharetra per a a fusce vivamus. A placerat sociis suspendisse a est convallis adipiscing viverra dictum tristique imperdiet a scelerisque convallis sed leo eget a vulputate tempor luctus vulputate tristique purus neque ullamcorper eros erat.</p>\r\n', '3-portofolio', '2016-02-05 18:18:53', '2016-02-05 18:18:53');
INSERT INTO pages VALUES ('4', '2', 'Service', 'Adipiscing fermentum eget curabitur duis facilisi quisque proin eu odio id at inceptos ridiculus.', '<p>A adipiscing a eu pulvinar tristique sem proin a aliquet bibendum a semper id id porttitor primis a elit vestibulum elit. Mi porta dictum lorem vestibulum taciti odio taciti nisl urna a sem sem leo magna tempor fusce habitant mollis condimentum ad condimentum tristique quis odio. Scelerisque placerat feugiat velit erat sociis a per vulputate dignissim gravida elit a orci scelerisque ac in a odio dapibus a.</p>\r\n\r\n<p>Fringilla a sociis hendrerit iaculis sodales posuere ad felis ut condimentum est molestie nisi hac venenatis curae a adipiscing. Facilisi id mattis malesuada aenean ultrices nisl tempus a sem eget dis inceptos neque placerat curae facilisi egestas ligula a in donec parturient eu hendrerit etiam leo hac donec. Felis porttitor ullamcorper suscipit consequat hac feugiat vitae class posuere penatibus condimentum fames tristique duis duis scelerisque auctor neque posuere eget a ac id a eleifend vestibulum posuere.</p>\r\n\r\n<p>Erat duis phasellus proin dictumst integer maecenas ultricies torquent at ad pretium eros leo parturient. Scelerisque fermentum risus a viverra amet conubia eu viverra fringilla phasellus imperdiet mi parturient varius duis primis. Ut facilisi diam ipsum adipiscing eleifend egestas consectetur adipiscing parturient adipiscing facilisi leo sem condimentum. Parturient a a ut condimentum nunc blandit iaculis hac mollis a adipiscing integer mollis egestas ac condimentum etiam interdum elit a ullamcorper a dapibus sociosqu posuere amet ultrices pretium. Nostra laoreet mattis suscipit cum ut vestibulum luctus non a primis aenean gravida nisl vel magna scelerisque cras condimentum ligula pharetra arcu facilisi cubilia adipiscing leo parturient augue.</p>\r\n\r\n<p>Vestibulum nisi eu class cras sed vitae adipiscing a a phasellus a vivamus a taciti a parturient dolor porttitor a felis mi vestibulum in. Condimentum malesuada porta placerat curae dui vestibulum et ut adipiscing curabitur suscipit a sit vehicula litora ut consectetur. Fermentum a risus ullamcorper condimentum a quisque est mattis sociis dapibus consectetur consectetur adipiscing tortor tristique non laoreet ut diam a pulvinar consectetur. Donec nec id magnis facilisis diam habitant parturient quis ullamcorper potenti augue aptent sit neque vestibulum venenatis eget tellus ridiculus condimentum habitant potenti adipiscing torquent consectetur mi scelerisque senectus. In eget leo suspendisse non curabitur fusce mattis vestibulum turpis accumsan tincidunt est congue amet leo vivamus sem id vulputate mauris a et nullam odio donec habitasse a adipiscing.</p>\r\n\r\n<p>Enim parturient condimentum elit curae vulputate scelerisque donec est elementum feugiat sit auctor urna placerat a. Elementum lacinia a congue fames venenatis dapibus curae in porttitor ut diam ullamcorper vulputate adipiscing tortor hac mollis parturient a ac in quisque mus lacus montes libero. Dis nostra scelerisque habitant integer dolor a parturient velit eu suspendisse auctor ullamcorper mi in ante malesuada habitasse fusce a lorem condimentum leo. Ante fames facilisis sem cras vestibulum ante consectetur sociosqu a nullam consectetur a praesent habitant per. Suspendisse ullamcorper hac a in erat a ullamcorper auctor ultricies magna a mus vivamus adipiscing adipiscing ac primis eros. Ac suscipit quis ullamcorper penatibus vestibulum placerat mi molestie adipiscing at iaculis vestibulum arcu convallis ullamcorper ullamcorper et volutpat hac parturient consequat ullamcorper velit.</p>\r\n', '4-service', '2016-02-05 18:19:37', '2016-02-05 18:19:37');

-- ----------------------------
-- Table structure for `password_resets`
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for `rights`
-- ----------------------------
DROP TABLE IF EXISTS `rights`;
CREATE TABLE `rights` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `rights_menu_id_foreign` (`menu_id`),
  KEY `rights_role_id_foreign` (`role_id`),
  CONSTRAINT `rights_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `rights_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of rights
-- ----------------------------
INSERT INTO rights VALUES ('3', '9', '2', '2016-02-05 18:13:57', '2016-02-05 18:13:57');
INSERT INTO rights VALUES ('4', '6', '2', '2016-02-05 18:13:57', '2016-02-05 18:13:57');
INSERT INTO rights VALUES ('5', '7', '2', '2016-02-05 18:13:57', '2016-02-05 18:13:57');
INSERT INTO rights VALUES ('6', '9', '3', '2016-02-05 18:14:07', '2016-02-05 18:14:07');

-- ----------------------------
-- Table structure for `roles`
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO roles VALUES ('1', 'Super Admin', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO roles VALUES ('2', 'Admin', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO roles VALUES ('3', 'User', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `role_id` int(10) unsigned NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`),
  KEY `users_username_index` (`username`),
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO users VALUES ('1', 'reza', 'reza.wikrama3@gmail.com', '$2y$10$Fs4gCmyp5qjY5H0azzbZFuwsl5B7xSUcV.hJgtROC0ebRW3/ILc8e', 'AOTGDqGadun6e11vc1qbWihDQfSIErkzeAL9QovlL0nPDlKlZL9LXEHGv0SS', '2016-02-05 18:11:26', '2016-02-05 18:15:13', '1', 'reza');
INSERT INTO users VALUES ('2', 'Administrator', 'admin@admin.com', '$2y$10$CfSs7P53DoHMxTxfdvUL7.bhXibbePkQDH1fR8YcEYBuGFlR5deeu', null, '2016-02-05 18:14:50', '2016-02-05 18:14:50', '2', 'admin');
INSERT INTO users VALUES ('3', 'user', 'user@user.com', '$2y$10$hITmUYY.lFheGqgaIZ65/.MuXW5PyLPsqGCPxerJXGjztngE.U9bW', null, '2016-02-05 18:15:07', '2016-02-05 18:15:07', '3', 'user');
