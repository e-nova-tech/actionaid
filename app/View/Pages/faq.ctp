<?php
/**
 * FAQ Page
 *
 * @package     app.View.Pages.Faq
 * @copyright   Copyright 2012, ActionAid Association India 
 * @link        http://actionaid.org/india
 * @author      Remy Bertot / Kevin Muller
 * @license     MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
  $this->set('title_for_layout', __('Frequently Asked Questions'));
  $this->set('js_for_layout', 'faq');
  $this->set('css_for_layout', 'faq');
?>
  <div class="grid_8 alpha faq-content">
    <h2>Frequently Asked Questions</h2>
    <div class="accordion">
      <ul class="questions">
<li>
          <h3>What does ActionAid do?</h3>
          <div>
          <p>
            ActionAid India has been <strong>working with poor and marginalised people</strong> in India since 1972. 
            We work in <strong>25 states</strong> and one Union Territory reaching out to approximately 8 million people. 
            We partner <strong>local NGOs</strong>, community based organizations and people's movements to collectively 
            address poverty, inequality and injustice.
          </p>
          <p>
            Our focus is on the rights of India’s most marginalised communities: <strong>Dalit and indigenous 
            people, rural and urban poor, women, children and minorities</strong>. These groups face an acute 
            lack of access to and control over resources, services, and institutions.
          </p>
          <p>
            We pay special attention to those in vulnerable situations such as people living with 
            <strong>chronic hunger, HIV/AIDS or disability, migrant and bonded workers, children</strong> who are out
            of school, city-dwellers without a home, and people whose land or livelihood is under threat.
          </p>
          <p>
            We also work with women, men, girls and boys who have been trafficked, displaced, or hit 
            by <strong>natural and human-made disasters</strong>.
          </p>
          <p><a href="http://actionaid.org/india/about-us">Want to learn more about ActionAid aid?</a></p>
          </div>
        </li>
        <li>
          <h3>How does ActionAid use donations?</h3>
          <div>
            <p>
              ActionAid finance a wide range of long term and short term projects all over India working
              with marginalized communities such Dalit and indigenous people, rural and urban poor, women, children and minorities. 
              The details of ActionAid results and expenses are detailed in our annual report.
              You can download the annual report <a href="http://www.actionaid.org/sites/files/actionaid/actionaid-ar-2010-new-small-size.pdf">here.</a>
            </p>
          </div>
        </li>
        <li>
          <h3>What is Child Sponsorship?</h3>
          <div>
          <p>
            Your gift provides a better future for your sponsored child, the child’s family and the community. 
            Your annual contribution of Rs 6000 translates to Rs 500 per month only. Child sponsorship is a 
            very unique relationship. All our sponsors confess they receive much more than they give!
          </p>
          <p>
            It would give you a sense of fulfilment, of satisfaction to be able to change the future of
            a child and the child’s community. When you sponsor a child you will receive:
            <ul>
              <li>A picture and story of your sponsored child.</li>
              <li>Messages directly from your sponsored child twice a year.</li>
              <li>A newsletter twice a year or more on how your donation helps.</li>
              <li>Annual report on ActionAid’s activity across the country.</li>
            </ul>
          </p>
          </div>
        </li>
        <li>
          <h3>Can I claim tax benefits?</h3>
          <div>
          <p>
            Only Indian nationals are eligible for tax exemption as this benefit is valid only in India.
            Contributions to ActionAid Association are exempted from Tax under section 80G of Income 
            TaxAct 1961. This translate in a deduction of the entire amont donated is available for 
            sums up to 10% of your taxable income. Please consult your Tax Advisor to calculate exactly 
            how much tax you can save.
          </p>
          </div>
        </li>
        <li>
          <h3>What payment methods are available?</h3>
          <div>
          <p>
            Several payment options are available:
            <ul>
              <li>
                <strong>Credit Cards:</strong>
                Currently you can use our <a href="/">online donation form</a> to make payment through credit
                cards. 
              </li>
              <li>
                <strong>Debit cards payment and internet banking:</strong>
                These facilities would be introduced shortly.
              </li>
              <li>
                <strong>By check:</strong>
                Please download and fill up the <a href="#">check donation form</a> and send us the check with 
                the designated amount in favor of ActionAid Association and send it to the address bellow.
              </li>
              <li>
                <strong>By direct debit / bank transfer:</strong>
                Please download and fill up the <a href="#">ECS donation form</a> and send it to the address
                bellow.
                <p>
                  ActionAid Association<br/>
                  139 Richmond Road<br/>
                  Bangalore 560025 - India
                </p>
              </li>
            </ul>
          </p>
          </div>
        </li>
        <li>
          <h3>Is the online payment option secure?</h3>
          <div>
          <p>
            ActionAid Association follows international industry standards and 
            best practices in order to secure your data and protect your privacy:
            <ul>
              <li>
                We do not capture or store your credit card or payment options details. After
                entering your contact details you will be redirected to the website of the payment gateway 
                provider where the payment details will be captured.
              </li>
              <li>
                The data transiting over internet is encrypted. We use SSL (Standard Sockets Layer) 
                technology for data encryption. Our SSL certificate is signed by an internationally 
                trusted authentication agency.
              </li>
              <li>
                We make every reasonable effort to prevent any loss, misuse, disclosure or 
                modification of personal information, as well as any unauthorized access to 
                personal information. Learn more by reading our <a href="actionaid.org/india/privacy">Privacy
                Policy</a>
              </li>
            </ul>
          </p>
          </div>
        </li>
        <li>
          <h3>What is the legal status of ActionAid?</h3>
          <div>
          <p>
            ActionAid Association is non profit organisation working with poor and marginalised people to 
            end poverty and injustice together. ActionAid Association is registered in India under the 
            Societies Registration Act of 1860 with its registered office at New Delhi. 
            Registration number S-6828 on the 5th of October 2006.
          </p>
          </div>
        </li>
      </ul>
    </div>
    <h2>You can make a difference today!</h2>
    <a class="donate button first" href="/sponsor-a-child">Sponsor a Child Now</a>
    <a class="donate button" href="/">Make a General Donation</a>
  </div>
  <div class="grid_4 omega">
    <h2>You did not find an answer?</h2>
    <div style="padding-left:10px">
<?php echo $this->element('Forms/ActionAidContactInfo'); ?>
    </div>
  </div>
