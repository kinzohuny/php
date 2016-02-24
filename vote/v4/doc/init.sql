create database vote;
use vote;

create table `vote_baseinfo` (
  `mobile` varchar(11) not null,
  `sex` int(1) default null comment '1男2女',
  `age` int(1) default null comment '1:25-,2:26-60,3:61+',
  `profession` int(1) default null comment '1行政机关2事业单位3企业4自由职业者5学生6其他',
  `city` int(1) default null comment '1市直 2区县',
  `county` int(2) default null comment '0市直 1三河市 2大厂县 3香河县 4广阳区 5安次区 6永清县 7固安县 8霸州市 9文安县 10大城县',
  `created` timestamp null default null,
  `ip` varchar(16) default null,
  primary key (`mobile`)
) engine=innodb default charset=utf8;

create table `vote_questionx` (
  `mobile` varchar(11) not null,
  `county` int(2) default null comment '1三河市 2大厂县 3香河县 4广阳区 5安次区 6永清县 7固安县 8霸州市 9文安县 10大城县',
  `x01` int(1) default null comment '4优秀3良好2一般1较差0不了解',
  `x02` int(1) default null comment '4优秀3良好2一般1较差0不了解',
  `x03` int(1) default null comment '4优秀3良好2一般1较差0不了解',
  `x04` int(1) default null comment '4优秀3良好2一般1较差0不了解',
  `x05` int(1) default null comment '4优秀3良好2一般1较差0不了解',
  `x06` int(1) default null comment '4优秀3良好2一般1较差0不了解',
  `suggest0` text,
  `x11` int(1) default null comment '4优秀3良好2一般1较差0不了解',
  `x12` int(1) default null comment '4优秀3良好2一般1较差0不了解',
  `x13` int(1) default null comment '4优秀3良好2一般1较差0不了解',
  `x14` int(1) default null comment '4优秀3良好2一般1较差0不了解',
  `x15` int(1) default null comment '4优秀3良好2一般1较差0不了解',
  `x16` int(1) default null comment '4优秀3良好2一般1较差0不了解',
  `x17` int(1) default null comment '4优秀3良好2一般1较差0不了解',
  `x18` int(1) default null comment '4优秀3良好2一般1较差0不了解',
  `suggest1` text,
  `created` timestamp null default null,
  primary key (`mobile`)
) engine=innodb default charset=utf8;

