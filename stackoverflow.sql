-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : sam. 12 mars 2022 à 03:04
-- Version du serveur :  8.0.28-0ubuntu0.20.04.3
-- Version de PHP : 8.1.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `stackoverflow`
--

-- --------------------------------------------------------

--
-- Structure de la table `answers`
--

CREATE TABLE `answers` (
  `id` int NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'published',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int NOT NULL,
  `question_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `answers`
--

INSERT INTO `answers` (`id`, `content`, `status`, `created_at`, `updated_at`, `user_id`, `question_id`) VALUES
(51, 'If you are looking to print 2 custom strings, you may be interesting in formatting your string:\n\nstring1 = \'words\'\nstring2 = \'some more words\'', 'published', '2022-03-12 01:50:56', NULL, 8, 18),
(52, 'If you are looking to print 2 custom strings, you may be interesting in formatting your string:\n\nstring1 = \'words\'\nstring2 = \'some more words\'\n\nprint(f\'{string1}, {string2}\')\nOutputs\n\nwords, some more words\nAs a practical solution, it depends on how and why your\'re using it. Formatting strings is very common for reporting variables back to the user, but you wouldn\'t use it if was more sensible to use two print statements.', 'published', '2022-03-12 01:51:21', NULL, 8, 18),
(53, '76\n\nYour Customer class has to be discovered by CDI as a bean. For that you have two options:\n\nPut a bean defining annotation on it. As @Model is a stereotype it\'s why it does the trick. A qualifier like @Named is not a bean defining annotation, reason why it doesn\'t work\n\nChange the bean discovery mode in your bean archive from the default \"annotated\" to \"all\" by adding a beans.xml file in your jar.\n\nKeep in mind that @Named has only one usage : expose your bean to the UI. Other usages are for bad practice or compatibility with legacy framework.', 'published', '2022-03-12 01:53:49', NULL, 8, 19),
(54, 'it\'s also a good thing to make sure you have the right import\n\nI had an issue like that and I found out that the bean was using\n\n    javax.faces.view.ViewScoped;\n                 ^\ninstead of\n\n    javax.faces.bean.ViewScoped;\n                 ^', 'published', '2022-03-12 01:54:14', NULL, 8, 19),
(55, 'Here\'s a simple function using a few php array functions.\n\nfunction dupeElement(int $position, int $count, array $orig): array {\n    \n    $mid = array_fill(0, $count, $orig[$position]);\n    $end = array_slice($orig, $position + 1);\n    array_splice($orig, ++$position);\n    \n    return array_merge($orig, $mid, $end);\n}', 'published', '2022-03-12 01:56:19', NULL, 8, 20),
(56, 'Yes!\n\nThe double loop:\n\nfor _ in range(len(a)):\n    for _ in range(len(a)):\n        do_something\nhas a time complexity of O(n) * O(n) = O(n²) because each loop runs until n.\n\nThe single loop:\n\ni = 0\nwhile i < len(a) * len(a):\n    do_something\n    i += 1\nhas a time complexity of O(n * n) = O(n²), because the loop runs until i = n * n = n².', 'published', '2022-03-12 01:58:44', NULL, 8, 21);

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

CREATE TABLE `questions` (
  `id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'published',
  `technology` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `questions`
--

INSERT INTO `questions` (`id`, `title`, `content`, `status`, `technology`, `created_at`, `updated_at`, `user_id`) VALUES
(18, 'Python - Is there a way to have two separate print functions on one line', 'I was wondering if it was possible to have two print() functions on the same line. I know that this is impractical but I just wanted to use print as an example. ', 'published', 'Python', '2022-03-12 01:45:15', NULL, 8),
(19, 'WELD-001408: Unsatisfied dependencies for type Customer with qualifiers @Default', 'I\'m a Java EE-newbie. I want to test JSF and therefore made a simple program but can not deploy it. I get the following error message:\r\n\r\ncannot Deploy onlineshop-war\r\ndeploy is failing=Error occurred during deployment: Exception while loading the app : CDI deployment failure:WELD-001408: Unsatisfied dependencies for type Customer with qualifiers @Default\r\nat injection point [BackedAnnotatedField] @Inject private de.java2enterprise.onlineshop.RegisterController.customer\r\nat de.java2enterprise.onlineshop.RegisterController.customer(RegisterController.java:0)\r\n. Please see server.log for more details.', 'published', 'JSF', '2022-03-12 01:53:13', NULL, 12),
(20, 'How to duplicate an element in a php array after it current position', 'Hi I was wondering how I could duplicate an element in a php array x times. In such a way that the clones come after the original. If this is your original array.\r\n/n\r\narray(\r\n    [0]=>\'Clone me please\',\r\n    [1]=>\'I m here for decoration\'\r\n)\r\n\r\nResulting in :\r\n\r\narray(\r\n   [0]=>\'Clone me please\',\r\n   [1]=>\'Clone me please\',\r\n   [2]=>\'Clone me please\',\r\n   [3]=>\'I m here for decoration\'\r\n)\r\nThanks in advance.', 'published', 'php', '2022-03-12 01:55:51', NULL, 8),
(21, 'Does time complexity change when two nested loops are re-written into a single loop?', 'Is the time complexity of nested for, while, and if statements the same? Suppose a is given as an array of length n.\r\n\r\nfor _ in range(len(a)):\r\n    for _ in range(len(a)):\r\n        do_something\r\nThe for statement above will be O(n²).\r\n\r\ni = 0\r\nwhile i < len(a) * len(a):\r\n    do_something\r\n    i += 1\r\nAt first glance, the above loop can be thought of as O(n), but in the end I think that it is also O(n²).\r\n\r\nAm I right?', 'published', 'PYTHON', '2022-03-12 01:58:18', NULL, 12),
(22, 'Filter a dictionary of lists', 'I have a dictionary of the form:\r\n\r\n{\"level\": [1, 2, 3],\r\n \"conf\": [-1, 1, 2],\r\n \"text\": [\"here\", \"hel\", \"llo\"]}\r\nI want to filter the lists to remove every item at index i where \"conf\" is not >0.\r\n\r\nSo for the above dict, the output should be this:\r\n\r\n{\"level\": [2, 3],\r\n \"conf\": [1, 2],\r\n \"text\": [\"hel\", \"llo\"]}\r\nas the first value of conf was not > 0.\r\nI have tried something like this:\r\n\r\nnew_dict = {i: [a for a in j if a >= min_conf] for i, j in my_dict.items()}\r\nBut that would work just for one key.', 'published', 'PYTHON', '2022-03-12 01:59:56', NULL, 8),
(23, 'Create a vector of pairs from a single vector in C++', 'I have a single even-sized vector that I want to transform into a vector of pairs where each pair contains always two elements. I know that I can do this using simple loops but I was wondering if there is a nice standard-library tool for this? It can be assumed that the original vector always contains an even amount of elements.\r\n\r\nExample:\r\n\r\nvector<int> origin {1, 2, 3, 4, 5, 6, 7, 8};\r\n\r\nvector<pair<int, int>> goal { {1, 2}, {3, 4}, {5, 6}, {7, 8} };', 'published', 'C++', '2022-03-12 02:00:59', NULL, 12),
(24, 'Array.push() replacing value instead of adding it to the array in javascript (reactJs)', 'The Array doesn\'t grow, it either stays empty or keeps updating the same object instead of adding a new object every time.', 'published', 'Javascript', '2022-03-12 02:02:32', NULL, 8);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `nickname` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nickname`, `email`, `password`, `gender`, `status`, `created_at`, `updated_at`) VALUES
(8, 'nejma', 'guermachenejma@gmail.com', '$2y$10$F4jwH.0zc/s4ExaVA78zK.LWvVDcEdDX3P3hlC/VWQfdOJXjLvWDW', 'Woman', 1, '2022-11-03 17:38:28', NULL),
(12, 'Vincent', 'vincentsureau@gmail.com', '$2y$10$Au.l7WYlzPAca/dMes1Ks.IsZHlMj3QjGJVDJvDgqPE6gBPxd7eGG', 'Man', 0, '2022-12-03 01:46:50', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `answers_ibfk_1` (`user_id`),
  ADD KEY `answers_ibfk_2` (`question_id`);

--
-- Index pour la table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_ibfk_1` (`user_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT pour la table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `answers_ibfk_2` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
