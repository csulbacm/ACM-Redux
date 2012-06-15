<?php $minutes = rx_getData('minutes-listing'); ?>
<?php $charters = rx_getData('charters'); ?>
<?php $closedCharters = rx_getData('closed-charters'); ?>
<?php rx_setTitle("acm@thebeach - Our Mission"); ?>

<?php includePart("base", "documentTop"); ?>

    <?php includePart("base", "header"); ?>
    <?php includePart("mission", "splash"); ?>
    
    <div class="main-content">     
        <div class="grid_6">
        	<h2>Our Goal</h2>
<p>Our goal here at the ACM is to advance the science and application of information technology by providing students with real world information through guest speakers, workshops, seminars, projects, and other activities. Information about job trends, internships, and scholarships is always updated to help students take a stand in their future career.</p>
<p>We also work to strengthen the bond between the students, the faculty, and the Computer Engineering and Computer Science (CECS) department. A stronger, tighter relationship students and their instructors engerders a friendly, energetic, close-knit and secure learning atmosphere.</p>
<p>Moreover, we provide services back to the community by tutoring, volunteering, and spreading our knowledge about the information technology to others.</p>
            <h2>More about acm@thebeach</h2>
            <p>The Association for Computing Machinery is an active branch of the globe’s largest computer science society. Here at the Long Beach chapter, we believe in the principles of Gladwell’s book, Outliers: The Story of Success. We commit our time and energy to producing, engaging in, and ultimately mastering the technologies of the computing age.</p>
        </div>
        <div class="grid_6">
        <p></p><img src="<?php echo rx_imageURL("triad.jpg"); ?>" alt="" /></p>            

        <p></p><img src="<?php echo rx_imageURL("swiss.jpg"); ?>" alt="" /></p>            
        </div>
    </div>
<?php includePart("base", "documentBottom"); ?>