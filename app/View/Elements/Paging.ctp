    <div class="paging">
      <div class="counter">
        <?php echo $this->MyPaginator->counter(array('format' => __('Page {:page} of {:pages}')))."\n";?>
      </div>
      <div class="pages">
        <?php echo $this->MyPaginator->prev('« '.__('previous'), array(), null, array('class'=>'disabled'))."\n";?>
        <?php echo $this->MyPaginator->numbers(array('class'=>'number'))."\n"?>
        <?php echo $this->MyPaginator->next(__('next').' »', array(), null, array('class' => 'disabled'))."\n";?>
      </div>
      <div class="limit">
        <?php echo $this->MyPaginator->limit()."\n";?>
      </div>
    </div>
