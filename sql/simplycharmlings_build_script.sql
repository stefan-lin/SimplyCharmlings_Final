DROP DATABASE IF EXISTS simplycharmlings;
CREATE DATABASE simplycharmlings;
USE simplycharmlings;

CREATE TABLE Category(
  category_id INT(2) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  category_name VARCHAR(30)
);

INSERT INTO Category
  (category_id, category_name)
VALUES
  (1, 'Food'),
  (2, 'Animals'),
  (3, 'Magnet'),
  (4, 'People'),
  (5, 'Earrings'),
  (6, 'Random');

CREATE TABLE Image(
  image_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  url VARCHAR(2083)
);
INSERT INTO Image
  (image_id, url)
VALUES
  (null, 'images/products_img/ArielAndFlounder.jpg'),
  (null, 'images/products_img/BearBoba.jpg'),
  (null, 'images/products_img/BearCupcake.jpg'),
  (null, 'images/products_img/BearIceCream.jpg'),
  (null, 'images/products_img/BearPancake.jpg'),
  (null, 'images/products_img/BearPopsicle.jpg'),
  (null, 'images/products_img/BirthdayCupcake.JPG'),
  (null, 'images/products_img/BobaCupcake.JPG'),
  (null, 'images/products_img/Boy.jpg'),
  (null, 'images/products_img/Candy.jpg'),
  (null, 'images/products_img/CatCupcake.JPG'),
  (null, 'images/products_img/Caterpillar.jpg'),
  (null, 'images/products_img/CatGirl.jpg'),
  (null, 'images/products_img/ChristmasTree.jpg'),
  (null, 'images/products_img/ChubbyBee.jpg'),
  (null, 'images/products_img/Cookie.jpg'),
  (null, 'images/products_img/CottonCandy.JPG'),
  (null, 'images/products_img/Croissant.jpg'),
  (null, 'images/products_img/DonaldDuck.JPG'),
  (null, 'images/products_img/Doughnuts.jpg'),
  (null, 'images/products_img/DumboOctopus.JPG'),
  (null, 'images/products_img/Dumpling.jpg'),
  (null, 'images/products_img/EbiSushi.JPG'),
  (null, 'images/products_img/Elephant.jpg'),
  (null, 'images/products_img/FawnGirl.JPG'),
  (null, 'images/products_img/FlowerEarrings.jpg'),
  (null, 'images/products_img/FlowerFairy.jpg'),
  (null, 'images/products_img/flowerGirl.JPG'),
  (null, 'images/products_img/GirlLion.jpg'),
  (null, 'images/products_img/GirlWithCrown.JPG'),
  (null, 'images/products_img/LemonBear.jpg'),
  (null, 'images/products_img/MacaronFigurine.JPG'),
  (null, 'images/products_img/MilkTea.jpg'),
  (null, 'images/products_img/MintIceCream.JPG'),
  (null, 'images/products_img/Molang.JPG'),
  (null, 'images/products_img/MolangCostumes.JPG'),
  (null, 'images/products_img/MolangCupcake.jpg'),
  (null, 'images/products_img/MolangEarrings.jpg'),
  (null, 'images/products_img/NudeFairy.jpg'),
  (null, 'images/products_img/PastelBlueHairGirl.JPG'),
  (null, 'images/products_img/PoopAndToiletPaper.JPG'),
  (null, 'images/products_img/Present.jpg'),
  (null, 'images/products_img/Reindeer.jpg'),
  (null, 'images/products_img/SailorMoon.JPG'),
  (null, 'images/products_img/SeaBunny.JPG'),
  (null, 'images/products_img/ShootingStar.jpg'),
  (null, 'images/products_img/SmartyPantsMolang.JPG'),
  (null, 'images/products_img/SnowBunny.jpg'),
  (null, 'images/products_img/SprinklesCupcake.JPG'),
  (null, 'images/products_img/StrawberryIceCream.JPG'),
  (null, 'images/products_img/Sunfish.JPG'),
  (null, 'images/products_img/ToastedCupcake.jpg'),
  (null, 'images/products_img/Vilaplume.jpg'),
  (null, 'images/products_img/Witch.jpg');

