<?php 
// redirect to login if not logged in
if(!isset($_SESSION)) {
    session_start();
}
if(!isset($_SESSION["user_id"])) {
    header("location: ../login.php?error=notloggedin");
}
?>
            <footer class="shadow">
                <p class="footer-text">Vandelay industries © Copyright 2022</p>
            </footer>
        </div>
    </div>
</body>
</html>