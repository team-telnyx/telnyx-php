<?php

declare(strict_types=1);

namespace Telnyx\Services\Enterprises\Reputation;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Enterprises\Reputation\ExternalVerification\ExternalVerificationCreateParams;
use Telnyx\Enterprises\Reputation\ExternalVerification\ExternalVerificationWrapped;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Enterprises\Reputation\ExternalVerificationRawContract;

/**
 * Phone-number reputation monitoring (spam-score lookup and tracking).
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class ExternalVerificationRawService implements ExternalVerificationRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Request permission to add phone numbers that the enterprise owns but that are hosted with another provider. Submit one or more uploaded documents proving ownership, such as a carrier invoice or account statement. The request is reviewed once per enterprise. While it is `pending` or `rejected` you can submit again to replace the documents; once `approved` it cannot be changed.
     *
     * @param string $enterpriseID The enterprise id. Lowercase UUID.
     * @param array{
     *   documentIDs: list<string>, phoneNumbers?: list<string>
     * }|ExternalVerificationCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ExternalVerificationWrapped>
     *
     * @throws APIException
     */
    public function create(
        string $enterpriseID,
        array|ExternalVerificationCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ExternalVerificationCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'enterprises/%1$s/reputation/external_verification', $enterpriseID,
            ],
            body: (object) $parsed,
            options: $options,
            convert: ExternalVerificationWrapped::class,
        );
    }

    /**
     * @api
     *
     * Get the review status of the enterprise's ownership proof for phone numbers hosted with another provider. Returns 404 when no proof has been submitted.
     *
     * @param string $enterpriseID The enterprise id. Lowercase UUID.
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ExternalVerificationWrapped>
     *
     * @throws APIException
     */
    public function list(
        string $enterpriseID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'enterprises/%1$s/reputation/external_verification', $enterpriseID,
            ],
            options: $requestOptions,
            convert: ExternalVerificationWrapped::class,
        );
    }
}
