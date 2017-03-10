/*
SQLyog v10.2 
MySQL - 5.6.17 : Database - onexplorer2
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`onexplorer2` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `onexplorer2`;

/*Table structure for table `article` */

DROP TABLE IF EXISTS `article`;

CREATE TABLE `article` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `userid` bigint(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `shortcontent` text NOT NULL,
  `titletime` date NOT NULL,
  `supportsum` bigint(20) unsigned NOT NULL DEFAULT '0',
  `shortimgsrc` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=146 DEFAULT CHARSET=utf8;

/*Data for the table `article` */

insert  into `article`(`id`,`userid`,`title`,`address`,`shortcontent`,`titletime`,`supportsum`,`shortimgsrc`) values (134,2,'岳阳楼记','岳阳楼','众所周知，岳阳楼因为范仲淹的《岳阳楼记》闻名天下。《岳阳楼记》我已背得滚瓜烂熟了，但岳阳楼的真面目我还从未见识过。这次有机会和同学们一起游览雄伟壮丽的岳阳楼，饱览&nbsp;洞庭湖的波澜壮阔，我感到万','2016-06-25',5,'/Uploads/20160625/1466845351972948.jpg|/Uploads/20160625/1466845427436428.jpg|/Uploads/20160625/1466845466348815.jpg'),(135,2,'长沙之行--长沙世界之窗','长沙世界之窗','长沙世界之窗将世界各国的今古奇观、历史遗迹、风光名胜、建筑民居、各种形式的艺术杰作以及风土人情和歌舞表演汇集于一园。景区内100多个景点建筑采用\r\n不同比例，为游客创造出一个多层次、高品位、有韵味的游','2016-06-25',14,'/Uploads/20160625/1466846224134405.jpg|/Uploads/20160625/1466846439939814.jpg|/Uploads/20160625/1466846455138248.jpg'),(138,2,'未到江南先一笑，岳阳楼上对君山','君山岛','“未到江南先一笑，岳阳楼上对君山”。君山系洞庭湖中小岛，位于岳阳市区西南方，水程12公里。总面积0.98平方公里.与千古名楼岳阳楼隔湖相望。是一个山体呈椭圆形，两旁高、中间低的小岛。山上有大小峰72个','2016-08-23',8,'/Uploads/20160823/1471942072437547.jpg|/Uploads/20160823/1471942072143037.jpg|/Uploads/20160823/1471942072186843.jpg'),(139,2,'株洲方特欢乐世界','株洲','株洲方特欢乐世界由飞越极限、星际航班、恐龙危机、生命之光、海螺湾、逃出恐龙岛、维苏威火山、聊斋、宇宙博览会、火流星、探险乐园等十几个主题项目区组\r\n成，包含主题项目、游乐项目、休闲景观项目以及配套服务','2016-08-23',21,'/Uploads/20160823/1471942705203970.jpg|/Uploads/20160823/1471942728435954.jpg|/Uploads/20160823/1471942765802026.jpg'),(140,2,'长沙海底世界，见证海底浪漫','长沙海底世界','长沙海底世界位于长沙市开福区，由海洋馆、极地动物馆、科教馆、水上乐园、儿童乐园等区域组成，整个海底世界面积不大，各个区域间相距也不远，游客能够轻\r\n松在景区内步行游玩。景区内的海洋馆，拥有中南地区最长','2016-08-23',50,'/Uploads/20160823/1471943070768676.jpg|/Uploads/20160823/1471943070974110.jpg|/Uploads/20160823/1471943136929572.jpg'),(141,2,'岳麓书院，文化气息','岳麓山','历史上著名的书院，宋代理学家朱熹在这里讲过课，清代的封疆大吏曾国藩、左宗棠在这里读过书。书院始建于北宋，近代培养出曾国藩、左宗棠、郭嵩寿、程潜等历史名人。如今的书院，是湖南大学的下属学院。岳麓书院的中','2016-08-23',46,'/Uploads/20160823/1471943452394945.jpg|/Uploads/20160823/1471943452120295.jpg|/Uploads/20160823/1471943452122175.jpg|/Uploads/20160823/1471943452392708.jpg');

/*Table structure for table `articlemain` */

DROP TABLE IF EXISTS `articlemain`;

CREATE TABLE `articlemain` (
  `titleid` bigint(20) unsigned NOT NULL,
  `content` text NOT NULL,
  `imgsrc` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`titleid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `articlemain` */

insert  into `articlemain`(`titleid`,`content`,`imgsrc`) values (134,'<p>众所周知，岳阳楼因为范仲淹的《岳阳楼记》闻名天下。《岳阳楼记》我已背得滚瓜烂熟了，但岳阳楼的真面目我还从未见识过。这次有机会和同学们一起游览雄伟壮丽的岳阳楼，饱览&nbsp;洞庭湖的波澜壮阔，我感到万分的欣喜和荣幸。</p><p><img src=\"/Uploads/20160625/1466845351972948.jpg\" title=\"1466845351972948.jpg\" alt=\"5b28719100aef172886d87b66cabbc6a.jpg\" height=\"361\" width=\"608\"/></p><p>&nbsp;&nbsp;&nbsp; 这\r\n天风和日丽，真是游览洞庭湖的好天气。下了汽车向大门走，“巴陵胜状”四个大字率先闪入眼中。我们迫不及待地冲了进门。首先呈现在眼前的是从唐朝到现在历\r\n代的岳阳楼模型。从这里我们能了解到岳阳楼经过多个朝代的重修和改进，终于形成了今天别具特色的摸样。往前走去，我们看到了一个刻着“北通巫峡”的牌坊。\r\n不用想也知道，另一个方向也一定立着个“南极潇湘”的牌坊。</p><p><img src=\"/Uploads/20160625/1466845427436428.jpg\" title=\"1466845427436428.jpg\" alt=\"a597bcabe5fa003fba0c8358fc7f98fb.jpg\" height=\"386\" width=\"667\"/></p><p>&nbsp;&nbsp;&nbsp; 过了牌坊，金碧辉煌的岳阳楼终于映入眼帘。岳阳楼有三层高，每层都是金光闪闪\r\n的琉璃瓦顶，远望去，如同一只金色的巨鹰蹲踞在洞庭湖边，展翅欲飞。在导游的带领下，满怀期待的我们终于步入了岳阳楼。楼的内部并不宽敞，游客多得摩肩接\r\n踵。一楼摆放着一块大牌子，黑底金字，刻的是《岳阳楼记》。上了二楼，我们惊奇地发现有一块一模一样的牌子。听了导游的讲解，才知道一楼的只是雁品，二楼\r\n的才是宝贵的真迹。</p><p><img src=\"/Uploads/20160625/1466845466348815.jpg\" title=\"1466845466348815.jpg\" alt=\"54909238c2bc67208b242610f6469859.jpg\" height=\"210\" width=\"652\"/></p><p>&nbsp;&nbsp;&nbsp; 顶楼的陈设比较简单，但内涵却十分丰厚。墙上挂着一幅对联——水天一色&nbsp;风月无边。简明生动地慨括出了洞庭湖雄伟壮丽\r\n的胜状。在这里是观赏洞庭湖的最佳地点，从窗户放眼望去，洞庭湖的美景尽收眼前。湖面波平浪静，上下天色与湖光相接，一望无垠。几只沙鸥在空中飞翔，时而\r\n俯冲下来，横掠水面，给深邃迷人的洞庭湖又增添了几分惬意。面对如此壮丽雄浑的湖光山色，不由得使我吟起“衔远山，吞长江，浩浩汤汤，横无际涯；朝晖夕\r\n阴，气象万千，此则岳阳楼之大观也！”的名段来。此景此物，也终于让我领略到了“上下天光，一碧万顷，沙鸥翔集，锦鳞游泳，岸芷汀兰，郁郁青青”的壮阔景\r\n象。“气蒸云梦泽，波撼岳阳城。”洞庭湖的磅礴壮阔已使我如如痴如醉。此时此刻，站在岳阳楼上，望着洞庭湖水，我终于领悟了范仲淹的“先天下之忧而忧，后\r\n天下之乐而乐”，对他的远大抱负深感佩服。<br/>&nbsp;&nbsp;&nbsp;&nbsp;“洞庭天下湖，岳阳天下水”。岳阳楼的绰约风姿，洞庭湖的雄浑博大，真让我走进了如诗如画般的仙境，叫人不得不为之倾心动容，赞叹不已。</p>',NULL),(135,'<p style=\"text-align:center\"><img src=\"/Uploads/20160625/1466846224134405.jpg\" title=\"1466846224134405.jpg\" alt=\"0acc30a2d946d6a2dbd415a56c7d16d4.jpg\"/></p><p>长沙世界之窗将世界各国的今古奇观、历史遗迹、风光名胜、建筑民居、各种形式的艺术杰作以及风土人情和歌舞表演汇集于一园。景区内100多个景点建筑采用\r\n不同比例，为游客创造出一个多层次、高品位、有韵味的游览空间。这里有异域风格建筑与现代商业文化交融的国际商业街，有世界名胜古迹与人类经典建筑荟萃的\r\n文明山及文明河，有“惟楚有材”百人群雕与鳞次而立吊脚楼交相辉映的<a target=\"_blank\" href=\"http://baike.baidu.com/view/48301.htm\">湘江</a>谷，有美国西部风光与印地安文化尽现的<a target=\"_blank\" href=\"http://baike.baidu.com/view/16055.htm\">欢乐谷</a>，有典雅的欧式建筑与美丽爱情故事联姻的爱情 谷，有绚丽多彩、风姿各异的亚洲诸国文化相互浸润的神秘谷，有童趣盎然的娱乐城堡与妙趣横生的超大比例玩具组合而成的儿童乐园……，<a target=\"_blank\" href=\"http://baike.baidu.com/view/593175.htm\">德国新天鹅城堡</a>（见图片一）、<a target=\"_blank\" href=\"http://baike.baidu.com/view/434033.htm\">埃及亚历山大灯塔</a>（见图片二）、意大利圣<a target=\"_blank\" href=\"http://baike.baidu.com/view/171154.htm\">三山</a>教堂，120个世界各国名胜古迹各占地势，构筑了厚重的人文历史，彰显了浓郁的异国风情。既有微缩景观的精巧别致，又有大比例的艺术夸张，集娱乐性、趣味性、刺激性与浓厚文化内涵于一身。长沙世界之窗的室内环境、民居陈饰、民俗风情、<a target=\"_blank\" href=\"http://baike.baidu.com/view/1010500.htm\">体育经济</a>、中外民间杂技、杂耍、绝技、魔术、戏剧、曲艺、歌舞以定点表演、流动表演、广场巡游等多种表演形式展现在游人面前。高科技的动感电影、水幕电影和激光音乐喷泉，更使您流连忘返。</p><p><img src=\"/Uploads/20160625/1466846439939814.jpg\" title=\"1466846439939814.jpg\" alt=\"6d87c763bb619139a48c5895560373c0.jpg\"/><br/></p><p><img src=\"/Uploads/20160625/1466846455138248.jpg\" title=\"1466846455138248.jpg\" alt=\"33cdb4445d0298e3fb70eea074c4e8c7.jpg\"/><br/></p><p><img src=\"/Uploads/20160625/1466846469129529.jpg\" title=\"1466846469129529.jpg\" alt=\"98f68ac488de33da30789d1d2138fee3.jpg\"/></p><p>作为<a target=\"_blank\" href=\"http://baike.baidu.com/view/1450351.htm\">中南地区</a>最新潮的水上狂欢乐园，长沙世界之窗新概念<a target=\"_blank\" href=\"http://baike.baidu.com/view/43739.htm\">水上乐园</a>在精心运营两年后昨日再次升级登场，超级冲浪板领衔的数十项顶尖<a target=\"_blank\" href=\"http://baike.baidu.com/view/3732685.htm\">水上游乐设施</a>继续免费向所有游客开放。其中斥资500万元建造的超级冲浪板上下落差达25米，游客们可坐在充气的皮划艇内，从冲浪板的一端顺坡高速滑下，在“U”型槽中左右摆动。此外，组合滑道、标准泳池、七彩波浪滑梯、家庭竞速滑道、儿童梦幻水屋等也将为游客提供不一样的感受。</p><p><img src=\"/Uploads/20160625/1466846501126250.jpg\" title=\"1466846501126250.jpg\" alt=\"994455f7403892579783f31028e43815.jpg\"/></p><p><img src=\"/Uploads/20160625/1466846515393998.jpg\" title=\"1466846515393998.jpg\" alt=\"9ebe90fbe9bc1007cf5dcce5e41debd0.jpg\"/></p>',NULL),(138,'<p>“未到江南先一笑，岳阳楼上对君山”。君山系洞庭湖中小岛，位于岳阳市区西南方，水程12公里。总面积0.98平方公里.与千古名楼岳阳楼隔湖相望。是一个山体呈椭圆形，两旁高、中间低的小岛。山上有大小峰72个。</p><p>　\r\n　君山在岳阳市西南15公里的洞庭湖中。是一座面积不足100公顷的小岛。原名洞府山，取意神仙“洞府之庭”。传说这座“洞庭山浮于水上，其下有金堂数百\r\n间，玉女居之，四时闻金石丝竹之声，砌于山顶”。这浪漫神话传说，不足为信。后因舜帝的两个妃子娥皇、女英葬于此，屈原在《九歌》中称之为湘君和湘夫人，\r\n故后人将此山改名为君山。 &nbsp;</p><p>　　君山，由七十二峰组成，峰峰灵秀，“烟波不动景沉沉，碧色全无翠色深。疑是水仙梳洗处，一螺青黛镜中\r\n心。”这灵景不知陶醉了多少文人墨客，那神奇美妙的传说，更引人遐想。弃舟登山，可先谒“舜帝二妃之墓。”墓两边的石刻对联是：“君妃二魄芳千古，山竹诸\r\n斑泪一人。”这“泪一人”典出：虞舜南巡，崩于苍梧，他的两个爱妃娥皇和女寻夫来到洞府山，忽闻噩耗，悲痛万分，遂攀竹痛哭，泪血滴在竹子上，竟成斑竹。\r\n二妃因悲恸而死于君山并葬此。 \r\n从二妃墓翻过一道山梁，走不远。就到了“柳毅井”。唐代李朝威写的《柳毅传书》的故事，就发生在这里。西山有杨么寨，相传是南宋初年洞庭湖农民起义军领袖\r\n杨么兵营的遗址。从此出走，便到酒香山。传说山上有美酒，喝了能成仙。想长生不老的汉武帝听说后，便派文士栾巴到君山求酒。酒求回后，便被东方朔俞喝了，\r\n后来闹出一场笑话。 &nbsp;</p><p>　　君山地形独特，为洞庭湖中最大岛屿，岛上历有36亭，48庙、秦始皇的封山印，汉武帝的“射蛟台”等珍贵文物遗址。</p><p style=\"text-align: center\"><img src=\"/Uploads/20160823/1471942072437547.jpg\" title=\"1471942072437547.jpg\"/></p><p style=\"text-align: center\"><img src=\"/Uploads/20160823/1471942072143037.jpg\" title=\"1471942072143037.jpg\"/></p><p style=\"text-align: center\"><img src=\"/Uploads/20160823/1471942072186843.jpg\" title=\"1471942072186843.jpg\"/></p><p>现挂在君山龙舌山中部一钢筋水泥预制亭上。一种传说是南宋杨幺起义军驻君山时，深受百姓爱戴，集资铸了这口大铁钟和一口大得出奇的长方形铁锅（万人锅），夜里悄悄运上君山。天亮时，义军发现大钟，以为是神仙相助，从天外飞来，故名。又说这口钟很灵，只要官兵稍有动静，便自鸣报警，钟声宏亮，声闻10里，使起义军能及时防备，所以又叫“报警飞来钟。”《巴陵县志》\r\n有飞来钟“自洞庭飞来，并能自鸣”记录。另外一个传说是相传一天夜晚，朝廷派兵前来偷袭驻扎在君山的杨幺寨，忽然从天上飞来一口巨钟，钟声阵阵，催醒义\r\n军，奋起抗敌，因此叫飞来钟。总之这都是人们深切怀念杨幺起义军，用各种方式来表达赞美之情。古钟的传说便寄托了人们的这种心情。实际上，飞来钟原为君山\r\n崇胜寺的古钟，南宋淳佑五年（公元1245年），荆湖安抚制置使孟珙重修崇胜寺时复制一钟，钟高一丈多，大数围，重4000余斤，上有&quot;淳佑五年造&quot;，钟\r\n身上铸有&quot;皇帝万岁，国泰民安，风调雨顺，五谷丰登&quot;16个大字，四方凸出的部分用青铜浇铸的四条金龙，栩栩如生，形态逼真。1966年“文化大革命”时被砸毁。现在的飞来钟，1979年由岳阳市阀门厂复制而成，高2米，直径1.2米，重约2000斤。钟身上改铸着钟相、杨幺起义的战斗口号&quot;均贫富，等贵贱&quot;六字，是钟相、杨幺起义的战斗口号，比前者更富有深刻的含义</p><p style=\"text-align: center\"><img src=\"/Uploads/20160823/1471942197814161.jpg\" title=\"1471942197814161.jpg\"/></p><p style=\"text-align: center\"><img src=\"/Uploads/20160823/1471942197776723.jpg\" title=\"1471942197776723.jpg\"/></p><p style=\"text-align: center\"><img src=\"/Uploads/20160823/1471942197592805.jpg\" title=\"1471942197592805.jpg\"/></p><p><br/></p>',NULL),(139,'<p>株洲方特欢乐世界由飞越极限、星际航班、恐龙危机、生命之光、海螺湾、逃出恐龙岛、维苏威火山、聊斋、宇宙博览会、火流星、探险乐园等十几个主题项目区组\r\n成，包含主题项目、游乐项目、休闲景观项目以及配套服务共计200多项，绝大多数项目老少皆宜。这里有国际一流的高空飞翔体验项目“飞越极限”，大型动感\r\n太空飞行体验项目“星际航班”，大型火山探险项目“维苏威火山”，大型恐龙复活灾难体验项目“恐龙危机”，大型主题漂流“逃出恐龙岛”，让人琢磨不透的中\r\n国传统神话的神奇演绎 \r\n“聊斋”，色彩斑斓如梦似幻的“海螺湾”……对于喜欢刺激的朋友，探险乐园里有大摆锤、波浪翻滚、勇敢者转盘、探空飞梭等大量让人尖叫的大中型机械类体验\r\n项目。</p><p style=\"text-align: center\"><img src=\"/Uploads/20160823/1471942705203970.jpg\" title=\"1471942705203970.jpg\" alt=\"1a57ef790409502c0260966f0fb297e5_w800_h0_c0_t0.jpg\"/></p><p style=\"text-align: center\"><img src=\"/Uploads/20160823/1471942728435954.jpg\" title=\"1471942728435954.jpg\" alt=\"3fa0dc2ac158ec78ed48f7c288b48c3b_w800_h0_c0_t0.jpg\"/></p><p>《逃出恐龙岛》项目是一个结合Darkride，漂流，激流勇进为一体的大型项目。由特种装饰和现场特技装置模拟出真实的恐龙岛场景，让游客们置身一个被\r\n恐龙侵占的原始部落岛屿。游客将乘船漂流，经历各种恐龙岛上险象环生的历险，最后从高空冲下，体验高空滑坠的刺激感受，成功逃离恐龙的追捕。项目分排队\r\n区、表演区两个部分。</p><p style=\"text-align: center\"><img src=\"/Uploads/20160823/1471942765802026.jpg\" title=\"1471942765802026.jpg\" alt=\"810144f0c8f3846dc89f9b319f3a06d2_w800_h0_c0_t0.png.jpg\"/></p><p>《嘟比脱口秀——快乐街》是以动画片《快乐街》为题材与现场观众相结合的的交互影像剧场的项目，给项目可容纳人数约为90人左右。共分为候场厅、主演厅两\r\n部分。观众在候场区观看动画片《十二生肖快乐街》等候入场。主演厅为交互影像剧场，通过三台电视机和一个大型互动投影，有趣的故事情节，生动有趣的交互，\r\n在虚拟嘟比的带领下体验互动影像剧场的乐趣。</p><p style=\"text-align: center\"><img src=\"/Uploads/20160823/1471942795104636.jpg\" title=\"1471942795104636.jpg\" alt=\"9e32c9a1f084176fda96e33adfcb4420_w800_h0_c0_t0.jpg\"/></p><p style=\"text-align: center\"><img src=\"/Uploads/20160823/1471942818137598.jpg\" title=\"1471942818137598.jpg\" alt=\"c51d73a8c2c423bd72a0522612c2ec25_w800_h0_c0_t0.png.jpg\"/></p><p><br/></p>',NULL),(140,'<p>长沙海底世界位于长沙市开福区，由海洋馆、极地动物馆、科教馆、水上乐园、儿童乐园等区域组成，整个海底世界面积不大，各个区域间相距也不远，游客能够轻\r\n松在景区内步行游玩。景区内的海洋馆，拥有中南地区最长的海底隧道，当你漫步在隧道中，宛如置身于神奇的海底，能够看到英武彪悍的大鲨鱼、憨态可掬的大海\r\n龟、千姿百态的珊瑚礁、海螺、海星、贝壳等形态各异、色彩艳丽的海洋生物。而在极地馆内，则有幽默滑稽的海象、海狮、海豹等极地动物。如果你对海洋生物科\r\n学感兴趣，可以来到科教馆，这里有生物进化展厅、海洋动物标本展厅、海洋贝壳标本等展厅。在这里能够看到不少海洋生物的实体标本以及相关的文字解说、图片\r\n展示。景区内的水上乐园，是夏季嬉水消暑的好地方，有惊险刺激的高台滑水、波涛汹涌的人造海浪、轻波荡漾的环流河和卡通境界的儿童水池。景区内每天还有各\r\n种表演，包括“人鱼同游”、“白鲸表演”和海豹、海狮等动物明星的表演，每天约7-8场，在每场表演开始前十分钟，景区内会通过户外广播就行通知。景区旁\r\n就是长沙世界之窗，可以在一天内一并游玩。</p><p style=\"text-align: center\"><img src=\"/Uploads/20160823/1471943070768676.jpg\" title=\"1471943070768676.jpg\"/></p><p style=\"text-align: center\"><img src=\"/Uploads/20160823/1471943070974110.jpg\" title=\"1471943070974110.jpg\"/></p><p style=\"text-align: center\"><img src=\"/Uploads/20160823/1471943136929572.jpg\" title=\"1471943136929572.jpg\"/></p><p style=\"text-align: center\"><img src=\"/Uploads/20160823/1471943136426186.jpg\" title=\"1471943136426186.jpg\"/></p><p style=\"text-align: center\"><img src=\"/Uploads/20160823/1471943136119585.jpg\" title=\"1471943136119585.jpg\"/></p><p style=\"text-align: center\"><img src=\"/Uploads/20160823/1471943136702665.jpg\" title=\"1471943136702665.jpg\"/></p><p><br/></p>',NULL),(141,'<p>历史上著名的书院，宋代理学家朱熹在这里讲过课，清代的封疆大吏曾国藩、左宗棠在这里读过书。书院始建于北宋，近代培养出曾国藩、左宗棠、郭嵩寿、程潜等历史名人。如今的书院，是湖南大学的下属学院。</p><p>岳麓书院的中心位置是“讲堂”，是书院进行教学和举行重大活动的核心场所。南宋理学家张栻、朱熹曾在此举行“会讲”。书院内还有大量的碑匾，如唐刻\r\n“麓山寺碑”、江夏黄仙鹤勒石刻篆；明刻宋真宗手书“岳麓书院”石碑坊、“程子四箴碑”；康熙、乾隆御匾“学达性天”、“道南正脉”（御匾悬挂在讲堂大\r\n厅）等。</p><p>岳麓书院后山青枫峡的小山上，建有<a target=\"_blank\" href=\"http://you.ctrip.com/sight/changsha148/8982.html\">爱晚亭</a>，是毛泽东主席青年时代常去的地方。</p><p><br/></p><p style=\"text-align: center\"><img src=\"/Uploads/20160823/1471943452394945.jpg\" title=\"1471943452394945.jpg\"/></p><p style=\"text-align: center\"><img src=\"/Uploads/20160823/1471943452120295.jpg\" title=\"1471943452120295.jpg\"/></p><p style=\"text-align: center\"><img src=\"/Uploads/20160823/1471943452122175.jpg\" title=\"1471943452122175.jpg\"/></p><p style=\"text-align: center\"><img src=\"/Uploads/20160823/1471943452392708.jpg\" title=\"1471943452392708.jpg\"/></p><p style=\"text-align: center\"><img src=\"/Uploads/20160823/1471943452158744.jpg\" title=\"1471943452158744.jpg\"/></p><p style=\"text-align: center\"><img src=\"/Uploads/20160823/1471943452193643.jpg\" title=\"1471943452193643.jpg\"/></p><p><br/></p>',NULL);

/*Table structure for table `auth_group` */

DROP TABLE IF EXISTS `auth_group`;

CREATE TABLE `auth_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rules` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `auth_group` */

insert  into `auth_group`(`id`,`title`,`status`,`rules`) values (1,'超级管理员',1,'1,2,58,65,59,60,61,62,3,56,4,6,5,7,8,9,10,51,52,53,57,11,54,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,29,30,31,32,33,34,36,37,38,39,40,41,42,43,44,45,46,47,63,48,49,50,55'),(2,'管理员',1,'13,14,23,22,21,20,19,18,17,16,15,24,36,34,33,32,31,30,29,27,26,25,1'),(8,'普通用户',1,'1');

/*Table structure for table `auth_group_access` */

DROP TABLE IF EXISTS `auth_group_access`;

CREATE TABLE `auth_group_access` (
  `uid` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  KEY `uid` (`uid`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `auth_group_access` */

insert  into `auth_group_access`(`uid`,`group_id`) values (1,1),(2,2),(3,8);

/*Table structure for table `auth_rule` */

DROP TABLE IF EXISTS `auth_rule`;

CREATE TABLE `auth_rule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `name` char(80) NOT NULL DEFAULT '',
  `title` char(20) NOT NULL DEFAULT '',
  `icon` varchar(255) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `condition` char(100) NOT NULL DEFAULT '',
  `islink` tinyint(1) NOT NULL DEFAULT '1',
  `o` int(11) NOT NULL COMMENT '排序',
  `tips` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=66 DEFAULT CHARSET=utf8;

/*Data for the table `auth_rule` */

insert  into `auth_rule`(`id`,`pid`,`name`,`title`,`icon`,`type`,`status`,`condition`,`islink`,`o`,`tips`) values (1,0,'Index/index','控制台','menu-icon fa fa-tachometer',1,1,'',1,1,'友情提示：经常查看操作日志，发现异常以便及时追查原因。'),(2,0,'','系统设置','menu-icon fa fa-cog',1,1,'',1,2,''),(3,2,'Setting/setting','网站设置','menu-icon fa fa-caret-right',1,1,'',1,3,'这是网站设置的提示。'),(4,2,'Menu/index','后台菜单','menu-icon fa fa-caret-right',1,1,'',1,4,''),(5,2,'Menu/add','新增菜单','menu-icon fa fa-caret-right',1,1,'',1,5,''),(6,4,'Menu/edit','编辑菜单','',1,1,'',0,6,''),(7,2,'Menu/update','保存菜单','menu-icon fa fa-caret-right',1,1,'',0,7,''),(8,2,'Menu/del','删除菜单','menu-icon fa fa-caret-right',1,1,'',0,8,''),(9,2,'Database/backup','数据库备份','menu-icon fa fa-caret-right',1,1,'',1,9,''),(10,9,'Database/recovery','数据库还原','',1,1,'',0,10,''),(11,2,'Update/update','在线升级','menu-icon fa fa-caret-right',1,1,'',1,11,''),(12,2,'Update/devlog','开发日志','menu-icon fa fa-caret-right',1,1,'',1,12,''),(13,0,'','用户及组','menu-icon fa fa-users',1,1,'',1,13,''),(14,13,'Member/index','用户管理','menu-icon fa fa-caret-right',1,1,'',1,14,''),(15,13,'Member/add','新增用户','menu-icon fa fa-caret-right',1,1,'',1,15,''),(16,13,'Member/edit','编辑用户','menu-icon fa fa-caret-right',1,1,'',0,16,''),(17,13,'Member/update','保存用户','menu-icon fa fa-caret-right',1,1,'',0,17,''),(18,13,'Member/del','删除用户','',1,1,'',0,18,''),(19,13,'Group/index','用户组管理','menu-icon fa fa-caret-right',1,1,'',1,19,''),(20,13,'Group/add','新增用户组','menu-icon fa fa-caret-right',1,1,'',1,20,''),(21,13,'Group/edit','编辑用户组','menu-icon fa fa-caret-right',1,1,'',0,21,''),(22,13,'Group/update','保存用户组','menu-icon fa fa-caret-right',1,1,'',0,22,''),(23,13,'Group/del','删除用户组','',1,1,'',0,23,''),(24,0,'','网站内容','menu-icon fa fa-desktop',1,1,'',1,24,''),(25,24,'Strategy/index','管理旅游攻略','menu-icon fa fa-caret-right',1,1,'',1,25,'网站虽然重要，身体更重要，出去走走吧。'),(26,24,'Strategy/add','新增旅游攻略','menu-icon fa fa-caret-right',1,1,'',1,26,''),(27,24,'Strategy/edit','编辑旅游攻略','menu-icon fa fa-caret-right',1,1,'',0,27,''),(29,24,'Strategy/update','保存旅游攻略','menu-icon fa fa-caret-right',1,1,'',0,29,''),(30,24,'Strategy/del','删除旅游攻略','',1,1,'',0,30,''),(31,24,'Article/index','管理乐交流','menu-icon fa fa-caret-right',1,1,'',1,31,''),(32,24,'Article/add','新增乐交流','menu-icon fa fa-caret-right',1,1,'',1,32,''),(33,24,'Article/edit','编辑乐交流','menu-icon fa fa-caret-right',1,1,'',0,33,''),(34,24,'Article/update','保存乐交流','menu-icon fa fa-caret-right',1,1,'',0,34,''),(36,24,'Article/del','删除乐交流','',1,1,'',0,36,''),(37,0,'','其它功能','menu-icon fa fa-legal',1,1,'',1,37,''),(38,37,'Link/index','友情链接','menu-icon fa fa-caret-right',1,1,'',1,38,''),(39,37,'Link/add','增加链接','',1,1,'',1,39,''),(40,37,'Link/edit','编辑链接','',1,1,'',0,40,''),(41,37,'Link/update','保存链接','',1,1,'',0,41,''),(42,37,'Link/del','删除链接','',1,1,'',0,42,''),(43,37,'Flash/index','焦点图','menu-icon fa fa-desktop',1,1,'',1,43,''),(44,37,'Flash/add','新增焦点图','',1,1,'',1,44,''),(45,37,'Flash/update','保存焦点图','',1,1,'',0,45,''),(46,37,'Flash/edit','编辑焦点图','',1,1,'',0,46,''),(47,37,'Flash/del','删除焦点图','',1,1,'',0,47,''),(48,0,'Personal/index','个人中心','menu-icon fa fa-user',1,1,'',1,48,''),(49,48,'Personal/profile','个人资料','menu-icon fa fa-user',1,1,'',1,49,''),(50,48,'Logout/index','退出','',1,1,'',1,50,''),(51,9,'Database/export','备份','',1,1,'',0,51,''),(52,9,'Database/optimize','数据优化','',1,1,'',0,52,''),(53,9,'Database/repair','修复表','',1,1,'',0,53,''),(54,11,'Update/updating','升级安装','',1,1,'',0,54,''),(55,48,'Personal/update','资料保存','',1,1,'',0,55,''),(56,3,'Setting/update','设置保存','',1,1,'',0,56,''),(57,9,'Database/del','备份删除','',1,1,'',0,57,''),(58,2,'variable/index','自定义变量','',1,1,'',1,0,''),(59,58,'variable/add','新增变量','',1,1,'',0,0,''),(60,58,'variable/edit','编辑变量','',1,1,'',0,0,''),(61,58,'variable/update','保存变量','',1,1,'',0,0,''),(62,58,'variable/del','删除变量','',1,1,'',0,0,''),(63,37,'Facebook/add','用户反馈','',1,1,'',1,63,'');

/*Table structure for table `comments` */

DROP TABLE IF EXISTS `comments`;

CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tid` int(11) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `floor` int(11) DEFAULT '0',
  `content` text CHARACTER SET gbk,
  `time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `comments` */

insert  into `comments`(`id`,`tid`,`uid`,`floor`,`content`,`time`) values (1,12,18,1,'我叫Steven',1472125517),(2,9,2,1,'ggg',1479813209);

/*Table structure for table `devlog` */

DROP TABLE IF EXISTS `devlog`;

CREATE TABLE `devlog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `v` varchar(225) NOT NULL COMMENT '版本号',
  `y` int(4) NOT NULL COMMENT '年分',
  `t` int(10) NOT NULL COMMENT '发布日期',
  `log` text NOT NULL COMMENT '更新日志',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `devlog` */

insert  into `devlog`(`id`,`v`,`y`,`t`,`log`) values (1,'1.0.0',2016,1440259200,'QWADMIN第一个版本发布。'),(2,'1.0.1',2016,1440259200,'修改cookie过于简单的安全风险。');

/*Table structure for table `flash` */

DROP TABLE IF EXISTS `flash`;

CREATE TABLE `flash` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `pic` varchar(255) NOT NULL,
  `belong` varchar(20) NOT NULL,
  `creatime` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `o` (`belong`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

/*Data for the table `flash` */

insert  into `flash`(`id`,`title`,`url`,`pic`,`belong`,`creatime`) values (8,'凤凰古城千年遗韵展现湘西文化','','/Public/Images/head/201609/201609251039376470.jpg','strategy','2016-09-25'),(3,'流直下三千尺，疑似银河落九天','','/Public/Images/head/201609/201609250954374691.jpg','index','2016-09-25'),(5,'云尽山色暝 萧条西北风','','/Public/Images/head/201609/201609250955352830.jpg','index','2016-09-25'),(6,'人烟寒橘柚 秋色老梧桐','','/Public/Images/head/201609/201609250956037950.jpg','index','2016-09-25'),(7,'世外仙境水连天，桃源景色醉人间','','/Public/Images/head/201609/20160925095958867.jpg','index','2016-09-25'),(9,'张家界石英砂岩峰林峡谷地貌','','/Public/Images/head/201609/201609251040052991.jpg','strategy','2016-09-25'),(10,'南岳衡山五岳之首','','/Public/Images/head/201609/201609251040313014.jpg','strategy','2016-09-25'),(11,'洞庭天下水，岳阳天下楼','','/Public/Images/head/201609/201609251040566132.jpeg','strategy','2016-09-25');

/*Table structure for table `log` */

DROP TABLE IF EXISTS `log`;

CREATE TABLE `log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `t` int(10) NOT NULL,
  `ip` varchar(16) NOT NULL,
  `log` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=129 DEFAULT CHARSET=utf8;

/*Data for the table `log` */

insert  into `log`(`id`,`name`,`t`,`ip`,`log`) values (128,'admin',1479821374,'127.0.0.1','登录成功。');

/*Table structure for table `member` */

DROP TABLE IF EXISTS `member`;

CREATE TABLE `member` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(225) NOT NULL,
  `head` varchar(255) NOT NULL COMMENT '头像',
  `phone` varchar(20) NOT NULL COMMENT '电话',
  `qq` varchar(20) NOT NULL COMMENT 'QQ',
  `email` varchar(255) NOT NULL COMMENT '邮箱',
  `password` varchar(32) NOT NULL,
  `t` int(10) unsigned NOT NULL COMMENT '注册时间',
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `member` */

insert  into `member`(`uid`,`user`,`head`,`phone`,`qq`,`email`,`password`,`t`) values (1,'admin','/Public/Images/head/201609/201609051111234869.jpg','110','1062666905','1062666905@qq.com','66d6a1c8748025462128dc75bf5ae8d1',1442505600),(2,'syy320','/Public/Images/head/201609/201609051758585620.jpg','120','119','1062666905@qq.com','36868f2f58d2ab890d352ace75b8184b',1473069571),(3,'handsome','/Public/Images/head/201609/201609052243312903.jpg','911','123456789','123456789@qq.com','36868f2f58d2ab890d352ace75b8184b',1473086631);

/*Table structure for table `reply` */

DROP TABLE IF EXISTS `reply`;

CREATE TABLE `reply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tid` int(11) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `content` text CHARACTER SET gbk,
  `time` int(11) DEFAULT NULL,
  `floor` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `reply` */

insert  into `reply`(`id`,`tid`,`uid`,`content`,`time`,`floor`) values (1,4,2,'????????',1472118046,1),(2,4,2,'等我',1472118093,2),(3,3,2,'',1472125152,1);

/*Table structure for table `setting` */

DROP TABLE IF EXISTS `setting`;

CREATE TABLE `setting` (
  `k` varchar(100) NOT NULL COMMENT '变量',
  `v` varchar(255) NOT NULL COMMENT '值',
  `type` tinyint(1) NOT NULL COMMENT '0系统，1自定义',
  `name` varchar(255) NOT NULL COMMENT '说明',
  PRIMARY KEY (`k`),
  KEY `k` (`k`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `setting` */

insert  into `setting`(`k`,`v`,`type`,`name`) values ('sitename','Onexporer',0,''),('title','Onexporer',0,''),('keywords','关键词',0,''),('description','网站描述',0,''),('footer','2016©Onexplorer',0,'');

/*Table structure for table `strategy` */

DROP TABLE IF EXISTS `strategy`;

CREATE TABLE `strategy` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `shortitle` varchar(32) DEFAULT NULL,
  `longtitle` varchar(50) NOT NULL,
  `artime` date NOT NULL,
  `userid` bigint(20) NOT NULL,
  `place` varchar(50) NOT NULL,
  `shortcontent` text NOT NULL,
  `imgsrc` varchar(100) NOT NULL,
  `supportsum` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

/*Data for the table `strategy` */

insert  into `strategy`(`id`,`shortitle`,`longtitle`,`artime`,`userid`,`place`,`shortcontent`,`imgsrc`,`supportsum`) values (11,'魅力南岳','五岳之南岳，佛教、道教圣地','2016-08-10',18,'衡山南岳','衡山（Mount Heng），又名南岳、寿岳、南山，为中国“五岳”之一，位于中国湖南省中部偏东南部，绵亘于衡阳、湘潭两盆地间,，主体部分在衡阳市南岳区和衡山、衡阳县境内。衡山的命名','/Uploads/20160810/1470810592110410.jpg',8),(12,'梦幻长沙','长沙世界之窗梦幻世界','2016-08-10',18,'长沙','长沙世界之窗位于长沙市三一大道485号。景区依山傍水,满目青葱,欧洲、东方、西亚园艺风格的主题园林更添了公园的靓丽和妩媚；100多个世界名胜古迹\r\n各占地势,构筑了厚重的人文历史,','/Uploads/20160810/1470811473572322.jpg',12),(13,'湘西凤凰','小清新青睐的秀美古城','2016-08-23',18,'凤凰','沱江从凤凰古城中穿流而过，为武水一级支流，上有二源：北源为乌巢河，发源于禾库都沙南山峡谷中，滩险流急，天雨水涨，行旅多阻。沱江从西至东横贯县境中部地区，流经腊尔山、麻冲、落潮井、都','http://www.onexplorer.com/Uploads/20160823/1471932158140559.jpg',10),(14,'云梦天门山','湘西第一神山','2016-08-23',18,'张家界天门山','天门山古称云梦山，又名玉屏山。坐落在张家界市\r\n区以南10公里处。公元263年，因山壁 崩塌而使山体上部洞 开一门，南','/Uploads/20160823/1471933703137383.jpg',2),(16,'荆坪古村','怀化古村印象 美丽古老的荆坪古村','2016-08-23',18,'怀化','荆坪古村位于怀化市中方县中方镇舞水河西岸，距怀化市区15公里。荆坪古村是一个文化历史非常悠久的地方，所以人们说她是一个美丽而古老的村落。说她古老是因为早在1987年，北京大学的吕教','/Uploads/20160823/1471936467172729.jpg',11);

/*Table structure for table `strategyct` */

DROP TABLE IF EXISTS `strategyct`;

CREATE TABLE `strategyct` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `artid` bigint(20) NOT NULL,
  `artitle` varchar(300) NOT NULL,
  `artcontent` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

/*Data for the table `strategyct` */

insert  into `strategyct`(`id`,`artid`,`artitle`,`artcontent`) values (11,11,'祝融峰|天柱峰|回雁峰|紫盖峰','<p>衡山（Mount Heng），又名南岳、寿岳、南山，为中国“五岳”之一，位于中国湖南省中部偏东南部，绵亘于衡阳、湘潭两盆地间,，主体部分在衡阳市南岳区和衡山、衡阳县境内。衡山的命名，据志书记载，因其位于星座二十八宿的轸星之翼，“变应玑衡”，“铨德钧物”，犹如衡器，可称天地，故名衡山。</p>|<p>祝祝融峰是衡山的最高峰，是我国纪念人文祖先祝融氏的山峰。“祝融峰之高”为南岳风光“四绝”之首。由于常年烟云的烘托和群峰的叠衬，加之它矗立于地势相对低洼的湘南盆地之中，更显得它峻极天穹。在古语中“祝”是持久永远之意，“融”是光明之意，“祝融”是永远光明。唐代大文豪韩愈在《游祝融峰》诗中赞叹道“万丈祝融拔地起，欲见不见轻烟里”。北宋黄庭坚写道：“万丈祝融插紫霄，路当穷处架仙桥。上观碧落星辰近，下视红尘世界遥。”此处为揽群峰，看日出，观云海，赏雪景的最佳去处</p><p style=\"text-align: center\"><img src=\"/Uploads/20160810/1470810592110410.jpg\" title=\"1470810592110410.jpg\" alt=\"a686c9177f3e670923e5bc2d3cc79f3df9dc557f.jpg\"/></p>|<p>天柱峰为衡山七十二峰之一，海拔1061米，位于南岳镇延寿村境内。从山下仰望群峰，有高峰扑入眼帘，其上又有两个峰顶，如双柱插天。因奇峰挺拔，形似一\r\n柱，有撑天立地之感，故名天柱峰。《九域志》载: \r\n“名山三百六十有八柱，此为第六柱也。”峰顶圆形小平台上筑八角垂檐亭阁，高4米，二层四门，花岗岩砌成，为观火警的瞭望塔。塔下石壁上阴刻楷书“南天柱\r\n石” 四字。</p><p style=\"text-align: center\"><img src=\"/Uploads/20160810/1470810636907023.png\" title=\"1470810636907023.png\" alt=\"f9dcd100baa1cd1155acd0f3be12c8fcc2ce2dce.jpg.png\"/></p>|<p>回雁峰居\r\n八百里衡山七十二峰之首，故称南岳第一峰。海拔96.8米，总面积6.32公顷，座落于衡阳市雁峰区湘江之滨，为市级重点文物保护单位、国家AAA级旅游\r\n景区。峰名传说有二，一曰：北雁南来，至此越冬，待来年春暖而归；二曰：山形似一只鸿雁伸颈昂头，舒足展翅欲腾空飞翔；古城衡阳也因此峰冠以“雁城”之雅\r\n称。南岳第一峰含义有二，其一就地理位置来讲，它是南岳七十二峰从南到北的首峰，与祝融、天柱、岳麓诸峰同负盛名；其二南岳“香文化”历史悠久，历来有南\r\n岳进香自第一峰开始之说。千年古刹雁峰寺座落于回雁峰上，迄今已有一千五百年的历史，历代高僧曾在此传经布道，传说“寿佛”曾留一件袈裟在雁峰寺，寺内设\r\n有“寿佛殿”，是南岳称为“寿岳”的重要佐证。</p><p style=\"text-align: center\"><img src=\"/Uploads/20160810/1470810688245453.jpg\" title=\"1470810688245453.jpg\" alt=\"b999a9014c086e065143c69905087bf40bd1cb7d.jpg\"/></p>|<p>紫盖峰为衡山七十二峰之一。《太平御览》卷39引盛弘之《荆州记》曰：“衡山有三峰，其一名紫盖，每见有双白鹤徊翔其上。”《舆地纪胜》卷55衡州：紫盖峰“在南岳。有紫霞笼罩之状，其形如盖”。南岳诸峰皆朝于祝融，如拱揖之状，独紫盖一峰，面南挺立。杜甫《望岳》诗：“祝融五峯尊，峯峯次低昴。紫盖独不朝，争长嶫相望。”</p><p style=\"text-align: center\"><img src=\"/Uploads/20160810/1470810754119266.jpg\" title=\"1470810754119266.jpg\" alt=\"5.jpg\"/></p><p style=\"text-align: center\"><img src=\"/Uploads/20160810/1470810797261805.jpg\" title=\"1470810797261805.jpg\" alt=\"0.jpg\"/></p><p><br/></p>'),(12,12,'如何到达交通指南！|炎炎夏日，水上世界|疯狂过山车,享受刺激！！|&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; ','<p>长沙世界之窗位于长沙市三一大道485号。景区依山傍水,满目青葱,欧洲、东方、西亚园艺风格的主题园林更添了公园的靓丽和妩媚；100多个世界名胜古迹\r\n各占地势,构筑了厚重的人文历史,彰显了浓郁的异国情调,德国新天鹅城堡、埃及亚历山大灯塔等大比例异国建筑气势恢宏,再现了古代人类的惊人创举；文明\r\n山、文明湖、国际商业街、欧洲风情街、牛仔街、日本园、东南亚水乡等一道道风姿各异、绚丽多彩的人文景观,新开人间奇境,再创人类梦想。景区的艺术表演荟\r\n萃中外宫廷和民间艺术,形成了一套完整的表演体系。景点、流动、广场巡游等表演形式多方位、灵活展示艺术的美妙和迷人；浓郁的人文历史氛围、高科技灯光效\r\n果和舞台设施烘托出一个个醉人的艺术表演场面。狂烈热情的美洲拉丁歌舞、高雅轻快的俄罗斯歌舞、雅致细腻的日本歌舞汇聚成数十场精彩纷呈的节目,令人心醉\r\n神痴；国内首创的大型室外激光焰火音乐晚会《世纪之光》运用高科技手段,在声光共舞、水火交融中编织出一幅雄奇壮观、恢宏绮丽的艺术画卷,令人耳目一新；\r\n五洲大剧院的《异域？风情》大型歌舞晚会将非洲的神秘、亚洲的绚丽、欧洲的华贵,美洲的狂热演绎得传神逼真；飞车表演惊心动魄,驯兽表演诙谐有趣。景区的\r\n娱乐设施领时尚潮流、开娱乐先锋,集惊险性、刺激性、趣味性于一体。有国内最大的大型彩色三环过山车、横跨欧亚两洲的欧亚高空滑索、童趣盎然的漂流河等十\r\n余项的娱乐项目,让您体验极限刺激之余,尽情释放青春园内共有28大免费项目。</p>|<p>1、乘坐132、501、701、915路公交车，在“世界之窗”站下车即到。<br/>2、在火车站乘坐136、158路公交车，在“世界之窗”站下车即到。</p><p style=\"text-align: center\"><img src=\"/Uploads/20160810/1470811473572322.jpg\" title=\"1470811473572322.jpg\" alt=\"0.jpg\"/></p>|<p>作为中南地区最新潮的水上狂欢乐园，长沙世界之窗新概念水上乐园在精心运营两年后昨日再次升级登场，超级冲浪板领衔的数十项顶尖水上游乐设施继续免费向所\r\n有游客开放。其中斥资500万元建造的超级冲浪板上下落差达25米，游客们可坐在充气的皮划艇内，从冲浪板的一端顺坡高速滑下，在“U”型槽中左右摆动。\r\n此外，组合滑道、标准泳池、七彩波浪滑梯、家庭竞速滑道、儿童梦幻水屋等也将为游客提供不一样的感受。</p><p style=\"text-align: center\"><img src=\"/Uploads/20160810/1470811755502008.jpg\" title=\"1470811755502008.jpg\"/></p><p style=\"text-align: center\"><img src=\"/Uploads/20160810/1470811755681709.jpg\" title=\"1470811755681709.jpg\"/></p>|<p style=\"text-align: center\"><img src=\"/Uploads/20160810/1470811912119180.jpg\" title=\"1470811912119180.jpg\"/></p><p style=\"text-align: center\"><img src=\"/Uploads/20160810/1470811912949367.jpg\" title=\"1470811912949367.jpg\"/></p><p style=\"text-align: center\"><img src=\"/Uploads/20160810/1470811912301394.jpg\" title=\"1470811912301394.jpg\"/></p><p style=\"text-align: center\"><img src=\"/Uploads/20160810/1470811912432125.jpg\" title=\"1470811912432125.jpg\"/></p>|'),(13,13,'如何去凤凰？|如何一天中的凤凰如何游玩？|如何当一个吃货？|如何玩转夜晚的凤凰古城？','<p>沱江从凤凰古城中穿流而过，为武水一级支流，上有二源：北源为乌巢河，发源于禾库都沙南山峡谷中，滩险流急，天雨水涨，行旅多阻。沱江从西至东横贯县境中部地区，流经腊尔山、麻冲、落潮井、都里、沱江镇、官庄、木江坪等乡镇。</p>|<p>其实不是我吐槽，有些人地理文盲确实不知道怎么去！！！不要觉得奇怪，奇葩多的是！</p><p>小编就要教你怎么去，然后省事了！</p><p>总体来说一般以几个交通方式为主，还有以几个交通枢纽为主的主线去。</p><p>交通方式一般是火车+汽车，分别的交通枢纽有请注意了！首先一个是省会长沙（飞机高铁火车汽车都有而且是最方便最多次的！</p><p>一个是怀化火车枢纽，一个是吉首（学生党枢纽因为火车费时但是省钱）因为怀化和吉首离凤凰古城比较近，车次相对来说都比较多。还有很多私车都是针对火车下车时间去凤凰而去迎合客人需求所设定的。</p>|<p>【清晨看凤凰】清晨，天刚刚蒙蒙亮的时候，整个凤凰还笼罩在雾气当中，这个时候的凤凰静静地犹如幻境，没有人大声喧哗，怕惊醒了沉睡中的姑娘，失去\r\n了这美丽的图画。许多摄影发烧友就为了这沉睡的姑娘，专门起了一个大早床，扛着三脚架，找一个好角度，将这一刻永远的保存下来，所以凤凰早上的晨景是各位\r\n驴友们必须要去看的哦！</p><p>&nbsp;【傍晚看凤凰】傍晚，夕阳西下，一派祥和，古城被染了层金色，镜头下的美景显得越发通透，行人三三两两的走在\r\n大街上，挑着担子的小贩准备回家，夜市里的美食刚刚把放出来，每一处都可以落入照片之中，体现出古城另一种完全不一样的凤凰，如果有条件的驴友们完全可以\r\n傍晚的时候去观看一下古城！</p><p>【夜晚看凤凰】夜里的凤凰妩媚而多情，即使深夜也是光影璀璨的，灯红酒绿，五光十色，繁华如梦。白天逛\r\n累了，可以到江边的酒吧坐坐，河岸两边的吊脚楼悬挂的灯笼发着光，倒映在水里摇曳这身姿，买醉的游客高声谈笑，还有情侣们的窃窃私语。凤凰最美是在晚上，\r\n霓虹灯照耀着整个古城，看上去是那么的美丽，夜晚的凤凰绝对是抹杀内存最佳的时光！</p><p>【雨中看凤凰】当凤凰开始下雨，一滴一滴的雨水打\r\n在沱江上，溅起水花，水花跳跃着沾上了来往的有人的衣角，江面上漂浮起薄雾，此时又是凤凰的另一张面孔，撑一把伞沿着河边穿过小巷，是不是会想起来戴望舒\r\n的《雨巷》呢？美丽的凤凰每时每刻用自己最美的一处来感受着我们！凤凰不可错过的亮点：泛舟于烟雨朦胧的沱江在沱江泛舟，听船夫的对个或只是在传遍静静而\r\n坐，听浆拨江水声，让思绪任微风飘洒。看运气。</p><p style=\"text-align: center\"><img src=\"http://www.onexplorer.com/Uploads/20160823/1471932158140559.jpg\" title=\"1471932158140559.jpg\"/></p><p style=\"text-align: center\"><img src=\"http://www.onexplorer.com/Uploads/20160823/1471932158139453.jpg\" title=\"1471932158139453.jpg\"/></p>|<p>现在凤凰古城吃饭一个人平均普通消费大概在30到50之间，怕被宰？一般自助游游客都会担心在旅游景区被人宰，这样的问题在全国各地都是不可避免。当然我们会推荐一些相对来说比较实惠的餐馆，让会员免于被宰。虹桥是凤凰城内的特色景点，也是中间地带。</p><p>以虹桥作为分界带，东南西北都有不同特色的餐厅、酒吧和小摊位等。虹桥是凤凰城内的特色景点，也是中间地带。以虹桥作为分界带，东南西北都有不同特色的餐厅、酒吧和小摊位等</p><p>早餐：一般是米粉，油条，馒头之类的，凤凰也是花人民币的地方，随着凤凰古城名气的不断上升，游客越来越多，古城房租都不断提升，物价上涨也是很正常的。</p><p>中\r\n餐、晚餐：尽量选择一些明码实价的餐馆就餐。素菜3-15元、荤菜15-25元、汤圆5元1碗（10个左右）、罐罐菌炒肉（15元）、血粑鸭（20-55\r\n元）、酸菜鱼等是比较有名的菜。小吃有冰米虾（1元）、凉粉（2元）、炸小龙虾（2元1只）、苗家泡菜（2元）等，都是很有特色的地方风味；</p><p>&nbsp;&nbsp;&nbsp;夜\r\n宵：至于晚上很多游客朋友选择吃夜宵，凤凰吃夜宵有2个地方，一个就是虹桥头的夜市一条街，只要到旺季是人声鼎沸，每家摊子上都是满客，去晚了不一定有座\r\n位。还有一个夜市就在凤凰县城的新马路上，晚上也是几百米都是摆的烧烤摊，人气也是很旺，凤凰本地人很多过去吃夜宵。多年前网上的攻略说新马路相比虹桥头\r\n上的烧烤要便宜很多，其实发展到现在两个地方的价格味道都差不多，网上攻略说新马路的价格比虹桥头的便宜，本地人都去那边。本地人去那边确实没错，可是那\r\n是因为方便，近。对于游客来说，到新马路去吃烧烤确实不太方便，道路不熟悉很容易迷路。</p><p>特色的小吃：特色小吃有酸萝卜、社饭、桐叶粑粑、口味田螺、凉粉、熏蜡肉、罐罐菌炒肉、血粑鸭、酸菜鱼、苗家酸鱼、酸罗卜、苗家泡菜、蕨菜、回锅肉、酸汤鱼、罐罐菌、豆腐渣、酸菜汤、梅花糕，臭豆腐，汤圆。还有糯米酒等等。</p><p style=\"text-align: center\"><img src=\"http://www.onexplorer.com/Uploads/20160823/1471932214110763.jpg\" title=\"1471932214110763.jpg\"/></p><p style=\"text-align: center\"><img src=\"http://www.onexplorer.com/Uploads/20160823/1471932214869844.jpg\" title=\"1471932214869844.jpg\"/></p>|<p>近年来，凤凰古城的酒吧越来越多，使得原本古香古色的古城，每当夜幕降临的时候，就变得灯火辉煌，热闹不已。凤凰古城夜晚的娱乐生动不是很多，一般\r\n可以在晚上八点钟左右观赏凤凰苗族土家族民俗歌舞表演或大型篝火晚会。或者在古城区附近的洒吧、茶楼坐坐也未偿不可，这边的酒吧大多为外地人开的，一般装\r\n修的都比较有特色，也很有气氛。漫步在沱江边上，许下自己的心愿，渐渐的飘向远方。洒吧当年确是以一种很“文化”、的姿态出现的，越来越多的酒吧悄悄地出\r\n现在凤凰的一个个角落，成为青年人的天下，亚文化的发生地。凤凰的酒吧品种多多，情调迷人，也不乏激情。</p><p>&nbsp;篝火晚会</p><p>凤凰古城\r\n篝火晚会是古城风情游不可缺少的一个亮点，在晚会上可以欣赏到到古老神秘又略带恐怖的湘西赶尸和傩戏，惊心动魄的苗家绝技上刀山下火海，充满民族特色的苗\r\n家婚礼和土家哭丧嫁，可以体会到苗家青年男女赶“边边场”的缠绵悱恻，还可以品位韵味无穷的湘西纯米酒。整台晚会原始、粗旷、充满野气，将湘西凤凰的神秘\r\n性与风情性演绎的漓漓尽致，节目内容丰富，既有欣赏性节目，又有参与性节目，演出场地坐落在秀美的沱江河畔，以山做背景，配以现代化的声、光、电手段，真\r\n实再现了神秘湘西和凤凰浓厚的民俗风情文化，篝火晚会就是把凤凰古城的民俗风情、婚嫁习俗等搬上舞台，以表演的形式展现给游客。</p><p>这个个人推荐还是去看看的好，可以更能体会到湘西历史，民族风情。沱江边放河灯</p><p>沱\r\n江给人展示着自然和清净，也包容了尘世所有的喧闹。晚上，沱江边上更是热闹非凡，其中最主要的一个活动，放河灯。&nbsp;“河灯亮，河灯明，牛郎织女喜盈盈”、\r\n“河灯一放三千里，妾身岁月甜如蜜、“放河灯，今日放了明日扔”等民谣、竹枝词，可证习俗的久远。原本只有在那些特定的节日才有的河灯，在这里无所禁忌地\r\n放着，因为这里天天是节日，天天可以许下心愿，盛满祝福。在沱江红红的灯笼的映照下，有了种古朴和神秘的神韵，让沱江多了份与白天不同的美。</p><p style=\"text-align: center\"><img src=\"http://www.onexplorer.com/Uploads/20160823/1471932371131246.jpg\" title=\"1471932371131246.jpg\"/></p><p style=\"text-align: center\"><img src=\"http://www.onexplorer.com/Uploads/20160823/1471932389677148.jpg\" title=\"1471932389677148.jpg\"/></p><p style=\"text-align: center\"><img src=\"http://www.onexplorer.com/Uploads/20160823/1471932389129319.jpg\" title=\"1471932389129319.jpg\"/></p><p style=\"text-align: center\"><img src=\"http://www.onexplorer.com/Uploads/20160823/1471932389271745.jpg\" title=\"1471932389271745.jpg\"/></p><p><br/></p><p><br/></p>'),(14,14,'天门山索道|觅仙奇境景区|世上最长索道|鬼谷栈道|天门洞','<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 天门山古称云梦山，又名玉屏山。坐落在张家界市\r\n区以南10公里处。公元263年，因山壁 崩塌而使山体上部洞 开一门，南北相通。三国时吴王孙休以为吉祥，赐名“天门山”。 \r\n天门洞，位于海拔1260多米的绝壁之上，门洞高131.5米，宽57米，深60余米。据地质专家考证，门洞中央系东西岩层向 \r\n斜的交汇处，因挤压而导致岩石破碎崩塌，最终于263年形成门洞。天门山海拔1517.9米，因与山下市区相对高差达1300多米，故尤显伟岸挺拔，其天\r\n际线之美，堪为山的典型。</p>|<p>　贯穿山顶三大景区的有东、西、中三条游线。其中东线长3.7公里，全线贯穿碧野瑶台景区，沿途以原始森林风光为主，一路郁郁葱葱，鸟语花香，清新的空气\r\n让人神清气爽。西线全长2.7公里，全线贯穿觅仙奇境景区，沿途可观览奇绝高山风光，还可以感受鬼谷子玄壁隐仙、野拂藏宝、赤松子炼丹等众多千古传说的神\r\n奇。中线全长0.85公里，由索道上站直达天界佛国景区，主要功能为交通线，方便游客快捷往返于樱桃湾和索道上站之间。</p>|觅仙奇境景区，位于山顶的西部，是天门山“隐逸文化”和“仙山文化”的发源地。<br/><p>鬼谷子，这位在中国历史上介于人与仙之间的奇才，在觅仙奇境景区绝壁上的鬼谷洞隐居、修炼、授徒，是天门山隐逸派的代表人物。勇闯鬼谷洞的勇士，偶然间拍下了洞内石壁上的“鬼谷显影”， 与世间广为流传的鬼谷子头像有异曲同工之妙，成为天门山的又一个难解之谜。 神农皇帝，以及他的雨师赤松子，也在此地留下了种种遗迹与传说。曾经培养出两位翰林的天门书院，更是天门山上的文化圣地</p>|<p>索道线路斜长7455米，上、下站水平高差1279米，是世界最长的单线循环脱挂抱索器车厢式索道，其中98个轿厢来自于瑞士CWA\r\n公司，轿厢体高2米，单个造价高达20万元人民币，尤其那6米/秒的运行速度设计、1000人/小时的单向运量、38度的最大斜度，这在国内乃至全世界都\r\n为罕见。索道在57个支架中特别增设了3个救护支架，用于索道突然处于全面瘫痪时立即执行‘水平救护’或‘垂直救护’方案将游客安全救护至地面，并且索道\r\n站房都安装了防雷电设备，这是目前世界索道中最完备最先进的的一套救护系统。</p><p style=\"text-align: center\"><img src=\"/Uploads/20160823/1471933703137383.jpg\" title=\"1471933703137383.jpg\" alt=\"8718367adab44aed9721ddf8b31c8701a18bfbbb.jpg\"/></p><p style=\"text-align: center\"><img src=\"/Uploads/20160823/1471933765113173.jpg\" title=\"1471933765113173.jpg\" alt=\"8435e5dde71190ef103a84b2cf1b9d16fcfa609d.jpg\"/></p>|<p><a target=\"_blank\" href=\"http://baike.baidu.com/view/1522027.htm\">鬼谷栈道</a>，位于觅仙奇境景区，因悬于<a target=\"_blank\" href=\"http://baike.baidu.com/view/1616616.htm\">鬼谷洞</a>上侧的峭壁沿线而得名。</p><p><a class=\"image-link\" href=\"http://baike.baidu.com/pic/%E5%A4%A9%E9%97%A8%E5%B1%B1/1765/0/9f2f070828381f30e165aa1ea9014c086e06f00c?fr=lemma&ct=single\" target=\"_blank\" title=\"鬼谷栈道\" style=\"width:220px;height:156px;\"><img class=\"\" src=\"/ueditor/php/upload/image/20160823/1471933808115893.jpg\" alt=\"鬼谷栈道\"/></a><span class=\"description\"><br/></span></p><p><span class=\"description\">鬼谷栈道</span>栈道全长1600米，平均海拔为1400米，起点是倚虹关，终点到小天门。与其他栈道不同的是，鬼谷栈道全线既不在悬崖之巅，也不在悬崖之侧，而是全线都立于万丈悬崖的中间，给人以与悬崖共起伏同屈伸的感觉。</p><p>站在栈道上俯瞰群山，古人“会当凌绝顶，一览众山小”的感觉油然而生。由于天门山是国家森林公园，植被特别丰富，加上典型的喀斯特地貌，所以，在这条栈道上更能找到一种在乘坐直升飞机飞越热带雨林大峡谷的感觉，这平时只能在电影里看到的场景，在这里能让你身临其境。</p><p style=\"text-align: center\"><img src=\"/Uploads/20160823/1471933920531012.jpg\" title=\"1471933920531012.jpg\"/></p><p style=\"text-align: center\"><img src=\"/Uploads/20160823/1471933920110849.jpg\" title=\"1471933920110849.jpg\"/></p><p style=\"text-align: center\"><img src=\"/Uploads/20160823/1471933920154656.jpg\" title=\"1471933920154656.jpg\"/></p>|<p style=\"text-align: center\"><img src=\"/Uploads/20160823/1471934078101167.jpg\" title=\"1471934078101167.jpg\"/></p><p style=\"text-align: center\"><img src=\"/Uploads/20160823/1471934078509582.jpg\" title=\"1471934078509582.jpg\"/></p><p style=\"text-align: center\"><img src=\"/Uploads/20160823/1471934079102002.jpg\" title=\"1471934079102002.jpg\"/></p><p style=\"text-align: center\"><img src=\"/Uploads/20160823/1471934079137994.jpg\" title=\"1471934079137994.jpg\"/></p><p><br/></p>'),(16,16,'潘氏宗祠|废墟','<p>荆坪古村位于怀化市中方县中方镇舞水河西岸，距怀化市区15公里。荆坪古村是一个文化历史非常悠久的地方，所以人们说她是一个美丽而古老的村落。</p><p>说她古老是因为早在1987年，北京大学的吕教授就在这里考证出一处距今是万年的旧石器人类遗址，当时填补了湖南省没有旧石器的空白，考古专家\r\n们先后又在这里发现了一座汉代至唐宋时期的古城遗址，在荆坪对河的台地上发现上百座汉代古墓，其中不乏一些上规模的古墓。古村内至今还遗存有大量的文物古\r\n迹，如唐代的古井，起始于秦汉繁盛于元明清时通往云贵的大驿道，全国目前仅有的古代鱼水图腾祭祀礼器“石鱼”等等。<br/></p>|<p>下了船，踏上荆坪渡口，扑面而来的就是潘氏宗祠。它雄镇渡口，睥睨江河，数百年如一日地守望着渡船。</p><p>推开厚重的大门，我们仿佛打开了通往四百年历史的时间隧道。天井、厢房、殿堂，光线很好，四周透亮，但由于承载着厚重的沧桑，仍显得森森沉沉，肃穆寂静。既然是潘氏宗祠，祭祀的当然是潘氏的先人，神龛上熙熙攘攘的挤了很多牌位。据潘氏族谱记载，荆坪潘氏还是北宋 \r\n名将潘美的后代，潘美是杨家将中潘仁美的原型，但是原型潘美并非奸相而是北宋时期的开国名将。荆坪古村中的潘家后代禁演杨家将戏，颇有“潘杨不两立”的意\r\n思，这一戏码对潘家后人来说是对先祖潘美的“名誉保护”。后人对祖先的供奉和祭祀，并非都是敬畏和庄严，神鬼佛在中国人的心目中远没有上帝在基督教徒中的\r\n神圣位置。这边还是香火氤氲，对面则是唱起了花脸长袍的大戏。视线最好的是位置就是祖宗的灵位，活着的人再有钱也势，也只能在两边厢房陪死去的老太爷看\r\n戏，没钱的穷苦人家，就在这青石板铺就的地面上席地而坐。&quot;舞低杨柳楼心月，歌罢桃花扇底风&quot;，戏台上热热闹闹的演什么已不重要，重要的是娱乐的人有了几\r\n分神圣，神圣的殿堂也成为快乐的圣地。</p><p style=\"text-align: center\"><img src=\"/Uploads/20160823/1471936467172729.jpg\" title=\"1471936467172729.jpg\"/></p><p style=\"text-align: center\"><img src=\"/Uploads/20160823/1471936467779994.jpg\" title=\"1471936467779994.jpg\"/></p><p style=\"text-align: center\"><img src=\"/Uploads/20160823/1471936467471456.jpg\" title=\"1471936467471456.jpg\"/></p>|<p>荆坪有很多处废墟。脚下的这条青石板道，就是废墟的脊梁骨。这儿曾经是明清时期重要的交通驿站，年八百里加急的文书都要在这儿换马。沿河一线今天还保留着\r\n宽阔的跑马场，信马由缰，临风驰骋，还可以想见那些承担着重要使命的骏马在这儿撒欢是何等的快乐。如今只是满目青草，马蹄声渐行渐远，已不可闻。新园旧石\r\n器遗址是荆坪最有名的废墟，它填补了湖南省无旧石器记录的空白，也因此有了光彩夺目的&quot;舞水文化&quot;的名字，甚至它的名字进入北京大学考古系的教学教材，但\r\n对荆坪而言，它就是石块堆彻的废墟。踉天古城遗址是废墟，尽管它的历史上溯至春秋战国时期，尽管它曾经有两个足球场那么大的面积，尽管有古城内的伏波宫记\r\n载了汉代马援将军征战蛮夷的丰功伟绩，但历史的浪潮淹没了这一切，繁华落尽，高墙仆地，楼台宫阙已成断壁残垣，显赫战功化为过往云烟，所有的故事都深深地\r\n掩埋在一片废墟里。后人在许多废墟中挖掘出一大批文物，有作战用的青铜剑、青铜矛、青铜戈，有日常生活用的四山纹镜、麻布纹罐、滑石圆璧，这些都只是废墟\r\n在历史上曾经辉煌的见证。游人站在废墟之上，会有一种&quot;前不见古人，后不见来者，念天地之悠悠，独怆然而泣下&quot;的萧索和况味。但对所有荆坪人而言，废墟就\r\n是废墟，它安安静静的呆在那，独自承载着历史的底蕴，承载着社会演进中熵的苍凉。像潘氏宗祠一样，荆坪人可以守着神圣，并绝不背负沉重，也从来没有厌倦废\r\n墟的破旧不堪，他们天天从废墟边经过，但依然轻松快乐的在过着自己的日子。荆坪人的生活方式是对废墟注下的最好诠释。</p><p style=\"text-align: center\"><img src=\"/Uploads/20160823/1471936486465603.jpg\" title=\"1471936486465603.jpg\"/></p><p style=\"text-align: center\"><img src=\"/Uploads/20160823/1471936486744277.jpg\" title=\"1471936486744277.jpg\"/></p><p style=\"text-align: center\"><img src=\"/Uploads/20160823/1471936486101529.jpg\" title=\"1471936486101529.jpg\"/></p><p><br/></p>');

/*Table structure for table `topic` */

DROP TABLE IF EXISTS `topic`;

CREATE TABLE `topic` (
  `tid` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `title` varchar(100) CHARACTER SET gbk DEFAULT NULL,
  `content` text CHARACTER SET gbk,
  `posttime` int(11) DEFAULT NULL,
  `comment` int(11) DEFAULT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `topic` */

insert  into `topic`(`tid`,`uid`,`title`,`content`,`posttime`,`comment`) values (1,2,'I want to go to ChangSha?','Recently,I want to go to ChangSha,where is fun to play? If you have any good places ,please reply my question,thank you very much!',1472114939,0),(2,2,'I want to go to ChangSha?','Recently,I want to go to ChangSha,where is fun to play? If you have any good places ,please reply my question,thank you very much!',1472115014,0),(3,2,'ChangSha I am coming','Recently,I want to go to ChangSha,where is fun to play? If you have any good places ,please reply my question,thank you very much!',1472115040,0),(4,2,'Where to go?','Recently,I want to go to ChangSha,where is fun to play? If you have any good places ,please reply my question,thank you very much!',1472115077,0),(5,2,'life is fun','Recently,I want to go to ChangSha,where is fun to play? If you have any good places ,please reply my question,thank you very much!',1472115100,0),(6,2,'Enjoy my life with you','Recently,I want to go to ChangSha,where is fun to play? If you have any good places ,please reply my question,thank you very much!',1472115133,0),(7,2,'你好','??',1472117832,0),(8,2,'我又来了','你好',1472117887,0),(9,2,'你好世界','你还在',1472118389,1),(10,2,'高新','这就来开发电视剧里看风景撒地方就爱是快乐的减肥啦房间爱上的考虑按流口水的能力开发家乐福卡上就离开的房间按楼上的空间法拉肯德基',1472119618,0),(12,18,'你好时间','你好时间',1472125505,1);

/*Table structure for table `tour` */

DROP TABLE IF EXISTS `tour`;

CREATE TABLE `tour` (
  `tid` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `title` varchar(80) CHARACTER SET gbk DEFAULT NULL,
  `start` varchar(50) CHARACTER SET gbk DEFAULT NULL,
  `destination` varchar(50) CHARACTER SET gbk DEFAULT NULL,
  `starttime` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `endtime` varchar(30) CHARACTER SET latin1 NOT NULL,
  `content` text CHARACTER SET gbk,
  `time` int(11) DEFAULT NULL,
  `replies` int(11) DEFAULT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

/*Data for the table `tour` */

insert  into `tour`(`tid`,`uid`,`number`,`title`,`start`,`destination`,`starttime`,`endtime`,`content`,`time`,`replies`) values (4,2,3,'衡山游','长沙','衡阳','2016.08.11','2016.08.20','今天是个好日子，一起出发',1472118026,2),(5,2,4,'北京游','长沙','北京','2016.08.12','2016.08.20','一起去看流星雨',1472119096,NULL),(6,2,6,'北海游','深圳','北海','2016.05.31','2016.06.01','一起去看海',1472119138,NULL),(7,2,5,'西藏游','湘潭','拉萨','2016.08.11','2016.08.28','去领略藏族文化',1472119184,NULL),(8,2,3,'云南游','湘潭','昆明','2016.08.12','2016.08.20','一起去玩而已',1472119230,NULL),(9,2,2,'西安游','长沙','西安','2016.05.31','2016.06.04','爬华山看日出',1472119317,NULL),(11,2,4,'内蒙游','上海','内蒙','2016.08.11','2016.08.20','去领略草原风',1472948600,NULL),(12,2,5,'哈尔滨游','长沙','哈尔滨','2016.01.01','2016.01.05','冰城的欢乐',1472948657,NULL),(13,2,3,'崀山','邵阳','崀山景区','2016.08.12','2016.08.15','崀山一游',1472948714,1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
