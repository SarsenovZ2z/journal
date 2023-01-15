<?php

namespace App\Modules\Verification;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;

class Verification
{


    /**
     *
     * @param string $key
     * @param int $len
     * @param int $max_tries
     * @param int $lifetime (in seconds default 5 minutes)
     *
     * @return mixed
     */
    public static function start(
        string $key,
        int $len = 4,
        int $max_tries = 10,
        int $lifetime = 300
    ) : string
    {
        return static::create($key, $len, $max_tries, $lifetime);
    }

    /**
     *
     * @param string $key
     * @param mixed $code
     *
     * @return bool
     */
    public static function check(string $key, mixed $code) : bool
    {
        return (
                Hash::check($code, static::getCode($key))
                && static::forget($key)
            ) || static::decrementAttempts($key);
    }

    /**
     *
     * @param string $key
     *
     * @return int
     */
    public static function getTries(string $key) : int
    {
        return Cache::get("verification_tries_{$key}", 0);
    }


    /**
     * 
     * @param string $key
     * @param int $len
     * @param int $max_tries
     * @param int $lifetime
     * 
     * @return string
     */
    public static function create(string $key, int $len, int $max_tries, int $lifetime) : string
    {
        $code = static::generate($len);

        static::setCode($key, Hash::make($code), $lifetime, $max_tries);

        return $code;
    }

    /**
     * @param string $key
     * @param string $hash
     * @param int $lifetime
     * @param int $max_tries
     * 
     * @return void
     */
    public static function setCode(string $key, string $hash, int $lifetime, int $max_tries) : void
    {
        static::forget($key);

        Cache::put("verification_code_{$key}", $hash, $lifetime);
        Cache::put("verification_tries_{$key}", $max_tries, $lifetime);
    }

    /**
     * 
     * @param string $key
     * 
     * @return string|null
     */
    public static function getCode(string $key) :? string
    {
        return Cache::get("verification_code_{$key}", null);
    }

    /**
     * 
     * @param string $key
     * 
     * @return bool
     */
    public static function forget(string $key) : bool
    {
        Cache::forget("verification_code_{$key}");
        Cache::forget("verification_tries_{$key}");

        return true;
    }

    /**
     * 
     * @param string $key
     * 
     * @return bool
     */
    public static function decrementAttempts(string $key) : bool
    {
        if (
            Cache::has("verification_tries_{$key}")
            && Cache::decrement("verification_tries_{$key}") == 0
        ) {
            static::forget($key);
        }

        return false;
    }

    /**
     * 
     * @param int $len
     * 
     * @return string
     */
    public static function generate(int $len) : string
    {
        return (string)rand(10 ** ($len - 1), 10 ** $len - 1);
    }
}
