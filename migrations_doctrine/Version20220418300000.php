<?php

namespace Database\Migrations;

use Doctrine\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;

class Version20220418300000 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema): void
    {
        $sql = <<<'SQL'
        INSERT INTO `countries`(`name`) VALUES
            ('Afghanistan'),
            ('Aland Islands'),
            ('Albania'),
            ('Algeria'),
            ('American Samoa'),
            ('Andorra'),
            ('Angola'),
            ('Anguilla'),
            ('Antarctica'),
            ('Antigua and Barbuda'),
            ('Argentina'),
            ('Armenia'),
            ('Aruba'),
            ('Australia'),
            ('Austria'),
            ('Azerbaijan'),
            ('Bahamas'),
            ('Bahrain'),
            ('Bangladesh'),
            ('Barbados'),
            ('Belarus'),
            ('Belgium'),
            ('Belize'),
            ('Benin'),
            ('Bermuda'),
            ('Bhutan'),
            ('Bolivia'),
            ('Bosnia and Herzegovina'),
            ('Botswana'),
            ('Bouvet Island'),
            ('Brazil'),
            ('British Virgin Islands'),
            ('British Indian Ocean Territory'),
            ('Brunei Darussalam'),
            ('Bulgaria'),
            ('Burkina Faso'),
            ('Burundi'),
            ('Cambodia'),
            ('Cameroon'),
            ('Canada'),
            ('Cape Verde'),
            ('Cayman Islands'),
            ('Central African Republic'),
            ('Chad'),
            ('Chile'),
            ('China'),
            ('Christmas Island'),
            ('Cocos (Keeling) Islands'),
            ('Colombia'),
            ('Comoros'),
            ('Congo'),
            ('Congo, (Kinshasa)'),
            ('Cook Islands'),
            ('Costa Rica'),
            ('Cote D\"Ivoire'),
            ('Croatia'),
            ('Cuba'),
            ('Cyprus'),
            ('Czech Republic'),
            ('Denmark'),
            ('Djibouti'),
            ('Dominica'),
            ('Dominican Republic'),
            ('Ecuador'),
            ('Egypt'),
            ('El Salvador'),
            ('Equatorial Guinea'),
            ('Eritrea'),
            ('Estonia'),
            ('Ethiopia'),
            ('Falkland Islands (Malvinas)'),
            ('Faroe Islands'),
            ('Fiji'),
            ('Finland'),
            ('France'),
            ('French Guiana'),
            ('French Polynesia'),
            ('French Southern Territories'),
            ('Gabon'),
            ('Gambia'),
            ('Georgia'),
            ('Germany'),
            ('Ghana'),
            ('Gibraltar'),
            ('Greece'),
            ('Greenland'),
            ('Grenada'),
            ('Guadeloupe'),
            ('Guam'),
            ('Guatemala'),
            ('Guernsey'),
            ('Guinea'),
            ('Guinea-Bissau'),
            ('Guyana'),
            ('Haiti'),
            ('Heard and Mcdonald Islands'),
            ('Holy See (Vatican City State)'),
            ('Honduras'),
            ('Hong Kong'),
            ('Hungary'),
            ('Iceland'),
            ('India'),
            ('Indonesia'),
            ('Iran, Islamic Republic of'),
            ('Iraq'),
            ('Ireland'),
            ('Isle of Man'),
            ('Israel'),
            ('Italy'),
            ('Jamaica'),
            ('Japan'),
            ('Jersey'),
            ('Jordan'),
            ('Kazakhstan'),
            ('Kenya'),
            ('Kiribati'),
            ('Korea (North)'),
            ('Korea (South)'),
            ('Kuwait'),
            ('Kyrgyzstan'),
            ('Lao PDR'),
            ('Latvia'),
            ('Lebanon'),
            ('Lesotho'),
            ('Liberia'),
            ('Libyan Arab Jamahiriya'),
            ('Liechtenstein'),
            ('Lithuania'),
            ('Luxembourg'),
            ('Macao'),
            ('Macedonia, The Former Yugoslav Republic of'),
            ('Madagascar'),
            ('Malawi'),
            ('Malaysia'),
            ('Maldives'),
            ('Mali'),
            ('Malta'),
            ('Marshall Islands'),
            ('Martinique'),
            ('Mauritania'),
            ('Mauritius'),
            ('Mayotte'),
            ('Mexico'),
            ('Micronesia, Federated States of'),
            ('Moldova'),
            ('Monaco'),
            ('Mongolia'),
            ('Montenegro'),
            ('Montserrat'),
            ('Morocco'),
            ('Mozambique'),
            ('Myanmar'),
            ('Namibia'),
            ('Nauru'),
            ('Nepal'),
            ('Netherlands'),
            ('Netherlands Antilles'),
            ('New Caledonia'),
            ('New Zealand'),
            ('Nicaragua'),
            ('Niger'),
            ('Nigeria'),
            ('Niue'),
            ('Norfolk Island'),
            ('Northern Mariana Islands'),
            ('Norway'),
            ('Oman'),
            ('Pakistan'),
            ('Palau'),
            ('Palestinian Territory'),
            ('Panama'),
            ('Papua New Guinea'),
            ('Paraguay'),
            ('Peru'),
            ('Philippines'),
            ('Pitcairn'),
            ('Poland'),
            ('Portugal'),
            ('Puerto Rico'),
            ('Qatar'),
            ('Reunion'),
            ('Romania'),
            ('Russian Federation'),
            ('Rwanda'),
            ('Saint-Barthélemy'),
            ('Saint Helena'),
            ('Saint Kitts and Nevis'),
            ('Saint Lucia'),
            ('Saint-Martin (French part)'),
            ('Saint Pierre and Miquelon'),
            ('Saint Vincent and the Grenadines'),
            ('Samoa'),
            ('San Marino'),
            ('Sao Tome and Principe'),
            ('Saudi Arabia'),
            ('Senegal'),
            ('Serbia'),
            ('Seychelles'),
            ('Sierra Leone'),
            ('Singapore'),
            ('Slovakia'),
            ('Slovenia'),
            ('Solomon Islands'),
            ('Somalia'),
            ('South Africa'),
            ('South Georgia and the South Sandwich Islands'),
            ('Spain'),
            ('Sri Lanka'),
            ('Sudan'),
            ('Suriname'),
            ('Svalbard and Jan Mayen'),
            ('Swaziland'),
            ('Sweden'),
            ('Switzerland'),
            ('Syrian Arab Republic'),
            ('Taiwan, Republic of China'),
            ('Tajikistan'),
            ('Tanzania, United Republic of'),
            ('Thailand'),
            ('Timor-Leste'),
            ('Togo'),
            ('Tokelau'),
            ('Tonga'),
            ('Trinidad and Tobago'),
            ('Tunisia'),
            ('Turkey'),
            ('Turkmenistan'),
            ('Turks and Caicos Islands'),
            ('Tuvalu'),
            ('Uganda'),
            ('Ukraine'),
            ('United Arab Emirates'),
            ('United Kingdom'),
            ('United States'),
            ('United States Minor Outlying Islands'),
            ('Uruguay'),
            ('Uzbekistan'),
            ('Vanuatu'),
            ('Venezuela'),
            ('Viet Nam'),
            ('Virgin Islands, U.S.'),
            ('Wallis and Futuna'),
            ('Western Sahara'),
            ('Yemen'),
            ('Zambia'),
            ('Zimbabwe');
SQL;
        $this->addSql($sql);

        $this->addSql("UPDATE `countries` SET `code2` = 'AF', `code3` = 'AFG' WHERE `name` = 'Afghanistan'");
        $this->addSql("UPDATE `countries` SET `code2` = 'AX', `code3` = 'ALA' WHERE `name` = 'Aland Islands'");
        $this->addSql("UPDATE `countries` SET `code2` = 'AL', `code3` = 'ALB' WHERE `name` = 'Albania'");
        $this->addSql("UPDATE `countries` SET `code2` = 'DZ', `code3` = 'DZA' WHERE `name` = 'Algeria'");
        $this->addSql("UPDATE `countries` SET `code2` = 'AS', `code3` = 'ASM' WHERE `name` = 'American Samoa'");
        $this->addSql("UPDATE `countries` SET `code2` = 'AD', `code3` = 'AND' WHERE `name` = 'Andorra'");
        $this->addSql("UPDATE `countries` SET `code2` = 'AO', `code3` = 'AGO' WHERE `name` = 'Angola'");
        $this->addSql("UPDATE `countries` SET `code2` = 'AI', `code3` = 'AIA' WHERE `name` = 'Anguilla'");
        $this->addSql("UPDATE `countries` SET `code2` = 'AQ', `code3` = 'ATA' WHERE `name` = 'Antarctica'");
        $this->addSql("UPDATE `countries` SET `code2` = 'AG', `code3` = 'ATG' WHERE `name` = 'Antigua and Barbuda'");
        $this->addSql("UPDATE `countries` SET `code2` = 'AR', `code3` = 'ARG' WHERE `name` = 'Argentina'");
        $this->addSql("UPDATE `countries` SET `code2` = 'AM', `code3` = 'ARM' WHERE `name` = 'Armenia'");
        $this->addSql("UPDATE `countries` SET `code2` = 'AW', `code3` = 'ABW' WHERE `name` = 'Aruba'");
        $this->addSql("UPDATE `countries` SET `code2` = 'AU', `code3` = 'AUS' WHERE `name` = 'Australia'");
        $this->addSql("UPDATE `countries` SET `code2` = 'AT', `code3` = 'AUT' WHERE `name` = 'Austria'");
        $this->addSql("UPDATE `countries` SET `code2` = 'AZ', `code3` = 'AZE' WHERE `name` = 'Azerbaijan'");

        $this->addSql("UPDATE `countries` SET `code2` = 'BS', `code3` = 'BHS' WHERE `name` = 'Bahamas'");
        $this->addSql("UPDATE `countries` SET `code2` = 'BH', `code3` = 'BHR' WHERE `name` = 'Bahrain'");
        $this->addSql("UPDATE `countries` SET `code2` = 'BD', `code3` = 'BGD' WHERE `name` = 'Bangladesh'");
        $this->addSql("UPDATE `countries` SET `code2` = 'BB', `code3` = 'BRB' WHERE `name` = 'Barbados'");
        $this->addSql("UPDATE `countries` SET `code2` = 'BY', `code3` = 'BLR' WHERE `name` = 'Belarus'");
        $this->addSql("UPDATE `countries` SET `code2` = 'BE', `code3` = 'BEL' WHERE `name` = 'Belgium'");
        $this->addSql("UPDATE `countries` SET `code2` = 'BZ', `code3` = 'BLZ' WHERE `name` = 'Belize'");
        $this->addSql("UPDATE `countries` SET `code2` = 'BJ', `code3` = 'BEN' WHERE `name` = 'Benin'");
        $this->addSql("UPDATE `countries` SET `code2` = 'BM', `code3` = 'BMU' WHERE `name` = 'Bermuda'");
        $this->addSql("UPDATE `countries` SET `code2` = 'BT', `code3` = 'BTN' WHERE `name` = 'Bhutan'");
        $this->addSql("UPDATE `countries` SET `code2` = 'BO', `code3` = 'BOL' WHERE `name` = 'Bolivia'");
        $this->addSql("UPDATE `countries` SET `code2` = 'BA', `code3` = 'BIH' WHERE `name` = 'Bosnia and Herzegovina'");
        $this->addSql("UPDATE `countries` SET `code2` = 'BW', `code3` = 'BWA' WHERE `name` = 'Botswana'");
        $this->addSql("UPDATE `countries` SET `code2` = 'BV', `code3` = 'BVT' WHERE `name` = 'Bouvet Island'");
        $this->addSql("UPDATE `countries` SET `code2` = 'BR', `code3` = 'BRA' WHERE `name` = 'Brazil'");
        $this->addSql("UPDATE `countries` SET `code2` = 'VG', `code3` = 'VGB' WHERE `name` = 'British Virgin Islands'");
        $this->addSql("UPDATE `countries` SET `code2` = 'IO', `code3` = 'IOT' WHERE `name` = 'British Indian Ocean Territory'");
        $this->addSql("UPDATE `countries` SET `code2` = 'BN', `code3` = 'BRN' WHERE `name` = 'Brunei Darussalam'");
        $this->addSql("UPDATE `countries` SET `code2` = 'BG', `code3` = 'BGR' WHERE `name` = 'Bulgaria'");
        $this->addSql("UPDATE `countries` SET `code2` = 'BF', `code3` = 'BFA' WHERE `name` = 'Burkina Faso'");
        $this->addSql("UPDATE `countries` SET `code2` = 'BI', `code3` = 'BDI' WHERE `name` = 'Burundi'");

        $this->addSql("UPDATE `countries` SET `code2` = 'KH', `code3` = 'KHM' WHERE `name` = 'Cambodia'");
        $this->addSql("UPDATE `countries` SET `code2` = 'CM', `code3` = 'CMR' WHERE `name` = 'Cameroon'");
        $this->addSql("UPDATE `countries` SET `code2` = 'CA', `code3` = 'CAN' WHERE `name` = 'Canada'");
        $this->addSql("UPDATE `countries` SET `code2` = 'CV', `code3` = 'CPV' WHERE `name` = 'Cape Verde'");
        $this->addSql("UPDATE `countries` SET `code2` = 'KY', `code3` = 'CYM' WHERE `name` = 'Cayman Islands'");
        $this->addSql("UPDATE `countries` SET `code2` = 'CF', `code3` = 'CAF' WHERE `name` = 'Central African Republic'");
        $this->addSql("UPDATE `countries` SET `code2` = 'TD', `code3` = 'TCD' WHERE `name` = 'Chad'");
        $this->addSql("UPDATE `countries` SET `code2` = 'CL', `code3` = 'CHL' WHERE `name` = 'Chile'");
        $this->addSql("UPDATE `countries` SET `code2` = 'CN', `code3` = 'CHN' WHERE `name` = 'China'");
        $this->addSql("UPDATE `countries` SET `code2` = 'CX', `code3` = 'CXR' WHERE `name` = 'Christmas Island'");
        $this->addSql("UPDATE `countries` SET `code2` = 'CC', `code3` = 'CCK' WHERE `name` = 'Cocos (Keeling) Islands'");
        $this->addSql("UPDATE `countries` SET `code2` = 'CO', `code3` = 'COL' WHERE `name` = 'Colombia'");
        $this->addSql("UPDATE `countries` SET `code2` = 'KM', `code3` = 'COM' WHERE `name` = 'Comoros'");
        $this->addSql("UPDATE `countries` SET `code2` = 'CG', `code3` = 'COG' WHERE `name` = 'Congo'");
        $this->addSql("UPDATE `countries` SET `code2` = 'CD', `code3` = 'COD' WHERE `name` = 'Congo, (Kinshasa)'");
        $this->addSql("UPDATE `countries` SET `code2` = 'CK', `code3` = 'COK' WHERE `name` = 'Cook Islands'");
        $this->addSql("UPDATE `countries` SET `code2` = 'CR', `code3` = 'CRI' WHERE `name` = 'Costa Rica'");
        $this->addSql("UPDATE `countries` SET `code2` = 'CI', `code3` = 'CIV' WHERE `name` = 'Cote D\"Ivoire'");
        $this->addSql("UPDATE `countries` SET `code2` = 'HR', `code3` = 'HRV' WHERE `name` = 'Croatia'");
        $this->addSql("UPDATE `countries` SET `code2` = 'CU', `code3` = 'CUB' WHERE `name` = 'Cuba'");
        $this->addSql("UPDATE `countries` SET `code2` = 'CY', `code3` = 'CYP' WHERE `name` = 'Cyprus'");
        $this->addSql("UPDATE `countries` SET `code2` = 'CZ', `code3` = 'CZE' WHERE `name` = 'Czech Republic'");

        $this->addSql("UPDATE `countries` SET `code2` = 'DK', `code3` = 'DNK' WHERE `name` = 'Denmark'");
        $this->addSql("UPDATE `countries` SET `code2` = 'DJ', `code3` = 'DJI' WHERE `name` = 'Djibouti'");
        $this->addSql("UPDATE `countries` SET `code2` = 'DM', `code3` = 'DMA' WHERE `name` = 'Dominica'");
        $this->addSql("UPDATE `countries` SET `code2` = 'DO', `code3` = 'DOM' WHERE `name` = 'Dominican Republic'");

        $this->addSql("UPDATE `countries` SET `code2` = 'EC', `code3` = 'ECU' WHERE `name` = 'Ecuador'");
        $this->addSql("UPDATE `countries` SET `code2` = 'EG', `code3` = 'EGY' WHERE `name` = 'Egypt'");
        $this->addSql("UPDATE `countries` SET `code2` = 'SV', `code3` = 'SLV' WHERE `name` = 'El Salvador'");
        $this->addSql("UPDATE `countries` SET `code2` = 'GQ', `code3` = 'GNQ' WHERE `name` = 'Equatorial Guinea'");
        $this->addSql("UPDATE `countries` SET `code2` = 'ER', `code3` = 'ERI' WHERE `name` = 'Eritrea'");
        $this->addSql("UPDATE `countries` SET `code2` = 'EE', `code3` = 'EST' WHERE `name` = 'Estonia'");
        $this->addSql("UPDATE `countries` SET `code2` = 'ET', `code3` = 'ETH' WHERE `name` = 'Ethiopia'");

        $this->addSql("UPDATE `countries` SET `code2` = 'FK', `code3` = 'FLK' WHERE `name` = 'Falkland Islands (Malvinas)'");
        $this->addSql("UPDATE `countries` SET `code2` = 'FO', `code3` = 'FRO' WHERE `name` = 'Faroe Islands'");
        $this->addSql("UPDATE `countries` SET `code2` = 'FJ', `code3` = 'FJI' WHERE `name` = 'Fiji'");
        $this->addSql("UPDATE `countries` SET `code2` = 'FI', `code3` = 'FIN' WHERE `name` = 'Finland'");
        $this->addSql("UPDATE `countries` SET `code2` = 'FR', `code3` = 'FRA' WHERE `name` = 'France'");
        $this->addSql("UPDATE `countries` SET `code2` = 'GF', `code3` = 'GUF' WHERE `name` = 'French Guiana'");
        $this->addSql("UPDATE `countries` SET `code2` = 'PF', `code3` = 'PYF' WHERE `name` = 'French Polynesia'");
        $this->addSql("UPDATE `countries` SET `code2` = 'TF', `code3` = 'ATF' WHERE `name` = 'French Southern Territories'");

        $this->addSql("UPDATE `countries` SET `code2` = 'GA', `code3` = 'GAB' WHERE `name` = 'Gabon'");
        $this->addSql("UPDATE `countries` SET `code2` = 'GM', `code3` = 'GMB' WHERE `name` = 'Gambia'");
        $this->addSql("UPDATE `countries` SET `code2` = 'GE', `code3` = 'GEO' WHERE `name` = 'Georgia'");
        $this->addSql("UPDATE `countries` SET `code2` = 'DE', `code3` = 'DEU' WHERE `name` = 'Germany'");
        $this->addSql("UPDATE `countries` SET `code2` = 'GH', `code3` = 'GHA' WHERE `name` = 'Ghana'");
        $this->addSql("UPDATE `countries` SET `code2` = 'GI', `code3` = 'GIB' WHERE `name` = 'Gibraltar'");
        $this->addSql("UPDATE `countries` SET `code2` = 'GR', `code3` = 'GRC' WHERE `name` = 'Greece'");
        $this->addSql("UPDATE `countries` SET `code2` = 'GL', `code3` = 'GRL' WHERE `name` = 'Greenland'");
        $this->addSql("UPDATE `countries` SET `code2` = 'GD', `code3` = 'GRD' WHERE `name` = 'Grenada'");
        $this->addSql("UPDATE `countries` SET `code2` = 'GP', `code3` = 'GLP' WHERE `name` = 'Guadeloupe'");
        $this->addSql("UPDATE `countries` SET `code2` = 'GU', `code3` = 'GUM' WHERE `name` = 'Guam'");
        $this->addSql("UPDATE `countries` SET `code2` = 'GT', `code3` = 'GTM' WHERE `name` = 'Guatemala'");
        $this->addSql("UPDATE `countries` SET `code2` = 'GG', `code3` = 'GGY' WHERE `name` = 'Guernsey'");
        $this->addSql("UPDATE `countries` SET `code2` = 'GN', `code3` = 'GIN' WHERE `name` = 'Guinea'");
        $this->addSql("UPDATE `countries` SET `code2` = 'GW', `code3` = 'GNB' WHERE `name` = 'Guinea-Bissau'");
        $this->addSql("UPDATE `countries` SET `code2` = 'GY', `code3` = 'GUY' WHERE `name` = 'Guyana'");

        $this->addSql("UPDATE `countries` SET `code2` = 'HT', `code3` = 'HTI' WHERE `name` = 'Haiti'");
        $this->addSql("UPDATE `countries` SET `code2` = 'HM', `code3` = 'HMD' WHERE `name` = 'Heard and Mcdonald Islands'");
        $this->addSql("UPDATE `countries` SET `code2` = 'VA', `code3` = 'VAT' WHERE `name` = 'Holy See (Vatican City State)'");
        $this->addSql("UPDATE `countries` SET `code2` = 'HN', `code3` = 'HND' WHERE `name` = 'Honduras'");
        $this->addSql("UPDATE `countries` SET `code2` = 'HK', `code3` = 'HKG' WHERE `name` = 'Hong Kong'");
        $this->addSql("UPDATE `countries` SET `code2` = 'HU', `code3` = 'HUN' WHERE `name` = 'Hungary'");

        $this->addSql("UPDATE `countries` SET `code2` = 'IS', `code3` = 'ISL' WHERE `name` = 'Iceland'");
        $this->addSql("UPDATE `countries` SET `code2` = 'IN', `code3` = 'IND' WHERE `name` = 'India'");
        $this->addSql("UPDATE `countries` SET `code2` = 'ID', `code3` = 'IDN' WHERE `name` = 'Indonesia'");
        $this->addSql("UPDATE `countries` SET `code2` = 'IR', `code3` = 'IRN' WHERE `name` = 'Iran, Islamic Republic of'");
        $this->addSql("UPDATE `countries` SET `code2` = 'IQ', `code3` = 'IRQ' WHERE `name` = 'Iraq'");
        $this->addSql("UPDATE `countries` SET `code2` = 'IE', `code3` = 'IRL' WHERE `name` = 'Ireland'");
        $this->addSql("UPDATE `countries` SET `code2` = 'IM', `code3` = 'IMN' WHERE `name` = 'Isle of Man'");
        $this->addSql("UPDATE `countries` SET `code2` = 'IL', `code3` = 'ISR' WHERE `name` = 'Israel'");
        $this->addSql("UPDATE `countries` SET `code2` = 'IT', `code3` = 'ITA' WHERE `name` = 'Italy'");

        $this->addSql("UPDATE `countries` SET `code2` = 'JM', `code3` = 'JAM' WHERE `name` = 'Jamaica'");
        $this->addSql("UPDATE `countries` SET `code2` = 'JP', `code3` = 'JPN' WHERE `name` = 'Japan'");
        $this->addSql("UPDATE `countries` SET `code2` = 'JE', `code3` = 'JEY' WHERE `name` = 'Jersey'");
        $this->addSql("UPDATE `countries` SET `code2` = 'JO', `code3` = 'JOR' WHERE `name` = 'Jordan'");

        $this->addSql("UPDATE `countries` SET `code2` = 'KZ', `code3` = 'KAZ' WHERE `name` = 'Kazakhstan'");
        $this->addSql("UPDATE `countries` SET `code2` = 'KE', `code3` = 'KEN' WHERE `name` = 'Kenya'");
        $this->addSql("UPDATE `countries` SET `code2` = 'KI', `code3` = 'KIR' WHERE `name` = 'Kiribati'");
        $this->addSql("UPDATE `countries` SET `code2` = 'KP', `code3` = 'PRK' WHERE `name` = 'Korea (North)'");
        $this->addSql("UPDATE `countries` SET `code2` = 'KR', `code3` = 'KOR' WHERE `name` = 'Korea (South)'");
        $this->addSql("UPDATE `countries` SET `code2` = 'KW', `code3` = 'KWT' WHERE `name` = 'Kuwait'");
        $this->addSql("UPDATE `countries` SET `code2` = 'KG', `code3` = 'KGZ' WHERE `name` = 'Kyrgyzstan'");

        $this->addSql("UPDATE `countries` SET `code2` = 'LA', `code3` = 'LAO' WHERE `name` = 'Lao PDR'");
        $this->addSql("UPDATE `countries` SET `code2` = 'LV', `code3` = 'LVA' WHERE `name` = 'Latvia'");
        $this->addSql("UPDATE `countries` SET `code2` = 'LB', `code3` = 'LBN' WHERE `name` = 'Lebanon'");
        $this->addSql("UPDATE `countries` SET `code2` = 'LS', `code3` = 'LSO' WHERE `name` = 'Lesotho'");
        $this->addSql("UPDATE `countries` SET `code2` = 'LR', `code3` = 'LBR' WHERE `name` = 'Liberia'");
        $this->addSql("UPDATE `countries` SET `code2` = 'LY', `code3` = 'LBY' WHERE `name` = 'Libyan Arab Jamahiriya'");
        $this->addSql("UPDATE `countries` SET `code2` = 'LI', `code3` = 'LIE' WHERE `name` = 'Liechtenstein'");
        $this->addSql("UPDATE `countries` SET `code2` = 'LT', `code3` = 'LTU' WHERE `name` = 'Lithuania'");
        $this->addSql("UPDATE `countries` SET `code2` = 'LU', `code3` = 'LUX' WHERE `name` = 'Luxembourg'");

        $this->addSql("UPDATE `countries` SET `code2` = 'MO', `code3` = 'MAC' WHERE `name` = 'Macao'");
        $this->addSql("UPDATE `countries` SET `code2` = 'MK', `code3` = 'MKD' WHERE `name` = 'Macedonia, The Former Yugoslav Republic of'");
        $this->addSql("UPDATE `countries` SET `code2` = 'MG', `code3` = 'MDG' WHERE `name` = 'Madagascar'");
        $this->addSql("UPDATE `countries` SET `code2` = 'MW', `code3` = 'MWI' WHERE `name` = 'Malawi'");
        $this->addSql("UPDATE `countries` SET `code2` = 'MY', `code3` = 'MYS' WHERE `name` = 'Malaysia'");
        $this->addSql("UPDATE `countries` SET `code2` = 'MV', `code3` = 'MDV' WHERE `name` = 'Maldives'");
        $this->addSql("UPDATE `countries` SET `code2` = 'ML', `code3` = 'MLI' WHERE `name` = 'Mali'");
        $this->addSql("UPDATE `countries` SET `code2` = 'MT', `code3` = 'MLT' WHERE `name` = 'Malta'");
        $this->addSql("UPDATE `countries` SET `code2` = 'MH', `code3` = 'MHL' WHERE `name` = 'Marshall Islands'");
        $this->addSql("UPDATE `countries` SET `code2` = 'MQ', `code3` = 'MTQ' WHERE `name` = 'Martinique'");
        $this->addSql("UPDATE `countries` SET `code2` = 'MR', `code3` = 'MRT' WHERE `name` = 'Mauritania'");
        $this->addSql("UPDATE `countries` SET `code2` = 'MU', `code3` = 'MUS' WHERE `name` = 'Mauritius'");
        $this->addSql("UPDATE `countries` SET `code2` = 'YT', `code3` = 'MYT' WHERE `name` = 'Mayotte'");
        $this->addSql("UPDATE `countries` SET `code2` = 'MX', `code3` = 'MEX' WHERE `name` = 'Mexico'");
        $this->addSql("UPDATE `countries` SET `code2` = 'FM', `code3` = 'FSM' WHERE `name` = 'Micronesia, Federated States of'");
        $this->addSql("UPDATE `countries` SET `code2` = 'MD', `code3` = 'MDA' WHERE `name` = 'Moldova'");
        $this->addSql("UPDATE `countries` SET `code2` = 'MC', `code3` = 'MCO' WHERE `name` = 'Monaco'");
        $this->addSql("UPDATE `countries` SET `code2` = 'MN', `code3` = 'MNG' WHERE `name` = 'Mongolia'");
        $this->addSql("UPDATE `countries` SET `code2` = 'ME', `code3` = 'MNE' WHERE `name` = 'Montenegro'");
        $this->addSql("UPDATE `countries` SET `code2` = 'MS', `code3` = 'MSR' WHERE `name` = 'Montserrat'");
        $this->addSql("UPDATE `countries` SET `code2` = 'MA', `code3` = 'MAR' WHERE `name` = 'Morocco'");
        $this->addSql("UPDATE `countries` SET `code2` = 'MZ', `code3` = 'MOZ' WHERE `name` = 'Mozambique'");
        $this->addSql("UPDATE `countries` SET `code2` = 'MM', `code3` = 'MMR' WHERE `name` = 'Myanmar'");

        $this->addSql("UPDATE `countries` SET `code2` = 'NA', `code3` = 'NAM' WHERE `name` = 'Namibia'");
        $this->addSql("UPDATE `countries` SET `code2` = 'NR', `code3` = 'NRU' WHERE `name` = 'Nauru'");
        $this->addSql("UPDATE `countries` SET `code2` = 'NP', `code3` = 'NPL' WHERE `name` = 'Nepal'");
        $this->addSql("UPDATE `countries` SET `code2` = 'NL', `code3` = 'NLD' WHERE `name` = 'Netherlands'");
        $this->addSql("UPDATE `countries` SET `code2` = 'AN', `code3` = 'ANT' WHERE `name` = 'Netherlands Antilles'");
        $this->addSql("UPDATE `countries` SET `code2` = 'NC', `code3` = 'NCL' WHERE `name` = 'New Caledonia'");
        $this->addSql("UPDATE `countries` SET `code2` = 'NZ', `code3` = 'NZL' WHERE `name` = 'New Zealand'");
        $this->addSql("UPDATE `countries` SET `code2` = 'NI', `code3` = 'NIC' WHERE `name` = 'Nicaragua'");
        $this->addSql("UPDATE `countries` SET `code2` = 'NE', `code3` = 'NER' WHERE `name` = 'Niger'");
        $this->addSql("UPDATE `countries` SET `code2` = 'NG', `code3` = 'NGA' WHERE `name` = 'Nigeria'");
        $this->addSql("UPDATE `countries` SET `code2` = 'NU', `code3` = 'NIU' WHERE `name` = 'Niue'");
        $this->addSql("UPDATE `countries` SET `code2` = 'NF', `code3` = 'NFK' WHERE `name` = 'Norfolk Island'");
        $this->addSql("UPDATE `countries` SET `code2` = 'MP', `code3` = 'MNP' WHERE `name` = 'Northern Mariana Islands'");
        $this->addSql("UPDATE `countries` SET `code2` = 'NO', `code3` = 'NOR' WHERE `name` = 'Norway'");

        $this->addSql("UPDATE `countries` SET `code2` = 'OM', `code3` = 'OMN' WHERE `name` = 'Oman'");

        $this->addSql("UPDATE `countries` SET `code2` = 'PK', `code3` = 'PAK' WHERE `name` = 'Pakistan'");
        $this->addSql("UPDATE `countries` SET `code2` = 'PW', `code3` = 'PLW' WHERE `name` = 'Palau'");
        $this->addSql("UPDATE `countries` SET `code2` = 'PS', `code3` = 'PSE' WHERE `name` = 'Palestinian Territory'");
        $this->addSql("UPDATE `countries` SET `code2` = 'PA', `code3` = 'PAN' WHERE `name` = 'Panama'");
        $this->addSql("UPDATE `countries` SET `code2` = 'PG', `code3` = 'PNG' WHERE `name` = 'Papua New Guinea'");
        $this->addSql("UPDATE `countries` SET `code2` = 'PY', `code3` = 'PRY' WHERE `name` = 'Paraguay'");
        $this->addSql("UPDATE `countries` SET `code2` = 'PE', `code3` = 'PER' WHERE `name` = 'Peru'");
        $this->addSql("UPDATE `countries` SET `code2` = 'PH', `code3` = 'PHL' WHERE `name` = 'Philippines'");
        $this->addSql("UPDATE `countries` SET `code2` = 'PN', `code3` = 'PCN' WHERE `name` = 'Pitcairn'");
        $this->addSql("UPDATE `countries` SET `code2` = 'PL', `code3` = 'POL' WHERE `name` = 'Poland'");
        $this->addSql("UPDATE `countries` SET `code2` = 'PT', `code3` = 'PRT' WHERE `name` = 'Portugal'");
        $this->addSql("UPDATE `countries` SET `code2` = 'PR', `code3` = 'PRI' WHERE `name` = 'Puerto Rico'");

        $this->addSql("UPDATE `countries` SET `code2` = 'QA', `code3` = 'QAT' WHERE `name` = 'Qatar'");

        $this->addSql("UPDATE `countries` SET `code2` = 'RE', `code3` = 'REU' WHERE `name` = 'Reunion'");
        $this->addSql("UPDATE `countries` SET `code2` = 'RO', `code3` = 'ROU' WHERE `name` = 'Romania'");
        $this->addSql("UPDATE `countries` SET `code2` = 'RU', `code3` = 'RUS' WHERE `name` = 'Russian Federation'");
        $this->addSql("UPDATE `countries` SET `code2` = 'RW', `code3` = 'RWA' WHERE `name` = 'Rwanda'");
        
        $this->addSql("UPDATE `countries` SET `code2` = 'BL', `code3` = 'BLM' WHERE `name` = 'Saint-Barthélemy'");
        $this->addSql("UPDATE `countries` SET `code2` = 'SH', `code3` = 'SHN' WHERE `name` = 'Saint Helena'");
        $this->addSql("UPDATE `countries` SET `code2` = 'KN', `code3` = 'KNA' WHERE `name` = 'Saint Kitts and Nevis'");
        $this->addSql("UPDATE `countries` SET `code2` = 'LC', `code3` = 'LCA' WHERE `name` = 'Saint Lucia'");
        $this->addSql("UPDATE `countries` SET `code2` = 'MF', `code3` = 'MAF' WHERE `name` = 'Saint-Martin (French part)'");
        $this->addSql("UPDATE `countries` SET `code2` = 'PM', `code3` = 'SPM' WHERE `name` = 'Saint Pierre and Miquelon'");
        $this->addSql("UPDATE `countries` SET `code2` = 'VC', `code3` = 'VCT' WHERE `name` = 'Saint Vincent and the Grenadines'");
        $this->addSql("UPDATE `countries` SET `code2` = 'WS', `code3` = 'WSM' WHERE `name` = 'Samoa'");
        $this->addSql("UPDATE `countries` SET `code2` = 'SM', `code3` = 'SMR' WHERE `name` = 'San Marino'");
        $this->addSql("UPDATE `countries` SET `code2` = 'ST', `code3` = 'STP' WHERE `name` = 'Sao Tome and Principe'");
        $this->addSql("UPDATE `countries` SET `code2` = 'SA', `code3` = 'SAU' WHERE `name` = 'Saudi Arabia'");
        $this->addSql("UPDATE `countries` SET `code2` = 'SN', `code3` = 'SEN' WHERE `name` = 'Senegal'");
        $this->addSql("UPDATE `countries` SET `code2` = 'RS', `code3` = 'SRB' WHERE `name` = 'Serbia'");
        $this->addSql("UPDATE `countries` SET `code2` = 'SC', `code3` = 'SYC' WHERE `name` = 'Seychelles'");
        $this->addSql("UPDATE `countries` SET `code2` = 'SL', `code3` = 'SLE' WHERE `name` = 'Sierra Leone'");
        $this->addSql("UPDATE `countries` SET `code2` = 'SG', `code3` = 'SGP' WHERE `name` = 'Singapore'");
        $this->addSql("UPDATE `countries` SET `code2` = 'SK', `code3` = 'SVK' WHERE `name` = 'Slovakia'");
        $this->addSql("UPDATE `countries` SET `code2` = 'SI', `code3` = 'SVN' WHERE `name` = 'Slovenia'");
        $this->addSql("UPDATE `countries` SET `code2` = 'SB', `code3` = 'SLB' WHERE `name` = 'Solomon Islands'");
        $this->addSql("UPDATE `countries` SET `code2` = 'SO', `code3` = 'SOM' WHERE `name` = 'Somalia'");
        $this->addSql("UPDATE `countries` SET `code2` = 'ZA', `code3` = 'ZAF' WHERE `name` = 'South Africa'");
        $this->addSql("UPDATE `countries` SET `code2` = 'GS', `code3` = 'SGS' WHERE `name` = 'South Georgia and the South Sandwich Islands'");
        $this->addSql("UPDATE `countries` SET `code2` = 'ES', `code3` = 'ESP' WHERE `name` = 'Spain'");
        $this->addSql("UPDATE `countries` SET `code2` = 'LK', `code3` = 'LKA' WHERE `name` = 'Sri Lanka'");
        $this->addSql("UPDATE `countries` SET `code2` = 'SD', `code3` = 'SDN' WHERE `name` = 'Sudan'");
        $this->addSql("UPDATE `countries` SET `code2` = 'SR', `code3` = 'SUR' WHERE `name` = 'Suriname'");
        $this->addSql("UPDATE `countries` SET `code2` = 'SJ', `code3` = 'SJM' WHERE `name` = 'Svalbard and Jan Mayen'");
        $this->addSql("UPDATE `countries` SET `code2` = 'SZ', `code3` = 'SWZ' WHERE `name` = 'Swaziland'");
        $this->addSql("UPDATE `countries` SET `code2` = 'SE', `code3` = 'SWE' WHERE `name` = 'Sweden'");
        $this->addSql("UPDATE `countries` SET `code2` = 'CH', `code3` = 'CHE' WHERE `name` = 'Switzerland'");
        $this->addSql("UPDATE `countries` SET `code2` = 'SY', `code3` = 'SYR' WHERE `name` = 'Syrian Arab Republic'");

        $this->addSql("UPDATE `countries` SET `code2` = 'TW', `code3` = 'TWN' WHERE `name` = 'Taiwan, Republic of China'");
        $this->addSql("UPDATE `countries` SET `code2` = 'TJ', `code3` = 'TJK' WHERE `name` = 'Tajikistan'");
        $this->addSql("UPDATE `countries` SET `code2` = 'TZ', `code3` = 'TZA' WHERE `name` = 'Tanzania, United Republic of'");
        $this->addSql("UPDATE `countries` SET `code2` = 'TH', `code3` = 'THA' WHERE `name` = 'Thailand'");
        $this->addSql("UPDATE `countries` SET `code2` = 'TL', `code3` = 'TLS' WHERE `name` = 'Timor-Leste'");
        $this->addSql("UPDATE `countries` SET `code2` = 'TG', `code3` = 'TGO' WHERE `name` = 'Togo'");
        $this->addSql("UPDATE `countries` SET `code2` = 'TK', `code3` = 'TKL' WHERE `name` = 'Tokelau'");
        $this->addSql("UPDATE `countries` SET `code2` = 'TO', `code3` = 'TON' WHERE `name` = 'Tonga'");
        $this->addSql("UPDATE `countries` SET `code2` = 'TT', `code3` = 'TTO' WHERE `name` = 'Trinidad and Tobago'");
        $this->addSql("UPDATE `countries` SET `code2` = 'TN', `code3` = 'TUN' WHERE `name` = 'Tunisia'");
        $this->addSql("UPDATE `countries` SET `code2` = 'TR', `code3` = 'TUR' WHERE `name` = 'Turkey'");
        $this->addSql("UPDATE `countries` SET `code2` = 'TM', `code3` = 'TKM' WHERE `name` = 'Turkmenistan'");
        $this->addSql("UPDATE `countries` SET `code2` = 'TC', `code3` = 'TCA' WHERE `name` = 'Turks and Caicos Islands'");
        $this->addSql("UPDATE `countries` SET `code2` = 'TV', `code3` = 'TUV' WHERE `name` = 'Tuvalu'");

        $this->addSql("UPDATE `countries` SET `code2` = 'UG', `code3` = 'UGA' WHERE `name` = 'Uganda'");
        $this->addSql("UPDATE `countries` SET `code2` = 'UA', `code3` = 'UKR' WHERE `name` = 'Ukraine'");
        $this->addSql("UPDATE `countries` SET `code2` = 'AE', `code3` = 'ARE' WHERE `name` = 'United Arab Emirates'");
        $this->addSql("UPDATE `countries` SET `code2` = 'GB', `code3` = 'GBR' WHERE `name` = 'United Kingdom'");
        $this->addSql("UPDATE `countries` SET `code2` = 'US', `code3` = 'USA' WHERE `name` = 'United States'");
        $this->addSql("UPDATE `countries` SET `code2` = 'UM', `code3` = 'UMI' WHERE `name` = 'United States Minor Outlying Islands'");
        $this->addSql("UPDATE `countries` SET `code2` = 'UY', `code3` = 'URY' WHERE `name` = 'Uruguay'");
        $this->addSql("UPDATE `countries` SET `code2` = 'UZ', `code3` = 'UZB' WHERE `name` = 'Uzbekistan'");

        $this->addSql("UPDATE `countries` SET `code2` = 'VU', `code3` = 'VUT' WHERE `name` = 'Vanuatu'");
        $this->addSql("UPDATE `countries` SET `code2` = 'VE', `code3` = 'VEN' WHERE `name` = 'Venezuela'");
        $this->addSql("UPDATE `countries` SET `code2` = 'VN', `code3` = 'VNM' WHERE `name` = 'Viet Nam'");
        $this->addSql("UPDATE `countries` SET `code2` = 'VI', `code3` = 'VIR' WHERE `name` = 'Virgin Islands, U.S.'");

        $this->addSql("UPDATE `countries` SET `code2` = 'WF', `code3` = 'WLF' WHERE `name` = 'Wallis and Futuna'");
        $this->addSql("UPDATE `countries` SET `code2` = 'EH', `code3` = 'ESH' WHERE `name` = 'Western Sahara'");

        $this->addSql("UPDATE `countries` SET `code2` = 'YE', `code3` = 'YEM' WHERE `name` = 'Yemen'");
        $this->addSql("UPDATE `countries` SET `code2` = 'ZM', `code3` = 'ZMB' WHERE `name` = 'Zambia'");
        $this->addSql("UPDATE `countries` SET `code2` = 'ZW', `code3` = 'ZWE' WHERE `name` = 'Zimbabwe'");
    }



    /**
     * @param Schema $schema
     */
    public function down(Schema $schema): void
    {
        $sql = <<<'SQL'
        DELETE FROM `countries`;
SQL;
    }
}
