<?php

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == TRUE && !is_null($_SESSION['loggedin']) && $_SESSION['loggedin'] !== '') {

    include_once $_SERVER['DOCUMENT_ROOT']."/sys/database/dbConnection.php";

    if($stmt = $con->prepare(" SELECT id, displayName, email, communityRank, permissionRank, recruitmentRank, profileBanner, discordID, steamID, teamspeakID FROM accounts WHERE id = ? ")) {
        $stmt->bind_param("s", $_SESSION['id']);
        $stmt->execute();
        $stmt->store_result();

        if($stmt->num_rows > 0) {
            $stmt->bind_result($id, $displayName, $email, $communityRank, $permissionRank, $recruitmentRank, $profileBanner, $discordID, $steamID, $teamspeakID);
            $stmt->fetch();

        } else {
            echo "<script>alert('An error has occured attempting to fetch values.');</script>";
            echo '<script type="text/javascript">location.href = "/home/";</script>';
            exit;
        }

    } else {
        echo "<script>alert('An error with a connection deep deep down has occured preventing you from proceeding further.');</script>";
        echo '<script type="text/javascript">location.href = "/home/";</script>';
        exit;
    }

}

?>