CREATE TABLE User(
  usr_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  email VARCHAR(100) NOT NULL,
  first_name VARCHAR(30) NOT NULL,
  last_name VARCHAR(30) NOT NULL,
  salt CHAR(64) NOT NULL,
  password CHAR(64) NOT NULL
);
INSERT INTO User
  (usr_id, email, first_name, last_name, salt, password)
VALUES
  (null, 'hiro.hamada@gmail.com',    'Hiro',    'Hamada', 'df7e345feea9163555838b9ce772210e481fce2baa4212fb35a517a9662f511c', 'af71c957c2a1217070ea175543ef3e1e9c6aef8bc82abbae28d2c54241559f5d'),
  (null, 'gogo.tomago@gmail.com',    'GoGo',    'Tomago', 'eaaf6238bb47b3f7b7972ef217f747b8cd62cf125d2ed501356e3954f94e27ec', 'b87d5791955374d3c959118845a168aeb66d126050f8efcf2e198880bf845ca7'),
  (null, 'tadashi.hamada@gmail.com', 'Tadashi', 'Hamada', 'ed28920d977e3551b5fd86f1f882cbe9bd07362774c0604e6197c5acc4e8e839', '15911d77895852d9123116bddc615792899f3a038a848fa77aa6153b78f7fc0e'),
  (null, 'fred_white@gmail.com',     'Fred',    'White', 'e67f29122e4913ad7ca3e0c49d25d9a01c839577e1f9633e4e08def6bedae75a', '1290a3a92ceaeb4d11f4041eb8e9bd55c52df0c3803ca3b676e7a9a5ad14ef8f'),
  (null, 'honey.lemon@gmail.com',    'Honey',   'Lemon', 'e17622ad4314bb57480296ecc80de5166b0459b6260cae7c80516f755b3c38a9', 'afd5ddda71a1ef479b0cccccce7c8b7c7783f83d8c3f32af81c85918b7df5c51');

/*---"1hg2%aY345"
---"Z%99nabc"
---"Npr$Q123"
---"836hNbg%K"
---"R76%hk95V"
*/
CREATE TABLE Phone(
  phone_id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  phone_str VARCHAR(20) NOT NULL
);
INSERT INTO Phone
  (phone_id, phone_str)
VALUES
  (null, '(408)123-0014'),
  (null, '(408)123-0015'),
  (null, '(408)123-0016'),
  (null, '(408)123-0017'),
  (null, '(408)123-0018');

CREATE TABLE Address(
  address_id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  addr_str VARCHAR(100) NOT NULL
);
INSERT INTO Address
  (address_id, addr_str)
VALUES
  (null, 'temp address'),
  (null, 'temp address'),
  (null, 'temp address'),
  (null, 'temp address'),
  (null, 'temp address');

CREATE TABLE Payment_method(
  payment_id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  payment_type INT(3) NOT NULL,
  payment_number VARCHAR(20) NOT NULL,
  payment_expiration_date VARCHAR(5) NOT NULL
);
INSERT INTO Payment_method
  (payment_id, payment_type, payment_number, payment_expiration_date)
VALUES
  (null, 3, 123456787654321, '07/19'),
  (null, 3, 123456787654321, '07/19'),
  (null, 3, 123456787654321, '07/19'),
  (null, 3, 123456787654321, '07/19'),
  (null, 3, 123456787654321, '07/19');
CREATE TABLE Color(
  color_id INT(2) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  color_name VARCHAR(10) NOT NULL
);
INSERT INTO Color
  (color_id, color_name)
