<?php

namespace Fabicool\ApiRoadmap\Plugin;

use Magento\Framework\App\CacheInterface;
use Magento\Framework\HTTP\PhpEnvironment\RemoteAddress;
use Magento\Framework\Webapi\Exception as WebapiException;

class RateLimiterPlugin
{
    private const LIMIT = 100;
    private const TIME_WINDOW = 3600; // 1 година в секундах
    private const CACHE_TAG = 'API_RATE_LIMIT_';

    /**
     * @param CacheInterface $cache
     * @param RemoteAddress $remoteAddress
     */
    public function __construct(
       protected CacheInterface $cache,
       protected RemoteAddress  $remoteAddress
    ) {
    }

    /**
     * @return void
     * @throws WebapiException
     */
    public function beforeGetBestsellers()
    {
        $this->checkRateLimit('get_bestsellers');
    }

    /**
     * @return void
     * @throws WebapiException
     */
    public function beforeGetNewProducts()
    {
        $this->checkRateLimit('get_new_products');
    }

    /**
     * @return void
     * @throws WebapiException
     */
    public function beforeGetTree()
    {
        $this->checkRateLimit('get_tree');
    }

    /**
     * @param string $methodName
     * @throws WebapiException
     */
    private function checkRateLimit(string $methodName): void
    {
        $ip = $this->remoteAddress->getRemoteAddress();
        $cacheKey = self::CACHE_TAG . md5($ip . $methodName);
        $currentRequests = (int)$this->cache->load($cacheKey);

        if ($currentRequests >= self::LIMIT) {
            //Викидаємо помилку 429 (Too Many Requests) для пункту "Error handling з proper HTTP codes"
            throw new WebapiException(
                __('Rate limit exceeded. Maximum 100 requests per hour.'),
                0,
                \Symfony\Component\HttpFoundation\Response::HTTP_TOO_MANY_REQUESTS
            );
        }

        //Збільшуємо лічильник та зберігаємо в кеш на 1 годину
        $this->cache->save(
            (string)($currentRequests + 1),
            $cacheKey,
            [self::CACHE_TAG],
            self::TIME_WINDOW
        );
    }
}
