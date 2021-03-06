<?php
use_stylesheet('/sfAdminThemejRollerPlugin/css/reset.css', 'first');
use_javascript('/sfAdminThemejRollerPlugin/js/jquery.min.js', 'first');
use_javascript('/sfAdminThemejRollerPlugin/js/jquery-ui.custom.min.js', 'first');
use_stylesheet('/sfAdminThemejRollerPlugin/css/jquery/custom-theme/jquery-ui.custom.css');
use_stylesheet('/sfAdminThemejRollerPlugin/css/jroller.css');
use_stylesheet('/sfAdminThemejRollerPlugin/css/fg.menu.css');
use_stylesheet('/sfAdminThemejRollerPlugin/css/fg.buttons.css');
use_stylesheet('/sfAdminThemejRollerPlugin/css/ui.selectmenu.css');
use_javascript('/sfAdminThemejRollerPlugin/js/fg.menu.js');
use_javascript('/sfAdminThemejRollerPlugin/js/jroller.js');
use_javascript('/sfAdminThemejRollerPlugin/js/ui.selectmenu.js');
use_helper('Thickbox');
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <link rel="shortcut icon" href="/images/favicon.ico" />
        <script type="text/javascript">
            $(document).ready(function(){ $("#navmenu-h li,#navmenu-v li").hover( function() { $(this).addClass("iehover"); }, function() { $(this).removeClass("iehover"); } ); });
            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-22429807-1']);
            _gaq.push(['_trackPageview']);

            (function() {
                var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
            })();

        </script>
    </head>
    <script>
        $(document).ready(function() {
            $('#uploadsubmit').click(function() {
                var filevariablesmeasured = $('#filevariablesmeasured').attr('value');
                if(filevariablesmeasured == ''){
                    jAlert('error', 'Select Variables Measured Template File','Invalid File', null);
                }else{
                    var fragmento = filevariablesmeasured.split('.');
                    var extension = fragmento[1];
                    if(!((extension == 'XLS') || (extension == 'xls'))){
                        $('#filevariablesmeasured').attr('value','');
                        $("#filevariablesmeasured").val('');
                        jAlert('error', 'Permitted file (.XLS)','Invalid File', null);
                    }else{
                        $('#div_loading').show();
                        $('#batchuploadvariablesmeasureds').submit();
                    }
                }
            });
        });
    </script>
    <div class="sf_admin_edit ui-widget ui-widget-content ui-corner-all" id="sf_admin_container">
        <div class="fg-toolbar ui-widget-header ui-corner-all">
            <h1>Batch Upload Variables Measured</h1>
        </div>
        <div id="div_loading" class="loading" align="center" style="display:none;">
            <?php echo image_tag('loading.gif'); ?>
            </br>Please Wait...
        </div>
        <div id="sf_admin_content">
            <div class="sf_admin_form">
                <form id="batchuploadvariablesmeasureds" name="batchuploadvariablesmeasureds" action="<?php echo url_for('@batchuploadvariablesmeasured'); ?>" enctype="multipart/form-data" method="post">
                    <table align="center">
                        </br>
                        <tr>
                            <td colspan="3">
                                <fieldset>
                                    <legend align= "left">&ensp;<b>Attention</b>&ensp;</legend>
                                    <span><?php echo image_tag('attention-icon.png'); ?><?php echo link_to('Template File', "@downloadestruturevariablesmeasured"); ?> must have <b>.xls</b> extension and must be smaller than <b>5 MB</b> maximum size</span></br>
                                    <span><?php echo image_tag('attention-icon.png'); ?> Max. <b><?php echo $MaxRecordsFile; ?> Records</b> for Template File</span></br>
                                    <span><?php echo image_tag('attention-icon.png'); ?> Exact number of columns <b>'<?php echo $Cols; ?>'</b> for Template File</span></br>
                                    <span><?php echo image_tag('attention-icon.png'); ?> Don't close the window during the process</span>
                                </fieldset>
                            </td>
                        </tr>
                        <tr align="center"><td colspan="3" align="center">&ensp;</td></tr>
                        <tr>
                            <td colspan="3">
                                <fieldset>
                                    <legend align= "left">&ensp;<b>Download Template</b>&ensp;</legend>
                                    <?php echo link_to(image_tag('excel-icon.png') . ' Variables Measured Template File', "@downloadestruturevariablesmeasured") . "<br>"; ?>
                                </fieldset>
                            </td>
                        </tr>
                        <tr align="center"><td colspan="3" align="center">&ensp;</td></tr>
                        <tr>
                            <td width="50%"><b>Variables Measured Template File:</b></td>
                            <td width="50%"><input type="file" name="filevariablesmeasured" id="filevariablesmeasured"></td>
                        </tr>
                        <tr align="center"><td colspan="3" align="center">&ensp;</td></tr>
                        <tr align="center">
                            <td colspan="3" align="center">
                                <button type="button" name="Execute" id="uploadsubmit" title="Execute"><?php echo image_tag("execute-icon.png"); ?> <b>Execute</b></button>
                            </td>
                        </tr>
                    </table>
                </form>
                </br>
            </div>
        </div>
    </div>
</html>
