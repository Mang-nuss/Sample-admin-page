<?php  
// echo "in advices, ";
    require_once('../private/initialize.php');    
    $thetitle = "NP";
    $menutitle = "NP admin site";
    include_once(SHARED_PATH . '/lists_header.php');
?>

<section class="login">
<p> Are you logged in? </p>
<form action="<?php echo url_for("../private/json.php"); /*WHY is
    this ../private reference needed? */?>" method="post">

      <a>
        <input type="submit" value="Login" />
      </a>
    </form>
</section>

<section class="sidebar">
  <ul>  
    <?php 
    $id = $_GET['advice_id'];
    include_once(PRIVATE_PATH . "/navigator.php");?>
  </ul>
</section>

<section class="contents">
  <?php
      $advice = find_advice_by_id($id);
      $products = find_products_by_advice_id($id);
  ?>
  <p> Advice: <?php echo $advice['advice_title']; ?><br>
      Products (displaying the MySQL strip_tags function): </p>
    <ul>
      <?php 
      while($p = mysqli_fetch_assoc($products)) { ?>
        <li>
          <?php 
            $set = '<h1><h2><p>';
            echo strip_tags($p['product_name'], $set);
            echo strip_tags($p['note'], $set); 
          ?>          
        </li>
        <?php
      }
      ?>
    </ul>

  <div class="desc">
      <h2><?php echo "About your app" ?></h2>
      <p>
      After you have been authenticated (by logging in), all info about the contents
      of your specific application will be displayed.
      </p>
  </div>

  <!-- JSON GENERATOR FORM -->
  <form action="<?php echo url_for("../private/json.php"); /*WHY is
      this ../private reference needed? */?>" method="post">

        <dl>
          <dt>Clinic id</dt>
          <dd><input type="text" name="id" value="" /></dd>
        </dl>
        <!-- <div class="operations"> -->
        <a>
          <input type="submit" value="Generate JSON" />
          </a>
        <!-- </div> -->
      </form>
</section>

<?php include_once(SHARED_PATH . '/lists_footer.php'); //incldes the closing clauses ?>