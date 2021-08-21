-- MySQL dump 10.13  Distrib 5.6.41, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: vacancytest
-- ------------------------------------------------------
-- Server version	5.6.24

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `quiz_questions`
--

DROP TABLE IF EXISTS `quiz_questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quiz_questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_name` text NOT NULL,
  `answer1` varchar(250) NOT NULL,
  `answer2` varchar(250) NOT NULL,
  `answer3` varchar(250) NOT NULL,
  `answer4` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quiz_questions`
--

LOCK TABLES `quiz_questions` WRITE;
/*!40000 ALTER TABLE `quiz_questions` DISABLE KEYS */;
INSERT INTO `quiz_questions` VALUES (1,'what is version of Cupcake','1.5','4.0','5.0','2.0'),(2,'what is version of Donut','3.0','1.6','1.7','1.8'),(3,'what is version of Eclair','2.0','3.0','4.0','5.0'),(4,'what is version of Froyo','2.1','2.2','2.1','2.0'),(5,'what is version of Gingerbread','2.3','2.2','2.5','2.4'),(6,'what is version of Honeycomb','3.0','4.0','5.0','6.0'),(7,'what is version of IceCreamSandWitch','4.0','4.1','5.1','6.5'),(8,'what is version of JellyBean','4.2','4.0','5.0','6.0'),(9,'what is version of KitKat','4.4','5.0','6.0','7.0'),(10,'what is version of Lollipop','5.0','4.0','6.0','7.0'),(11,'What does CSS stand for?\r\n\r\n	\r\n	\r\n	\r\n	','Creative Style Sheets','Colorful Style Sheets','Computer Style Sheets','Cascading Style Sheets'),(12,'Where in an HTML document is the correct place to refer to an external style sheet?\r\n\r\n	\r\n	\r\n	\r\n	','In the &lt;body&gt; section ','At the end of the document','At the top of the document','In the &lt;head&gt; section '),(13,'Which HTML tag is used to define an internal style sheet?\r\n\r\n	\r\n	\r\n	','&lt;script&gt;','&lt;css&gt;','&lt;style&gt;','&lt;link&gt;'),(14,'Which is the correct CSS syntax?\r\n\r\n	\r\n	\r\n	\r\n	','body:color=black;','{body;color:black;}','body {color: black;}','{body:color=black;}'),(15,'Which property is used to change the background color?\r\n\r\n	\r\n	\r\n	','background-color','color','bgcolor','bg-color'),(16,'What does PHP stand for?\r\n\r\n	\r\n	\r\n	',' PHP: Hypertext Preprocessor','Personal Hypertext Processor','Personal Home Page','Private Home Page'),(17,'PHP server scripts are surrounded by delimiters, which?\r\n\r\n	\r\n	\r\n	\r\n	','&lt;?php&gt;...&lt;/?&gt;','&lt;?php ... ?&gt;','&lt;script&gt;...&lt;/script&gt;','&lt;&amp;&gt;...&lt;/&amp;&gt;'),(18,'How do you write \"Hello World\" in PHP\r\n\r\n	\r\n	\r\n	','&quot;Hello World&quot;','echo &quot;Hello World&quot;','Document.Write(&quot;Hello World&quot;);','print_f(&quot;Hello World&quot;);'),(19,' Which of the following is the way to create comments in PHP?\r\n\r\n\r\n	\r\n	\r\n	','// commented code to end of line','/* commented code here */','# commented code to end of line','all of the above - correct'),(20,'What is the correct way to end a PHP statement?\r\n\r\n	\r\n	\r\n	\r\n	','&lt;/php&gt;','.',';','New line');
/*!40000 ALTER TABLE `quiz_questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quiz_users`
--

DROP TABLE IF EXISTS `quiz_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quiz_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `level` char(1) NOT NULL DEFAULT '1',
  `correctAnswers` int(11) DEFAULT NULL,
  `worngAnswers` int(11) DEFAULT NULL,
  `totalAttempted` int(11) DEFAULT NULL,
  `correctAnswersLevel2` int(11) DEFAULT NULL,
  `worngAnswersLevel2` int(11) DEFAULT NULL,
  `totalAttemptedLevel2` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quiz_users`
--

LOCK TABLES `quiz_users` WRITE;
/*!40000 ALTER TABLE `quiz_users` DISABLE KEYS */;
INSERT INTO `quiz_users` VALUES (1,'suneel','rajan.raj@bradsol.com','af88a0ae641589b908fa8b31f0fcf6e1','2',5,2,7,4,2,6,'2020-05-10 18:37:23','2020-05-11 12:36:15'),(2,'Indukuru Sunil','rohit.bhattad@bradsol.com','af88a0ae641589b908fa8b31f0fcf6e1','2',0,1,1,0,0,0,'2020-05-11 12:58:03','2020-05-11 12:59:27'),(3,'Indukuru Sunil','suneel.indukuru@bradsol.com','202cb962ac59075b964b07152d234b70','2',7,3,10,2,6,8,'2020-05-11 13:02:09','2020-05-11 13:03:47'),(4,'suneel.indukuru@bradsol.com','rajan.raj1@bradsol.com','af88a0ae641589b908fa8b31f0fcf6e1','2',7,3,10,8,1,9,'2020-05-11 13:06:32','2020-05-11 13:08:43');
/*!40000 ALTER TABLE `quiz_users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-05-11 13:10:21
