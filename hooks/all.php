<?php

function HookRs_barcodeAllAdditionalheaderjs()
    {
    global $baseurl,$barcode_display_fields,$barcode_type,$ref;

    
    if ($barcode_display_fields) {
    ?>
    
    <script src="<?php echo $baseurl;?>/plugins/rs_barcode/lib/jquery-barcode/jquery-barcode.min.js"></script>
    
    <script>
            jQuery(window).load(function()
                {
                //alert(<?php echo $ref; ?>);
                <?php 
                foreach ($barcode_display_fields as $bcfield) { 
                $fieldsf = get_field($bcfield);
                if (get_data_by_field($ref, $bcfield)) { ?>
                //alert(<?php echo $bcfield;?>);
                jQuery("input#field_<?php echo $bcfield;?>").after(jQuery("<label for='mybcdiv<?php echo $bcfield;?>' class='bclabel'>Barcode <?php echo $barcode_type; ?></label>"));
                jQuery('label[for="mybcdiv<?php echo $bcfield;?>"]').after(jQuery("<div id='mybcdiv<?php echo $bcfield;?>' class='bcdivclass'>").barcode("<?php echo get_data_by_field($ref, $bcfield);?>","<?php echo $barcode_type; ?>",{barWidth:3, barHeight:40,output:'css'}));
				<?php }} ?>
                });
    </script>
    
    
    <?php }
    }
