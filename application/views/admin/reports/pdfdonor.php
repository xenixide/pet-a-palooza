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
<center><h3>List of Donations</h3></center>
<table>
    <tr>
        <td>#</td>
        <td>Name of Donator</td>
        <td>Type of Donation</td>
        <td>Date Donated</td>
    </tr>
    <?php if(!empty($donations)){ $count=1; foreach($donations as $donation){ ?>
        <tr>
          <td><?= $count ?></td>
          <td><?= $donation->name ?></td>
          <td><?= $donation->donation_type ?></td>
          <td><?= date('F d, Y', strtotime($donation->created_at)) ?>               
        </tr>
    <?php }} ?>
</table>
</html>