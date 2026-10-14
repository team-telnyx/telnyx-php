<?php

declare(strict_types=1);

namespace Telnyx\Services\Enterprises\Reputation;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Omitted;
use Telnyx\Enterprises\Reputation\ExternalVerification\ExternalVerificationWrapped;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Enterprises\Reputation\ExternalVerificationContract;

/**
 * Phone-number reputation monitoring (spam-score lookup and tracking).
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class ExternalVerificationService implements ExternalVerificationContract
{
    /**
     * @api
     */
    public ExternalVerificationRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ExternalVerificationRawService($client);
    }

    /**
     * @api
     *
     * Request permission to add phone numbers that the enterprise owns but that are hosted with another provider. Submit one or more uploaded documents proving ownership, such as a carrier invoice or account statement. The request is reviewed once per enterprise. While it is `pending` or `rejected` you can submit again to replace the documents; once `approved` it cannot be changed.
     *
     * @param string $enterpriseID The enterprise id. Lowercase UUID.
     * @param list<string> $documentIDs ids of uploaded documents (Documents API) proving the enterprise owns its phone numbers hosted with another provider, for example a carrier invoice or account statement
     * @param list<string> $phoneNumbers Optional. The phone numbers hosted with another provider that the documents cover, in E.164 format. Shown to the reviewer to match the documents to your numbers; you can still add numbers that are not listed here, and each is checked on its own.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $enterpriseID,
        array $documentIDs,
        ?array $phoneNumbers = null,
        RequestOptions|array|null $requestOptions = null,
    ): ExternalVerificationWrapped {
        $params = array_filter(
            [
                'documentIDs' => $documentIDs,
                'phoneNumbers' => $phoneNumbers ?? Omitted::VALUE,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($enterpriseID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get the review status of the enterprise's ownership proof for phone numbers hosted with another provider. Returns 404 when no proof has been submitted.
     *
     * @param string $enterpriseID The enterprise id. Lowercase UUID.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $enterpriseID,
        RequestOptions|array|null $requestOptions = null
    ): ExternalVerificationWrapped {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($enterpriseID, requestOptions: $requestOptions);

        return $response->parse();
    }
}
