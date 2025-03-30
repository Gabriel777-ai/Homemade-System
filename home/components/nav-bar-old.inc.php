<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>
<style>
    nav {
        position: sticky;
        top: 0;

        display: flex;
        justify-content: space-between;
        align-items: center;
        height: 12vh;
        width: 93vw;
        padding: 0 5vw 0 2vw;

        background-color: var(--primary);
        box-shadow: 0px 3vh 20px 0px rgba(0, 0, 0, 0.3);

        z-index: 9;
    }

    nav section,
    nav section form {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #btnDashboard {
        height: 50px;
        width: 50px;
        border: 2px solid black;
        border-radius: 15px;
        background-color: var(--white);
        color: var(--black);
        font-size: 2rem;
    }

    #btnDashboard:active {
        background-color: #5f5f5f;
    }

    #homelogo {
        height: 60px;
        width: 60px;
        background-color: white;
        border-radius: 30%;
    }

    nav a {
        color: var(--white);
        margin-left: 2vw;
        font-size: 2rem;
        text-decoration: none;
    }

    .nav-func {
        border-radius: 50%;
        font-size: 2rem;
    }

    .nav-func:hover {
        background-color: transparent;
    }

    summary {
        position: relative;
        padding-left: 20px;
        /* Space for the icon */
    }

    summary::before {
        content: "🔔";
        /* Closed icon */
        position: absolute;
        left: 0;
        transition: transform 0.3s ease;
    }


    aside {
        display: none;
        position: fixed;
        left: 0;
        bottom: 0;

        height: 87vh;
        width: 200px;
        background-color: var(--primary);
        box-shadow: 0px 3vh 20px 0px rgba(0, 0, 0, 0.3);
        overflow-x: hidden;
        overflow-y: auto;

        text-align: center;

        z-index: 9;
    }

    aside img {
        border-radius: 50%;
    }

    aside ul {
        padding: 0;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    aside ul li {
        list-style-type: none;
    }

    aside ul li button {
        padding: 5% 0;
        width: 175px;
        font-size: 1.2rem;
    }

    aside ul li button:hover {
        background-color: #777;
    }

    #logout {
        background-color: var(--red);
        color: var(--white);
        border: none;
        border-radius: 15px;
    }
</style>
<nav>
    <section>
        <button onclick="visible('dashboard')" type="button">☰</button>
        <button onclick="window.location.href='<?= BASE_URL ?>/home/'" aria-current="page">
            <img src="<?= BASE_URL ?>/home/images/logo1cropped.png" alt="logo" id='homelogo'>
        </button>
    </section>
    <section>
        <form method="GET" action="<?= $_SERVER['PHP_SELF']; ?>">
            <input type="text" name="search" placeholder="Search..." value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
            <button class='nav-func' type="submit">🔍</button>
        </form>
        <details>
            <summary class='nav-func'></summary>
            No notifications
        </details>
    </section>
</nav>


<aside id="dashboard">
    <?php
    switch($gender){
        case 'm': $pfp = BASE_URL . "/home/images/pfp-m.jpg"; break;
        case 'f': $pfp = BASE_URL . "/home/images/pfp-f.jpg"; break;
        case 'o': $pfp = BASE_URL . "/home/images/pfp-lgbtq.jpg"; break;
    }
    ?>
    <img src="<?= $pfp ?>" alt="Profile Picture">
    <form action='<?= BASE_URL ?>home/users/view-account.php' method='POST'>
        <sub><?php echo htmlspecialchars($role); ?></sub>

        <div>
            <input type='hidden' name='user_id' value="<?= $user_id ?>">
            <button id='profilebutton' type='submit' name='view_account'><?= $lastname . ", " . $firstname ?></button>
        </div>
    </form>
    <ul>
        <?php
            require_once __DIR__ . '/../../config-helper.php';
            if (isset(config('role')[$role])) {
                foreach (config('role')[$role] as $buttonLabel => $fileLocation) {
                    echo "<li><button onclick=\"window.location.href='" . $fileLocation . "'\">" . $buttonLabel . "</button></li>";
                }
            }
        ?>
        <li style='margin: 70px 0;'>
            <form method="POST" onsubmit="return confirm('Confirm Log-out?');" action="<?= BASE_URL ?>/home/process_logout.php">
                <button type="submit" id="logout">Log Out</button>
            </form>
        </li>
    </ul>
</aside>

<script src="<?= BASE_URL ?>vendor/bootstrap/bootstrap.bundle.min.js"></script>
<script src="<?= BASE_URL ?>/main.js"></script>