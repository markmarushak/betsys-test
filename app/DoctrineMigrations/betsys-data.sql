/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

/*Data for the table `groups` */
insert  into `groups`(`id`,`name`) values (1,'Cleaners'),(2,'Office supply (paper, envelopes, etc)'),(3,'Telephone service'),(4,'Security');

/*Data for the table `supplier` */
insert  into `supplier`(`id`,`name`,`email`,`address`,`phone`) values (1,'Supplier','a@b.com','Address','1234567'),(2,'Supplier (without groups)','s@b.com','Suplliers address','321654987');

/*Data for the table `supplier_group` */
insert  into `supplier_group`(`supplier_id`,`group_id`) values (1,2),(1,4);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
