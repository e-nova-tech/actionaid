<?php
/**
* Emergencies Donation Page
*
* @package     app.Gift.View.add
* @copyright   Copyright 2012, ActionAid Association India
* @link        http://actionaid.org/india
* @author      Kevin Muller
* @license     MIT License (http://www.opensource.org/licenses/mit-license.php)
*/
$this->set('title_for_layout','Emergencies!');
?>
<div id="container">
    <div class="header-outer">
        <div class="header">
            <div id="logo"><img src="img/appeals/emergencies/logo.png" alt="logo" /></div>
            <span class="title">Uttarakhand Floods - Urgent Appeal For Help</span>
            <div class="top-navigation">
                <ul>
                    <li><a href="http://www.actionaid.org/uttarakhand">Home |</a></li>
                    <li><a href="contact">Contact Us</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="clear"></div>
    <div class="banner">
        <img src="img/appeals/emergencies/banner.png" alt="banner" />
    </div>
    <div class="clear"></div>
    <div class="main-content">
        <div class="left-part">
            <div class="first_block">
                <h3>ActionAid India’s response in the very first week!</h3>
                <ul>
                    <li>Relief teams reached the 3 worst affected districts of Chamoli, Tehri Garwal and Rudraprayag</li>
                    <li>Supported 500 households with food, temporary shelter, and medicines</li>
                    <li>Distributed utensils to 100 families and clothes for 35 households</li>
                    <li>Our partners on the ground rescued 100 people stuck at 12,000 feet.</li>
                    <li>Running a kitchen in Pandukeshwar for stranded pilgrims</li>
                </ul>
            </div>
            <div class="second_block">
                <h3>We need your urgent help!</h3>
                <ul>
                    <li>Reach out to atleast 10,000 poorest and most vulnerable among the affected person</li>
                    <li>Spread our work immediately  to atleast 120 villages in 3 district</li>
                    <li>Provide immediate relief in forms of food, shelter, warm clothing, utensils and medicines</li>
                    <li>Rebuild schools, restore livelihoods and aid in creating permanent dignified homes.</li>
                    <li>Psychosocial counselling for people in trauma, particularly children and women</li>
                </ul>
            </div>
            <div class="clear"></div>
            <div class="left-bottom">
                <h2>About ActionAid & our Humanitarian Response to emergencies</h2>
                <p>ActionAid is a global federation of more than 44 country affiliates. We have been working with most marginalised communities in India since 1972. With an all India presence in 23 states and  1 union territory, we have sided with the poor consistently for 41 years. We work to defeat poverty and marginalisation by building resilient and self reliant communities.</p>
                <p>We are one of the first  movers at times of disaster and calamity. With intimate partnership with affected communities we ensure to provide not only immediate basic needs but adopt a long term rehabilitation of the affected communities. We are still active in long term rehabilitation work of earlier calamities which struck India.</p>
            </div>
            <div class="contat-info">
                <p>For queries write to <a href="mailto:fundindia@actionaid.org"><span class="red">fundindia@actionaid.org</span></a> or call <span class="red">011 4046 0552</span></p>
            </div>
            <div class="social-share">
                <span class='st_facebook_vcount' displayText='Facebook'></span>
                <span class='st_twitter_vcount' displayText='Tweet'></span>
                <span class='st_email_vcount' displayText='Email'></span>
                <span class='st_googleplus_vcount' displayText='Google +'></span>
            </div>
        </div>
        <div class="right-part">
            <div class="donation-form">
                <?php echo $this->MyForm->create('Gift')."\n"; ?>
                <input type="hidden" name="data[Gift][appeal]" value="emergencies" />
                <?php  echo $this->MyForm->input('Person.name', array(
                        'label'=>__('Name'),'class'=>'required'
                        )); ?>
                <?php echo $this->MyForm->input('Person.address1', array(
                        'label'=>__('Address'),'class'=>'required'
                        )); ?>

                <?php echo $this->MyForm->input('Person.city', array(
                        'label'=>__('City'), 'class'=>'required city autocomplete'
                        )); ?>
                <?php echo $this->MyForm->input('Person.pincode', array(
                        'label'=>__('Pincode'), 'class'=>'required'
                        ));  ?>
                <?php
                        echo $this->MyForm->input('Person.country', array(
                        'type'=>'select', 'label'=> false,
                        'options'=> $countries, 'class'=>'required',
                        'hint' => 'Sorry we do not support international online donations yet. If you are not residing in India please use our <a href="files/donate-uttarakhand.pdf">offline donation form</a> or donate <a href="http://www.actionaid.org/donate" target="_blank">ActionAid International</a>'
                        )); ?>
                <?php echo $this->MyForm->input('Person.email', array(
                        'label'=>__('Email'), 'class'=> '',
                        'hint' => __('We need this information in case we need to get touch with you concerning your donation.')
                        )); ?>
                <?php  echo $this->MyForm->input('Person.phone', array(
                        'label'=> __('Phone'), 'class'=>'',
                        )); ?>
                <div class="input radio">
                    <span>Choose your amount</span>
                    <div style="width:100px; float:left; clear:none; margin-top:10px;">
                        <input type="radio" name="data[Gift][amount]" value="3000"><label for="pricegroup">3000</label>
                    </div>
                    <div style="width:100px; float:left; clear:none; margin-top:10px;">
                        <input type="radio" name="data[Gift][amount]" value="5000"><label for="pricegroup">5000</label>
                    </div>
                </div>
                <?php
                        echo $this->MyForm->input('other_amount', array(
                        'type' => 'text', 'label'=>__('Any other'), 'class'=> ''
                        )); ?>
                <input type="submit" class="donate submit" value="">
                <?php echo $this->MyForm->end(); ?>
            </div>
            <span class="smalltext">Contribtions to ActionAid are exempted from Tax under Sec 80 G of Income Tax Act 1961</span>
            <img src="img/appeals/emergencies/verisign_logo.jpg" />
            <br/><br/>
            <h3>Other options to donate</h3>
            <div class="other-option">
                <div class="address">
                    <p>Please make out a cheque in favour of  ActionAid Association and send it to;</p>
                    <p>ActionAid Association</p>
                    <p>Supporter Services Unit,</p>
                    <p>139, Richmond Road,</p>
                    <p>Bangalore - 560 025</p>
                </div>
                <div class="important-note">
                    <b>IMPORTANT :</b>
                    <p>Please mention ‘Uttarakhand Emergency’ on the envelope. Also <a href="files/donate-uttarakhand.pdf"><span class="red">download the donation form</span></a> and clip it along with the cheque you will be sending. Else, mention your NAME, FULL ADDRESS, EMAIL and PHONE NUMBER on backside of your cheque, so that we can send you back the receipts!  This is important!</p>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="footer-content">
            <p>ActionAid Assocation is registered in Indea under the Societies Registration Act of 1860 with its registered office at New Delhi. Registration number S-6828 on the 5th of October 2006.2012 ActionAid Assocation</p>
            <ul class="bottom-nav">
                <li><a href="http://www.actionaid.org/uttarakhand">Home |</a></li>
                <li><a href="contact">Contact Us</a></li>
            </ul>
        </div>
    </div>
</div>