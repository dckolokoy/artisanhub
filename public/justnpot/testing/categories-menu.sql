
delete from reviews;

delete from categories;
INSERT INTO `categories`(`id`, `name`, `description`) VALUES (1, 'Appetizers','');
INSERT INTO `categories`(`id`, `name`, `description`) VALUES (2, 'Chix Corner','');
INSERT INTO `categories`(`id`, `name`, `description`) VALUES (3, 'House Burgers','');
INSERT INTO `categories`(`id`, `name`, `description`) VALUES (4, 'House Dessert','');
INSERT INTO `categories`(`id`, `name`, `description`) VALUES (5, 'House Specials','');
INSERT INTO `categories`(`id`, `name`, `description`) VALUES (6, 'Drinks','');
INSERT INTO `categories`(`id`, `name`, `description`) VALUES (7, 'Sizzling Sets','');
INSERT INTO `categories`(`id`, `name`, `description`) VALUES (9, 'Pasta','');
INSERT INTO `categories`(`id`, `name`, `description`) VALUES (10, 'All Day Breakfast','');
INSERT INTO `categories`(`id`, `name`, `description`) VALUES (11, 'Add Ons','');
INSERT INTO `categories`(`id`, `name`, `description`) VALUES (12, 'Booze Up','');
INSERT INTO `categories`(`id`, `name`, `description`) VALUES (13, 'Value Meal','');
INSERT INTO `categories`(`id`, `name`, `description`) VALUES (14, 'Bucket Deal','');

delete from menu_items;
-- All Day breakfast
INSERT INTO `menu_items`(`category_id`, `name`, `description`, `image`, `price`, `is_active`, `is_available`) VALUES (10,"Adobosilog","","justnpot/images/menu/ADOBO SILOG.jpg",89,'1','1');
INSERT INTO `menu_items`(`category_id`, `name`, `description`, `image`, `price`, `is_active`, `is_available`) VALUES (10,"Chicksilog","","justnpot/images/menu/CHICKSILOG.jpg",89,'1','1');
INSERT INTO `menu_items`(`category_id`, `name`, `description`, `image`, `price`, `is_active`, `is_available`) VALUES (10,"hotsilog","","justnpot/images/menu/HOTSILOG.jpg",59,'1','1');
INSERT INTO `menu_items`(`category_id`, `name`, `description`, `image`, `price`, `is_active`, `is_available`) VALUES (10,"Lechonsilog","","justnpot/images/menu/LECHONSILOG.jpg",89,'1','1');
INSERT INTO `menu_items`(`category_id`, `name`, `description`, `image`, `price`, `is_active`, `is_available`) VALUES (10,"Porksilog","","justnpot/images/menu/PORKSILOG.jpg",89,'1','1');
INSERT INTO `menu_items`(`category_id`, `name`, `description`, `image`, `price`, `is_active`, `is_available`) VALUES (10,"Shanghaisilog","","justnpot/images/menu/SHANGSILOG.jpg",89,'1','1');
INSERT INTO `menu_items`(`category_id`, `name`, `description`, `image`, `price`, `is_active`, `is_available`) VALUES (10,"Tapsilog","","justnpot/images/menu/TAPSILOG 2.jpg",69,'1','1');

-- Appetizers
INSERT INTO `menu_items`(`category_id`, `name`, `description`, `image`, `price`, `is_active`, `is_available`) VALUES (1,"Fries","","justnpot/images/menu/FRIES.jpg",39,'1','1');
INSERT INTO `menu_items`(`category_id`, `name`, `description`, `image`, `price`, `is_active`, `is_available`) VALUES (1,"Fries","","justnpot/images/menu/FRIES.jpg",59,'1','1');
INSERT INTO `menu_items`(`category_id`, `name`, `description`, `image`, `price`, `is_active`, `is_available`) VALUES (1,"Nachos","","justnpot/images/menu/NACHOS.jpg",99,'1','1');
INSERT INTO `menu_items`(`category_id`, `name`, `description`, `image`, `price`, `is_active`, `is_available`) VALUES (1,"Mojos","","justnpot/images/menu/MOJOS.jpg",69,'1','1');

-- Chix Corner
INSERT INTO `menu_items`(`category_id`, `name`, `description`, `image`, `price`, `is_active`, `is_available`) VALUES (2,"Buffalo","","justnpot/images/menu/BUFFALO.jpg",155,'1','1');
INSERT INTO `menu_items`(`category_id`, `name`, `description`, `image`, `price`, `is_active`, `is_available`) VALUES (2,"Garlic Parmesan","","justnpot/images/menu/GARLIC PARMESAN.jpg",149,'1','1');
INSERT INTO `menu_items`(`category_id`, `name`, `description`, `image`, `price`, `is_active`, `is_available`) VALUES (2,"Honey Lemon","","justnpot/images/menu/HONEY LEMON.jpg",149,'1','1');
INSERT INTO `menu_items`(`category_id`, `name`, `description`, `image`, `price`, `is_active`, `is_available`) VALUES (2,"Sriracha","","justnpot/images/menu/SRIRACHA.jpg",155,'1','1');

-- HOUSE DESSERTS
INSERT INTO `menu_items`(`category_id`, `name`, `description`, `image`, `price`, `is_active`, `is_available`) VALUES (4,"Sizzling Brownies (Slice)","","justnpot/images/menu/SIZZLING BROWNIE (SLICE).jpg",39,'1','1');
INSERT INTO `menu_items`(`category_id`, `name`, `description`, `image`, `price`, `is_active`, `is_available`) VALUES (4,"Sizzling Egg Pie (Slice)","","justnpot/images/menu/SIZZLING EGG PIE (SLICE).jpg",45,'1','1');

-- SIZZLING
INSERT INTO `menu_items`(`category_id`, `name`, `description`, `image`, `price`, `is_active`, `is_available`) VALUES (7,"Buttered Bangus","","justnpot/images/menu/BUTTERED BANGUS.jpg",149,'1','1');
INSERT INTO `menu_items`(`category_id`, `name`, `description`, `image`, `price`, `is_active`, `is_available`) VALUES (7,"Grilled Half Ribs","","justnpot/images/menu/GRILLED HALF RIBS.jpg",299,'1','1');
INSERT INTO `menu_items`(`category_id`, `name`, `description`, `image`, `price`, `is_active`, `is_available`) VALUES (7,"Sisig","","justnpot/images/menu/SISIG.jpg",119,'1','1');
INSERT INTO `menu_items`(`category_id`, `name`, `description`, `image`, `price`, `is_active`, `is_available`) VALUES (7,"Sizzling Ala Pobre","","justnpot/images/menu/SIZZLING ALA POBRE.jpg",149,'1','1');
INSERT INTO `menu_items`(`category_id`, `name`, `description`, `image`, `price`, `is_active`, `is_available`) VALUES (7,"Sizzling Bulalo","","justnpot/images/menu/SIZZLING BULALO.jpg",275,'1','1');
INSERT INTO `menu_items`(`category_id`, `name`, `description`, `image`, `price`, `is_active`, `is_available`) VALUES (7,"Smokey Shank","","justnpot/images/menu/SMOKEY SHANK.jpg",215,'1','1');
INSERT INTO `menu_items`(`category_id`, `name`, `description`, `image`, `price`, `is_active`, `is_available`) VALUES (7,"Steak","","justnpot/images/menu/STEAK.jpg",329,'1','1');
