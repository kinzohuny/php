create database vote;
use vote;

create table `vote_baseinfo` (
  `mobile` varchar(11) not null,
  `sex` int(1) default null comment '1��2Ů',
  `age` int(1) default null comment '1:25-,2:26-60,3:61+',
  `profession` int(1) default null comment '1��������2��ҵ��λ3��ҵ4����ְҵ��5ѧ��6����',
  `city` int(1) default null comment '1��ֱ 2����',
  `county` int(2) default null comment '0��ֱ 1������ 2���� 3����� 4������ 5������ 6������ 7�̰��� 8������ 9�İ��� 10�����',
  `created` timestamp null default null,
  `ip` varchar(16) default null,
  primary key (`mobile`)
) engine=innodb default charset=utf8;

create table `vote_questionx` (
  `mobile` varchar(11) not null,
  `county` int(2) default null comment '1������ 2���� 3����� 4������ 5������ 6������ 7�̰��� 8������ 9�İ��� 10�����',
  `x01` int(1) default null comment '4����3����2һ��1�ϲ�0���˽�',
  `x02` int(1) default null comment '4����3����2һ��1�ϲ�0���˽�',
  `x03` int(1) default null comment '4����3����2һ��1�ϲ�0���˽�',
  `x04` int(1) default null comment '4����3����2һ��1�ϲ�0���˽�',
  `x05` int(1) default null comment '4����3����2һ��1�ϲ�0���˽�',
  `x06` int(1) default null comment '4����3����2һ��1�ϲ�0���˽�',
  `suggest0` text,
  `x11` int(1) default null comment '4����3����2һ��1�ϲ�0���˽�',
  `x12` int(1) default null comment '4����3����2һ��1�ϲ�0���˽�',
  `x13` int(1) default null comment '4����3����2һ��1�ϲ�0���˽�',
  `x14` int(1) default null comment '4����3����2һ��1�ϲ�0���˽�',
  `x15` int(1) default null comment '4����3����2һ��1�ϲ�0���˽�',
  `x16` int(1) default null comment '4����3����2һ��1�ϲ�0���˽�',
  `x17` int(1) default null comment '4����3����2һ��1�ϲ�0���˽�',
  `x18` int(1) default null comment '4����3����2һ��1�ϲ�0���˽�',
  `suggest1` text,
  `created` timestamp null default null,
  primary key (`mobile`)
) engine=innodb default charset=utf8;

