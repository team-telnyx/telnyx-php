<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Enterprises\Reputation;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Enterprises\Reputation\EnterpriseReputationPublicWrapped;
use Telnyx\Enterprises\Reputation\Loa\AgentInput;
use Telnyx\Enterprises\Reputation\Loa\LoaRenderParams\Signature;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type AgentInputShape from \Telnyx\Enterprises\Reputation\Loa\AgentInput
 * @phpstan-import-type SignatureShape from \Telnyx\Enterprises\Reputation\Loa\LoaRenderParams\Signature
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface LoaContract
{
    /**
     * @api
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
    ): EnterpriseReputationPublicWrapped;

    /**
     * @api
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
    ): string;
}
