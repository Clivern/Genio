<?php
/**
 * Genio core class
 * 
 * This class can be defined in your child theme
 * 
 * @package genio-wt
 */

if ( !class_exists('GENIO_WT_OPTIONS') ) {
	
	/**
	 * Genio core class
	 *
	 * Used to bring data and styles to theme
	 * 
	 * @since 1.0
	 */
	class GENIO_WT_OPTIONS
	{

	     /**
		* Current template settings
		* 
		* @since 1.0
		* @access private
		* @var array $this->template_settings
		*/
		private $template_settings;

	     /**
		* Basic template settings
		* 
		* @since 1.0
		* @access private
		* @var array $this->basic_settings
		*/
		private $basic_settings;

	     /**
		* Internal template settings
		* 
		* @since 1.0
		* @access private
		* @var array $this->internal_settings
		*/
		private $internal_settings;

	     /**
		* Whether data loaded or seeded
		* 
		* @since 1.0
		* @access private
		* @var array $this->data_seeded
		*/
		private $data_seeded = array(
			'basic' => false,
			'template' => false,
		);

	     /**
		* All settings
		* 
		* @since 1.0
		* @access private
		* @var array $this->all_settings
		*/
		private $all_settings;

		/**
		 * Set Or Seed basic and template settings
		 *
		 * @since 1.0
		 * @access public
		 */
		public function run()
		{
			$this->setBasicSettings();
			$this->setTemplateSettings();
			$this->setFooterIcons();
			$this->setHomeIcons();
			$this->mergeSettings();
		}

		/**
		 * Set Or Seed basic and template settings in customizer page
		 *
		 * @since 1.0
		 * @access public
		 */
		public function safeRun()
		{
			global $wp_customize;
			if ( isset( $wp_customize ) ) {
				$this->run();
			}
		}

		/**
		 * Get basic settings
		 *
		 * @since 1.0
		 * @access private
		 */
		private function setBasicSettings()
		{
			$this->basic_settings = get_option( 'genio_wt_customize', $this->getDumpBasicSettings() );
			//stop issues during activation while genio plugin not set
			$this->basic_settings = array_merge($this->getDumpBasicSettings(), $this->basic_settings);
			
			if( isset($this->basic_settings['dummy']) ){
				$this->data_seeded['basic'] = true;
			}

		}

		/**
		 * Get current template settings
		 *
		 * @since 1.0
		 * @access private
		 */
		private function setTemplateSettings()
		{
			$this->template_settings = get_option('genio_wt_' . $this->basic_settings['template'] . '_template', $this->getDumpTemplateSettings());
			//stop issues during activation while genio plugin not set
			$this->template_settings = array_merge( $this->getDumpTemplateSettings(), $this->template_settings);

			if( isset($this->template_settings['dummy']) ){
				$this->data_seeded['template'] = true;
			}
		}

		/**
		 * Set footer icons
		 *
		 * @since 1.0
		 * @access private
		 */
		private function setFooterIcons()
		{
			// Set footer icons list with bg and 
			// Animation delay
			$animation_delay = 0;
			$this->internal_settings['footer_icons'] = array();
			if(!empty($this->basic_settings['facebook'])){
				$animation_delay += 0.3;
				$this->internal_settings['footer_icons'][] = array(
					'url' => $this->basic_settings['facebook'],
					'icon' => 'facebook',
					'bg' => 'facebook',
					'delay' => $animation_delay,
				);
			}
			if(!empty($this->basic_settings['twitter'])){
				$animation_delay += 0.3;
				$this->internal_settings['footer_icons'][] = array(
					'url' => $this->basic_settings['twitter'],
					'icon' => 'twitter',
					'bg' => 'twitter',
					'delay' => $animation_delay,
				);
			}
			if(!empty($this->basic_settings['google_plus'])){
				$animation_delay += 0.3;
				$this->internal_settings['footer_icons'][] = array(
					'url' => $this->basic_settings['google_plus'],
					'icon' => 'google-plus',
					'bg' => 'google-plus',
					'delay' => $animation_delay,
				);
			}
			if(!empty($this->basic_settings['behance'])){
				$animation_delay += 0.3;
				$this->internal_settings['footer_icons'][] = array(
					'url' => $this->basic_settings['behance'],
					'icon' => 'behance',
					'bg' => 'behance',
					'delay' => $animation_delay,
				);
			}
			if(!empty($this->basic_settings['dribbble'])){
				$animation_delay += 0.3;
				$this->internal_settings['footer_icons'][] = array(
					'url' => $this->basic_settings['dribbble'],
					'icon' => 'dribbble',
					'bg' => 'dribbble',
					'delay' => $animation_delay,
				);
			}
			if(!empty($this->basic_settings['youtube'])){
				$animation_delay += 0.3;
				$this->internal_settings['footer_icons'][] = array(
					'url' => $this->basic_settings['youtube'],
					'icon' => 'youtube',
					'bg' => 'youtube',
					'delay' => $animation_delay,
				);
			}
			if(!empty($this->basic_settings['flickr'])){
				$animation_delay += 0.3;
				$this->internal_settings['footer_icons'][] = array(
					'url' => $this->basic_settings['flickr'],
					'icon' => 'flickr',
					'bg' => 'flickr',
					'delay' => $animation_delay,
				);
			}
			if(!empty($this->basic_settings['instagram'])){
				$animation_delay += 0.3;
				$this->internal_settings['footer_icons'][] = array(
					'url' => $this->basic_settings['instagram'],
					'icon' => 'instagram',
					'bg' => 'instagram',
					'delay' => $animation_delay,
				);
			}
			if(!empty($this->basic_settings['github'])){
				$animation_delay += 0.3;
				$this->internal_settings['footer_icons'][] = array(
					'url' => $this->basic_settings['github'],
					'icon' => 'github',
					'bg' => 'github',
					'delay' => $animation_delay,
				);
			}
			if(!empty($this->basic_settings['linkedin'])){
				$animation_delay += 0.3;
				$this->internal_settings['footer_icons'][] = array(
					'url' => $this->basic_settings['linkedin'],
					'icon' => 'linkedin',
					'bg' => 'linkedin',
					'delay' => $animation_delay,
				);
			}
		}

		/**
		 * Set home icons
		 *
		 * @since 1.0
		 * @access private
		 */
		private function setHomeIcons()
		{
			// Set footer icons list with bg and 
			// Animation delay
			$animation_delay = 0.4;
			$this->internal_settings['home_icons'] = array();
			if(!empty($this->basic_settings['facebook'])){
				$animation_delay += 0.1;
				$this->internal_settings['home_icons'][] = array(
					'url' => $this->basic_settings['facebook'],
					'icon' => 'facebook',
					'bg' => 'facebook',
					'delay' => $animation_delay,
				);
			}
			if(!empty($this->basic_settings['twitter'])){
				$animation_delay += 0.1;
				$this->internal_settings['home_icons'][] = array(
					'url' => $this->basic_settings['twitter'],
					'icon' => 'twitter',
					'bg' => 'twitter',
					'delay' => $animation_delay,
				);
			}
			if(!empty($this->basic_settings['google_plus'])){
				$animation_delay += 0.1;
				$this->internal_settings['home_icons'][] = array(
					'url' => $this->basic_settings['google_plus'],
					'icon' => 'google-plus',
					'bg' => 'google-plus',
					'delay' => $animation_delay,
				);
			}
			if(!empty($this->basic_settings['behance'])){
				$animation_delay += 0.1;
				$this->internal_settings['home_icons'][] = array(
					'url' => $this->basic_settings['behance'],
					'icon' => 'behance',
					'bg' => 'behance',
					'delay' => $animation_delay,
				);
			}
			if(!empty($this->basic_settings['dribbble'])){
				$animation_delay += 0.1;
				$this->internal_settings['home_icons'][] = array(
					'url' => $this->basic_settings['dribbble'],
					'icon' => 'dribbble',
					'bg' => 'dribbble',
					'delay' => $animation_delay,
				);
			}
			if(!empty($this->basic_settings['youtube'])){
				$animation_delay += 0.1;
				$this->internal_settings['home_icons'][] = array(
					'url' => $this->basic_settings['youtube'],
					'icon' => 'youtube',
					'bg' => 'youtube',
					'delay' => $animation_delay,
				);
			}
			if(!empty($this->basic_settings['flickr'])){
				$animation_delay += 0.1;
				$this->internal_settings['home_icons'][] = array(
					'url' => $this->basic_settings['flickr'],
					'icon' => 'flickr',
					'bg' => 'flickr',
					'delay' => $animation_delay,
				);
			}
			if(!empty($this->basic_settings['instagram'])){
				$animation_delay += 0.1;
				$this->internal_settings['home_icons'][] = array(
					'url' => $this->basic_settings['instagram'],
					'icon' => 'instagram',
					'bg' => 'instagram',
					'delay' => $animation_delay,
				);
			}
			if(!empty($this->basic_settings['github'])){
				$animation_delay += 0.1;
				$this->internal_settings['home_icons'][] = array(
					'url' => $this->basic_settings['github'],
					'icon' => 'github',
					'bg' => 'github',
					'delay' => $animation_delay,
				);
			}
			if(!empty($this->basic_settings['linkedin'])){
				$animation_delay += 0.1;
				$this->internal_settings['home_icons'][] = array(
					'url' => $this->basic_settings['linkedin'],
					'icon' => 'linkedin',
					'bg' => 'linkedin',
					'delay' => $animation_delay,
				);
			}
		}

		/**
		 * Merge settings
		 *
		 * @since 1.0
		 * @access private
		 */
		private function mergeSettings()
		{
			$this->all_settings = array_merge($this->basic_settings, $this->template_settings, $this->internal_settings);
		}

		/**
		 * Get option
		 *
		 * @since 1.0
		 * @access public
		 */
		public function getOption($key)
		{
			return ( (isset($this->all_settings[$key])) ? $this->all_settings[$key] : false);
		}
		
		/**
		 * Get menu items for all defined menu locations
		 * 
		 * @since 1.0
		 * @access public
		 */
		public function menuItems($location = 'front')
		{
			$menu_name = ($location == 'front') ? 'genio_front_page_menu' : 'genio_other_pages_menu';
			if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
				$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
				if($menu === false){
					return array();
				}
				$menu_items = wp_get_nav_menu_items($menu->term_id);
				
				if($menu_items === false){
					return array();
				}
				$menu_list = array();
				$menu_items = (array) $menu_items;
				if( (is_array($menu_items)) && (count($menu_items) >= 1) ){
					foreach ( $menu_items as $key => $menu_item ) {
						$title = $menu_item->title;
						$url = $menu_item->url;
						$menu_list[] = array(
							'title' => $title,
							'url' => $url,
							'icon' => 'fa-link',
						);
					}
				}
				return $menu_list;
			}else{
				return array();
			}	
		}

		/**
		 * Get Sections front anchors
		 * 
		 * @since 1.0
		 * @access public
		 */
		public function sectionsAnchors()
		{
			$sections_items = array();

			foreach ($this->all_settings['sections_order'] as $section) {
		
				if( ($section == 'home') && ($this->all_settings['home_s_sim'] == 'yes') ){
					$sections_items[] = array(
						'title' => $this->all_settings['home_s_mt'],
						'url' => '#home',
						'icon' => 'fa-home',
					);
				}
				if( ($section == 'profile') && ($this->all_settings['profile_s_sim'] == 'yes') ){
					$sections_items[] = array(
						'title' => $this->all_settings['profile_s_mt'],
						'url' => '#profile',
						'icon' => $this->all_settings['profile_s_ic'],
					);
				}

				if( ($section == 'hobbies') && ($this->all_settings['hobbies_s_sim'] == 'yes') ){
					$sections_items[] = array(
						'title' => $this->all_settings['hobbies_s_mt'],
						'url' => '#hobbies',
						'icon' => 'fa-link',
					);
				}

				if( ($section == 'resume') && ($this->all_settings['resume_s_sim'] == 'yes') ){
					$sections_items[] = array(
						'title' => $this->all_settings['resume_s_mt'],
						'url' => '#resume',
						'icon' => $this->all_settings['resume_s_res_ic'],
					);
				}
	
				if( ($section == 'milestones') && ($this->all_settings['milesto_s_sim'] == 'yes') ){
					$sections_items[] = array(
						'title' => $this->all_settings['milesto_s_mt'],
						'url' => '#milestones',
						'icon' => 'fa-link',
					);
				}
	
				if( ($section == 'skills') && ($this->all_settings['skills_s_sim'] == 'yes') ){
					$sections_items[] = array(
						'title' => $this->all_settings['skills_s_mt'],
						'url' => '#skills',
						'icon' => $this->all_settings['skills_s_ic'],
					);
				}
		
				if( ($section == 'services') && ($this->all_settings['services_s_sim'] == 'yes') ){
					$sections_items[] = array(
						'title' => $this->all_settings['services_s_mt'],
						'url' => '#services',
						'icon' => $this->all_settings['services_s_ic'],
					);
				}
	
				if( ($section == 'workprocess') && ($this->all_settings['process_s_sim'] == 'yes') ){
					$sections_items[] = array(
						'title' => $this->all_settings['process_s_mt'],
						'url' => '#workprocess',
						'icon' => 'fa-link',
					);
				}
	
				if( ($section == 'blog') && ($this->all_settings['blog_s_sim'] == 'yes') ){
					$sections_items[] = array(
						'title' => $this->all_settings['blog_s_mt'],
						'url' => '#news',
						'icon' => 'fa-link',
					);
				}

				if( ($section == 'portfolio') && ($this->all_settings['portfolio_s_sim'] == 'yes') ){
					$sections_items[] = array(
						'title' => $this->all_settings['portfolio_s_mt'],
						'url' => '#portfolio',
						'icon' => $this->all_settings['portfolio_s_ic'],
					);
				}
	
				if( ($section == 'pricing') && ($this->all_settings['pricing_s_sim'] == 'yes') ){
					$sections_items[] = array(
						'title' => $this->all_settings['pricing_s_mt'],
						'url' => '#pricing',
						'icon' => $this->all_settings['pricing_s_ic'],
					);
				}
	
				if( ($section == 'clients') && ($this->all_settings['clients_s_sim'] == 'yes') ){
					$sections_items[] = array(
						'title' => $this->all_settings['clients_s_mt'],
						'url' => '#clients',
						'icon' => 'fa-link',
					);
				}
	
				if( ($section == 'testimonials') && ($this->all_settings['testimonial_s_sim'] == 'yes') ){
					$sections_items[] = array(
						'title' => $this->all_settings['testimonial_s_mt'],
						'url' => '#testimonials',
						'icon' => 'fa-pencil',
					);
				}
		
				if( ($section == 'contact') && ($this->all_settings['contact_s_sim'] == 'yes') ){
					$sections_items[] = array(
						'title' => $this->all_settings['contact_s_mt'],
						'url' => '#contact',
						'icon' => $this->all_settings['contact_s_ic'],
					);
				}
			}
			return $sections_items;
		}

		/**
		 * Get hobbies items and terms for front section
		 * 
		 * @since 1.0
		 * @access public
		 */
		public function getHobbies()
		{
			$args = array(
				'post_type' => 'gen_hobbies',
				'post_status' => 'publish',
				'posts_per_page' => '5',
				'orderby' => 'rand', 
			);
			$hobbies_data = new WP_Query( $args );
			$hobbies = array();
			if($hobbies_data->have_posts()){
				$animation_delay = 0;
				while ($hobbies_data->have_posts()){
				 	$hobbies_data->the_post();
					$post_id = get_the_ID();
					$hobby_data = get_post_meta( $post_id, 'genio_hobbies_info', true );
					$hobbies[] = array(
						'animation' => $animation_delay,
						'icon' => $hobby_data['icon'],
						'title' => $hobby_data['title'],
						'summary' => $hobby_data['summary'],
					);
					$animation_delay += 0.3;
				}
			}
			wp_reset_postdata();
			return $hobbies;
		}

		/**
		 * Get client items and terms for front section
		 * 
		 * @since 1.0
		 * @access public
		 */
		public function getClients()
		{
			$args = array(
				'post_type' => 'gen_clients',
				'post_status' => 'publish',
				'posts_per_page' => '6',
				'orderby' => 'rand',
			);
			$clients_data = new WP_Query( $args );
			$clients = array();
			if($clients_data->have_posts()){
				$animation_delay = 0;
				while ($clients_data->have_posts()){
				 	$clients_data->the_post();
					$post_id = get_the_ID();
					$client_data = get_post_meta( $post_id, 'genio_client_info', true );
					$clients[] = array(
						'animation' => $animation_delay,
						'url' => $client_data['url'],
						'logo' => $client_data['logo'],
					);
					$animation_delay += 0.3;
				}
			}
			wp_reset_postdata();
			return $clients;
		}

		/**
		 * Get testimonial items and terms for front section
		 * 
		 * @since 1.0
		 * @access public
		 */
		public function getTestimonials()
		{
			$args = array(
				'post_type' => 'gen_testimonials',
				'post_status' => 'publish',
				'posts_per_page' => $this->all_settings['testimonial_s_sh_on'],
				'orderby' => 'rand',
			);
			$testimonials_data = new WP_Query( $args );
			$testimonials = array();
			if($testimonials_data->have_posts()){
				while ($testimonials_data->have_posts()){
				 	$testimonials_data->the_post();
					$post_id = get_the_ID();
					$testimonial_data = get_post_meta( $post_id, 'genio_testimonial_info', true );
					$testimonials[] = array(
						'main' => $testimonial_data['main'],
						'photo' => $testimonial_data['photo'],
						'name' => $testimonial_data['name'],
						'job' => $testimonial_data['job'],
						'company' => $testimonial_data['company'],
					);
				}
			}
			wp_reset_postdata();
			return $testimonials;	
		}

		/**
		 * Get work processes items and terms for front section
		 * 
		 * @since 1.0
		 * @access public
		 */
		public function getProcesses()
		{
			$args = array(
				'post_type' => 'gen_work_process',
				'post_status' => 'publish',
				'posts_per_page' => '25',
				'orderby' => 'rand',
			);
			$processes_data = new WP_Query( $args );
			$processes = array();
			if($processes_data->have_posts()){
				while ($processes_data->have_posts()){
				 	$processes_data->the_post();
					$post_id = get_the_ID();
					$process_data = get_post_meta( $post_id, 'genio_work_process_info', true );
					$processes[$process_data['order']] = array(
						'animation' => ($process_data['order'] == 1) ? 0 :  $process_data['order'] * 0.3,
						'icon' => $process_data['icon'],
						'title' => $process_data['title'],
						'order' => $process_data['order'],
					);
				}
			}
			wp_reset_postdata();
			ksort($processes);
			return $processes;	
		}

		/**
		 * Get pricing items and terms for front section
		 * 
		 * @since 1.0
		 * @access public
		 */
		public function getPricingPlans()
		{
			$args = array(
				'post_type' => 'gen_pricing',
				'post_status' => 'publish',
				'posts_per_page' => '25',
				'orderby' => 'rand',
			);
			$plans_data = new WP_Query( $args );
			$plans = array();
			if($plans_data->have_posts()){
				while ($plans_data->have_posts()){
				 	$plans_data->the_post();
					$post_id = get_the_ID();
					$plan_data = get_post_meta( $post_id, 'genio_pricing_info', true );
					$plans[$plan_data['plan_order']] = array(
						'plan_order' => $plan_data['plan_order'],
						'title' => $plan_data['title'],
						'price' => $plan_data['price'],
						'price_per' => $plan_data['price_per'],
						'currency' => $plan_data['currency'],
						'plan_features' => $plan_data['plan_features'],
						'button_text' => $plan_data['button_text'],
						'button_link' => $plan_data['button_link'],
					);
				}
			}
			wp_reset_postdata();
			return $plans;
		}

		public function getServices()
		{
			$args = array(
				'post_type' => 'gen_services',
				'post_status' => 'publish',
				'posts_per_page' => -1,
			);
			$possibilities = array(1,2,4,6,8,10,12,14,16,18,20,22,24,26,28,30);
			$services_data = new WP_Query( $args );
			$services = array();
			if($services_data->have_posts()){
				$fade_location = 'left';
				while ($services_data->have_posts()){
				 	$services_data->the_post();
					$post_id = get_the_ID();
					$service_data = get_post_meta( $post_id, 'genio_service_info', true );
					$services[] = array(
						'location' => $fade_location,
						'title' => $service_data['title'],
						'icon' => $service_data['icon'],
						'summary' => $service_data['summary'],
					);
					$fade_location = ($fade_location == "right") ? 'left' : 'right';
				}
			}
			if( (count($services) >= 1) && !(in_array(count($services), $possibilities)) ){
				unset($services[count($services)-1]);
			}
			wp_reset_postdata();
			return $services;	
		}

		/**
		 * Get resume items and terms for front section
		 * 
		 * @since 1.0
		 * @access public
		 */
		public function getResume()
		{
			$args = array(
				'post_type' => 'gen_resume',
				'post_status' => 'publish',
				'posts_per_page' => -1,
			);
			$resume_data = new WP_Query( $args );
			$resume = array(
				'education' => array(),
				'experience' => array(),
				'recognition' => array(),
			);
			if($resume_data->have_posts()){
				while ($resume_data->have_posts()){
				 	$resume_data->the_post();
					$post_id = get_the_ID();
					$resumei_data = get_post_meta( $post_id, 'genio_resume_info', true );
					if('education' == $resumei_data['category']){
						$resume['education'][$resumei_data['ed_from']] = array(
							'visibility' => '',
							'ed_from' => $resumei_data['ed_from'],
							'ed_to' => $resumei_data['ed_to'],
							'ed_univ' => $resumei_data['ed_univ'],
							'ed_coun' => $resumei_data['ed_coun'],
							'ed_degree' => $resumei_data['ed_degree'],
							'ed_grade' => $resumei_data['ed_grade'],
							'ed_summ' => $resumei_data['ed_summ'],
						);
					}elseif('experience' == $resumei_data['category']){
						$resume['experience'][$resumei_data['ex_from']] = array(
							'visibility' => '',
							'ex_from' => $resumei_data['ex_from'],
							'ex_to' => $resumei_data['ex_to'],
							'ex_comp' => $resumei_data['ex_comp'],
							'ex_coun' => $resumei_data['ex_coun'],
							'ex_job' => $resumei_data['ex_job'],
							'ex_logo' => $resumei_data['ex_logo'],
							'ex_summ' => $resumei_data['ex_summ'],
						);
					}elseif('recognition' == $resumei_data['category']){
						$resume['recognition'][$resumei_data['re_date']] = array(
							'visibility' => '',
							're_date' => $resumei_data['re_date'],
							're_conf' => $resumei_data['re_conf'],
							're_coun' => $resumei_data['re_coun'],
							're_part' => $resumei_data['re_part'],
							're_icon' => $resumei_data['re_icon'],
							're_summ' => $resumei_data['re_summ'],
						);
					}
				}
			}
			wp_reset_postdata();
			krsort($resume['education']);
			krsort($resume['experience']);
			krsort($resume['recognition']);
			if(count($resume['education']) >= 1){
				$loop = 0;
				foreach ($resume['education'] as $key => $value) {
					if($loop >= 2){
						$resume['education'][$key]['visibility'] = 'hidden';
					}
					$loop += 1;
				}
			}
			if(count($resume['experience']) >= 1){
				$loop = 0;
				foreach ($resume['experience'] as $key => $value) {
					if($loop >= 2){
						$resume['experience'][$key]['visibility'] = 'hidden';
					}
					$loop += 1;
				}
			}
			if(count($resume['recognition']) >= 1){
				$loop = 0;
				foreach ($resume['recognition'] as $key => $value) {
					if($loop >= 2){
						$resume['recognition'][$key]['visibility'] = 'hidden';
					}
					$loop += 1;
				}	
			}
			return $resume;	
		}

		/**
		 * Get skill items and terms for front section
		 * 
		 * @since 1.0
		 * @access public
		 */
		public function getSkills()
		{
			$args = array(
				'post_type' => 'gen_skills',
				'post_status' => 'publish',
				'posts_per_page' => -1,
			);
			$skills_data = new WP_Query( $args );
			$skills = array(
				'terms' => array(),
				'posts' => array(),
				'active' => false,
			);
			if($skills_data->have_posts()){
				while ($skills_data->have_posts()){
				 	$skills_data->the_post();
					$post_id = get_the_ID();
					$skill_data = get_post_meta( $post_id, 'genio_skills_info', true );
					$terms = get_the_terms( $post_id, 'gen_proj_sk_categ' );
					if ( $terms && ! is_wp_error($terms) ) {
						foreach ( $terms as $term ){
							$term_name = $term->name;
							$term_slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $term_name)));
							
							if($skills['active'] === false){
								$skills['active'] = $term_slug;
							}

							$skills['terms'][$term_slug] = $term_name;

							$skills['posts'][$term_slug][$skill_data['display_as']][] = array(
								'title' => $skill_data['title'],
								'display_as' => $skill_data['display_as'],
								'level' => $skill_data['level'],
							);
						}
					}
				}
			}
			//fix categories that has both types 
			if(count($skills['terms']) >= 1){
				foreach ($skills['terms'] as $term_slug => $term_name) {
					if(isset($skills['posts'][$term_slug]['bar']) && isset($skills['posts'][$term_slug]['list_item'])){
						if( count($skills['posts'][$term_slug]['bar']) >= count($skills['posts'][$term_slug]['list_item']) ){
							unset($skills['posts'][$term_slug]['list_item']);
						}else{
							unset($skills['posts'][$term_slug]['bar']);
						}
					}
				}
			}
			//set panels here
			$panels = array();
			$i = 0;
			if( (count($skills['terms']) >= 1) && (count($skills['posts']) >= 1) ){
				//loop through posts
				foreach ($skills['posts'] as $term_slug => $skill_type ) { 
					//if term slug is active mark this panel as active
					$panels[$i]['active'] = ($term_slug == $skills['active']) ? true : false;
					//add term slug to be panel id
					$panels[$i]['id'] = $term_slug;
					//check if panel has bars
					if(isset($skill_type['bar'])){
						//mark panel as for bars
						$panels[$i]['type'] = 'bar';
						$k = 1;
						//loop through panel bars to set types
						foreach ($skill_type['bar'] as $genio_skill_item ) {
							//add first bar with its type
							$panels[$i]['items'][] = array(
								'order' => ($k == 1) ? 'first' : 'second',
								'title' => $genio_skill_item['title'],
								'level' => $genio_skill_item['level'],
							); 
							$k = ($k == 1) ? 2 : 1;
						}
					//panel has list items
					}else{
						//mark panel as for lists
						$panels[$i]['type'] = 'list';
						$h = 1;
						//loop though list items
						foreach ($skill_type['list_item'] as $genio_skill_item ) {
							if($h == 1){
								$order = 'first';
							}elseif($h == 2){
								$order = 'second';
							}else{
								$order = 'third';
							}
							//add list item with its type
							$panels[$i]['items'][] = array(
								'order' => $order,
								'title' => $genio_skill_item['title'],
							); 
							if($h == 1){
								$h = 2;
							}elseif($h == 2){
								$h = 3;
							}else{
								$h = 1;
							}
						}
					}
						$i += 1;
				}
			}

			wp_reset_postdata();
			return array(
				'terms' => $skills['terms'],
				'panels' => $panels,
				'active' => $skills['active'],
			);
		}
		
		/**
		 * Get portfolio items and terms for front section
		 * 
		 * @since 1.0
		 * @access public
		 */
		public function getPortfolio()
		{
			$args = array(
				'post_type' => 'gen_project',
				'post_status' => 'publish',
				'posts_per_page' => -1,
			);
			$projects_data = new WP_Query( $args );
			$projects = array(
				'terms' => array(),
				'posts' => array(),
				'lazyload' => false, 
			);
			$show_limit = $this->all_settings['portfolio_s_sh_on'];
			$class = 'portfolio-item';
			if($projects_data->have_posts()){
				while ($projects_data->have_posts()){ 
					$projects_data->the_post();
					$post_id = get_the_ID();
					$project_data = get_post_meta( $post_id, 'genio_project_info', true );
					$terms = get_the_terms( $post_id, 'gen_proj_sk_categ' );
					if ( $terms && ! is_wp_error($terms) ) {
						$project_terms = array();
						foreach ( $terms as $term ){
							$term_name = $term->name;
							$term_slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $term_name)));

							$projects['terms'][$term_slug] = $term_name;
							$project_terms[$term_slug] = $term_name;

						}
						if(has_post_thumbnail()){
							$thumb_id = get_post_thumbnail_id();
							$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'full', true);
							$thumb_url = $thumb_url_array[0];
						}else{
							$thumb_url = '';
						}
						$projects['posts'][] = array(
                  				'class' => $class,
                  				'title' => get_the_title(),
                  				'link' => get_permalink(),
                  				'thumbnail' => $thumb_url, 
                  				'full_img' => $thumb_url,
                  				'terms' => array_values($project_terms),
                  				'terms_slugs' => array_keys($project_terms),
						);
						if($show_limit != 'all'){
     							$show_limit = (integer) $show_limit;
     							if($show_limit <= 1){
     								$class = 'hidden';
     								$projects['lazyload'] = true;
     							}
     							$show_limit = $show_limit - 1;
						}
					}
				}
			}

			wp_reset_postdata();
			return $projects;
		}

		/**
		 * Get all project page data
		 *
		 * @since 1.0
		 * @return array
		 */
		public function getProject()
		{
			$project = array(
				//'title' => '',
				//'content' => '',
                  	'full_img' => '',
                  	'terms' => '',
                  	'terms_ids' => '',
        			'header_img' => '',
        			'client' => '',
        			'role' => '',
        			'date' => '',
        			'link_text' => '',
        			'link' => '',
        			'tes' => '',
        			'tes_by' => '',
        			'next_item' => false,
        			'previous_item' => false,
        			'portfolio_url' => '',
        			'related_projects' => array(),
			);
			
			if( !('posts' == get_option('show_on_front')) && ($this->all_settings['portfolio_s_s']) ){
				$project['portfolio_url'] = home_url('/#portfolio');
			}

			$previous = get_adjacent_post( false, '', true, 'gen_proj_sk_categ' );
			$next     = get_adjacent_post( false, '', false, 'gen_proj_sk_categ' );
			$project['next_item'] = (!$next) ? false : true;
			$project['previous_item'] = (!$previous) ? false : true;

			$project_id = get_the_ID();
			$project_data = get_post_meta( $project_id, 'genio_project_info', true );
			$project_terms = get_the_terms( $project_id, 'gen_proj_sk_categ' );
			
			if(has_post_thumbnail()){
				$thumb_id = get_post_thumbnail_id();
				$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'full', true);
				$thumb_url = $thumb_url_array[0];
			}else{
				$thumb_url = '';
			}
			$project['full_img'] = $thumb_url;

			if ( $project_terms && !is_wp_error($project_terms) ) {
				foreach ( $project_terms as $project_term ){
					$term_name = $project_term->name;
					$term_slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $term_name)));
					$project['terms'][$term_slug] = $term_name;
					$project['terms_ids'][] = $project_term->term_id;
				}
			}

			$project['header_img'] = $project_data['header_img'];
        		$project['client'] = $project_data['client'];
        		$project['role'] = $project_data['role'];
        		$project['date'] = $project_data['date'];
        		$project['link_text'] = $project_data['link_text'];
        		$project['link'] = $project_data['link'];
        		$project['tes'] = $project_data['tes'];
        		$project['tes_by'] = $project_data['tes_by'];

			$args = array(
				'post_type' => 'gen_project',
				'post_status' => 'publish',
				'posts_per_page' => 4,
                		'post__not_in' => array( $project_id ),
                		'orderby' => 'rand',
			);
			$related_projects_data = new WP_Query( $args );
			$related_projects = array();

			if($related_projects_data->have_posts()){
				while ($related_projects_data->have_posts()){ 
					$related_projects_data->the_post();
					$related_project_id = get_the_ID();
					$related_project_data = get_post_meta( $related_project_id, 'genio_project_info', true );
					$related_project_terms = get_the_terms( $related_project_id, 'gen_proj_sk_categ' );
					if ( $related_project_terms && ! is_wp_error($related_project_terms) ) {
						$related_project_terms_arr = array();
						foreach ( $related_project_terms as $term ){
							$term_name = $term->name;
							$term_slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $term_name)));
							$related_project_terms_arr[$term_slug] = $term_name;
						}
						if(has_post_thumbnail()){
							$thumb_id = get_post_thumbnail_id();
							$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'full', true);
							$thumb_url = $thumb_url_array[0];
						}else{
							$thumb_url = '';
						}
						$related_projects[] = array(
                  				'title' => get_the_title(),
                  				'link' => get_permalink(),
                  				'thumbnail' => $thumb_url, 
                  				'full_img' => $thumb_url,
                  				'terms' => array_values($related_project_terms_arr),
                  				'terms_slugs' => array_keys($related_project_terms_arr),
						);
					}
				}
			}
			wp_reset_postdata();

			$project['related_projects'] = $related_projects;

        		return $project;

		}

		/**
		 * Get dummy basic settings
		 * 
		 * Used in case of theme preview before activation 
		 * 
		 * @since 1.0
		 * @access private
		 */
		private function getDumpBasicSettings()
		{
			$basic_settings = array(
				'dummy' => true,
				'templates' => array(
					'default' => 'Default',
				),
				'template'=> 'default',
				'logo' => '',
				'favicon' => get_template_directory_uri() . '/media/images/favicon.png',
				'header_display' => 'site_title',
				'skin' => 'blue',
				'headings_font' => '',
				'main_font' => '',
				'serif_font' => '',
				'custom_styles' => '',
				'blog_header' => get_template_directory_uri() . '/media/images/backgrounds/blog.jpg',
				'404_header' => get_template_directory_uri() . '/media/images/backgrounds/blog.jpg',
				'archive_header' => get_template_directory_uri() . '/media/images/backgrounds/blog.jpg',
				'search_header' =>  get_template_directory_uri() . '/media/images/backgrounds/blog.jpg',
				'post_header' => get_template_directory_uri() . '/media/images/backgrounds/blog.jpg',
				'page_header' => get_template_directory_uri() . '/media/images/backgrounds/blog.jpg',
				'custom_scripts' => '',
				'copyright' => '',
				'facebook' => '',
				'twitter' => 'https://twitter.com',
				'google_plus' => 'https://plus.google.com',
				'behance' => 'https://www.behance.net',
				'dribbble' => 'https://dribbble.com',
				'youtube' => '',
				'flickr' => '',
				'instagram' => '',
				'github' => 'https://github.com',
				'linkedin' => '',
			);
			return $basic_settings;
		}

		/**
		 * Get dummy template settings
		 * 
		 * Used in case of theme preview before activation 
		 * 
		 * @since 1.0
		 * @access private
		 */
		private function getDumpTemplateSettings()
		{
			$template_settings = array(
				'dummy' => true,
				'sections_order' => array(
					'home',
					'nav',
					'profile',
					'hobbies',
					'resume',
					'milestones',
					'skills',
					'services',
					'workprocess',
					'portfolio',
					'pricing',
					'clients',
					'blog',
					'testimonials',
					'contact',
				),

				'home_s_mt' => 'Home',
				'home_s_sim' => 'yes',
				'home_s_s' => 'yes',
				'home_s_hs' => 'gradient',
				'home_s_bg' => get_template_directory_uri() . '/media/images/backgrounds/06.jpg',
				'home_s_img' => get_template_directory_uri() . '/media/images/photo-4.jpg',
				'home_s_n' => 'Patt Miller',
				'home_s_jt' => 'Designer / Developer',

				'nav_s_s' => 'yes',

				'profile_s_mt' => 'Profile',
				'profile_s_sim' => 'yes',
				'profile_s_s' => 'yes',
				'profile_s_ic' => 'fa-user',
				'profile_s_tit' => 'Profile',
				'profile_s_slog' => 'My Personal Info',
				'profile_s_desc' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer.',
				'profile_s_sto_tit' => 'My Story',
				'profile_s_sto_mai' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer.',
				'profile_s_sign' => get_template_directory_uri() . '/media/images/signature.png',
				'profile_s_phot' => get_template_directory_uri() . '/media/images/photo-4.jpg',
				'profile_s_cv' => 'https://www.dropbox.com/',
				'profile_s_inf_tit' => 'Personal Info',
				'profile_s_yo_nam' => 'Patt Miller Doe',
				'profile_s_yo_age' => '23 Years Old',
				'profile_s_yo_phon' => '+123-456-7890',
				'profile_s_yo_emai' => 'hello@site.com',
				'profile_s_yo_addrs' => '1732 Monroe Street Houston, TX 77055',


				'hobbies_s_mt' => 'Hobbies',
				'hobbies_s_sim' => 'no',
				'hobbies_s_s' => 'yes',
				'hobbies_s_tit' => 'My Hobbies',
				'hobbies_s_slog' => 'Work Hard, Party Harder',
				'hobbies_s_bg' => get_template_directory_uri() . '/media/images/backgrounds/03.jpg',

	
				'resume_s_mt' => 'Resume',
				'resume_s_sim' => 'yes',
				'resume_s_s' => 'yes',
				'resume_s_res_ic' => 'fa-book',
				'resume_s_tit' => 'Resume',
				'resume_s_slog' => 'Know Who I am',
				'resume_s_desc' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer.',
				'resume_s_ed_ic' => 'fa-graduation-cap',
				'resume_s_ed_tit' => 'Education',
				'resume_s_ex_ic' => 'fa-flask',
				'resume_s_ex_tit' => 'Experience',
				'resume_s_rec_ic' => 'fa-globe',
				'resume_s_rec_tit' => 'Recognition',
		
				'milesto_s_mt' => 'Milestones',
				'milesto_s_sim' => 'no',
				'milesto_s_s' => 'yes',
				'milesto_fi_ic' => 'fa-users',
				'milesto_fi_tit' => 'Happy Clients',
				'milesto_fi_cou' => '1200',
				'milesto_se_ic' => 'fa-briefcase',
				'milesto_se_tit' => 'Projects Finished',
				'milesto_se_cou' => '1500',
				'milesto_th_ic' => 'fa-clock-o',
				'milesto_th_tit' => 'Years Of Experience',
				'milesto_th_cou' => '10',
				'milesto_fo_ic' => 'fa-code',
				'milesto_fo_tit' => 'Lines Of Code',
				'milesto_fo_cou' => '30M',
	
				'skills_s_mt' => 'Skills',
				'skills_s_sim' => 'yes',
				'skills_s_ic' => 'fa-pie-chart',
				'skills_s_s' => 'yes',
				'skills_s_tit' => 'Skills',
				'skills_s_slog' => 'How Good I am',
				'skills_s_desc' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer.',


				'services_s_mt' => 'Services',
				'services_s_sim' => 'yes',
				'services_s_ic' => 'fa-cog',
				'services_s_s' => 'yes',
				'services_s_tit' => 'Services',
				'services_s_slog' => 'What My Clients Get',
				'services_s_desc' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer.',
			
			
				'process_s_mt' => 'Process',
				'process_s_sim' => 'no',
				'process_s_s' => 'yes',
				'process_s_bg' => get_template_directory_uri() . '/media/images/backgrounds/04.jpg',
				'process_s_tit' => 'Work Process',
				'process_s_slog' => 'How i work in my projects',
	
				'blog_s_mt' => 'Blog',
				'blog_s_sim' => 'yes',
				'blog_s_s' => 'no',
				'blog_s_tit' => 'My Blog',
				'blog_s_slog' => 'All about my latest achievements',
				'blog_s_sh_on' => '3',
				'blog_s_lin_tex' => 'Visit My Blog',

				'portfolio_s_mt' => 'Portfolio',
				'portfolio_s_sim' => 'yes',
				'portfolio_s_s' => 'yes',
				'portfolio_s_ic' => 'fa-briefcase',
				'portfolio_s_tit' => 'Work',
				'portfolio_s_slog' => 'Recent Projects',
				'portfolio_s_desc' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer.',
				'portfolio_s_sh_on' => '10',
				'portfolio_s_lin_tex' => 'Show More Items',


				'pricing_s_mt' => 'Pricing',
				'pricing_s_sim' => 'yes',
				'pricing_s_s' => 'yes',
				'pricing_s_ic' => 'fa-dollar',
				'pricing_s_tit' => 'Pricing',
				'pricing_s_slog' => 'Choose Your Package',
				'pricing_s_desc' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer.',


				'clients_s_mt' => 'Clients',
				'clients_s_sim' => 'no',
				'clients_s_s' => 'yes',
				'clients_s_tit' => 'Famous Clients',
				'clients_s_slog' => 'Names you definitly know',
		
				'testimonial_s_mt' => 'Testimonials',
				'testimonial_s_sim' => 'yes',
				'testimonial_s_s' => 'yes',
				'testimonial_s_bg' => get_template_directory_uri() . '/media/images/backgrounds/01.jpg',
				'testimonial_s_sh_on' => '15',

				'contact_s_mt' => 'Contact',
				'contact_s_sim' => 'yes',
				'contact_s_s' => 'yes',
				'contact_s_ic' => 'fa-envelope',
				'contact_s_tit' => 'Contact',
				'contact_s_slog' => 'Get In Touch With Me',
				'contact_s_desc' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer.',
				'contact_s_scf' => 'yes',
				'contact_s_cem' => '',
				'contact_s_shf' => 'yes',
				'contact_s_hem' => '',
			);
			return $template_settings;
		}
	}
}

/**
 * An instance of genio core class
 *
 * @since 1.0
 */
$Genio_Wt_Core = new GENIO_WT_OPTIONS();
$Genio_Wt_Core->run();