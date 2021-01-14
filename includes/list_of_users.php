<?php
    include_once 'connect.php';

    $page = 'users';
    $user_data = json_decode(file_get_contents('webhook.json'), true);
?>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>family</th>
            <th>key</th>
            <th>url</th>
            <th>img_name</th>
            <th>update</th>
            <th>settings</th>
        </tr>
    </thead>
    <tbody>
        <?php if($user_data): ?>

            <?php 
                http_response_code(200);
                echo "OK";
            ?>

            <?php foreach($user_data as $data): ?>
                <tr>
                    <td><?php echo $hash = $data['hash'] ?></td>
                    <td><?php echo $var2 = $data['name'] ?></td>
                    <td><?php echo $var3 = $data['family'] ?></td>
                    <td><?php echo $var4 = $data['data']['key'] ?></td>
                    <td><?php echo $var5=$data['data']['url'] ?></td>
                    <td><?php echo $var6=$data['data']['img_name'] ?></td>
                    <td><?php echo $var7=$data['update'] ?></td>
                    <td> 
                        <form method="post">
                            <input type="submit" name="edit" value="edit"/> 
                            <input type="submit" name="delete" value="delete"/> 
                        </form>
                    </td>
                </tr>

                <?php

                    $connect = OpenConnection();

                    if ($connect->connect_errno) {
                        printf("Connection was failed: %s\n", $connect->connect_error);
                        exit();
                    }
                    

                    $query = "SELECT * FROM profiles";
                    if($query = $connect->query($query)) {
                        $count = $query->num_rows;

                        printf("Result set has %d rows.\n", $count);

                        $query->close(); 
                    }

                    if($count > 0) {
                        $connect->query("INSERT INTO profiles 
                        VALUES ('$hash', '$var2', '$var3', '$var4', '$var5', '$var6', '$var7')
                        ON DUPLICATE KEY UPDATE user_name = '$var2', user_family = '$var3', user_key = '$var4', user_url = '$var5', user_img_name = '$var6', user_update = '$var7';") or die ("no updating..");
                    } else {
                        $connect->query("INSERT INTO profiles (user_id, user_name, user_family, user_key, user_url, user_img_name, user_update) VALUES ('$hash', '$var2', '$var3', '$var4', '$var5', '$var6', '$var7')") or die ("no creating...");
                    }

                    if(isset($_POST['edit'])) { 
                        echo "This is edit that is selected"; 
                    } 
                    if(isset($_POST['delete'])) { 
                        echo "This is delete that is selected"; 
                    } 

                    $connect->close();
                ?> 

            <?php endforeach; ?>

        <?php else: ?>

            <?php 
                echo "Error! Get webhook-request!!";
            ?>    

        <?php endif; ?>
    </tbody>
    
</table>

