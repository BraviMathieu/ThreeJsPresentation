-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 14 mai 2020 à 15:09
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
-- Structure de la table `configurations`
--

CREATE TABLE `configurations` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL DEFAULT 'default',
  `night` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `configurations`
--

INSERT INTO `configurations` (`id`, `user_id`, `code`, `value`, `night`) VALUES
(1, 1, 'EDITOR_THEME', '3024-day', 0);

-- --------------------------------------------------------

--
-- Structure de la table `presentations`
--

CREATE TABLE `presentations` (
  `id` smallint(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `contents` mediumtext NOT NULL,
  `thumbcontents` text NOT NULL,
  `user_id` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `presentations`
--

INSERT INTO `presentations` (`id`, `title`, `description`, `contents`, `thumbcontents`, `user_id`) VALUES
(44, 'XHRA', 'XHRA', '<div class=\"impress-slide impress-slide-element\" id=\"impress_slide_2005\" style=\"z-index: -301;\"><div class=\"slidelement slidelementh1 ui-draggable ui-draggable-handle movecursor\" id=\"slidelement_3455\" data-parent=\"impress_slide_2005\" data-type=\"h2\" style=\"width: auto; height: 60px; position: absolute; left: 429px; top: 18px;\" contenteditable=\"true\"> Titre d\'exemple</div><div class=\"slidelement slidelementh3 ui-draggable ui-draggable-handle movecursor\" id=\"slidelement_3455\" data-parent=\"impress_slide_2005\" data-type=\"h3\" style=\"position: absolute; width: auto; height: 40px; left: 63px; top: 237px;\"> Paragraphe d\'exemple </div></div><div class=\"impress-slide impress-slide-element\" id=\"impress_slide_8312\" style=\"z-index: -1165;\"><div class=\"slidelement slidelementh1 ui-draggable ui-draggable-handle movecursor\" id=\"slidelement_9595\" data-parent=\"impress_slide_8312\" data-type=\"h2\" style=\"width: auto; height: 60px; position: absolute; left: 103px; top: 25px; color: rgb(231, 0, 0);\" contenteditable=\"true\"> Titre d\'exemple</div><div class=\"slidelement slidelementh3 ui-draggable ui-draggable-handle movecursor\" id=\"slidelement_9595\" data-parent=\"impress_slide_8312\" data-type=\"h3\" style=\"position: absolute; width: auto; height: 40px; left: 489px; top: 187px;\"> Paragraphe d\'exemple </div></div><div class=\"impress-slide impress-slide-element\" id=\"impress_slide_1416\" style=\"z-index: -742;\"><div class=\"slidelement slidelementh1 ui-draggable ui-draggable-handle movecursor\" id=\"slidelement_4803\" data-parent=\"impress_slide_1416\" data-type=\"h2\" style=\"width: auto; height: 60px; position: absolute; left: 5px; top: 11px;\" contenteditable=\"true\"> Titre d\'exemple</div><div class=\"slidelement slidelementh3 ui-draggable ui-draggable-handle movecursor\" id=\"slidelement_4803\" data-parent=\"impress_slide_1416\" data-type=\"h3\" style=\"position: absolute; width: auto; height: 40px; left: 533px; top: 221px;\"> Paragraphe d\'exemple </div><table class=\"table slidelement ui-draggable ui-draggable-handle movecursor\" style=\"width: auto; position: relative; left: -197.917px; top: 228px;\" id=\"slidelement_4138\" align=\"center\"><tbody id=\"tableau-body\"><tr><td contenteditable=\"true\">Case</td><td contenteditable=\"true\">EZECase</td><td contenteditable=\"true\">CSQDase</td><td contenteditable=\"true\">CaseQSD</td><td contenteditable=\"true\">Case</td></tr><tr><td contenteditable=\"true\">DonnÃ©e</td><td contenteditable=\"true\">AAAA</td><td contenteditable=\"true\">ZZZ</td><td contenteditable=\"true\">SSSQDQSDQSD</td><td contenteditable=\"true\">WXXCWXCWX</td></tr><tr><td contenteditable=\"true\">Case</td><td contenteditable=\"true\">Case</td><td contenteditable=\"true\">CaseDS</td><td contenteditable=\"true\">CaseD</td><td contenteditable=\"true\">XWCWXCWXC</td></tr><tr><td contenteditable=\"true\">Case</td><td contenteditable=\"true\">Case</td><td contenteditable=\"true\">CaseQQSD</td><td contenteditable=\"true\">CaseD</td><td contenteditable=\"true\">CXCXC</td></tr></tbody></table></div><div class=\"impress-slide impress-slide-element\" id=\"impress_slide_9744\" style=\"z-index: -676;\"><div class=\"slidelement slidelementh1 ui-draggable ui-draggable-handle movecursor\" id=\"slidelement_9735\" data-parent=\"impress_slide_9744\" data-type=\"h2\" style=\"width: auto; height: 60px; position: absolute; left: 43px; top: 6px;\" contenteditable=\"true\"> Titre d\'exemple</div><div class=\"slidelement slidelementh3 ui-draggable ui-draggable-handle movecursor\" id=\"slidelement_9735\" data-parent=\"impress_slide_9744\" data-type=\"h3\" style=\"position: absolute; width: auto; height: 40px; left: 33px; top: 98px;\"> Paragraphe d\'exemple </div><div style=\"width: 400px; height: 400px;\"><div class=\"chartjs-size-monitor\"><div class=\"chartjs-size-monitor-expand\"><div class=\"\"></div></div><div class=\"chartjs-size-monitor-shrink\"><div class=\"\"></div></div></div><canvas id=\"slidelement_5798\" width=\"400\" height=\"400\" style=\"background-color: white; display: block; width: 400px; height: 400px; position: relative; left: 470px; top: 81px;\" class=\"chartjs-render-monitor slidelement ui-draggable ui-draggable-handle movecursor\"></canvas></div></div><div class=\"impress-slide impress-slide-element\" id=\"impress_slide_8112\" style=\"z-index: -1179;\"><div class=\"slidelement slidelementh1 ui-draggable ui-draggable-handle movecursor\" id=\"slidelement_5711\" data-parent=\"impress_slide_8112\" data-type=\"h2\" style=\"width: auto; height: 60px; position: absolute; left: 315px; top: 301px;\" contenteditable=\"true\"> Titre d\'exemple</div><div class=\"slidelement slidelementh3 ui-draggable ui-draggable-handle movecursor\" id=\"slidelement_5711\" data-parent=\"impress_slide_8112\" data-type=\"h3\" style=\"position: absolute; width: auto; height: 40px; left: 275px; top: 373px;\"> Paragraphe d\'exemple </div><iframe class=\"\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen=\"\" src=\"https://www.youtube.com/embed/VaCFrg6bL5M\" id=\"slidelement_629\" width=\"560\" height=\"315\" frameborder=\"0\"></iframe></div><div class=\"impress-slide impress-slide-element\" id=\"impress_slide_1056\" style=\"z-index: 1;\"><div class=\"slidelement slidelementh1 ui-draggable ui-draggable-handle movecursor\" id=\"slidelement_7466\" data-parent=\"impress_slide_1056\" data-type=\"h2\" style=\"width:auto; height:60px; position:absolute; left:202px; top:50px; whitespace:no-wrap;\" contenteditable=\"true\"> Titre d\'exemple</div><div class=\"slidelement slidelementh3 ui-draggable ui-draggable-handle movecursor\" id=\"slidelement_7466\" data-parent=\"impress_slide_1056\" data-type=\"h3\" style=\"position:absolute; width:auto; height:40px; left:268px; top:120px; whitespace:no-wrap;\"> Paragraphe d\'exemple </div><img id=\"slidelement_2826\" style=\"left: 589px; top: 204px; position: relative;\" class=\"slidelement ui-draggable ui-draggable-handle movecursor\" src=\"https://cdn.futura-sciences.com/buildsv6/images/wide1920/6/5/2/652a7adb1b_98148_01-intro-773.jpg\"></div>', '<div id=\"slidethumb_2005\" class=\"slidethumb thumbelement\" data-left=\"48px\" data-top=\"20px\"><div class=\"thumbnailholder\"></div><canvas class=\"slidemask\" id=\"slidethumb_2005\" style=\"z-index:1000; width:100%; height:100%; background-color:#FFF; opacity:0.1; left:0px; top:0px; position:absolute\"></canvas><a id=\"deletebtn\" data-parent=\"slidethumb_2005\" style=\"z-index:1001;\" class=\"btn btn-danger btn-small deletebtn text-white\"><svg class=\"svg-inline--fa fa-trash-alt fa-w-14\" aria-hidden=\"true\" focusable=\"false\" data-prefix=\"fas\" data-icon=\"trash-alt\" role=\"img\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 448 512\" data-fa-i2svg=\"\"><path fill=\"currentColor\" d=\"M32 464a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128H32zm272-256a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zM432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16z\"></path></svg><!-- <i class=\"fas fa-trash-alt\"></i> --></a><div class=\"impress-slide\" id=\"clonethumb_2005\" style=\"z-index: 1; transform: scale(0.18); left: -110px; top: -75px;\" data-clone=\"true\"><div class=\"slidelement slidelementh1 ui-draggable ui-draggable-handle movecursor\" id=\"slidelement_3455\" data-parent=\"impress_slide_2005\" data-type=\"h2\" style=\"width: auto; height: 60px; position: absolute; left: 429px; top: 18px;\" contenteditable=\"true\"> Titre d\'exemple</div><div class=\"slidelement slidelementh3 ui-draggable ui-draggable-handle movecursor\" id=\"slidelement_3455\" data-parent=\"impress_slide_2005\" data-type=\"h3\" style=\"position: absolute; width: auto; height: 40px; left: 63px; top: 237px;\"> Paragraphe d\'exemple </div></div></div><div id=\"slidethumb_8312\" class=\"slidethumb thumbelement\" data-left=\"275.45px\" data-top=\"26px\" data-rotate-y=\"62\" data-transform-string=\" rotateY(62deg)\"><div class=\"thumbnailholder\"></div><canvas class=\"slidemask\" id=\"slidethumb_8312\" style=\"z-index:1000; width:100%; height:100%; background-color:#FFF; opacity:0.1; left:0px; top:0px; position:absolute\"></canvas><a id=\"deletebtn\" data-parent=\"slidethumb_8312\" style=\"z-index:1001;\" class=\"btn btn-danger btn-small deletebtn text-white\"><svg class=\"svg-inline--fa fa-trash-alt fa-w-14\" aria-hidden=\"true\" focusable=\"false\" data-prefix=\"fas\" data-icon=\"trash-alt\" role=\"img\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 448 512\" data-fa-i2svg=\"\"><path fill=\"currentColor\" d=\"M32 464a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128H32zm272-256a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zM432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16z\"></path></svg><!-- <i class=\"fas fa-trash-alt\"></i> --></a><div class=\"impress-slide\" id=\"clonethumb_8312\" style=\"z-index: 1; transform: scale(0.18); left: -110px; top: -75px;\" data-clone=\"true\"><div class=\"slidelement slidelementh1 ui-draggable ui-draggable-handle movecursor\" id=\"slidelement_9595\" data-parent=\"impress_slide_8312\" data-type=\"h2\" style=\"width: auto; height: 60px; position: absolute; left: 103px; top: 25px; color: rgb(231, 0, 0);\" contenteditable=\"true\"> Titre d\'exemple</div><div class=\"slidelement slidelementh3 ui-draggable ui-draggable-handle movecursor\" id=\"slidelement_9595\" data-parent=\"impress_slide_8312\" data-type=\"h3\" style=\"position: absolute; width: auto; height: 40px; left: 489px; top: 187px;\"> Paragraphe d\'exemple </div></div></div><div id=\"slidethumb_1416\" class=\"slidethumb thumbelement\" data-left=\"160.25px\" data-top=\"141.25px\" data-rotate-x=\"-80\" data-transform-string=\" rotateX(-80deg)\"><div class=\"thumbnailholder\"></div><canvas class=\"slidemask\" id=\"slidethumb_1416\" style=\"z-index:1000; width:100%; height:100%; background-color:#FFF; opacity:0.1; left:0px; top:0px; position:absolute\"></canvas><a id=\"deletebtn\" data-parent=\"slidethumb_1416\" style=\"z-index:1001;\" class=\"btn btn-danger btn-small deletebtn text-white\"><svg class=\"svg-inline--fa fa-trash-alt fa-w-14\" aria-hidden=\"true\" focusable=\"false\" data-prefix=\"fas\" data-icon=\"trash-alt\" role=\"img\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 448 512\" data-fa-i2svg=\"\"><path fill=\"currentColor\" d=\"M32 464a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128H32zm272-256a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zM432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16z\"></path></svg><!-- <i class=\"fas fa-trash-alt\"></i> --></a><div class=\"impress-slide\" id=\"clonethumb_1416\" style=\"z-index: 1; transform: scale(0.18); left: -110px; top: -75px;\" data-clone=\"true\"><div class=\"slidelement slidelementh1 ui-draggable ui-draggable-handle movecursor\" id=\"slidelement_4803\" data-parent=\"impress_slide_1416\" data-type=\"h2\" style=\"width: auto; height: 60px; position: absolute; left: 5px; top: 11px;\" contenteditable=\"true\"> Titre d\'exemple</div><div class=\"slidelement slidelementh3 ui-draggable ui-draggable-handle movecursor ui-draggable-dragging\" id=\"slidelement_4803\" data-parent=\"impress_slide_1416\" data-type=\"h3\" style=\"position: absolute; width: auto; height: 40px; left: 533px; top: 221px;\"> Paragraphe d\'exemple </div><table class=\"table slidelement ui-draggable ui-draggable-handle movecursor\" style=\"width: auto; position: relative; left: -197.917px; top: 228px;\" id=\"slidelement_4138\" align=\"center\"><tbody id=\"tableau-body\"><tr><td contenteditable=\"true\">Case</td><td contenteditable=\"true\">EZECase</td><td contenteditable=\"true\">CSQDase</td><td contenteditable=\"true\">CaseQSD</td><td contenteditable=\"true\">Case</td></tr><tr><td contenteditable=\"true\">DonnÃ©e</td><td contenteditable=\"true\">AAAA</td><td contenteditable=\"true\">ZZZ</td><td contenteditable=\"true\">SSSQDQSDQSD</td><td contenteditable=\"true\">WXXCWXCWX</td></tr><tr><td contenteditable=\"true\">Case</td><td contenteditable=\"true\">Case</td><td contenteditable=\"true\">CaseDS</td><td contenteditable=\"true\">CaseD</td><td contenteditable=\"true\">XWCWXCWXC</td></tr><tr><td contenteditable=\"true\">Case</td><td contenteditable=\"true\">Case</td><td contenteditable=\"true\">CaseQQSD</td><td contenteditable=\"true\">CaseD</td><td contenteditable=\"true\">CXCXC</td></tr></tbody></table></div></div><div id=\"slidethumb_9744\" class=\"slidethumb thumbelement\" data-left=\"384.25px\" data-top=\"202.25px\" data-rotate=\"48\" data-transform-string=\"rotateX(54deg) rotateY(83deg)\" data-rotate-x=\"54\" data-rotate-y=\"83\"><div class=\"thumbnailholder\"></div><canvas class=\"slidemask\" id=\"slidethumb_9744\" style=\"z-index:1000; width:100%; height:100%; background-color:#FFF; opacity:0.1; left:0px; top:0px; position:absolute\"></canvas><a id=\"deletebtn\" data-parent=\"slidethumb_9744\" style=\"z-index:1001;\" class=\"btn btn-danger btn-small deletebtn text-white\"><svg class=\"svg-inline--fa fa-trash-alt fa-w-14\" aria-hidden=\"true\" focusable=\"false\" data-prefix=\"fas\" data-icon=\"trash-alt\" role=\"img\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 448 512\" data-fa-i2svg=\"\"><path fill=\"currentColor\" d=\"M32 464a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128H32zm272-256a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zM432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16z\"></path></svg><!-- <i class=\"fas fa-trash-alt\"></i> --></a><div class=\"impress-slide\" id=\"clonethumb_9744\" style=\"z-index: 1; transform: scale(0.18); left: -110px; top: -75px;\" data-clone=\"true\"><div class=\"slidelement slidelementh1 ui-draggable ui-draggable-handle movecursor\" id=\"slidelement_9735\" data-parent=\"impress_slide_9744\" data-type=\"h2\" style=\"width: auto; height: 60px; position: absolute; left: 43px; top: 6px;\" contenteditable=\"true\"> Titre d\'exemple</div><div class=\"slidelement slidelementh3 ui-draggable ui-draggable-handle movecursor\" id=\"slidelement_9735\" data-parent=\"impress_slide_9744\" data-type=\"h3\" style=\"position: absolute; width: auto; height: 40px; left: 33px; top: 98px;\"> Paragraphe d\'exemple </div><div style=\"width: 400px; height: 400px;\"><div class=\"chartjs-size-monitor\"><div class=\"chartjs-size-monitor-expand\"><div class=\"\"></div></div><div class=\"chartjs-size-monitor-shrink\"><div class=\"\"></div></div></div><canvas id=\"slidelement_5798\" width=\"400\" height=\"400\" style=\"background-color: white; display: block; width: 400px; height: 400px; position: relative; left: 470px; top: 81px;\" class=\"chartjs-render-monitor slidelement ui-draggable ui-draggable-handle movecursor ui-draggable-dragging\"></canvas></div></div></div><div id=\"slidethumb_8112\" class=\"slidethumb thumbelement\" data-left=\"15.7667px\" data-top=\"256.167px\" data-rotate=\"-73\" data-transform-string=\" rotateX(-79deg)\" data-rotate-x=\"-79\"><div class=\"thumbnailholder\"></div><canvas class=\"slidemask\" id=\"slidethumb_8112\" style=\"z-index:1000; width:100%; height:100%; background-color:#FFF; opacity:0.1; left:0px; top:0px; position:absolute\"></canvas><a id=\"deletebtn\" data-parent=\"slidethumb_8112\" style=\"z-index:1001;\" class=\"btn btn-danger btn-small deletebtn text-white\"><svg class=\"svg-inline--fa fa-trash-alt fa-w-14\" aria-hidden=\"true\" focusable=\"false\" data-prefix=\"fas\" data-icon=\"trash-alt\" role=\"img\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 448 512\" data-fa-i2svg=\"\"><path fill=\"currentColor\" d=\"M32 464a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128H32zm272-256a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zM432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16z\"></path></svg><!-- <i class=\"fas fa-trash-alt\"></i> --></a><div class=\"impress-slide\" id=\"clonethumb_8112\" style=\"z-index: 1; transform: scale(0.18); left: -110px; top: -75px;\" data-clone=\"true\"><div class=\"slidelement slidelementh1 ui-draggable ui-draggable-handle movecursor\" id=\"slidelement_5711\" data-parent=\"impress_slide_8112\" data-type=\"h2\" style=\"width: auto; height: 60px; position: absolute; left: 315px; top: 301px;\" contenteditable=\"true\"> Titre d\'exemple</div><div class=\"slidelement slidelementh3 ui-draggable ui-draggable-handle movecursor\" id=\"slidelement_5711\" data-parent=\"impress_slide_8112\" data-type=\"h3\" style=\"position: absolute; width: auto; height: 40px; left: 275px; top: 373px;\"> Paragraphe d\'exemple </div><iframe class=\"\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen=\"\" src=\"https://www.youtube.com/embed/VaCFrg6bL5M\" id=\"slidelement_629\" width=\"560\" height=\"315\" frameborder=\"0\"></iframe></div></div><div id=\"slidethumb_1056\" class=\"slidethumb thumbelement currentselection\" data-left=\"306.75px\" data-top=\"295.75px\" data-rotate-x=\"-66\" data-transform-string=\"rotateX(-66deg) rotateY(68deg)\" data-rotate-y=\"68\"><div class=\"thumbnailholder\"></div><canvas class=\"slidemask\" id=\"slidethumb_1056\" style=\"z-index:1000; width:100%; height:100%; background-color:#FFF; opacity:0.1; left:0px; top:0px; position:absolute\"></canvas><a id=\"deletebtn\" data-parent=\"slidethumb_1056\" style=\"z-index:1001;\" class=\"btn btn-danger btn-small deletebtn text-white\"><svg class=\"svg-inline--fa fa-trash-alt fa-w-14\" aria-hidden=\"true\" focusable=\"false\" data-prefix=\"fas\" data-icon=\"trash-alt\" role=\"img\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 448 512\" data-fa-i2svg=\"\"><path fill=\"currentColor\" d=\"M32 464a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128H32zm272-256a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zM432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16z\"></path></svg><!-- <i class=\"fas fa-trash-alt\"></i> --></a><div class=\"impress-slide\" id=\"clonethumb_1056\" style=\"z-index: 1; transform: scale(0.18); left: -110px; top: -75px;\" data-clone=\"true\"><div class=\"slidelement slidelementh1 ui-draggable ui-draggable-handle movecursor\" id=\"slidelement_7466\" data-parent=\"impress_slide_1056\" data-type=\"h2\" style=\"width:auto; height:60px; position:absolute; left:202px; top:50px; whitespace:no-wrap;\" contenteditable=\"true\"> Titre d\'exemple</div><div class=\"slidelement slidelementh3 ui-draggable ui-draggable-handle movecursor\" id=\"slidelement_7466\" data-parent=\"impress_slide_1056\" data-type=\"h3\" style=\"position:absolute; width:auto; height:40px; left:268px; top:120px; whitespace:no-wrap;\"> Paragraphe d\'exemple </div><img id=\"slidelement_2826\" style=\"left: 589px; top: 204px; position: relative;\" class=\"slidelement ui-draggable ui-draggable-handle movecursor\" src=\"https://cdn.futura-sciences.com/buildsv6/images/wide1920/6/5/2/652a7adb1b_98148_01-intro-773.jpg\"></div></div>', 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` tinyint(4) NOT NULL,
  `name` varchar(8) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `password`) VALUES
(1, 'admin', '$argon2id$v=19$m=1024,t=2,p=2$dDFJdW9QaWhRQThxZC9MWQ$ZBDvF1eoD4eIE2QChJTHH63yKEAb/GRYNUFNoTaAOuY'),
(34, 'ww', '$argon2id$v=19$m=1024,t=2,p=2$WFBaelh3b1kuQ3kxNFI5Qw$r11G/zTGzg8SLJxRV1+XnTOd06S8rtj4QKi6y8F+Om0'),
(36, 'admina', '$argon2id$v=19$m=1024,t=2,p=2$L2lzQWtydnBYNVVsYnVadA$BO9U9KrxPW58TaMyoWBNK6B05KzLAFAeDffKG8Bp0zA'),
(38, 'admine', '$argon2id$v=19$m=1024,t=2,p=2$TWEzYXd3a3pld1QxU1REZg$M8a9CV5VQDP1FsKtVZ1l5elwWykqNr9PnP2gJ1Uu1Lw'),
(39, 'adminq', '$argon2id$v=19$m=1024,t=2,p=2$WjdNN3haU3E2ekNmeHNseg$oxRwihu8VtvLTmJKT9DCbjJH60J4155V372WfDs/AwI');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `configurations`
--
ALTER TABLE `configurations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `presentations`
--
ALTER TABLE `presentations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `configurations`
--
ALTER TABLE `configurations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `presentations`
--
ALTER TABLE `presentations`
  MODIFY `id` smallint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