VALUES
  (1, 'Brown'),
  (2, 'White'),
  (3, 'Green'),
  (4, 'Pink'),
  (5, 'Blue'),
  (6, 'Yellow'),
  (7, 'Gray'),
  (8, 'Orange'),
  (9, 'Red'),
  (10, 'Black');

CREATE TABLE Product(
  product_id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  product_name VARCHAR(60) NOT NULL,
  category_id INT(2) UNSIGNED NOT NULL,
  price FLOAT(6) NOT NULL,
  description TEXT(200) NOT NULL,
  color_id INT(2) UNSIGNED NOT NULL,
  FOREIGN KEY(category_id) REFERENCES Category(category_id),
  FOREIGN KEY(color_id) REFERENCES Color(color_id)
);
INSERT INTO Product
  (product_id, product_name, category_id, price, description, color_id)
VALUES
  (null, 'Ariel and Flounder', 4, 5.00, 'This listing is for an Ariel and Flounder charmling. They are hand sculpted using polymer clay. Ariel is 1 inch in length and Flounder is about 0.5 inch in length. Each are fixed with an eye screw and lobster clamp.', 9),
  (null, 'Bear Bobas', 1, 5.00, 'These sticky bear boba trio charmling is sculpted using polymer clay and is fixed with an eye screw.', 10),
  (null, 'Bear Cupcake', 1, 5.00, 'This delicious cute cupcake bear charmlings comes in two colors, blue and pink. They are sculpted using polymer clay and is fixed with an eye screw.', 1),
  (null, 'Bear Ice Cream', 1, 5.00, 'This adorable ice cream bear charmling is sculpted using polymer clay and is fixed with an eye screw.', 5),
  (null, 'Bear Pancake', 1, 5.00, 'This delicious bear pancake is hand sculpted from polymer clay and is fixed with an eye screw.', 1),
  (null, 'Bear Popsicle', 1, 5.00, 'These delicious bear popsicle charmlings are sculpted using polymer clay and are painted at the bottom. They are also fixed with an eye screw.', 1),
  (null, 'Birthday Cupcake', 1, 5.00, 'This fun birthday cupcake charmling is about 1.7 inches tall and is hand sculpted from polymer clay. It is fixed with an eye screw and lobster clamp.', 1),
  (null, 'Boba Cupcake', 1, 5.00, 'This cute boba cupcake charmling is about 1 inch tall and is hand sculpted with polymer clay. The boba is sealed with glazed for the shiny effect. This piece is also fixed with an eye screw and lobster clamp.', 1),
  (null, 'Boy', 4, 5.00, 'This adorable boy charmling is sculpted using polymer clay and is fixed with an eye screw.', 5),
  (null, 'Candy', 1, 5.00, 'These yummy candy jars are sculpted using polymer clay and decorated with gems. They come in two pink and red colors and are fixed with an eye screw.', 4),
  (null, 'Cat Cupcake', 1, 5.00, 'This cute cat cupcake is sculpted using polymer clay and was inspired from the meowmaid design.', 1),
  (null, 'Cat Girl Doughnut', 1, 5.00, 'This adorble girl is dressed in a pusheen cat costume and is holding a yummy doughnut. It is sculpted using polymer clay and is fixed with an eye screw.', 7),
  (null, 'Caterpillar', 2, 5.00, 'This cute pink chubby caterpillar charmling is sculpted using polymer clay and is fixed with an eye screw.', 4),
  (null, 'Chocolate Chip Cookie', 1, 5.00, 'These delcious chocolate chip cookies are sculpted using polymer clay and are fixed with an eye screw.', 1),
  (null, 'Christmas Tree', 6, 5.00, 'This happy Christmas tree is sculpted using polymer clay and is decorated with cute ornaments.', 3),
  (null, 'Chubby Bee', 2, 5.00, 'This adorable yellow chubby bee charmling is sculpted using polymer clay and is fixed with an eye screw.', 6),
  (null, 'Cotton Candy', 1, 5.00, 'This cotton candy charmling is hand sculpted using polymer clay. It is fixed with an eye screw and lobster clamp', 2),
  (null, 'Croissant Sandwich', 1, 5.00, 'This delicious croissant sandwich charmling is sculpted using polymer clay and is fixed with an eye screw.', 1),
  (null, 'Donald Duck Tsum Tsum', 2, 5.00, 'This Donald Duck Tsum Tsum charmling is hand sculpted with polymer clay. He is about 1.7 inches and is fixed with an eye screw and lobster clamp', 5),
  (null, 'Doughnuts', 1, 5.00, 'These yummy assorted doughnuts are sculpted using polymer clay.', 1),
  (null, 'Dumbo Octopus', 2, 5.00, 'These adorable dumbo octopus charmlings are hand sculpted with polymer clay and they glow in the dark! They are fixed with an eye screw and lobster clamps.', 4),
  (null, 'Dumpling', 1, 5.00, 'This delicious dumpling is sculpted with polymer clay and is has a plastic ornament ball surrounding the dumpbling.', 2),
  (null, 'Ebi Sushi', 1, 5.00, 'This tiny ebi  sushi charmling is about 0.5 inch in length and is hand sculpted from polymer clay. Acrylic paint is used to paint on the details. It is coated with varnish to protect paint finishings. An eye screw and lobster clamp is fix to the charm for hanging.', 8),
  (null, 'Elephant', 2, 5.00, 'This cute gray elephant charmling is sculpted using polymer clay and is fixed with an eye screw.', 7),
  (null, 'Fawn Girl', 4, 5.00, 'This fawn girl charmling is about 1.8 inches tall. It is hand sculpted from polymer clay and is fixed with an eye screw and lobster clamp.', 1),
  (null, 'Flower Earrings', 5, 5.50, 'These pastel pink flower earrings is sculpted using polymer clay and is fixed with metal studs.', 4),
  (null, 'Flower Fairy', 4, 5.00, 'This mystical fairy charmling has pink flowers in her hair and is sculpted using polymer clay, It is also fixed with an eye screw.', 4),
  (null, 'Flower girl', 4, 5.00, 'This flower girl charmling is about 1.5 inch tall and is hand sculpted from polymer clay. It is fixed with an eye screw and lobster clamp', 3),
  (null, 'Girl with Crown', 4, 5.00, 'This princess charmling is about 1.8 inches tall. It is hand sculpted from polymer clay and is fixed with an eye screw and lobster clamp.', 4),
  (null, 'Girl with Lion Costome', 4, 5.00, 'This cute girl figurine is wearing a lion costume that represents the Lunar New Year holiday.', 5),
  (null, 'Lemon Bear Doughnut', 1, 5.00, 'This delicious lemon bear doughnut is sculpted using polymer clay and is fixed with an eye screw.', 6),
  (null, 'Macaron Figurine', 1, 5.00, 'This floral macaron figurine is about 1.5 inches in diameter. It is hand sculpted from polymer clay.', 5),
  (null, 'Milk Tea', 1, 5.00, 'This silly milk tea charmling with boba is sculpted using polymer clay and is fixed with an eye screw.', 8),
  (null, 'Mint Ice Cream Magnet', 3, 5.00, 'This mint ice cream is hand sculpted from polymer clay. A magnet is fix to the back of the sculpture. It is about 1 inch in diameter.', 3),
  (null, 'Molang Cupcake', 1, 5.00, 'This cute Molang cupcake is sculpted using polymer clay and is fixed with an eye screw and lobster clamp.', 2),
  (null, 'Molang Earrings', 5, 5.50, 'These adorable Molang earrings is sculpted using polymer clay and is fixed with metal studs.', 2),
  (null, 'Molang in Costumes', 2, 5.00, 'These Molang characters are sculpted using polymer clay and are hand painted with acrylic paint. They are coated with varnish to protect the paint finish. Each one is fixed with an eye screw and lobster clamp. Please select with character you would like to purchase before checking out. A. Pink Molang, B. Strawberry Molang, C. Bee Molang.', 2),
  (null, 'Molang', 2, 5.00, 'This Molang charmling is about 0.6 inch tall and is hand sculpted from polymer clay. It is fixed with an eye screw and lobster clamp.', 2),
  (null, 'Mr.Poop and Toilet Paper', 6, 5.00, 'These two besties are hand sculpted using polymer clay. Each one is fixed with an eye screw and lobster clamp.', 1),
  (null, 'Nude Fairy', 4, 5.00, 'This nude fairy charmling with pastel pink hair is scuplted using polymer clay and is fixed with an eye screw and beautiful wings.', 4),
  (null, 'Pastel Blue Hair Girl', 4, 5.00, 'This pastel blue hair girl charmling is hand sculpted with polymer clay. It is about 1.5 inch in length and is fixed with an eye screw and lobster clamp', 5),
  (null, 'Present', 6, 5.00, 'This cute bow present box charmling is sculpted using polymer clay and is fixed with an eye screw.', 2),
  (null, 'Reindeer', 2, 5.00, 'This cheerful reindeer charmling is sculpted using polymer clay and is fixed with an eye screw.', 1),
  (null, 'Sailor Moon', 4, 5.00, 'This Sailor Moon charmling is handsculpted with polymer clay. She stands about 1.5 inches tall and is fixed with an eye screw and lobster clamp', 6),
  (null, 'Sea Bunny', 2, 5.00, 'This sea bunny is hand sculpted using polymer clay and details are painted on with acrylic paint. It is coated with varnish to protect paint finishing. An eye screw and lobster clamp are fixed onto the charm.', 2),
  (null, 'Shooting Star', 6, 5.00, 'These cute shooting star charmlings are sculpted using polymer clay and are decorated with sparkling gems. They are also fixed with an eye screw.', 6),
  (null, 'Smarty Pants Molang', 2, 5.00, 'This Molang character charmling is about 0.8 inch tall. It is sculpted from polymer clay and is fixed with an eye screw and lobster clamp.', 2),
  (null, 'Snow Bunny', 2, 5.00, 'This chubby snow bunny charmling is sculpted using polymer clay and is decorated with glitter. It is also fixed with an eye screw.', 2),
  (null, 'SprinklesCupcake', 1, 5.00, 'This fun pink frosting cupcake charmling with sprinkles is hand sculpted using polymer clay. It is fixed with an eye screw and lobster clamp', 4),
  (null, 'Strawberry Ice Cream Magnet', 3, 5.00, 'This strawberry ice cream is hand sculpted from polymer clay and is about 1 inch in diameter. A magnet is attached to the back of this sculpture.', 4),
  (null, 'Sunfish', 2, 5.00, 'This sunfish is about 1 inch in diameter. It is hand sculpted using polymer clay and a magnet is fixed to the back. It is perfect for your fridge, white board, or anywhere you like to attach it to.', 3),
  (null, 'Toasted Cupcake', 1, 5.00, 'This cute toasted cupcake charmling is sculpted using polymer clay and is fixed with an eye screw.', 1),
  (null, 'Vileplume', 2, 5.00, 'This cute chubby Vileplume pokemon is sculpted using polymer clay and is fixed with an eye screw.', 5),
  (null, 'Witch', 4, 5.00, 'This cute halloween witch is sculpted using polymer clay and is fixed with an eye screw.', 3);


