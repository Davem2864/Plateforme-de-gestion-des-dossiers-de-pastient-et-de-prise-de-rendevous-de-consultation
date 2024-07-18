-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 18 juil. 2024 à 23:02
-- Version du serveur : 8.3.0
-- Version de PHP : 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `edoc`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `aemail` varchar(255) NOT NULL,
  `apassword` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`aemail`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`aemail`, `apassword`) VALUES
('admin@edoc.com', '123');

-- --------------------------------------------------------

--
-- Structure de la table `admin_post`
--

DROP TABLE IF EXISTS `admin_post`;
CREATE TABLE IF NOT EXISTS `admin_post` (
  `id` int NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `post_date` date NOT NULL,
  `post_time` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `admin_post`
--

INSERT INTO `admin_post` (`id`, `content`, `photo`, `post_date`, `post_time`) VALUES
(1, 'test', '20231005.jpg', '2024-06-26', '22:12:42');

-- --------------------------------------------------------

--
-- Structure de la table `appointment`
--

DROP TABLE IF EXISTS `appointment`;
CREATE TABLE IF NOT EXISTS `appointment` (
  `appoid` int NOT NULL AUTO_INCREMENT,
  `pid` int DEFAULT NULL,
  `apponum` int DEFAULT NULL,
  `scheduleid` int DEFAULT NULL,
  `appodate` date DEFAULT NULL,
  PRIMARY KEY (`appoid`),
  KEY `pid` (`pid`),
  KEY `scheduleid` (`scheduleid`)
) ENGINE=MyISAM AUTO_INCREMENT=71 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `appointment`
--

INSERT INTO `appointment` (`appoid`, `pid`, `apponum`, `scheduleid`, `appodate`) VALUES
(1, 1, 1, 1, '2022-06-03'),
(2, 5, 2, 1, '2024-05-02'),
(3, 5, 3, 1, '2024-05-02'),
(4, 6, 4, 1, '2024-05-03'),
(5, 6, 4, 1, '2024-05-03'),
(6, 6, 4, 1, '2024-05-03'),
(7, 6, 4, 1, '2024-05-03'),
(8, 6, 4, 1, '2024-05-03'),
(9, 6, 4, 1, '2024-05-03'),
(10, 6, 4, 1, '2024-05-03'),
(11, 6, 4, 1, '2024-05-03'),
(12, 6, 4, 1, '2024-05-03'),
(13, 6, 4, 1, '2024-05-03'),
(14, 6, 4, 1, '2024-05-03'),
(15, 6, 15, 1, '2024-05-03'),
(16, 6, 16, 1, '2024-05-03'),
(17, 6, 17, 1, '2024-05-03'),
(18, 6, 18, 1, '2024-05-03'),
(19, 6, 19, 1, '2024-05-03'),
(20, 6, 20, 1, '2024-05-03'),
(21, 6, 21, 1, '2024-05-03'),
(22, 6, 22, 1, '2024-05-03'),
(23, 6, 22, 1, '2024-05-03'),
(24, 6, 24, 1, '2024-05-03'),
(25, 6, 25, 1, '2024-05-03'),
(26, 6, 26, 1, '2024-05-03'),
(27, 6, 27, 1, '2024-05-03'),
(28, 6, 28, 1, '2024-05-03'),
(29, 7, 29, 1, '2024-05-05'),
(30, 7, 30, 1, '2024-05-05'),
(31, 7, 31, 1, '2024-05-05'),
(32, 7, 31, 1, '2024-05-05'),
(33, 7, 31, 1, '2024-05-05'),
(34, 7, 34, 1, '2024-05-05'),
(35, 7, 34, 1, '2024-05-05'),
(36, 7, 36, 1, '2024-05-05'),
(37, 7, 37, 1, '2024-05-05'),
(38, 7, 38, 1, '2024-05-05'),
(39, 7, 39, 1, '2024-05-05'),
(40, 7, 40, 1, '2024-05-05'),
(41, 7, 41, 1, '2024-05-05'),
(42, 7, 42, 1, '2024-05-05'),
(43, 6, 43, 1, '2024-05-05'),
(44, 7, 1, 9, '2024-05-05'),
(45, 7, 2, 9, '2024-05-05'),
(46, 7, 3, 9, '2024-05-14'),
(47, 7, 1, 10, '2024-05-15'),
(48, 7, 2, 10, '2024-05-15'),
(49, 5, 1, 11, '2024-05-27'),
(50, 5, 1, 12, '2024-05-27'),
(51, 5, 1, 14, '2024-05-27'),
(52, 7, 2, 11, '2024-05-30'),
(53, 7, 2, 12, '2024-05-30'),
(54, 7, 2, 14, '2024-05-30'),
(55, 7, 3, 14, '2024-06-01'),
(56, 6, 4, 14, '2024-06-01'),
(57, 6, 3, 12, '2024-06-01'),
(58, 6, 4, 12, '2024-06-01'),
(59, 6, 3, 11, '2024-06-01'),
(60, 6, 1, 15, '2024-06-01'),
(61, 7, 2, 15, '2024-06-03'),
(62, 7, 3, 15, '2024-06-03'),
(63, 7, 4, 15, '2024-06-08'),
(64, 7, 5, 15, '2024-06-08'),
(65, 7, 6, 15, '2024-06-08'),
(66, 7, 7, 15, '2024-06-08'),
(67, 7, 8, 15, '2024-06-08'),
(68, 7, 5, 12, '2024-06-09'),
(69, 7, 9, 15, '2024-06-09'),
(70, 9, 5, 14, '2024-07-01');

-- --------------------------------------------------------

--
-- Structure de la table `approvisionnement`
--

DROP TABLE IF EXISTS `approvisionnement`;
CREATE TABLE IF NOT EXISTS `approvisionnement` (
  `apid` int NOT NULL AUTO_INCREMENT,
  `mid` int NOT NULL,
  `qte` double NOT NULL,
  `prix` double NOT NULL,
  `date_app` date NOT NULL,
  PRIMARY KEY (`apid`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `approvisionnement`
--

INSERT INTO `approvisionnement` (`apid`, `mid`, `qte`, `prix`, `date_app`) VALUES
(1, 1, 200, 10, '2024-05-01'),
(7, 1, 200, 10, '2024-05-30'),
(3, 1, 150, 8, '2024-05-01'),
(4, 4, 250, 2.6, '2024-05-01'),
(5, 5, 500, 8, '2024-05-07'),
(6, 1, 200, 2, '2024-05-07'),
(8, 1, 1, 10, '2024-05-30'),
(9, 6, 500, 3.5, '2024-05-30'),
(10, 9, 200, 0.5, '2024-07-16'),
(11, 8, 20, 0.15, '2024-07-16');

-- --------------------------------------------------------

--
-- Structure de la table `doctor`
--

DROP TABLE IF EXISTS `doctor`;
CREATE TABLE IF NOT EXISTS `doctor` (
  `docid` int NOT NULL AUTO_INCREMENT,
  `docemail` varchar(255) DEFAULT NULL,
  `docname` varchar(255) DEFAULT NULL,
  `docpassword` varchar(255) DEFAULT NULL,
  `docnic` varchar(15) DEFAULT NULL,
  `doctel` varchar(15) DEFAULT NULL,
  `specialties` int DEFAULT NULL,
  PRIMARY KEY (`docid`),
  KEY `specialties` (`specialties`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `doctor`
--

INSERT INTO `doctor` (`docid`, `docemail`, `docname`, `docpassword`, `docnic`, `doctel`, `specialties`) VALUES
(1, 'doctor@edoc.com', 'Test Doctor', '123', '000000000', '0110000000', 1),
(2, 'docdan.edoc2864@gmail.com', 'Docteur Dan', '1234', '25610', '0971450634', 5),
(27, 'joel@edoc.com', 'Upasula Joel', '1234', '25610', '0990901269', 19),
(4, 'soni@edoc.com', 'Soni Mpakanyi', '1234', '25610', '0971450634', 37),
(5, 'abraham@edoc.com', 'Kitali Abraham', '1234', '25610', '0971450634', 13),
(6, 'ben@edoc.com', 'Benediction Lukeka', '1234', '25610', '0998775773', 10),
(7, 'dorcas@edoc.com', 'Dorcas Mbonyibuga', '1234', '25610', '0977253323', 14),
(30, 'achille@edoc.com', 'Achille Mbuluku', '125698', '25610', '0991787976', 30),
(29, 'laurence@edoc.com', 'Laurence Masika', '1234', '25610', '0990901269', 32),
(28, 'jean@edoc.com', 'Jean Mirimba', '1234', '25610', '0990901269', 1),
(26, 'gisela@edoc.com', 'Gisella Mbuluku', '1234', '25610', '0990901269', 7),
(25, 'luc@edoc.com', 'Luc Masifa', '1234', '25610', '0837253323', 6),
(24, 'archange@edoc.com', 'Archange Madua', '1234', '25611', '0837253323', 1);

-- --------------------------------------------------------

--
-- Structure de la table `doctor_post`
--

DROP TABLE IF EXISTS `doctor_post`;
CREATE TABLE IF NOT EXISTS `doctor_post` (
  `id` int NOT NULL AUTO_INCREMENT,
  `docid` int NOT NULL,
  `content` text NOT NULL,
  `photo` varchar(10000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `post_date` date NOT NULL,
  `post_time` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `doctor_post`
--

INSERT INTO `doctor_post` (`id`, `docid`, `content`, `photo`, `post_date`, `post_time`) VALUES
(1, 2, 'test', 'https://www.bing.com/ck/a?!&&p=0cbd9456536b06b0JmltdHM9MTcxODQwOTYwMCZpZ3VpZD0wMDgyYzU5MS1iMjljLTY4OTctMmQyNC1kMWU1YjM2MDY5ZTkmaW5zaWQ9NTU4NQ&ptn=3&ver=2&hsh=3&fclid=0082c591-b29c-6897-2d24-d1e5b36069e9&u=a1L2ltYWdlcy9zZWFyY2g_cT1waG90byUyMGRlJTIwcGVyc29ubmUlMjBhdHRlaW50JTIwZCUyN2Vib2xhJkZPUk09SVFGUkJBJmlkPTRGOTYwNjY0QTMyQzM0QjIxNEY0RjQ4MkI0QjJCQUIyNTY3NjEyMDU&ntb=1', '2024-06-16', '04:10:33'),
(2, 2, 'test', 'Drapeau Rdc.jpg', '2024-06-17', '21:14:18'),
(3, 2, 'test', 'Drapeau Rdc.jpg', '2024-06-17', '21:14:27'),
(4, 2, '1 \r\nCIRRICULUM VITAE \r\nIDENTITE                                                                        \r\nNom                                \r\nPost-Nom                                 \r\nPrénom                                    \r\nLieu et date de naissance        \r\nEtat Civil       \r\nNationalité                               \r\nAdresse                                    \r\nNord-Kivu \r\nOrigine                                    \r\nDémocratique du Congo \r\n: AMBIKA \r\n: MIRINDI \r\n: Esther \r\n: BUKAVU, Le 15/07/2001 \r\n: Célibataire \r\n: Congolaise (RDC) \r\n: Goma, Quartier Himbi 1, commune de Goma, Province du \r\n: Territoire de Walungu, Province du SUD-KIVU, Republique \r\nTéléphone  : +243 999 073 427 \r\nE-mail : estherambika323@gmail.com  \r\nCompétences linguistiques : Français, Anglais, Swahili, Lingala et les dialectes  \r\nConnaissances informatiques : MS Windows, Word, Excel, PowerPoint,  \r\nFORMATIONS  \r\nCertificat des Etudes Primaires à L’EP CHIPUKO                         \r\nDiplôme d’Etat à l’institut ISIDORE BAKANJA                                     \r\nEXPERIENCE DANS LA COLLECTE DES DONNEES \r\n2013  \r\n2016 \r\n Du 04 Aout au 04 Septembre 2020,  Enquêteur chez Inovative Hub for Research in \r\nAfrica (IHfRA) dans  le cadre de la collecte des données relatif à l’évaluation d’impact \r\ndu Programme Elargie d’Appui aux Retours (PEAR plus III),  de la GIZ dans la \r\nprovince du Nord Kivu et la province de l’Ituri en RDC \r\nAUTRES REALISATIONS \r\n Du 1e aout au 31 aout : stage professionnel à la société VODACOM \r\n Audits et évaluation des projets ; \r\n Formation dans le domaine d’appui aux victimes des violences sexuelles  \r\n Formation sur la sensibilisation, mobilisation et organisation  dans les domaines fonciers; \r\n2 \r\n \r\n \r\nREFERENCES  \r\n  \r\n JEAN LUC BASHIGE  \r\n Tel : +243815968345 \r\n CHRISPIN BASHIGE : FIELD MANAGER IHfRA \r\nTél : +243 0974451650 \r\n                                                       \r\nJe vous certifie sur mon honneur que les renseignements  fournis ci-haut sont sincères et  dignes de \r\nfoi. \r\n                                            Fait à Goma, le 10 Juillet 2022         \r\n                                     \r\n \r\n \r\n                                                 AMBIKA MIRINDI Esther', '20231015.jpg', '2024-06-17', '21:22:00'),
(5, 2, ' <style>\r\n        .post {\r\n            border-bottom: 1px solid #ddd;\r\n            padding: 10px;\r\n            display: flex;\r\n            flex-direction: column;\r\n            color: black; /* Texte en noir */\r\n        }\r\n        .post-header {\r\n            display: flex;\r\n            align-items: center;\r\n            margin-bottom: 10px;\r\n            color: black; /* Texte en noir */\r\n        }\r\n        .post img {\r\n            max-width: 100px;\r\n            max-height: 100px;\r\n            margin-right: 10px;\r\n        }\r\n        .post strong {\r\n            font-size: 1.2em;\r\n            margin-right: 10px;\r\n            color: black; /* Texte en noir */\r\n        }\r\n        .post small {\r\n            color: #666;\r\n        }\r\n        .post-content {\r\n            margin-left: 110px; /* Ajuster cette valeur selon la taille de l\'image */\r\n            color: black; /* Texte en noir */\r\n        }\r\n        .post img.post-photo {\r\n            max-width: 300px;\r\n            max-height: 300px;\r\n        }\r\n        #postForm textarea,\r\n        #postForm input {\r\n            display: block;\r\n            margin-bottom: 10px;\r\n        }\r\n    </style>', '20230818.jpg', '2024-06-18', '12:35:44'),
(6, 2, 'Ebola (maladie à virus)\r\n20 avril 2023\r\nEnglish\r\nالعربية\r\n中文\r\nРусский\r\nEspañol\r\nPrincipaux faits\r\nDes vaccins pour protéger contre certains types d’Ebola ont été utilisés pour lutter contre la propagation dans le cadre de flambées épidémiques du virus. D’autres vaccins sont également en cours de préparation.\r\nUne prise en charge précoce avec réhydratation et traitement des symptômes améliore la survie.\r\nL’OMS a formulé des recommandations fortes concernant l’utilisation de deux traitements par anticorps monoclonaux dans la prise en charge du virus Ebola : mAb114 (Ansuvimab ; Ebanga) et REGN-EB3 (Inmazeb).\r\nLe taux de létalité moyen de cette maladie est d’environ 50 %. Au cours des flambées précédentes, les taux de létalité sont allés de 25 % à 90 % selon les circonstances et la riposte.\r\nPour endiguer efficacement les épidémies, il convient d’avoir recours à un ensemble d’interventions : prise en charge des cas, mesures de prévention des infections et de lutte, surveillance et recherche des contacts, services de laboratoire de qualité, inhumations sans risque et dans la dignité, et mobilisation sociale.\r\nLa participation de la communauté est essentielle pour juguler les flambées.\r\n\r\nVue d’ensemble\r\nLa maladie à virus Ebola (MVE ou Ebola) est une maladie rare, mais grave chez l’homme ; elle est souvent fatale.\r\n\r\nLes personnes sont infectées par le virus Ebola en touchant :\r\n\r\ndes animaux infectés lors de leur préparation, de leur cuisson ou de leur consommation ;\r\nles liquides biologiques d’une personne infectée tels que la salive, l’urine, les selles ou le sperme ; et\r\ndes matériaux contaminés par les liquides biologiques d’une personne infectée, comme les vêtements ou le linge de lit.\r\nLe virus pénètre dans l’organisme par des coupures dans la peau ou en se touchant les yeux, le nez ou la bouche.\r\n\r\nLes premiers symptômes sont notamment les suivants : fièvre, fatigue et céphalées.\r\n\r\nCertains types d’Ebola peuvent être évités avec des vaccins et traités à l’aide de médicaments.\r\n\r\nLa MVE est apparue pour la première fois en 1976, lors de 2 flambées simultanées à Nzara (aujourd’hui au Soudan du Sud) et à Yambuku (République démocratique du Congo). Yambuku étant situé près de la rivière Ebola, celle-ci a donné son nom à la maladie.\r\n\r\nLa famille de virus Filoviridae compte 3 genres : Cuevavirus, Marburgvirus et Ebolavirus. Six espèces ont été identifiées chez Ebolavirus : Zaïre, Bundibugyo, Soudan, Reston, Forêt de Taï et Bombali.\r\n\r\nTransmission\r\nOn pense que les chauves-souris frugivores de la famille des Pteropodidés sont les hôtes naturels du virus Ebola. Celui-ci s’introduit dans la population humaine après un contact étroit avec du sang, des sécrétions, des organes ou d’autres liquides biologiques d’animaux infectés comme des chauves-souris frugivores, des chimpanzés, des gorilles, des singes, des antilopes forestières ou des porcs-épics retrouvés malades ou morts ou dans la forêt tropicale.\r\n\r\nIl se propage ensuite par transmission interhumaine, à la suite de contacts directs (peau ou muqueuses lésées) avec :\r\n\r\ndu sang ou des liquides biologiques d’une personne atteinte d’Ebola ou décédée des suites de cette maladie ; et\r\ndes objets qui ont été contaminés par des liquides biologiques (sang, excréments, vomissements) provenant d’une personne atteinte d’Ebola ou du corps d’une personne qui est décédée de cette maladie.\r\nIl est arrivé fréquemment que des agents de santé soient infectés en traitant des cas suspects ou confirmés de MVE. Cela s’est produit lors de contacts étroits avec les patients, lorsque les précautions anti-infectieuses n’ont pas été strictement appliquées.\r\n\r\nLes rites funéraires au cours desquels il y a un contact direct avec la dépouille peuvent également jouer un rôle dans la transmission du virus Ebola.\r\n\r\nLes personnes infectées restent contagieuses tant que le virus est présent dans leur sang. Après le rétablissement, il existe un risque de transmission sexuelle, qui peut être réduit en offrant aux survivants du soutien et des informations.\r\n\r\nLes femmes enceintes qui contractent la forme aiguë de la maladie et qui se rétablissent peuvent demeurer porteuses du virus dans le lait maternel ou dans les liquides et les tissus associés à la grossesse.\r\n\r\nPour en savoir plus, lire les lignes directrices de l’OMS sur la prise en charge des cas de femmes enceintes et allaitantes dans le contexte de la maladie à virus Ebola.\r\n\r\nSymptômes\r\nLes symptômes de l’infection par le virus Ebola peuvent être soudains et sont notamment les suivants : fièvre, fatigue, douleurs musculaires, céphalées, maux de gorge. Ils sont suivis de vomissements, de diarrhée, d’une éruption cutanée, et d’hémorragies internes et externes.\r\n\r\nLe temps écoulé entre l’infection par le virus et l’apparition des symptômes est en général de 2 à 21 jours. Tant qu’elle ne présente pas de symptômes, une personne infectée par le virus Ebola ne peut pas transmettre la maladie. Les personnes infectées peuvent propager le virus aussi longtemps que ce dernier est présent dans l’organisme, même après le décès.\r\n\r\nAprès s’être rétablies de la maladie, certaines personnes peuvent présenter des symptômes pendant deux ans ou plus, qui peuvent inclure :\r\n\r\nsensation de fatigue\r\ncéphalées\r\ndouleurs musculaires et articulaires\r\ndouleurs oculaires et troubles de la vision\r\nprise de poids\r\ndouleurs au ventre et perte d’appétit\r\nperte de cheveux et affections cutanées\r\ntroubles du sommeil\r\nperte de mémoire\r\nperte auditive\r\ndépression et anxiété\r\nIl faut parler à un professionnel de la santé dans les cas suivants :\r\n\r\nprésence de symptômes et déplacement dans une région où sévit le virus Ebola, ou\r\ncontact avec une personne qui aurait pu être infectée par le virus Ebola.\r\nDiagnostic\r\nSur le plan clinique, il peut être difficile de distinguer la MVE d’autres maladies infectieuses telles que le paludisme, la fièvre typhoïde et la méningite. De nombreux symptômes de la grossesse et de la MVE sont également assez similaires. En raison des risques pour la grossesse et pour les femmes enceintes, ces dernières doivent dans l’idéal être testées rapidement en cas de MVE présumée.\r\n\r\nLes méthodes de diagnostic suivantes servent à confirmer que l’infection à virus Ebola est bien la cause des symptômes :\r\n\r\nTitrage immunoenzymatique (ELISA)\r\nTest d’immunocapture des antigènes\r\nTest de séroneutralisation\r\nTranscription inverse suivie d’une amplification en chaîne par polymérase (RT-PCR)\r\nMicroscopie électronique\r\nIsolement du virus sur culture cellulaire\r\nLes tests de diagnostic évalués dans le cadre du processus d’évaluation et d’inscription pour la liste d’autorisation d’utilisation d’urgence de l’OMS peuvent être consultés ici (en anglais).\r\n\r\nTraitement\r\nLes personnes qui présentent des symptômes d’Ebola doivent obtenir immédiatement des soins médicaux. Des soins précoces améliorent les chances de survie.\r\n\r\nLe traitement s’effectue en milieu hospitalier et comprend l’administration de solutés par voie orale ou intraveineuse et de médicaments.\r\n\r\nIl est risqué de soigner les personnes atteintes d’Ebola à domicile, car elles peuvent transmettre la maladie à d’autres. En outre, elles ne recevront pas le même niveau de soins qu’elles peuvent obtenir dans un contexte professionnel.\r\n\r\nIl existe un vaccin efficace contre la maladie à virus Ebola de type Zaïre, que l’on trouve principalement en Guinée et en République démocratique du Congo. Il est traité avec des anticorps. Ces médicaments à base d’anticorps sont administrés par voie intraveineuse et augmentent les chances de survie.\r\n\r\nDes recherches sont en cours pour trouver des vaccins et des traitements contre d’autres types d’Ebola.\r\n\r\nPour tous les types, les traitements de soutien sauvent des vies et comprennent les éléments suivants :\r\n\r\nsolutés administrés par voir orale ou intraveineuse ;\r\ntransfusions sanguines ;\r\nmédicaments pour d’autres infections dont le patient peut être atteint, comme le paludisme ; et\r\nmédicaments contre la douleur, les nausées, les vomissements et la diarrhée.\r\nL’OMS dispose de lignes directrices décrivant les soins de soutien optimisés que les patients atteints d’Ebola devraient recevoir, qui comprennent les tests pertinents à effectuer ainsi que la prise en charge de la douleur, de la nutrition et des co-infections (comme le paludisme), et d’autres approches qui assurent au patient la meilleure voie vers le rétablissement.\r\n\r\nDans le cadre de la flambée d’Ebola qui a sévi de 2018 à 2020 en République démocratique du Congo, le tout premier essai contrôlé randomisé réalisé avec plusieurs médicaments a été mené pour évaluer l’efficacité et l’innocuité des médicaments utilisés dans le traitement des patients infectés par le virus Ebola. L’OMS dispose d’orientations évolutives sur les traitements et approches recommandés.\r\n\r\nPlus d’informations sur la prise en charge clinique de la maladie à virus Ebola (en anglais)\r\n\r\nPrévention et lutte\r\nOn peut se protéger contre le virus Ebola :\r\n\r\nen se lavant les mains ;\r\nen évitant de toucher les liquides corporels d’une personne atteinte de la maladie à virus Ebola ou susceptible de l’être ;\r\nen évitant tout contact avec le corps d’une personne décédée d’Ebola ; et\r\nen se faisant vacciner contre Ebola si l’on est à risque de contracter le virus Ebola de type Zaïre.\r\nLe vaccin Ervebo s’est avéré efficace pour protéger contre l’espèce Ebolavirus Zaïre et est recommandé par le Groupe stratégique consultatif d’experts (SAGE) sur la vaccination dans le cadre d’un ensemble plus large d’interventions de riposte à la flambée d’Ebola.\r\n\r\nL’OMS préqualifie le vaccin anti-Ebola, ouvrant la voie à son utilisation dans les pays à haut risque\r\nPour endiguer efficacement les épidémies, il convient d’avoir recours à une série d’interventions : prise en charge des cas, surveillance et recherche des contacts, services de laboratoire efficaces, inhumations sans risque et mobilisation sociale. La participation de la communauté est essentielle pour juguler les flambées. Sensibiliser aux facteurs de risque d’infection par le virus Ebola et aux mesures de protection (notamment la vaccination) que chacun peut prendre est un moyen efficace de réduire la transmission humaine, et les messages pour la réduction du risque doivent porter sur plusieurs éléments :\r\n\r\nRéduction du risque de transmission de la faune sauvage à l’humain\r\nRéduction du risque de transmission interhumaine\r\nMesures pour endiguer la flambée épidémique, notamment des inhumations sans risque et dans la dignité\r\nRéduction du risque de transmission sexuelle\r\nRéduction du risque de transmission par les liquides et les tissus associés à la grossesse\r\nLes agents de santé doivent toujours appliquer les précautions standard lorsqu’ils s’occupent des patients, quel que soit le diagnostic présumé. Ces précautions comprennent les mesures de base de l’hygiène des mains, l’hygiène respiratoire, le port d’un équipement de protection individuelle (pour éviter tout contact avec des éclaboussures et autres matières infectées), la sécurité des injections et les pratiques d’inhumation sans risque.\r\n\r\nLes agents de santé qui s’occupent de patients chez lesquels une MVE est suspectée ou confirmée doivent appliquer des mesures supplémentaires de lutte contre l’infection pour éviter tout contact avec le sang et les liquides biologiques des patients et avec les surfaces et objets contaminés comme les vêtements et le linge de lit.\r\n\r\nLe personnel des laboratoires est également exposé à un risque. Les échantillons qui ont été prélevés sur des sujets humains ou des animaux à des fins de recherche sur le virus Ebola doivent être manipulés par du personnel qualifié et traités dans des laboratoires convenablement équipés.\r\n\r\nL’OMS a publié un guide détaillé sur la prévention et la lutte contre la MVE :\r\n\r\nPrévention et contrôle de l’infection pour les soins aux cas suspects ou confirmés de fièvre hémorragique à filovirus dans les établissements de santé, avec un accent particulier sur le virus Ebola\r\nAction de l’OMS\r\nL’OMS travaille avec les pays pour prévenir les flambées épidémiques de MVE en maintenant une surveillance de la maladie et en aidant les pays à risque à élaborer des plans de préparation. Le document suivant donne des orientations générales pour la lutte contre les flambées épidémiques dues aux virus Ebola et Marburg :\r\n\r\nFlambées épidémiques de maladie à virus Ebola et Marburg : préparation, alerte, lutte et évaluation\r\nLorsqu’une flambée est détectée, l’OMS intervient en prêtant son concours à la mobilisation des communautés, à la détection des cas, à la recherche des contacts, à la vaccination, à la prise en charge des cas, aux services de laboratoire, à la lutte anti-infectieuse, à l’appui logistique et à la formation et à l’assistance en matière de pratiques d’inhumation sans risque and dans la dignité.\r\n\r\nLe site Web de l’OMS dispose d’une série de conseils et d’orientations (en anglais) pour la prise en charge des flambées d’Ebola :\r\n\r\nClinical management\r\nDisease outbreaks\r\nHealth product policy and standards - vaccine standardization\r\nMedical devices for Ebola outbreak\r\nSexual and Reproductive Health and Research (SRH) and Ebola', 'african-child-1381557_960_720.jpg', '2024-06-19', '16:33:21');

-- --------------------------------------------------------

--
-- Structure de la table `dossier`
--

DROP TABLE IF EXISTS `dossier`;
CREATE TABLE IF NOT EXISTS `dossier` (
  `did` int NOT NULL AUTO_INCREMENT,
  `pid` int NOT NULL,
  `date_c` date NOT NULL,
  `date_maj` date NOT NULL,
  PRIMARY KEY (`did`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `dossier`
--

INSERT INTO `dossier` (`did`, `pid`, `date_c`, `date_maj`) VALUES
(1, 4, '2024-04-30', '2024-04-30'),
(2, 5, '2024-04-30', '2024-04-30'),
(3, 6, '2024-05-02', '2024-05-02'),
(4, 7, '2024-05-05', '2024-05-05'),
(5, 8, '2024-05-14', '2024-05-14'),
(6, 9, '2024-07-01', '2024-07-01');

-- --------------------------------------------------------

--
-- Structure de la table `medoc`
--

DROP TABLE IF EXISTS `medoc`;
CREATE TABLE IF NOT EXISTS `medoc` (
  `mid` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date_exp` date NOT NULL,
  `prix` double NOT NULL,
  `qte` int NOT NULL,
  `dosage` int NOT NULL,
  `fab` varchar(255) NOT NULL,
  PRIMARY KEY (`mid`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `medoc`
--

INSERT INTO `medoc` (`mid`, `nom`, `description`, `date_exp`, `prix`, `qte`, `dosage`, `fab`) VALUES
(1, 'Cardio Aspirin', 'Ce medicament est très efficace contre le problème cardiaque car il améliore le flow cardiaque en régulant le battement', '2027-11-19', 12.5, 751, 100, 'New Cesamex'),
(3, 'Polygel', 'Ce medicament est efficace contre le flux gastrique , il agit en soulageant l\'estomac de brulures  ', '2028-11-24', 4.5, 350, 500, 'Shalina'),
(6, 'Paracetamol', 'Ce médicament est efficace pour lutter contre les maux de têtes et la fatigue ', '2026-01-31', 6, 500, 500, 'New Cesamex'),
(4, 'Gogynax', 'medicament en tube, cette pommade permet de luterr contre les brulures sur les organes genitaux de deux genres ', '2028-07-03', 5.1, 500, 125, 'New Cesamex'),
(5, 'Predinisolone', 'ce médicament est efficace contre la douleur', '2027-07-03', 10.5, 500, 2, 'Shalina'),
(8, 'Dexametasone', 'Ce medicament est efficace pour les allergies et c\'eat un anti-inflammatoire puissant ', '2025-10-31', 2.65, 20, 20, 'Shalina'),
(9, 'Dacin cprme', 'Desinfectannt d\'eau de bain ', '2026-12-16', 3, 200, 200, 'New cesamex'),
(10, 'Moxyclav', 'antibiothique efficace contre les infrctions urinaires', '2026-11-12', 10, 0, 500, 'New cesamex');

-- --------------------------------------------------------

--
-- Structure de la table `message_doc`
--

DROP TABLE IF EXISTS `message_doc`;
CREATE TABLE IF NOT EXISTS `message_doc` (
  `mdocid` int NOT NULL AUTO_INCREMENT,
  `docid` int NOT NULL,
  `message` text NOT NULL,
  `heure_envoi` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`mdocid`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `message_doc`
--

INSERT INTO `message_doc` (`mdocid`, `docid`, `message`, `heure_envoi`) VALUES
(1, 2, 'cher patient ... il serait préférable que vous passiez a l\'hôpital pour plus d\'informations', '2024-06-09 00:25:44'),
(2, 2, 'cher patient ... il serait préférable que vous passiez a l\'hôpital pour plus d\'informations', '2024-06-14 20:34:21'),
(3, 2, 'cher patient ... il serait préférable que vous passiez a l\'hôpital pour plus d\'informations', '2024-06-14 20:34:41'),
(4, 2, 'et je voudrais signaler que les heures d\'arriver des médecins dépend de chaque services ... toutes foisnous sommes ouvert du lundi au vendredi', '2024-06-14 20:36:33'),
(5, 2, 'Bonne compréhension', '2024-06-14 20:38:43'),
(6, 2, 'tous les services vous remercient de votre fidélité', '2024-06-14 20:53:37'),
(7, 1, 'Merci énormément , pour le compte du docteur d\'essais', '2024-06-15 18:46:16'),
(8, 2, 'salut comment puis-je vous aider', '2024-07-01 08:32:55');

-- --------------------------------------------------------

--
-- Structure de la table `message_pt`
--

DROP TABLE IF EXISTS `message_pt`;
CREATE TABLE IF NOT EXISTS `message_pt` (
  `mpid` int NOT NULL AUTO_INCREMENT,
  `pid` int NOT NULL,
  `message` text NOT NULL,
  `heure_envoi` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`mpid`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `message_pt`
--

INSERT INTO `message_pt` (`mpid`, `pid`, `message`, `heure_envoi`) VALUES
(1, 7, 'bonjour Docteur', '2024-06-08 23:34:13'),
(2, 7, 'j\'ai un probleme avec le medicament recu', '2024-06-08 23:38:27'),
(3, 7, 'comment y remédier?', '2024-06-08 23:40:13'),
(4, 7, 'je suis confuse', '2024-06-09 00:08:16'),
(5, 7, 'Merci docteur je vais passer demain dans la matinée', '2024-06-09 00:54:09'),
(6, 7, 'cher docteur je suis passée a l\'hôpital hier mais tous les services étaient fermés', '2024-06-14 20:08:38'),
(7, 7, 'Merci beaucoup pour cet éclaircissement', '2024-06-14 20:39:55'),
(8, 7, 'Puisse Dieu continuer a vous bénir', '2024-06-14 21:03:34'),
(9, 7, 'salut', '2024-07-01 08:32:13');

-- --------------------------------------------------------

--
-- Structure de la table `patient`
--

DROP TABLE IF EXISTS `patient`;
CREATE TABLE IF NOT EXISTS `patient` (
  `pid` int NOT NULL AUTO_INCREMENT,
  `pemail` varchar(255) DEFAULT NULL,
  `pname` varchar(255) DEFAULT NULL,
  `ppassword` varchar(255) DEFAULT NULL,
  `paddress` varchar(255) DEFAULT NULL,
  `pnic` varchar(15) DEFAULT NULL,
  `pdob` date DEFAULT NULL,
  `ptel` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `patient`
--

INSERT INTO `patient` (`pid`, `pemail`, `pname`, `ppassword`, `paddress`, `pnic`, `pdob`, `ptel`) VALUES
(1, 'patient@edoc.com', 'Test Patient', '123', 'Sri Lanka', '0000000000', '2000-01-01', '0120000000'),
(2, 'emhashenudara@gmail.com', 'Hashen Udara', '123', 'Sri Lanka', '0110000000', '2022-06-03', '0700000000'),
(3, 'mbuluku2864@gmail.com', 'David Mbuluku', '1234', 'Goma', '25610', '1998-07-03', '0971244063'),
(4, 'mbuluku2864@gmail.com', 'David Mbuluku', '1234', 'Goma', '25610', '1998-07-03', '0971244063'),
(5, 'alowambembo@gmail.com', 'Daniel Mbembo', '1234', 'Goma', '25610', '1999-11-11', '0971244063'),
(6, 'davidmbk22@gmail.com', 'David Mbuluku', '1234', 'Goma', '25610', '1998-07-03', '0971244063'),
(7, 'tegemeo.org2864@gmail.com', 'Gisella Mbuluku', '1234', 'goma', '25610', '1990-05-25', '0871244063'),
(8, 'da01@gmail.com', 'David Mbuluku', '1234', 'goma', '25610', '2024-05-14', '0971450634'),
(9, 'kalalamushiya5@gmail.com', 'Kalala Genyl', '1111', 'Goma', '25610', '2003-01-01', '0974329701');

-- --------------------------------------------------------

--
-- Structure de la table `plaintes`
--

DROP TABLE IF EXISTS `plaintes`;
CREATE TABLE IF NOT EXISTS `plaintes` (
  `plid` int NOT NULL AUTO_INCREMENT,
  `pid` int DEFAULT NULL,
  `docid` int DEFAULT NULL,
  `scheduleid` int DEFAULT NULL,
  `date_reception` date NOT NULL,
  `nature_plaintes` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `statut` varchar(20) NOT NULL,
  `date_resolution` date DEFAULT NULL,
  `commentaires` text,
  PRIMARY KEY (`plid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `plaintes`
--

INSERT INTO `plaintes` (`plid`, `pid`, `docid`, `scheduleid`, `date_reception`, `nature_plaintes`, `description`, `statut`, `date_resolution`, `commentaires`) VALUES
(1, 7, 24, 14, '2024-06-29', 'temps d\'attente', 'je me plain a ce propos car mon état était tellement déplorable et j\'a failli y passer j\'aimerais bien que le docteur en charge puisse remédier a cela', 'en cours', '0000-00-00', 'en attente'),
(2, 7, 2, 15, '2024-06-29', 'l\'apport d\'aide et le temps d\'attente', 'le problèmes a signaler et lié au fait que je suis presque a terme mais le responsable de distribution de fiche de finition de la cpn est tellement lent dans son service que j\'ai passé plus d\'une heure en attente pourtant je suis la troisième sur la liste d\'attente', 'en cours', '0000-00-00', 'en attente'),
(3, 7, 30, 12, '2024-06-29', 'l\'apport d\'aide et le temps d\'attente', 'teste', 'cas traité', '2024-06-29', 'test');

-- --------------------------------------------------------

--
-- Structure de la table `prescription`
--

DROP TABLE IF EXISTS `prescription`;
CREATE TABLE IF NOT EXISTS `prescription` (
  `prid` int NOT NULL AUTO_INCREMENT,
  `pid` int NOT NULL,
  `docid` int NOT NULL,
  `mid` int NOT NULL,
  `tid` int NOT NULL,
  `date_prescr` date NOT NULL,
  `date_fins` date NOT NULL,
  `instruction` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`prid`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `prescription`
--

INSERT INTO `prescription` (`prid`, `pid`, `docid`, `mid`, `tid`, `date_prescr`, `date_fins`, `instruction`) VALUES
(1, 1, 1, 1, 1, '2024-05-08', '2024-06-08', 'test'),
(2, 1, 1, 1, 2, '2024-05-09', '2024-05-16', 'test'),
(3, 7, 2, 1, 5, '2024-05-09', '2024-06-09', 'Il est important de noter que tous ces médicaments doivent être prescrits par un professionnel de santé qualifié, qui prendra en compte votre état de santé global, vos antécédents médicaux et d’autres facteurs importants.'),
(4, 7, 2, 4, 6, '2024-05-15', '2024-06-15', 'test'),
(5, 6, 2, 6, 9, '2024-06-01', '2024-06-30', 'test'),
(6, 6, 2, 8, 16, '2024-06-01', '2024-06-30', 'test2'),
(7, 6, 2, 1, 9, '0000-00-00', '0000-00-00', ''),
(8, 7, 2, 3, 29, '2024-06-09', '2024-06-23', 'ce médicament est a prendre avec modération car tout surdosage pourrait créer de retombés néfastes et parfois irréversibles ');

-- --------------------------------------------------------

--
-- Structure de la table `schedule`
--

DROP TABLE IF EXISTS `schedule`;
CREATE TABLE IF NOT EXISTS `schedule` (
  `scheduleid` int NOT NULL AUTO_INCREMENT,
  `docid` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `scheduledate` date DEFAULT NULL,
  `scheduletime` time DEFAULT NULL,
  `nop` int DEFAULT NULL,
  PRIMARY KEY (`scheduleid`),
  KEY `docid` (`docid`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `schedule`
--

INSERT INTO `schedule` (`scheduleid`, `docid`, `title`, `scheduledate`, `scheduletime`, `nop`) VALUES
(12, '30', 'Scan neurologique des personnes âgées ', '2025-01-31', '08:00:00', 350),
(11, '6', 'Coloscopie et traitement de la prostate', '2025-01-01', '07:30:00', 500),
(10, '2', 'Consultation et Traitement', '2024-05-17', '07:00:00', 150),
(15, '2', 'Consultation prenatale', '2025-04-30', '07:30:00', 530),
(14, '24', 'Analyse cardiaque et examen de labo', '2025-12-30', '07:30:00', 500);

-- --------------------------------------------------------

--
-- Structure de la table `specialties`
--

DROP TABLE IF EXISTS `specialties`;
CREATE TABLE IF NOT EXISTS `specialties` (
  `id` int NOT NULL,
  `sname` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `specialties`
--

INSERT INTO `specialties` (`id`, `sname`) VALUES
(1, 'Accident and emergency medicine'),
(2, 'Allergology'),
(3, 'Anaesthetics'),
(4, 'Biological hematology'),
(5, 'Cardiology'),
(6, 'Child psychiatry'),
(7, 'Clinical biology'),
(8, 'Clinical chemistry'),
(9, 'Clinical neurophysiology'),
(10, 'Clinical radiology'),
(11, 'Dental, oral and maxillo-facial surgery'),
(12, 'Dermato-venerology'),
(13, 'Dermatology'),
(14, 'Endocrinology'),
(15, 'Gastro-enterologic surgery'),
(16, 'Gastroenterology'),
(17, 'General hematology'),
(18, 'General Practice'),
(19, 'General surgery'),
(20, 'Geriatrics'),
(21, 'Immunology'),
(22, 'Infectious diseases'),
(23, 'Internal medicine'),
(24, 'Laboratory medicine'),
(25, 'Maxillo-facial surgery'),
(26, 'Microbiology'),
(27, 'Nephrology'),
(28, 'Neuro-psychiatry'),
(29, 'Neurology'),
(30, 'Neurosurgery'),
(31, 'Nuclear medicine'),
(32, 'Obstetrics and gynecology'),
(33, 'Occupational medicine'),
(34, 'Ophthalmology'),
(35, 'Orthopaedics'),
(36, 'Otorhinolaryngology'),
(37, 'Paediatric surgery'),
(38, 'Paediatrics'),
(39, 'Pathology'),
(40, 'Pharmacology'),
(41, 'Physical medicine and rehabilitation'),
(42, 'Plastic surgery'),
(43, 'Podiatric Medicine'),
(44, 'Podiatric Surgery'),
(45, 'Psychiatry'),
(46, 'Public health and Preventive Medicine'),
(47, 'Radiology'),
(48, 'Radiotherapy'),
(49, 'Respiratory medicine'),
(50, 'Rheumatology'),
(51, 'Stomatology'),
(52, 'Thoracic surgery'),
(53, 'Tropical medicine'),
(54, 'Urology'),
(55, 'Vascular surgery'),
(56, 'Venereology');

-- --------------------------------------------------------

--
-- Structure de la table `traitement`
--

DROP TABLE IF EXISTS `traitement`;
CREATE TABLE IF NOT EXISTS `traitement` (
  `tid` int NOT NULL AUTO_INCREMENT,
  `pid` int NOT NULL,
  `docid` int NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `dosage` varchar(255) NOT NULL,
  `frequence` varchar(255) NOT NULL,
  `date_dbt` date NOT NULL,
  `date_fin` date NOT NULL,
  `etat` varchar(255) NOT NULL,
  `effet_sec` text NOT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `traitement`
--

INSERT INTO `traitement` (`tid`, `pid`, `docid`, `nom`, `description`, `dosage`, `frequence`, `date_dbt`, `date_fin`, `etat`, `effet_sec`) VALUES
(1, 1, 1, 'test', 'test', 'test', 'once-weekly', '2024-05-02', '2024-05-31', 'test', 'test'),
(2, 1, 1, 'test2', 'test2', 'test2', 'every-other-day', '2024-05-02', '2024-06-02', 'test2', 'test2'),
(3, 1, 1, 'test3', 'test3', 'test3', 'twice-daily', '2024-05-02', '2024-06-02', 'test3', 'test3'),
(4, 7, 2, 'Traitement Cardiaque', 'Ce traitement vise a amélioré l\'état du patient , réguler sa fréquence cardiaque et amélioré la fluidité de la circulation sanguine', '20', 'three-times-daily', '2024-05-05', '2024-06-05', 'le patient se plain d\'une forte douleur au ventre, à la poitrine, des nausées et il a signalé une présence de vomissement', 'au début de ce traitement le patient sentira une légère douleur au bas de la colonne vertébrale et une augmentation de la nausée '),
(5, 7, 2, 'traitement antipaludique', 'TEST', '20', 'three-times-daily', '2024-05-07', '2024-05-14', 'TEST', 'TEST'),
(6, 7, 2, 'Traitement Cardiaque', 'test', '20', 'once-weekly', '2024-05-15', '2024-06-15', 'test', 'test'),
(7, 6, 0, 'Traitement Cardiaque', 'test', '20', 'three-times-daily', '2024-06-01', '2024-06-08', 'test', 'test'),
(8, 6, 0, 'Traitement Cardiaque', 'test', '20', 'three-times-daily', '2024-06-01', '2024-06-15', 'tets', 'test'),
(9, 6, 2, '', 'test', '20', 'three-times-daily', '2024-06-01', '2024-06-15', 'test', 'test'),
(10, 6, 2, 'Predinisolone', 'test', '20', 'three-times-daily', '2024-06-01', '2024-06-15', 'test', 'test'),
(11, 6, 2, 'Predinisolone', 'test', '20', 'three-times-daily', '2024-06-01', '2024-06-15', 'test', 'test'),
(12, 6, 2, 'Predinisolone', 'test', '20', 'three-times-daily', '2024-06-01', '2024-06-15', 'test', 'test'),
(13, 6, 2, '', '', '', 'once-daily', '0000-00-00', '0000-00-00', '', ''),
(14, 6, 2, '', '', '', 'once-daily', '0000-00-00', '0000-00-00', '', ''),
(15, 6, 2, '', '', '', 'once-daily', '0000-00-00', '0000-00-00', '', ''),
(16, 6, 2, 'fb', 'fb', '20', 'once-weekly', '2024-07-04', '2024-07-07', ' dzvfr', '2drw'),
(17, 6, 2, 'fb', 'fb', '20', 'once-weekly', '2024-07-04', '2024-07-07', ' dzvfr', '2drw'),
(18, 6, 2, 'fb', 'fb', '20', 'once-weekly', '2024-07-04', '2024-07-07', ' dzvfr', '2drw'),
(19, 6, 2, 'fb', 'fb', '20', 'once-weekly', '2024-07-04', '2024-07-07', ' dzvfr', '2drw'),
(20, 6, 2, 'fb', 'fb', '20', 'once-weekly', '2024-07-04', '2024-07-07', ' dzvfr', '2drw'),
(21, 6, 2, 'fb', 'fb', '20', 'once-weekly', '2024-07-04', '2024-07-07', ' dzvfr', '2drw'),
(22, 6, 2, 'fb', 'fb', '20', 'once-weekly', '2024-07-04', '2024-07-07', ' dzvfr', '2drw'),
(23, 6, 2, 'thbd', 'dnj', '20', 'every-other-day', '2024-06-01', '2024-06-29', 'dth', 'dtmj'),
(24, 6, 2, 'Predinisolone', 'test', '20', 'once-daily', '2024-06-01', '2024-07-01', 'test', 'test'),
(25, 6, 2, 'Predinisolone', 'test', '20', 'once-daily', '2024-06-01', '2024-07-01', 'test', 'test'),
(26, 6, 2, 'test', 'test', '2', 'once-daily', '2024-06-01', '2024-07-06', 'test', 'test'),
(27, 6, 2, 'Predinisolone', 'test', '20', 'twice-daily', '2024-06-01', '2024-06-08', 'test', 'test'),
(28, 6, 2, 'fb', 'test', '20', 'once-daily', '2024-06-01', '2024-06-08', 'test', 'test'),
(29, 7, 2, 'Traitement visant a remédier a une lombalgie', 'dans le tout début de ce traitement le patient va remarquer une perte de poids et un manque d\'appétit léger, il pourra probablement se plaindre d\'une nausée et des vertiges', '500', 'twice-daily', '2024-06-09', '2024-06-23', 'le patient ici présent se plaint de problème au niveau du ventre, présence de pestilences pas net et qui sentent les œufs pourris. pour ce faire je juge bon de procéder a une évaluation plus approfondie', 'la jaunisse se présente dans un premier cas mais rien de grave le patient prenant se traitement devra le signaler lors de son prochain rendez-vous');

-- --------------------------------------------------------

--
-- Structure de la table `webuser`
--

DROP TABLE IF EXISTS `webuser`;
CREATE TABLE IF NOT EXISTS `webuser` (
  `email` varchar(255) NOT NULL,
  `usertype` char(1) DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `webuser`
--

INSERT INTO `webuser` (`email`, `usertype`) VALUES
('admin@edoc.com', 'a'),
('doctor@edoc.com', 'd'),
('patient@edoc.com', 'p'),
('emhashenudara@gmail.com', 'p'),
('mbuluku2864@gmail.com', 'p'),
('alowambembo@gmail.com', 'p'),
('davidmbk22@gmail.com', 'p'),
('tegemeo.org2864@gmail.com', 'p'),
('docdan.edoc2864@gmail.com', 'd'),
('da01@gmail.com', 'p'),
('joel@edoc.com', 'd'),
('soni@edoc.com', 'd'),
('abraham@edoc.com', 'd'),
('ben@edoc.com', 'd'),
('dorcas@edoc.com', 'd'),
('archange@edoc.com', 'd'),
('luc@edoc.com', 'd'),
('gisela@edoc.com', 'd'),
('jean@edoc.com', 'd'),
('laurence@edoc.com', 'd'),
('achille@edoc.com', 'd'),
('kalalamushiya5@gmail.com', 'p');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
