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
      <span class="title">Muzzaffarnagar Riots - Urgent Appeal For Help</span>
      <div class="top-navigation">
        <ul>
          <li>
            <a href="http://www.actionaid.org">Home |</a>
          </li>
          <li><a href="contact">Contact Us</a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="clear"></div>
  <div class="banner">
    <img src="img/appeals/emergencies/banner-muzzafarnagar.jpg" alt="banner" />
  </div>
  <div class="clear"></div>
  <div class="main-content">
    <div class="left-part">
      <div class="first_block">
        <h3>The Situation.</h3>
        <ul>
          <li>Riots in their first two weeks left 48 dead and 93 injured besides-displacing 70,000 people.</li>
          <li>At present, 40,000 people are estimated to be in camps of Muzaffarnagar, Shamli and Baghpat.</li>
          <li>40 children died in December due to extreme winter and unsafe conditions in camps.</li>
          <li>Children forced to miss school.</li>
          <li>Dismal health, hygiene and sanitary conditions in camps.</li>
          <li>Safety, security and privacy for girls, women and children a matter of concern.</li>
        </ul>
        <h3>ActionAid India’s Response till date</h3>
        <ul>
          <li>ActionAid India is working in 14 out of the 17 camps in Shamli district.</li>
          <li>Relief materials from ActionAid India have reached 2658 families so far.</li>
          <li>Food and ration kits supplied to 900 families, and quilts and mattresses to 300 families.</li>
          <li>400 women and 1152 children were supplied woollen clothes in December.</li>
          <li>9 education centres for children in the district so that they don’t miss their curriculum.</li>
          <li>26 volunteers employed to coordinate relief efforts.</li>
        </ul>
      </div>
      <div class="second_block">
        <h3>We need your urgent help!</h3>
        <ul>
          <li>To continue relief efforts in the 14 camps of Shamli for 6 months.</li>
          <li>To provide livelihood support to most vulnerable affected families living in camps.</li>
          <li>To provide shelter support  to most vulnerable affected families living in camps.</li>
          <li>In continuing psycho-social  counselling through our volunteers.</li>
          <li>In continuing and expanding our support through educational centres.</li>
          <li>Advocating in accessing government schemes and entitlements.</li>
        </ul>
      </div>
      <div class="clear"></div>
      <div class="left-bottom">
        <h2>ABOUT ACTIONAID & OUR HUMANITARIAN RESPONSE TO EMERGENCIES</h2>
        <p>ActionAid is a global federation of more than 44 country affiliates. We have been working with most marginalised communities in India since 1972. With an all India presence in 23 states and 1 union territory, we have sided with the poor consistently for 41 years. We work to defeat poverty and marginalisation by building resilient and self-reliant communities.</p>
        <p>We are one of the first movers in times of disaster and calamity. With intimate partnership with affected communities, we, besides providing for the immediate basic needs, also adopt long-term strategies for rehabilitation of- affected communities. We are still very much active in long-term rehabilitation work taking place in response to the earlier calamities -that struck India.</p>
      </div>
      <div class="contat-info">
        <p>In case of any queries, please feel free to write to <a href="mailto:fundindia@actionaid.org"><span class="red">fundindia@actionaid.org</span></a> or call <span class="red">080- 25586293</span></p>
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
      <span class="smalltext">Contributions to ActionAid Association are exempted from Tax under Sec 80 G of Income Tax Act 1961</span>
      <img src="img/appeals/emergencies/verisign_logo.jpg" />
      <br/><br/>
    </div>
  </div>
  <div class="footer">
    <div class="footer-content">
      <p>ActionAid Association is registered in India under the Societies Registration Act of 1860 with its registered office at New Delhi. Registration number S-6828 on the 5th of October 2006.</p>
      <ul class="bottom-nav">
        <li><a href="http://www.actionaid.org/uttarakhand">Home |</a></li>
        <li><a href="contact">Contact Us</a></li>
      </ul>
    </div>
  </div>
</div>