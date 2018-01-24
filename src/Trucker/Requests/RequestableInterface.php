<?php

/**
 * This file is part of Trucker
 *
 * (c) Brian Webb <bwebb@indatus.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Trucker\Requests;

use Illuminate\Container\Container;
use Trucker\Finders\Conditions\QueryConditionInterface;
use Trucker\Finders\Conditions\QueryResultOrderInterface;
use Trucker\Requests\Auth\AuthenticationInterface;
use Trucker\Resource\Model;

/**
 * Interface to dictate management of query conditions for a request
 */
interface RequestableInterface
{

    public function __construct(Container $app, $client = null);

    public function &getClient();

    public function createRequest($baseUri, $path, $httpMethod = 'GET', $requestHeaders = [], $httpMethodParam = null);

    public function setHeaders($requestHeaders = []);

    public function setBody($body, $contentType = null);

    public function setPostParameters($params = []);

    public function setGetParameters($params = []);

    public function setFileParameters($params = []);

    public function setModelProperties(Model $model);

    public function setTransportLanguage();

    public function addErrorHandler($httpStatus, \Closure $func, $stopPropagation = true);

    public function addQueryCondition(QueryConditionInterface $condition);

    public function addQueryResultOrder(QueryResultOrderInterface $resultOrder);

    public function authenticate(AuthenticationInterface $auth);

    public function sendRequest();
}
