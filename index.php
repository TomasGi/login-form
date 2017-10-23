<?php
    include_once 'header.php';
    $logged = isset($_SESSION['u_uname']);
?>

<div class="background-notification can-toggle-notification"></div>
<div class="notification run">
    <div class="close-notification can-toggle-notification">
        <i class="material-icons">&#xE5CD;</i>
    </div>
    <div class="notification-message">
        notification
    </div>
</div>

<body>
    <div class="container">
        <div class="backround-image"></div>
        <div class="header<?php if ($logged) {
            echo " logged";
}?>">
            <div class="button-menu can-toggle-menu">
                <i class="material-icons">&#xE5D2;</i>
            </div>
            <div class="button-info">
                <div id="info">
                    <i class="material-icons">&#xE5D0;</i>
                </div>
            </div>
        </div>
        <div class="background-fixed can-toggle-menu"></div>
        <div class="main-menu off">
            <div class="navigation-content">
                <div class="menu-header">
                    <div class="close-button can-toggle-menu">
                        <i class="material-icons">&#xE5CD;</i>
                    </div>
                </div>
                <nav>
                    <?php
                    if (!$logged) {
                        echo '<div class="item can-toggle-menu can-toggle-signup">
                        Sign up
                    </div>
                    <div class="item can-toggle-menu can-toggle-forgotpsw">
                        Forgot my details
                    </div>
                    <div class="item can-toggle-menu">
                        About
                    </div>';
                    } else {
                        echo '<div class="item can-toggle-menu">';
                        echo  $_SESSION['u_uname'];
                        echo '</div>
                    <div class="item can-toggle-menu">
                        About
                    </div>
                    <div class="item can-toggle-menu">
                    <form action="includes/logout.inc.php" method="POST">
                    <button type="submit" name="submit">Logout</button>
                    </form>
                    </div>';
                    }
                    ?>

                </nav>
            </div>
        </div>
        <?php if (!$logged) {
            echo '

        <div class="background-forgot can-toggle-forgotpsw"></div>
        <div class="form forgot-details run">
            <div class="close-forgot can-toggle-forgotpsw">
                <i class="material-icons">&#xE5CD;</i>
            </div>
            <div class="header-text">Enter your email to reset your password.</div>
            <form>
                <div class="email">
                    <label for="email-forgot"><i class="material-icons">&#xE0BE;</i></label>
                    <input id="email-forgot" type="email" placeholder="Email" name="uname" required>
                </div>
                <div class="button-submit">
                    <button type="submit">Submit</button>
                </div>
            </form>

        </div>
        <div class="form signin-form">
            <div class="header-text">
                Sign In
            </div>
            <form action="includes/signin.inc.php" method="POST" >
                <div class="uname">
                    <label for="uname"><i class="material-icons">&#xE7FD;</i></label>
                    <input id="uname" type="text" placeholder="Username/Email" name="uname" required>
                </div>
                <div class="psw">
                    <label for="psw"><i class="material-icons">lock</i></label>
                    <input id="psw" type="password" placeholder="Password" name="psw" required>
                    <!-- <div class="forgot-psw">
                        <i class="material-icons">&#xE88F;</i>
                    </div> -->
                </div>
                <div class="button-submit">
                    <button type="submit" name="submit">Sign in</button>
                </div>
            </form>
            <div class="footer-text">
                Don';echo't have an account? <a class="can-toggle-signup" href="javascript:">SIGN UP</a>
            </div>
        </div>
        <div class="form signup-form run">
            <div class="arrow-back can-toggle-signup">
                <i class="material-icons">&#xE5CD;</i>
            </div>
            <div class="header-text">
                Sign Up
            </div>
            <form onsubmit="submitSignup(); return false;" method="POST">
                <div class="uname">
                    <label for="uname-reg"><i class="material-icons">&#xE7FD;</i></label>
                    <input id="uname-reg" type="text" placeholder="Username" name="uname" required>
                </div>
                <div class="email">
                    <label for="email-reg"><i class="material-icons">&#xE0BE;</i></label>
                    <input id="email-reg" type="email" placeholder="Email" name="email" required>
                </div>
                <div class="psw">
                    <label for="psw-reg"><i class="material-icons">lock</i></label>
                    <input id="psw-reg" type="password" placeholder="Password" name="psw" required>
                    <div class="psw-info ">
                        <i class="material-icons can-toggle-pswinfo">&#xE88F;</i>
                        <div class="info-background can-toggle-pswinfo"></div>
                        <div class="info-box run">
                            <div class="close-info can-toggle-pswinfo">
                                <i class="material-icons">&#xE5CD;</i>
                            </div>
                            Password must be 8-16 characters and include both numbers and letters
                        </div>
                    </div>
                </div>
                <div class="psw">
                    <label for="psw-reg2"><i class="material-icons">lock</i></label>
                    <input id="psw-reg2" type="password" placeholder="Repeat Password" name="psw2" required>
                </div>
                <div class="button-submit">
                    <button type="submit" name="create">Create</button>
                </div>
            </form>
            <div class="footer-text">
                By pressing Create you agree to the <a class="can-toggle-terms" href="javascript:">terms and conditions</a>
                <div class="terms-conditions run">
                    <div class="close-terms can-toggle-terms">
                        <i class="material-icons">&#xE5CD;</i>
                    </div>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum repellat inventore excepturi delectus temporibus! Totam tempora
                    non doloremque ea, aspernatur eligendi veniam, ut quisquam saepe inventore consequatur distinctio magnam
                    illo rem autem debitis earum error quam recusandae. Eligendi sequi temporibus fugiat, suscipit omnis
                    excepturi nostrum? Iusto pariatur repudiandae rem cum repellendus, fugiat similique facere nihil id dolores
                    nesciunt, excepturi, a voluptate. Ea consectetur accusamus voluptatem, aspernatur sint quos repudiandae
                    enim maiores id molestiae ad earum harum deleniti quo porro placeat laboriosam dignissimos veniam? Aliquid,
                    iusto tempore. Hic assumenda ducimus dignissimos autem eaque vero nobis iure quam ipsam asperiores, ex
                    itaque quidem nostrum odit tenetur consequuntur, iusto expedita! Nostrum, alias dicta ducimus officiis
                    quia consequatur atque nulla placeat eius temporibus modi delectus sit, non natus, iusto amet! Aliquid,
                    debitis. Quia atque architecto beatae quidem libero quisquam, ipsam suscipit porro. Recusandae, sunt?
                    Error architecto aliquid officia beatae minima veritatis, molestias fugit perferendis libero eaque quidem
                    voluptate totam cupiditate eum qui tempora eos consequuntur mollitia voluptatibus praesentium sunt ea
                    accusantium placeat. Facere ab dolorem amet iste nobis molestias possimus at minima quasi iure eveniet,
                    sapiente ex illo cum obcaecati eius! Porro, nesciunt iure, omnis perspiciatis, magnam eligendi alias
                    neque minima dignissimos rem id non a culpa? Eius blanditiis possimus sapiente, facere dolor, laudantium
                    dolorem quas pariatur a nobis repudiandae illum ea delectus rerum ab reprehenderit consectetur dolores
                    vitae hic quidem? Quis enim recusandae nemo exercitationem officiis blanditiis magni ipsa obcaecati alias
                    quos iste aut dolore, cupiditate voluptatibus provident atque. Eaque error, magni praesentium facilis
                    dolorem, quod minus incidunt a impedit repellendus et beatae eius est ratione. Aperiam accusamus dolores
                    odit delectus ullam, illum qui quam ipsa nam. Provident, dolore recusandae repellat debitis consectetur
                    tenetur adipisci culpa nulla voluptas earum eaque porro sapiente, temporibus accusamus mollitia ullam
                    qui illum, itaque incidunt quae quo illo.
                </div>
            </div>
        </div>
    ';
}?>
    </div>


</body>
<script src="js/script.js"></script>

</html>
