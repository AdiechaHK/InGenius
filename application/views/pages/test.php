<html>
  <head>
    <title>Test page</title>
  </head>
  <body>
    <div class="container">
      <table>
        <thead>
          <tr>
            <th>id</th>
            <th>name</th>
            <th>icon</th>
            <th>post</th>
            <th>debate</th>
            <th>like</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($test as $comm) { ?>
          <tr>
            <td><?=$comm->id?></td>
            <td><?=$comm->name?></td>
            <td><?=$comm->icon?></td>
            <td><?=$comm->posts?></td>
            <td><?=$comm->debate?></td>
            <td><?=$comm->c_likes?></td>
            <!-- <td>c_likes</td> -->
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </body>
</html>