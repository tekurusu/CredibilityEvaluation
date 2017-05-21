<head>
  <script src="<?php echo base_url("public/js/submit_page.js"); ?>"></script>
  <script>
    function setViewWebsite(element, site_key) {
      popWindow('<?php echo $short_link; ?>', site_key);
        $(element).addClass("prevent-hover");
    }

    function activateLastPart (element) {
      element.removeClass("disabled-helper")
      element.find(":input").prop("disabled", false);
      if (view1 && view2) {
        $("input[type=submit]").removeClass("button-disabled")
          .prop("disabled", false);
      }
    }

    var view1 = false;
    var view2 = false;

    $(document).ready(function() {

      $("#website_1").one("click", function(){
        setViewWebsite(this, 3);
        view1 = true;
        activateLastPart($(".activator-1"));
      });

      $("#website_2").one("click", function(){
        setViewWebsite(this, <?php echo $mod; ?>);
        view2 = true;
        activateLastPart($(".activator-2"));
      });
    });
  </script>
  <style>
  #row1
  {
    background-color: ghostwhite;
  }
  #row2
  {
    background-color: gainsboro;
  }
  </style>
</head>
<body>

<div id="container">
  <h2>SET 2</h2>
<p>Assess each website's <b>believability</b> based on <b>how they look</b>. Links have been disabled and <b>only the homepage is viewable</b>, please focus your attention on that one page.</b></p>
  <hr>
  <?php if ($errors = validation_errors()) { ?>
  <div class="alert alert-danger" role="alert">
    <?php echo $errors; ?>
  </div>
  <?php } ?>

  <?php $hidden = array();
     //Access $data['posted_data'] and compile an array 
     //of key/pair values of the hidden fields
     if(isset($posted_data)) {
       foreach ($posted_data as $name => $val) {
       $hidden[$name] = $val;
     }
    }
  ?>

  <div id="body">
    <div class="required-note">Required *</div>
    <?php echo form_open('demographics', '', $hidden); ?>
        <?php echo form_hidden('_segment','2');?>

        <a id="website_1"><h3>View Website 1</h3></a>
        <p>You have 25 seconds, please use this time wisely and observe how the homepage looks thoroughly.</p>
        <div class="activator-1 disabled-helper">
        <h4><label class="form-required">
          Credibility Rating 
        </label></h4>
        <p>How believable does this website look?</p>
        <table class="cred_rating">
          <tr>
            <th>&nbsp;</th>
            <th class="rating-row">0</th>
            <th class="rating-row">1</th>
            <th class="rating-row">2</th>
            <th class="rating-row">3</th>
            <th class="rating-row">4</th>
            <th class="rating-row">5</th>
            <th>&nbsp;</th>
          </tr>
          <tr>
            <td class="label-row">Not<br>believable</td>
            <td class="rating-row"><input type="radio" name="orig_rating_2" value="0" disabled required <?php echo set_radio('orig_rating_2', '0'); ?> /></td>
            <td class="rating-row"><input type="radio" name="orig_rating_2" value="1" disabled <?php echo set_radio('orig_rating_2', '1'); ?> /></td>
            <td class="rating-row"><input type="radio" name="orig_rating_2" value="2" disabled <?php echo set_radio('orig_rating_2', '2'); ?> /></td>
            <td class="rating-row"><input type="radio" name="orig_rating_2" value="3" disabled <?php echo set_radio('orig_rating_2', '3'); ?> /></td>
            <td class="rating-row"><input type="radio" name="orig_rating_2" value="4" disabled <?php echo set_radio('orig_rating_2', '4'); ?> /></td>
            <td class="rating-row"><input type="radio" name="orig_rating_2" value="5" disabled <?php echo set_radio('orig_rating_2', '5'); ?> /></td>
            <td class="label-row">Very<br>believable</td>
          </tr>
        </table>
        <br>
        <h4><label class="form-required" for="orig_comment_2">
          What influenced your opinion? 
        </label></h4>
        <p>Why did you give this rating? Please explain.</p>
        <textarea class="comment-input" name="orig_comment_2" rows="4" cols="40" disabled required><?php echo set_value('orig_comment_2'); ?></textarea>
        </div>
        <br><hr>  

        <a id="website_2"><h3>View Website 2</h3></a>
        <p>You have 25 seconds, please use this time wisely and observe how the homepage looks thoroughly.</p>
        <div class="activator-2 disabled-helper">
        <h4><label class="form-required">
          Credibility Rating 
        </label></h4>
        <p>How believable does this website look?</p>
        <table class="cred_rating">
          <tr>
            <th>&nbsp;</th>
            <th class="rating-row">0</th>
            <th class="rating-row">1</th>
            <th class="rating-row">2</th>
            <th class="rating-row">3</th>
            <th class="rating-row">4</th>
            <th class="rating-row">5</th>
            <th>&nbsp;</th>
          </tr>
          <tr>
            <td class="label-row">Not<br>believable</td>
            <td class="rating-row"><input type="radio" name="mod_rating_2" value="0" disabled required <?php echo set_radio('mod_rating_2', '0'); ?> /></td>
            <td class="rating-row"><input type="radio" name="mod_rating_2" value="1" disabled <?php echo set_radio('mod_rating_2', '1'); ?> /></td>
            <td class="rating-row"><input type="radio" name="mod_rating_2" value="2" disabled <?php echo set_radio('mod_rating_2', '2'); ?> /></td>
            <td class="rating-row"><input type="radio" name="mod_rating_2" value="3" disabled <?php echo set_radio('mod_rating_2', '3'); ?> /></td>
            <td class="rating-row"><input type="radio" name="mod_rating_2" value="4" disabled <?php echo set_radio('mod_rating_2', '4'); ?> /></td>
            <td class="rating-row"><input type="radio" name="mod_rating_2" value="5" disabled <?php echo set_radio('mod_rating_2', '5'); ?> /></td>
            <td class="label-row">Very<br>believable</td>
          </tr>
        </table>
        <br>
        <h4><label class="form-required" for="mod_comment_2">
          What influenced your opinion? 
        </label></h4>
        <p>Why did you give this rating? Please explain.</p>
        <textarea class="comment-input" name="mod_comment_2" rows="4" cols="40" disabled required><?php echo set_value('mod_comment_2'); ?></textarea>

        </div>
        <br>
        <hr>  

        <h3><label class="form-required">
          Credibility Ranking
        </label></h3>
        <p>Which website is more believable?</p>
        <div class="multiple-option">
          <input type="radio" id="rank_2_O" name="rank_2" value="O" required <?php echo set_radio('rank_2', 'O'); ?> />
          <label for="rank_2_O">Website 1</label>
        </div>
        <div class="multiple-option">
          <input type="radio" id="rank_2_M" name="rank_2" value="M" <?php echo set_radio('rank_2', 'M'); ?> />
          <label for="rank_2_M">Website 2</label>
        </div>
        <br>
        <h4><label class="subsection-header">
          Factors
        </label></h4>
        <p> How did the following elements affect your decision? Please rate from 0 to 5, with 0 being "Not at all" and 5 being "Very much".</p>
        <table class="cred_rating factor-matrix">
          <tr>
            <th>&nbsp;</th>
            <th class="rating-row">0</th>
            <th class="rating-row">1</th>
            <th class="rating-row">2</th>
            <th class="rating-row">3</th>
            <th class="rating-row">4</th>
            <th class="rating-row">5</th>
            <th class="rating-row">&nbsp;</th>
          </tr>
          <tr>
            <td class="label-row form-required">Colors </td>
            <td class="rating-row"><input type="radio" name="color_2" value="0" required <?php echo set_radio('color_2', '0'); ?> /></td>
            <td class="rating-row"><input type="radio" name="color_2" value="1" <?php echo set_radio('color_2', '1'); ?> /></td>
            <td class="rating-row"><input type="radio" name="color_2" value="2" <?php echo set_radio('color_2', '2'); ?> /></td>
            <td class="rating-row"><input type="radio" name="color_2" value="3" <?php echo set_radio('color_2', '3'); ?> /></td>
            <td class="rating-row"><input type="radio" name="color_2" value="4" <?php echo set_radio('color_2', '4'); ?> /></td>
            <td class="rating-row"><input type="radio" name="color_2" value="5" <?php echo set_radio('color_2', '5'); ?> /></td>
            <td class="rating-row">&nbsp;</td>
          </tr>
          <tr>
            <td class="label-row"><span class="form-required">Typography </span><br><span class="helper-text">Style and appearance of font</span></td>
            <td class="rating-row"><input type="radio" name="font_2" value="0" required <?php echo set_radio('font_2', '0'); ?> /></td>
            <td class="rating-row"><input type="radio" name="font_2" value="1" <?php echo set_radio('font_2', '1'); ?> /></td>
            <td class="rating-row"><input type="radio" name="font_2" value="2" <?php echo set_radio('font_2', '2'); ?> /></td>
            <td class="rating-row"><input type="radio" name="font_2" value="3" <?php echo set_radio('font_2', '3'); ?> /></td>
            <td class="rating-row"><input type="radio" name="font_2" value="4" <?php echo set_radio('font_2', '4'); ?> /></td>
            <td class="rating-row"><input type="radio" name="font_2" value="5" <?php echo set_radio('font_2', '5'); ?> /></td>
            <td class="rating-row">&nbsp;</td>
          </tr>
          <tr>
            <td class="label-row"><span class="form-required">Images/Graphics </span><br><span class="helper-text">Pictures, icons</span></td>
            <td class="rating-row"><input type="radio" name="graphics_2" value="0" required <?php echo set_radio('graphics_2', '0'); ?> /></td>
            <td class="rating-row"><input type="radio" name="graphics_2" value="1" <?php echo set_radio('graphics_2', '1'); ?> /></td>
            <td class="rating-row"><input type="radio" name="graphics_2" value="2" <?php echo set_radio('graphics_2', '2'); ?> /></td>
            <td class="rating-row"><input type="radio" name="graphics_2" value="3" <?php echo set_radio('graphics_2', '3'); ?> /></td>
            <td class="rating-row"><input type="radio" name="graphics_2" value="4" <?php echo set_radio('graphics_2', '4'); ?> /></td>
            <td class="rating-row"><input type="radio" name="graphics_2" value="5" <?php echo set_radio('graphics_2', '5'); ?> /></td>
            <td class="rating-row">&nbsp;</td>
          </tr>
          <tr>
            <td class="label-row"><span class="form-required">Branding </span><br><span class="helper-text">Logos, identity</span></td>
            <td class="rating-row"><input type="radio" name="branding_2" value="0" required <?php echo set_radio('branding_2', '0'); ?> /></td>
            <td class="rating-row"><input type="radio" name="branding_2" value="1" <?php echo set_radio('branding_2', '1'); ?> /></td>
            <td class="rating-row"><input type="radio" name="branding_2" value="2" <?php echo set_radio('branding_2', '2'); ?> /></td>
            <td class="rating-row"><input type="radio" name="branding_2" value="3" <?php echo set_radio('branding_2', '3'); ?> /></td>
            <td class="rating-row"><input type="radio" name="branding_2" value="4" <?php echo set_radio('branding_2', '4'); ?> /></td>
            <td class="rating-row"><input type="radio" name="branding_2" value="5" <?php echo set_radio('branding_2', '5'); ?> /></td>
            <td class="rating-row">&nbsp;</td>
          </tr>
          <tr>
            <td class="label-row"><span class="form-required">Layout </span><br><span class="helper-text">Arrangement of page elements</span></td>
            <td class="rating-row"><input type="radio" name="layout_2" value="0" required <?php echo set_radio('layout_2', '0'); ?> /></td>
            <td class="rating-row"><input type="radio" name="layout_2" value="1" <?php echo set_radio('layout_2', '1'); ?> /></td>
            <td class="rating-row"><input type="radio" name="layout_2" value="2" <?php echo set_radio('layout_2', '2'); ?> /></td>
            <td class="rating-row"><input type="radio" name="layout_2" value="3" <?php echo set_radio('layout_2', '3'); ?> /></td>
            <td class="rating-row"><input type="radio" name="layout_2" value="4" <?php echo set_radio('layout_2', '4'); ?> /></td>
            <td class="rating-row"><input type="radio" name="layout_2" value="5" <?php echo set_radio('layout_2', '5'); ?> /></td>
            <td class="rating-row">&nbsp;</td>
          </tr>
          <tr>
            <td class="label-row"><span class="form-required">Navigation </span><br><span class="helper-text">Nav bar/menu bar</span></td>
            <td class="rating-row"><input type="radio" name="navigation_2" value="0" required <?php echo set_radio('navigation_2', '0'); ?> /></td>
            <td class="rating-row"><input type="radio" name="navigation_2" value="1" <?php echo set_radio('navigation_2', '1'); ?> /></td>
            <td class="rating-row"><input type="radio" name="navigation_2" value="2" <?php echo set_radio('navigation_2', '2'); ?> /></td>
            <td class="rating-row"><input type="radio" name="navigation_2" value="3" <?php echo set_radio('navigation_2', '3'); ?> /></td>
            <td class="rating-row"><input type="radio" name="navigation_2" value="4" <?php echo set_radio('navigation_2', '4'); ?> /></td>
            <td class="rating-row"><input type="radio" name="navigation_2" value="5" <?php echo set_radio('navigation_2', '5'); ?> /></td>
            <td class="rating-row">&nbsp;</td>
          </tr>
          <tr>
            <td class="label-row"><span class="form-required">Sidebar </span><br><span class="helper-text">Left and/or right columns</span></td>
            <td class="rating-row"><input type="radio" name="sidebar_2" value="0" required <?php echo set_radio('sidebar_2', '0'); ?> /></td>
            <td class="rating-row"><input type="radio" name="sidebar_2" value="1" <?php echo set_radio('sidebar_2', '1'); ?> /></td>
            <td class="rating-row"><input type="radio" name="sidebar_2" value="2" <?php echo set_radio('sidebar_2', '2'); ?> /></td>
            <td class="rating-row"><input type="radio" name="sidebar_2" value="3" <?php echo set_radio('sidebar_2', '3'); ?> /></td>
            <td class="rating-row"><input type="radio" name="sidebar_2" value="4" <?php echo set_radio('sidebar_2', '4'); ?> /></td>
            <td class="rating-row"><input type="radio" name="sidebar_2" value="5" <?php echo set_radio('sidebar_2', '5'); ?> /></td>
            <td class="rating-row">&nbsp;</td>
          </tr>
          <tr>
            <td class="label-row"><span class="form-required">Content Selection </span><br><span class="helper-text">Volume of information</span></td>
            <td class="rating-row"><input type="radio" name="content_2" value="0" required <?php echo set_radio('content_2', '0'); ?> /></td>
            <td class="rating-row"><input type="radio" name="content_2" value="1" <?php echo set_radio('content_2', '1'); ?> /></td>
            <td class="rating-row"><input type="radio" name="content_2" value="2" <?php echo set_radio('content_2', '2'); ?> /></td>
            <td class="rating-row"><input type="radio" name="content_2" value="3" <?php echo set_radio('content_2', '3'); ?> /></td>
            <td class="rating-row"><input type="radio" name="content_2" value="4" <?php echo set_radio('content_2', '4'); ?> /></td>
            <td class="rating-row"><input type="radio" name="content_2" value="5" <?php echo set_radio('content_2', '5'); ?> /></td>
            <td class="rating-row">&nbsp;</td>
          </tr>
        </table>
        <br><br>
      <input class="button-disabled" type="submit" value="Next" disabled>
      </form>
  </div>

  <p class="footer"><strong>Version 2.0.1</strong></p>
</div>

</body>
</html>