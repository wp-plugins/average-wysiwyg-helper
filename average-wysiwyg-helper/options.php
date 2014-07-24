<div class="wrap">
    <?php screen_icon(); ?>
    <h2>WYSIWYG Helper</h2>
	<form action="options.php" method="post" id="<?php echo $avrgwysiwygID; ?>_options_form" name="<?php echo $avrgwysiwygID; ?>_options_form">
	<?php settings_fields($avrgwysiwygID.'_options'); ?>
        <label for="wysiwym_display" >Show WYSIWYM</label>
        <div style="display: inline;" class="noyesswitch">
          <input type="checkbox" name="wysiwym_display" class="noyesswitch-checkbox" id="wysiwym_display" value="1" <?php checked( '1', get_option('wysiwym_display') ); ?> />
          <label class="noyesswitch-label" for="wysiwym_display">
            <div class="noyesswitch-inner"></div>
            <div class="noyesswitch-switch"></div>
          </label>
        </div>
        <br />
        <label for="cancel_mce_defaults" >Cancel Default Styles</label>
        <div style="display: inline;" class="noyesswitch">
          <input type="checkbox" name="cancel_mce_defaults" class="noyesswitch-checkbox" id="cancel_mce_defaults" value="1" <?php checked( '1', get_option('cancel_mce_defaults') ); ?> />
          <label class="noyesswitch-label" for="cancel_mce_defaults">
            <div class="noyesswitch-inner"></div>
            <div class="noyesswitch-switch"></div>
          </label>
        </div>
        <p class="description hideswitch">Overrides default caption styles (that's all, so far).</p>
<?php submit_button(); ?>
	</form>
</div>