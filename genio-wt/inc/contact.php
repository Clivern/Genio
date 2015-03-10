<?php
/**
 * genio Contact and Hire form
 *
 * You can override all these functions in child these 
 * and create your own form
 * 
 * @package genio-wt
 */

if ( ! function_exists( 'genio_wt_contact_hire_auth' ) ) :
	
	/**
	 * Insert contact and hire form auth data in your header
	 * 
	 * @since 1.0
	 * @return string
	 */
	function genio_wt_contact_hire_auth(){
		global $Genio_Wt_Core;
		?>
		<?php if( (is_front_page()) && !('posts' == get_option( 'show_on_front' )) && ( ($Genio_Wt_Core->getOption('contact_s_scf') == 'yes') || ($Genio_Wt_Core->getOption('contact_s_shf') == 'yes') ) ){ ?>
			<script type="text/javascript">var genio_contact_hire_auth = {"ajaxurl": "<?php echo esc_js(admin_url('admin-ajax.php')); ?>","contact_action" : "genio_wt_contact", "hire_action" : "genio_wt_hire"};</script>
		<?php
		}
	}
endif;
add_action('wp_print_scripts', 'genio_wt_contact_hire_auth' );


if ( ! function_exists( 'genio_wt_response_action' ) ) :

	/**
	 * Get response array and generate JSON encoded message 
	 * 
	 * @since 1.0
	 * @param array $response
	 * @return string
	 */
	function genio_wt_response_action($response) {
            header('Content: application/json');
            echo json_encode($response);
            die;
	}
endif;


if ( ! function_exists( 'genio_wt_contact_action' ) ) :
	
	/**
	 * Do all contact stuff (validate, sanitize and send email)
	 *
	 * @since 1.0
	 * @return string
	 */
	function genio_wt_contact_action() {
		global $Genio_Wt_Core;

		// This function
		// define email template
		// define default response
		// validate that data come from trusted source
		// validate user data
		// sanitize user data
		// send email
		
            $response = array(
                  'status' => 'error',
                  'data' => array()
            );

            $plain_tpl = "Name: __NAME__\nEmail: __EMAIL__\nSubject: __SUBJECT__\nMessage: __MESSAGE__";

            $action = ( (isset($_POST['action'])) && ($_POST['action'] == 'genio_wt_contact_action') ) ? trim($_POST['action']) : false;

            if( ($action === false) ){
            	genio_wt_response_action($response);
            }
            $feedback_data = array();

            if( !(isset($_POST['is_legit'])) || !(empty($_POST['is_legit'])) ){
			$response['data'] = __('Bad request.','genio_wt_lang');
			genio_wt_response_action($response);
		}

		$feedback_data['contact_name'] = (isset($_POST['contact_name'])) ? trim(filter_var($_POST['contact_name'], FILTER_SANITIZE_STRING)) : false;
		$feedback_data['contact_email'] = (isset($_POST['contact_email'])) ? trim(filter_var($_POST['contact_email'], FILTER_SANITIZE_EMAIL)) : false;
		$feedback_data['contact_subject'] = (isset($_POST['contact_subject'])) ? trim(filter_var($_POST['contact_subject'], FILTER_SANITIZE_STRING)) : false;
		$feedback_data['contact_message'] = (isset($_POST['contact_message'])) ? trim(filter_var($_POST['contact_message'], FILTER_SANITIZE_STRING)) : false;

		if( ($feedback_data['contact_name'] === false) || (empty($feedback_data['contact_name'])) ){
			$response['data'] = __('Please provide your name.','genio_wt_lang');
			genio_wt_response_action($response);
		}

		if(strlen($feedback_data['contact_name']) < 3){
			$response['data'] = __('Provided name is too short.','genio_wt_lang');
			genio_wt_response_action($response);
		}

		if( ($feedback_data['contact_email'] === false) || (empty($feedback_data['contact_email'])) || !(filter_var($feedback_data['contact_email'], FILTER_VALIDATE_EMAIL)) ){
			$response['data'] = __('Please provide your email.','genio_wt_lang');
			genio_wt_response_action($response);
		}
		// uncomment to make subject required
		if( ($feedback_data['contact_subject'] === false)/* || (empty($feedback_data['contact_subject']))*/ ){
			$response['data'] = __('Please provide a subject.','genio_wt_lang');
			genio_wt_response_action($response);
		}
	
		if( ($feedback_data['contact_message'] === false) || (empty($feedback_data['contact_message'])) ){
			$response['data'] = __('Please provide your message.','genio_wt_lang');
			genio_wt_response_action($response);
		}

		if(strlen($feedback_data['contact_message']) < 5){
			$response['data'] = __('Provided message is too short.','genio_wt_lang');
			genio_wt_response_action($response);	
		}

		$headers = "MIME-Version: 1.0" . PHP_EOL;
		$headers .= "Content-type: text/plain; charset=utf-8" . PHP_EOL;
		$message = str_replace(
			array('__NAME__', 
				'__EMAIL__', 
				'__SUBJECT__',
				'__MESSAGE__'),
			array($feedback_data['contact_name'],
				$feedback_data['contact_email'],
				$feedback_data['contact_subject'],
				$feedback_data['contact_message']), 
			$plain_tpl);
		$feedback_data['contact_name'] = stripslashes(html_entity_decode($feedback_data['contact_name'], ENT_QUOTES));
		$feedback_data['contact_email'] = stripslashes(html_entity_decode($feedback_data['contact_email'], ENT_QUOTES));
		$headers .= "From: {$feedback_data['contact_name']} <{$feedback_data['contact_email']}>" . PHP_EOL;

		if( ($Genio_Wt_Core->getOption('contact_s_cem') == '') ){
			$response['data'] = __('Error, please, try again later','genio_wt_lang');
			genio_wt_response_action($response);
		}

		if( wp_mail($Genio_Wt_Core->getOption('contact_s_cem'), "New Message", stripslashes(html_entity_decode($message, ENT_QUOTES)), $headers) ){
			$response['status'] = 'success';
			$response['data'] = __('Thanks, We will respond as soon as possible.','genio_wt_lang');
			genio_wt_response_action($response);
		}else{
			$response['data'] = __('Error, please, try again later','genio_wt_lang');
			genio_wt_response_action($response);
		}

            genio_wt_response_action($response);
	}
