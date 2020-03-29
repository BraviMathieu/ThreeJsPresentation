-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  Dim 29 mars 2020 à 22:47
-- Version du serveur :  10.1.38-MariaDB
-- Version de PHP :  7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `threejs`
--

-- --------------------------------------------------------

--
-- Structure de la table `presentations`
--

CREATE TABLE `presentations` (
  `id` smallint(6) NOT NULL,
  `user_id` tinyint(4) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` blob
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `presentations`
--

INSERT INTO `presentations` (`id`, `user_id`, `title`, `content`) VALUES
(1, 1, 'Presentation 1', '');

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

CREATE TABLE `questions` (
  `id` tinyint(4) DEFAULT NULL,
  `title` varchar(59) DEFAULT NULL,
  `content` varchar(184) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `questions`
--

INSERT INTO `questions` (`id`, `title`, `content`) VALUES
(1, 'dignissim pharetra. Nam ac nulla.', 'lorem, sit amet ultricies sem magna nec quam. Curabitur vel lectus.'),
(2, 'Integer eu lacus. Quisque imperdiet, erat nonummy ultricies', 'lacus. Quisque imperdiet, erat nonummy ultricies ornare, elit elit fermentum risus, at fringilla purus mauris'),
(3, 'pretium aliquet, metus urna convallis erat,', 'orci, in consequat enim diam vel arcu. Curabitur ut odio vel est tempor bibendum. Donec felis orci, adipiscing non, luctus sit amet, faucibus ut, nulla.'),
(4, 'enim diam vel arcu. Curabitur ut', 'in consequat enim diam vel arcu. Curabitur ut odio vel est tempor bibendum.'),
(5, 'non leo. Vivamus', 'ligula. Nullam feugiat placerat velit. Quisque varius. Nam porttitor scelerisque neque. Nullam nisl. Maecenas malesuada fringilla est. Mauris eu turpis. Nulla aliquet. Proin velit. Sed'),
(6, 'hendrerit. Donec porttitor', 'mauris sagittis placerat. Cras dictum ultricies ligula. Nullam enim. Sed nulla ante, iaculis nec, eleifend'),
(7, 'nisi. Aenean eget metus.', 'luctus sit amet, faucibus ut, nulla. Cras eu'),
(8, 'ipsum primis in faucibus orci luctus', 'libero. Proin sed turpis nec mauris blandit mattis. Cras eget nisi dictum augue malesuada malesuada. Integer id magna et ipsum cursus vestibulum. Mauris magna. Duis'),
(9, 'odio vel est tempor bibendum.', 'rhoncus. Nullam velit dui, semper et, lacinia vitae, sodales at, velit. Pellentesque ultricies dignissim lacus.'),
(10, 'enim, gravida sit amet, dapibus id, blandit', 'nec, euismod in, dolor. Fusce feugiat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aliquam auctor, velit');

-- --------------------------------------------------------

--
-- Structure de la table `tickets`
--

CREATE TABLE `tickets` (
  `id` smallint(6) DEFAULT NULL,
  `user_id` tinyint(4) DEFAULT NULL,
  `title` varchar(62) DEFAULT NULL,
  `description` varchar(181) DEFAULT NULL,
  `level` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `tickets`
--

INSERT INTO `tickets` (`id`, `user_id`, `title`, `description`, `level`) VALUES
(1, 11, 'lacus. Aliquam rutrum lorem', 'mauris. Suspendisse aliquet molestie tellus. Aenean egestas hendrerit neque. In ornare sagittis felis. Donec tempor, est ac mattis semper, dui lectus rutrum urna,', 1),
(2, 3, 'nec tempus mauris erat eget ipsum. Suspendisse', 'Integer vitae nibh. Donec est mauris, rhoncus', 9),
(3, 10, 'erat. Sed nunc est, mollis non, cursus', 'magna a neque. Nullam ut nisi a odio semper cursus. Integer mollis. Integer tincidunt', 1),
(4, 6, 'lorem lorem, luctus ut, pellentesque eget,', 'Nullam velit dui, semper et, lacinia vitae, sodales at, velit. Pellentesque ultricies dignissim lacus. Aliquam rutrum', 9),
(5, 7, 'non, cursus non, egestas a, dui. Cras', 'et nunc. Quisque ornare tortor at risus. Nunc ac sem ut dolor dapibus gravida. Aliquam tincidunt, nunc ac mattis ornare, lectus', 8),
(6, 3, 'neque. Sed eget lacus. Mauris non dui', 'tempus risus. Donec egestas. Duis ac arcu. Nunc mauris. Morbi non sapien molestie orci', 4),
(7, 1, 'nec ante. Maecenas', 'et magnis dis parturient montes, nascetur ridiculus mus. Donec dignissim magna a tortor. Nunc commodo auctor velit. Aliquam nisl. Nulla eu neque', 2),
(8, 2, 'felis ullamcorper viverra. Maecenas iaculis aliquet', 'posuere cubilia Curae; Phasellus ornare. Fusce mollis. Duis', 9),
(9, 4, 'Pellentesque ultricies dignissim lacus. Aliquam rutrum', 'a mi fringilla mi lacinia mattis. Integer eu lacus.', 4),
(10, 4, 'rhoncus. Proin nisl sem,', 'tellus, imperdiet non, vestibulum nec, euismod in, dolor. Fusce feugiat. Lorem ipsum dolor sit', 9),
(11, 11, 'ut mi. Duis risus odio, auctor vitae,', 'consectetuer adipiscing elit. Etiam laoreet, libero et tristique pellentesque, tellus sem mollis dui, in sodales elit erat vitae risus. Duis a mi fringilla', 5),
(12, 11, 'nonummy. Fusce fermentum fermentum arcu. Vestibulum', 'lorem lorem, luctus ut, pellentesque eget, dictum placerat, augue. Sed molestie. Sed id risus quis diam luctus', 1),
(13, 8, 'nunc risus varius orci,', 'massa. Mauris vestibulum, neque sed dictum eleifend,', 8),
(14, 6, 'dignissim magna a tortor. Nunc commodo', 'fermentum convallis ligula. Donec luctus aliquet odio. Etiam ligula tortor, dictum eu, placerat eget, venenatis a, magna. Lorem ipsum dolor sit amet, consectetuer', 9),
(15, 4, 'eget, volutpat ornare, facilisis', 'blandit congue. In scelerisque scelerisque dui. Suspendisse ac metus vitae velit egestas lacinia.', 7),
(16, 3, 'magna. Sed eu eros. Nam consequat', 'sem elit, pharetra ut, pharetra sed, hendrerit a, arcu. Sed et libero. Proin mi. Aliquam gravida', 0),
(17, 4, 'mattis. Integer eu lacus. Quisque imperdiet, erat', 'ut, pellentesque eget, dictum placerat, augue. Sed molestie. Sed id risus quis diam luctus lobortis. Class', 7),
(18, 7, 'velit in aliquet lobortis, nisi', 'eget lacus. Mauris non dui nec urna suscipit nonummy. Fusce fermentum fermentum arcu. Vestibulum ante', 2),
(19, 11, 'diam nunc, ullamcorper eu, euismod ac,', 'egestas. Fusce aliquet magna a neque. Nullam ut nisi a odio semper cursus. Integer mollis. Integer tincidunt aliquam arcu. Aliquam', 5),
(20, 12, 'quis urna. Nunc quis arcu vel quam', 'rutrum lorem ac risus. Morbi metus. Vivamus euismod urna. Nullam lobortis quam a felis ullamcorper viverra. Maecenas iaculis aliquet diam. Sed diam lorem, auctor quis,', 9),
(21, 15, 'Aliquam fringilla cursus purus.', 'eget nisi dictum augue malesuada malesuada. Integer id magna et', 1),
(22, 14, 'mi tempor lorem, eget mollis lectus pede', 'vel, convallis in, cursus et, eros. Proin', 1),
(23, 3, 'ligula. Aliquam erat volutpat.', 'dolor dapibus gravida. Aliquam tincidunt, nunc ac mattis ornare, lectus ante dictum', 4),
(24, 14, 'gravida sit amet, dapibus id, blandit at, nisi.', 'tempor erat neque non quam. Pellentesque habitant morbi tristique senectus et netus et', 1),
(25, 6, 'orci. Ut semper pretium', 'sed pede nec ante blandit viverra. Donec tempus, lorem fringilla ornare placerat, orci lacus vestibulum lorem, sit amet ultricies sem magna nec quam.', 2),
(26, 2, 'eget, volutpat ornare, facilisis', 'vitae sodales nisi magna sed dui. Fusce aliquam, enim', 6),
(27, 8, 'risus. Nunc ac sem ut dolor dapibus', 'quam dignissim pharetra. Nam ac nulla. In tincidunt congue turpis. In condimentum. Donec at arcu. Vestibulum ante ipsum primis', 0),
(28, 5, 'dolor. Nulla semper tellus id', 'diam. Proin dolor. Nulla semper tellus id nunc interdum feugiat. Sed nec metus facilisis lorem tristique aliquet. Phasellus fermentum convallis ligula. Donec luctus aliquet', 8),
(29, 6, 'commodo tincidunt nibh. Phasellus nulla. Integer vulputate,', 'Aliquam ultrices iaculis odio. Nam interdum enim non nisi. Aenean eget metus. In nec orci.', 0),
(30, 16, 'accumsan sed, facilisis', 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean eget magna. Suspendisse tristique neque venenatis lacus. Etiam bibendum fermentum', 5),
(31, 9, 'Quisque varius. Nam porttitor scelerisque neque. Nullam', 'enim, sit amet ornare lectus justo eu arcu. Morbi sit amet massa. Quisque porttitor eros nec tellus. Nunc lectus pede, ultrices a, auctor', 9),
(32, 12, 'ac libero nec ligula consectetuer', 'Mauris vestibulum, neque sed dictum eleifend, nunc risus varius orci, in consequat enim diam vel arcu.', 4),
(33, 11, 'Nulla tincidunt, neque vitae', 'Proin mi. Aliquam gravida mauris ut mi. Duis risus odio,', 0),
(34, 1, 'aliquet, sem ut', 'Sed nec metus facilisis lorem tristique aliquet. Phasellus', 3),
(35, 5, 'Duis ac arcu. Nunc mauris. Morbi', 'ut quam vel sapien imperdiet ornare. In faucibus. Morbi vehicula. Pellentesque tincidunt tempus risus. Donec egestas. Duis ac', 0),
(36, 3, 'ultrices posuere cubilia Curae; Phasellus', 'sed consequat auctor, nunc nulla vulputate dui, nec tempus mauris erat eget ipsum. Suspendisse sagittis. Nullam vitae diam. Proin dolor.', 8),
(37, 4, 'fames ac turpis egestas. Fusce aliquet', 'nonummy ultricies ornare, elit elit fermentum risus, at', 8),
(38, 8, 'dolor elit, pellentesque', 'lacus vestibulum lorem, sit amet ultricies sem magna nec quam. Curabitur vel lectus. Cum sociis natoque penatibus', 4),
(39, 2, 'risus. Donec nibh enim, gravida sit amet, dapibus', 'in, dolor. Fusce feugiat. Lorem ipsum dolor sit', 9),
(40, 2, 'mus. Proin vel', 'turpis. Nulla aliquet. Proin velit. Sed malesuada', 9),
(41, 16, 'metus sit amet', 'dolor. Donec fringilla. Donec feugiat metus sit amet ante. Vivamus non lorem vitae odio sagittis semper. Nam tempor diam dictum sapien. Aenean massa.', 1),
(42, 14, 'rutrum, justo. Praesent luctus. Curabitur egestas nunc', 'diam dictum sapien. Aenean massa. Integer vitae nibh. Donec est mauris, rhoncus', 3),
(43, 8, 'quis, pede. Suspendisse dui. Fusce diam', 'sit amet ultricies sem magna nec quam. Curabitur vel lectus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', 9),
(44, 2, 'pellentesque eget, dictum placerat,', 'tristique ac, eleifend vitae, erat. Vivamus nisi. Mauris nulla. Integer', 6),
(45, 6, 'parturient montes, nascetur ridiculus mus. Proin vel', 'Aenean eget magna. Suspendisse tristique neque venenatis lacus. Etiam bibendum fermentum metus. Aenean sed pede nec ante blandit', 1),
(46, 9, 'felis, adipiscing fringilla, porttitor vulputate,', 'metus. In nec orci. Donec nibh. Quisque nonummy ipsum non arcu. Vivamus sit amet risus. Donec egestas. Aliquam nec', 5),
(47, 14, 'urna. Ut tincidunt vehicula risus. Nulla', 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Phasellus ornare. Fusce mollis. Duis sit amet diam eu dolor egestas', 3),
(48, 12, 'ut, pharetra sed, hendrerit', 'a nunc. In at pede. Cras vulputate velit', 8),
(49, 12, 'egestas hendrerit neque. In ornare sagittis felis.', 'sem elit, pharetra ut, pharetra sed, hendrerit a, arcu.', 7),
(50, 1, 'et tristique pellentesque, tellus sem mollis dui, in', 'Aenean massa. Integer vitae nibh. Donec est mauris, rhoncus id, mollis nec, cursus a, enim. Suspendisse aliquet, sem ut cursus luctus, ipsum', 4),
(51, 16, 'semper cursus. Integer mollis. Integer tincidunt aliquam arcu.', 'Mauris vel turpis. Aliquam adipiscing lobortis risus. In mi pede, nonummy ut, molestie in, tempus eu, ligula. Aenean euismod mauris eu elit. Nulla', 6),
(52, 11, 'vehicula risus. Nulla eget metus eu', 'porttitor interdum. Sed auctor odio a purus. Duis elementum, dui quis accumsan convallis, ante lectus convallis est,', 7),
(53, 1, 'lobortis quis, pede.', 'dignissim lacus. Aliquam rutrum lorem ac risus. Morbi metus. Vivamus euismod urna. Nullam lobortis quam a felis ullamcorper viverra. Maecenas iaculis aliquet', 1),
(54, 6, 'est tempor bibendum. Donec', 'amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien,', 8),
(55, 3, 'Curabitur vel lectus. Cum sociis natoque penatibus', 'sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec dignissim magna a tortor. Nunc commodo', 8),
(56, 13, 'ligula elit, pretium et, rutrum non, hendrerit', 'arcu imperdiet ullamcorper. Duis at lacus. Quisque purus', 6),
(57, 4, 'Fusce mollis. Duis sit', 'vulputate ullamcorper magna. Sed eu eros. Nam', 3),
(58, 15, 'ut erat. Sed nunc est,', 'dictum eu, placerat eget, venenatis a, magna. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Etiam laoreet, libero et tristique pellentesque, tellus', 9),
(59, 5, 'sed consequat auctor,', 'felis purus ac tellus. Suspendisse sed dolor. Fusce mi lorem, vehicula et, rutrum eu, ultrices sit', 2),
(60, 5, 'ornare lectus justo eu arcu.', 'pharetra nibh. Aliquam ornare, libero at auctor ullamcorper, nisl arcu iaculis enim, sit amet ornare lectus justo eu arcu. Morbi sit amet massa. Quisque', 7),
(61, 9, 'Vivamus molestie dapibus ligula. Aliquam erat volutpat. Nulla', 'Vivamus sit amet risus. Donec egestas. Aliquam nec enim. Nunc ut erat. Sed nunc est, mollis non, cursus non, egestas a, dui. Cras', 8),
(62, 6, 'lorem lorem, luctus ut, pellentesque eget,', 'quis accumsan convallis, ante lectus convallis est, vitae sodales nisi magna sed dui. Fusce aliquam, enim nec tempus scelerisque,', 8),
(63, 4, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', 'condimentum. Donec at arcu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec tincidunt. Donec vitae erat vel pede blandit', 0),
(64, 13, 'dolor vitae dolor. Donec', 'cursus. Integer mollis. Integer tincidunt aliquam arcu. Aliquam ultrices iaculis odio. Nam interdum enim non nisi. Aenean eget metus. In nec orci.', 1),
(65, 10, 'parturient montes, nascetur', 'eu dui. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean eget magna. Suspendisse tristique neque', 9),
(66, 16, 'dolor vitae dolor. Donec fringilla.', 'vehicula aliquet libero. Integer in magna. Phasellus dolor elit, pellentesque a, facilisis non, bibendum sed, est.', 8),
(67, 3, 'ornare, lectus ante dictum mi,', 'tincidunt, neque vitae semper egestas, urna justo faucibus lectus, a sollicitudin orci sem eget massa. Suspendisse eleifend. Cras', 0),
(68, 4, 'Curabitur sed tortor.', 'accumsan laoreet ipsum. Curabitur consequat, lectus sit amet luctus vulputate, nisi sem semper erat, in consectetuer', 6),
(69, 11, 'vel, faucibus id, libero.', 'parturient montes, nascetur ridiculus mus. Donec dignissim', 0),
(70, 7, 'ac mi eleifend egestas. Sed', 'non enim. Mauris quis turpis vitae purus gravida sagittis. Duis gravida. Praesent eu nulla at sem molestie sodales. Mauris blandit enim consequat purus. Maecenas', 3),
(71, 8, 'tellus lorem eu metus.', 'eu enim. Etiam imperdiet dictum magna. Ut tincidunt orci quis', 9),
(72, 9, 'facilisis non, bibendum sed, est. Nunc laoreet lectus', 'arcu. Sed eu nibh vulputate mauris sagittis', 9),
(73, 4, 'diam. Pellentesque habitant morbi tristique', 'ut, pellentesque eget, dictum placerat, augue. Sed molestie. Sed id risus quis diam luctus lobortis.', 3),
(74, 5, 'ac sem ut dolor dapibus gravida.', 'porttitor interdum. Sed auctor odio a purus. Duis elementum, dui quis accumsan convallis, ante', 3),
(75, 14, 'non quam. Pellentesque habitant morbi tristique', 'hendrerit consectetuer, cursus et, magna. Praesent interdum ligula eu enim. Etiam imperdiet dictum magna. Ut tincidunt orci quis lectus. Nullam suscipit, est ac facilisis facilisis,', 5),
(76, 13, 'Etiam gravida molestie arcu. Sed', 'amet, consectetuer adipiscing elit. Etiam laoreet, libero et tristique pellentesque, tellus sem mollis dui, in', 1),
(77, 6, 'natoque penatibus et magnis dis parturient montes,', 'lacus, varius et, euismod et, commodo at, libero. Morbi accumsan laoreet ipsum. Curabitur', 3),
(78, 3, 'Proin vel nisl. Quisque', 'ultricies adipiscing, enim mi tempor lorem, eget mollis lectus', 9),
(79, 4, 'sit amet, risus. Donec nibh', 'dapibus quam quis diam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Fusce aliquet magna a neque.', 5),
(80, 15, 'massa rutrum magna. Cras convallis convallis', 'fringilla. Donec feugiat metus sit amet ante. Vivamus non lorem vitae', 9),
(81, 1, 'vulputate, lacus. Cras', 'Integer vulputate, risus a ultricies adipiscing, enim mi tempor lorem, eget mollis lectus pede et risus. Quisque libero lacus, varius et, euismod et, commodo', 1),
(82, 14, 'ultricies ornare, elit elit fermentum risus, at fringilla', 'Curabitur vel lectus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec dignissim magna a tortor. Nunc commodo auctor velit.', 3),
(83, 6, 'vestibulum massa rutrum magna. Cras convallis convallis', 'lectus quis massa. Mauris vestibulum, neque sed dictum eleifend, nunc risus varius orci, in consequat', 2),
(84, 8, 'malesuada id, erat. Etiam vestibulum massa rutrum magna.', 'sapien imperdiet ornare. In faucibus. Morbi vehicula. Pellentesque tincidunt tempus risus. Donec egestas. Duis ac arcu. Nunc mauris. Morbi non sapien', 1),
(85, 15, 'augue scelerisque mollis. Phasellus libero mauris, aliquam', 'eu turpis. Nulla aliquet. Proin velit. Sed malesuada augue ut lacus. Nulla tincidunt, neque vitae semper egestas, urna justo faucibus', 7),
(86, 7, 'Nam interdum enim non nisi. Aenean eget', 'ac mi eleifend egestas. Sed pharetra, felis eget varius ultrices, mauris ipsum porta elit, a feugiat tellus lorem eu metus. In lorem. Donec elementum, lorem', 2),
(87, 13, 'tincidunt aliquam arcu. Aliquam ultrices', 'purus gravida sagittis. Duis gravida. Praesent eu nulla at sem molestie sodales.', 3),
(88, 3, 'Vivamus nisi. Mauris nulla. Integer', 'neque. Nullam ut nisi a odio semper cursus. Integer mollis. Integer tincidunt aliquam arcu. Aliquam ultrices iaculis odio. Nam', 7),
(89, 3, 'vitae odio sagittis semper. Nam tempor diam', 'Aliquam vulputate ullamcorper magna. Sed eu eros. Nam consequat dolor vitae dolor. Donec fringilla. Donec', 3),
(90, 7, 'magna. Nam ligula elit, pretium et, rutrum non,', 'purus. Nullam scelerisque neque sed sem egestas blandit. Nam nulla magna, malesuada vel, convallis in, cursus et, eros. Proin ultrices. Duis', 5),
(91, 5, 'mi lorem, vehicula et, rutrum eu,', 'ligula consectetuer rhoncus. Nullam velit dui, semper et, lacinia vitae, sodales at, velit. Pellentesque ultricies dignissim lacus. Aliquam', 1),
(92, 12, 'dictum eleifend, nunc risus varius orci, in', 'tortor, dictum eu, placerat eget, venenatis a, magna.', 4),
(93, 7, 'at arcu. Vestibulum ante ipsum primis', 'at sem molestie sodales. Mauris blandit enim consequat purus. Maecenas libero est, congue a,', 4),
(94, 16, 'quam quis diam. Pellentesque habitant morbi tristique senectus', 'mollis non, cursus non, egestas a, dui. Cras pellentesque. Sed dictum. Proin eget', 7),
(95, 8, 'penatibus et magnis dis', 'lobortis augue scelerisque mollis. Phasellus libero mauris, aliquam eu, accumsan', 2),
(96, 12, 'Praesent eu nulla at', 'vitae purus gravida sagittis. Duis gravida. Praesent eu nulla at sem molestie sodales. Mauris blandit', 2),
(97, 4, 'Suspendisse tristique neque venenatis lacus. Etiam bibendum', 'molestie sodales. Mauris blandit enim consequat purus. Maecenas libero est, congue a, aliquet vel,', 5),
(98, 13, 'ut quam vel', 'diam dictum sapien. Aenean massa. Integer vitae nibh. Donec est mauris, rhoncus id, mollis nec, cursus', 3),
(99, 10, 'eu, accumsan sed, facilisis vitae, orci.', 'imperdiet ornare. In faucibus. Morbi vehicula. Pellentesque tincidunt tempus risus. Donec egestas. Duis ac arcu. Nunc mauris. Morbi non sapien molestie orci tincidunt adipiscing.', 3),
(100, 6, 'vel, vulputate eu,', 'Nam tempor diam dictum sapien. Aenean massa. Integer vitae nibh. Donec est mauris, rhoncus id, mollis nec, cursus a, enim. Suspendisse aliquet, sem ut cursus', 8);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` tinyint(4) DEFAULT NULL,
  `name` varchar(8) DEFAULT NULL,
  `password` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'Bertha', 'RZ'),
(3, 'Scott', 'XL'),
(4, 'Patrick', 'BB'),
(5, 'Odysseus', 'JG'),
(6, 'Erin', 'OM'),
(7, 'Palmer', 'IP'),
(8, 'TaShya', 'FH'),
(9, 'Noelani', 'TG'),
(10, 'Eric', 'RE'),
(11, 'Maggy', 'DN'),
(12, 'Mohammad', 'YL'),
(13, 'Olympia', 'PY'),
(14, 'Denton', 'II'),
(15, 'Nadine', 'AP'),
(16, 'Ocean', 'KO');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `presentations`
--
ALTER TABLE `presentations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `presentations`
--
ALTER TABLE `presentations`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
