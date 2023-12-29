<?php
session_start();
// 如果 username 有傳入，設定 COOKIE
if (isset($_GET['username'])) {
    $_COOKIE['username'] = $_GET['username'];
}
if (isset($_SESSION['username'])) {
    $_COOKIE['username'] = $_SESSION['username'];
}
?>

<!DOCTYPE html>
<html lang="en" class="is-light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="author" content="Darren Lee">

    <title>TXOne Lab - Help Center Page</title>

    <!-- Tocas UI -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tocas/4.2.5/tocas.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tocas/4.2.5/tocas.min.js"></script>

    <!-- font：Noto Sans TC -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@400;500;700&display=swap" rel="stylesheet" />

    <style>
        /* 增加自定義樣式來控制 Logo 圖片的最大大小 */
        #logo {
            max-height: 30px;
            /* 調整這個值以符合您的需要 */
            max-width: 100%;
            height: auto;
            width: auto;
        }

        /* 響應式設計：根據不同的屏幕寬度調整樣式 */
        @media (max-width: 768px) {
            #logo {
                max-height: 20px;
                /* 在較小的屏幕上進一步減小 Logo */
            }
        }

        .header {
            background: url('./image/kb_panel_2-min_5_18_2023.png') no-repeat center center;
            background-size: cover;
            color: white;
            text-align: center;
            padding: 50px;
        }

        .body {
            text-align: center;
            padding: 50px;
        }

        .footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>

<body>
    <header class="ts-content is-vertically-padded is-tertiary">
        <nav class="ts-container is-fitted">
            <div class="ts-grid">
                <div class="column is-fluid">
                    <div class="ts-wrap">
                        <a class="ts-image is-undecorated ts-image is-rounded is-small" href="/">
                            <img id="logo" src="./image/d12e72abdf7541b1bbe71752f856998b-bk_500x500_modified.png" alt="TXOne Logo">
                        </a>
                    </div>
                </div>
                <div class="column">
                    <div class="ts-wrap">
                        <!-- 登录状态的显示 -->
                        <?php if (isset($_COOKIE['username'])) : ?>
                            <!-- User已登录，显示username和logout -->
                            <span class="ts-text is-undecorated"><?= htmlspecialchars($_COOKIE['username']) ?></span>
                            <a class="ts-text is-undecorated" href="/logout.php">Logout</a>
                        <?php else : ?>
                            <!-- User未登录，显示login和register -->
                            <a class="ts-text is-undecorated" href="/login.php">Login</a>
                            <a class="ts-text is-undecorated" href="/register.php">Register</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <section class="header">
            <h1>Welcome to TXOne Help Center</h1>
            <p>Explore our Comprehensive documentation, reference guides and troubleshooting articles.</p>
            <!-- 搜索框 -->
            <div class="ts-centered">
                <form class="ts-form" onsubmit="return validateForm();">
                    <div class="ts-input">
                        <input type="text" id="problem" name="problem" placeholder="Search">
                        <button class="ts-button" type="submit">Search</button>
                    </div>
                </form>
            </div>
        </section>
        <section class="body ts-content">
            <h2>
                <? if (isset($_COOKIE['username'])) { ?>
                    Hello, <?= $_COOKIE['username'] ?>!
                <? } else { ?>
                    Hello, Welcome to TXOne Help Center!
                <? } ?>
            </h2>

            <p>
                <!-- Show problems if user type it -->
                <? if (isset($_GET['problem'])) { ?>
                    Great! The problem you typed is: <?= $_GET['problem'] ?>.
                <? } else { ?>
                    Please type your problem in the search box.
                <? } ?>
            </p>
        </section>
    </main>

    <footer class="footer">
        <p>&copy; 2023 TXOne Networks. All rights reserved.</p>
    </footer>

    <script>
        function validateForm() {
            var problem = document.getElementById("problem").value;
            if (problem == "") {
                alert("Please enter your problem!");
                return false;
            }

            return true;
        }
    </script>
</body>

</html>