CREATE TABLE Product_Image(
  product_id INT(10) UNSIGNED NOT NULL,
  image_id INT(6) UNSIGNED NOT NULL,

  FOREIGN KEY(product_id) REFERENCES Product(product_id),
  FOREIGN KEY(image_id) REFERENCES Image(image_id)
);
INSERT INTO Product_Image
  (product_id, image_id)
VALUES
  (1, 1),
  (2, 2),
  (3, 3),
  (4, 4),
  (5, 5),
  (6, 6),
  (7, 7),
  (8, 8),
  (9, 9),
  (10, 10),
  (11, 11),
  (12, 12),
  (13, 13),
  (14, 14),
  (15, 15),
  (16, 16),
  (17, 17),
  (18, 18),
  (19, 19),
  (20, 20),
  (21, 21),
  (22, 22),
  (23, 23),
  (24, 24),
  (25, 25),
  (26, 26),
  (27, 27),
  (28, 28),
  (29, 29),
  (30, 30),
  (31, 31),
  (32, 32),
  (33, 33),
  (34, 34),
  (35, 35),
  (36, 36),
  (37, 37),
  (38, 38),
  (39, 39),
  (40, 40),
  (41, 41),
  (42, 42),
  (43, 43),
  (44, 44),
  (45, 45),
  (46, 46),
  (47, 47),
  (48, 48),
  (49, 49),
  (50, 50),
  (51, 51),
  (52, 52),
  (53, 53),
  (54, 54);


