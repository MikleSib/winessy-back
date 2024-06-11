<?php

namespace Database\Migrations;

use Doctrine\Migrations\AbstractMigration;
use Doctrine\DBAL\ParameterType;
use Doctrine\DBAL\Schema\Schema as Schema;

class Version20221016150001 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');


        $phoneCodes = [
            'AF' => '93', // Afghanistan    93    AF
            'AL' => '355', // Albania    355    AL
            'DZ' => '213', // Algeria    213    DZ
            'AS' => '1-684', // American Samoa    1-684    AS
            'AD' => '376', // Andorra    376    AD
            'AO' => '244', // Angola    244    AO
            'AI' => '1-264', // Anguilla    1-264    AI
            'AQ' => '672', // Antarctica    672    AQ
            'AG' => '1-268', // Antigua and Barbuda    1-268    AG
            'AR' => '54', // Argentina    54    AR
            'AM' => '374', // Armenia    374    AM
            'AW' => '297', // Aruba    297    AW
            'AU' => '61', // Australia    61    AU
            'AT' => '43', // Austria    43    AT
            'AZ' => '994', // Azerbaijan    994    AZ
            'BS' => '1-242', // Bahamas    1-242    BS
            'BH' => '973', // Bahrain    973    BH
            'BD' => '880', // Bangladesh    880    BD
            'BB' => '1-246', // Barbados    1-246    BB
            'BY' => '375', // Belarus    375    BY
            'BE' => '32', // Belgium    32    BE
            'BZ' => '501', // Belize    501    BZ
            'BJ' => '229', // Benin    229    BJ
            'BM' => '1-441', // Bermuda    1-441    BM
            'BT' => '975', // Bhutan    975    BT
            'BO' => '591', // Bolivia    591    BO
            'BA' => '387', // Bosnia and Herzegovina    387    BA
            'BW' => '267', // Botswana    267    BW
            'BR' => '55', // Brazil    55    BR
            'IO' => '246', // British Indian Ocean Territory    246    IO
            'VG' => '1-284', // British Virgin Islands    1-284    VG
            'BN' => '673', // Brunei    673    BN
            'BG' => '359', // Bulgaria    359    BG
            'BF' => '226', // Burkina Faso    226    BF
            'BI' => '257', // Burundi    257    BI
            'KH' => '855', // Cambodia    855    KH
            'CM' => '237', // Cameroon    237    CM
            'CA' => '1', // Canada    1    CA
            'CV' => '238', // Cape Verde    238    CV
            'KY' => '1-345', // Cayman Islands    1-345    KY
            'CF' => '236', // Central African Republic    236    CF
            'TD' => '235', // Chad    235    TD
            'CL' => '56', // Chile    56    CL
            'CN' => '86', // China    86    CN
            'CX' => '61', // Christmas Island    61    CX
            'CC' => '61', // Cocos Islands    61    CC
            'CO' => '57', // Colombia    57    CO
            'KM' => '269', // Comoros    269    KM
            'CK' => '682', // Cook Islands    682    CK
            'CR' => '506', // Costa Rica    506    CR
            'HR' => '385', // Croatia    385    HR
            'CU' => '53', // Cuba    53    CU
            'CW' => '599', // Curacao    599    CW
            'CY' => '357', // Cyprus    357    CY
            'CZ' => '420', // Czech Republic    420    CZ
            'CD' => '243', // Democratic Republic of the Congo    243    CD
            'DK' => '45', // Denmark    45    DK
            'DJ' => '253', // Djibouti    253    DJ
            'DM' => '1-767', // Dominica    1-767    DM
            'DO' => '1-809, 1-829, 1-849', // Dominican Republic    1-809, 1-829, 1-849    DO
            'TL' => '670', // East Timor    670    TL
            'EC' => '593', // Ecuador    593    EC
            'EG' => '20', // Egypt    20    EG
            'SV' => '503', // El Salvador    503    SV
            'GQ' => '240', // Equatorial Guinea    240    GQ
            'ER' => '291', // Eritrea    291    ER
            'EE' => '372', // Estonia    372    EE
            'ET' => '251', // Ethiopia    251    ET
            'FK' => '500', // Falkland Islands    500    FK
            'FO' => '298', // Faroe Islands    298    FO
            'FJ' => '679', // Fiji    679    FJ
            'FI' => '358', // Finland    358    FI
            'FR' => '33', // France    33    FR
            'PF' => '689', // French Polynesia    689    PF
            'GA' => '241', // Gabon    241    GA
            'GM' => '220', // Gambia    220    GM
            'GE' => '995', // Georgia    995    GE
            'DE' => '49', // Germany    49    DE
            'GH' => '233', // Ghana    233    GH
            'GI' => '350', // Gibraltar    350    GI
            'GR' => '30', // Greece    30    GR
            'GL' => '299', // Greenland    299    GL
            'GD' => '1-473', // Grenada    1-473    GD
            'GU' => '1-671', // Guam    1-671    GU
            'GT' => '502', // Guatemala    502    GT
            'GG' => '44-1481', // Guernsey    44-1481    GG
            'GN' => '224', // Guinea    224    GN
            'GW' => '245', // Guinea-Bissau    245    GW
            'GY' => '592', // Guyana    592    GY
            'HT' => '509', // Haiti    509    HT
            'HN' => '504', // Honduras    504    HN
            'HK' => '852', // Hong Kong    852    HK
            'HU' => '36', // Hungary    36    HU
            'IS' => '354', // Iceland    354    IS
            'IN' => '91', // India    91    IN
            'ID' => '62', // Indonesia    62    ID
            'IR' => '98', // Iran    98    IR
            'IQ' => '964', // Iraq    964    IQ
            'IE' => '353', // Ireland    353    IE
            'IM' => '44-1624', // Isle of Man    44-1624    IM
            'IL' => '972', // Israel    972    IL
            'IT' => '39', // Italy    39    IT
            'CI' => '225', // Ivory Coast    225    CI
            'JM' => '1-876', // Jamaica    1-876    JM
            'JP' => '81', // Japan    81    JP
            'JE' => '44-1534', // Jersey    44-1534    JE
            'JO' => '962', // Jordan    962    JO
            'KZ' => '7', // Kazakhstan    7    KZ
            'KE' => '254', // Kenya    254    KE
            'KI' => '686', // Kiribati    686    KI
            'XK' => '383', // Kosovo    383    XK
            'KW' => '965', // Kuwait    965    KW
            'KG' => '996', // Kyrgyzstan    996    KG
            'LA' => '856', // Laos    856    LA
            'LV' => '371', // Latvia    371    LV
            'LB' => '961', // Lebanon    961    LB
            'LS' => '266', // Lesotho    266    LS
            'LR' => '231', // Liberia    231    LR
            'LY' => '218', // Libya    218    LY
            'LI' => '423', // Liechtenstein    423    LI
            'LT' => '370', // Lithuania    370    LT
            'LU' => '352', // Luxembourg    352    LU
            'MO' => '853', // Macau    853    MO
            'MK' => '389', // Macedonia    389    MK
            'MG' => '261', // Madagascar    261    MG
            'MW' => '265', // Malawi    265    MW
            'MY' => '60', // Malaysia    60    MY
            'MV' => '960', // Maldives    960    MV
            'ML' => '223', // Mali    223    ML
            'MT' => '356', // Malta    356    MT
            'MH' => '692', // Marshall Islands    692    MH
            'MR' => '222', // Mauritania    222    MR
            'MU' => '230', // Mauritius    230    MU
            'YT' => '262', // Mayotte    262    YT
            'MX' => '52', // Mexico    52    MX
            'FM' => '691', // Micronesia    691    FM
            'MD' => '373', // Moldova    373    MD
            'MC' => '377', // Monaco    377    MC
            'MN' => '976', // Mongolia    976    MN
            'ME' => '382', // Montenegro    382    ME
            'MS' => '1-664', // Montserrat    1-664    MS
            'MA' => '212', // Morocco    212    MA
            'MZ' => '258', // Mozambique    258    MZ
            'MM' => '95', // Myanmar    95    MM
            'NA' => '264', // Namibia    264    NA
            'NR' => '674', // Nauru    674    NR
            'NP' => '977', // Nepal    977    NP
            'NL' => '31', // Netherlands    31    NL
            'AN' => '599', // Netherlands Antilles    599    AN
            'NC' => '687', // New Caledonia    687    NC
            'NZ' => '64', // New Zealand    64    NZ
            'NI' => '505', // Nicaragua    505    NI
            'NE' => '227', // Niger    227    NE
            'NG' => '234', // Nigeria    234    NG
            'NU' => '683', // Niue    683    NU
            'KP' => '850', // North Korea    850    KP
            'MP' => '1-670', // Northern Mariana Islands    1-670    MP
            'NO' => '47', // Norway    47    NO
            'OM' => '968', // Oman    968    OM
            'PK' => '92', // Pakistan    92    PK
            'PW' => '680', // Palau    680    PW
            'PS' => '970', // Palestine    970    PS
            'PA' => '507', // Panama    507    PA
            'PG' => '675', // Papua New Guinea    675    PG
            'PY' => '595', // Paraguay    595    PY
            'PE' => '51', // Peru    51    PE
            'PH' => '63', // Philippines    63    PH
            'PN' => '64', // Pitcairn    64    PN
            'PL' => '48', // Poland    48    PL
            'PT' => '351', // Portugal    351    PT
            'PR' => '1-787, 1-939', // Puerto Rico    1-787, 1-939    PR
            'QA' => '974', // Qatar    974    QA
            'CG' => '242', // Republic of the Congo    242    CG
            'RE' => '262', // Reunion    262    RE
            'RO' => '40', // Romania    40    RO
            'RU' => '7', // Russia    7    RU
            'RW' => '250', // Rwanda    250    RW
            'BL' => '590', // Saint Barthelemy    590    BL
            'SH' => '290', // Saint Helena    290    SH
            'KN' => '1-869', // Saint Kitts and Nevis    1-869    KN
            'LC' => '1-758', // Saint Lucia    1-758    LC
            'MF' => '590', // Saint Martin    590    MF
            'PM' => '508', // Saint Pierre and Miquelon    508    PM
            'VC' => '1-784', // Saint Vincent and the Grenadines    1-784    VC
            'WS' => '685', // Samoa    685    WS
            'SM' => '378', // San Marino    378    SM
            'ST' => '239', // Sao Tome and Principe    239    ST
            'SA' => '966', // Saudi Arabia    966    SA
            'SN' => '221', // Senegal    221    SN
            'RS' => '381', // Serbia    381    RS
            'SC' => '248', // Seychelles    248    SC
            'SL' => '232', // Sierra Leone    232    SL
            'SG' => '65', // Singapore    65    SG
            'SX' => '1-721', // Sint Maarten    1-721    SX
            'SK' => '421', // Slovakia    421    SK
            'SI' => '386', // Slovenia    386    SI
            'SB' => '677', // Solomon Islands    677    SB
            'SO' => '252', // Somalia    252    SO
            'ZA' => '27', // South Africa    27    ZA
            'KR' => '82', // South Korea    82    KR
            'SS' => '211', // South Sudan    211    SS
            'ES' => '34', // Spain    34    ES
            'LK' => '94', // Sri Lanka    94    LK
            'SD' => '249', // Sudan    249    SD
            'SR' => '597', // Suriname    597    SR
            'SJ' => '47', // Svalbard and Jan Mayen    47    SJ
            'SZ' => '268', // Swaziland    268    SZ
            'SE' => '46', // Sweden    46    SE
            'CH' => '41', // Switzerland    41    CH
            'SY' => '963', // Syria    963    SY
            'TW' => '886', // Taiwan    886    TW
            'TJ' => '992', // Tajikistan    992    TJ
            'TZ' => '255', // Tanzania    255    TZ
            'TH' => '66', // Thailand    66    TH
            'TG' => '228', // Togo    228    TG
            'TK' => '690', // Tokelau    690    TK
            'TO' => '676', // Tonga    676    TO
            'TT' => '1-868', // Trinidad and Tobago    1-868    TT
            'TN' => '216', // Tunisia    216    TN
            'TR' => '90', // Turkey    90    TR
            'TM' => '993', // Turkmenistan    993    TM
            'TC' => '1-649', // Turks and Caicos Islands    1-649    TC
            'TV' => '688', // Tuvalu    688    TV
            'VI' => '1-340', //  U.S. Virgin Islands    1-340    VI
            'UG' => '256', // Uganda    256    UG
            'UA' => '380', // Ukraine    380    UA
            'AE' => '971', // United Arab Emirates    971    AE
            'GB' => '44', // United Kingdom    44    GB
            'US' => '1', // United States    1    US
            'UY' => '598', // Uruguay    598    UY
            'UZ' => '998', // Uzbekistan    998    UZ
            'VU' => '678', // Vanuatu    678    VU
            'VA' => '379', // Vatican    379    VA
            'VE' => '58', // Venezuela    58    VE
            'VN' => '84', // Vietnam    84    VN
            'WF' => '681', // Wallis and Futuna    681    WF
            'EH' => '212', // Western Sahara    212    EH
            'YE' => '967', // Yemen    967    YE
            'ZM' => '260', // Zambia    260    ZM
            'ZW' => '263', // Zimbabwe    263    ZW




            'AX' => '358', // Aland Islands
            'BV' => '47', // Bouvet Island
            'GF' => '594', // French Guiana
            'TF' => '262', // French Southern Territories
            'GP' => '590', // Guadeloupe
            'HM' => '672', // Heard and Mcdonald Islands
            'MQ' => '596', // Martinique
            'NF' => '672', // Norfolk Island
            'GS' => '500', // South Georgia and the South Sandwich Islands
            'UM' => '246', // United States Minor Outlying Islands
        ];

        foreach ($phoneCodes as $code2 => $phoneCode) {
            $this->addSql(
                'UPDATE countries SET phone_code = :phone_code WHERE code2 = :code2',
                [
                    'phone_code' => $phoneCode,
                    'code2' => $code2,
                ], [
                    'phone_code' => ParameterType::STRING,
                    'code2' => ParameterType::STRING,
                ]
            );
        }
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('UPDATE countries SET phone_code = NULL');
    }
}


