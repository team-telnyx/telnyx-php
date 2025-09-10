<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\TexmlContract;
use Telnyx\Services\Texml\AccountsService;
use Telnyx\Services\Texml\CallsService;
use Telnyx\Texml\TexmlSecretsParams;
use Telnyx\Texml\TexmlSecretsResponse;

final class TexmlService implements TexmlContract
{
    /**
     * @@api
     */
    public AccountsService $accounts;

    /**
     * @@api
     */
    public CallsService $calls;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->accounts = new AccountsService($this->client);
        $this->calls = new CallsService($this->client);
    }

    /**
     * @api
     *
     * Create a TeXML secret which can be later used as a Dynamic Parameter for TeXML when using Mustache Templates in your TeXML. In your TeXML you will be able to use your secret name, and this name will be replaced by the actual secret value when processing the TeXML on Telnyx side.  The secrets are not visible in any logs.
     *
     * @param string $name Name used as a reference for the secret, if the name already exists within the account its value will be replaced
     * @param string $value Secret value which will be used when rendering the TeXML template
     */
    public function secrets(
        $name,
        $value,
        ?RequestOptions $requestOptions = null
    ): TexmlSecretsResponse {
        [$parsed, $options] = TexmlSecretsParams::parseRequest(
            ['name' => $name, 'value' => $value],
            $requestOptions
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
