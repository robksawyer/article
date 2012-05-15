<?php	 
App::uses('AppHelper', 'View/Helper');
/** 
 * Geography Helper 
 * 
 * Code by Mike O'Toole 
 * with inspiration from Jesse Kochis 
 * 
 * 
 * @version			 0.1 
 * @author			Mike O'Toole <mike.otoole at gmail dot com> 
 * @copyright			Copyright 2006, Mike O'Toole 
 * @license			 http://www.opensource.org/licenses/mit-license.php The MIT License 
 * @created			 01.11.2006 
 * @updated			 01.11.2006 
 * @note				 country list, in terms of countries included, spellings, and abbreviations used is still under review, feedback is appreciated
 */  

class GeographyHelper extends AppHelper { 
	
	public $helpers = array('Html','Form');
	
	/** 
	 * Associative array of state abbreviations and state names 
	 * 
	 * @var array 
	 * @access public 
	 */  
	 public $states = array('AL'=>"Alabama", 'AK'=>"Alaska", 'AZ'=>"Arizona", 'AR'=>"Arkansas", 'CA'=>"California", 'CO'=>"Colorado", 'CT'=>"Connecticut", 'DE'=>"Delaware", 'DC'=>"District Of Columbia", 'FL'=>"Florida", 'GA'=>"Georgia", 'HI'=>"Hawaii", 'ID'=>"Idaho", 'IL'=>"Illinois", 'IN'=>"Indiana", 'IA'=>"Iowa", 'KS'=>"Kansas", 'KY'=>"Kentucky", 'LA'=>"Louisiana", 'ME'=>"Maine", 'MD'=>"Maryland", 'MA'=>"Massachusetts", 'MI'=>"Michigan", 'MN'=>"Minnesota", 'MS'=>"Mississippi", 'MO'=>"Missouri", 'MT'=>"Montana", 'NE'=>"Nebraska", 'NV'=>"Nevada", 'NH'=>"New Hampshire", 'NJ'=>"New Jersey", 'NM'=>"New Mexico", 'NY'=>"New York", 'NC'=>"North Carolina", 'ND'=>"North Dakota", 'OH'=>"Ohio", 'OK'=>"Oklahoma", 'OR'=>"Oregon", 'PA'=>"Pennsylvania", 'RI'=>"Rhode Island", 'SC'=>"South Carolina", 'SD'=>"South Dakota", 'TN'=>"Tennessee", 'TX'=>"Texas", 'UT'=>"Utah", 'VT'=>"Vermont", 'VA'=>"Virginia", 'WA'=>"Washington", 'WV'=>"West Virginia", 'WI'=>"Wisconsin", 'WY'=>"Wyoming");
	
