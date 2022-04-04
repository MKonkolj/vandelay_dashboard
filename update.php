<?php 
include "./includes/header.inc.php"
?>
<main>
    <div class="main-page shadow form-container">
    <h2 class="form-title">Create employee</h2>
    <form class="main-form" action="">
        <input type="text" name="firstname" placeholder="First name">
        <input type="text" name="lastname" placeholder="Last name">
        <select name="position">

        </select>
        <input type="number" name="salary" placeholder="Salary">
        <input type="text" name="email" placeholder="Email">
        <button type="submit" name="submit">Create</button>
        <?php 
        // if administrator selected - show password field
        // hash pass before posting
        ?>
    </form>

    </div>
</main>
<?php 
include "./includes/footer.inc.php"
?>