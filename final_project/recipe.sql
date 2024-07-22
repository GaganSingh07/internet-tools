-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2024 at 03:34 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `recipe`
--

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE Database recipe;

use recipe;

CREATE TABLE `content` (
  `id` int(11) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `title` varchar(100) NOT NULL,
  `recipes` mediumtext DEFAULT NULL,
  `likes` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `email_id`, `date`, `title`, `recipes`, `likes`) VALUES
(3, 'user_01@gmail.com', '2024-06-05', 'How to Make Hamburger Patties', 'Use Ground Chuck Beef (80/20) – grind your own or buy it ground, but 20% fat is ideal and keep it refrigerated until you’re ready to use it. Don’t overwork your meat – this will make it tough and dense. Shape the patties 1” wider than the bun since they shrink on the grill. Make an indentation in the center to prevent it from plumping up in the center. Don’t Season too early – Salt changes the structure of proteins and toughens burgers so don’t season your ground beef until you have formed your patties and are ready to grill. Get a good Sear – Once on the grill, let patties brown and sear well (3-5 min) before flipping, and do not press down on the burger save that for making Smash Burgers.', 0),
(4, 'user_01@gmail.com', '2024-07-12', 'Homemade Pizza', '“Bloom” the yeast by sprinkling the sugar and yeast in the warm water. Let sit for 10 minutes, until bubbles form on the surface. In a large bowl, combine the flour and salt. Make a well in the middle and add the olive oil and bloomed yeast mixture. Using a spoon, mix until a shaggy dough begins to form. Once the flour is mostly hydrated, turn the dough out onto a clean work surface and knead for 10-15 minutes. The dough should be soft, smooth, and bouncy. Form the dough into a taut round. Grease a clean, large bowl with olive oil and place the dough inside, turning to coat with the oil. Cover with plastic wrap. Let rise for at least an hour, or up to 24 hours. Punch down the dough and turn it out onto a lightly floured work surface. Knead for another minute or so, then cut into 4 equal portions and shape into rounds. Lightly flour the dough, then cover with a kitchen towel and let rest for another 30 minutes to an hour while you prepare the sauce and any other ingredients. Preheat the oven as high as your oven will allow, between 450-500˚F (230-260˚C). Place a pizza stone, heavy baking sheet (turn upside down so the surface is flat), or cast iron skillet in the oven. Meanwhile, make the tomato sauce: Add the salt to the can of tomatoes and puree with an immersion blender, or transfer to a blender or food processor, and puree until smooth. Once the dough has rested, take a portion and start by poking the surface with your fingertips, until bubbles form and do not deflate. Then, stretch and press the dough into a thin round. Make it thinner than you think it should be, as it will slightly shrink and puff up during baking. Sprinkle semolina onto an upside down baking sheet and place the stretched crust onto it. Add the sauce and ingredients of your choice. Slide the pizza onto the preheated pizza stone or pan. Bake for 15 minutes, or until the crust and cheese are golden brown. Add any garnish of your preference. Nutrition Calories: 1691 Fat: 65 grams Carbs: 211 grams Fiber: 12 grams Sugars: 60 grams Protein: 65 grams Enjoy! Your favorite recipes are just a click away. Download the Tasty app to save and organize your favorites.', 0),
(5, 'user_02@gmail.com', '2024-07-11', 'Refreshing Lemonade', 'Combine 1 cup each of sugar and water and cook over medium heat until the sugar dissolves. Set the syrup aside to cool for about 10 minutes. Combine the cooled syrup and freshly-squeezed lemon juice in a pitcher. Add the remaining water and stir, then pour over ice and enjoy!', 0),
(6, 'user_02@gmail.com', '2024-07-31', 'Mojito', 'Here’s what you’ll need to make this mint mojito recipe:  Fresh mint – The star of this classic cocktail! You’ll muddle some mint leaves to infuse the drink with flavor and add more to your glass for garnish. White rum – Jack and I are fans of 10 Cane and Bacardi Silver Rum, but any white rum would work here. Feel free to use your favorite! Fresh lime juice – It adds bright, tart flavor. Always, always use freshly squeezed lime juice in this mojito recipe. Simple syrup – Classic mojito recipes call for sugar, but I like to use simple syrup in its place. It streamlines the recipe, as you don’t need to muddle the sugar with the lime and mint. Simple syrup keeps for several weeks in the fridge, so I like to keep it on hand for anytime I’m in the mood for a fun drink. Club soda or sparkling water – It balances the tart lime and alcohol and gives the cocktail a fun fizz. Ice – You can’t make a cool, refreshing mojito without it!', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `email_id` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`email_id`, `password`, `first_name`, `last_name`) VALUES
('gsingh@algomau.ca', '12345', 'Gagandeep', 'Singh'),
('user@example.com', '1', 'user', '3'),
('user_01@gmail.com', 'user1', 'User', '1'),
('user_02@gmail.com', 'user2', 'User', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `content`
--
ALTER TABLE `content`
  ADD CONSTRAINT `connect` FOREIGN KEY (`email_id`) REFERENCES `user` (`email_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
