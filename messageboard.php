<?php

require_once('template.php');

loadHeader();

$db = DefaultDatabase();

if (Database::countRows($db -> query("SHOW TABLES LIKE 'messageboard'", array())) == 0) {
    $db -> query("
        CREATE TABLE `messageboard` (
            `id` INT AUTO_INCREMENT,
            PRIMARY KEY(`id`),
            `username` TINYTEXT,
            `content` TEXT,
            `createtime` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
		)
        ENGINE = MyISAM
        COLLATE = utf8mb4_unicode_ci
    ", array());
    echo 'Initialized table `messageboard`.<br />';
}

echo '<div class="main_content">';

$login = false;

if (isset($_COOKIE['uuid'])) {
    $result = Post("http://" . $_SERVER['HTTP_HOST'] . "/account_new/post/verify.php", array('uuid' => $_COOKIE['uuid']));
    if (isset($result) && $result != "") $login = true;
}

if ($login) {
    echo '当前已登录：' . htmlFilter($result);
    if (isset($_POST['content'])) {
        $username = $result;
        $content = $_POST['content'];
        $db -> query("INSERT INTO `messageboard` (`username`, `content`) VALUES ('%s', '%s')", array($username, $content));
    }
} else {
    echo '<a href="account_new/login.php">登录/注册</a>';
}

echo '<hr />';

$result = $db -> query("SELECT * FROM `messageboard` ORDER BY `createtime` DESC", array());

while ($row = Database::getRowArray($result)) {
    echo '<div style="padding-left:10px;text-align:left;">';
    echo '<a href="">' . htmlFilter($row['username']) . '</a>: ' . htmlFilter($row['content']);
    echo '</div>';
}

echo '</div>';

if ($login) {
    echo '
    <div class="main_content">
        留言<br />
        <form id="submit" action="messageboard.php" method="post">
            <textarea name="content" id="content" class="inputbox" style="width:80%;min-height:100px;resize:vertical;" placeholder="内容"></textarea>
            <br />
            <input type="submit" class="btn" value="发布" />
        </form>
    </div>';
}

loadFooter();

?>
