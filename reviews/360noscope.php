<?PHP

    include_once $_SERVER["DOCUMENT_ROOT"] . "/crumpocolypse/dbCon.php";

    $r_id = $_POST['id'];

    require $_SERVER["DOCUMENT_ROOT"] . "/reviews/get.php";
?>

    <div class="type-ribbon">
        <h3>Review #<? echo $r_id; ?></h3>
    </div>

	<p id="date">
        <? 
            echo date("F j, Y",strtotime($date)); 
        ?>
    </p>
    
    <div id="avatar">
        <? 
            echo $embed; 
        ?>
							
        <h1><a href="<? echo $titleLink; ?>" ><? echo $title; ?></a></h1>
    </div>
				 
    <? 
        echo $review; 
    ?>
				 
    <blockquote>
	   <h2>
			<?
				$gravatar_link = 'http://www.gravatar.com/avatar/' . md5($author_email);
				echo '<img src="' . $gravatar_link . '" />';
			?>
			
           <a href="../profiles/<? echo $author; ?>.php"><? echo $author; ?></a>
		
        </h2>
		
    </blockquote>
			
    <? include_once "js-share.php"; ?>
		
	<div class="content">
        <? include "../crumpocolypse/livefyre.php"; ?>
    </div>