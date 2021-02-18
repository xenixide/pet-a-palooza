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
<center><h3>List of Adopted Pets</h3></center>
<table>
    <tr>
        <td>#</td>
        <td>Pet name</td>
        <td>Adopted By</td>
        <td>Date Adopted</td>
    </tr>
    <?php if(!empty($animals)){ $count=1; foreach($animals as $animal){ ?>
        <tr>
            <td><?php echo $count++?></td>
            <td><?php echo $animal->petname?></td>
            <td><?php echo $animal->adopter_by?></td>
            <td><?php echo date('F d, Y', strtotime($animal->date_adopted))?></td>
        </tr>
    <?php }} ?>
</table>
</html>