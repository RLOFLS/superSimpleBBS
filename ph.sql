-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2018-04-28 19:42:43
-- 服务器版本： 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ph`
--

-- --------------------------------------------------------

--
-- 表的结构 `ph_admin`
--

CREATE TABLE `ph_admin` (
  `admin_id` tinyint(2) UNSIGNED NOT NULL,
  `admin_name` char(20) NOT NULL COMMENT '管理员账号',
  `admin_pwd` varchar(40) NOT NULL COMMENT '管理员密码',
  `sex` char(2) NOT NULL COMMENT '性别',
  `email` varchar(30) DEFAULT NULL COMMENT '邮箱',
  `address` varchar(30) DEFAULT NULL COMMENT '地址',
  `header_img` varchar(70) DEFAULT NULL COMMENT '头像',
  `introduce` varchar(255) DEFAULT NULL COMMENT '个性签名',
  `post_nums` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '帖子数',
  `grade` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '积分数',
  `last_ip` varchar(30) DEFAULT NULL COMMENT '上次登入ip',
  `last_time` int(11) DEFAULT NULL COMMENT '上次登入时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='管理员表';

--
-- 转存表中的数据 `ph_admin`
--

INSERT INTO `ph_admin` (`admin_id`, `admin_name`, `admin_pwd`, `sex`, `email`, `address`, `header_img`, `introduce`, `post_nums`, `grade`, `last_ip`, `last_time`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '男', '7777777@ph.com', '湖南', '20180423/5addb94f30af5.png', '我是个小小的程序员', 0, 85, '127.0.0.1', 1524821191);

-- --------------------------------------------------------

--
-- 表的结构 `ph_comment`
--

CREATE TABLE `ph_comment` (
  `cmt_id` int(10) UNSIGNED NOT NULL COMMENT '评论id',
  `post_id` int(10) UNSIGNED NOT NULL COMMENT '帖子id',
  `cmt_user` varchar(30) NOT NULL COMMENT '评论人',
  `content` varchar(255) NOT NULL COMMENT '评论内容',
  `time` int(11) NOT NULL COMMENT '评论时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='帖子评论表';

--
-- 转存表中的数据 `ph_comment`
--

INSERT INTO `ph_comment` (`cmt_id`, `post_id`, `cmt_user`, `content`, `time`) VALUES
(1, 3, 'admin', '写的不错噢噢噢', 1521888970),
(3, 6, 'admin', '你好啊，谢谢分享', 1521888970),
(4, 7, 'user', 'hhhh,快来看我的帖子咯', 1521888970),
(5, 3, 'user', 'wo用来看以下哦哦', 1521888970),
(7, 7, 'user5', '分享的它能更好的', 123141241),
(10, 11, 'user2', '分享的很好哦噢噢噢 ', 14214144),
(11, 10, 'user', '来评论一下select方法的返回结果，区别的是这个二维数组的键名是用户的id（准确的说是getField方法的第一个字段名）。 如果我们传入一个字符串分隔符： $list = $User-&gt;getField(\'id,nickname,email\',\':\');那', 1522059220),
(13, 15, 'user5', '原来这样哦。谢谢楼主的帖子', 1524641272);

-- --------------------------------------------------------

--
-- 表的结构 `ph_email`
--

CREATE TABLE `ph_email` (
  `email_id` int(10) UNSIGNED NOT NULL,
  `to_someone` varchar(20) NOT NULL COMMENT '收件人',
  `from_someone` varchar(20) NOT NULL COMMENT '收件人',
  `title` varchar(30) NOT NULL COMMENT '邮件标题',
  `content` text NOT NULL COMMENT '邮件内容',
  `time` int(10) UNSIGNED NOT NULL COMMENT '时间',
  `status` enum('0','1') NOT NULL DEFAULT '0' COMMENT '邮件状态',
  `is_del` enum('0','1') NOT NULL DEFAULT '0' COMMENT '是否删除'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `ph_email`
--

INSERT INTO `ph_email` (`email_id`, `to_someone`, `from_someone`, `title`, `content`, `time`, `status`, `is_del`) VALUES
(1, 'user', 'admin', '你好啊', '很高兴user你赖这交流学习噢噢噢，我们热烈欢迎你的到来！！！！！', 1521949071, '1', '1'),
(2, 'user2', 'admin', '你好啊', '很高兴user2你赖这交流学习噢噢噢，我们热烈欢迎你的到来！！！！！', 1521949084, '1', '1'),
(3, 'user3', 'admin', '你好啊', '很高兴user3你赖这交流学习噢噢噢，我们热烈欢迎你的到来！！！！！', 1521949102, '1', '0'),
(5, 'admin', 'user2', '请求解禁言啊admin', '我以后不会乱说了', 12415155, '1', '0'),
(6, 'user', 'user5', '你好啊', '今天天气好好噢噢噢', 1521989319, '0', '1'),
(7, 'user2', 'user5', '你好啊', '今天天气好好噢噢噢', 1521989329, '0', '0'),
(9, 'user5', 'user', 'asa', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 0, '1', '0');

-- --------------------------------------------------------

--
-- 表的结构 `ph_moudle`
--

CREATE TABLE `ph_moudle` (
  `moudle_id` int(10) UNSIGNED NOT NULL,
  `title` char(20) NOT NULL COMMENT '板块名字',
  `description` varchar(150) NOT NULL COMMENT '板块描述',
  `scan` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '浏览次数',
  `post_nums` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '帖子数',
  `sort` tinyint(2) UNSIGNED NOT NULL COMMENT '板块排序'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='板块表';

--
-- 转存表中的数据 `ph_moudle`
--

INSERT INTO `ph_moudle` (`moudle_id`, `title`, `description`, `scan`, `post_nums`, `sort`) VALUES
(2, '综合交流', '这主要是程序员么交流学习、分享经验的板块', 66, 10, 1),
(3, '程序美术设计', '这里主要是程序员们交流界面设计，ui设计等美术设计的板块', 25, 1, 2),
(4, '每日心情', '这里主要主要是程序员们交流自己的每日心情，有趣事的板块', 8, 2, 3);

-- --------------------------------------------------------

--
-- 表的结构 `ph_notice`
--

CREATE TABLE `ph_notice` (
  `notice_id` int(10) UNSIGNED NOT NULL,
  `title` char(20) NOT NULL COMMENT '公告名字',
  `content` varchar(255) NOT NULL COMMENT '公告内容',
  `time` int(10) UNSIGNED NOT NULL COMMENT '时间',
  `sort` tinyint(2) UNSIGNED NOT NULL COMMENT '排序'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='公告表';

--
-- 转存表中的数据 `ph_notice`
--

INSERT INTO `ph_notice` (`notice_id`, `title`, `content`, `time`, `sort`) VALUES
(1, '本周公告', '本站致力于程序员们交流学习的交流论坛网站，不要发违法的帖子哦，不然会被管理员禁哦;本站致力于程序员们交流学习的交流论坛网站，不要发违法的帖子哦，不然会被管理员禁哦;本站致力于程序员们交流学习的交流论坛网站!!!重要的事情说三遍。重要的事情说三遍。重要的事情说三遍。', 1521960491, 1);

-- --------------------------------------------------------

--
-- 表的结构 `ph_post`
--

CREATE TABLE `ph_post` (
  `post_id` int(10) UNSIGNED NOT NULL,
  `moudle_id` int(10) UNSIGNED NOT NULL COMMENT '模块id',
  `author` varchar(20) NOT NULL COMMENT '帖子作者',
  `title` char(30) NOT NULL COMMENT '帖子标题',
  `content` text NOT NULL COMMENT '帖子内容',
  `time` int(11) DEFAULT NULL COMMENT '时间',
  `scan` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '浏览次数',
  `comments` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '评论次数',
  `is_top` enum('0','1') NOT NULL DEFAULT '0' COMMENT '是否置顶',
  `is_good` enum('0','1') NOT NULL DEFAULT '0' COMMENT '是否为精帖',
  `is_hot` enum('0','1') NOT NULL DEFAULT '0' COMMENT '是否为热帖',
  `is_del` enum('0','1') DEFAULT '0' COMMENT '是否删除'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `ph_post`
--

INSERT INTO `ph_post` (`post_id`, `moudle_id`, `author`, `title`, `content`, `time`, `scan`, `comments`, `is_top`, `is_good`, `is_hot`, `is_del`) VALUES
(3, 2, 'admin', '本周公告', '又是一次测试公告', 1521890383, 28, 0, '1', '0', '0', '0'),
(5, 4, '我是小鱼儿', '今天的心情', '今天整天都在下雨，我很郁闷咯，全身无精打采', 1521256970, 3, 0, '0', '1', '0', '0'),
(6, 2, '我是小鱼儿', 'php中的empty函数', '\r\n说明\r\n\r\nbool empty ( mixed $var )\r\n\r\n判断一个变量是否被认为是空的。当一个变量并不存在，或者它的值等同于FALSE，那么它会被认为不存在。如果变量不存在的话，empty()并不会产生警告。 \r\n\r\n\r\n参数\r\n\r\n\r\nvar\r\n待检查的变量 \r\n\r\n\r\nNote: \r\n\r\n在 PHP 5.5 之前，empty() 仅支持变量；任何其他东西将会导致一个解析错误。换言之，下列代码不会生效： empty(trim($name))。 作为替代，应该使用trim($name) == false. \r\n\r\n\r\n没有警告会产生，哪怕变量并不存在。 这意味着 empty() 本质上与 !isset($var) || $var == false 等价。 \r\n\r\n\r\n\r\n返回值\r\n\r\n当var存在，并且是一个非空非零的值时返回 FALSE 否则返回 TRUE. \r\n\r\n以下的东西被认为是空的： \r\n•\"\" (空字符串)\r\n•0 (作为整数的0)\r\n•0.0 (作为浮点数的0)\r\n•\"0\" (作为字符串的0)\r\n•NULL\r\n•FALSE\r\n•array() (一个空数组)\r\n•$var; (一个声明了，但是没有值的变量)\r\n', 1522288970, 29, 0, '0', '1', '1', '1'),
(7, 2, '我是小鱼儿', 'php中的substr函数', '\r\nsubstr\r\n\r\n(PHP 4, PHP 5, PHP 7)\r\n\r\nsubstr — 返回字符串的子串\r\n\r\n\r\n说明\r\n\r\nstring substr ( string $string , int $start [, int $length ] )\r\n\r\n返回字符串 string 由 start 和 length 参数指定的子字符串。 \r\n\r\n\r\n参数\r\n\r\n\r\nstring\r\n输入字符串。必须至少有一个字符。 \r\nstart\r\n如果 start 是非负数，返回的字符串将从 string 的 start 位置开始，从 0 开始计算。例如，在字符串 \"abcdef\" 中，在位置 0 的字符是 \"a\"，位置 2 的字符串是 \"c\" 等等。 \r\n\r\n如果 start 是负数，返回的字符串将从 string 结尾处向前数第 start 个字符开始。 \r\n\r\n如果 string 的长度小于 start，将返回 FALSE。 \r\n\r\n\r\n\r\n\r\nExample #1 使用负数 start\r\n\r\n\r\n<?php\r\n$rest = substr(\"abcdef\", -1);    // 返回 \"f\"\r\n$rest = substr(\"abcdef\", -2);    // 返回 \"ef\"\r\n$rest = substr(\"abcdef\", -3, 1); // 返回 \"d\"\r\n?>  \r\n\r\nlength\r\n如果提供了正数的 length，返回的字符串将从 start 处开始最多包括 length 个字符（取决于 string 的长度）。 \r\n\r\n如果提供了负数的 length，那么 string 末尾处的 length 个字符将会被省略（若 start 是负数则从字符串尾部算起）。如果 start 不在这段文本中，那么将返回 FALSE。 \r\n\r\n如果提供了值为 0，FALSE 或 NULL 的 length，那么将返回一个空字符串。 \r\n\r\n如果没有提供 length，返回的子字符串将从 start 位置开始直到字符串结尾。 \r\n\r\n\r\nExample #2 使用负数 length\r\n\r\n\r\n<?php\r\n$rest = substr(\"abcdef\", 0, -1);  // 返回 \"abcde\"\r\n$rest = substr(\"abcdef\", 2, -1);  // 返回 \"cde\"\r\n$rest = substr(\"abcdef\", 4, -4);  // 返回 \"\"\r\n$rest = substr(\"abcdef\", -3, -1); // 返回 \"de\"\r\n?>  \r\n\r\n\r\n\r\n返回值\r\n\r\n返回提取的子字符串， 或者在失败时返回 FALSE。 \r\n', NULL, 1, 0, '0', '0', '1', '0'),
(8, 3, '我是小鱼儿', '这个程序界面好啊啊啊', '哈哈哈哈你被骗进来看了', NULL, 0, 0, '0', '0', '0', '1'),
(9, 4, 'admin', '看看这天', '今天天气还是阴雨天，我有点不喜欢', 1521948761, 1, 0, '1', '0', '0', '0'),
(10, 2, 'user5', 'ThinkPHP中读取数据', '读取数据是指读取数据表中的一行数据（或者关联数据），主要通过find方法完成，例如：\r\n\r\n$User = M(&quot;User&quot;); // 实例化User对象// 查找status值为1name值为think的用户数据 $data = $User-&gt;where(\'status=1 AND name=&quot;thinkphp&quot;\')-&gt;find();dump($data);find方法查询数据的时候可以配合相关的连贯操作方法，其中最关键的则是where方法，如何使用where方法我们会在查询语言章节中详细描述。\r\n\r\n如果查询出错，find方法返回false，如果查询结果为空返回NULL，查询成功则返回一个关联数组（键值是字段名或者别名）。如果上面的查询成功的话，会输出：\r\n\r\narray (size=3)  \'name\' =&gt; string \'thinkphp\' (length=8)  \'email\' =&gt; string \'thinkphp@gmail.com\' (length=18)  \'status\'=&gt; int 1即使满足条件的数据不止一个，find方法也只会返回第一条记录（可以通过order方法排序后查询）。\r\n\r\n还可以用data方法获取查询后的数据对象（查询成功后）\r\n\r\n$User = M(&quot;User&quot;); // 实例化User对象// 查找status值为1name值为think的用户数据 $User-&gt;where(\'status=1 AND name=&quot;thinkphp&quot;\')-&gt;find();dump($User-&gt;data());读取数据集\r\n读取数据集其实就是获取数据表中的多行记录（以及关联数据），使用select方法，使用示例：\r\n\r\n$User = M(&quot;User&quot;); // 实例化User对象// 查找status值为1的用户数据 以创建时间排序 返回10条数据$list = $User-&gt;where(\'status=1\')-&gt;order(\'create_time\')-&gt;limit(10)-&gt;select();如果查询出错，select的返回值是false，如果查询结果为空，则返回NULL，否则返回二维数组。\r\n\r\n读取字段值\r\n读取字段值其实就是获取数据表中的某个列的多个或者单个数据，最常用的方法是 getField方法。\r\n\r\n示例如下：\r\n\r\n$User = M(&quot;User&quot;); // 实例化User对象// 获取ID为3的用户的昵称 $nickname = $User-&gt;where(\'id=3\')-&gt;getField(\'nickname\');默认情况下，当只有一个字段的时候，返回满足条件的数据表中的该字段的第一行的值。\r\n\r\n如果需要返回整个列的数据，可以用：\r\n\r\n$User-&gt;getField(\'id\',true); // 获取id数组//返回数据格式如array(1,2,3,4,5)一维数组，其中value就是id列的每行的值如果传入多个字段的话，默认返回一个关联数组：\r\n\r\n$User = M(&quot;User&quot;); // 实例化User对象// 获取所有用户的ID和昵称列表 $list = $User-&gt;getField(\'id,nickname\');//两个字段的情况下返回的是array(`id`=&gt;`nickname`)的关联数组，以id的值为key，nickname字段值为value这样返回的list是一个数组，键名是用户的id字段的值，键值是用户的昵称nickname。\r\n\r\n如果传入多个字段的名称，例如：\r\n\r\n$list = $User-&gt;getField(\'id,nickname,email\');//返回的数组格式是array(`id`=&gt;array(`id`=&gt;value,`nickname`=&gt;value,`email`=&gt;value))是一个二维数组，key还是id字段的值，但value是整行的array数组，类似于select()方法的结果遍历将id的值设为数组key返回的是一个二维数组，类似select方法的返回结果，区别的是这个二维数组的键名是用户的id（准确的说是getField方法的第一个字段名）。\r\n\r\n如果我们传入一个字符串分隔符：\r\n\r\n$list = $User-&gt;getField(\'id,nickname,email\',\':\');那么返回的结果就是一个数组，键名是用户id，键值是 nickname:email的输出字符串。\r\n\r\ngetField方法还可以支持限制数量，例如：\r\n\r\n$this-&gt;getField(\'id,name\',5); // 限制返回5条记录$this-&gt;getField(\'id\',3); // 获取id数组 限制3条记录可以配合使用order方法使用。更多的查询方法可以参考查询语言章节。\r\n', 1521979416, 53, 0, '0', '0', '1', '0'),
(11, 2, 'user5', 'ThinkPHP中IF标签', '用法示例：\r\n\r\n&lt;if condition=&quot;($name eq 1) OR ($name gt 100) &quot;&gt; value1&lt;elseif condition=&quot;$name eq 2&quot;/&gt;value2&lt;else /&gt; value3&lt;/if&gt;在condition属性中可以支持eq等判断表达式，同上面的比较标签，但是不支持带有”&gt;”、”&lt;”等符号的用法，因为会混淆模板解析，所以下面的用法是错误的：\r\n\r\n&lt;if condition=&quot;$id &lt; 5 &quot;&gt;value1    &lt;else /&gt; value2&lt;/if&gt;必须改成：\r\n\r\n&lt;if condition=&quot;$id lt 5 &quot;&gt;value1&lt;else /&gt; value2&lt;/if&gt;除此之外，我们可以在condition属性里面使用php代码，例如：\r\n\r\n&lt;if condition=&quot;strtoupper($user[\'name\']) neq \'THINKPHP\'&quot;&gt;ThinkPHP&lt;else /&gt; other Framework&lt;/if&gt;condition属性可以支持点语法和对象语法，例如：自动判断user变量是数组还是对象\r\n\r\n&lt;if condition=&quot;$user.name neq \'ThinkPHP\'&quot;&gt;ThinkPHP&lt;else /&gt; other Framework&lt;/if&gt;或者知道user变量是对象\r\n\r\n&lt;if condition=&quot;$user:name neq \'ThinkPHP\'&quot;&gt;ThinkPHP&lt;else /&gt; other Framework&lt;/if&gt;由于if标签的condition属性里面基本上使用的是php语法，尽可能使用判断标签和Switch标签会更加简洁，原则上来说，能够用switch和比较标签解决的尽量不用if标签完成。因为switch和比较标签可以使用变量调节器和系统变量。如果某些特殊的要求下面，IF标签仍然无法满足要求的话，可以使用原生php代码或者PHP标签来直接书写代码\r\n', 1521979468, 17, 0, '0', '1', '0', '0'),
(15, 2, '我是小鱼儿', 'ThinkPHP中数据更心', '&lt;p&gt;ThinkPHP的数据更新操作包括更新数据和更新字段方法。&lt;/p&gt;&lt;h2&gt;更新数据&lt;/h2&gt;&lt;p&gt;更新数据使用&lt;code&gt;save&lt;/code&gt;方法，例如：&lt;/p&gt;&lt;pre class=&quot;prettyprint linenums prettyprinted&quot;&gt;$User&amp;nbsp;=&amp;nbsp;M(&amp;quot;User&amp;quot;);&amp;nbsp;//&amp;nbsp;实例化User对象//&amp;nbsp;要修改的数据对象属性赋值$data[&amp;#39;name&amp;#39;]&amp;nbsp;=&amp;nbsp;&amp;#39;ThinkPHP&amp;#39;;$data[&amp;#39;email&amp;#39;]&amp;nbsp;=&amp;nbsp;&amp;#39;ThinkPHP@gmail.com&amp;#39;;$User-&amp;gt;where(&amp;#39;id=5&amp;#39;)-&amp;gt;save($data);&amp;nbsp;//&amp;nbsp;根据条件更新记录&lt;/pre&gt;&lt;p&gt;也可以改成对象方式来操作：&lt;/p&gt;&lt;pre class=&quot;prettyprint linenums prettyprinted&quot;&gt;$User&amp;nbsp;=&amp;nbsp;M(&amp;quot;User&amp;quot;);&amp;nbsp;//&amp;nbsp;实例化User对象//&amp;nbsp;要修改的数据对象属性赋值$User-&amp;gt;name&amp;nbsp;=&amp;nbsp;&amp;#39;ThinkPHP&amp;#39;;$User-&amp;gt;email&amp;nbsp;=&amp;nbsp;&amp;#39;ThinkPHP@gmail.com&amp;#39;;$User-&amp;gt;where(&amp;#39;id=5&amp;#39;)-&amp;gt;save();&amp;nbsp;//&amp;nbsp;根据条件更新记录&lt;/pre&gt;&lt;p&gt;数据对象赋值的方式，save方法无需传入数据，会自动识别。&lt;/p&gt;&lt;p&gt;注意：save方法的返回值是影响的记录数，如果返回false则表示更新出错，因此一定要用恒等来判断是否更新失败。&lt;/p&gt;&lt;p&gt;为了保证数据库的安全，避免出错更新整个数据表，如果没有任何更新条件，数据对象本身也不包含主键字段的话，save方法不会更新任何数据库的记录。&lt;/p&gt;&lt;p&gt;因此下面的代码不会更改数据库的任何记录&lt;/p&gt;&lt;pre class=&quot;prettyprint linenums prettyprinted&quot;&gt;$User-&amp;gt;save($data);&lt;/pre&gt;&lt;p&gt;除非使用下面的方式：&lt;/p&gt;&lt;pre class=&quot;prettyprint linenums prettyprinted&quot;&gt;$User&amp;nbsp;=&amp;nbsp;M(&amp;quot;User&amp;quot;);&amp;nbsp;//&amp;nbsp;实例化User对象//&amp;nbsp;要修改的数据对象属性赋值$data[&amp;#39;id&amp;#39;]&amp;nbsp;=&amp;nbsp;5;$data[&amp;#39;name&amp;#39;]&amp;nbsp;=&amp;nbsp;&amp;#39;ThinkPHP&amp;#39;;$data[&amp;#39;email&amp;#39;]&amp;nbsp;=&amp;nbsp;&amp;#39;ThinkPHP@gmail.com&amp;#39;;$User-&amp;gt;save($data);&amp;nbsp;//&amp;nbsp;根据条件保存修改的数据&lt;/pre&gt;&lt;p&gt;如果id是数据表的主键的话，系统自动会把主键的值作为更新条件来更新其他字段的值。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;', 1522066057, 21, 0, '0', '1', '1', '0'),
(16, 4, '我是小鱼儿', 'bug多多', '&lt;p&gt;为什么么这多多bug&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;color: rgb(84, 141, 212);&quot;&gt;aaaaaaaaaaaaaaaa&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;color: rgb(84, 141, 212);&quot;&gt;hao难高啊啊啊啊啊啊啊啊啊啊&lt;/span&gt;&lt;br/&gt;&lt;/p&gt;', 1522067221, 2, 0, '0', '1', '0', '0'),
(17, 3, '我是小鱼儿', 'Tinkphp标签库', '&lt;p&gt;&lt;img src=&quot;http://img.baidu.com/hi/jx2/j_0025.gif&quot;/&gt;&lt;img src=&quot;http://img.baidu.com/hi/jx2/j_0002.gif&quot;/&gt;&lt;img src=&quot;http://img.baidu.com/hi/jx2/j_0001.gif&quot;/&gt;&lt;img src=&quot;http://img.baidu.com/hi/jx2/j_0013.gif&quot;/&gt;&lt;img src=&quot;http://img.baidu.com/hi/jx2/j_0024.gif&quot;/&gt;&lt;/p&gt;&lt;h2&gt;导入标签库&lt;/h2&gt;&lt;p&gt;使用taglib标签导入当前模板中需要使用的标签库，例如：&lt;/p&gt;&lt;pre class=&quot;prettyprint linenums prettyprinted&quot;&gt;&amp;lt;taglib&amp;nbsp;name=&amp;quot;html&amp;quot;&amp;nbsp;/&amp;gt;&lt;/pre&gt;&lt;blockquote&gt;&lt;p&gt;如果没有定义html标签库的话，则导入无效。&lt;/p&gt;&lt;/blockquote&gt;&lt;p&gt;也可以导入多个标签库，使用：&lt;/p&gt;&lt;pre class=&quot;prettyprint linenums prettyprinted&quot;&gt;&amp;lt;taglib&amp;nbsp;name=&amp;quot;html,article&amp;quot;&amp;nbsp;/&amp;gt;&lt;/pre&gt;&lt;p&gt;导入标签库后，就可以使用标签库中定义的标签了，假设article标签库中定义了read标签：&lt;/p&gt;&lt;pre class=&quot;prettyprint linenums prettyprinted&quot;&gt;&amp;lt;article:read&amp;nbsp;name=&amp;quot;hello&amp;quot;&amp;nbsp;id=&amp;quot;data&amp;quot;&amp;nbsp;&amp;gt;{$data.id}:{$data.title}&amp;lt;/article:read&amp;gt;&lt;/pre&gt;&lt;p&gt;在上面的标签中，&lt;code&gt;&amp;lt;article:read&amp;gt;... &amp;lt;/article:read&amp;gt;&lt;/code&gt; 就是闭合标签，起始和结束标签必须成对出现。&lt;/p&gt;&lt;p&gt;如果是 &lt;code&gt;&amp;lt;article:read name=&amp;quot;hello&amp;quot; /&amp;gt;&lt;/code&gt; 就是开放标签。&lt;/p&gt;&lt;blockquote&gt;&lt;p&gt;闭合和开放标签取决于标签库中的定义，一旦定义后就不能混淆使用，否则就会出现错误。&lt;/p&gt;&lt;/blockquote&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;', 1522070546, 3, 0, '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- 表的结构 `ph_user`
--

CREATE TABLE `ph_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_name` char(8) NOT NULL COMMENT '用户账号',
  `user_pwd` varchar(40) NOT NULL COMMENT '用户密码',
  `sex` char(2) NOT NULL COMMENT '性别',
  `email` varchar(30) DEFAULT NULL COMMENT '邮箱',
  `address` varchar(30) DEFAULT NULL COMMENT '地址',
  `introduce` varchar(255) DEFAULT NULL COMMENT '个性签名',
  `header_img` varchar(70) DEFAULT '/default/1.jpg' COMMENT '头像',
  `post_nums` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '帖子数',
  `grade` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '积分数',
  `last_ip` varchar(30) DEFAULT NULL COMMENT '上次登入ip',
  `last_time` int(11) DEFAULT NULL COMMENT '上次登入时间',
  `is_speak` enum('0','1') NOT NULL DEFAULT '0' COMMENT '是否禁言'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户表';

--
-- 转存表中的数据 `ph_user`
--

INSERT INTO `ph_user` (`user_id`, `user_name`, `user_pwd`, `sex`, `email`, `address`, `introduce`, `header_img`, `post_nums`, `grade`, `last_ip`, `last_time`, `is_speak`) VALUES
(1, '我是小鱼儿', 'ee11cbb19052e40b07aac0ca060c23ee', '女', '123456@ph.com', '湖南', '我是程序员之家的用户，我好喜欢', '20180326/5ab8ec81f0188.jpg', 1, 20, '127.0.0.1', 1522077318, '1'),
(2, 'user2', '7e58d63b60197ceb55a1c487989a3720', '男', '2222@ph.com', '长沙', '拉拉啊', NULL, 0, 0, NULL, NULL, '0'),
(3, 'user3', '92877af70a45fd6a2ed7fe81e1236b78', '女', '333333@qq.com', '成都', '我是个小游客', NULL, 0, 0, NULL, NULL, '0'),
(5, 'user5', '594f803b380a41396ed63dca39503542', '女', '1111@ph.com', '杭州', '', '20180325/5ab76e7316d5f.jpg', 0, 79, '127.0.0.1', 1524824798, '0'),
(6, 'admin', '613fe6577e4f96674af79afd758b72ed', '男', '23534636ph.com', '衡阳', NULL, '/default/1.jpg', 0, 5, '127.0.0.1', 1522059666, '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ph_admin`
--
ALTER TABLE `ph_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `ph_comment`
--
ALTER TABLE `ph_comment`
  ADD PRIMARY KEY (`cmt_id`);

--
-- Indexes for table `ph_email`
--
ALTER TABLE `ph_email`
  ADD PRIMARY KEY (`email_id`);

--
-- Indexes for table `ph_moudle`
--
ALTER TABLE `ph_moudle`
  ADD PRIMARY KEY (`moudle_id`);

--
-- Indexes for table `ph_notice`
--
ALTER TABLE `ph_notice`
  ADD PRIMARY KEY (`notice_id`);

--
-- Indexes for table `ph_post`
--
ALTER TABLE `ph_post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `ph_user`
--
ALTER TABLE `ph_user`
  ADD PRIMARY KEY (`user_id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `ph_admin`
--
ALTER TABLE `ph_admin`
  MODIFY `admin_id` tinyint(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `ph_comment`
--
ALTER TABLE `ph_comment`
  MODIFY `cmt_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '评论id', AUTO_INCREMENT=14;
--
-- 使用表AUTO_INCREMENT `ph_email`
--
ALTER TABLE `ph_email`
  MODIFY `email_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- 使用表AUTO_INCREMENT `ph_moudle`
--
ALTER TABLE `ph_moudle`
  MODIFY `moudle_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- 使用表AUTO_INCREMENT `ph_notice`
--
ALTER TABLE `ph_notice`
  MODIFY `notice_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `ph_post`
--
ALTER TABLE `ph_post`
  MODIFY `post_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- 使用表AUTO_INCREMENT `ph_user`
--
ALTER TABLE `ph_user`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
