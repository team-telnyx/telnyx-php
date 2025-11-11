<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\TexmlContract;
use Telnyx\Services\Texml\AccountsService;
use Telnyx\Services\Texml\CallsService;
use Telnyx\Texml\TexmlSecretsParams;
use Telnyx\Texml\TexmlSecretsResponse;

final class TexmlService implements TexmlContract
{
    /**
     * @api
     */
    public AccountsService $accounts;

    /**
     * @api
     */
    public CallsService $calls;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->accounts = new AccountsService($client);
        $this->calls = new CallsService($client);
    }

    /**
     * @api
     *
     * Create a TeXML secret which can be later used as a Dynamic Parameter for TeXML when using Mustache Templates in your TeXML. In your TeXML you will be able to use your secret name, and this name will be replaced by the actual secret value when processing the TeXML on Telnyx side.  The secrets are not visible in any logs.
     *
     * @param array{name: string, value: string}|TexmlSecretsParams $params
     *
     * @throws APIException
     */
    public function secrets(
        array|TexmlSecretsParams $params,
        ?RequestOptions $requestOptions = null
    ): TexmlSecretsResponse {
        [$parsed, $options] = TexmlSecretsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'texml/secrets',
            body: (object) $parsed,
            options: $options,
            convert: TexmlSecretsResponse::class,
        );
    }
}
