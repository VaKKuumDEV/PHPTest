<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

$it = new RecursiveDirectoryIterator("./models");
foreach(new RecursiveIteratorIterator($it) as $file){
    if($file->getExtension() == 'php'){
		echo $file->getPathname() . PHP_EOL;
		require $file->getPathname();
	}
}

$companies = [];
$randCompanies = mt_rand(5, 10);
for($i = 0; $i < $randCompanies; $i++){
	$company = new Company('Company #' . ($i + 1));
	$randDeliveries = mt_rand(7, 14);
	for($j = 0; $j < $randDeliveries; $j++){
		$type = mt_rand(1, 2);
		
		$del = null;
		if($type == 1) $del = new FastDelivery('base url', 'Addr from', 'Addr to', mt_rand(1, 10) / 10);
		else if($type == 2) $del = new SlowDelivery('base url', 'Addr from', 'Addr to', mt_rand(1, 10) / 10);
		
		if($del == null) throw new \Exception();
		$company->addDelivery($del);
	}
	
	$companies[] = $company;
}

//вывод вообще всех доставок для всех компаний
$deliveriesData = [];
foreach($companies as $company){
	$dels = [];
	foreach($company->getDeliveries() as $del) $dels[] = $del->getJson();
	$deliveriesData[$company->getName()] = $dels;
}

//вывод доставок для случайной компании
$randCompany = $companies[array_rand($companies)];
$randCompanyDels = [];
foreach($randCompany->getDeliveries() as $del) $randCompanyDels[] = $del->getJson();

$output = [
	'all' => $deliveriesData,
	'rand' => $randCompanyDels,
];

echo json_encode($output, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) . PHP_EOL;
?>