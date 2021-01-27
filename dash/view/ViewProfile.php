<div class="site-section">
    <div class="container">
        <div class="row mb-4">
            <div class="col-md-12 text-center">
                <h2><?=$title?></h2>
            </div>
            <div class="col-md-12 text-center">
                <img src="<?=$image?>" class="img-profile" />
            </div>
            <div class="col-md-12 view-data text-center">
                <h3><i class="fa fa-facebook-square"></i> Evolução de seguidores do <b>Facebook</b> de <?=$title?></h3>
                <?php
                    $followersFace = new Chart('line',$dataFollowersFacebook,$dataFollowersNames,'face');
                    $followersFace->createChartFollowers();
                ?>
            </div>
            <div class="col-md-12 view-data text-center">
                <h3><i class="fa fa-instagram"></i> Evolução de seguidores do <b>instagram</b> de <?=$title?></h3>
                <?php
                    $followersInsta = new Chart('line',$dataFollowersInstagram,$dataFollowersNames,'insta');
                    $followersInsta->createChartFollowers();
                ?>
            </div>
            <div class="col-md-12 view-data text-center">
                <h3><i class="fa fa-twitter"></i> Evolução de seguidores do <b>Twitter</b> de <?=$title?></h3>
                <?php
                    $followersTwitter = new Chart('line',$dataFollowersTwitter,$dataFollowersNames,'twitter');
                    $followersTwitter->createChartFollowers();
                ?>
            </div>
        </div>
    </div>
</div>