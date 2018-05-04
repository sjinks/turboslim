--TEST--
Memory corruption in Collection
--INI--
opcache.optimization_level = 0
--SKIPIF--
<?php include('skipif.inc'); ?>
--FILE--
<?php
function getString($idx)
{
	return 'some ' . 'string ' . $idx;
}

$c = new TurboSlim\Collection();
$string = getString(1);
$c->set(0, $string);
$string[0] = 'S';
echo $c->get(0), PHP_EOL;
$c->remove(0);
echo $string, PHP_EOL;
unset($string);

$string2 = getString(2);
$c->set('index', $string2);
$string2[0] = 'S';
echo $c->get('index'), PHP_EOL;
$c->remove('index');
echo $string2, PHP_EOL;
unset($string2);

$string3 = getString(3);
$c[1] = $string3;
$string3[0] = 'S';
echo $c[1], PHP_EOL;
unset($c[1]);
echo $string3, PHP_EOL;
unset($string3);

$string4 = getString(4);
$c['idx'] = $string4;
$string4[0] = 'S';
echo $c['idx'], PHP_EOL;
unset($c['idx']);
echo $string4, PHP_EOL;
unset($string4);

$c = new TurboSlim\Collection();
$arr = ['aa' => 'bb', 'cc' => 'dd', 'ee' => 'ff'];
$c->replace($arr);
$arr['aa'] = 'XX';
var_dump($c->all());
?>
--EXPECT--
some string 1
Some string 1
some string 2
Some string 2
some string 3
Some string 3
some string 4
Some string 4
array(3) {
  ["aa"]=>
  string(2) "bb"
  ["cc"]=>
  string(2) "dd"
  ["ee"]=>
  string(2) "ff"
}