CREATE TABLE User_Payment(
  usr_id INT(6) UNSIGNED NOT NULL,
  payment_id INT(10) UNSIGNED NOT NULL,

  FOREIGN KEY(usr_id) REFERENCES User(usr_id),
  FOREIGN KEY(payment_id) REFERENCES Payment_method(payment_id)
);
INSERT INTO User_Payment
  (usr_id, payment_id)
VALUES
  (1, 1),
  (2, 2),
  (3, 3),
  (4, 4),
  (5, 5);


CREATE TABLE User_Address(
  usr_id INT(6) UNSIGNED NOT NULL,
  addr_id INT(10) UNSIGNED NOT NULL,

  FOREIGN KEY(usr_id) REFERENCES User(usr_id),
  FOREIGN KEY(addr_id) REFERENCES Address(address_id)
);
INSERT INTO User_Address
  (usr_id, addr_id)
VALUES
  (1, 1),
  (2, 2),
  (3, 3),
  (4, 4),
  (5, 5);


CREATE TABLE User_Phone(
  usr_id INT(6) UNSIGNED NOT NULL,
  phone_id INT(10) UNSIGNED NOT NULL,

  FOREIGN KEY(usr_id) REFERENCES User(usr_id),
  FOREIGN KEY(phone_id) REFERENCES Phone(phone_id)
);
INSERT INTO User_Phone
  (usr_id, phone_id)
