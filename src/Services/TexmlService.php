<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\TexmlContract;
use Telnyx\Services\Texml\AccountsService;
use Telnyx\Services\Texml\CallsService;
use Telnyx\Texml\TexmlSecretsResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class TexmlService implements TexmlContract
{
    /**
     * @api
     */
    public TexmlRawService $raw;

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
        $this->raw = new TexmlRawService($client);
        $this->accounts = new AccountsService($client);
        $this->calls = new CallsService($client);
    }

    /**
     * @api
     *
     * Create a TeXML secret which can be later used as a Dynamic Parameter for TeXML when using Mustache Templates in your TeXML. In your TeXML you will be able to use your secret name, and this name will be replaced by the actual secret value when processing the TeXML on Telnyx side.  The secrets are not visible in any logs.
     *
     * @param string $name Name used as a reference for the secret, if the name already exists within the account its value will be replaced
     * @param string $value Secret value which will be used when rendering the TeXML template
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function secrets(
        string $name,
        string $value,
        RequestOptions|array|null $requestOptions = null,
    ): TexmlSecretsResponse {
        $params = Util::removeNulls(['name' => $name, 'value' => $value]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->secrets(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
