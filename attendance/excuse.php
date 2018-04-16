<?php

require_once(dirname(__FILE__).'/../../config.php');

// context is something holds childs
$context = context_system::instance();
// require_capability('local/hello:sayhello',$context);

require_login();

$PAGE->set_title(get_string('welcome', 'local_hello'));

echo $OUTPUT->header();
/**
* 
*/
class Excuse_Teacher_ID
{
	function __construct()
	{
		echo"hello";
	}
	public function get_choosen_Teacher_ID($Teacher_Id){
		global $DB;
		$Teacher_ID=Teacher_Id;

		$sql = "SELECT mdl_role_assignments.userid
                  FROM mdl_role_assignments
                 WHERE mdl_role_assignments.role.id=(select mdl_role.id from mdl_role WHERE mdl_role.shortname='editingteacher' )
                 group by mdl_role_assignments.userid";
		$params = array(
            'pram'  => $Teacher_ID);
	}
	public function get_Teacher_ID(){
		global $DB;
		return $DB->execute("second()"); 
		
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript">
		function validate(){
			var Excuse=document.getElementById('Excuse');
			var Teacher=document.getElementById('inputTeacher')	;
			if(Excuse.value==""){
				alert("please fill the fields");
				return false;
				}
			if (Teacher.value == "Choose") {
    			alert("Please select a selection");
    			return false;
			}
		}
	</script>
</head>
<body>
	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" onsubmit="return validate()">
		<div class="form-group">
  			<label for="Excuse">Excuse:</label>
  			<textarea class="form-control" rows="5" id="Excuse" name="Excuse1"></textarea>
		</div>
		<div class="form-group col-md-4">
      		<label for="inputTeacher">Teacher</label>
      		<select id="inputTeacher" class="form-control" required="" name="inputTeacher1">
        		<option value="Choose" selected="">Choose...</option>
        		<option>Teacher1</option>
      		</select>
    	</div>
    	<div class="form-group"> 
    		<div class="col-sm-offset-2 col-sm-10">
      			<button type="submit" class="btn btn-default">Submit</button>
    		</div>
  		</div>
	</form>
</body>
</html>
<?php
echo $OUTPUT->footer();
?>