<?php


session_start();
// hide all error
error_reporting(0);
if (!isset($_SESSION["mikhmon"])) {
  header("Location:../admin.php?id=login");
} 

?>
<?php
    if ($comm != "") {
    } else {
      echo "<option value=''>".$_comment."</option>";
    }
    $TotalReg = count($getuser);
    //Esta linea de abajo me trae los host post
    $srvlist = $API->comm("/ip/hotspot/print");

    //esta linea añade nuevo ipbiding
    if (isset($_POST['name'])) {
      $server = ($_POST['server']);
      $name = ($_POST['name']);
      $password = ($_POST['pass']);
      $profile = ($_POST['profile']);
      $disabled = ($_POST['disabled']);
      $timelimit = ($_POST['timelimit']);
      $datalimit = ($_POST['datalimit']);
      $comment = ($_POST['comment']);
      $chkvalid = ($_POST['valid']);
      $mbgb = ($_POST['mbgb']);
      if ($timelimit == "") {
        $timelimit = "0";
      } else {
        $timelimit = $timelimit;
      }
      if ($datalimit == "") {
        $datalimit = "0";
      } else {
        $datalimit = $datalimit * $mbgb;
      }
      if ($name == $password) {
        $usermode = "vc-";
      }else{
        $usermode = "up-";
      }
      
        $comment = $usermode.$comment;
      
      $API->comm("/ip/hotspot/user/add", array(
        "server" => "$server",
        "name" => "$name",
        "password" => "$password",
        "profile" => "$profile",
        "disabled" => "no",
        "limit-uptime" => "$timelimit",
        "limit-bytes-total" => "$datalimit",
        "comment" => "$comment",
      ));
      $getuser = $API->comm("/ip/hotspot/user/print", array(
        "?name" => "$name",
      ));
      $uid = $getuser[0]['.id'];
      echo "<script>window.location='./?hotspot-user=" . $uid . "&session=" . $session . "'</script>";
    }

    ?>
<div class="row">
<div class="col-8">
<div class="card box-bordered">
  <div class="card-header">
  <h3><i class="fa fa-user-plus"></i> <?= $_add_ipbinding ?> <small id="loader" style="display: none;" ><i><i class='fa fa-circle-o-notch fa-spin'></i> <?= $_processing ?> </i></small></h3> 
  </div>
  <div class="card-body">
<form autocomplete="off" method="post" action="">  
  <div>
  <?php if ($_SESSION['ubp'] != "") {
    echo "    <a class='btn bg-warning' href='./?hotspot=users&profile=" . $_SESSION['ubp'] . "&session=" . $session . "'> <i class='fa fa-close'></i> ".$_close."</a>";
  } else {
    echo "    <a class='btn bg-warning' href='./?hotspot=ipbinding&profile=all&session=" . $session . "'> <i class='fa fa-close'></i> ".$_close."</a>";
  }//se modifico la linea 24 para redireccionar a la lista de ipbinding
  ?>
    <button type="submit" onclick="loader()" class="btn bg-primary" name="save"><i class="fa fa-save"></i> <?= $_save ?></button>
  </div>

<table class="table">
  <tr>
    <td class="align-middle" >Server</td>
    <td>
			<select class="form-control" name="server" required="1">
				<option>all</option>
				<?php $TotalReg = count($srvlist);
    for ($i = 0; $i < $TotalReg; $i++) {
      echo "<option>" . $srvlist[$i]['name'] . "</option>";
    }
    ?>
			</select>
		</td>
	</tr>
  <tr>
    <td class="align-middle">Mac Address</td><td><input class="form-control" type="text" autocomplete="off" name="name" value="" required="1" autofocus></td>
  </tr>
  <tr>
    <td class="align-middle">Address</td><td><input class="form-control" type="text" autocomplete="off" name="name" value="" required="1" autofocus></td>
  </tr>
  <tr>
    <td class="align-middle"> Type</td>
    <td>
			<select class="form-control" name="server" required="1">
				<option>regular</option>
        <option>bypassed</option>
        <option>blocked</option>
			
			</select>
		</td>
  </tr>
  <tr >
    <td  colspan="4" class="align-middle"  id="GetValidPrice"></td>
  </tr>
</table>
</form>
</div>
</div>
</div>