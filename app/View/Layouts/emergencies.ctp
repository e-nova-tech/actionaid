<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Uttarakhand Floods - Urgent Appeal For Help</title>
    <link rel="stylesheet" href="/css/emergencies.css" type="text/css" />
    <link rel="stylesheet" href="/css/emergencies-form.css" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
    <script type="text/javascript">stLight.options({publisher: "ur-516f82b5-b9fb-4749-3f83-7780d0e663fc", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
    <script type="text/javascript">
        $(function(){
            function prepareTextField(field){
                if($(field).val() != ''){
                    $(field).prev('label').addClass('hidden');
                    $(field).parent().addClass('prefilled');
                }
                else{
                    $(field).prev('label').removeClass('hidden');
                    $(field).parent().removeClass('prefilled');
                }
            }

            $('form input[type=text]').each(function(){
                prepareTextField($(this));
            });

            $('form input').focus(function(){
                $(this).parent().addClass('focus');
            })
                    .blur(function(){
                        $(this).parent().removeClass('focus');
                    })
                    .bind('keyup mouseup change', function(){
                        prepareTextField($(this));
                    });
        });
    </script>
</head>
<body>
<div id="wrapper">
    <?php echo $content_for_layout; ?>
</div>
</body>
</html>
