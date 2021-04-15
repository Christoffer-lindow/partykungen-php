<style>
#wrapper {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
}

#box {
    width: 600px;

}

#wrapper img {
        max-width: 100%;
        height: 150px;
    }
</style>


<div id="wrapper">
    <div id="box">
        <?php
            $Parsedown = new Parsedown();
            echo $Parsedown->text(file_get_contents("readme.md"));
        ?>
    </div>
</div>
