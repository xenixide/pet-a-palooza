<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>
<center><h3>For Adoption Pets</h3></center>
<table>
    <tr>
        <td>#</td>
        <td>Pet name</td>
        <td>Location of Rescue</td>
        <td>Date Rescue</td>
    </tr>
    <?php if(!empty($animals)){ $count=1; foreach($animals as $animal){ ?>
        <tr>
          <td><?=$count++?></td>
          <td><?=$animal->petname?></td>
          <td><?=$animal->locationrescue?></td>
          <td><?=date('F d, Y', strtotime($animal->daterescue))?></td>
        </tr>
    <?php }} ?>
</table>
</html>