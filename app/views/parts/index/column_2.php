<?php $minutes = rx_getData('minutes-listing'); ?>
      
<div class="content-module">
    <h2>Press</h2>
    <p>
The Association for Computing Machinery is an active branch of the 
globe&rsquo;s largest computer science society. Here at the Long Beach chapter,
 we believe in the principles of Gladwell&rsquo;s book, Outliers: The Story of Success. </p>
 
 <p>We commit our time and energy to producing, engaging in, and ultimately mastering the
 	 technologies of the computing age.</p>
</div>

<div class="content-module">
    <h2>Latest Minutes</h2>
<ul class="link-list">
	<?php foreach($minutes as $item): ?>
        <li><a href="<?php echo $item['URL']; ?>">
           Minutes for <?php echo $item['date']; ?>
       </a></li>
	<?php endforeach ?>
</ul> 
</div>
      
<div class="content-module">
    <h2>Photos</h2>
    <p>
The Association for Computing Machinery is an active branch of the 
globe&rs quo;s largest computer science society. Here at the Long Beach chapter,
 we believe in the principles of Gladwell&rsquo;s book, Outliers: The Story of Success. </p>
 
 <p>We commit our time and energy to producing, engaging in, and ultimately mastering the
 	 technologies of the computing age.</p>
</div>


