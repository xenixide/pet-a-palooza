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
<center><h3>List of Volunteers</h3></center>
<table>
    <tr>
        <td>#</td>
        <td>Name</td>
        <td>Email</td>
        <td>Gender</td>
    </tr>
    <?php if(!empty($volunteers)){ $count=1; foreach($volunteers as $volunteer){ ?>
        <tr>
            <td><?=$count++?></td>
            <td><?=$volunteer->fname?> <?=$volunteer->lname?></td>
            <td><?=$volunteer->email?></td>
            <td><?=$volunteer->gender?></td>
        </tr>
    <?php }} ?>
</table>
</html>