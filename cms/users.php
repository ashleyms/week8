<?php
    include("../functions/myfunctions.php");
    include("partials/session-start.php");
    include("partials/cmsheader.php");
    $arrUsers = getResults("SELECT * FROM users");
?>
<!-- Open Container -->
<main class="container-fluid">
    <!-- Heading -->
	<h1 class="cms-head">Users</h1>
    <!-- Info Para -->
    <p class="descipt">List of current users on your site. Here you can add, edit and delete users by clicking on the icons. <br />
        <!-- Add User -->
        <button class="btn btn-success add-gal" data-toggle="modal" data-target="#modalnew"><i class="fa fa-plus fa-lg"></i>  Add User</button>
    </p>
    <!-- Open Table -->
    <table class="pages">
        <!-- Headings -->
        <tr>
            <th>Full Name</th><th>Username</th>
         </tr>
        <!-- Loop through users -->
        <?php
        foreach($arrUsers as $user){ ?>
            <tr>
                <!-- Display Name -->
                <td class="textRow"><?=$user['strName']?></td>
                <!-- Display UserName -->
                <td class="textRow"><?=$user['strUser']?></td>
                <!-- Edit Button -->
                <td>
                    <button class="btn btn-lg" data-toggle="modal" data-target="#modal<?=$user['id']?>">
                        <i class=" fa fa-pencil-square-o fa-lg"></i>
                    </button>
                </td>
                <!-- Delete Button -->
                <td>
                    <button class="btn btn-danger btn-lg" data-toggle="modal" data-target="#modaldelete<?=$user['id']?>">
                        <i class=" fa fa-trash fa-lg"></i>
                    </button>
                </td>
            </tr>
        <?php }?>
        <!-- Close Loop -->
    </table>
    <!-- Close Table -->


    <!-- ************ MODAL WINDOWS ************ -->

    <!-- Modal Delete -->
    <?php foreach($arrUsers as $user){ ?>
    <div class="modal fade" id="modaldelete<?=$user['id']?>" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">
                        Confirm
                    </h4>
                    <button type="button" class="close"
                       data-dismiss="modal">
                           <span aria-hidden="true">&times;</span>
                           <span class="sr-only">Close</span>
                    </button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <p>
                        Are you sure you want to delete "<?=$user['strName']?>"?
                    </p>
                    <a href='../actions/delete_record.php?id=<?=$user['id']?>&page=users'><button class="btn btn-danger btn-md" data-toggle="modal" data-target="#modaldelete">
                    Delete
                  </button></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Close Modal Delete -->

    <!-- Modal User Edit -->
    <div class="modal fade" id="modal<?=$user['id']?>" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">
                        Edit: <?=$user["strName"]?>
                    </h4>
                    <button type="button" class="close"
                       data-dismiss="modal">
                           <span aria-hidden="true">&times;</span>
                           <span class="sr-only">Close</span>
                    </button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <!-- Open Form -->
                    <form action="../actions/save_record.php?id=<?=$user['id']?>&page=users" method="POST">
                          <!-- Full Name -->
                          <div class="form-group">
                              <label>Full Name</label>
                              <input type="text" class="form-control" name="strName" value="<?=$user["strName"]?>"/>
                          </div>
                          <!-- Username -->
                          <div class="form-group">
                              <label>Username</label>
                              <input type="text" class="form-control" name="strUser" value="<?=$user["strUser"]?>"/>
                          </div>
                          <!-- Password -->
                          <div class="form-group">
                              <label>Password</label>
                              <input type="password" class="form-control" name="strPassword" value="<?=$user["strPassword"]?>"/>
                          </div>
                          <!-- Submit -->
                          <input type="submit" class="btn btn-primary" value="Save">
                    </form>
                    <!-- Close Form -->
                </div>
            </div>
        </div>
    </div>
    <?php }?>
    <!-- Close Modal User Edit -->

    <!-- Modal New-->
    <div class="modal fade" id="modalnew" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">
                        New User:
                    </h4>
                    <button type="button" class="close"
                        data-dismiss="modal">
                          <span aria-hidden="true">&times;</span>
                          <span class="sr-only">Close</span>
                    </button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <!-- Open Form -->
                    <form action="../actions/new_record.php?page=users" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <!-- Full Name -->
                            <label>Full Name</label>
                            <input type="text" class="form-control" name="strName"/>
                        </div>
                        <!-- User Name -->
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" name="strUser"/>
                        </div>
                        <!-- Password -->
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="strPassword"/>
                        </div>
                        <!-- Subtmi -->
                        <input type="submit" class="btn btn-primary" value="Save">
                    </form>
                    <!-- Close Form -->
                </div>
            </div>
        </div>
    </div>

</main>
<!-- Close Container -->
<?php include("partials/cmsfooter.php"); ?>
