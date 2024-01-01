<?php
//if (!defined("_MPDF_SYSTEM_TTFONTS")) { define("_MPDF_SYSTEM_TTFONTS", '/home/mayansource/public_html/customer/ttffonts/'); }

$this->backupSubsFont = array('dejavusanscondensed','freeserif', 'poppins');
$this->backupSIPFont = 'sun-extb';
$this->fonttrans = array(
	'times' => 'timesnewroman',
	'courier' => 'couriernew',
	'trebuchet' => 'trebuchetms',
	'comic' => 'comicsansms',
	'poppins' => 'poppins',
	'franklin' => 'franklingothicbook',
	'ocr-b' => 'ocrb',
	'ocr-b10bt' => 'ocrb',
	'damase' => 'mph2bdamase',
);

$this->fontdata = array(
    "fontawesome" => array(
            'R' => "fontawesome.ttf",
    ),
    "poppins" => array(
        'R' => 'Poppins-Regular.ttf',
        'B' => 'Poppins-Bold.ttf',
    ),
	"dejavusanscondensed" => array(
		'R' => "DejaVuSansCondensed.ttf",
		'B' => "DejaVuSansCondensed-Bold.ttf",
		'I' => "DejaVuSansCondensed-Oblique.ttf",
		'BI' => "DejaVuSansCondensed-BoldOblique.ttf",
		'useOTL' => 0xFF,
		'useKashida' => 75,
		),
	"dejavusans" => array(
		'R' => "DejaVuSans.ttf",
		'B' => "DejaVuSans-Bold.ttf",
		'I' => "DejaVuSans-Oblique.ttf",
		'BI' => "DejaVuSans-BoldOblique.ttf",
		'useOTL' => 0xFF,
		'useKashida' => 75,
		),
	"dejavuserif" => array(
		'R' => "DejaVuSerif.ttf",
		'B' => "DejaVuSerif-Bold.ttf",
		'I' => "DejaVuSerif-Italic.ttf",
		'BI' => "DejaVuSerif-BoldItalic.ttf",
		),
	"dejavuserifcondensed" => array(
		'R' => "DejaVuSerifCondensed.ttf",
		'B' => "DejaVuSerifCondensed-Bold.ttf",
		'I' => "DejaVuSerifCondensed-Italic.ttf",
		'BI' => "DejaVuSerifCondensed-BoldItalic.ttf",
		),
	"dejavusansmono" => array(
		'R' => "DejaVuSansMono.ttf",
		'B' => "DejaVuSansMono-Bold.ttf",
		'I' => "DejaVuSansMono-Oblique.ttf",
		'BI' => "DejaVuSansMono-BoldOblique.ttf",
		'useOTL' => 0xFF,
		'useKashida' => 75,
		),
	"freesans" => array(
		'R' => "FreeSans.ttf",
		'B' => "FreeSansBold.ttf",
		'I' => "FreeSansOblique.ttf",
		'BI' => "FreeSansBoldOblique.ttf",
		'useOTL' => 0xFF,
		),
	"freeserif" => array(
		'R' => "FreeSerif.ttf",
		'B' => "FreeSerifBold.ttf",
		'I' => "FreeSerifItalic.ttf",
		'BI' => "FreeSerifBoldItalic.ttf",
		'useOTL' => 0xFF,
		'useKashida' => 75,
		),
	"freemono" => array(
		'R' => "FreeMono.ttf",
		'B' => "FreeMonoBold.ttf",
		'I' => "FreeMonoOblique.ttf",
		'BI' => "FreeMonoBoldOblique.ttf",
		),

	"ocrb" => array(
		'R' => "ocrb10.ttf",
		),

	"estrangeloedessa" => array(	/* Syriac */
		'R' => "SyrCOMEdessa.otf",
		'useOTL' => 0xFF,
		),

	"kaputaunicode" => array(	/* Sinhala  */
		'R' => "kaputaunicode.ttf",
		'useOTL' => 0xFF,
		),

	"abyssinicasil" => array(		/* Ethiopic */
		'R' => "Abyssinica_SIL.ttf",
		'useOTL' => 0xFF,
		),
	"aboriginalsans" => array(		/* Cherokee and Canadian */
		'R' => "AboriginalSansREGULAR.ttf",
		),
	"jomolhari" => array(	/* Tibetan */
		'R' => "Jomolhari.ttf",
		'useOTL' => 0xFF,
		),
	"sundaneseunicode" => array(	/* Sundanese */
		'R' => "SundaneseUnicode-1.0.5.ttf",
		'useOTL' => 0xFF,
		),
	"taiheritagepro" => array(	/* Tai Viet */
		'R' => "TaiHeritagePro.ttf",
		),
	"aegean" => array(
		'R' => "Aegean.otf",
		'useOTL' => 0xFF,
		),
	"aegyptus" => array(
		'R' => "Aegyptus.otf",
		'useOTL' => 0xFF,
		),
	"akkadian" => array(		/* Cuneiform */
		'R' => "Akkadian.otf",
		'useOTL' => 0xFF,
		),
	"quivira" => array(
		'R' => "Quivira.otf",
		'useOTL' => 0xFF,
		),
	"eeyekunicode" => array(	/* Meetei Mayek */
		'R' => "Eeyek.ttf",
		),
	"lannaalif" => array(		/* Tai Tham */
		'R' => "lannaalif-v1-03.ttf",
		'useOTL' => 0xFF,
		),
	"daibannasilbook" => array(	/* New Tai Lue */
		'R' => "DBSILBR.ttf",
		),
	"garuda" => array(	/* Thai */
		'R' => "Garuda.ttf",
		'B' => "Garuda-Bold.ttf",
		'I' => "Garuda-Oblique.ttf",
		'BI' => "Garuda-BoldOblique.ttf",
		'useOTL' => 0xFF,
		),
	"khmeros" => array(	/* Khmer */
		'R' => "KhmerOS.ttf",
		'useOTL' => 0xFF,
		),
	"dhyana" => array(	/* Lao fonts */
		'R' => "Dhyana-Regular.ttf",
		'B' => "Dhyana-Bold.ttf",
		'useOTL' => 0xFF,
		),

	"tharlon" => array(	/* Myanmar / Burmese */
		'R' => "Tharlon-Regular.ttf",
		'useOTL' => 0xFF,
		),
	"padaukbook" => array(	/* Myanmar / Burmese */
		'R' => "Padauk-book.ttf",
		'useOTL' => 0xFF,
		),
	"zawgyi-one" => array(	/* Myanmar / Burmese */
		'R' => "ZawgyiOne.ttf",
		'useOTL' => 0xFF,
		),
	"ayar" => array(	/* Myanmar / Burmese */
		'R' => "ayar.ttf",
		'useOTL' => 0xFF,
		),

	"taameydavidclm" => array(	/* Hebrew with full Niqud and Cantillation */
		'R' => "TaameyDavidCLM-Medium.ttf",
		'useOTL' => 0xFF,
		),

	"mph2bdamase" => array(
		'R' => "damase_v.2.ttf",
		),
	"lohitkannada" => array(
		'R' => "Lohit-Kannada.ttf",
		'useOTL' => 0xFF,
		),
	"pothana2000" => array(
		'R' => "Pothana2000.ttf",
		'useOTL' => 0xFF,
		),
		
	"xbriyaz" => array(
		'R' => "XB Riyaz.ttf",
		'B' => "XB RiyazBd.ttf",
		'I' => "XB RiyazIt.ttf",
		'BI' => "XB RiyazBdIt.ttf",
		'useOTL' => 0xFF,
		'useKashida' => 75,
		),
	"lateef" => array(	/* Sindhi, Pashto and Urdu */
		'R' => "LateefRegOT.ttf",
		'useOTL' => 0xFF,
		'useKashida' => 75,
		),
	"kfgqpcuthmantahanaskh" => array(	/* KFGQPC Uthman Taha Naskh - Koranic */
		'R' => "Uthman.otf",
		'useOTL' => 0xFF,
		'useKashida' => 75,
		),

	"sun-exta" => array(
		'R' => "Sun-ExtA.ttf",
		'sip-ext' => 'sun-extb',		/* SIP=Plane2 Unicode (extension B) */
		),
	"sun-extb" => array(
		'R' => "Sun-ExtB.ttf",
		),
	"unbatang" => array(	/* Korean */
		'R' => "UnBatang_0613.ttf",
		),


);

