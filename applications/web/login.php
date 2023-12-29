<?
session_start();

// 如果有登入就跳轉到首頁
if (isset($_SESSION['username'])) {
    header("Location: ./index.php");
}

// 跟資料庫連線，與 users 比較
include_once("db_con.php");
getConnect();

// 檢查請求是否為 POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 檢查是否有傳入 username 與 password
    if (isset($_POST['username']) && isset($_POST['password'])) {
        // 檢查是否有該使用者
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($databaseConnection, $sql);

        $row = mysqli_fetch_array($result);
        if ($row) {
            // 有該使用者，設定 session
            $_SESSION['username'] = $username;
            header("Location: ./index.php");
        } else {
            // 沒有該使用者，顯示錯誤訊息
            echo "帳號密碼錯誤";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en" class="is-light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="author" content="Darren Lee">

    <title>Login</title>

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
            max-height: 50px;
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
    </style>
</head>

<body>
    <div class="ts-center">
        <div class="ts-header is-large is-heavy is-icon">
            <div class="ts-icon">
                <img id="logo" src="./image/d12e72abdf7541b1bbe71752f856998b-bk_500x500_modified.png" alt="TXOne Logo">
            </div>
        </div>
        <div class="ts-segment has-top-spaced-large" style="width: 360px">
            <form method="post" action="login.php">
                <div class="ts-wrap is-vertical">
                    <div class="ts-text is-label">使用者帳號</div>
                    <div class="ts-input is-start-icon is-underlined">
                        <span class="ts-icon is-user-icon"></span>
                        <input id="username" type="text" placeholder="Enter your username" name="username" required />
                    </div>
                    <div class="ts-text is-label">密碼</div>
                    <div class="ts-input is-start-icon is-underlined">
                        <span class="ts-icon is-lock-icon"></span>
                        <input id="password" type="password" placeholder="Enter your password" name="password" required />
                    </div>
                    <button class="ts-button is-fluid" type="submit" value="Sign In" name="login_user">
                        登入
                    </button>
                </div>
            </form>
        </div>
        <div class="ts-segment has-top-spaced-large" style="width: 360px">
            <div class="ts-wrap is-vertical">
                <div class="ts-text is-label">還沒有帳號嗎？</div>
                <a href="./register.php">
                    <button class="ts-button is-fluid">
                        註冊
                    </button>
                </a>
            </div>
        </div>
    </div>
</body>

</html>