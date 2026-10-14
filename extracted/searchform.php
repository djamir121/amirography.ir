<form method="get"  action="<?php echo home_url(); ?>">
  <input type="text" value="جستجو..."  onfocus="if(this.value=='جستجو...')this.value=''" title="لطفا عبارت خود را جهت جستجو وارد کنید." onblur="if(this.value=='')this.value='جستجو...' " name="s" class="Box" size="15"  />
  <input type="image" src="<?php bloginfo('template_url'); ?>/images/serch.png" class="Go"  data-action="<?php bloginfo('url'); ?>"> 
</form>