<?php

declare(strict_types=1);

namespace Telnyx\Services\Enterprises\Reputation;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Enterprises\Reputation\EnterpriseReputationPublicWrapped;
use Telnyx\Enterprises\Reputation\Loa\AgentInput;
use Telnyx\Enterprises\Reputation\Loa\LoaRenderParams;
use Telnyx\Enterprises\Reputation\Loa\LoaRenderParams\Signature;
use Telnyx\Enterprises\Reputation\Loa\LoaUpdateParams;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Enterprises\Reputation\LoaRawContract;

/**
 * Phone-number reputation monitoring (spam-score lookup and tracking).
 *
 * @phpstan-import-type AgentInputShape from \Telnyx\Enterprises\Reputation\Loa\AgentInput
 * @phpstan-import-type SignatureShape from \Telnyx\Enterprises\Reputation\Loa\LoaRenderParams\Signature
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class LoaRawService implements LoaRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Point the enterprise's reputation settings at a new signed LOA document. This resets LOA approval to `pending`; the new document must be approved before additional phone numbers can be added.
     *
     * @param string $enterpriseID The enterprise id. Lowercase UUID.
     * @param array{loaDocumentID: string}|LoaUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EnterpriseReputationPublicWrapped>
     *
     * @throws APIException
     */
    public function update(
        string $enterpriseID,
        array|LoaUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LoaUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['enterprises/%1$s/reputation/loa', $enterpriseID],
            body: (object) $parsed,
            options: $options,
            convert: EnterpriseReputationPublicWrapped::class,
        );
    }

    /**
     * @api
     *
     * Render the LOA for this enterprise as a PDF. The enterprise identity, address, and authorized-representative contact are taken from the enterprise record; the optional `agent` block is supplied only when a third-party partner manages the numbers. The response is the PDF itself (unsigned unless a `signature` is provided). Sign it and upload it to the Telnyx Documents API (`POST /v2/documents`, see https://developers.telnyx.com/api/documents) to obtain the `loa_document_id` required by `POST .../reputation`.
     *
     * @param string $enterpriseID The enterprise id. Lowercase UUID.
     * @param array{
     *   agent?: AgentInput|AgentInputShape, signature?: Signature|SignatureShape
     * }|LoaRenderParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function render(
        string $enterpriseID,
        array|LoaRenderParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LoaRenderParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['enterprises/%1$s/reputation/loa', $enterpriseID],
            headers: ['Accept' => 'application/pdf'],
            body: (object) $parsed,
            options: $options,
            convert: 'string',
        );
    }
}
