<!doctype html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title><?php echo $title_for_layout; ?></title>
        <?php echo $this->Html->css(array('bootstrap.min.css', '//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css', 'admin.css', 'admin_custom.css')); ?>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
        <?php echo $this->Html->script(array('bootstrap.min.js', 'admin.js')); ?>
        <?php echo $this->App->js(); ?>
        <?php echo $this->fetch('css'); ?>
        <?php echo $this->fetch('script'); ?>
    </head>
    <body>
            <div class="overlay"></div>
            <!-- Page Content -->
            <div id="page-content-wrapper">
                <div class="main_admin_container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="content">
                                <?php echo $this->Session->flash(); ?>
                                <?php echo $this->fetch('content'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /#page-content-wrapper -->
        <script>
            $(document).ready(function() {
                var trigger = $('.hamburger'),
                        overlay = $('.overlay'),
                        isClosed = false;
                trigger.click(function() {
                    hamburger_cross();
                });
                function hamburger_cross() {

                    if (isClosed == true) {
                        overlay.hide();
                        trigger.removeClass('is-open');
                        trigger.addClass('is-closed');
                        isClosed = false;
                    } else {
                        overlay.show();
                        trigger.removeClass('is-closed');
                        trigger.addClass('is-open');
                        isClosed = true;
                    }
                }
                $('[data-toggle="offcanvas"]').click(function() {
                    $('#wrapper').toggleClass('toggled');
                });
            });
            $("#dishcatname").change(function() {
                var a = $(this).val();
                $.post("http://rajdeep.crystalbiltech.com/dropin/admin/products/getsubcat", {'id': a}, function(d) {
                    var html = '';
                    var data = jQuery.parseJSON(d);
                    console.log(data);
                    for (var key in data) {
                        html += '<option value="' + key + '">' + data[key] + '</option>';
                    }
                    jQuery('#dishsubcatname').html('');
                    jQuery('#dishsubcatname').html(html);
                });
            });
        </script>
    </body>
</html>