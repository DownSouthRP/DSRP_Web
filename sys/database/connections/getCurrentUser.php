<?php

if(isset($_SESSION) && $_SESSION['loggedin'] == TRUE && $_SESSION['loggedin'] !== '') {

    include_once $_SERVER['DOCUMENT_ROOT']."/sys/database/dbConnection.php";

    if($stmt = $con->prepare(" SELECT id, displayName, email, communityRank, permissionRank, recruitmentRank, profileBanner, discordID, steamID, teamspeakID FROM accounts WHERE id = ? ")) {
        $stmt->bind_param("s", $_SESSION['id']);
        $stmt->execute();
        $stmt->store_result();
        if($stmt->num_rows > 0) {
            $stmt->bind_result($id, $displayName, $email, $communityRank, $permissionRank, $recruitmentRank, $profileBanner, $discordID, $steamID, $teamspeakID);
            $stmt->fetch();
        
        } else {
            echo "<script>alert('ERROR! An error has occured at level 2.-');</script>";
            echo '<script type="text/javascript">location.href = "/home/profile/";</script>';
            exit;
        }

    } else {
        echo "<script>alert('ERROR! An error has occured at level 1.');</script>";
        echo '<script type="text/javascript">location.href = "/home/profile/";</script>';
        exit;
    }

}

?>