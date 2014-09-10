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
            <span class="title">Emergency Relief: Floods and Devastation - Urgent Appeal For Help</span>
                 <div class="clear"></div>
            <div class="top-navigation">
                <ul>
                    <li><a href="http://www.actionaid.org/india">Home |</a></li>
                    <li><a href="contact">Contact Us</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="clear"></div>
    <div class="banner">
        <img src="img/appeals/emergencies/banner1.jpg" alt="banner" />
    </div>
    <div class="clear"></div>
    <div class="main-content">
        <div class="left-part">
            <div class="first_block">
                <h3>The Scale of Disaster</h3>
                <br />
                <h4> Uttar Pradesh</h4>
                <ul>
                    <ul>
                      <li>1500 villages affected</li>
                      <li>Over 80 reported dead</li>
                    </ul>
                </ul>
                 <h4> Uttarakhand</h4>
                <ul>
                    <ul>
                      <li>27 lives lost</li>
                      <li>Several hundred homes damaged</li>
                    </ul>
                </ul>
                <h4> Odisha </h4>
                <ul>
                  <ul>
                    <li>3.6 Million people affected </li>
                    <li> 46 lives lost </li>
                  </ul>
                </ul>
                <h4> Bihar</h4>
                <ul> 
                  <ul>
                    <li> 250,000 people affected </li>
                  </ul>
                </ul>
                <h4>Assam </h4>
                <ul>
                	<ul>
                	  <li>5.4 lakh people affected in 1540 villages</li>
                	  <li>	23 thousand people in relief camps</li>
              	  </ul>
              </ul>

                
            </div>
            <div class="second_block">
                <h3>We need your urgent help!</h3>
                <p align="justify" style="font-family:Georgia, 'Times New Roman', Times, serif; font-style:inherit;"> Floods  have struck vast areas of Uttar Pradesh, Uttarakhand, Assam, Bihar and Odisha. </p>
                <p align="justify" style="font-family:Georgia, 'Times New Roman', Times, serif; font-style:inherit;"> We have already conducted rapid needs assessment in the areas that we work, and are already trying to meet the most urgent requirement in most of the areas we work in.There is an urgent and immediate need for shelter, food and hygiene support.</p>
                <p align="justify">&nbsp;</p>
<p align="justify" style="font-family:Georgia, 'Times New Roman', Times, serif; font-style:italic;"><strong>
At the moment we are focusing on shelter, water and sanitation. Food and clothing are being provided in those areas where there are no other government or other agencies have reached yet. </strong></p>
<p><strong>We are relying on your valuable contributions in trying times like these.</strong></p>


          </div>
            <div class="clear"></div>
            <div>     <table border="0" cellpadding="18" cellspacing="0" width="100%" style="border: 1px solid #999999;background-color: #EBEBEB;">
                                <tbody><tr>
                                    <td valign="top" ><p>Our immediate efforts are to provide clean drinking water, tarpaulin for shelter, food packets, temporary toilets and candles to those affected, especially, children, girls, young mothers and pregnant women.
                                  </td>
                                </tr>
                            </tbody></table> </div>
                             <div class="clear"></div>
            <div class="left-bottom">
            
        
            
                <h2>ABOUT ACTIONAID & OUR HUMANITARIAN RESPONSE TO EMERGENCIES</h2>
                <p>ActionAid is a global federation of more than 44 country affiliates. We have been working with most marginalised communities in India since 1972. With an all India presence in 25 states and  1 union territory, we have sided with the poor consistently for 41 years. We work to defeat poverty and marginalisation by building resilient and self reliant communities.</p>
                <p>We are one of the first movers at times of disaster and calamity. With intimate partnership with affected communities we ensure to provide not only immediate basic needs but adopt a long term rehabilitation of the affected communities. We are still active in long term rehabilitation work of earlier calamities, like Uttarakhand Floods, Cyclone Phailin, which struck India.</p>
            </div>
            <div class="contat-info">
                <p>For queries write to <a href="mailto:fundindia@actionaid.org"><span class="red">fundindia@actionaid.org</span></a> or call <span class="red">080- 25586293</span></p>
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
                    <p>Please mention Emergency Relief: Floods and Devastation Emergency’ on the envelope. Also <a href="files/donate.pdf"><span class="red">download the donation form</span></a> and clip it along with the cheque you will be sending. Else, mention your NAME, FULL ADDRESS, EMAIL and PHONE NUMBER on backside of your cheque, so that we can send you back the receipts!  This is important!</p>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="footer-content">
            <p>ActionAid Association is registered in India under the Societies Registration Act of 1860 with its registered office at New Delhi. Registration number S-56828 of 2006.</p>
            <ul class="bottom-nav">
                <li><a href="http://www.actionaid.org/india">Home |</a></li>
                <li><a href="contact">Contact Us</a></li>
            </ul>
        </div>
    </div>
</div>