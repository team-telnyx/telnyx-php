<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Enterprises\Reputation;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Enterprises\Reputation\ExternalVerification\ExternalVerificationWrapped;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ExternalVerificationContract
{
    /**
     * @api
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
    ): ExternalVerificationWrapped;

    /**
     * @api
     *
     * @param string $enterpriseID The enterprise id. Lowercase UUID.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $enterpriseID,
        RequestOptions|array|null $requestOptions = null
    ): ExternalVerificationWrapped;
}
