<?php

function HookRs_barcodeEditEditadditionaljs()
    {
    global $baseurl,$barcode_display_fields,$barcode_type,$ref;
    
    ?>
    </script>
    <script src="<?php echo $baseurl;?>/plugins/rs_barcode/lib/jquery-barcode/jquery-barcode.min.js"></script>
    
    <script type="text/javascript">
            jQuery(document).ready(function()
                {
                <?php if ($barcode_display_fields) {
                foreach ($barcode_display_fields as $bcfield) { 
                $fieldsf = get_field($bcfield);
                if (get_data_by_field($ref, $bcfield)) { ?>
                jQuery("input#field_<?php echo $bcfield;?>").after(jQuery("<label for='mybcdiv<?php echo $bcfield;?>' class='bclabel'>Barcode <?php echo $barcode_type; ?></label>"));
                jQuery('label[for="mybcdiv<?php echo $bcfield;?>"]').after(jQuery("<div id='mybcdiv<?php echo $bcfield;?>' class='bcdivclass'>").barcode("<?php echo get_data_by_field($ref, $bcfield);?>","<?php echo $barcode_type; ?>",{barWidth:3, barHeight:40,output:'css'}));
				<?php }}} ?>
                });
    
    
<?php }

?>
    