create table `vote_questionz` (
  `mobile` varchar(11) not null,
  `z01` int(1) default null comment '�м�ί�����֣� 4����3����2һ��1�ϲ�0���˽�',
  `z02` int(1) default null comment '��ί�칫��',
  `z03` int(1) default null comment '�������칫��',
  `z04` int(1) default null comment '���˴����',
  `z05` int(1) default null comment '����Э����',
  `z06` int(1) default null comment '��ί��֯��',
  `z07` int(1) default null comment '��ί������',
  `z08` int(1) default null comment '��ίͳս��',
  `z09` int(1) default null comment '��ίũ����',
  `z10` int(1) default null comment '��ί����ί',
  `z11` int(1) default null comment '��ί�о���',
  `z12` int(1) default null comment '��ֱ��ί',
  `z13` int(1) default null comment '�б��',
  `z14` int(1) default null comment '���ŷþ�',
  `z15` int(1) default null comment '��ί�ϸɲ���',
  `z16` int(1) default null comment '��ί��ʷ�о���',
  `z17` int(1) default null comment '��ί��У',
  `z18` int(1) default null comment '�нӴ���',
  `z19` int(1) default null comment '���ܹ���',
  `z20` int(1) default null comment '����ί',
  `z21` int(1) default null comment '�и���',
  `z22` int(1) default null comment '������',
  `z23` int(1) default null comment '�й�����',
  `z24` int(1) default null comment '�п�Э',
  `z25` int(1) default null comment '�в���',
  `z26` int(1) default null comment '��ó�ٻ�',
  `z27` int(1) default null comment '�о����о�����',
  `z28` int(1) default null comment '�е�����',
  `z29` int(1) default null comment '�з���ί',
  `z30` int(1) default null comment '�пƼ���',
  `z31` int(1) default null comment '�й��ž�',
  `z32` int(1) default null comment '�в�����',
  `z33` int(1) default null comment '��ũ����',
  `z34` int(1) default null comment '�н�ͨ��',
  `z35` int(1) default null comment '��ˮ���',
  `z36` int(1) default null comment '��ũҵ��',
  `z37` int(1) default null comment '����ҵ��',
  `z38` int(1) default null comment '�������',
  `z39` int(1) default null comment '�й���ί',
  `z40` int(1) default null comment '��ͳ�ƾ�',
  `z41` int(1) default null comment '�����ξ�',
  `z42` int(1) default null comment '�й�����',
  `z43` int(1) default null comment 'ͳ���',
  `z44` int(1) default null comment '���м�����Ժ',
  `z45` int(1) default null comment '��������Ժ',
  `z46` int(1) default null comment '�й�����',
  `z47` int(1) default null comment '��˾����',
  `z48` int(1) default null comment '�л�����',
  `z49` int(1) default null comment '�з��ܾ�',
  `z50` int(1) default null comment '����ƾ�',
  `z51` int(1) default null comment '�а����',
  `z52` int(1) default null comment '��ҩ���',
  `z53` int(1) default null comment '����۾�',
  `z54` int(1) default null comment '�н����',
  `z55` int(1) default null comment '�г���滮��',
  `z56` int(1) default null comment '���ۺ�ִ����',
  `z57` int(1) default null comment '�й��̾�',
  `z58` int(1) default null comment '���ʼ��',
  `z59` int(1) default null comment '�н�����',
  `z60` int(1) default null comment '�����ھ�',
  `z61` int(1) default null comment '��������',
  `z62` int(1) default null comment '�������',
  `z63` int(1) default null comment '���Ĺ��¾�',
  `z64` int(1) default null comment '������ί',
  `z65` int(1) default null comment '��������',
  `z66` int(1) default null comment '����ʳ��',
  `z67` int(1) default null comment '�����°�',
  `z68` int(1) default null comment '�е����',
  `z69` int(1) default null comment '��ס��������',
  `z70` int(1) default null comment '���нֹ�ί��',
  `z71` int(1) default null comment '�л�����',
  `z72` int(1) default null comment '�������',
  `z73` int(1) default null comment '�ȷ��ձ���',
  `z74` int(1) default null comment '�ȷ��㲥����̨',
  `z75` int(1) default null comment '�ȷ�ְ��ѧԺ',
  `z76` int(1) default null comment '�ྩְ��ѧԺ',
  `z77` int(1) default null comment '�ȷ�����ѧԺ',
  `z78` int(1) default null comment '�е�����ϢѧУ',
  `z79` int(1) default null comment '�е��',
  `z80` int(1) default null comment '�и߼�����ѧУ',
  `z81` int(1) default null comment '����У',
  `z82` int(1) default null comment '��ũ��Ժ',
  `z83` int(1) default null comment '��ҽԺ',
  `z84` int(1) default null comment '����ҽԺ',
  `z85` int(1) default null comment '�е���ҽԺ',
  `z86` int(1) default null comment '��һ��',
  `z87` int(1) default null comment '�ܵ�����ѧ',
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

insert  into `vote_city`(`code`,`name`) values (1,'��ֱ'),(2,'����');

/*Table structure for table `vote_county` */

DROP TABLE IF EXISTS `vote_county`;

CREATE TABLE `vote_county` (
  `code` int(2) NOT NULL,
  `name` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

insert  into `vote_county`(`code`,`name`) values (0,'��ֱ'),(1,'������'),(2,'����'),(3,'�����'),(4,'������'),(5,'������'),(6,'������'),(7,'�̰���'),(8,'������'),(9,'�İ���'),(10,'�����');
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
