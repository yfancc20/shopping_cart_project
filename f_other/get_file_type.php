<?php
    // check the type of the file uploaded

    function getFileType($typeStr) {
        if (preg_match("/png/i", $typeStr)) {
            return ".png";
        } elseif (preg_match("/jpg/i", $typeStr)) {
            return ".jpg";
        } elseif (preg_match("/jpg/i", $typeStr)) {
            return ".jpeg";
        } else {
            return "None";
        }
    }
?>