	/** 
	 * Associative array of 2-letter country abbreviations and country names 
	 * 
	 * @var array 
	 * @access public 
	 */  
	public $countries = array(
		'AF'=>'Afghanistan', 
		'AX'=>'Åland Islands', 
		'AL'=>'Albania', 
		'DZ'=>'Algeria', 
		'AS'=>'American Samoa', 
		'AD'=>'Andorra', 
		'AO'=>'Angola', 
		'AI'=>'Anguilla', 
		'AQ'=>'Antarctica', 
		'AG'=>'Antigua and Barbuda', 
		'AR'=>'Argentina', 
		'AM'=>'Armenia', 
		'AW'=>'Aruba', 
		'AU'=>'Australia', 
		'AT'=>'Austria', 
		'AZ'=>'Azerbaijan', 
		'BS'=>'Bahamas', 
		'BH'=>'Bahrain', 
		'BD'=>'Bangladesh', 
		'BB'=>'Barbados', 
		'BY'=>'Belarus', 
		'BE'=>'Belgium', 
		'BZ'=>'Belize', 
		'BJ'=>'Benin', 
		'BM'=>'Bermuda', 
		'BT'=>'Bhutan', 
		'BO'=>'Bolivia', 
		'BA'=>'Bosnia and Herzegovina', 
		'BW'=>'Botswana', 
		'BV'=>'Bouvet Island', 
		'BR'=>'Brazil', 
		'IO'=>'British Indian Ocean Territory', 
		'BN'=>'Brunei Darussalam', 
		'BG'=>'Bulgaria', 
		'BF'=>'Burkina Faso', 
		'BI'=>'Burundi', 
		'KH'=>'Cambodia', 
		'CM'=>'Cameroon', 
		'CA'=>'Canada', 
		'CV'=>'Cape Verde', 
		'KY'=>'Cayman Islands', 
		'CF'=>'Central African Republic', 
		'TD'=>'Chad', 
		'CL'=>'Chile', 
		'CN'=>'China', 
		'CX'=>'Christmas Island', 
		'CC'=>'Cocos (Keeling) Islands', 
		'CO'=>'Colombia', 
		'KM'=>'Comoros', 
		'CG'=>'Congo', 
		'CD'=>'Congo, the Democratic Republic of the', 
		'CK'=>'Cook Islands', 
		'CR'=>'Costa Rica', 
		'CI'=>'Côte d\'Ivoire', 
		'HR'=>'Croatia', 
		'CU'=>'Cuba', 
		'CY'=>'Cyprus', 
		'CZ'=>'Czech Republic', 
		'DK'=>'Denmark', 
		'DJ'=>'Djibouti', 
		'DM'=>'Dominica', 
		'DO'=>'Dominican Republic', 
		'EC'=>'Ecuador', 
		'EG'=>'Egypt', 
		'SV'=>'El Salvador', 
		'GQ'=>'Equatorial Guinea', 
		'ER'=>'Eritrea', 
		'EE'=>'Estonia', 
		'ET'=>'Ethiopia', 
		'FK'=>'Falkland Islands (Malvinas)', 
		'FO'=>'Faroe Islands', 
		'FJ'=>'Fiji', 
		'FI'=>'Finland', 
		'FR'=>'France', 
		'GF'=>'French Guiana', 
		'PF'=>'French Polynesia', 
		'TF'=>'French Southern Territories', 
		'GA'=>'Gabon', 
		'GM'=>'Gambia', 
		'GE'=>'Georgia', 
		'DE'=>'Germany', 
		'GH'=>'Ghana', 
		'GI'=>'Gibraltar', 
		'GR'=>'Greece', 
		'GL'=>'Greenland', 
		'GD'=>'Grenada', 
		'GP'=>'Guadeloupe', 
		'GU'=>'Guam', 
		'GT'=>'Guatemala', 
		'GG'=>'Guernsey', 
		'GN'=>'Guinea', 
		'GW'=>'Guinea-Bissau', 
		'GY'=>'Guyana', 
		'HT'=>'Haiti', 
		'HM'=>'Heard Island and McDonald Islands', 
		'VA'=>'Holy See (Vatican City State)', 
		'HN'=>'Honduras', 
		'HK'=>'Hong Kong', 
		'HU'=>'Hungary', 
		'IS'=>'Iceland', 
		'IN'=>'India', 
		'ID'=>'Indonesia', 
		'IR'=>'Iran, Islamic Republic of', 
		'IQ'=>'Iraq', 
		'IE'=>'Ireland', 
		'IM'=>'Isle of Man', 
		'IL'=>'Israel', 
		'IT'=>'Italy', 
		'JM'=>'Jamaica', 
		'JP'=>'Japan', 
		'JE'=>'Jersey', 
		'JO'=>'Jordan', 
		'KZ'=>'Kazakhstan', 
		'KE'=>'Kenya', 
		'KI'=>'Kiribati', 
		'KP'=>'Korea, Democratic People\'s Republic of', 
		'KR'=>'Korea, Republic of', 
		'KW'=>'Kuwait', 
		'KG'=>'Kyrgyzstan', 
		'LA'=>'Lao People\'s Democratic Republic', 
		'LV'=>'Latvia', 
		'LB'=>'Lebanon', 
		'LS'=>'Lesotho', 
		'LR'=>'Liberia', 
		'LY'=>'Libyan Arab Jamahiriya', 
		'LI'=>'Liechtenstein', 
		'LT'=>'Lithuania', 
		'LU'=>'Luxembourg', 
		'MO'=>'Macao', 
		'MK'=>'Macedonia, the former Yugoslav Republic of', 
		'MG'=>'Madagascar', 
		'MW'=>'Malawi', 
		'MY'=>'Malaysia', 
		'MV'=>'Maldives', 
		'ML'=>'Mali', 
		'MT'=>'Malta', 
		'MH'=>'Marshall Islands', 
		'MQ'=>'Martinique', 
		'MR'=>'Mauritania', 
		'MU'=>'Mauritius', 
		'YT'=>'Mayotte', 
		'MX'=>'Mexico', 
		'FM'=>'Micronesia, Federated States of', 
		'MD'=>'Moldova, Republic of', 
		'MC'=>'Monaco', 
		'MN'=>'Mongolia', 
		'ME'=>'Montenegro', 
		'MS'=>'Montserrat', 
		'MA'=>'Morocco', 
		'MZ'=>'Mozambique', 
		'MM'=>'Myanmar', 
		'NA'=>'Namibia', 
		'NR'=>'Nauru', 
		'NP'=>'Nepal', 
		'NL'=>'Netherlands', 
		'AN'=>'Netherlands Antilles', 
		'NC'=>'New Caledonia', 
		'NZ'=>'New Zealand', 
		'NI'=>'Nicaragua', 
		'NE'=>'Niger', 
		'NG'=>'Nigeria', 
		'NU'=>'Niue', 
		'NF'=>'Norfolk Island', 
		'MP'=>'Northern Mariana Islands', 
		'NO'=>'Norway', 
		'OM'=>'Oman', 
		'PK'=>'Pakistan', 
		'PW'=>'Palau', 
		'PS'=>'Palestinian Territory, Occupied', 
		'PA'=>'Panama', 
		'PG'=>'Papua New Guinea', 
		'PY'=>'Paraguay', 
		'PE'=>'Peru', 
		'PH'=>'Philippines', 
		'PN'=>'Pitcairn', 
		'PL'=>'Poland', 
		'PT'=>'Portugal', 
		'PR'=>'Puerto Rico', 
		'QA'=>'Qatar', 
		'RE'=>'Réunion', 
		'RO'=>'Romania', 
		'RU'=>'Russian Federation', 
		'RW'=>'Rwanda', 
		'SH'=>'Saint Helena', 
		'KN'=>'Saint Kitts and Nevis', 
		'LC'=>'Saint Lucia', 
		'PM'=>'Saint Pierre and Miquelon', 
		'VC'=>'Saint Vincent and the Grenadines', 
		'WS'=>'Samoa', 
		'SM'=>'San Marino', 
		'ST'=>'Sao Tome and Principe', 
		'SA'=>'Saudi Arabia', 
		'SN'=>'Senegal', 
		'RS'=>'Serbia', 
		'SC'=>'Seychelles', 
		'SL'=>'Sierra Leone', 
		'SG'=>'Singapore', 
		'SK'=>'Slovakia', 
		'SI'=>'Slovenia', 
		'SB'=>'Solomon Islands', 
		'SO'=>'Somalia', 
		'ZA'=>'South Africa', 
		'GS'=>'South Georgia and the South Sandwich Islands', 
		'ES'=>'Spain', 
		'LK'=>'Sri Lanka', 
		'SD'=>'Sudan', 
		'SR'=>'Suriname', 
		'SJ'=>'Svalbard and Jan Mayen', 
		'SZ'=>'Swaziland', 
		'SE'=>'Sweden', 
		'CH'=>'Switzerland', 
		'SY'=>'Syrian Arab Republic', 
		'TW'=>'Taiwan, Province of China', 
		'TJ'=>'Tajikistan', 
		'TZ'=>'Tanzania, United Republic of', 
		'TH'=>'Thailand', 
		'TL'=>'Timor-Leste', 
		'TG'=>'Togo', 
		'TK'=>'Tokelau', 
		'TO'=>'Tonga', 
		'TT'=>'Trinidad and Tobago', 
		'TN'=>'Tunisia', 
		'TR'=>'Turkey', 
		'TM'=>'Turkmenistan', 
		'TC'=>'Turks and Caicos Islands', 
		'TV'=>'Tuvalu', 
		'UG'=>'Uganda', 
		'UA'=>'Ukraine', 
		'AE'=>'United Arab Emirates', 
		'GB'=>'United Kingdom', 
		'US'=>'United States', 
		'UM'=>'United States Minor Outlying Islands', 
		'UY'=>'Uruguay', 
		'UZ'=>'Uzbekistan', 
		'VU'=>'Vanuatu', 
		'VE'=>'Venezuela', 
		'VN'=>'Viet Nam', 
		'VG'=>'Virgin Islands, British', 
		'VI'=>'Virgin Islands, U.S.', 
		'WF'=>'Wallis and Futuna', 
		'EH'=>'Western Sahara', 
		'YE'=>'Yemen', 
		'ZM'=>'Zambia', 
		'ZW'=>'Zimbabwe' 
		);
	  
