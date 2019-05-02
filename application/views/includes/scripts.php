    <script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.slim.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery-qrcode-0.14.0.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/main.js"></script> 
    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script> 
    <script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script> 
    <script src="<?php echo base_url(); ?>assets/js/dataTables.bootstrap4.min.js"></script> 

    <script>			
			function printDiv()
			{
				window.print();
			}

		</script>
		<script>
			function submitFormAddDocument()
			{
				document.getElementById("addDocumentForm").submit();// Form submission
			}
		</script>
		<script>
			$("#collegeSelect").change(function () 
			{
				var selectedCollege = $(this).children("option:selected").val();
				$.ajax(
				{
				url: "<?php echo base_url(); ?>" + "IChecker/getCourses", 
				type: "POST",
				data: {'collegeid': selectedCollege},
				success: function(result)
				{
					var parsed = JSON.parse(result);
						$('#courseSelect').empty();
						$('#courseSelect').append(new Option('-Select Course-','') );
					$.each(parsed, function (index, item) {
						$('#courseSelect').append(new Option(item[0],item[0]) );
					})

				}});

			});
		</script>

		<script>
			$(document).ready(function() {
			    $('#documentType').DataTable({"bSort": false});
			});
		</script>



		
    