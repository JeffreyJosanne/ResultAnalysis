<html>
<head>
<title>
<STYLE>

</STYLE>


Search data</title>
</head>
<body>

<div style="width: 300px; height: 300px; overflow: scroll; border: 1px SOLID black; background-color: #acc;">

<table>
  <tr>
    <td align="center">STUDENT DATA</td>
  </tr>
  <tr>
    <td>
      <table border="1">
      <tr>
        <td>REGISTER NO</td>
        <td>SUB &nbsp;CODE</td>
        <td>CREDITS</td>
      </tr>
<?php
//the example of searching data with the sequence based on the field name
//search.php
$conn=mysqli_connect("localhost","root","focus","result") or die("Could not connect");

			$sel="select reg_no,sub_code,credits from db_result";
			$result = mysqli_query($conn,$sel);
while($data = mysqli_fetch_row($result)){
  echo("<tr><td>$data[0]</td><td>$data[1]</td><td>$data[2]</td></tr>");
}
?>
    </table>

  </td>

</tr>

</table>

</div>

</body>

</html>