VALUES
  (1, 1),
  (2, 2),
  (3, 3),
  (4, 4),
  (5, 5);


CREATE TABLE Review(
  review_id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  review_rate INT(1) NOT NULL,
  review_text TEXT(300),
  usr_id INT(6) UNSIGNED NOT NULL,
  product_id INT(10) UNSIGNED NOT NULL,

  FOREIGN KEY(usr_id) REFERENCES User(usr_id),
  FOREIGN KEY(product_id) REFERENCES Product(product_id)
);
/*
--INSERT INTO Review
--  (review_id, review_rate, review_text, usr_id, product_id)
--VALUES
--  (null, 5, 'Very good!', 0, 0),
--  (null, 3, 'Okey, it does what it should be doing.', 3, 2),
--  (null, 4, 'Good!', 0, 4);
--------------------------------------------------------------------------

CREATE TABLE Transaction(
  transaction_id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  transaction_date DATETIME,
  usr_id INT(6) UNSIGNED NOT NULL,
  payment_id INT(10) UNSIGNED NOT NULL,
  total_price FLOAT(6),
  purchased_items VARCHAR(300),

  FOREIGN KEY(usr_id) REFERENCES User(usr_id),
  FOREIGN KEY(payment_id) REFERENCES Payment_method(payment_id)
);
-------------------- INSERT TO TABLE Transaction ------------------------

--------------------------------------------------------------------------
*/
