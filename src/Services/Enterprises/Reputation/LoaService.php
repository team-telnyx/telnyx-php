<?php

declare(strict_types=1);

namespace Telnyx\Services\Enterprises\Reputation;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\Enterprises\Reputation\EnterpriseReputationPublicWrapped;
use Telnyx\Enterprises\Reputation\Loa\AgentInput;
use Telnyx\Enterprises\Reputation\Loa\LoaRenderParams\Signature;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Enterprises\Reputation\LoaContract;

/**
 * Phone-number reputation monitoring (spam-score lookup and tracking).
 *
 * @phpstan-import-type AgentInputShape from \Telnyx\Enterprises\Reputation\Loa\AgentInput
 * @phpstan-import-type SignatureShape from \Telnyx\Enterprises\Reputation\Loa\LoaRenderParams\Signature
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class LoaService implements LoaContract
{
    /**
     * @api
     */
    public LoaRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new LoaRawService($client);
    }

    /**
     * @api
     *
     * Point the enterprise's reputation settings at a new signed LOA document. This resets LOA approval to `pending`; the new document must be approved before additional phone numbers can be added.
     *
     * @param string $enterpriseID The enterprise id. Lowercase UUID.
     * @param string $loaDocumentID Id of the new signed LOA document (from the Telnyx Documents API). Changing it resets LOA approval; the new document must be approved before more numbers can be added.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $enterpriseID,
        string $loaDocumentID,
        RequestOptions|array|null $requestOptions = null,
    ): EnterpriseReputationPublicWrapped {
        $params = Util::removeNulls(['loaDocumentID' => $loaDocumentID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($enterpriseID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Render the LOA for this enterprise as a PDF. The enterprise identity, address, and authorized-representative contact are taken from the enterprise record; the optional `agent` block is supplied only when a third-party partner manages the numbers. The response is the PDF itself (unsigned unless a `signature` is provided). Sign it and upload it to the Telnyx Documents API (`POST /v2/documents`, see https://developers.telnyx.com/api/documents) to obtain the `loa_document_id` required by `POST .../reputation`.
     *
     * @param string $enterpriseID The enterprise id. Lowercase UUID.
     * @param AgentInput|AgentInputShape $agent Third-party reseller / partner managing the enterprise's phone numbers. Omit when the enterprise works directly with Telnyx.
     * @param Signature|SignatureShape $signature Optional signature embedded in the rendered PDF. When omitted the PDF is returned unsigned for the customer to sign and upload.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function render(
        string $enterpriseID,
        AgentInput|array|null $agent = null,
        Signature|array|null $signature = null,
        RequestOptions|array|null $requestOptions = null,
    ): string {
        $params = Util::removeNulls(['agent' => $agent, 'signature' => $signature]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->render($enterpriseID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