create table `vote_questionz` (
  `mobile` varchar(11) not null,
  `z01` int(1) default null comment '市纪委（监察局） 4优秀3良好2一般1较差0不了解',
  `z02` int(1) default null comment '市委办公室',
  `z03` int(1) default null comment '市政府办公室',
  `z04` int(1) default null comment '市人大机关',
  `z05` int(1) default null comment '市政协机关',
  `z06` int(1) default null comment '市委组织部',
  `z07` int(1) default null comment '市委宣传部',
  `z08` int(1) default null comment '市委统战部',
  `z09` int(1) default null comment '市委农工部',
  `z10` int(1) default null comment '市委政法委',
  `z11` int(1) default null comment '市委研究室',
  `z12` int(1) default null comment '市直工委',
  `z13` int(1) default null comment '市编办',
  `z14` int(1) default null comment '市信访局',
  `z15` int(1) default null comment '市委老干部局',
  `z16` int(1) default null comment '市委党史研究室',
  `z17` int(1) default null comment '市委党校',
  `z18` int(1) default null comment '市接待办',
  `z19` int(1) default null comment '市总工会',
  `z20` int(1) default null comment '团市委',
  `z21` int(1) default null comment '市妇联',
  `z22` int(1) default null comment '市文联',
  `z23` int(1) default null comment '市工商联',
  `z24` int(1) default null comment '市科协',
  `z25` int(1) default null comment '市残联',
  `z26` int(1) default null comment '市贸促会',
  `z27` int(1) default null comment '市经济研究中心',
  `z28` int(1) default null comment '市档案局',
  `z29` int(1) default null comment '市发改委',
  `z30` int(1) default null comment '市科技局',
  `z31` int(1) default null comment '市工信局',
  `z32` int(1) default null comment '市财政局',
  `z33` int(1) default null comment '市农开办',
  `z34` int(1) default null comment '市交通局',
  `z35` int(1) default null comment '市水务局',
  `z36` int(1) default null comment '市农业局',
  `z37` int(1) default null comment '市林业局',
  `z38` int(1) default null comment '市商务局',
  `z39` int(1) default null comment '市国资委',
  `z40` int(1) default null comment '市统计局',
  `z41` int(1) default null comment '市旅游局',
  `z42` int(1) default null comment '市供销社',
  `z43` int(1) default null comment '统筹办',
  `z44` int(1) default null comment '市中级人民法院',
  `z45` int(1) default null comment '市人民检察院',
  `z46` int(1) default null comment '市公安局',
  `z47` int(1) default null comment '市司法局',
  `z48` int(1) default null comment '市环保局',
  `z49` int(1) default null comment '市房管局',
  `z50` int(1) default null comment '市审计局',
  `z51` int(1) default null comment '市安监局',
  `z52` int(1) default null comment '市药监局',
  `z53` int(1) default null comment '市物价局',
  `z54` int(1) default null comment '市建设局',
  `z55` int(1) default null comment '市城乡规划局',
  `z56` int(1) default null comment '市综合执法局',
  `z57` int(1) default null comment '市工商局',
  `z58` int(1) default null comment '市质监局',
  `z59` int(1) default null comment '市教育局',
  `z60` int(1) default null comment '市民宗局',
  `z61` int(1) default null comment '市民政局',
  `z62` int(1) default null comment '市人社局',
  `z63` int(1) default null comment '市文广新局',
  `z64` int(1) default null comment '市卫计委',
  `z65` int(1) default null comment '市体育局',
  `z66` int(1) default null comment '市粮食局',
  `z67` int(1) default null comment '市外事办',
  `z68` int(1) default null comment '市地震局',
  `z69` int(1) default null comment '市住房公积金',
  `z70` int(1) default null comment '步行街管委会',
  `z71` int(1) default null comment '市机场办',
  `z72` int(1) default null comment '市政务办',
  `z73` int(1) default null comment '廊坊日报社',
  `z74` int(1) default null comment '廊坊广播电视台',
  `z75` int(1) default null comment '廊坊职技学院',
  `z76` int(1) default null comment '燕京职技学院',
  `z77` int(1) default null comment '廊坊卫生学院',
  `z78` int(1) default null comment '市电子信息学校',
  `z79` int(1) default null comment '市电大',
  `z80` int(1) default null comment '市高级技工学校',
  `z81` int(1) default null comment '市体校',
  `z82` int(1) default null comment '市农科院',
  `z83` int(1) default null comment '市医院',
  `z84` int(1) default null comment '市中医院',
  `z85` int(1) default null comment '市第三医院',
  `z86` int(1) default null comment '市一中',
  `z87` int(1) default null comment '管道局中学',
  `suggest` text,
  `created` timestamp null default null,
  primary key (`mobile`)
) engine=innodb default charset=utf8;

/*Table structure for table `vote_city` */

DROP TABLE IF EXISTS `vote_city`;

CREATE TABLE `vote_city` (
  `code` int(1) NOT NULL,
  `name` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

insert  into `vote_city`(`code`,`name`) values (1,'市直'),(2,'区县');

/*Table structure for table `vote_county` */

DROP TABLE IF EXISTS `vote_county`;

CREATE TABLE `vote_county` (
  `code` int(2) NOT NULL,
  `name` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

insert  into `vote_county`(`code`,`name`) values (0,'市直'),(1,'三河市'),(2,'大厂县'),(3,'香河县'),(4,'广阳区'),(5,'安次区'),(6,'永清县'),(7,'固安县'),(8,'霸州市'),(9,'文安县'),(10,'大城县');
create table `vote_admin` (
  `id` int(11) not null auto_increment,
  `name` varchar(20) default null,
  `pswd` varchar(32) default null,
  `created` timestamp not null default current_timestamp on update current_timestamp,
  `logined` timestamp not null default '0000-00-00 00:00:00',
  `ip` varchar(16) default null,
  primary key (`id`)
) engine=innodb auto_increment=2 default charset=utf8;

insert into `vote_admin`(`name`,`pswd`,`created`) values ('system32',md5('1qaz@WSX'),now());
