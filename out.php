<?php
	session_start();
	if($_SESSION["i"]!=0){
		require_once './check.php';
	}else{
		$_SESSION["i"]=$_SESSION["i"]+1;
		}
?>




</div><br><br><hr><br></td></tr>
<style>
	.dif{
		font-family: MyFont1;
		font-weight: bold;
	}
</style>

<tr><td colspan=3>
        <table border=1 style="padding-center: 10px; border: 2px solid rgba(0, 145, 255, 1)" cellspacing=4>
            <tr class="row">
				
                <td class="dif">X</td>
                <td class="dif">Y</td>
                <td class="dif">R</td>
                <td class="dif">CHECK</td>
                <td class="dif">TIME</td>
                <td class="dif">SCRIPT TIME</td>
            </tr>

            <?php
            foreach ($_SESSION["listResult"] as $item) {

                $resultItem = $item;

                ?>
                <tr class="row">
                    <td class="dif"> <?php echo $resultItem["x"]?> </td>
                    <td class="dif"> <?php echo $resultItem["y"]?> </td>
                    <td class="dif"> <?php echo $resultItem["r"]?> </td>
                    <td class="dif"> <?php echo $resultItem["pass"]?> </td>
                    <td> <?php echo $resultItem["time"]?> </td>
                    <td> <?php echo $resultItem["exec"]?> </td>
                </tr>
            <?php
            }
            ?>
        </table>
        <br>

</td></tr>
