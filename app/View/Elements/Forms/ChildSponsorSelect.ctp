    <strong>Yes! I would like to sponsor</strong>
    <select name="data[Children][number]" class="small" id="NumberOfChildren"> 
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="5">5</option>
      <option value="10">10</option>
    </select>
    <strong class="inflect">child!</strong>
    <p>(Sponsorship amount: <span class="inr"><span>INR</span><span class="amount">6000</span></span>)</p>
    <div class="input text hidden">
      <input type="hidden" name="data[Gift][amount]" value="6000" id="giftamount"  /> 
    </div>
    <?php echo $this->Form->error('Gift.amount')."\n"; ?>