$this->BMPonly = array(
	"dejavusanscondensed",	
	"dejavusans",
	"dejavuserifcondensed",
	"dejavuserif",
	"dejavusansmono",
	);

$this->sans_fonts = array('dejavusanscondensed','sans','sans-serif','cursive','fantasy','dejavusans','freesans','liberationsans', 
				'arial','helvetica','verdana','geneva','lucida','arialnarrow','arialblack','arialunicodems',
				'franklin','franklingothicbook','tahoma','garuda','calibri','trebuchet','lucidagrande','microsoftsansserif',
				'trebuchetms','lucidasansunicode','franklingothicmedium','albertusmedium','xbriyaz','albasuper','quillscript', 'poppins',
				'humanist777','humanist777black','humanist777light','futura','hobo','segoeprint'

);

$this->serif_fonts = array('dejavuserifcondensed','serif','dejavuserif','freeserif','liberationserif',
				'timesnewroman','times','centuryschoolbookl','palatinolinotype','centurygothic',
				'bookmanoldstyle','bookantiqua','cyberbit','cambria',
				'norasi','charis','palatino','constantia','georgia','albertus','xbzar','algerian','garamond'
);

$this->mono_fonts = array('dejavusansmono','mono','monospace','freemono','liberationmono','courier', 'ocrb','ocr-b','lucidaconsole',
				'couriernew','monotypecorsiva'
);

?>