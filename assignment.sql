-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2024 at 02:42 PM
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
-- Database: `assignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `dbanswers`
--

CREATE TABLE `dbanswers` (
  `answer_id` int(11) NOT NULL,
  `username` text NOT NULL,
  `qName` text NOT NULL,
  `userAnswer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dbanswers`
--

INSERT INTO `dbanswers` (`answer_id`, `username`, `qName`, `userAnswer`) VALUES
(2, 'Chali', 'Maths', '21'),
(3, 'Chali', 'Maths', '16'),
(4, 'Chali', 'Maths', '30 cm²'),
(5, 'Chali', 'Maths', '7'),
(6, 'Chali', 'Maths', '30'),
(7, 'Chali', 'Maths', '15'),
(8, 'Chali', 'Maths', '70°'),
(9, 'Chali', 'Maths', '49'),
(10, 'Chali', 'Maths', '50 km/h'),
(11, 'Chali', 'Chemistry', 'Salt'),
(12, 'Chali', 'Chemistry', 'Sodium'),
(13, 'Chali', 'Chemistry', 'Methane (CH₄)'),
(14, 'Chali', 'Chemistry', 'Melting of ice'),
(15, 'Chali', 'Chemistry', 'Rusting of iron'),
(16, 'Chali', 'Chemistry', 'Sour taste'),
(17, 'Chali', 'Chemistry', 'Carbon dioxide (CO₂)'),
(18, 'Chali', 'Chemistry', 'Graphite'),
(19, 'Chali', 'Chemistry', 'Hydrochloric acid (HCl)'),
(20, 'Chali', 'Maths', '21'),
(21, 'Chali', 'Maths', '32'),
(22, 'Chali', 'Maths', '40 cm²'),
(23, 'Chali', 'Maths', '9'),
(24, 'Chali', 'Maths', '30'),
(25, 'Chali', 'Maths', '21'),
(26, 'Chali', 'Maths', '60°'),
(27, 'Chali', 'Maths', '54'),
(28, 'Chali', 'Maths', '50 km/h'),
(29, 'Chali', 'History', 'Julius Caesar'),
(30, 'Chali', 'History', 'Mayflower'),
(31, 'Chali', 'History', 'Space Race'),
(32, 'Chali', 'History', 'Vasco da Gama'),
(33, 'Chali', 'History', 'Political corruption'),
(34, 'Chali', 'History', 'Japanese'),
(35, 'Chali', 'History', 'Winston Churchill'),
(36, 'Chali', 'History', 'O₂'),
(37, 'Chali', 'History', 'Photosynthesis'),
(38, 'Chali', 'Science', 'True'),
(39, 'Chali', 'Science', 'True'),
(40, 'Chali', 'Science', 'True'),
(41, 'Chali', 'Science', 'True'),
(42, 'Chali', 'Science', 'True'),
(43, 'Chali', 'Science', 'True'),
(44, 'Chali', 'Science', 'True'),
(45, 'Chali', 'Science', 'True'),
(46, 'Chali', 'Science', ''),
(47, 'Chali', 'Literature', 'George Orwell'),
(48, 'Chali', 'Literature', 'Hades'),
(49, 'Chali', 'Literature', 'Nature'),
(50, 'Chali', 'Literature', 'Jane Eyre'),
(51, 'Chali', 'Literature', 'Macbeth'),
(52, 'Chali', 'Literature', 'To destroy the One Ring'),
(53, 'Chali', 'Literature', 'Sophocles'),
(54, 'Chali', 'Literature', 'George Washington'),
(55, 'Chali', 'Literature', '1939');

-- --------------------------------------------------------

--
-- Table structure for table `dbanswersnull`
--

CREATE TABLE `dbanswersnull` (
  `answer_id` int(11) NOT NULL,
  `username` text DEFAULT NULL,
  `qName` text DEFAULT NULL,
  `ua1` text DEFAULT NULL,
  `ua2` text DEFAULT NULL,
  `ua3` text DEFAULT NULL,
  `ua4` text DEFAULT NULL,
  `ua5` text DEFAULT NULL,
  `ua6` text DEFAULT NULL,
  `ua7` text DEFAULT NULL,
  `ua8` text DEFAULT NULL,
  `ua9` text DEFAULT NULL,
  `ua10` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dbanswersnull`
--