	 /** 
	  * Returns a string containing a two letter state name abbreviation. If no abbreviation matches the state name, the name is returned.
	  * 
	  * @param int $stateName the full name of a US State 
	  * @param array $customList an associative array with the abbreviations as the key and full names as the value,
	  *					  for adding, editing, or removing states 
							ie array('QC' => 'Quebec','MA' => 'Massachusett', 'NJ' => '') would add Quebec to the return possibilities, 
							change Massachusetts to Massachusett, and eliminate New Jersey from the return possibilities.
	  * @return string two letter abbreviation for the given state	 
	  */ 
	 function stateAbbrev($stateName, $customList = array()) { 
		  $states = $this->_array_trim(am($this->states, $customList)); 
			
		  if($abbr = array_search($stateName, $states)) 
		  { 
				return $abbr; 
		  } 
		  return $stateName; 
	 } 
	  
	  
	 /** 
	  * Returns a string containing a full state name. If no state matches the abbreviation, the abbreviation is returned.
	  * 
	  * @param int $abbr the two letter state abbreviation 
	  * @param array $customList an associative array with the abbreviations as the key and full names as the value,
	  *					  for adding, editing, or removing states 
							ie array('QC' => 'Quebec','MA' => 'Massachusett', 'NJ' => '') would add Quebec to the return possibilities, 
							change Massachusetts to Massachusett, and eliminate New Jersey from the return possibilities.
	  * @return string the full name of a state 
	  */ 
	 function stateFull($abbr, $customList = array()) { 
		  $states = $this->_array_trim(am($this->states, $customList)); 
			
		  if(isset($states[$abbr])) 
		  { 
				return $states[$abbr]; 
		  } 
		  return $abbr; 
	 } 
	  
