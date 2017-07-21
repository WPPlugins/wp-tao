<?php
/**
 * This file is automatically @generated by {@link BuildMetadataPHPFromXml}.
 * Please don't modify it directly.
 */


return array (
  'generalDesc' => 
  array (
    'NationalNumberPattern' => '[2-9]\\d{5}',
    'PossibleNumberPattern' => '\\d{6}',
  ),
  'fixedLine' => 
  array (
    'NationalNumberPattern' => '
          (?:
            20|
            [3-4]\\d|
            8[19]
          )\\d{4}
        ',
    'PossibleNumberPattern' => '\\d{6}',
    'ExampleNumber' => '201234',
  ),
  'mobile' => 
  array (
    'NationalNumberPattern' => '
          (?:
            [27][1-9]|
            5\\d
          )\\d{4}
        ',
    'PossibleNumberPattern' => '\\d{6}',
    'ExampleNumber' => '211234',
  ),
  'tollFree' => 
  array (
    'NationalNumberPattern' => '80[257-9]\\d{3}',
    'PossibleNumberPattern' => '\\d{6}',
    'ExampleNumber' => '802123',
  ),
  'premiumRate' => 
  array (
    'NationalNumberPattern' => '
          90(?:
            [1345][15-7]|
            2[125-7]|
            99
          )\\d{2}
        ',
    'PossibleNumberPattern' => '\\d{6}',
    'ExampleNumber' => '901123',
  ),
  'sharedCost' => 
  array (
    'NationalNumberPattern' => 'NA',
    'PossibleNumberPattern' => 'NA',
  ),
  'personalNumber' => 
  array (
    'NationalNumberPattern' => 'NA',
    'PossibleNumberPattern' => 'NA',
  ),
  'voip' => 
  array (
    'NationalNumberPattern' => '
          (?:
            6[0-36]|
            88
          )\\d{4}
        ',
    'PossibleNumberPattern' => '\\d{6}',
    'ExampleNumber' => '601234',
  ),
  'pager' => 
  array (
    'NationalNumberPattern' => 'NA',
    'PossibleNumberPattern' => 'NA',
  ),
  'uan' => 
  array (
    'NationalNumberPattern' => 'NA',
    'PossibleNumberPattern' => 'NA',
  ),
  'emergency' => 
  array (
    'NationalNumberPattern' => 'NA',
    'PossibleNumberPattern' => 'NA',
  ),
  'voicemail' => 
  array (
    'NationalNumberPattern' => 'NA',
    'PossibleNumberPattern' => 'NA',
  ),
  'shortCode' => 
  array (
    'NationalNumberPattern' => 'NA',
    'PossibleNumberPattern' => 'NA',
  ),
  'standardRate' => 
  array (
    'NationalNumberPattern' => 'NA',
    'PossibleNumberPattern' => 'NA',
  ),
  'carrierSpecific' => 
  array (
    'NationalNumberPattern' => 'NA',
    'PossibleNumberPattern' => 'NA',
  ),
  'noInternationalDialling' => 
  array (
    'NationalNumberPattern' => 'NA',
    'PossibleNumberPattern' => 'NA',
  ),
  'id' => 'FO',
  'countryCode' => 298,
  'internationalPrefix' => '00',
  'nationalPrefixForParsing' => '(10(?:01|[12]0|88))',
  'sameMobileAndFixedLinePattern' => false,
  'numberFormat' => 
  array (
    0 => 
    array (
      'pattern' => '(\\d{6})',
      'format' => '$1',
      'leadingDigitsPatterns' => 
      array (
      ),
      'nationalPrefixFormattingRule' => '',
      'domesticCarrierCodeFormattingRule' => '$CC $1',
    ),
  ),
  'intlNumberFormat' => 
  array (
  ),
  'mainCountryForCode' => false,
  'leadingZeroPossible' => false,
  'mobileNumberPortableRegion' => false,
);
