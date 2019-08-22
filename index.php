<?php

    /* Code by: Francesco "FraWolf" Lombardo
    *  Github Link: https://github.com/FraWolf
    *  Website: https://frawolf.it
    */
  
  $guildName = "LostFrequency";
  $html = '<div id="bannerAssets" style="background-image: url(\'https://wynncraft.com/img/banners/bg_base.png\'); background-position: 0px 0px; z-index: 1;"></div>';
  $position = "";
  $color = "";
  $zIndex = 3;

  $url = "https://api.wynncraft.com/public_api.php?action=guildStats&command=$guildName";
  $contents = file_get_contents($url);
  $array = json_decode($contents, True);
  
  $layers = $array["banner"]["layers"];
  $bgColor = strtolower($array["banner"]["base"]);
  $html .= '<div id="bannerAssets" style="background-image: url(\'https://wynncraft.com/img/banners/'.$bgColor.'.png\'); background-position: 0px 0px; z-index: 2;"></div>';

  for($i = 0; $i < count($layers); ++$i) {
      $layer = $layers[$i]["pattern"];
      $color = strtolower($layers[$i]["colour"]);

      if($layer == "CIRCLE_MIDDLE") $position = "-640px -960px";
      elseif($layer == "SQUARE_BOTTOM_RIGHT") $position = "-480px 0px";
      elseif($layer == "SQUARE_TOP_LEFT") $position = "-480px -1600px";
      elseif($layer == "SQUARE_TOP_RIGHT") $position = "-640px -1600px";
      elseif($layer == "HALF_HORIZONTAL") $position = "-160px -960px";
      elseif($layer == "STRIPE_BOTTOM") $position = "0px -320px";
      elseif($layer == "STRIPE_TOP") $position = "0px -1920px";
      elseif($layer == "HALF_VERTICAL") $position = "-480px -1920px";
      elseif($layer == "STRIPE_LEFT") $position = "-480px -960px";
      elseif($layer == "STRIPE_CENTER") $position = "-160px -640px";
      elseif($layer == "STRIPE_RIGHT") $position = "-640px -1280px";
      elseif($layer == "STRIPE_MIDDLE") $position = "-320px -1280px";
      elseif($layer == "STRAIGHT_CROSS") $position = "0px -1600px";
      elseif($layer == "STRIPE_DOWNLEFT") $position = "-320px -640px";
      elseif($layer == "STRIPE_DOWNRIGHT") $position = "-480px -640px";
      elseif($layer == "CROSS") $position = "-640px -320px";
      elseif($layer == "DIAGONAL_LEFT") $position = "-320px -960px";
      elseif($layer == "TRIANGLE_TOP") $position = "-160px -1920px";
      elseif($layer == "TRIANGLE_BOTTOM") $position = "-160px -320px";
      elseif($layer == "RHOMBUS_MIDDLE") $position = "-160px -1280px";
      elseif($layer == "TRIANGLES_TOP") $position = "-320px -1920px";
      elseif($layer == "TRIANGLES_BOTTOM") $position = "-320px -320px";
      elseif($layer == "CURLY_BORDER") $position = "-480px -320px";
      elseif($layer == "BORDER") $position = "-320px 0px";
      elseif($layer == "STRIPE_SMALL") $position = "-320px -1600px";
      elseif($layer == "BRICKS") $position = "-640px 0px";
      elseif($layer == "GRADIENT") $position = "0px -960px";
      elseif($layer == "CREEPER") $position = "0px -640px";
      elseif($layer == "SKULL") $position = "-160px -1600px";
      elseif($layer == "FLOWER") $position = "-640px -640px";
      elseif($layer == "MOJANG") $position = "0px -1280px";
      elseif($layer == "DIAGONAL_LEFT_MIRROR") $position = "-320px -2240px";
      elseif($layer == "DIAGONAL_RIGHT") $position = "-480px -2240px";
      elseif($layer == "GRADIENT_UP") $position = "-640px -1920px";
      elseif($layer == "HALF_HORIZONTAL_MIRROR") $position = "-160px -2240px";
      elseif($layer == "HALF_VERTICAL_MIRROR") $position = "0px -2240px";
      elseif($layer == "DIAGONAL_RIGHT_MIRROR") $position = "-480px -1280px";


      $html .= '<div id="bannerAssets" style="background-image: url(\'https://wynncraft.com/img/banners/'.$color.'.png\'); background-position: '.$position.'; z-index: '.$zIndex.';"></div>';
      $zIndex = $zIndex + 1;
  }

?>

<style>
    #bannerAssets {
        position: absolute;
        display: block;
        width: 160px;
        height: 320px;
        background-repeat: no-repeat;
    }
</style>
<?php echo $html; ?>