<?php

// use App\Kernel;
// use Symfony\Component\Debug\Debug;
// use Symfony\Component\Dotenv\Dotenv;
// use Symfony\Component\HttpFoundation\Request;

// require __DIR__.'/../vendor/autoload.php';

// // The check is to ensure we don't use .env in production
// if (!isset($_SERVER['APP_ENV'])) {
//     if (!class_exists(Dotenv::class)) {
//         throw new \RuntimeException('APP_ENV environment variable is not defined. You need to define environment variables for configuration or add "symfony/dotenv" as a Composer dependency to load variables from a .env file.');
//     }
//     (new Dotenv())->load(__DIR__.'/../.env');
// }

// $env = $_SERVER['APP_ENV'] ?? 'dev';
// $debug = (bool) ($_SERVER['APP_DEBUG'] ?? ('prod' !== $env));

// if ($debug) {
//     umask(0000);

//     Debug::enable();
// }

// if ($trustedProxies = $_SERVER['TRUSTED_PROXIES'] ?? false) {
//     Request::setTrustedProxies(explode(',', $trustedProxies), Request::HEADER_X_FORWARDED_ALL ^ Request::HEADER_X_FORWARDED_HOST);
// }

// if ($trustedHosts = $_SERVER['TRUSTED_HOSTS'] ?? false) {
//     Request::setTrustedHosts(explode(',', $trustedHosts));
// }

// $kernel = new Kernel($env, $debug);
// $request = Request::createFromGlobals();
// $response = $kernel->handle($request);
// $response->send();
// $kernel->terminate($request, $response);

$data = [
        'clayConsumption' => [
            'plate' => 8,
            'bowl' => 6,
        ],
        'price' => [
                'plate' => 5,
                'bowl' => 3,
        ],
        'products'=>['plate', 'bowl'],
    ];


$productsCount = count($data['products']);//2
$nbProductsUsingMoreThan5ClayUnits = 0;
for($i = 0; $i < $productsCount; $i++)
{
    $productName = $data['products'][$i];
    $clay = $data['clayConsumption'][$productName];
    $price = $data['price'][$productName];
    $products[] = array('productName'=>$productName, 'clay'=>$clay, 'price'=>$price);
    if($clay > 5)
    {
        $nbProductsUsingMoreThan5ClayUnits++;
    } 
}

function coutProductMoreThanXClay(int $clayUnits, $products) :int
{
    $result = 0;
    foreach($products as $product)
    {
        if($product['clay'] > $clayUnits)
        {
            $result++;
        }
    }
    return $result;
}

//var_dump(coutProductMoreThanXClay(7, $products));

function getPricePerClayUnit($product) :float
{
    $result = $product['price'] / $product['clay'];
    return $result;
}

function callback($a, $b)
{
    $unit = getPricePerClayUnit($a);
    $unit2 = getPricePerClayUnit($b);
    if($unit == $unti2)
    {
        return 0;
    }
    return($unit < $unit2) ? -1 : 1;
}

usort($products, 'callback');
//var_dump($products);

$productsInfo = $_POST['productInfo'];

$productInfoEach = explode('\n', $productsInfo);

$firstLine = true;
foreach ($productInfoEach as $line)
{
    $col = explode('\t', $line);
    if($firstLine) 
    {
        $nomColonne[] = $col;
        $firstLine = false;
    } else 
    {
        for($i = 0; $i < count($nomColonne); $i++) {
            $products[$line][$nomColonne[$i] = $col[$i];
        }
        
    }

}






