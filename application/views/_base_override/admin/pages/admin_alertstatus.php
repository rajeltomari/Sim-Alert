<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php echo text_output($header, 'h1', 'page-head');?>

<?php echo text_output($text, 'p');?>



<?php if (isset($alerts)): ?>
<div style="width: 300px; margin-left: auto; margin-right: auto;">
<table cellspacing="0" cellpadding="2" width='300' align='center'>
<tr>
<td width="200">
<div id='alertslist' style="width: 200px; margin-left: auto; margin-right: auto;">
<table cellspacing="0" cellpadding="2" width='200' align='center'>
		<?php foreach ($alerts as $a): ?>
		<tr><td>
		<div id='al<?php echo $a['id'];?>'>
		<a href="#" rel="setalert" myAction="<?php echo $a['imgbase'];?>" myID="<?php echo $a['id'];?>" class="image" currStat="<?php echo $a['active'];?>"><?php echo img($a['img']);?></a> 
		</div></td></tr>
		<?php endforeach;?>
</table>
</div>
</td>
<td width="100" align='center'>
	<div id="saving" class="hidden">
		<?php echo img($loading);?>
	</div>

</td>
</table>
</div>
<?php endif;?>