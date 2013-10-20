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
            <span class="title">Cyclone Phailin - Urgent Appeal For Help</span>
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
        <img src="img/appeals/emergencies/banner-phailin.jpg" alt="banner" />
    </div>
    <div class="clear"></div>
    <div class="main-content">
        <div class="left-part">
            <div class="first_block">
                <h3>Devastation in numbers.</h3>
                <ul>
                    <li>More than 10 million people are affected, 15,515 villages affected. 15 deaths reported.</li>
                    <li>In the state of Odisha, 14514 villages in and  over 80 lakh people in 12 districts of Odisha are affected and 2,34,000 kutcha houses are partially or totally damaged.</li>
                    <li>Standing crops in 500,000 Hectares totally damaged and losses are to the tune of 2,400 crores.</li>
                    <li>Close to 300 villages in our project areas Ganjam, Puri and Jagatsinghpur districts of Odisha are severely affected.</li>
                    <li>350 of our children linked to Sponsorship are also affected.</li>
	                <li>50 villages in our project area in Vishakapatanam and Srikakulam Districts of Andhra Pradesh are severely affected.</li>
	                <li>In Srikakulam 35,000 fisher folk families have been affected and 7783 Hectares of Agricultural land has been destroyed.</li>
	                <li>600 families in our project area in Vishakapattanam have lost their huts, boats, nets and dry fish.</li>
	                <li>Severe damage to shelter, crops, food stock, household articles, livestock, schools and common spaces including roads.</li>
                </ul>
            </div>
            <div class="second_block">
                <h3>ActionAid India’s response so far!</h3>
                <ul>
                    <li>Rapid assessments of the damages in the worst affected districts of AP & Odisha are going on, including our project areas, despite the flood warnings being issued.</li>
                    <li>Our focus is also in assessing the extent to which source of livelihood have been affected – for both fishing and farming communities.</li>
                    <li>Our teams are monitoring the relief operations being carried out by the state governments & the compensations being offered and also helping the most vulnerable in accessing these relief supplies.</li>
                    <li>Our teams are also assessing the damage to shelter, livestock, trees and farmlands.</li>
                </ul>

	            <h3>We need your urgent help!</h3>
	            <ul>
		            <li>In reaching out most affected 7500 families in worst-affected 150 villages in Ganjam, Puri & Jagatsinhpur districts of Odisha.</li>
		            <li>In providing immediate relief in the form of food, water and non-food items like Blankets, Utensils, women hygiene kits, bags and books to 5000 children, and first aid kits.</li>
	                <li>In providing support to temporary shelter, health camps and also provide psycho social counselling, with special focus on women, elderly, differently-abled & children.</li>
		            <li>In rehabilitating the communities and supporting with livelihood options & link-ups with existing state and central schemes.</li>
		            <li>In reviving water-logged fields and also rebuilding the Kutcha houses that have been extensively damaged.</li>
	            </ul>
            </div>
            <div class="clear"></div>
            <div class="left-bottom">
                <h2>ABOUT ACTIONAID & OUR HUMANITARIAN RESPONSE TO EMERGENCIES</h2>
                <p>ActionAid is a global federation of more than 44 country affiliates. We have been working with most marginalised communities in India since 1972. With an all India presence in 23 states and  1 union territory, we have sided with the poor consistently for 41 years. We work to defeat poverty and marginalisation by building resilient and self reliant communities.</p>
                <p>We are one of the first  movers at times of disaster and calamity. With intimate partnership with affected communities we ensure to provide not only immediate basic needs but adopt a long term rehabilitation of the affected communities. We are still active in long term rehabilitation work of earlier calamities which struck India.</p>
            </div>
            <div class="contat-info">
                <p>For queries write to <a href="mailto:fundindia@actionaid.org"><span class="red">fundindia@actionaid.org</span></a> or call <span class="red">011 4064 0511</span></p>
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
                <?php
                    echo $this->MyForm->radio('Gift.amount',
                       array('5000' => '5000', '3000' => '3000', 'other-amount' => 'Other Amount'),
                        array(
                            'legend' => 'Choose your amount'
                        )
                    );
                ?>
                </div>

                <?php
                        echo $this->MyForm->input('other_amount', array(
                        'type' => 'text', 'label'=>__('Enter your amount'), 'class'=> ''
                        )); ?>
                <input type="submit" class="donate submit" value="">
                <?php echo $this->MyForm->end(); ?>
            </div>
            <span class="smalltext">Contributions to ActionAid are exempted from Tax under Sec 80 G of Income Tax Act 1961</span>
            <img src="img/appeals/emergencies/verisign_logo.jpg" />
            <br/><br/>
            <h3>Other options to donate</h3>
            <div class="other-option">
                <div class="address">
                    <p>Please make a cheque in favour of  ActionAid Association and send it to :</p>
                    <p>ActionAid Association</p>
                    <p>Supporter Services Unit,</p>
                    <p>139, Richmond Road,</p>
                    <p>Bangalore - 560 025</p>
                </div>
                <div class="important-note">
                    <b>IMPORTANT :</b>
                    <p>Please mention 'Cyclone Phailin Emergency' on the envelope. Also <a href="files/donate-phailin.pdf"><span class="red">download the donation form</span></a> and clip it along with the cheque you will be sending. Else, mention your NAME, FULL ADDRESS, EMAIL and PHONE NUMBER on backside of your cheque, so that we can send you back the receipts!  This is important!</p>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="footer-content">
            <p>ActionAid Association is registered in India under the Societies Registration Act of 1860 with its registered office at New Delhi. Registration number S-6828 on the 5th of October 2006.2012 ActionAid Association</p>
            <ul class="bottom-nav">
                <li><a href="http://www.actionaid.org/uttarakhand">Home |</a></li>
                <li><a href="contact">Contact Us</a></li>
            </ul>
        </div>
    </div>
</div>