endif;
add_action("wp_ajax_genio_wt_contact_action", 'genio_wt_contact_action');
add_action("wp_ajax_nopriv_genio_wt_contact_action", 'genio_wt_contact_action');


if ( ! function_exists( 'genio_wt_hire_action' ) ) :

	/**
	 * Do all hire stuff (validate, sanitize and send email)
	 *
	 * @since 1.0
	 * @return string
	 */
	function genio_wt_hire_action() {
		global $Genio_Wt_Core;
		
		// This function
		// define email template
		// define default response
		// validate that data come from trusted source
		// validate user data
		// sanitize user data
		// send email

            $response = array(
                  'status' => 'error',
                  'data' => array()
            );

            $plain_tpl = "Name: __NAME__\n Email: __EMAIL__\nTimeframe: __TIMEFRAME__\nExperience Level: __EXPERIENCE__\nProcess: __PROCESS__\nPackage: __PACKAGE__\nRequirements: __REQUIREMENTS__";

            $action = ( (isset($_POST['action'])) && ($_POST['action'] == 'genio_wt_hire_action') ) ? trim($_POST['action']) : false;

            if( ($action === false) ){
            	genio_wt_response_action($response);
            }

            $hireme_data = array();

            if( !(isset($_POST['is_legit'])) || !(empty($_POST['is_legit'])) ){
			$response['data'] =  __('Bad request.','genio_wt_lang');
			genio_wt_response_action($response);
		}

		$hireme_data['hireme_name'] = (isset($_POST['hireme_name'])) ? trim(filter_var($_POST['hireme_name'], FILTER_SANITIZE_STRING)) : false;
		$hireme_data['hireme_email'] = (isset($_POST['hireme_email'])) ? trim(filter_var($_POST['hireme_email'], FILTER_SANITIZE_EMAIL)) : false;
		$hireme_data['hireme_timeframe'] = ( (isset($_POST['hireme_timeframe'])) && (in_array($_POST['hireme_timeframe'], array('1','2','3','4','5','6'))) ) ? $_POST['hireme_timeframe'] : false;
		$hireme_data['hireme_experience'] = ( (isset($_POST['hireme_experience'])) && (in_array($_POST['hireme_experience'], array('1','2','3','4','5'))) ) ? $_POST['hireme_experience'] : false;
		$hireme_data['hireme_process'] = ( (isset($_POST['hireme_process'])) && (in_array($_POST['hireme_process'], array('1','2','3','4'))) ) ? $_POST['hireme_process'] : false;
		$hireme_data['hireme_package'] = ( (isset($_POST['hireme_package'])) && (in_array($_POST['hireme_package'], array('1','2','3'))) ) ? $_POST['hireme_package'] : false;
		$hireme_data['hireme_requirements'] = (isset($_POST['hireme_requirements'])) ? trim(filter_var($_POST['hireme_requirements'], FILTER_SANITIZE_STRING)) : false;

		if( ($hireme_data['hireme_name'] === false) || (empty($hireme_data['hireme_name'])) ){
			$response['data'] =  __('Please provide your name.','genio_wt_lang');
			genio_wt_response_action($response);
		}

		if(strlen($hireme_data['hireme_name']) < 3){
			$response['data'] =  __('Provided name is too short.','genio_wt_lang');
			genio_wt_response_action($response);	
		}

		if( ($hireme_data['hireme_email'] === false) || (empty($hireme_data['hireme_email'])) || !(filter_var($hireme_data['hireme_email'], FILTER_VALIDATE_EMAIL)) ){
			$response['data'] =  __('Please provide your email.','genio_wt_lang');
			genio_wt_response_action($response);
		}
	
		if( ($hireme_data['hireme_timeframe'] === false) || (empty($hireme_data['hireme_timeframe'])) ){
			$response['data'] =  __('Please provide a timeframe.','genio_wt_lang');
			genio_wt_response_action($response);
		}

		if( ($hireme_data['hireme_experience'] === false) || (empty($hireme_data['hireme_experience'])) ){
			$response['data'] =  __('Please provide experience level.','genio_wt_lang');
			genio_wt_response_action($response);
		}

		if( ($hireme_data['hireme_process'] === false) || (empty($hireme_data['hireme_process'])) ){
			$response['data'] =  __('Please provide process.','genio_wt_lang');
			genio_wt_response_action($response);
		}

		if( ($hireme_data['hireme_package'] === false) || (empty($hireme_data['hireme_package'])) ){
			$response['data'] =  __('Please provide a prefered package.','genio_wt_lang');
			genio_wt_response_action($response);
		}

		if( ($hireme_data['hireme_requirements'] === false) || (empty($hireme_data['hireme_requirements'])) ){
			$response['data'] =  __('Please provide project requirements.','genio_wt_lang');
			genio_wt_response_action($response);
		}

		if(strlen($hireme_data['hireme_requirements']) < 5){
			$response['data'] =  __('Provided project requirements is too short.','genio_wt_lang');
			genio_wt_response_action($response);	
		}

		$hireme_data['hireme_timeframe'] = str_replace(array('1','2','3','4','5','6'), array(
				__("As soon as possible (rush job)",'genio_wt_lang'),
				__("Within 1 week (rush job)",'genio_wt_lang'),
				__("Within 2 weeks",'genio_wt_lang'),
				__("Within a month",'genio_wt_lang'),
				__("Sometime in the next few months",'genio_wt_lang'),
				__("I'm not really sure",'genio_wt_lang'),
			), $hireme_data['hireme_timeframe']);
		$hireme_data['hireme_experience'] = str_replace(array('1','2','3','4','5'), array(
				__("Not much, I'll need your help",'genio_wt_lang'),
				__("Average - I surf the web",'genio_wt_lang'),
				__("I can design websites",'genio_wt_lang'),
				__("I can hand code HTML",'genio_wt_lang'),
				__("I'm not really sure",'genio_wt_lang'),
			), $hireme_data['hireme_experience']);
		$hireme_data['hireme_process'] = str_replace(array('1','2','3','4'), array(
				__("I'm just starting to explore options",'genio_wt_lang'),
				__("I'm sending out requests to a few vendors",'genio_wt_lang'),
				__("I want to use you, I just need some more details",'genio_wt_lang'),
				__("I'm ready to get started, where do I send payment?",'genio_wt_lang'),
			), $hireme_data['hireme_process']);
		$hireme_data['hireme_package'] = str_replace(array('1','2','3'), array(
				__("Designer",'genio_wt_lang'),
				__("Developer",'genio_wt_lang'),
				__("Speaker",'genio_wt_lang'),
			), $hireme_data['hireme_package']);

		$headers = "MIME-Version: 1.0" . PHP_EOL;
		$headers .= "Content-type: text/plain; charset=utf-8" . PHP_EOL;
		$message = str_replace(
			array('__NAME__', 
				'__EMAIL__', 
				'__TIMEFRAME__',
				'__EXPERIENCE__',
				'__PROCESS__',
				'__PACKAGE__',
				'__REQUIREMENTS__'), 
			array($hireme_data['hireme_name'],
				$hireme_data['hireme_email'],
				 $hireme_data['hireme_timeframe'],
				 $hireme_data['hireme_experience'],
				 $hireme_data['hireme_process'],
				 $hireme_data['hireme_package'],
				 $hireme_data['hireme_requirements']),
			$plain_tpl);
		$hireme_data['hireme_name'] = stripslashes(html_entity_decode($hireme_data['hireme_name'], ENT_QUOTES));
		$hireme_data['hireme_email'] = stripslashes(html_entity_decode($hireme_data['hireme_email'], ENT_QUOTES));
		$headers .= "From: {$hireme_data['hireme_name']} <{$hireme_data['hireme_email']}>" . PHP_EOL;
 
		if( ($Genio_Wt_Core->getOption('contact_s_hem') == '') ){
			$response['data'] = __('Error, please, try again later','genio_wt_lang');
			genio_wt_response_action($response);
		}

		if( wp_mail($Genio_Wt_Core->getOption('contact_s_hem'), "New Message", stripslashes(html_entity_decode($message, ENT_QUOTES)), $headers) ){
			$response['status'] = 'success';
			$response['data'] = __('Thanks, We will respond as soon as possible.','genio_wt_lang');
			genio_wt_response_action($response);
		}else{
			$response['data'] = __('Error, please, try again later','genio_wt_lang');
			genio_wt_response_action($response);
		}

            genio_wt_response_action($response);
	}
endif;
add_action("wp_ajax_genio_wt_hire_action", 'genio_wt_hire_action');
add_action("wp_ajax_nopriv_genio_wt_hire_action", 'genio_wt_hire_action');