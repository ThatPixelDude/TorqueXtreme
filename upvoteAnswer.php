<?php
	session_start();
	
	require 'mysqlCon.inc.php';
	
	require 'midSignedInCheck.inc.php';

	if(!isset($_SESSION['id']))
	{
		echo '
			<script type="text/javascript">
				$("#dark").show();

				$("#alertBox").show();

				positionAlertBox();
				
				$(".upvoteAnswer").val("Gear Up");

				$(".upvoteAnswer").attr(\'disabled\', false);

				$(".downvoteAnswer").attr(\'disabled\', false);
			</script>
		';

		die();
	}
	
	if(isset($_POST['id']))
	{
		$answerId = $_POST['id'];
		
		$query = 'SELECT type FROM answerVotes WHERE answerId='.$answerId.' AND userId='.$_SESSION['id'];
	
		$query_run = mysql_query($query);
		
		if(mysql_num_rows($query_run)==0)
		{
			$query = 'SELECT userId FROM answers WHERE id='.$answerId;
			
			$query_run = mysql_query($query);
			
			$update = 'UPDATE users SET points=points+10 WHERE id='.mysql_result($query_run, 0, 'userId');
			
			mysql_query($update);
			
			$insert = 'INSERT INTO answerVotes VALUES("up", '.$_SESSION['id'].', '.$answerId.')';
			
			mysql_query($insert);
			
			$update = 'UPDATE answers SET votes=votes+1 WHERE id='.$answerId;
			
			mysql_query($update);
			
			echo '
				<script type="text/javascript">
					var curr = $("#answerVotes'.$answerId.'").text();
						
					curr = parseInt(curr);
						
					curr++;
						
					$("#answerVotes'.$answerId.'").text(curr);
					
					$("#upvoteAnswer'.$answerId.'").val("Undo Gear Up");

					$("#upvoteAnswer'.$answerId.'").attr(\'disabled\', false);

					$("#downvoteAnswer'.$answerId.'").attr(\'disabled\', false);
				</script>
			';
		}
		else
		{
			if(mysql_result($query_run, 0, 'type')=='up')
			{
				$query = 'SELECT userId FROM answers WHERE id='.$answerId;
			
				$query_run = mysql_query($query);
				
				$update = 'UPDATE users SET points=points-10 WHERE id='.mysql_result($query_run, 0, 'userId');
				
				mysql_query($update);
				
				$delete = 'DELETE FROM answerVotes WHERE userID='.$_SESSION['id'].' AND answerId='.$answerId;
				
				mysql_query($delete);
				
				$update = 'UPDATE answers SET votes=votes-1 WHERE id='.$answerId;
			
				mysql_query($update);
				
				echo '
					<script type="text/javascript">
						var curr = $("#answerVotes'.$answerId.'").text();
						
						curr = parseInt(curr);
						
						curr--;
						
						$("#answerVotes'.$answerId.'").text(curr);
					
						$("#upvoteAnswer'.$answerId.'").val("Gear Up");

						$("#upvoteAnswer'.$answerId.'").attr(\'disabled\', false);

						$("#downvoteAnswer'.$answerId.'").attr(\'disabled\', false);
					</script>
				';
			}
			else
			{
				$query = 'SELECT userId FROM answers WHERE id='.$answerId;
			
				$query_run = mysql_query($query);
				
				$update = 'UPDATE users SET points=points+12 WHERE id='.mysql_result($query_run, 0, 'userId');
				
				mysql_query($update);
				
				$update = 'UPDATE answerVotes SET type="up" WHERE userId='.$_SESSION['id'].' AND answerId='.$answerId;
				
				mysql_query($update);
				
				$update = 'UPDATE answers SET votes=votes+2 WHERE id='.$answerId;
			
				mysql_query($update);
				
				echo '
					<script type="text/javascript">
						var curr = $("#answerVotes'.$answerId.'").text();
						
						curr = parseInt(curr);
						
						curr = curr+2;
						
						$("#answerVotes'.$answerId.'").text(curr);
					
						$("#upvoteAnswer'.$answerId.'").val("Undo Gear Up");
						
						$("#downvoteAnswer'.$answerId.'").val("Gear Down");

						$("#upvoteAnswer'.$answerId.'").attr(\'disabled\', false);

						$("#downvoteAnswer'.$answerId.'").attr(\'disabled\', false);
					</script>
				';
			}
		}
	}
	else
	{
		echo '<p>OOPS! Something went wrong.</p>'; //question id is not set
		
		die();
	}
?> 