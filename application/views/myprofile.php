<div style="text-align:center;">
    <?php 
    if(isset($_SESSION['userid']))
    {?>
        You can edit your email address, gender and name on your Facebook <a href="https://www.facebook.com/settings">Account Setting</a> 
    <?php } ?>

    <br><br><br>
    <center>
        <table > 
            <tr>
                <td style="padding-right: 10px">
                  <label>Name:</label>
                </td>
                <td>
                   <input type="text" name="firstname" readonly="readonly" value="<?php echo $Name ; ?>"><br>
                </td>
            </tr>
            <tr>
                <td style="padding-right: 10px">
                 <label>Email:</label>
                </td>
                <td>
                   <input type="text" name="firstname" readonly="readonly" value="<?php echo $Email; ?>"><br>
                </td>
            </tr>
        </table>
    </center>
</div>