INSERT INTO `dbanswersnull` (`answer_id`, `username`, `qName`, `ua1`, `ua2`, `ua3`, `ua4`, `ua5`, `ua6`, `ua7`, `ua8`, `ua9`, `ua10`) VALUES
(23, 'Bali', 'Chemistry', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 'Bali', 'Maths', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dbquestions`
--

CREATE TABLE `dbquestions` (
  `id` int(11) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `qName` text NOT NULL,
  `q1` text NOT NULL,
  `c1` text NOT NULL,
  `a1` text NOT NULL,
  `q2` text NOT NULL,
  `c2` text NOT NULL,
  `a2` text NOT NULL,
  `q3` text NOT NULL,
  `c3` text NOT NULL,
  `a3` text NOT NULL,
  `q4` text NOT NULL,
  `c4` text NOT NULL,
  `a4` text NOT NULL,
  `q5` text NOT NULL,
  `c5` text NOT NULL,
  `a5` text NOT NULL,
  `q6` text NOT NULL,
  `c6` text NOT NULL,
  `a6` text NOT NULL,
  `q7` text NOT NULL,
  `c7` text NOT NULL,
  `a7` text NOT NULL,
  `q8` text NOT NULL,
  `c8` text NOT NULL,
  `a8` text NOT NULL,
  `q9` text NOT NULL,
  `c9` text NOT NULL,
  `a9` text NOT NULL,
  `q10` text NOT NULL,
  `c10` text NOT NULL,
  `a10` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dbquestions`
--

INSERT INTO `dbquestions` (`id`, `subject`, `qName`, `q1`, `c1`, `a1`, `q2`, `c2`, `a2`, `q3`, `c3`, `a3`, `q4`, `c4`, `a4`, `q5`, `c5`, `a5`, `q6`, `c6`, `a6`, `q7`, `c7`, `a7`, `q8`, `c8`, `a8`, `q9`, `c9`, `a9`, `q10`, `c10`, `a10`) VALUES
(1, 'History', 'History 1', 'Who was the first Prime Minister of Malaysia?', 'Tunku Abdul Aziz, Tunku Abdul Rahman, Abdul Razak Hussein, Tun Abdul Rahman Ya\'kub', 'Tunku Abdul Rahman', 'What year did World War II begin?', '1939, 1957, 1963, 1948', '1939', 'What date in 1957 did Malaysia gain independence from British rule?', 'May 13, August 31, September 16, September 25', 'August 31', 'What was the name of the political agreement that led to the formation of Malaysia in 1963?', 'Pangkor Treaty 1874, Malaysia Agreement 1963, Cobbold Commission Report 1962, Independence of Malaya Agreement 1957', 'Malaysia Agreement 1963', 'Which state is home to Mount Kinabalu, the highest peak in Malaysia?', 'Malaya, Sabah, Sarawak, Singapore', 'Sabah', 'What major economic crop was introduced during British colonization in Malaya?', 'Rudder, Robber, Rover, Rubber', 'Rubber', 'Who led the Malayan Communist Party during the Malayan Emergency?', 'Chin Peng, Onn Jaafar, Ivan Chin, Rashid Maidin', 'Chin Peng', 'What does the date September 16, 1963, signify in Malaysian history?', 'Independence Day, Agong\'s Birthday, Malaysia Day, Sarawak Day', 'Malaysia Day', 'What ancient Malay kingdom was known for its influence and trade in Southeast Asia?', 'Johor Sultanate, Kedah Sultanate, Brunei Sultanate, Malacca Sultanate', 'Malacca Sultanate', 'Malaysia\'s national oil and gas company, _, was founded in 1974.', 'Petronas, LC Maize, Shell, BHPetrol', 'Petronas'),
(2, 'Science ', 'Science 1', ' What are the primary components of Earth\'s atmosphere?', 'Oxygen, Hydrogen, Nitrogen, Carbon dioxide', ' Oxygen, Nitrogen\r\n\r\n', ' Which of the following are renewable energy sources?', 'Solar energy, Natural gas, Wind energy, Coal', ' Solar energy, Wind energy', ' Which parts of a plant are involved in photosynthesis?', ' Roots, Stems, Leaves, Flowers', ' Leaves', 'Which of the following are types of chemical bonds?', ' Ionic, Covalent, Nuclear, Metallic', 'Ionic, Covalent, Metallic', 'What are properties of acids?', ' Taste bitter, Taste sour, Turn blue litmus red, Conduct electricity', ' Taste sour, Turn blue litmus red, Conduct electricity\r\n\r\n', ' Which of the following are forms of electromagnetic radiation?', ' Gamma rays, Sound waves, Microwaves, Infrared', 'Gamma rays, Microwaves, Infrared\r\n\r\n', 'Which organisms are classified as vertebrates?', ' Frogs, Worms, Birds, Insects', ' Frogs,  Birds', 'Which of these planets have rings?', ' Venus, Jupiter, Saturn, Neptune', ' Jupiter, Saturn, Neptune', 'Which of the following are examples of chemical reactions?', ' Rusting of iron, Melting of ice, Combustion of wood, Dissolving sugar in water', 'Rusting of iron,  Combustion of wood\r\n\r\n', 'Which subatomic particles are found in the nucleus of an atom?\r\n', ' Protons, Neutrons, Electrons, Photons', ' Protons, Neutrons\r\n\r\n'),
(3, 'MATH', 'Math 1', 'Solve for x in the equation x^2 - 5x + 6 = 0', 'x = 2, x = 3, x = -2, x = -3', 'x = 2, x = 3', 'Which of the following are prime numbers?', '11, 15, 17, 21', '11, 17', 'Identify the solutions for the inequality 2x - 4 > 0 ', 'x > 2, x > -2, x < 2, x < -2', 'x > 2', 'Evaluate 7 + 3 * 2 - 4', '10, 11, 13, 15 ', '11', 'Simplify the expression 3x^2/9x\r\n\r\n', 'x/2, 1/3x, 3x, x^2', 'x/3, 1/3x', 'Which of the following are Pythagorean triples?', '(3,4,5), (5,12,13), (6,8,10), (7,24,25)', '(3, 4, 5), (5, 12, 13), (6, 8, 10), (7, 24, 25)', 'Which of the following angles are complementary?', '30° and 60°, 45° and 45, 90° and 0°, 60° and 90°', '30° and 60°, 45° and 45°', 'Determine which of the following sequences are arithmetic sequences:', '(2, 5, 8, 11, 14), (3, 6, 12, 24, 48), (-1, 2, 5, 8, 11), (7, 7, 7, 7, 7)', '(2, 5, 8, 11, 14), (-1, 2, 5, 8, 11), (7, 7, 7, 7, 7)', ' Solve for x: 2x^2 - 8 = 0\r\n\r\n', 'x=±2, x=±4, x=-2, x=2', 'x=±2', 'What is the area of a rectangle with length 8 cm and width 5 cm?', '40cm^2, 13cm^2, 30cm^2, 80cm^2\r\n ', '40cm^2'),
(4, 'Literature', 'Literature 1', 'Which of the following are works by William Shakespeare?', 'Macbeth, Pride and Prejudice, Romeo and Juliet, The Tempest', 'Macbeth, Romeo and Juliet, The Tempest', 'Which literary devices are present in the sentence: \"The wind howled angrily as the night crept in\"?', 'Personification, Metaphor, Hyperbole, Imagery', 'Personification, Imagery', 'Which characters appear in The Great Gatsby by F. Scott Fitzgerald?', 'Jay Gatsby, Daisy Buchanan, Atticus Finch, Nick Carraway', 'Jay Gatsby, Daisy Buchanan, Nick Carraway', 'Which of the following are themes in George Orwell\'s 1984?', 'Totalitarianism, Freedom of Speech, The Power of Language, Alien Invasion', 'Totalitarianism, The Power of Language', ' Which authors are part of the Romantic movement?', 'William Wordsworth, Edgar Allan Poe, John Keats, Emily Dickinson', 'William Wordsworth, John Keats', 'In To Kill a Mockingbird, what lessons does Atticus Finch teach his children?', 'The importance of courage, Empathy for others, Fighting physically to solve problems, The value of justice\r\n', 'The importance of courage, Empathy for others, The value of justice', 'Which of the following are genres of literature?', 'Tragedy, Prose, Satire, Sculpture', 'Tragedy, Prose, Satire', 'Which books are considered dystopian novels?', 'Brave New World by Aldous Huxley, Animal Farm by George Orwell, The Hunger Games by Suzanne Collins, Jane Eyre by Charlotte Brontë', 'Brave New World, Animal Farm, The Hunger Games', 'Which of the following are common elements of poetry?', 'Meter, Stanza, Dialogue, Rhyme\r\n\r\n', 'Meter, Stanza, Rhyme', ' Which of these are examples of symbolism in literature?', 'The green light in The Great Gatsby, The mockingbird in To Kill a Mockingbird, The scarlet letter in The Scarlet Letter, The spaceship in War of the Worlds', 'The green light in The Great Gatsby, he mockingbird in To Kill a Mockingbird, The scarlet letter in The Scarlet Letter\r\n\r\n'),
(5, 'Chemistry', 'Chemistry 1', 'Which of the following are chemical elements?', 'Sodium, Water, Carbon, Oxygen', 'Sodium, Carbon, Oxygen', 'Which of the following are properties of metals?', ' Conduct electricity, High melting point, Brittle, Malleable\r\n', 'Conduct electricity, High melting point, Malleable\r\n\r\n', 'Which compounds contain ionic bonds?', 'NaCl (Sodium chloride), H2O (Water), MgO (Magnesium oxide), CO2 (Carbon dioxide)', 'NaCl, MgO', 'Which of the following are examples of acids?', 'HCl (Hydrochloric acid), NaOH (Sodium hydroxide), H2SO4 (Sulfuric acid), CH3COOH (Acetic acid)', 'HCl, H2SO4, CH3COOH\r\n\r\n', ' Which of the following are indicators in acid-base chemistry?', 'Phenolphthalein, Litmus paper, Bromothymol blue, Sodium chloride', 'Phenolphthalein, Litmus paper, Bromothymol blue', ' Which of these are examples of physical changes?', 'Melting of ice, Burning of wood, Dissolving sugar in water, Evaporation of water', 'Melting of ice, Dissolving sugar in water, Evaporation of water', 'Which factors can increase the rate of a chemical reaction?', 'Increasing the temperature, Increasing the concentration of reactants, Adding a catalyst, Decreasing the surface area of reactants', 'Increasing the temperature, Increasing the concentration of reactants, Adding a catalyst', 'Which of the following are diatomic molecules?', 'O2, H2, CL2, He', 'O2, H2, CL2', 'Which of these are types of chemical reactions?', 'Synthesis, Decomposition, Combustion, Polymerization', 'Synthesis, Decomposition, Combustion', ' Which of the following are noble gases?', 'Helium (He), Neon (Ne), Nitrogen (N2), Argon (Ar)', 'Helium, Neon, Argon'),
(6, 'Geograhpy', 'Geography 1', ' Which of the following are continents?', 'Africa, Antarctica, Australia, Greenland', ' Africa, Antarctica, Australia', 'Which countries are located in South America?', 'Brazil, Argentina, Chile, Mexico', 'Brazil, Argentina, Chile', 'Which of the following are examples of renewable resources?', 'Solar energy, Wind energy, Coal, Hydropower', 'Solar energy, Wind energy, Hydropower\r\n\r\n', 'Which of these rivers are among the longest in the world?', 'Amazon, Nile, Yangtze, Thames', 'Amazon, Nile, Yangtze', ' Which of the following countries are part of the European Union (EU)?', 'France, Germany, Switzerland, Spain', 'France, Germany, Spain', 'Which of these are types of landforms?', 'Mountain, Plateau, Glacier, Ocean', 'Mountain, Plateau, Glacier', ' Which oceans border the United States?', ' Atlantic Ocean, Pacific Ocean, Indian Ocean, Arctic Ocean', 'Atlantic Ocean, Pacific Ocean\r\n\r\n', 'Which countries share a border with China?', 'India, Russia, Vietnam, Japan', 'India, Russia, Vietnam', 'Which of these are major deserts?', 'Sahara, Gobi, Amazon, Kalahari', 'Sahara, Gobi, Kalahari', 'Which of the following are considered tectonic plates?', 'Pacific Plate, Eurasian Plate, Indian Plate, Arctic Plate', 'Pacific Plate, Eurasian Plate, Indian Plate');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_questions`
--

CREATE TABLE `quiz_questions` (
  `id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `question` text NOT NULL,
  `option_a` text NOT NULL,
  `option_b` text NOT NULL,
  `option_c` text NOT NULL,
  `option_d` text NOT NULL,
  `correct_answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quiz_questions`
--

INSERT INTO `quiz_questions` (`id`, `subject`, `question`, `option_a`, `option_b`, `option_c`, `option_d`, `correct_answer`) VALUES
(1, 'Maths', 'What is 25 x 4?', '50', '100', '125', '75', 'B'),
(2, 'Maths', 'What is the value of 45/5 + 12?', '21', '18', '30', '24', 'D'),
(3, 'Maths', 'Solve: 8 to the power of 2', '16', '32', '64', '128', 'C'),
(4, 'Maths', 'If a rectangle\'s length is 10cm and width is 6cm, what is its area?', '30 cm²', '60 cm²', '16 cm²', '40 cm²', 'B'),
(5, 'Maths', 'Solve: √81', '7', '8', '9', '10', 'C'),
(6, 'Maths', 'What is 15% of 200?', '30', '25', '20', '35', 'A'),
(7, 'Maths', 'What is the value of 3 + 6 x 2?', '15', '21', '18', '12', 'A'),
(8, 'Maths', 'A triangle has angles of 50° and 60°. What is the third angle?', '70°', '90°', '80°', '60°', 'C'),
(9, 'Maths', 'If 𝑥 = 5, what is 2𝑥² - 3𝑥 + 4?', '49', '50', '54', '55', 'B'),
(10, 'Maths', 'A train travels 300 km in 5 hours. What is its speed?', '50 km/h', '60 km/h', '70 km/h', '80 km/h', 'B'),
(12, 'Chemistry', 'What are the products of the reaction between an acid and a base?', 'Salt', 'Water', 'Hydrogen gas', 'Carbon dioxide', 'A,B'),
(13, 'Chemistry', 'Which elements are alkali metals?', 'Sodium', 'Calcium', 'Potassium', 'Magnesium', 'A,C'),
(14, 'Chemistry', 'Which of these compounds are examples of hydrocarbons?', 'Methane (CH₄)', 'Water (H₂O)', 'Propane (C₃H₈)', 'Carbon dioxide (CO₂)', 'A,C'),
(15, 'Chemistry', 'Which of the following are physical changes?', 'Melting of ice', 'Burning of paper', 'Dissolving sugar in water', 'Boiling water', 'A,C,D'),
(16, 'Chemistry', 'Which are examples of chemical changes?', 'Rusting of iron', 'Baking a cake', 'Breaking a glass', 'Digestion of food', 'A,B,D'),
(17, 'Chemistry', 'Which of the following are properties of acids?', 'Sour taste', 'Turn blue litmus red', 'Conduct electricity in solution', 'Feel slippery to touch', 'A,B,C'),
(18, 'Chemistry', 'Which of the following are greenhouse gases?', 'Carbon dioxide (CO₂)', 'Methane (CH₄)', 'Nitrogen (N₂)', 'Water vapor (H₂O)', 'A,B,D'),
(19, 'Chemistry', 'Which of these are allotropes of carbon?', 'Graphite', 'Diamond', 'Quartz', 'Fullerenes', 'A,B,D'),
(20, 'Chemistry', 'Which of the following are string acids?', 'Hydrochloric acid (HCl)', 'Sulphuric acid (H₂SO₄)', 'Acetic acid (CH₃COOH)', 'Nitric acid (HNO₃)', 'A,B,D'),
(21, 'Science', 'The Sun is a star.', 'True', 'False', '', '', 'A'),
(22, 'Science', 'Plants produce oxygen during photosynthesis.', 'True', 'False', '', '', 'A'),
(23, 'Science', 'Sound travels faster in air than in water.', 'True', 'False', '', '', 'B'),
(24, 'Science', 'All metals are magnetic.', 'True', 'False', '', '', 'B'),
(25, 'Science', 'The human body has 206 bones.', 'True', 'False', '', '', 'A'),
(26, 'Science', 'The boiling point of water is 90°C at sea level.', 'True', 'False', '', '', 'B'),
(27, 'Science', 'The chemical formula of water is H₂O.', 'True', 'False', '', '', 'A'),
(28, 'Science', 'Electrons are positively charged particles.', 'True', 'False', '', '', 'B'),
(29, 'Science', 'Gravity exists only on Earth.', 'True', 'False', '', '', 'B'),
(30, 'Science', 'An object in motion will stay in motion unless acted upon by an external force.', 'True', 'False', '', '', 'A'),
(31, 'Geography', 'The longest river in the world is the __________.', '', '', '', '', 'Nile'),
(32, 'Geography', 'The __________ Ocean is the largest ocean on Earth.', '', '', '', '', 'Pacific'),
(33, 'Geography', 'The Sahara Desert is located on the continent of __________.', '', '', '', '', 'Africa'),
(34, 'Geography', 'The tallest mountain in the world is __________.', '', '', '', '', 'Mount Everest'),
(35, 'Geography', 'The Earth\'s crust is divided into large pieces called __________.', '', '', '', '', 'Tectonic plates'),
(36, 'Geography', 'The capital city of Japan is __________.', '', '', '', '', 'Tokyo'),
(37, 'Geography', 'The imaginary line that divides the Earth into northern and southern hemispheres is called the __________.', '', '', '', '', 'Equator'),
(38, 'Geography', 'The __________ is the largest rainforest in the world.', '', '', '', '', 'Amazon'),
(39, 'Geography', 'The country with the largest population in the world is __________.', '', '', '', '', 'China'),
(40, 'Geography', 'The Great Barrier Reef is located off the coast of __________.', '', '', '', '', 'Australia'),
(41, 'Literature', 'Who wrote the novel \"To Kill a Mockingbird\"?', 'Harper Lee', 'J.K. Rowling', 'Mark Twain', 'Ernest Hemingway', 'A'),
(42, 'Literature', 'In Shakespeare\'s \"Romeo and Juliet,\" what family is Juliet from?', 'Montague', 'Capulet', 'Verona', 'Lancaster', 'B'),
(43, 'Literature', 'Who is the author of \"1984\" and \"Animal Farm\"?', 'George Orwell', 'Aldous Huxley', 'F. Scott Fitzgerald', 'Ray Bradbury', 'A'),
(44, 'Literature', 'In Greek mythology, who is the god of the sea?', 'Zeus', 'Hades', 'Poseidon', 'Apollo', 'C'),
(45, 'Literature', 'What is the main theme of Robert Frost\'s poem \"The Road Not Taken\"?', 'Love', 'Adventure', 'Choices and consequences', 'Nature', 'C'),
(46, 'Literature', 'Who is the protagonist in Charlotte Brontë\'s \"Jane Eyre\"?', 'Jane Austen', 'Elizabeth Bennet', 'Jane Eyre', 'Catherine Earnshaw', 'C'),
(47, 'Literature', 'Which Shakespeare play features the line, \"To be or not to be\"?', 'Macbeth', 'Hamlet', 'Othello', 'The Tempest', 'B'),
(49, 'Literature', 'In J.R.R. Tolkien\'s \"The Lord of the Rings,\" what is Frodo Baggins\' quest?', 'To defeat Sauron', 'To destroy the One Ring', 'To protect Middle-earth', 'To find the Arkenstone', 'B'),
(50, 'Literature', 'What is the setting of John Steinbeck\'s novel \"Of Mice and Men\"?', 'Oklahoma during the Dust Bowl', 'California during the Great Depression', 'New York during the Roaring Twenties', 'Texas during the Civil War', 'B'),
(51, 'Literature', 'Who wrote the epic poem \"The Odyssey\"?', 'Homer', 'Virgil', 'Dante', 'Sophocles', 'A'),
(52, 'History', 'Who was the first President of the United States?', 'Thomas Jefferson', 'Abraham Lincoln', 'George Washington', 'John Adams', 'C'),
(53, 'History', 'In what year did World War II begin?', '1939', '1941', '1935', '1945', 'A'),
(54, 'History', 'Who was known as the \"Father of the Indian Nation\"?', 'Jawaharlal Nehru', 'Subhas Chandra Bose', 'Mahatma Gandhi', 'B.R. Ambedkar', 'C'),
(55, 'History', 'What was the first emperor of the Roman Empire?', 'Julius Caesar', 'Nero', 'Augustus', 'Constantine', 'C'),
(56, 'History', 'What was the name of the ship on which the Pilgrims traveled to America in 1620?', 'Titanic', 'Mayflower', 'Santa Maria', 'Victory', 'B'),
(57, 'History', 'Which event marked the end of the Cold War?', 'Fall of the Berlin Wall', 'Cuban Missile Crisis', 'Vietnam War', 'Space Race', 'A'),
(58, 'History', 'Who discovered America in 1492?', 'Ferdinand Magellan', 'Christopher Columbus', 'Vasco da Gama', 'Amerigo Vespucci', 'B'),
(59, 'History', 'What was the main cause of the French Revolution?', 'Political corruption', 'Economic inequality', 'Religious conflict', 'Industrial revolution', 'B'),
(60, 'History', 'The Great Wall of China was primarily built to protect against invasions from which group?', 'Mongols', 'Japanese', 'Koreans', 'Persians', 'A'),
(61, 'History', 'Who was the leader of Germany during World War II?', 'Adolf Hitler', 'Otto von Bismarck', 'Joseph Stalin', 'Winston Churchill', 'A'),
(62, 'Science', 'What is the chemical symbol for water?', 'H₂O', 'CO₂', 'O₂', 'NaCl', 'A'),
(63, 'Science', 'What is the process by which plants make their own food?', 'Respiration', 'Photosynthesis', 'Fermentation', 'Transpiration', 'B'),
(64, 'Science', 'What is the powerhouse of the cell?', 'Nucleus', 'Ribosome', 'Mitochondria', 'Cell wall', 'C'),
(65, 'Science', 'Which gas is most abundant in Earth\'s atmosphere?', 'Oxygen', 'Carbon dioxide', 'Nitrogen', 'Hydrogen', 'C'),
(66, 'Science', 'What is the unit of electrical resistance?', 'Ampere', 'Volt', 'Ohm', 'Watt', 'C'),
(67, 'Science', 'What is the largest planet in our solar system?', 'Earth', 'Jupiter', 'Saturn', 'Neptune', 'B'),
(68, 'Science', 'What type of energy is produced by moving objects?', 'Thermal energy', 'Potential energy', 'Kinetic energy', 'Chemical energy', 'C'),
(69, 'Science', 'What is the pH value of a neutral substance like pure water?', '0', '7', '14', '10', 'B'),
(70, 'Science', 'What is the main function of red blood cells in the human body?', 'Fighting infections', 'Transporting oxygen', 'Clotting blood', 'Regulating temperature', 'B'),
(71, 'Science', 'Which scientist proposed the theory of evolution by natural selection?', 'Isaac Newton', 'Albert Einstein', 'Charles Darwin', 'Galileo Galilei', 'C'),
(72, 'Chemistry', 'What is the atomic number of carbon?', '6', '12', '14', '8', 'A'),
(73, 'Chemistry', 'What is the chemical formula of table salt?', 'NaCl', 'H₂O', 'KCl', 'Na₂O', 'A'),
(74, 'Chemistry', 'Which gas is released during photosynthesis?', 'Carbon dioxide', 'Oxygen', 'Nitrogen', 'Hydrogen', 'B'),
(75, 'Chemistry', 'What is the pH value of an acidic solution?', 'Greater than 7', 'Less than 7', 'Equal to 7', 'Equal to 14', 'B'),
(76, 'Chemistry', 'Which element is known as the \"King of Chemicals\"?', 'Sulfuric acid', 'Hydrogen', 'Sodium', 'Chlorine', 'A'),
(77, 'Chemistry', 'Which type of bond is formed by the sharing of electrons?', 'Ionic bond', 'Covalent bond', 'Metallic bond', 'Hydrogen bond', 'B'),
(78, 'Chemistry', 'What is the most abundant element in the universe?', 'Oxygen', 'Hydrogen', 'Carbon', 'Nitrogen', 'B'),
(79, 'Chemistry', 'Which state of matter has a definite volume but no definite shape?', 'Solid', 'Liquid', 'Gas', 'Plasma', 'B'),
(80, 'Chemistry', 'What is the main component of natural gas?', 'Ethane', 'Methane', 'Propane', 'Butane', 'B'),
(81, 'Chemistry', 'Which of the following substances is an example of a compound?', 'Hydrogen', 'Gold', 'Water', 'Oxygen', 'C'),
(82, 'Geography', 'What is the largest continent by area?', 'Africa', 'Asia', 'North America', 'Europe', 'B'),
(83, 'Geography', 'Which is the longest river in the world?', 'Amazon', 'Nile', 'Yangtze', 'Mississippi', 'B'),
(84, 'Geography', 'What is the smallest country in the world by area?', 'Monaco', 'Vatican City', 'San Marino', 'Liechtenstein', 'B'),
(85, 'Geography', 'Which desert is the largest in the world?', 'Gobi Desert', 'Sahara Desert', 'Arabian Desert', 'Antarctic Desert', 'D'),
(86, 'Geography', 'Which line divides the Earth into the Northern and Southern Hemispheres?', 'Equator', 'Prime Meridian', 'Tropic of Cancer', 'Tropic of Capricorn', 'A'),
(87, 'Geography', 'What is the capital city of Canada?', 'Toronto', 'Ottawa', 'Vancouver', 'Montreal', 'B'),
(88, 'Geography', 'Mount Everest is located in which mountain range?', 'Andes', 'Rockies', 'Himalayas', 'Alps', 'C'),
(89, 'Geography', 'Which ocean is the deepest in the world?', 'Atlantic Ocean', 'Pacific Ocean', 'Indian Ocean', 'Arctic Ocean', 'B'),
(90, 'Geography', 'What is the name of the imaginary line that runs through Greenwich, England?', 'Equator', 'Tropic of Cancer', 'Prime Meridian', 'International Date Line', 'C'),
(91, 'Geography', 'Which country has the most volcanoes in the world?', 'Japan', 'Indonesia', 'United States', 'Philippines', 'C'),
(92, 'Maths', 'Which of the following numbers are prime?', '2', '4', '7', '9', 'A,C'),
(93, 'Maths', 'Which of these are multiples of 3?', '6', '9', '12', '13', 'A,B,C'),
(94, 'Maths', 'Which of the following fractions are equivalent to 1/2?', '2/4', '3/6', '5/10', '2/5', 'A,B,C'),
(95, 'Maths', 'Which of these shapes have more than 4 sides?', 'Triangle', 'Pentagon', 'Hexagon', 'Square', 'B,C'),
(96, 'Maths', 'Which of these numbers are perfect squares?', '16', '25', '30', '36', 'A,B,D'),
(97, 'Maths', 'Which of the following angles are acute angles?', '30°', '90°', '45°', '120°', 'A,C'),
(98, 'Maths', 'Which of these numbers are divisible by 5?', '10', '15', '18', '25', 'A,B,D'),
(99, 'Maths', 'Which of the following are solutions to the question x² = 16?', '4', '-4', '8', '-8', 'A,B'),
(100, 'Maths', 'Which of these are examples of irrational numbers?', '√2', '3.14159 (π)', '√9', '22/7', 'A,B'),
(101, 'Science', 'Which of the following are states of matter?', 'Solid', 'Liquid', 'Gas', 'Plasma', 'A,B,C,D'),
(102, 'Science', 'Which of these are greenhouse gases?', 'Carbon dioxide (CO₂)', 'Methane (CH₄)', 'Oxygen (O₂)', 'Water vapor (H₂O)', 'A,B,D'),
(103, 'Science', 'Which of the following are renewable energy sources?', 'Solar energy', 'Wind energy', 'Fossil fuels', 'Hydroelectric energy', 'A,B,D'),
(104, 'Science', 'Which of these are parts of a plant cell?', 'Cell wall', 'Chloroplast', 'Mitochondria', 'Lysosome', 'A,B,C'),
(105, 'Science', 'Which of the following are elements on the periodic table?', 'Hydrogen', 'Gold', 'Water', 'Carbon', 'A,B,D'),
(106, 'Science', 'Which of these planets are considered gas giants?', 'Jupiter', 'Saturn', 'Mars', 'Neptune', 'A,B,D'),
(107, 'Science', 'Which of the following are examples of physical changes?', 'Melting ice', 'Boiling water', 'Burning wood', 'Breaking glass', 'A,B,D'),
(108, 'Science', 'Which of these are forms of energy?', 'Kinetic energy', 'Potential energy', 'Chemical energy', 'Friction', 'A,B,C'),
(109, 'Science', 'Which of the following are examples of acids?', 'Hydrochloric acid (HCl)', 'Vinegar (acetic acid)', 'Sodium hydroxide (NaOH)', 'Lemon juice (citric acid)', 'A,B,D'),
(110, 'Science', 'Which of these are functions of the human skeletal system?', 'Protection of organs', 'Blood cell production', 'Hormone regulation', 'Support for the body', 'A,B,D'),
(111, 'Literature', 'Which of the following are plays by William Shakespeare?', 'Romeo and Juliet', 'Hamlet', 'Great Expectations', 'Macbeth', 'A,B,D'),
(112, 'Literature', 'Which of these characters are from To Kill a Mockingbird?', 'Atticus Finch', 'Scout Finch', 'Jay Gatsby', 'Tom Robinson', 'A,B,D'),
(113, 'Literature', 'Which of the following are novels by George Orwell?', '1984', 'Animal Farm', 'Brave New World', 'Homage to Catalonia', 'A,B,D'),
(114, 'Literature', 'Which of these are poetic devices?', 'Alliteration', 'Simile', 'Paradox', 'Rhythm', 'A,B,D'),
(115, 'Literature', 'Which of the following are literary genres?', 'Mystery', 'Science Fiction', 'Non-Fiction', 'History', 'A,B,C'),
(116, 'Literature', 'Which of these books were written by Charles Dickens?', 'Oliver Twist', 'David Copperfield', 'Pride and Prejudice', 'A Tale of Two Cities', 'A,B,D'),
(117, 'Literature', 'Which of these poets are from the Romantic period?', 'Willian Wordsworth', 'Samuel Taylor Coleridge', 'T.S. Eliot', 'Lord Byron', 'A,B,D'),
(118, 'Literature', 'Which of the following are themes in The Great Gatsby?', 'The American Dream', 'Social Class', 'War', 'Love and Desire', 'A,B,D'),
(119, 'Literature', 'Which of these are works of Greek mythology?', 'The Iliad', 'The Odyssey', 'The Aeneid', 'Antigone', 'A,B,D'),
(120, 'Literature', 'Which of these authors won the Nobel Prize in Literature?', 'Ernest Hemingway', 'Toni Morrison', 'F. Scott Fitzgerald', 'Gabriel Garcia Márquez', 'A,B,D'),
(121, 'History', 'Which of these were cause if World War I?', 'Militarism', 'Alliances', 'Imperialism', 'The Great Depression', 'A,B,C'),
(122, 'History', 'Which of these civilizations built pyramids?', 'Egyptians', 'Mayans', 'Aztecs', 'Romans', 'A,B'),
(123, 'History', 'Which of these leaders were involved in World War II?', 'Adolf Hitler', 'Franklin D. Roosevelt', 'Winston Churchill', 'Napoleon Bonaparte', 'A,B,C'),
(124, 'History', 'Which of the following were Ancient Greek philosophers?', 'Socrates', 'Aristotle', 'Plato', 'Julius Caesar', 'A,B,C'),
(125, 'History', 'Which of these countries were part of the Axis Powers during World War II?', 'Germany', 'Italy', 'Japan', 'United States', 'A,B,C'),
(126, 'History', 'Which revolutions are associated with the 18th century?', 'American Revolution', 'French Revolution', 'Industrial Revolution', 'Russian Revolution', 'A,B'),
(127, 'History', 'Which of these were important trade routes in history?', 'Silk Road', 'Trans-Saharan Trade Route', 'Spice Route', 'Panama Canal', 'A,B,C'),
(128, 'History', 'Which of these events are linked to the Cold War?', 'Cuban Missile Crisis', 'Space Race', 'Vietnam War', 'Treaty of Versailles', 'A,B,C'),
(129, 'History', 'Which of these were influential figures in the civil rights movement in the United States?', 'Martin Luther King Jr.', 'Rosa Parks', 'Malcolm X', 'George Washington', 'A,B,C'),
(130, 'History', 'Which of these empires were known for their significant contributions to art and science?', 'Roman Empire', 'Islamic Golden Age', 'Gupta Empire', 'Mongol Empire', 'A,B,C'),
(131, 'Geography', 'Which of the following are continents?', 'Asia', 'Antartica', 'Greenland', 'South America', 'A,B,D'),
(132, 'Geography', 'Which of these are major deserts in the world?', 'Sahara', 'Gobi', 'Amazon', 'Kalahari', 'A,B,D'),
(133, 'Geography', 'Which of these countries are in Europe?', 'France', 'Germany', 'Brazil', 'Italy', 'A,B,D'),
(134, 'Geography', 'Which of the following are landlocked countries?', 'Switzerland', 'Afghanistan', 'Japan', 'Nepal', 'A,B,D'),
(135, 'Geography', 'Which of these are examples of physical geography features?', 'Mountains', 'Rivers', 'Cities', 'Forests', 'A,B,D'),
(136, 'Geography', 'Which of these are examples of tectonic plates?', 'Pacific Plate', 'Eurasian Plate', 'Indian Plate', 'Mediterranean Plate', 'A,B,C'),
(137, 'Geography', 'Which of the following are oceans?', 'Atlantic Ocean', 'Arctic Ocean', 'Mediterranean Sea', 'Indian Ocean', 'A,B,D'),
(138, 'Geography', 'Which of these countries are located in Africa?', 'Nigeria', 'Kenya', 'Thailand', 'South Africa', 'A,B,D'),
(139, 'Geography', 'Which of these are climate zones?', 'Tropical', 'Polar', 'Desert', 'Urban', 'A,B,C'),
(140, 'Geography', 'Which of these are rivers?', 'Nile', 'Amazon', 'Everest', 'Yangtze', 'A,B,D'),
(141, 'Maths', 'The sum of the angles in a triangle is always 180°.', 'True', 'False', '', '', 'A'),
(142, 'Maths', 'The square root of 64 is 6.', 'True', 'False', '', '', 'B'),
(143, 'Maths', 'A prime number has only two factors: 1 and itself.', 'True', 'False', '', '', 'A'),
(144, 'Maths', 'The value of 2³ is 16.', 'True', 'False', '', '', 'B'),
(145, 'Maths', 'A circle has no edges or vertices.', 'True', 'False', '', '', 'A'),
(146, 'Maths', 'The perimeter of a rectangle is calculated using the formula 2 ( 𝑙 + 𝑏 ).', 'True', 'False', '', '', 'A'),
(147, 'Maths', '3x + 5 = 8 has the solution x = 1.', 'True', 'False', '', '', 'A'),
(148, 'Maths', 'The product of any number and zero is always zero.', 'True', 'False', '', '', 'A'),
(149, 'Maths', 'The Pythagorean theorem states that in a right triangle, a² + b² = c³.', 'True', 'False', '', '', 'B'),
(150, 'Maths', 'The ratio 50 : 100 is equivalent to 1 : 2.', 'True', 'False', '', '', 'A'),
(151, 'Chemistry', 'Water is a compound made up of hydrogen and oxygen.', 'True', 'False', '', '', 'A'),
(152, 'Chemistry', 'The atomic number of an element represents the number of neutrons in its nucleus.', 'True', 'False', '', '', 'B'),
(153, 'Chemistry', 'Noble gases are highly reactive elements.', 'True', 'False', '', '', 'B'),
(154, 'Chemistry', 'The chemical formula for table salt is NaCl.', 'True', 'False', '', '', 'A'),
(155, 'Chemistry', 'Acids have a pH greater than 7.', 'True', 'False', '', '', 'B'),
(156, 'Chemistry', 'The mass number of an atom is the sum of its protons and neutrons.', 'True', 'False', '', '', 'A'),
(157, 'Chemistry', 'Oxygen is necessary for combustion to occur.', 'True', 'False', '', '', 'A'),
(158, 'Chemistry', 'In a chemical reaction, products are written on the left side of the equation.', 'True', 'False', '', '', 'B'),
(159, 'Chemistry', 'Diamond and graphite are both forms of carbon.', 'True', 'False', '', '', 'A'),
(160, 'Chemistry', 'Helium is the heaviest element in the periodic table.', 'True', 'False', '', '', 'B'),
(161, 'Geography', 'The Amazon River is the longest river in the world.', 'True', 'False', '', '', 'B'),
(162, 'Geography', 'The Sahara Desert is the largest hot desert in the world.', 'True', 'False', '', '', 'A'),
(163, 'Geography', 'Mount Everest is located in the Andes mountain range.', 'True', 'False', '', '', 'B'),
(164, 'Geography', 'Australia is both a country and a continent.', 'True', 'False', '', '', 'A'),
(165, 'Geography', 'The equator passes through the continent of Europe.', 'True', 'False', '', '', 'B'),
(166, 'Geography', 'Antartica has no permanent population.', 'True', 'False', '', '', 'A'),
(167, 'Geography', 'The Great Wall of China can be seen from space with the naked eye.', 'True', 'False', '', '', 'B'),
(168, 'Geography', 'Africa is the second-largest continent in the world.', 'True', 'False', '', '', 'A'),
(169, 'Geography', 'The United States has the largest population in the world.', 'True', 'False', '', '', 'B'),
(170, 'Geography', 'Greenland is the largest island in the world.', 'True', 'False', '', '', 'A'),
(171, 'Literature', 'William Shakespeare wrote Romeo and Juliet.', 'True', 'False', '', '', 'A'),
(172, 'Literature', 'George Orwell wrote The Catcher in the Rye.', 'True', 'False', '', '', 'B'),
(173, 'Literature', 'The protagonist of The Great Gatsby is Jay Gatsby.', 'True', 'False', '', '', 'A'),
(174, 'Literature', 'The Iliad and the Odyssey were written by Socrates.', 'True', 'False', '', '', 'B'),
(175, 'Literature', 'Pride and Prejudice was written by Jane Austen.', 'True', 'False', '', '', 'A'),
(176, 'Literature', 'Harper Lee won a Pulitzer Prize for To Kill a Mockingbird.', 'True', 'False', '', '', 'A'),
(177, 'Literature', 'The Poem \"The Raven\" was Written by Edgar Allan Poe.', 'True', 'False', '', '', 'A'),
(178, 'Literature', 'J.K. Rowling is the author of The Chronicles of Narnia.', 'True', 'False', '', '', 'B'),
(179, 'Literature', 'Moby-Dick was written by Herman Melville.', 'True', 'False', '', '', 'A'),
(180, 'Literature', 'Robert Frost is known for writing novels.', 'True', 'False', '', '', 'B'),
(181, 'History', 'The American Civil War ended in 1865.', 'True', 'False', '', '', 'A'),
(182, 'History', 'The Great Wall of China was built during the Ming Dynasty.', 'True', 'False', '', '', 'A'),
(183, 'History', 'Napoleon Bonaparte was a leader during the American Revolution.', 'True', 'False', '', '', 'B'),
(184, 'History', 'World War I began in 1914.', 'True', 'False', '', '', 'A'),
(185, 'History', 'The Berlin Wall was built in 1945 at the end of World War II.', 'True', 'False', '', '', 'B'),
(186, 'History', 'The Roman Empire fell in 476 AD.', 'True', 'False', '', '', 'A'),
(187, 'History', 'The Declaration of Independence was signed in 1776.', 'True', 'False', '', '', 'A'),
(188, 'History', 'The Industrial Revolution began in the United States.', 'True', 'False', '', '', 'B'),
(189, 'History', 'Mahatma Gandhi led the non-violent independence movement in India.', 'True', 'False', '', '', 'A'),
(190, 'History', 'Christopher Columbus discovered America in 1492.', 'True', 'False', '', '', 'B'),
(191, 'History', 'The __________ was signed in 1776, declaring the independence of the American colonies from British rule.', '', '', '', '', 'Declaration of Independence'),
(192, 'History', 'The First World War began in the year __________.', '', '', '', '', '1914'),
(194, 'History', 'The Great Wall of China was built to protect against invasions from the __________.', '', '', '', '', 'Mongols'),
(197, 'History', '__________ was the first President of the United States.', '', '', '', '', 'George Washington'),
(200, 'History', 'The __________ Revolution began in Great Britain and marked the transition to industrialization.', '', '', '', '', 'Industrial'),
(201, 'History', 'The Roman Empire officially fell in the year __________.', '', '', '', '', '476 AD'),
(202, 'History', 'The movement led by Martin Luther in 1517 that challenged the Catholic Church was called the __________.', '', '', '', '', 'Reformation'),
(203, 'History', '__________ was the Queen of England during the defeat of the Spanish Armada in 1588.', '', '', '', '', 'Queen Elizabeth I'),
(204, 'History', 'The Treaty of __________ ended World War I and imposed harsh penalties on Germany.', '', '', '', '', 'Versailles'),
(205, 'History', 'The United Nations was established in the year __________.', '', '', '', '', '1945'),
(206, 'Literature', 'The play Romeo and Juliet was written by __________.', '', '', '', '', 'William Shakespeare'),
(207, 'Literature', 'The novel To Kill a Mockingbird was written by __________.', '', '', '', '', 'Harper Lee'),
(208, 'Literature', 'The character Jay Gatsby appears in the novel The Great Gatsby, written by __________.', '', '', '', '', 'F. Scott Fitzgerald'),
(209, 'Literature', 'The epic poems The Iliad and The Odyssey were written by __________.', '', '', '', '', 'Homer'),
(210, 'Literature', 'The novel Pride and Prejudice was written by __________.', '', '', '', '', 'Jane Austen'),
(211, 'Literature', 'The poem \"The Raven\" begins with the line, \"Once upon a midnight dreary,\" and was written by __________.', '', '', '', '', 'Edgar Allan Poe'),
(212, 'Literature', 'The fantasy series The Chronicles of Narnia was written by __________.', '', '', '', '', 'C.S. Lewis'),
(213, 'Literature', 'The character Holden Caulfield is the protagonist of the novel The Catcher in the Rye by __________.', '', '', '', '', 'J.D. Salinger'),
(214, 'Literature', 'The novel 1984, which introduced the concept of Big Brother, was written by __________.', '', '', '', '', 'George Orwell'),
(215, 'Literature', 'The phrase \"All animals are equal, but some animals are more equal than others\" comes from the book __________, written by George Orwell.', '', '', '', '', 'Animal Farm'),
(216, 'Chemistry', 'The atomic number of an element represents the number of __________ in its nucleus.', '', '', '', '', 'protons'),
(217, 'Chemistry', 'Water is a compound made up of hydrogen and __________.', '', '', '', '', 'oxygen'),
(218, 'Chemistry', 'The chemical formula for table salt is __________.', '', '', '', '', 'NaCl'),
(219, 'Chemistry', 'The pH scale is used to measure how __________ or basic a substance is.', '', '', '', '', 'acidic'),
(220, 'Chemistry', 'The process by which plants convert sunlight into chemical energy is called __________.', '', '', '', '', 'photosynthesis'),
(221, 'Chemistry', 'In a chemical reaction, the substances present at the start are called __________.', '', '', '', '', 'reactants'),
(222, 'Chemistry', 'The periodic table was first arranged by __________.', '', '', '', '', 'Dmitri Mendeleev'),
(223, 'Chemistry', 'The most abundant gas in Earth\'s atmosphere is __________.', '', '', '', '', 'nitrogen'),
(224, 'Chemistry', '__________ is the lightest element on the periodic table.', '', '', '', '', 'Hydrogen'),
(225, 'Chemistry', 'The process of turning a liquid into a gas is called __________.', '', '', '', '', 'evaporation'),
(226, 'Maths', 'The value of (5x + 3) - (2x - 7) when x = 4 is __________.', '', '', '', '', '23'),
(227, 'Maths', 'The slope of the line passing through the points (2,3) and (4,7) is __________.', '', '', '', '', '2'),
(228, 'Maths', 'The solution to the equation 2x + 5 = 15 is x = __________.', '', '', '', '', '5'),
(229, 'Maths', 'If the area of a rectangle is 50cm² and its length is 10cm, the width is __________ cm.', '', '', '', '', '5'),
(230, 'Maths', 'The quadratic formula to solve ax² + bx + c = 0 is x = __________.', '', '', '', '', '[-b ± √(b2 - 4ac)]/2a'),
(231, 'Maths', 'The circumference of a circle with a radius of 7cm is __________ cm.', '', '', '', '', '44'),
(232, 'Maths', 'The derivative of f(x) = 3x² - 4x + 5 is f\' (x) = __________.', '', '', '', '', '6x - 4'),
(233, 'Maths', 'The sum of the interior angles of a pentagon is __________ degrees.', '', '', '', '', '540'),
(234, 'Maths', 'The probability of getting a 3 when rolling a fair six-sided dice is __________.', '', '', '', '', '1/6'),
(235, 'Maths', 'The value of log base-2 32 is __________.', '', '', '', '', '5'),
(236, 'Science', 'The chemical formula of water is __________.', '', '', '', '', 'H₂O'),
(237, 'Science', 'The force of gravity on an object is called its __________.', '', '', '', '', 'weight'),
(238, 'Science', 'The smallest unit of life in all living organisms is the __________.', '', '', '', '', 'cell'),
(239, 'Science', 'The process by which green plants make their food using sunlight is called __________.', '', '', '', '', 'Photosynthesis'),
(240, 'Science', 'In the periodic table, elements are arranged in order of increasing __________.', '', '', '', '', 'atomic number'),
(241, 'Science', 'The organ responsible for pumping blood throughout the body is the __________.', '', '', '', '', 'heart'),
(242, 'Science', 'The phenomenon of splitting white light into its constituent colours is called __________.', '', '', '', '', 'dispersion'),
(243, 'Science', 'DNA stands for __________.', '', '', '', '', 'Deoxyribonucleic acid'),
(244, 'Science', 'The gas released during photosynthesis is __________.', '', '', '', '', 'oxygen'),
(245, 'Science', 'The boiling point of water at standard atmospheric pressure is __________ °C.', '', '', '', '', '100'),
(247, 'Maths', 'A rectangle has a length of 12 cm and a width of 8 cm. Which of the following are correct properties of this rectangle?', 'The area is 96cm²', 'The perimeter is 40cm', 'The diagonal is 10cm', 'The rectangle is a square', 'A,B'),
(248, 'Chemistry', 'Which of the following are noble gases?', 'Helium', 'Oxygen', 'Neon', 'Argon', 'A,C,D');

-- --------------------------------------------------------

--
-- Table structure for table `user_credentials`
--

CREATE TABLE `user_credentials` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_credentials`
--

INSERT INTO `user_credentials` (`user_id`, `user_name`, `user_email`, `user_password`) VALUES
(38, 'shireliiiiiii', 'iamsurelyshireli@gmail.com', 'qwert123456'),
(39, 'QWEio', 'johnqaqa@gmail.com', 'qwrqwer2134'),
(40, 'sdfg', 'johnqaqa@gmail.com', 'qwert12345'),
(41, 'boboiboy', 'powerranger@gmail.com', 'qwerty123456'),
(42, 'admin', 'shadowgarden@gmail.com', 'Hokage04'),
(43, 'admin', 'shadowgarden@gmail.com', 'Hokage04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dbanswers`
--
ALTER TABLE `dbanswers`
  ADD PRIMARY KEY (`answer_id`);

--
-- Indexes for table `dbanswersnull`
--
ALTER TABLE `dbanswersnull`
  ADD PRIMARY KEY (`answer_id`);

--
-- Indexes for table `dbquestions`
--
ALTER TABLE `dbquestions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_credentials`
--
ALTER TABLE `user_credentials`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dbanswers`
--
ALTER TABLE `dbanswers`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `dbanswersnull`
--
ALTER TABLE `dbanswersnull`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `dbquestions`
--
ALTER TABLE `dbquestions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;

--
-- AUTO_INCREMENT for table `user_credentials`
--
ALTER TABLE `user_credentials`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
