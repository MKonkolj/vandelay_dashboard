<?php 
include "./includes/header.inc.php";
?>
<main>
    <div class="main-page shadow form-container">
    <h2 class="form-title">Create employee</h2>
    <form class="main-form" action="./includes/create.inc.php" method="POST">
        <input type="text" name="firstname" placeholder="First name" value="Test name">
        <input type="text" name="lastname" placeholder="Last name" value="Test lastname">
        <select name="position">
            <option value="2">Test</option>
        </select>
        <input type="number" name="salary" placeholder="Salary" value="12345">
        <input type="text" name="email" placeholder="Email" value="test@test.com">
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