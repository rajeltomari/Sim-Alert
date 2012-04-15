<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php $string = random_string('alnum', 8);?>

<script type="text/javascript">
$(document).ready(function(){

		$("a[rel*=setalert]").click(function() {
			var imgbase = $(this).attr('myAction');
			var id = $(this).attr('myID');
			var currStat = $(this).attr('currStat');
			var action = $(this).attr('currStat');

			if (currStat=='n') {
				$.ajax({
					type: "POST",
					url: "<?php echo site_url('ajax/change_alertstatus');?>",
					data: { tid: id },
					dataType: "html",
					beforeSend: function(){
						$('#saving').show();
					},
					success: function(data){
						if (data != 'fail') {
							var img = '<?php echo $imglocation ?>' + data + '-on.png';
							$('#al' + id + ' img').attr('src',img );
							var newimg = '<?php echo $imglocation ?>' + $('img.on').attr('currStat') + '-off.png';
							$('img.on').parent('a').attr('currstat','n');
							$('img.on').attr('src',newimg);
							$('img.on').attr('class','off');
							$('#al' + id + ' img').attr('class','on');
							$('#al' + id + ' a').attr('currstat','y');							
						}
					},
					error: function (xhr, ajaxOptions, thrownError) {
						alert(xhr.statusText + ': ' + ajaxOptions + ' > ' + thrownError);
					},
					complete: function(){
						$('#saving').hide();
					}
				});
			}
			return false;
		});
});
</script>