	 /** 
	  * Returns an associative array with state abbreviations as the key and full state names as the value
	  *		  Convenient for use with the form helper select function 
	  * 
	  * @param array $customList an associative array with the abbreviations as the key and full names as the value,
	  *					  for adding, editing, or removing states 
							ie array('QC' => 'Quebec','MA' => 'Massachusett', 'NJ' => '') would add Quebec to the return possibilities, 
							change Massachusetts to Massachusett, and eliminate New Jersey from the return possibilities.
	  * @return array key as state abbreviation, value as state name 
	  */ 
	 function stateList($customList = array()) { 
		  $states = $this->_array_trim(am($this->states, $customList)); 
		  ksort($states); 
		  return $states; 
	 } 
	  
	 /** 
	  * Returns an associative array with two letter country abbreviations as the key and full country names as the value
	  *		  Convenient for use with the form helper select function 
	  * 
	  * @param array $customList an associative array with the abbreviations as the key and full names as the value,
	  *					  for adding, editing, or removing countries 
							ie array('QC' => 'Quebec','US' => 'USA', 'AL' => '') would add Quebec to the return possibilities, 
							change United States of America to USA, and eliminate Albania from the return possibilities.
	  * @return array key as country abbreviation, value as country name 
	  */ 
	 function countryList($customList = array()) { 
		  $countries = $this->_array_trim(am($this->countries, $customList)); 
		  ksort($countries); 
		  return $countries; 
	 } 
	  
	  
	 /** 
	  * Returns a latitude string in the format 42&deg;21'29" N 
	  * 
	  * @param int $val latitude in decimal form (42.358) 
	  * @return string formatted latitude (42&deg;21'29" N) 
	  */ 
	 function formatLatitude($val) { 
		  $formatVal = $this->_formatLonLat($val); 
	  
		  if($val < 0)	{ 
				$dir = "S"; 
		  } else  { 
				$dir = "N"; 
		  }
		  return $formatVal.' '.$dir; 
	 } 
	  
	 /** 
	  * Returns a longitude string in the format 71&deg;03'36" W 
	  * 
	  * @param int $val longitude in decimal form (-71.06) 
	  * @return string formatted longitude (71&deg;03'36" W) 
	  */ 
	 function formatLongitude($val) { 
		  $formatVal = $this->_formatLonLat($val); 
			
		  if($val < 0) { 
				$dir = "W"; 
		  } 
		  elseif($val > 0) { 
				$dir = "E"; 
		  } 
	  
		  return $formatVal.' '.$dir; 
	 } 
	  
	 /*Private method used to format both latitude and longitude from decimal to degrees*/ 
	 function _formatLonLat($val) { 
		  $deg = floor(abs($val)); 
		  $tempm = (abs($val)-$deg)*100; 
		  $min = $tempm*.6; 
		  $temps = round(($min-floor($min))*100); 
		  $min = floor($min); 
		  $sec = round(.6*$temps); 
			
		  if ($min < 10)	
		  { 
				$min = '0'.$min; 
		  } 
		  if ($sec < 10)	
		  { 
				$sec = '0'.$sec; 
		  } 
			
		  return "$deg&deg;$min'$sec\""; 
	 } 
	  
	 /*Private method used to eliminate empty entries from the array*/ 
	 function _array_trim($a) {
		  $b = array();  
		  foreach ($a as $key => $val)  
		  {  
				if (!empty($a[$key]))  
				{	
					 $b[$key] = $val;	 
				}	
		  } 
		  return $b;  
	 } 
} 

