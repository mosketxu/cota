<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PaisesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('paises')->delete();
        
        \DB::table('paises')->insert(array (
            0 => 
            array (
                'id' => 'AD',
                'pais' => 'Andorra',
                'c3' => 'AND',
            ),
            1 => 
            array (
                'id' => 'AE',
                'pais' => 'Emiratos Árabes Unidos',
                'c3' => 'ARE',
            ),
            2 => 
            array (
                'id' => 'AF',
                'pais' => 'Afganistán',
                'c3' => 'AFG',
            ),
            3 => 
            array (
                'id' => 'AG',
                'pais' => 'Antigua y Barbuda',
                'c3' => 'ATG',
            ),
            4 => 
            array (
                'id' => 'AI',
                'pais' => 'Anguila',
                'c3' => 'AIA',
            ),
            5 => 
            array (
                'id' => 'AL',
                'pais' => 'Albania',
                'c3' => 'ALB',
            ),
            6 => 
            array (
                'id' => 'AM',
                'pais' => 'Armenia',
                'c3' => 'ARM',
            ),
            7 => 
            array (
                'id' => 'AO',
                'pais' => 'Angola',
                'c3' => 'AGO',
            ),
            8 => 
            array (
                'id' => 'AQ',
                'pais' => 'Antártida',
                'c3' => 'ATA',
            ),
            9 => 
            array (
                'id' => 'AR',
                'pais' => 'Argentina',
                'c3' => 'ARG',
            ),
            10 => 
            array (
                'id' => 'AS',
                'pais' => 'Samoa Americana',
                'c3' => 'ASM',
            ),
            11 => 
            array (
                'id' => 'AT',
                'pais' => 'Austria',
                'c3' => 'AUT',
            ),
            12 => 
            array (
                'id' => 'AU',
                'pais' => 'Australia',
                'c3' => 'AUS',
            ),
            13 => 
            array (
                'id' => 'AW',
                'pais' => 'Aruba',
                'c3' => 'ABW',
            ),
            14 => 
            array (
                'id' => 'AX',
                'pais' => 'Aland',
                'c3' => 'ALA',
            ),
            15 => 
            array (
                'id' => 'AZ',
                'pais' => 'Azerbaiyán',
                'c3' => 'AZE',
            ),
            16 => 
            array (
                'id' => 'BA',
                'pais' => 'Bosnia y Herzegovina',
                'c3' => 'BIH',
            ),
            17 => 
            array (
                'id' => 'BB',
                'pais' => 'Barbados',
                'c3' => 'BRB',
            ),
            18 => 
            array (
                'id' => 'BD',
                'pais' => 'Bangladés',
                'c3' => 'BGD',
            ),
            19 => 
            array (
                'id' => 'BE',
                'pais' => 'Bélgica',
                'c3' => 'BEL',
            ),
            20 => 
            array (
                'id' => 'BF',
                'pais' => 'Burkina Faso',
                'c3' => 'BFA',
            ),
            21 => 
            array (
                'id' => 'BG',
                'pais' => 'Bulgaria',
                'c3' => 'BGR',
            ),
            22 => 
            array (
                'id' => 'BH',
                'pais' => 'Baréin',
                'c3' => 'BHR',
            ),
            23 => 
            array (
                'id' => 'BI',
                'pais' => 'Burundi',
                'c3' => 'BDI',
            ),
            24 => 
            array (
                'id' => 'BJ',
                'pais' => 'Benín',
                'c3' => 'BEN',
            ),
            25 => 
            array (
                'id' => 'BL',
                'pais' => 'San Bartolomé',
                'c3' => 'BLM',
            ),
            26 => 
            array (
                'id' => 'BM',
                'pais' => 'Bermudas',
                'c3' => 'BMU',
            ),
            27 => 
            array (
                'id' => 'BN',
                'pais' => 'Brunéi',
                'c3' => 'BRN',
            ),
            28 => 
            array (
                'id' => 'BO',
                'pais' => 'Bolivia',
                'c3' => 'BOL',
            ),
            29 => 
            array (
                'id' => 'BQ',
                'pais' => 'Bonaire, San Eustaquio y Saba',
                'c3' => 'BES',
            ),
            30 => 
            array (
                'id' => 'BR',
                'pais' => 'Brasil',
                'c3' => 'BRA',
            ),
            31 => 
            array (
                'id' => 'BS',
                'pais' => 'Bahamas',
                'c3' => 'BHS',
            ),
            32 => 
            array (
                'id' => 'BT',
                'pais' => 'Bután',
                'c3' => 'BTN',
            ),
            33 => 
            array (
                'id' => 'BV',
                'pais' => 'Isla Bouvet',
                'c3' => 'BVT',
            ),
            34 => 
            array (
                'id' => 'BW',
                'pais' => 'Botsuana',
                'c3' => 'BWA',
            ),
            35 => 
            array (
                'id' => 'BY',
                'pais' => 'Bielorrusia',
                'c3' => 'BLR',
            ),
            36 => 
            array (
                'id' => 'BZ',
                'pais' => 'Belice',
                'c3' => 'BLZ',
            ),
            37 => 
            array (
                'id' => 'CA',
                'pais' => 'Canadá',
                'c3' => 'CAN',
            ),
            38 => 
            array (
                'id' => 'CC',
                'pais' => 'Islas Cocos',
                'c3' => 'CCK',
            ),
            39 => 
            array (
                'id' => 'CD',
                'pais' => 'República Democrática del Congo',
                'c3' => 'COD',
            ),
            40 => 
            array (
                'id' => 'CF',
                'pais' => 'República Centroafricana',
                'c3' => 'CAF',
            ),
            41 => 
            array (
                'id' => 'CG',
                'pais' => 'República del Congo',
                'c3' => 'COG',
            ),
            42 => 
            array (
                'id' => 'CH',
                'pais' => 'Suiza',
                'c3' => 'CHE',
            ),
            43 => 
            array (
                'id' => 'CI',
                'pais' => 'Costa de Marfil',
                'c3' => 'CIV',
            ),
            44 => 
            array (
                'id' => 'CK',
                'pais' => 'Islas Cook',
                'c3' => 'COK',
            ),
            45 => 
            array (
                'id' => 'CL',
                'pais' => 'Chile',
                'c3' => 'CHL',
            ),
            46 => 
            array (
                'id' => 'CM',
                'pais' => 'Camerún',
                'c3' => 'CMR',
            ),
            47 => 
            array (
                'id' => 'CN',
                'pais' => 'China',
                'c3' => 'CHN',
            ),
            48 => 
            array (
                'id' => 'CO',
                'pais' => 'Colombia',
                'c3' => 'COL',
            ),
            49 => 
            array (
                'id' => 'CR',
                'pais' => 'Costa Rica',
                'c3' => 'CRI',
            ),
            50 => 
            array (
                'id' => 'CU',
                'pais' => 'Cuba',
                'c3' => 'CUB',
            ),
            51 => 
            array (
                'id' => 'CV',
                'pais' => 'Cabo Verde',
                'c3' => 'CPV',
            ),
            52 => 
            array (
                'id' => 'CW',
                'pais' => 'Curazao',
                'c3' => 'CUW',
            ),
            53 => 
            array (
                'id' => 'CX',
                'pais' => 'Isla de Navidad',
                'c3' => 'CXR',
            ),
            54 => 
            array (
                'id' => 'CY',
                'pais' => 'Chipre',
                'c3' => 'CYP',
            ),
            55 => 
            array (
                'id' => 'CZ',
                'pais' => 'República Checa',
                'c3' => 'CZE',
            ),
            56 => 
            array (
                'id' => 'DE',
                'pais' => 'Alemania',
                'c3' => 'DEU',
            ),
            57 => 
            array (
                'id' => 'DJ',
                'pais' => 'Yibuti',
                'c3' => 'DJI',
            ),
            58 => 
            array (
                'id' => 'DK',
                'pais' => 'Dinamarca',
                'c3' => 'DNK',
            ),
            59 => 
            array (
                'id' => 'DM',
                'pais' => 'Dominica',
                'c3' => 'DMA',
            ),
            60 => 
            array (
                'id' => 'DO',
                'pais' => 'República Dominicana',
                'c3' => 'DOM',
            ),
            61 => 
            array (
                'id' => 'DZ',
                'pais' => 'Argelia',
                'c3' => 'DZA',
            ),
            62 => 
            array (
                'id' => 'EC',
                'pais' => 'Ecuador',
                'c3' => 'ECU',
            ),
            63 => 
            array (
                'id' => 'EE',
                'pais' => 'Estonia',
                'c3' => 'EST',
            ),
            64 => 
            array (
                'id' => 'EG',
                'pais' => 'Egipto',
                'c3' => 'EGY',
            ),
            65 => 
            array (
                'id' => 'EH',
                'pais' => 'República Árabe Saharaui Democrática',
                'c3' => 'ESH',
            ),
            66 => 
            array (
                'id' => 'ER',
                'pais' => 'Eritrea',
                'c3' => 'ERI',
            ),
            67 => 
            array (
                'id' => 'ES',
                'pais' => 'España',
                'c3' => 'ESP',
            ),
            68 => 
            array (
                'id' => 'ET',
                'pais' => 'Etiopía',
                'c3' => 'ETH',
            ),
            69 => 
            array (
                'id' => 'FI',
                'pais' => 'Finlandia',
                'c3' => 'FIN',
            ),
            70 => 
            array (
                'id' => 'FJ',
                'pais' => 'Fiyi',
                'c3' => 'FJI',
            ),
            71 => 
            array (
                'id' => 'FK',
                'pais' => 'Islas Malvinas',
                'c3' => 'FLK',
            ),
            72 => 
            array (
                'id' => 'FM',
                'pais' => 'Micronesia',
                'c3' => 'FSM',
            ),
            73 => 
            array (
                'id' => 'FO',
                'pais' => 'Islas Feroe',
                'c3' => 'FRO',
            ),
            74 => 
            array (
                'id' => 'FR',
                'pais' => 'Francia',
                'c3' => 'FRA',
            ),
            75 => 
            array (
                'id' => 'GA',
                'pais' => 'Gabón',
                'c3' => 'GAB',
            ),
            76 => 
            array (
                'id' => 'GB',
                'pais' => 'Reino Unido',
                'c3' => 'GBR',
            ),
            77 => 
            array (
                'id' => 'GD',
                'pais' => 'Granada',
                'c3' => 'GRD',
            ),
            78 => 
            array (
                'id' => 'GE',
                'pais' => 'Georgia',
                'c3' => 'GEO',
            ),
            79 => 
            array (
                'id' => 'GF',
                'pais' => 'Guayana Francesa',
                'c3' => 'GUF',
            ),
            80 => 
            array (
                'id' => 'GG',
                'pais' => 'Guernsey',
                'c3' => 'GGY',
            ),
            81 => 
            array (
                'id' => 'GH',
                'pais' => 'Ghana',
                'c3' => 'GHA',
            ),
            82 => 
            array (
                'id' => 'GI',
                'pais' => 'Gibraltar',
                'c3' => 'GIB',
            ),
            83 => 
            array (
                'id' => 'GL',
                'pais' => 'Groenlandia',
                'c3' => 'GRL',
            ),
            84 => 
            array (
                'id' => 'GM',
                'pais' => 'Gambia',
                'c3' => 'GMB',
            ),
            85 => 
            array (
                'id' => 'GN',
                'pais' => 'Guinea',
                'c3' => 'GIN',
            ),
            86 => 
            array (
                'id' => 'GP',
                'pais' => 'Guadalupe',
                'c3' => 'GLP',
            ),
            87 => 
            array (
                'id' => 'GQ',
                'pais' => 'Guinea Ecuatorial',
                'c3' => 'GNQ',
            ),
            88 => 
            array (
                'id' => 'GR',
                'pais' => 'Grecia',
                'c3' => 'GRC',
            ),
            89 => 
            array (
                'id' => 'GS',
                'pais' => 'Islas Georgias del Sur y Sandwich del Sur',
                'c3' => 'SGS',
            ),
            90 => 
            array (
                'id' => 'GT',
                'pais' => 'Guatemala',
                'c3' => 'GTM',
            ),
            91 => 
            array (
                'id' => 'GU',
                'pais' => 'Guam',
                'c3' => 'GUM',
            ),
            92 => 
            array (
                'id' => 'GW',
                'pais' => 'Guinea-Bisáu',
                'c3' => 'GNB',
            ),
            93 => 
            array (
                'id' => 'GY',
                'pais' => 'Guyana',
                'c3' => 'GUY',
            ),
            94 => 
            array (
                'id' => 'HK',
                'pais' => 'Hong Kong',
                'c3' => 'HKG',
            ),
            95 => 
            array (
                'id' => 'HM',
                'pais' => 'Islas Heard y McDonald',
                'c3' => 'HMD',
            ),
            96 => 
            array (
                'id' => 'HN',
                'pais' => 'Honduras',
                'c3' => 'HND',
            ),
            97 => 
            array (
                'id' => 'HR',
                'pais' => 'Croacia',
                'c3' => 'HRV',
            ),
            98 => 
            array (
                'id' => 'HT',
                'pais' => 'Haití',
                'c3' => 'HTI',
            ),
            99 => 
            array (
                'id' => 'HU',
                'pais' => 'Hungría',
                'c3' => 'HUN',
            ),
            100 => 
            array (
                'id' => 'id',
                'pais' => 'Indonesia',
                'c3' => 'idN',
            ),
            101 => 
            array (
                'id' => 'IE',
                'pais' => 'Irlanda',
                'c3' => 'IRL',
            ),
            102 => 
            array (
                'id' => 'IL',
                'pais' => 'Israel',
                'c3' => 'ISR',
            ),
            103 => 
            array (
                'id' => 'IM',
                'pais' => 'Isla de Man',
                'c3' => 'IMN',
            ),
            104 => 
            array (
                'id' => 'IN',
                'pais' => 'India',
                'c3' => 'IND',
            ),
            105 => 
            array (
                'id' => 'IO',
                'pais' => 'Territorio Británico del Océano Índico',
                'c3' => 'IOT',
            ),
            106 => 
            array (
                'id' => 'IQ',
                'pais' => 'Irak',
                'c3' => 'IRQ',
            ),
            107 => 
            array (
                'id' => 'IR',
                'pais' => 'Irán',
                'c3' => 'IRN',
            ),
            108 => 
            array (
                'id' => 'IS',
                'pais' => 'Islandia',
                'c3' => 'ISL',
            ),
            109 => 
            array (
                'id' => 'IT',
                'pais' => 'Italia',
                'c3' => 'ITA',
            ),
            110 => 
            array (
                'id' => 'JE',
                'pais' => 'Jersey',
                'c3' => 'JEY',
            ),
            111 => 
            array (
                'id' => 'JM',
                'pais' => 'Jamaica',
                'c3' => 'JAM',
            ),
            112 => 
            array (
                'id' => 'JO',
                'pais' => 'Jordania',
                'c3' => 'JOR',
            ),
            113 => 
            array (
                'id' => 'JP',
                'pais' => 'Japón',
                'c3' => 'JPN',
            ),
            114 => 
            array (
                'id' => 'KE',
                'pais' => 'Kenia',
                'c3' => 'KEN',
            ),
            115 => 
            array (
                'id' => 'KG',
                'pais' => 'Kirguistán',
                'c3' => 'KGZ',
            ),
            116 => 
            array (
                'id' => 'KH',
                'pais' => 'Camboya',
                'c3' => 'KHM',
            ),
            117 => 
            array (
                'id' => 'KI',
                'pais' => 'Kiribati',
                'c3' => 'KIR',
            ),
            118 => 
            array (
                'id' => 'KM',
                'pais' => 'Comoras',
                'c3' => 'COM',
            ),
            119 => 
            array (
                'id' => 'KN',
                'pais' => 'San Cristóbal y Nieves',
                'c3' => 'KNA',
            ),
            120 => 
            array (
                'id' => 'KP',
                'pais' => 'Corea del Norte',
                'c3' => 'PRK',
            ),
            121 => 
            array (
                'id' => 'KR',
                'pais' => 'Corea del Sur',
                'c3' => 'KOR',
            ),
            122 => 
            array (
                'id' => 'KW',
                'pais' => 'Kuwait',
                'c3' => 'KWT',
            ),
            123 => 
            array (
                'id' => 'KY',
                'pais' => 'Islas Caimán',
                'c3' => 'CYM',
            ),
            124 => 
            array (
                'id' => 'KZ',
                'pais' => 'Kazajistán',
                'c3' => 'KAZ',
            ),
            125 => 
            array (
                'id' => 'LA',
                'pais' => 'Laos',
                'c3' => 'LAO',
            ),
            126 => 
            array (
                'id' => 'LB',
                'pais' => 'Líbano',
                'c3' => 'LBN',
            ),
            127 => 
            array (
                'id' => 'LC',
                'pais' => 'Santa Lucía',
                'c3' => 'LCA',
            ),
            128 => 
            array (
                'id' => 'LI',
                'pais' => 'Liechtenstein',
                'c3' => 'LIE',
            ),
            129 => 
            array (
                'id' => 'LK',
                'pais' => 'Sri Lanka',
                'c3' => 'LKA',
            ),
            130 => 
            array (
                'id' => 'LR',
                'pais' => 'Liberia',
                'c3' => 'LBR',
            ),
            131 => 
            array (
                'id' => 'LS',
                'pais' => 'Lesoto',
                'c3' => 'LSO',
            ),
            132 => 
            array (
                'id' => 'LT',
                'pais' => 'Lituania',
                'c3' => 'LTU',
            ),
            133 => 
            array (
                'id' => 'LU',
                'pais' => 'Luxemburgo',
                'c3' => 'LUX',
            ),
            134 => 
            array (
                'id' => 'LV',
                'pais' => 'Letonia',
                'c3' => 'LVA',
            ),
            135 => 
            array (
                'id' => 'LY',
                'pais' => 'Libia',
                'c3' => 'LBY',
            ),
            136 => 
            array (
                'id' => 'MA',
                'pais' => 'Marruecos',
                'c3' => 'MAR',
            ),
            137 => 
            array (
                'id' => 'MC',
                'pais' => 'Mónaco',
                'c3' => 'MCO',
            ),
            138 => 
            array (
                'id' => 'MD',
                'pais' => 'Moldavia',
                'c3' => 'MDA',
            ),
            139 => 
            array (
                'id' => 'ME',
                'pais' => 'Montenegro',
                'c3' => 'MNE',
            ),
            140 => 
            array (
                'id' => 'MF',
                'pais' => 'San Martín',
                'c3' => 'MAF',
            ),
            141 => 
            array (
                'id' => 'MG',
                'pais' => 'Madagascar',
                'c3' => 'MDG',
            ),
            142 => 
            array (
                'id' => 'MH',
                'pais' => 'Islas Marshall',
                'c3' => 'MHL',
            ),
            143 => 
            array (
                'id' => 'MK',
                'pais' => 'Macedonia',
                'c3' => 'MKD',
            ),
            144 => 
            array (
                'id' => 'ML',
                'pais' => 'Malí',
                'c3' => 'MLI',
            ),
            145 => 
            array (
                'id' => 'MM',
                'pais' => 'Myanmar',
                'c3' => 'MMR',
            ),
            146 => 
            array (
                'id' => 'MN',
                'pais' => 'Mongolia',
                'c3' => 'MNG',
            ),
            147 => 
            array (
                'id' => 'MO',
                'pais' => 'Macao',
                'c3' => 'MAC',
            ),
            148 => 
            array (
                'id' => 'MP',
                'pais' => 'Islas Marianas del Norte',
                'c3' => 'MNP',
            ),
            149 => 
            array (
                'id' => 'MQ',
                'pais' => 'Martinica',
                'c3' => 'MTQ',
            ),
            150 => 
            array (
                'id' => 'MR',
                'pais' => 'Mauritania',
                'c3' => 'MRT',
            ),
            151 => 
            array (
                'id' => 'MS',
                'pais' => 'Montserrat',
                'c3' => 'MSR',
            ),
            152 => 
            array (
                'id' => 'MT',
                'pais' => 'Malta',
                'c3' => 'MLT',
            ),
            153 => 
            array (
                'id' => 'MU',
                'pais' => 'Mauricio',
                'c3' => 'MUS',
            ),
            154 => 
            array (
                'id' => 'MV',
                'pais' => 'Maldivas',
                'c3' => 'MDV',
            ),
            155 => 
            array (
                'id' => 'MW',
                'pais' => 'Malaui',
                'c3' => 'MWI',
            ),
            156 => 
            array (
                'id' => 'MX',
                'pais' => 'México',
                'c3' => 'MEX',
            ),
            157 => 
            array (
                'id' => 'MY',
                'pais' => 'Malasia',
                'c3' => 'MYS',
            ),
            158 => 
            array (
                'id' => 'MZ',
                'pais' => 'Mozambique',
                'c3' => 'MOZ',
            ),
            159 => 
            array (
                'id' => 'NA',
                'pais' => 'Namibia',
                'c3' => 'NAM',
            ),
            160 => 
            array (
                'id' => 'NC',
                'pais' => 'Nueva Caledonia',
                'c3' => 'NCL',
            ),
            161 => 
            array (
                'id' => 'NE',
                'pais' => 'Níger',
                'c3' => 'NER',
            ),
            162 => 
            array (
                'id' => 'NF',
                'pais' => 'Norfolk',
                'c3' => 'NFK',
            ),
            163 => 
            array (
                'id' => 'NG',
                'pais' => 'Nigeria',
                'c3' => 'NGA',
            ),
            164 => 
            array (
                'id' => 'NI',
                'pais' => 'Nicaragua',
                'c3' => 'NIC',
            ),
            165 => 
            array (
                'id' => 'NL',
                'pais' => 'Países Bajos',
                'c3' => 'NLD',
            ),
            166 => 
            array (
                'id' => 'NO',
                'pais' => 'Noruega',
                'c3' => 'NOR',
            ),
            167 => 
            array (
                'id' => 'NP',
                'pais' => 'Nepal',
                'c3' => 'NPL',
            ),
            168 => 
            array (
                'id' => 'NR',
                'pais' => 'Nauru',
                'c3' => 'NRU',
            ),
            169 => 
            array (
                'id' => 'NU',
                'pais' => 'Niue',
                'c3' => 'NIU',
            ),
            170 => 
            array (
                'id' => 'NZ',
                'pais' => 'Nueva Zelanda',
                'c3' => 'NZL',
            ),
            171 => 
            array (
                'id' => 'OM',
                'pais' => 'Omán',
                'c3' => 'OMN',
            ),
            172 => 
            array (
                'id' => 'PA',
                'pais' => 'Panamá',
                'c3' => 'PAN',
            ),
            173 => 
            array (
                'id' => 'PE',
                'pais' => 'Perú',
                'c3' => 'PER',
            ),
            174 => 
            array (
                'id' => 'PF',
                'pais' => 'Polinesia Francesa',
                'c3' => 'PYF',
            ),
            175 => 
            array (
                'id' => 'PG',
                'pais' => 'Papúa Nueva Guinea',
                'c3' => 'PNG',
            ),
            176 => 
            array (
                'id' => 'PH',
                'pais' => 'Filipinas',
                'c3' => 'PHL',
            ),
            177 => 
            array (
                'id' => 'PK',
                'pais' => 'Pakistán',
                'c3' => 'PAK',
            ),
            178 => 
            array (
                'id' => 'PL',
                'pais' => 'Polonia',
                'c3' => 'POL',
            ),
            179 => 
            array (
                'id' => 'PM',
                'pais' => 'San Pedro y Miquelón',
                'c3' => 'SPM',
            ),
            180 => 
            array (
                'id' => 'PN',
                'pais' => 'Islas Pitcairn',
                'c3' => 'PCN',
            ),
            181 => 
            array (
                'id' => 'PR',
                'pais' => 'Puerto Rico',
                'c3' => 'PRI',
            ),
            182 => 
            array (
                'id' => 'PS',
                'pais' => 'Palestina',
                'c3' => 'PSE',
            ),
            183 => 
            array (
                'id' => 'PT',
                'pais' => 'Portugal',
                'c3' => 'PRT',
            ),
            184 => 
            array (
                'id' => 'PW',
                'pais' => 'Palaos',
                'c3' => 'PLW',
            ),
            185 => 
            array (
                'id' => 'PY',
                'pais' => 'Paraguay',
                'c3' => 'PRY',
            ),
            186 => 
            array (
                'id' => 'QA',
                'pais' => 'Catar',
                'c3' => 'QAT',
            ),
            187 => 
            array (
                'id' => 'RE',
                'pais' => 'Reunión',
                'c3' => 'REU',
            ),
            188 => 
            array (
                'id' => 'RO',
                'pais' => 'Rumania',
                'c3' => 'ROU',
            ),
            189 => 
            array (
                'id' => 'RS',
                'pais' => 'Serbia',
                'c3' => 'SRB',
            ),
            190 => 
            array (
                'id' => 'RU',
                'pais' => 'Rusia',
                'c3' => 'RUS',
            ),
            191 => 
            array (
                'id' => 'RW',
                'pais' => 'Ruanda',
                'c3' => 'RWA',
            ),
            192 => 
            array (
                'id' => 'SA',
                'pais' => 'Arabia Saudita',
                'c3' => 'SAU',
            ),
            193 => 
            array (
                'id' => 'SB',
                'pais' => 'Islas Salomón',
                'c3' => 'SLB',
            ),
            194 => 
            array (
                'id' => 'SC',
                'pais' => 'Seychelles',
                'c3' => 'SYC',
            ),
            195 => 
            array (
                'id' => 'SD',
                'pais' => 'Sudán',
                'c3' => 'SDN',
            ),
            196 => 
            array (
                'id' => 'SE',
                'pais' => 'Suecia',
                'c3' => 'SWE',
            ),
            197 => 
            array (
                'id' => 'SG',
                'pais' => 'Singapur',
                'c3' => 'SGP',
            ),
            198 => 
            array (
                'id' => 'SH',
                'pais' => 'Santa Elena, Ascensión y Tristán de Acuña',
                'c3' => 'SHN',
            ),
            199 => 
            array (
                'id' => 'SI',
                'pais' => 'Eslovenia',
                'c3' => 'SVN',
            ),
            200 => 
            array (
                'id' => 'SJ',
                'pais' => 'Svalbard y Jan Mayen',
                'c3' => 'SJM',
            ),
            201 => 
            array (
                'id' => 'SK',
                'pais' => 'Eslovaquia',
                'c3' => 'SVK',
            ),
            202 => 
            array (
                'id' => 'SL',
                'pais' => 'Sierra Leona',
                'c3' => 'SLE',
            ),
            203 => 
            array (
                'id' => 'SM',
                'pais' => 'San Marino',
                'c3' => 'SMR',
            ),
            204 => 
            array (
                'id' => 'SN',
                'pais' => 'Senegal',
                'c3' => 'SEN',
            ),
            205 => 
            array (
                'id' => 'SO',
                'pais' => 'Somalia',
                'c3' => 'SOM',
            ),
            206 => 
            array (
                'id' => 'SR',
                'pais' => 'Surinam',
                'c3' => 'SUR',
            ),
            207 => 
            array (
                'id' => 'SS',
                'pais' => 'Sudán del Sur',
                'c3' => 'SSD',
            ),
            208 => 
            array (
                'id' => 'ST',
                'pais' => 'Santo Tomé y Príncipe',
                'c3' => 'STP',
            ),
            209 => 
            array (
                'id' => 'SV',
                'pais' => 'El Salvador',
                'c3' => 'SLV',
            ),
            210 => 
            array (
                'id' => 'SX',
                'pais' => 'Sint Maarten',
                'c3' => 'SXM',
            ),
            211 => 
            array (
                'id' => 'SY',
                'pais' => 'Siria',
                'c3' => 'SYR',
            ),
            212 => 
            array (
                'id' => 'SZ',
                'pais' => 'Suazilandia',
                'c3' => 'SWZ',
            ),
            213 => 
            array (
                'id' => 'TC',
                'pais' => 'Islas Turcas y Caicos',
                'c3' => 'TCA',
            ),
            214 => 
            array (
                'id' => 'TD',
                'pais' => 'Chad',
                'c3' => 'TCD',
            ),
            215 => 
            array (
                'id' => 'TF',
                'pais' => 'Tierras Australes y Antárticas Francesas',
                'c3' => 'ATF',
            ),
            216 => 
            array (
                'id' => 'TG',
                'pais' => 'Togo',
                'c3' => 'TGO',
            ),
            217 => 
            array (
                'id' => 'TH',
                'pais' => 'Tailandia',
                'c3' => 'THA',
            ),
            218 => 
            array (
                'id' => 'TJ',
                'pais' => 'Tayikistán',
                'c3' => 'TJK',
            ),
            219 => 
            array (
                'id' => 'TK',
                'pais' => 'Tokelau',
                'c3' => 'TKL',
            ),
            220 => 
            array (
                'id' => 'TL',
                'pais' => 'Timor Oriental',
                'c3' => 'TLS',
            ),
            221 => 
            array (
                'id' => 'TM',
                'pais' => 'Turkmenistán',
                'c3' => 'TKM',
            ),
            222 => 
            array (
                'id' => 'TN',
                'pais' => 'Túnez',
                'c3' => 'TUN',
            ),
            223 => 
            array (
                'id' => 'TO',
                'pais' => 'Tonga',
                'c3' => 'TON',
            ),
            224 => 
            array (
                'id' => 'TR',
                'pais' => 'Turquía',
                'c3' => 'TUR',
            ),
            225 => 
            array (
                'id' => 'TT',
                'pais' => 'Trinidad y Tobago',
                'c3' => 'TTO',
            ),
            226 => 
            array (
                'id' => 'TV',
                'pais' => 'Tuvalu',
                'c3' => 'TUV',
            ),
            227 => 
            array (
                'id' => 'TW',
            'pais' => 'Taiwán (República de China)',
                'c3' => 'TWN',
            ),
            228 => 
            array (
                'id' => 'TZ',
                'pais' => 'Tanzania',
                'c3' => 'TZA',
            ),
            229 => 
            array (
                'id' => 'UA',
                'pais' => 'Ucrania',
                'c3' => 'UKR',
            ),
            230 => 
            array (
                'id' => 'UG',
                'pais' => 'Uganda',
                'c3' => 'UGA',
            ),
            231 => 
            array (
                'id' => 'UM',
                'pais' => 'Islas ultramarinas de Estados Unidos',
                'c3' => 'UMI',
            ),
            232 => 
            array (
                'id' => 'US',
                'pais' => 'Estados Unidos',
                'c3' => 'USA',
            ),
            233 => 
            array (
                'id' => 'UY',
                'pais' => 'Uruguay',
                'c3' => 'URY',
            ),
            234 => 
            array (
                'id' => 'UZ',
                'pais' => 'Uzbekistán',
                'c3' => 'UZB',
            ),
            235 => 
            array (
                'id' => 'VA',
                'pais' => 'Vaticano, Ciudad del',
                'c3' => 'VAT',
            ),
            236 => 
            array (
                'id' => 'VC',
                'pais' => 'San Vicente y las Granadinas',
                'c3' => 'VCT',
            ),
            237 => 
            array (
                'id' => 'VE',
                'pais' => 'Venezuela',
                'c3' => 'VEN',
            ),
            238 => 
            array (
                'id' => 'VG',
                'pais' => 'Islas Vírgenes Británicas',
                'c3' => 'VGB',
            ),
            239 => 
            array (
                'id' => 'VI',
                'pais' => 'Islas Vírgenes de los Estados Unidos',
                'c3' => 'VIR',
            ),
            240 => 
            array (
                'id' => 'VN',
                'pais' => 'Vietnam',
                'c3' => 'VNM',
            ),
            241 => 
            array (
                'id' => 'VU',
                'pais' => 'Vanuatu',
                'c3' => 'VUT',
            ),
            242 => 
            array (
                'id' => 'WF',
                'pais' => 'Wallis y Futuna',
                'c3' => 'WLF',
            ),
            243 => 
            array (
                'id' => 'WS',
                'pais' => 'Samoa',
                'c3' => 'WSM',
            ),
            244 => 
            array (
                'id' => 'YE',
                'pais' => 'Yemen',
                'c3' => 'YEM',
            ),
            245 => 
            array (
                'id' => 'YT',
                'pais' => 'Mayotte',
                'c3' => 'MYT',
            ),
            246 => 
            array (
                'id' => 'ZA',
                'pais' => 'Sudáfrica',
                'c3' => 'ZAF',
            ),
            247 => 
            array (
                'id' => 'ZM',
                'pais' => 'Zambia',
                'c3' => 'ZMB',
            ),
            248 => 
            array (
                'id' => 'ZW',
                'pais' => 'Zimbabue',
                'c3' => 'ZWE',
            ),
        ));
        
        
    }
}