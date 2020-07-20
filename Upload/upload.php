<?php
$severName ="DESKTOP-73HCV5N\SQLEXPRESS";
$connectionInfo = array("Database"=>"nguoi_dung");
$conn = sqlsrv_connect($severName,$connectionInfo);

if($conn){
    echo "Connection established <br/>";
}
else{
    echo "Connection could not be establish<br/>";
    die(print_r(sqlsrv_error(),true));
}
$sql = "select * from dbo.Song";
$stmt = sqlsrv_query($conn,$sql);
if($stmt==false){
    die(print_r(sqlsrv_error(),true));
}
echo" ";
while($row=sqlsrv_fetch_Array($stmt,SQLSRV_FETCH_ASSOC)){
    $songs[] =$row['SongFileName'];
}
echo json_encode($songs);
//Album

$sql1 = "select * from dbo.Album ";
$stmt1 = sqlsrv_query($conn,$sql1);
if($stmt1==false){
    die(print_r(sqlsrv_error(),true));
}
echo" ";
while($row1=sqlsrv_fetch_Array($stmt1,SQLSRV_FETCH_ASSOC)){
    $image[] =$row1['ImageName']; 
}
    echo json_encode($image);
?>
<!DOCTYPE html>
<html lang="en">
<head>

</head>
<body>
<div id="uploadMusic">
        <table id="tblContainer">
            <tr>
                <td colspan="2">
                    <table id="table1" cellpadding="2" cellspacing="2" style="width: 1480px;">
                        <tr style="height: 30px; background-color:#6cb137 ; color:#FFFFFF ;border: solid 1px #659EC7;">
                            <td>
                                <h3 style="text-align: center;"> Add music, Upload Music</h3>
                            </td>
                        </tr>
                        <tr>
                            <td valign="top">
                                <form novalidate name="f2" ng-submit="saveMusicDetails()">
                                    <table style="color:#9F000F;font-size:large" cellpadding="4" cellspacing="6">
                                        <tr>
                                            <td><b>ID: </b></td>
                                            <td>
                                                <input type="text" name="txtmusicID" ng-model="musicID" 
                                                    style="background-color:tan" readonly />
                                                <br />
                                            </td>
                                            <td>
                                                <b>Singer Name : </b>
                                            </td>
                                            <td>
                                                <input type="text" name="txtSingerName" ng-model="SingerName"
                                                    placeholder="Singer Name" required />
                                                <br />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <b> Album Name: </b>
                                            </td>
                                            <td>
                                                <select name="opSelect" id="opSelect" ng-model="AlbumNameS">
                                                    <option value="" selected>-- Select --</option>
                                                    
                                                </select>
                                                <br />
                                            </td>
                                            <td>
                                                <b> Music File Upload: </b>
                                            </td>
    
                                            <td>
                                                <input type="file" id="fileSong" name="fileSong" accept="audio/mp3">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <input type="submit" value="Save Music"
                                                    style="background-color:#e20952;color:#FFFFFF" required />
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="2">
    
                    <table
                        style="width: 1480px; background-color:#FFFFFF; border: solid 2px #6D7B8D; padding: 5px;table-layout:fixed;"
                        cellpadding="2" cellspacing="2">
    
                        <tr style="height: 30px; background-color:#476444 ; color:#FFFFFF ;border: solid 1px #659EC7;">
                            <td width="40" align="center"><b>Edit</b></td>
                            <td width="40" align="center"><b>Delete</b></td>
                            <td width="100" align="center"><b>Singer Name </b></td>
                            <td width="120" align="center"><b>Album Name</b></td>
                            <td width="120" align="center"><b>Song File</b></td>
                        </tr>
                        <tbody data-ng-repeat="details in MusicData">
                            <tr>
                                <td align="center" style="border: solid 1px #659EC7; padding: 5px;table-layout:fixed;">
                                    <span style="color:#9F000F">
                                        <img src="logo/edit.png" alt="Edit" width="24px" height="24px"
                                            ng-click="MusicEdit(details.MusicID, details.SingerName, details.AlbumName, details.MusicFileName, details.Description)">
    
                                    </span>
                                </td>
                                <td align="center" style="border: solid 1px #659EC7; padding: 5px;table-layout:fixed;">
                                    <span style="color:#9F000F">
                                        <img src="logo/del.png" alt="Delete" width="24px" height="24px"
                                            ng-click="MusicDelete(details.MusicID)">
                                    </span>
                                </td>
    
                                <td align="center" style="border: solid 1px #659EC7; padding: 5px;table-layout:fixed;">
                                    <span style="color:#9F000F">Singer</span>
                                </td>
    
                                <td align="center" valign="top"
                                    style="border: solid 1px #659EC7; padding: 5px;table-layout:fixed;">
                                    <span style="color:#9F000F">AlbumName</span>
                                </td>
    
                                <td align="center" valign="top"
                                    style="border: solid 1px #659EC7; padding: 5px;table-layout:fixed;">
                                    <span style="color:#9F000F">Song File Name</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
    
                </td>
            </tr>
    
        </table>
        <img src="/Images/blank.gif" alt="" width="1" height="2" />
        <table style='width: 99%;table-layout:fixed;'>
            <tr>
                <td colspan="2">
                    <table
                        style="width: 99%; background-color:#FFFFFF; border: dashed 3px #6D7B8D; padding: 5px;width: 99%;table-layout:fixed;"
                        cellpadding="2" cellspacing="2">
                        <tr style="height: 30px; background-color:#e20952 ; color:#FFFFFF ;border: solid 1px #659EC7;">
                            <td>
                                <h3 style="text-align: center;"> Manage Album Details</h3>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td width="40%" valign="top">
                    <form novalidate name="f1" ng-submit="saveAlbum()">
                        <table style="color:#9F000F;font-size:large" cellpadding="4" cellspacing="6">
                            <tr>
                                <td>
                                    <b>Album ID: </b>
                                </td>
                                <td>
                                    <input type="text" name="txtAlbumIdentitys" ng-model="AlbumIdentitys" 
                                        style="background-color:tan" readonly />
                                    <br />
    
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b> Album Name : </b>
                                </td>
                                <td>
                                    <input type="text" name="album_name" ng-model="AlbumName" placeholder="Album Name"
                                        required />
                                    <br />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b> Singer Name : </b>
                                </td>
                                <td>
                                    <input type="text" name="singer_name" placeholder="Singer Name"
                                        required />
                                    <br />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Select Album Image File : </b>
                                </td>
    
                                <td>
                                    <input type="file" id="avatar" name="avatar" accept="image/*">
                                    <br />
                                </td>
                            <tr>
    
                                <td colspan="2">
                                    <input type="submit" value="Save Album" style="background-color:#407531;color:#FFFFFF"
                                        required />
                                </td>
                            </tr>
                        </table>
                    </form>
                </td>
                <td valign="top">
    
                    <table
                        style="width: 70%; background-color:#FFFFFF;border :solid 2px #6D7B8D; padding: 5px;width: 98%;table-layout:fixed;"
                        cellpadding="2" cellspacing="2">
    
                        <tr style="height: 30px; background-color:#5e2f50 ; color:#FFFFFF ;border: solid 1px #659EC7;">
                            <td width="40" align="center"><b>ID </b></td>
                            <td width="120" align="center"><b>Album Name</b></td>
                            <td width="50" align="center"><b>Image</b></td>
    
                        </tr>
                        <tbody data-ng-repeat="details in AlbumData">
                            <tr>
    
                                <td align="center" style="border: solid 1px #659EC7; padding: 5px;table-layout:fixed;">
                                    <span style="color:#9F000F">ID Album</span>
                                </td>
    
                                <td align="center" style="border: solid 1px #659EC7; padding: 5px;table-layout:fixed;">
                                    <span style="color:#9F000F">AlbumName</span>
                                </td>
    
                                <td align="center" style="border: solid 1px #659EC7; padding: 5px;table-layout:fixed;">
                                    <img src="img/bb.jpg" width="48px" height="48px">
                                </td>
                            </tr>
                            <button id="back">Click here to back</button>
                        </tbody>
                    </table>
                </td>
            </tr>
    
        </table>
</div>
</body>
</html>
