<?php
$test_key = 'GLUED';
$redis = new Redis();
$redis->connect('redis', 6379);
try {
    $redis->set('test_key', 'yes');
    $glueStatus = $redis->get('test_key');
    if ($glueStatus) {
        $testKey = 'test_key';
        echo 'Glued with the Redis key value store:' . PHP_EOL;
        echo "1. Got value '{$glueStatus}' for key '{$testKey}'." . PHP_EOL;
        if ($redis->delete('test_key')) {
            echo '2. And already removed the key/value pair again.' . PHP_EOL;
        }
    } else {
        echo 'Not glued with the Redis key value store.' . PHP_EOL;
    }
} catch (RedisException $e) {
    $exceptionMessage = $e->getMessage();
    echo "{$exceptionMessage}. Not glued with the Redis key value store." . PHP_EOL;
}
